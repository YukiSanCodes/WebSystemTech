<?php

namespace App\Controllers;

use App\Models\CustomerAccountModel;
use App\Models\User;

class Accounts extends BaseController
{
    private CustomerAccountModel $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerAccountModel();
    }

    public function login()
    {
        if (session()->get('isLogged') === true) {
            return redirect()->to('/accounts');
        }
        if ($this->request->getMethod() !== 'POST') {
            return view('login_blue');
        }
        if (! $this->validate(['email' => 'required|valid_email', 'password' => 'required|max_length[255]'])) {
            return redirect()->back()->withInput()->with('error', 'Enter a valid email and password.');
        }

        $email = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');
        $user = (new User())->findByEmail($email);
        if ($user === null || ! (new User())->verifyPassword($password, (string) $user['password']) || (isset($user['is_active']) && ! $user['is_active'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
        }

        session()->regenerate(true);
        session()->set(['isLogged' => true, 'user_id' => $user['id'], 'username' => $user['first_name'] . ' ' . $user['last_name'], 'email' => $user['email']]);
        return redirect()->to('/accounts')->with('success', 'Welcome back!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }

    public function index()
    {
        if (! $this->isLoggedIn()) return redirect()->to('/login');
        $filters = ['search' => trim((string) $this->request->getGet('search')), 'status' => trim((string) $this->request->getGet('status')), 'type' => trim((string) $this->request->getGet('type'))];
        $accounts = $this->customerModel->filterAccounts($filters, 10);
        return view('home/customer_dashboard', ['accounts' => $accounts, 'pager' => $this->customerModel->pager, 'total_accounts' => $this->customerModel->countAll(), 'active_accounts' => $this->customerModel->countByStatus('active'), 'inactive_accounts' => $this->customerModel->countByStatus('inactive'), 'suspended_accounts' => $this->customerModel->countByStatus('suspended'), 'filters' => $filters, 'username' => session()->get('username')]);
    }

    public function viewAccount(int $id)
    {
        if (! $this->isLoggedIn()) return redirect()->to('/login');
        $account = $this->customerModel->find($id);
        if ($account === null) return redirect()->to('/accounts')->with('error', 'Account not found.');
        return view('home/view_account', ['account' => $account, 'username' => session()->get('username')]);
    }

    public function create()
    {
        return $this->authView('home/form', ['account' => null, 'mode' => 'create']);
    }

    public function store()
    {
        if (! $this->isLoggedIn()) return redirect()->to('/login');
        $data = $this->accountData();
        if (! $this->validateAccount($data)) return redirect()->back()->withInput()->with('error', implode(' ', $this->customerModel->errors()));
        $this->customerModel->insert($data);
        return redirect()->to('/accounts')->with('success', 'Customer account created.');
    }

    public function edit(int $id)
    {
        if (! $this->isLoggedIn()) return redirect()->to('/login');
        $account = $this->customerModel->find($id);
        if ($account === null) return redirect()->to('/accounts')->with('error', 'Account not found.');
        return view('home/form', ['account' => $account, 'mode' => 'edit', 'username' => session()->get('username')]);
    }

    public function update(int $id)
    {
        if (! $this->isLoggedIn()) return redirect()->to('/login');
        $data = $this->accountData();
        if (! $this->validateAccount($data, $id)) return redirect()->back()->withInput()->with('error', implode(' ', $this->customerModel->errors()));
        $this->customerModel->update($id, $data);
        return redirect()->to('/account/' . $id)->with('success', 'Customer account updated.');
    }

    public function delete(int $id)
    {
        if (! $this->isLoggedIn()) return redirect()->to('/login');
        $this->customerModel->delete($id);
        return redirect()->to('/accounts')->with('success', 'Customer account deleted.');
    }

    private function authView(string $view, array $data)
    {
        if (! $this->isLoggedIn()) return redirect()->to('/login');
        $data['username'] = session()->get('username');
        return view($view, $data);
    }

    private function isLoggedIn(): bool { return session()->get('isLogged') === true; }

    private function accountData(): array
    {
        return ['account_number' => trim((string) $this->request->getPost('account_number')), 'customer_name' => trim((string) $this->request->getPost('customer_name')), 'address' => trim((string) $this->request->getPost('address')), 'phone' => trim((string) $this->request->getPost('phone')), 'email' => trim((string) $this->request->getPost('email')), 'meter_number' => trim((string) $this->request->getPost('meter_number')), 'connection_type' => $this->request->getPost('connection_type'), 'status' => $this->request->getPost('status')];
    }

    private function validateAccount(array $data, ?int $id = null): bool
    {
        $unique = 'required|max_length[50]|is_unique[customer_accounts.account_number' . ($id === null ? ']' : ',id,' . $id . ']');
        return $this->validateData($data, ['account_number' => $unique, 'customer_name' => 'required|max_length[150]', 'address' => 'required', 'phone' => 'permit_empty|max_length[20]', 'email' => 'permit_empty|valid_email|max_length[100]', 'meter_number' => 'permit_empty|max_length[50]', 'connection_type' => 'required|in_list[residential,commercial,industrial]', 'status' => 'required|in_list[active,inactive,suspended]']);
    }
}

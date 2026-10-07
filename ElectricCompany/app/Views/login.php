<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in · Electric Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('style/loginview_cs.css') ?>" rel="stylesheet">
</head>
<body class="login-page">
    <main class="login-card">
        <div class="login-mark"><i class="bi bi-lightning-charge-fill"></i> ELECTRIC DEMO</div>
        <h1>Welcome back</h1>
        <p class="text-muted mb-4">Sign in to manage customer accounts.</p>
        <?php if ($message = session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= esc($message) ?></div>
        <?php endif; ?>
        <?php if ($message = session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= esc($message) ?></div>
        <?php endif; ?>
        <form action="<?= base_url('login') ?>" method="post">
            <?= csrf_field() ?>
            <label class="form-label" for="email">Email address</label>
            <input class="form-control form-control-lg mb-3" id="email" name="email" type="email" value="<?= esc(old('email')) ?>" required autofocus>
            <label class="form-label" for="password">Password</label>
            <input class="form-control form-control-lg mb-4" id="password" name="password" type="password" required>
            <button class="btn btn-primary btn-lg w-100" type="submit">Sign in</button>
        </form>
        <p class="small text-muted mt-4 mb-0">Use an active account already present in <code>users</code>.</p>
    </main>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer accounts · Electric Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root { --ink:#12263a; --blue:#1769aa; --mist:#f4f7fb; }
        body { background:var(--mist); color:var(--ink); }
        .navbar { background:var(--ink); }
        .brand-dot { color:#f5b700; }
        .hero { background:linear-gradient(120deg,#12263a,#1769aa); color:#fff; border-radius:1rem; }
        .stat { border:0; border-radius:.9rem; box-shadow:0 .4rem 1.5rem #12263a12; }
        .table-card { border:0; border-radius:1rem; box-shadow:0 .4rem 1.5rem #12263a12; }
        .table > :not(caption) > * > * { padding:1rem .75rem; }
        .pagination { margin-bottom:0; gap:.3rem; }
        .pagination a, .pagination span { border-radius:.5rem!important; }
    </style>
</head>
<body>
<nav class="navbar navbar-dark mb-4"><div class="container py-2">
    <a class="navbar-brand fw-semibold" href="<?= base_url('accounts') ?>"><span class="brand-dot">⚡</span> Electric Demo</a>
    <div class="d-flex align-items-center gap-3 text-white"><span class="small">Signed in as <strong><?= esc($username) ?></strong></span><form action="<?= base_url('logout') ?>" method="post" class="m-0"><?= csrf_field() ?><button class="btn btn-sm btn-outline-light">Log out</button></form></div>
</div></nav>
<main class="container pb-5">
    <?php if ($message = session()->getFlashdata('success')): ?><div class="alert alert-success"><?= esc($message) ?></div><?php endif; ?>
    <?php if ($message = session()->getFlashdata('error')): ?><div class="alert alert-danger"><?= esc($message) ?></div><?php endif; ?>
    <section class="hero p-4 p-md-5 mb-4"><div class="d-flex flex-wrap justify-content-between align-items-center gap-3"><div><p class="text-uppercase small mb-2 opacity-75">Customer account management</p><h1 class="display-6 fw-bold mb-2">Power your customer service desk.</h1><p class="mb-0 opacity-75">Search, review, and maintain accounts from one clean workspace.</p></div><a class="btn btn-warning btn-lg" href="<?= base_url('account/create') ?>"><i class="bi bi-plus-lg"></i> New account</a></div></section>
    <div class="row g-3 mb-4">
        <?php foreach ([['Total accounts',$total_accounts,'primary'],['Active',$active_accounts,'success'],['Inactive',$inactive_accounts,'secondary'],['Suspended',$suspended_accounts,'warning']] as [$label,$value,$tone]): ?><div class="col-6 col-lg-3"><div class="card stat h-100"><div class="card-body"><div class="text-muted small"><?= $label ?></div><div class="fs-2 fw-bold text-<?= $tone ?>"><?= $value ?></div></div></div></div><?php endforeach; ?>
    </div>
    <div class="card table-card"><div class="card-body p-3 p-md-4">
        <form class="row g-2 mb-4" method="get" action="<?= base_url() ?>">
            <div class="col-lg-5"><label class="visually-hidden" for="search">Search</label><input class="form-control" id="search" name="search" placeholder="Search name, account, email, or phone" value="<?= esc($filters['search']) ?>"></div>
            <div class="col-sm-5 col-lg-2"><select class="form-select" name="status"><option value="">All statuses</option><?php foreach (['active','inactive','suspended'] as $option): ?><option value="<?= $option ?>" <?= $filters['status']===$option?'selected':'' ?>><?= ucfirst($option) ?></option><?php endforeach; ?></select></div>
            <div class="col-sm-5 col-lg-2"><select class="form-select" name="type"><option value="">All connection types</option><?php foreach (['residential','commercial','industrial'] as $option): ?><option value="<?= $option ?>" <?= $filters['type']===$option?'selected':'' ?>><?= ucfirst($option) ?></option><?php endforeach; ?></select></div>
            <div class="col-sm-2 col-lg-1"><button class="btn btn-primary w-100" type="submit"><i class="bi bi-search"></i></button></div>
            <div class="col-sm-12 col-lg-2"><a class="btn btn-outline-secondary w-100" href="<?= base_url('accounts') ?>">Clear filters</a></div>
        </form>
        <div class="table-responsive"><table class="table align-middle mb-0"><thead><tr><th>Account</th><th>Customer</th><th>Contact</th><th>Type</th><th>Status</th><th class="text-end">Actions</th></tr></thead><tbody>
        <?php if (empty($accounts)): ?><tr><td colspan="6" class="text-center py-5 text-muted">No customer accounts match your filters.</td></tr><?php endif; ?>
        <?php foreach ($accounts as $account): ?><tr><td><strong><?= esc($account['account_number']) ?></strong><div class="small text-muted"><?= esc($account['meter_number']) ?></div></td><td><?= esc($account['customer_name']) ?><div class="small text-muted text-truncate" style="max-width:260px"><?= esc($account['address']) ?></div></td><td><?= esc($account['email'] ?: '—') ?><div class="small text-muted"><?= esc($account['phone'] ?: '—') ?></div></td><td><span class="badge text-bg-info"><?= ucfirst(esc($account['connection_type'])) ?></span></td><td><span class="badge text-bg-<?= $account['status']==='active'?'success':($account['status']==='suspended'?'warning':'secondary') ?>"><?= ucfirst(esc($account['status'])) ?></span></td><td class="text-end"><a class="btn btn-sm btn-outline-primary" href="<?= base_url('account/'.$account['id']) ?>">View</a></td></tr><?php endforeach; ?>
        </tbody></table></div>
        <?php $page = $pager->getCurrentPage(); $pages = $pager->getPageCount(); $query = array_filter($filters); if ($pages > 1): ?><div class="d-flex flex-wrap justify-content-between align-items-center gap-3 border-top mt-3 pt-3"><span class="small text-muted">Page <?= $page ?> of <?= $pages ?></span><nav aria-label="Account pages"><ul class="pagination"><li class="page-item <?= $page<=1?'disabled':'' ?>"><a class="page-link" href="<?= $page>1 ? base_url('?'.http_build_query(array_merge($query,['page'=>$page-1]))) : '#' ?>">Previous</a></li><?php for($n=1;$n<=$pages;$n++): ?><li class="page-item <?= $n===$page?'active':'' ?>"><a class="page-link" href="<?= base_url('?'.http_build_query(array_merge($query,['page'=>$n]))) ?>"><?= $n ?></a></li><?php endfor; ?><li class="page-item <?= $page>=$pages?'disabled':'' ?>"><a class="page-link" href="<?= $page<$pages ? base_url('?'.http_build_query(array_merge($query,['page'=>$page+1]))) : '#' ?>">Next</a></li></ul></nav></div><?php endif; ?>
    </div></div>
</main></body></html>

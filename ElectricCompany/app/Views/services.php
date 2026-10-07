<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<section class="hero-section py-5">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <p class="text-uppercase fw-semibold text-warning mb-3">What we do</p>
                <h1 class="display-4 fw-bold mb-4">Reliable power solutions for every space.</h1>
                <p class="lead mb-4">From safe home wiring to large commercial installations, our licensed team delivers dependable electrical work with clear communication and quality workmanship.</p>
                <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg me-2">Request a quote</a>
                <a href="<?= base_url('accounts') ?>" class="btn btn-outline-light btn-lg">Customer portal</a>
            </div>
            <div class="col-lg-5 text-center"><i class="fas fa-bolt" style="font-size:12rem;color:rgba(255,255,255,.12)"></i></div>
        </div>
    </div>
</section>
<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="row text-center mb-5"><div class="col-lg-8 mx-auto"><h2 class="display-5 fw-bold text-primary-custom">Services built around your needs</h2><p class="lead text-muted">Professional support for homes, businesses, and industrial facilities.</p></div></div>
        <div class="row g-4">
            <?php foreach ([['fa-home','Residential electrical','Wiring, panel upgrades, lighting, outlets, inspections, and smart-home installations.'],['fa-building','Commercial installations','Electrical fit-outs, maintenance, energy audits, and dependable business support.'],['fa-solar-panel','Solar solutions','Solar panels, battery storage, and energy-management systems for lower operating costs.'],['fa-exclamation-triangle','Emergency repairs','Rapid response for outages, electrical faults, and urgent safety concerns.'],['fa-tools','Preventive maintenance','Scheduled inspections and maintenance that help prevent downtime and costly repairs.'],['fa-shield-alt','Safety inspections','Professional assessments that keep your electrical systems compliant and safe.']] as [$icon,$title,$description]): ?>
                <div class="col-md-6 col-lg-4"><div class="card h-100 p-4 feature-item"><div class="feature-icon"><i class="fas <?= $icon ?>"></i></div><h4 class="text-primary-custom mb-3"><?= esc($title) ?></h4><p class="text-muted mb-0"><?= esc($description) ?></p></div></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

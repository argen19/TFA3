<?= view('layouts/header', ['title' => 'About | POSarce', 'active' => 'about']) ?>
<section class="card">
    <p class="eyebrow">Our Purpose</p>
    <h1>About POSarce</h1>
    <p class="intro">SimplePOS is a basic Point-of-Sale web application developed using the CodeIgniter 4 framework.</p>
    <p>The system demonstrates the fundamentals of MVC architecture through routing, controllers, views, shared navigation, and static PHP arrays used as temporary data sources.</p>
    <div class="action-buttons" aria-label="Account lists">
        <a class="button" href="<?= base_url('customers') ?>">View Customers</a>
        <a class="button button--secondary" href="<?= base_url('users') ?>">View Users</a>
    </div>
</section>
<?= view('layouts/footer') ?>

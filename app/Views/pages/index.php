<?= view('layouts/header', ['title' => 'Home | POSarce', 'active' => 'home']) ?>
<section class="card">
    <p class="eyebrow">Point-of-Sale Management System</p>
    <h1>Welcome to POSarce</h1>
    <p class="intro">POSarce is a basic Point-of-Sale application built with CodeIgniter 4 to demonstrate routing, controllers, views, and structured data presentation.</p>
    <p>Use the navigation menu to access customer information, manage staff account records, and learn more about the system.</p>
    <div class="action-buttons" aria-label="Account lists">
        <a class="button" href="<?= base_url('customers') ?>">View Customers</a>
        <a class="button button--secondary" href="<?= base_url('users') ?>">View Users</a>
    </div>
</section>
<?= view('layouts/footer') ?>

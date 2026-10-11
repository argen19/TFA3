<?= view('layouts/header', ['title' => 'Customer Accounts | POSarce', 'active' => 'customers']) ?>

<section class="card">
    <p class="eyebrow">Client directory</p>
    <h1>Customer Accounts</h1>
    <p class="intro">View and manage customer contact information.</p>

    <p>
        <a class="button" href="<?= esc(site_url('customers/new')) ?>">New Customer</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= esc($customer['full_name']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone'] ?? '') ?></td>
                    <td>
                        <a href="<?= esc(site_url('customers/' . $customer['id'] . '/edit')) ?>">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>

<?= view('layouts/footer') ?>

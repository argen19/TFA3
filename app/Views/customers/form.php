<?= view('layouts/header', [
    'title'  => ($customer === null ? 'New Customer' : 'Edit Customer') . ' | POSarce',
    'active' => 'customers',
]) ?>

<section class="card">
    <h1><?= $customer === null ? 'New Customer' : 'Edit Customer' ?></h1>

    <form method="post" action="<?= esc($action) ?>">
        <?= csrf_field() ?>

        <p>
            <label for="full_name">Full Name *</label><br>
            <input
                id="full_name"
                name="full_name"
                type="text"
                maxlength="100"
                required
                value="<?= esc($values['full_name'] ?? '') ?>"
            >
            <?php if (isset($errors['full_name'])): ?>
                <br><small style="color:#a00000"><?= esc($errors['full_name']) ?></small>
            <?php endif ?>
        </p>

        <p>
            <label for="email">Email *</label><br>
            <input
                id="email"
                name="email"
                type="email"
                maxlength="100"
                required
                value="<?= esc($values['email'] ?? '') ?>"
            >
            <?php if (isset($errors['email'])): ?>
                <br><small style="color:#a00000"><?= esc($errors['email']) ?></small>
            <?php endif ?>
        </p>

        <p>
            <label for="phone">Phone</label><br>
            <input
                id="phone"
                name="phone"
                type="tel"
                maxlength="20"
                value="<?= esc($values['phone'] ?? '') ?>"
            >
            <?php if (isset($errors['phone'])): ?>
                <br><small style="color:#a00000"><?= esc($errors['phone']) ?></small>
            <?php endif ?>
        </p>

        <button class="button" type="submit">
            <?= $customer === null ? 'Create Customer' : 'Save Changes' ?>
        </button>
        <a href="<?= esc(site_url('customers')) ?>">Cancel</a>
    </form>
</section>

<?= view('layouts/footer') ?>

<?= view('layouts/header', [
    'title'  => ($user === null ? 'New User' : 'Edit User') . ' | POSarce',
    'active' => 'users',
]) ?>

<section class="card">
    <h1><?= $user === null ? 'New User' : 'Edit User' ?></h1>

    <form method="post" action="<?= esc($action) ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <p>
            <label for="username">Username *</label><br>
            <input
                id="username"
                name="username"
                type="text"
                maxlength="50"
                required
                value="<?= esc($values['username'] ?? '') ?>"
            >
            <?php if (isset($errors['username'])): ?>
                <br><small style="color:#a00000"><?= esc($errors['username']) ?></small>
            <?php endif ?>
        </p>

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

        <?php if ($user !== null): ?>
            <p>
                <label for="avatar">Profile picture (JPG or PNG, maximum 2 MB)</label><br>
                <input
                    id="avatar"
                    name="avatar"
                    type="file"
                    accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                >
                <?php if (isset($errors['avatar'])): ?>
                    <br><small style="color:#a00000"><?= esc($errors['avatar']) ?></small>
                <?php endif ?>
            </p>
            <p>Leave the picture empty to keep the current avatar.</p>
        <?php endif ?>

        <button class="button" type="submit">
            <?= $user === null ? 'Create User' : 'Save Changes' ?>
        </button>
        <a href="<?= esc(site_url('users')) ?>">Cancel</a>
    </form>
</section>

<?= view('layouts/footer') ?>

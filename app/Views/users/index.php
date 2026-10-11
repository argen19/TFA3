<?= view('layouts/header', ['title' => 'User Accounts | POSarce', 'active' => 'users']) ?>

<section class="card">
    <p class="eyebrow">Team directory</p>
    <h1>User Accounts</h1>
    <p class="intro">View and manage staff accounts.</p>

    <p>
        <a class="button" href="<?= esc(site_url('users/new')) ?>">New User</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <?php
                    $avatarFile = ! empty($user['avatar'])
                        ? $user['avatar']
                        : 'placeholder.svg';
                ?>
                <tr>
                    <td>
                        <img
                            src="<?= esc(base_url('uploads/avatars/' . $avatarFile)) ?>"
                            alt="Avatar for <?= esc($user['full_name']) ?>"
                            width="48"
                            height="48"
                            style="object-fit:cover;border-radius:50%"
                        >
                    </td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td>
                        <a href="<?= esc(site_url('users/' . $user['id'] . '/edit')) ?>">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>

<?= view('layouts/footer') ?>

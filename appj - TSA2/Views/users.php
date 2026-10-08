<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
</head>

<body>

<h1>User Accounts</h1>

<?php if (session()->get('isLoggedIn')): ?>

    <p>
        Logged in as:
        <?= esc(session()->get('full_name')) ?>
    </p>

<?php endif; ?>

<p>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/tasks') ?>">Tasks</a> |
    <a href="<?= base_url('/profile') ?>">Profile</a> |
    <a href="<?= base_url('/about') ?>">About</a> |
    <a href="<?= base_url('/customers') ?>">Customers</a> |
    <a href="<?= base_url('/users') ?>">Users</a> |
    <a href="<?= base_url('/logout') ?>">Logout</a>
</p>

<table border="1" cellpadding="10">

    <tr>
        <th>Avatar</th>
        <th>ID</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>

    <?php foreach ($users as $user): ?>

    <tr>

        <td>

            <?php if (!empty($user['avatar'])): ?>

                <img
                    src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
                    width="100"
                    height="100"
                >

            <?php else: ?>

                <img
                    src="<?= base_url('images/placeholder.jpg') ?>"
                    width="100"
                    height="100"
                >

            <?php endif; ?>

        </td>

        <td><?= esc($user['id']) ?></td>
        <td><?= esc($user['username']) ?></td>
        <td><?= esc($user['full_name']) ?></td>
        <td><?= esc($user['created_at']) ?></td>

        <td>
            <a href="<?= base_url('/users/edit/' . $user['id']) ?>">
                Edit
            </a>
        </td>

    </tr>

    <?php endforeach; ?>

</table>

<p>
    <a href="<?= base_url('/users/new') ?>">
        Add New User
    </a>
</p>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>
        <?= isset($user) ? 'Edit User' : 'New User' ?>
    </title>
</head>

<body>

<h1>
    <?= isset($user) ? 'Edit User' : 'New User' ?>
</h1>

<?php if (session()->getFlashdata('errors')): ?>

    <?php foreach (session()->getFlashdata('errors') as $error): ?>

        <p style="color:red;">
            <?= esc($error) ?>
        </p>

    <?php endforeach; ?>

<?php endif; ?>


<form
    method="post"
    enctype="multipart/form-data"
    action="<?= isset($user)
        ? base_url('users/update/' . $user['id'])
        : base_url('users/create') ?>"
>

    <?= csrf_field() ?>

    <label>Username:</label><br>

    <input
        type="text"
        name="username"
        value="<?= old('username', $user['username'] ?? '') ?>"
    >

    <br><br>


    <label>Full Name:</label><br>

    <input
        type="text"
        name="full_name"
        value="<?= old('full_name', $user['full_name'] ?? '') ?>"
    >

    <br><br>


    <?php if (isset($user)): ?>

        <label>Current Avatar:</label><br>

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

        <br><br>

    <?php endif; ?>


    <label>Profile Picture:</label><br>

    <input
        type="file"
        name="avatar"
        accept=".jpg,.jpeg,.png"
    >

    <br>

    <small>
        JPG or PNG only. Maximum size: 2MB.
    </small>

    <br><br>


    <button type="submit">

        <?= isset($user)
            ? 'Update User'
            : 'Add User' ?>

    </button>

</form>

<br>

<a href="<?= base_url('users') ?>">
    Back to Users
</a>

</body>
</html>
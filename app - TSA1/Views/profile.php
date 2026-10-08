<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>

<body>

<h1>Profile</h1>

<p>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/tasks') ?>">Tasks</a> |
    <a href="<?= base_url('/profile') ?>">Profile</a> |
    <a href="<?= base_url('/about') ?>">About</a>
</p>

<h2>User Information</h2>

<p>
    <strong>Username:</strong>
    <?= esc($user['username']) ?>
</p>

<p>
    <strong>Full Name:</strong>
    <?= esc($user['full_name']) ?>
</p>

<p>
    <strong>Email:</strong>
    <?= esc($user['email']) ?>
</p>

<p>
    <strong>Created At:</strong>
    <?= esc($user['created_at']) ?>
</p>

</body>
</html>
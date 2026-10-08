<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>

<body>

<h1>POS Login</h1>

<?php if (session()->getFlashdata('error')): ?>

    <p style="color: red;">
        <?= esc(session()->getFlashdata('error')) ?>
    </p>

<?php endif; ?>

<form method="post" action="<?= base_url('/login') ?>">

    <?= csrf_field() ?>

    <label>Username:</label><br>

    <input
        type="text"
        name="username"
        value="<?= old('username') ?>"
    >

    <br><br>

    <label>Password:</label><br>

    <input
        type="password"
        name="password"
    >

    <br><br>

    <button type="submit">Login</button>

</form>

</body>
</html>
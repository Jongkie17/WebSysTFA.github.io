<!DOCTYPE html>
<html>
<head>
    <title>POS Login</title>
</head>

<body>

<h1>POS Login</h1>

<?php if (session()->getFlashdata('error')): ?>

    <p style="color:red;">
        <?= esc(session()->getFlashdata('error')) ?>
    </p>

<?php endif; ?>

<form method="post" action="<?= site_url('login') ?>">

    <?= csrf_field() ?>

    <label for="username">Username:</label><br>

    <input
        type="text"
        id="username"
        name="username"
        value="<?= old('username') ?>"
    >

    <br><br>

    <label for="password">Password:</label><br>

    <input
        type="password"
        id="password"
        name="password"
    >

    <br><br>

    <button type="submit">Login</button>

</form>

</body>
</html>
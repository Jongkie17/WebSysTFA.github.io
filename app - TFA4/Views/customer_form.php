<!DOCTYPE html>
<html>
<head>
    <title>
        <?= isset($customer) ? 'Edit Customer' : 'New Customer' ?>
    </title>
</head>

<body>

<h1>
    <?= isset($customer) ? 'Edit Customer' : 'New Customer' ?>
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
    action="<?= isset($customer)
        ? base_url('customers/update/' . $customer['id'])
        : base_url('customers/create') ?>"
>

    <?= csrf_field() ?>

    <label>Full Name:</label><br>
    <input
        type="text"
        name="full_name"
        value="<?= old('full_name', $customer['full_name'] ?? '') ?>"
    >

    <br><br>

    <label>Email:</label><br>
    <input
        type="email"
        name="email"
        value="<?= old('email', $customer['email'] ?? '') ?>"
    >

    <br><br>

    <label>Phone:</label><br>
    <input
        type="text"
        name="phone"
        value="<?= old('phone', $customer['phone'] ?? '') ?>"
    >

    <br><br>

    <button type="submit">
        <?= isset($customer) ? 'Update Customer' : 'Add Customer' ?>
    </button>

</form>

<br>

<a href="<?= base_url('customers') ?>">
    Back to Customers
</a>

</body>
</html>
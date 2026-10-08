<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts</title>
</head>

<body>

<h1>Customer Accounts</h1>

<p>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/about') ?>">About</a> |
    <a href="<?= base_url('/customers') ?>">Customers</a> |
    <a href="<?= base_url('/users') ?>">Users</a> |
    <a href="<?= base_url('/logout') ?>">Logout</a>
</p>

<p>
    <a href="<?= base_url('/customers/new') ?>">Add New Customer</a>
</p>

<table border="1" cellpadding="10">

    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>

    <?php foreach ($customers as $customer): ?>

    <tr>
        <td><?= esc($customer['full_name']) ?></td>
        <td><?= esc($customer['email']) ?></td>
        <td><?= esc($customer['phone']) ?></td>

        <td>
            <a href="<?= base_url('/customers/edit/' . $customer['id']) ?>">
                Edit
            </a>
        </td>
    </tr>

    <?php endforeach; ?>

</table>

</body>
</html>
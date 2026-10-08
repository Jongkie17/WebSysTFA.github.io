<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
</head>

<body>

<h1>Task List</h1>

<p>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/tasks') ?>">Tasks</a> |
    <a href="<?= base_url('/profile') ?>">Profile</a> |
    <a href="<?= base_url('/about') ?>">About</a>
</p>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Status</th>
        <th>Task Date</th>
        <th>Created At</th>
    </tr>

    <?php foreach ($tasks as $task): ?>

    <tr>
        <td><?= esc($task['id']) ?></td>
        <td><?= esc($task['title']) ?></td>
        <td><?= esc($task['status']) ?></td>
        <td><?= esc($task['task_date']) ?></td>
        <td><?= esc($task['created_at']) ?></td>
    </tr>

    <?php endforeach; ?>

</table>

</body>
</html>
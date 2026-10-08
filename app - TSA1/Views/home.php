<!DOCTYPE html>
<html>
<head>
    <title>Tasks for Today</title>
</head>

<body>

<h1>Tasks for Today</h1>

<p>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/tasks') ?>">Tasks</a> |
    <a href="<?= base_url('/profile') ?>">Profile</a> |
    <a href="<?= base_url('/about') ?>">About</a>
</p>

<h2>Today's Tasks</h2>

<p>
    Date: <?= esc($today) ?>
</p>

<table border="1" cellpadding="10">

    <tr>
        <th>Title</th>
        <th>Status</th>
        <th>Task Date</th>
    </tr>

    <?php foreach ($tasks as $task): ?>

    <tr>
        <td><?= esc($task['title']) ?></td>
        <td><?= esc($task['status']) ?></td>
        <td><?= esc($task['task_date']) ?></td>
    </tr>

    <?php endforeach; ?>

</table>

</body>
</html>
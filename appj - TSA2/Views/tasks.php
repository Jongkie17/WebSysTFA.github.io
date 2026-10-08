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
    <a href="<?= base_url('/about') ?>">About</a> |
    <a href="<?= base_url('/customers') ?>">Customers</a> |
    <a href="<?= base_url('/users') ?>">Users</a>
</p>

<?php if (session()->get('isLoggedIn')): ?>

    <p>
        <a href="<?= base_url('/tasks/new') ?>">
            Add New Task
        </a>
    </p>

<?php else: ?>

    <p>
        <a href="<?= base_url('/login') ?>">
            Login to manage tasks
        </a>
    </p>

<?php endif; ?>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Status</th>
        <th>Task Date</th>
        <th>Created At</th>

        <?php if (session()->get('isLoggedIn')): ?>
            <th>Action</th>
        <?php endif; ?>

    </tr>

    <?php foreach ($tasks as $task): ?>

    <tr>

        <td><?= esc($task['id']) ?></td>
        <td><?= esc($task['title']) ?></td>
        <td><?= esc($task['status']) ?></td>
        <td><?= esc($task['task_date']) ?></td>
        <td><?= esc($task['created_at']) ?></td>

        <?php if (session()->get('isLoggedIn')): ?>

            <td>

                <a href="<?= base_url('/tasks/edit/' . $task['id']) ?>">
                    Edit
                </a>

                |

                <a
                    href="<?= base_url('/tasks/delete/' . $task['id']) ?>"
                    onclick="return confirm('Are you sure you want to archive this task?')"
                >
                    Delete
                </a>

            </td>

        <?php endif; ?>

    </tr>

    <?php endforeach; ?>

</table>

</body>
</html>
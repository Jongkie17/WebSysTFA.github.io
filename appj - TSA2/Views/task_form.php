<!DOCTYPE html>
<html>
<head>
    <title>
        <?= isset($task) ? 'Edit Task' : 'New Task' ?>
    </title>
</head>

<body>

<h1>
    <?= isset($task) ? 'Edit Task' : 'New Task' ?>
</h1>

<?php if (session()->getFlashdata('errors')): ?>

    <?php foreach (session()->getFlashdata('errors') as $error): ?>

        <p style="color: red;">
            <?= esc($error) ?>
        </p>

    <?php endforeach; ?>

<?php endif; ?>

<form
    method="post"
    action="<?= isset($task)
        ? base_url('tasks/update/' . $task['id'])
        : base_url('tasks/create') ?>"
>

    <?= csrf_field() ?>

    <label>Title:</label><br>

    <input
        type="text"
        name="title"
        value="<?= old('title', $task['title'] ?? '') ?>"
    >

    <br><br>

    <label>Status:</label><br>

    <select name="status">

        <option
            value="pending"
            <?= old('status', $task['status'] ?? 'pending') === 'pending'
                ? 'selected'
                : '' ?>
        >
            Pending
        </option>

        <option
            value="completed"
            <?= old('status', $task['status'] ?? '') === 'completed'
                ? 'selected'
                : '' ?>
        >
            Completed
        </option>

    </select>

    <br><br>

    <label>Task Date:</label><br>

    <input
        type="date"
        name="task_date"
        value="<?= old('task_date', $task['task_date'] ?? '') ?>"
    >

    <br><br>

    <button type="submit">
        <?= isset($task) ? 'Update Task' : 'Add Task' ?>
    </button>

</form>

<br>

<a href="<?= base_url('/tasks') ?>">
    Back to Task List
</a>

</body>
</html>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/controllers/Task.php';

$task = new Task();

$tasks = $task->tasks();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST && $_POST['new-task']) {
    $task->create();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <title>TASKS</title>
</head>

<body>
    <h1>Tasks</h1>
    <table class="table-tasks">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task) : ?>
                <tr>
                    <td> <?= $task['id'] ?> </td>
                    <td> <?= $task['name'] ?> </td>
                    <td> <?= $task['description'] ?> </td>
                    <td> <?= $task['finished'] ? 'Active' : 'Finished' ?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div>
        <h3>New Task</h3>
        <form action="#" method="POST">
            <div class="input-group">
                <label for="name" class="label">Name:</label>
                <input type="text" class="input-field input-name" id="name" name="name">
                <span class="error error-name">error</span>
            </div>
            <div class="input-group">
                <label for="description" class="label">Description:</label>
                <input type="text" class="input-field input-description" id="description" name="description">
                <span class="error error-description">error</span>
            </div>
            <button type="submit" value="new-task" name="new-task" class="btn btn-submit">New task</button>
        </form>
    </div>
</body>

</html>
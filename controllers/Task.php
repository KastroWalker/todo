<?php
require $_SERVER['DOCUMENT_ROOT'] . '/models/TaskModel.php';

class Task
{
    public function __construct()
    {
        session_start();
        $this->taskModel = new TaskModel();
        $this->user = $_SESSION['user'];
    }

    public function tasks()
    {
        $_SESSION['response'] = [
            'message' => 'Password or user is incorrect!',
            'status' => 'error'
        ];

        $tasks = $this->taskModel->getBy(['userID' => $this->user['id']]);

        if ($tasks) {
            return $tasks;
        }
    }

    public function create()
    {
        $data = array_diff_key($_POST, ['new-task' => '']);
        $data['userID'] = $this->user['id'];
        $data['finished'] = 0;

        $this->taskModel->create($data);
        header('Location: /views/home.php');
    }
}

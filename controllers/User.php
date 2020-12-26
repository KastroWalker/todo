<?php
require $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';

class User
{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login(string $username, string $password)
    {
        $_SESSION['response'] = [
            'message' => 'Password or user is incorrect!',
            'status' => 'error'
        ];

        $user = $this->userModel->getBy(['user' => $username]);

        if ($user) {
            if (password_verify($password, $user[0]['password'])) {
                $user[0] = array_diff_key($user[0], ['password' => '']);

                $_SESSION['user'] = $user[0];
                unset($_SESSION['response']);

                header('Location: /views/home.php');
                exit();
            }
        }

        header("Location: ");
    }

    public function register()
    {
        $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

        if ($email) {
            $data = array_diff_key($_POST, ['register' => '']);
            $data['email'] = $email;
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

            $user = $this->userModel->create($data);

            $_SESSION['user'] = $user;

            header('Location: /views/home.php');
            exit();
        } else {
            $_SESSION['response'] = [
                'message' => 'Error when registering user',
                'status' => 'error'
            ];

            header("Location: ");
        }
    }
}

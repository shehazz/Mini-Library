<?php

require_once '../Models/RegisterModel.php';

class RegisterController
{
    private $model;

    public function __construct()
    {
        $this->model = new registerModel();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return ['success' => false, 'message' => 'Bad request'];
        }

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $name     = trim($_POST['fullname'] ?? '');
        $nic      = trim($_POST['nic']      ?? '');
        $email    = trim($_POST['email']    ?? '');

        if ($this->model->registerUser($username, $password, $name, $nic, $email)) {
            return ['success' => true, 'message' => 'Registration successful'];
        }

        return ['success' => false, 'message' => 'Username or email already exists'];
    }
}

if (isset($_POST['register'])) {
    $ctrl = new RegisterController();
    $result = $ctrl->register();

    if ($result['success']) {
        header("Location: ../../index.php");
        exit();
    } else {
        $_SESSION['register_error'] = $result['message'];
        header("Location: ../Views/register.php");
        exit();
    }
}

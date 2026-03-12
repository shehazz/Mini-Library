<?php

session_start();

require_once '../Models/LoginModel.php';

class LoginController
{
    private $loginmodel;

    public function __construct()
    {
        $this->loginmodel = new LoginModel();
    }
    public function login()
    {

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            if (!empty($username) && !empty($password)) {
                $user = $this->loginmodel->verifyLogin($username, $password);
                if ($user) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['roleid']   = $user['roleid'];

                    echo '<script>console.log("Login Successful");</script>';
                    switch ($_SESSION['roleid']) {
                        case 1:
                        echo '<script>window.location.href = "../Views/Admindashboard.php";</script>';
                    break;
                        case 2:
                        echo '<script>window.location.href = "../Views/libariandashboard.php";</script>';
                    break;
                        case 3:
                        echo '<script>window.location.href = "../Views/home.php";</script>';
                    break;
                        case 4:
                        echo '<script>window.location.href = "../Views/home.php";</script>';
                    break;
                    default:
                            echo '<script>alert("Unauthorized role"); window.location.href = "../Views/adminlogin.php";</script>';
                            break;
                    }
                    exit();
                } else {
                    echo '<script>console.log("Invalid Username or Password");</script>';
                    echo '<script>window.location.href = "../Views/adminlogin.php";</script>';
                }
            }
        } else {

            echo '<script>console.log("Please Enter Username And Password");</script>';
            echo '<script>window.location.href = "../Views/adminlogin.php";</script>';
        }
    }
}

if (isset($_POST['admin-login'])) {
    $logincontroller = new LoginController();
    $logincontroller->login();
}
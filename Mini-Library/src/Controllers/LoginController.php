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
                    $_SESSION['adminid'] = $user['adminid'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['roleid']   = $user['roleid'];

                    echo '<script>console.log("Login Successful");</script>';
                    if ($_SESSION['roleid'] = 1):
                        echo '<script>window.location.href = "../Views/rollpromotion.php";</script>';
                    endif;
                    if ($_SESSION['roleid'] = 2):
                        echo '<script>window.location.href = "../Views/libariandashboard.php";</script>';
                    endif;
                    if ($_SESSION['roleid'] = 3):
                        echo '<script>window.location.href = "../Views/home.php";</script>';
                    endif;
                    if ($_SESSION['roleid'] = 4):
                        echo '<script>window.location.href = "../Views/home.php";</script>';
                    endif;
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
<?php

require_once  '/../../Models/AddUserModel.php';

class MemberController {

    private $memberModel;

    public function __construct() {
        $this->memberModel = new MemberModel();
    }

    public function formSubmit() {
        if (
            isset($_POST['name'], $_POST['nic'], $_POST['email'],
                  $_POST['username'], $_POST['password'], $_POST['roleid'])
        ) {
            if (
                !empty($_POST['name']) && !empty($_POST['nic']) && !empty($_POST['email']) &&
                !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['roleid'])
            ) {

                $name     = trim(htmlspecialchars($_POST['name']));
                $nic      = trim(htmlspecialchars($_POST['nic']));
                $email    = trim(htmlspecialchars($_POST['email']));
                $username = trim(htmlspecialchars($_POST['username']));
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $roleid   = intval($_POST['roleid']);

                $profilepic = null;
                if (!empty($_FILES['profilepic']['tmp_name'])) {
                    $profilepic = file_get_contents($_FILES['profilepic']['tmp_name']);
                }

                $result = $this->memberModel->addMember(
                    $name, $nic, $email, $username, $password, $roleid, $profilepic
                );

                if ($result) {
                    header("Location: /Mini-Library/src/Views/libariandashboard.php?status=success");
                } else {
                    header("Location: /Mini-Librarysrc/Views/registerstudent.php?status=error");
                }
                exit;

            } else {
                header("Location: /Mini-Libary/src/Views/registerstudent.php?status=empty");
                exit;
            }
        }
    }
}

if (isset($_POST['register_user'])) {
    $memberController = new MemberController();
    $memberController->formSubmit();
}
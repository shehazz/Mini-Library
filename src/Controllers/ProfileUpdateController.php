<?php

require_once '../Models/ProfileUpdateModel.php';

class ProfileUpdateController
{

private $ProfileUpdateModel;

    public function __construct()
    {
        $this->ProfileUpdateModel = new ProfileUpdateModel();
    }

     public function getTutorById($nic)
    {
        return $this->ProfileUpdateModel->fetch_single($nic);
    }

    public function profileUpdate()
    {

        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['fullname']) && isset($_POST['nic']) && isset($_POST['email'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $nic = $_POST['nic'];
            $email = $_POST['email'];

            $this->ProfileUpdateModel->profileUpdate($username, $password, $fullname, $nic, $email);

            echo "<script>alert('Profile Details Updated Successfully');</script>";
            echo "<script>window.location.href='../Views/profile.php';</script>";
        } else {
            echo "<script>alert('Empty');</script>";
        }
    }
}

if (isset($_POST['update_profile'])) {
    $controller = new ProfileUpdateController();
    $controller->profileUpdate();
}
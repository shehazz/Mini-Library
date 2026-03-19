<?php

require_once '../../Config/DBConnection.php';

class AddUserModel extends DBConnection{
    

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function addMember($name, $nic, $email, $username, $password, $profilepic) {
        $stmt = $this->conn->prepare(
            "INSERT INTO members (name, nic, email, username, password, profilepic)
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("ssssss", $name, $nic, $email, $username, $password, $profilepic);
        return $stmt->execute();
    }
}
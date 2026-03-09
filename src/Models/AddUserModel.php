<?php

require_once  '/../../Config/DBConnection.php';

class MemberModel {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function addMember($name, $nic, $email, $username, $password, $roleid, $profilepic) {
        $stmt = $this->conn->prepare(
            "INSERT INTO members (name, nic, email, username, password, roleid, profilepic)
             VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sssssss", $name, $nic, $email, $username, $password, $roleid, $profilepic);
        return $stmt->execute();
    }
}
<?php

require_once '../../Config/DBConnection.php';

class registerModel extends DBConnection
{
    public function registerUser($username, $password, $name, $nic, $email): bool
    {
        $check = "SELECT 1 FROM user WHERE username = ? OR email = ? LIMIT 1";
        if ($stmt = $this->conn->prepare($check)) {
            $stmt->bind_param("ss", $username, $email);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->close();
                return false;
            }
            $stmt->close();
        }

        $default_role = 4;

        $query = "INSERT INTO user (username, password, name, nic, email, roleid) VALUES (?, ?, ?, ?, ?, ?)";
        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("ssssss", $username, $password, $name, $nic, $email, $default_role);
            $ok = $stmt->execute();
            $stmt->close();
            return $ok;
        }

        return false;
    }
}
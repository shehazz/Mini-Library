<?php

require_once '../../Config/DBConnection.php';

class registerModel extends DBConnection
{
    public function registerUser($username, $password, $name, $nic, $email)
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

        $query = "INSERT INTO user (username, password, name, nic, email) VALUES (?, ?, ?, ?, ?)";
        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("sssss", $username, $password, $name, $nic, $email);
            $ok = $stmt->execute();
            $stmt->close();
            return $ok;
        }

        return false;
    }
}
?>
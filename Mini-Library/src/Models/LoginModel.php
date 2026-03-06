<?php

require_once '../../Config/DBConnection.php';

class LoginModel extends DBConnection
{
    public function verifyLogin($username, $password)
    {
        $query = "SELECT * FROM user WHERE username = ? AND password = ?";
        if ($stat = $this->conn->prepare($query)) {
            $stat->bind_param("ss", $username, $password);
            $stat->execute();
            $result = $stat->get_result();
            if ($row = $result->fetch_assoc()) {
                return $row;
            }
            $stat->close();
        }
        return false;
    }
}

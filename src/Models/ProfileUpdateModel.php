<?php

require_once '../../Config/DBConnection.php';

class ProfileUpdateModel extends DBConnection
{

    public function profileUpdate($username, $password, $fullname, $nic, $email)
    {

        $query = "UPDATE user SET username = ?, password = ?, name = ?, email = ? WHERE nic = ?";

        if ($stat = $this->conn->prepare($query)) {
            $stat->bind_param("sssss", $username, $password, $fullname, $email, $nic);

            $result = $stat->execute();
        }
        return false;
    }

    public function fetch_single($nic)
    {
        $data = null;

        $query = "SELECT * FROM user WHERE nic = '$nic'";

        if ($sql = $this->conn->query($query)) {
            while ($rows = mysqli_fetch_assoc($sql)) {
                $data = $rows;
            }
        }
        return $data;
    }
}
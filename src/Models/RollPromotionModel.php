<?php

require_once '../../Config/DBConnection.php';

class RollPromotionModel extends DBConnection
{
    public function getAllUsers()
    {
        $query = "SELECT u.id, u.username, u.name, u.nic, u.email, u.roleid, r.role 
                  FROM user u LEFT JOIN role r ON u.roleid = r.roleid ORDER BY u.id DESC";
        $result = $this->conn->query($query);

        if ($result) {
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        }
        return [];
    }

    public function getUserById($userId)
    {
        $query = "SELECT u.id, u.username, u.name, u.nic, u.email, u.roleid, r.role 
                  FROM user u LEFT JOIN role r ON u.roleid = r.roleid WHERE u.id = ?";

        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
            return $row ?: false;
        }
        return false;
    }

    public function getUserByNicEmail($nic, $email)
    {
        $query = "SELECT u.id, u.username, u.name, u.nic, u.email, u.roleid, r.role 
                  FROM user u LEFT JOIN role r ON u.roleid = r.roleid WHERE u.nic = ? AND u.email = ?";

        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("ss", $nic, $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
            return $row ?: false;
        }
        return false;
    }

    public function getAllRoles()
    {
        $query = "SELECT roleid, role FROM role ORDER BY roleid ASC";
        $result = $this->conn->query($query);

        if ($result) {
            $roles = [];
            while ($row = $result->fetch_assoc()) {
                $roles[] = $row;
            }
            return $roles;
        }
        return [];
    }

    public function createUser($username, $password, $name, $nic, $email, $roleId)
    {
        
        $query = "INSERT INTO user (username, password, name, nic, email, roleid) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("sssssi", $username, $password, $name, $nic, $email, $roleId);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }

    public function addRoleToUser($userId, $roleId)
    {
        $query = "UPDATE user SET roleid = ? WHERE id = ?";

        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("ii", $roleId, $userId);
            $result = $stmt->execute();
            $affected = $stmt->affected_rows;
            $stmt->close();
            return $result && $affected > 0;
        }
        return false;
    }

    public function updateUser($userId, $name, $username, $email, $password, $roleId)
    {
        
        if (!empty($password)) {
            $query = "UPDATE user SET name = ?, username = ?, email = ?, password = ?, roleid = ? WHERE id = ?";
            if ($stmt = $this->conn->prepare($query)) {
                $stmt->bind_param("ssssii", $name, $username, $email, $password, $roleId, $userId);
                $result = $stmt->execute();
                $stmt->close();
                return $result;
            }
        } else {
            $query = "UPDATE user SET name = ?, username = ?, email = ?, roleid = ? WHERE id = ?";
            if ($stmt = $this->conn->prepare($query)) {
                $stmt->bind_param("sssii", $name, $username, $email, $roleId, $userId);
                $result = $stmt->execute();
                $stmt->close();
                return $result;
            }
        }
        return false;
    }

    public function deleteUser($userId)
    {
        $query = "DELETE FROM user WHERE id = ?";

        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $affected = $stmt->affected_rows;
            $stmt->close();
            return $affected > 0;
        }
        return false;
    }

    public function searchUsers($searchTerm)
    {
        $like = "%{$searchTerm}%";
        $query = "SELECT u.id, u.username, u.name, u.nic, u.email, u.roleid, r.role 
                  FROM user u LEFT JOIN role r ON u.roleid = r.roleid 
                  WHERE u.name LIKE ? OR u.email LIKE ? OR u.username LIKE ? 
                  ORDER BY u.id DESC";

        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("sss", $like, $like, $like);
            $stmt->execute();
            $result = $stmt->get_result();
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            $stmt->close();
            return $users;
        }
        return [];
    }
}
?>
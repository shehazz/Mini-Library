<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../Models/RollPromotionModel.php';

class RolePromotionController
{
    private $rolePromotionModel;

    public function __construct()
    {
        $this->rolePromotionModel = new RollPromotionModel();
    }

    public function getAllUsers()
    {
        return $this->rolePromotionModel->getAllUsers();
    }

    public function getAllRoles()
    {
        return $this->rolePromotionModel->getAllRoles();
    }

    public function getUserById($userId)
    {
        return $this->rolePromotionModel->getUserById($userId);
    }

    public function addRole()
    {
        $nic    = isset($_POST['nic'])    ? trim($_POST['nic'])      : '';
        $email  = isset($_POST['email'])  ? trim($_POST['email'])    : '';
        $roleId = isset($_POST['roleId']) ? intval($_POST['roleId']) : 0;

        if (empty($nic) || empty($email) || $roleId <= 0) {
            return ['success' => false, 'message' => 'NIC, Email, and Role are required'];
        }

        $user = $this->rolePromotionModel->getUserByNicEmail($nic, $email);

        if (!$user) {
            return ['success' => false, 'message' => 'User not found with provided NIC and Email'];
        }

        if ((int)$user['roleid'] === $roleId) {
            return ['success' => false, 'message' => htmlspecialchars($user['name']) . ' already has this role'];
        }

        $result = $this->rolePromotionModel->addRoleToUser($user['id'], $roleId);

        return $result
            ? ['success' => true,  'message' => 'Role assigned to ' . htmlspecialchars($user['name']) . ' successfully']
            : ['success' => false, 'message' => 'Failed to assign role'];
    }

    public function updateUser()
    {
        $userId   = isset($_POST['userId'])   ? intval($_POST['userId'])   : 0;
        $name     = isset($_POST['name'])     ? trim($_POST['name'])       : '';
        $username = isset($_POST['username']) ? trim($_POST['username'])   : '';
        $email    = isset($_POST['email'])    ? trim($_POST['email'])      : '';
        $password = isset($_POST['password']) ? $_POST['password']         : '';
        $roleId   = isset($_POST['roleId'])   ? intval($_POST['roleId'])   : 0;

        if ($userId <= 0 || empty($name) || empty($username) || empty($email) || $roleId <= 0) {
            return ['success' => false, 'message' => 'All fields are required'];
        }

        $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_BCRYPT) : null;

        $result = $this->rolePromotionModel->updateUser($userId, $name, $username, $email, $hashedPassword, $roleId);

        return $result
            ? ['success' => true,  'message' => 'User updated successfully']
            : ['success' => false, 'message' => 'Failed to update user'];
    }

    public function deleteUser()
    {
        $userId = isset($_POST['userId']) ? intval($_POST['userId']) : 0;

        if ($userId <= 0) {
            return ['success' => false, 'message' => 'User ID required'];
        }

        if ($userId === 1) {
            return ['success' => false, 'message' => 'Cannot delete system admin'];
        }

        $user = $this->rolePromotionModel->getUserById($userId);
        if (!$user) {
            return ['success' => false, 'message' => 'User not found'];
        }

        $result = $this->rolePromotionModel->deleteUser($userId);

        return $result
            ? ['success' => true,  'message' => 'User deleted successfully']
            : ['success' => false, 'message' => 'Failed to delete user'];
    }

    public function searchUsers()
    {
        $searchTerm = isset($_POST['search']) ? trim($_POST['search']) : '';

        $users = empty($searchTerm)
            ? $this->rolePromotionModel->getAllUsers()
            : $this->rolePromotionModel->searchUsers($searchTerm);

        return ['success' => true, 'data' => $users];
    }
}
?>
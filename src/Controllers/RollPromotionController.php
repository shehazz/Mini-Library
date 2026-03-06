<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['username'])) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

require_once '../../Config/DBConnection.php';
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
        $users = $this->rolePromotionModel->getAllUsers();
        return ['success' => true, 'data' => $users];
    }

    public function getUserById($userId)
    {
        if ($userId <= 0) {
            return ['success' => false, 'message' => 'Invalid User ID'];
        }
        $user = $this->rolePromotionModel->getUserById($userId);
        if ($user === false) {
            return ['success' => false, 'message' => 'User not found'];
        }
        return ['success' => true, 'data' => $user];
    }

    public function getAllRoles()
    {
        $roles = $this->rolePromotionModel->getAllRoles();
        return ['success' => true, 'data' => $roles];
    }

    public function createUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = isset($_POST['username']) ? trim($_POST['username']) : '';
            
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $name     = isset($_POST['name'])     ? trim($_POST['name'])     : '';
            $nic      = isset($_POST['nic'])       ? trim($_POST['nic'])      : '';
            $email    = isset($_POST['email'])     ? trim($_POST['email'])    : '';
            $roleId   = isset($_POST['roleId'])    ? intval($_POST['roleId']) : 0;

            if (empty($username) || empty($password) || empty($name) || empty($nic) || empty($email) || $roleId <= 0) {
                return ['success' => false, 'message' => 'All fields are required'];
            }

            
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $result = $this->rolePromotionModel->createUser($username, $hashedPassword, $name, $nic, $email, $roleId);

            if (!$result) {
                return ['success' => false, 'message' => 'Failed to create user'];
            }
            return ['success' => true, 'message' => 'User created successfully'];
        }
        return ['success' => false, 'message' => 'Invalid request method'];
    }

    public function addRole()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nic    = isset($_POST['nic'])    ? trim($_POST['nic'])      : '';
            $email  = isset($_POST['email'])  ? trim($_POST['email'])    : '';
            $roleId = isset($_POST['roleId']) ? intval($_POST['roleId']) : 0;

            if (empty($nic) || empty($email) || $roleId <= 0) {
                return ['success' => false, 'message' => 'NIC, Email, and Role are required'];
            }

            $user = $this->rolePromotionModel->getUserByNicEmail($nic, $email);

            if ($user === false) {
                return ['success' => false, 'message' => 'User not found with provided NIC and Email'];
            }

            
            if ((int)$user['roleid'] === $roleId) {
                return ['success' => false, 'message' => htmlspecialchars($user['name']) . ' already has this role'];
            }

            $result = $this->rolePromotionModel->addRoleToUser($user['id'], $roleId);

            if (!$result) {
                return ['success' => false, 'message' => 'Failed to assign role'];
            }
            return ['success' => true, 'message' => 'Role assigned to ' . htmlspecialchars($user['name']) . ' successfully'];
        }
        return ['success' => false, 'message' => 'Invalid request method'];
    }

    public function updateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId   = isset($_POST['userId'])   ? intval($_POST['userId'])   : 0;
            $name     = isset($_POST['name'])     ? trim($_POST['name'])       : '';
            $username = isset($_POST['username']) ? trim($_POST['username'])   : '';
            $email    = isset($_POST['email'])    ? trim($_POST['email'])      : '';
            
            $password = isset($_POST['password']) ? $_POST['password']         : '';
            $roleId   = isset($_POST['roleId'])   ? intval($_POST['roleId'])   : 0;

            
            if ($userId <= 0 || empty($name) || empty($username) || empty($email) || $roleId <= 0) {
                return ['success' => false, 'message' => 'All fields are required'];
            }

            
            $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_BCRYPT) : '';

            $result = $this->rolePromotionModel->updateUser($userId, $name, $username, $email, $hashedPassword, $roleId);

            if ($result === false) {
                return ['success' => false, 'message' => 'Failed to update user'];
            }
            return ['success' => true, 'message' => 'User updated successfully'];
        }
        return ['success' => false, 'message' => 'Invalid request method'];
    }

    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = isset($_POST['userId']) ? intval($_POST['userId']) : 0;

            
            if ($userId <= 0) {
                return ['success' => false, 'message' => 'User ID required'];
            }

            
            $user = $this->rolePromotionModel->getUserById($userId);
            if ($user === false) {
                return ['success' => false, 'message' => 'User not found'];
            }

            if ($userId === 1) {
                return ['success' => false, 'message' => 'Cannot delete system admin'];
            }

            $result = $this->rolePromotionModel->deleteUser($userId);

            if (!$result) {
                return ['success' => false, 'message' => 'Failed to delete user'];
            }
            return ['success' => true, 'message' => 'User deleted successfully'];
        }
        return ['success' => false, 'message' => 'Invalid request method'];
    }

    public function searchUsers()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $searchTerm = isset($_POST['search']) ? trim($_POST['search']) : '';

            if (empty($searchTerm)) {
                $users = $this->rolePromotionModel->getAllUsers();
            } else {
                $users = $this->rolePromotionModel->searchUsers($searchTerm);
            }

            return ['success' => true, 'data' => $users];
        }
        return ['success' => false, 'message' => 'Invalid request method'];
    }
}


if (isset($_POST['action'])) {
    $rolePromotionController = new RolePromotionController();
    $action = $_POST['action'];

    switch ($action) {
        case 'getAllUsers':
            $result = $rolePromotionController->getAllUsers();
            break;
        case 'getUserById':
            $userId = isset($_POST['userId']) ? intval($_POST['userId']) : 0;
            $result = $rolePromotionController->getUserById($userId);
            break;
        case 'getAllRoles':
            $result = $rolePromotionController->getAllRoles();
            break;
        case 'createUser':
            $result = $rolePromotionController->createUser();
            break;
        case 'addRole':
            $result = $rolePromotionController->addRole();
            break;
        case 'updateUser':
            $result = $rolePromotionController->updateUser();
            break;
        case 'deleteUser':
            $result = $rolePromotionController->deleteUser();
            break;
        case 'searchUsers':
            $result = $rolePromotionController->searchUsers();
            break;
        default:
            $result = ['success' => false, 'message' => 'Invalid action'];
            break;
    }

    header('Content-Type: application/json');
    echo json_encode($result);
    exit();
}
?>
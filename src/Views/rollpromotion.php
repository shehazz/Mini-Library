<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../Controllers/RollPromotionController.php';

$RollPromotionController = new RollPromotionController();

// Router — handles all AJAX POST requests from the page
if (isset($_POST['action'])) {
    header('Content-Type: application/json');

    if (!isset($_SESSION['username'])) {
        echo json_encode(['success' => false, 'message' => 'Unauthorized']);
        exit();
    }

    $action = $_POST['action'];

    switch ($action) {
        case 'getAllUsers':
            echo json_encode(['success' => true, 'data' => $RollPromotionController->getAllUsers()]);
            break;
        case 'getUserById':
            $userId = isset($_POST['userId']) ? intval($_POST['userId']) : 0;
            $user = $RollPromotionController->getUserById($userId);
            echo $user
                ? json_encode(['success' => true, 'data' => $user])
                : json_encode(['success' => false, 'message' => 'User not found']);
            break;
        case 'getAllRoles':
            echo json_encode(['success' => true, 'data' => $RollPromotionController->getAllRoles()]);
            break;
        case 'addRole':
            echo json_encode($RollPromotionController->addRole());
            break;
        case 'updateUser':
            echo json_encode($RollPromotionController->updateUser());
            break;
        case 'deleteUser':
            echo json_encode($RollPromotionController->deleteUser());
            break;
        case 'searchUsers':
            echo json_encode($RollPromotionController->searchUsers());
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
            break;
    }
    exit;
}

// Page load — fetch data for initial table render
if (!isset($_SESSION['username'])) {
    header('Location: ../Views/login.php');
    exit();
}

$users = $RollPromotionController->getAllUsers();
$roles = $RollPromotionController->getAllRoles();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniLib | Management Console</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../public/assets/css/rollpromotion.css">
</head>

<body class="bg-light">

    <?php include '../../src/Includes/navsidebar.php' ?>

    <main class="content" id="main-content">
        <div class="container-fluid">

            <div class="row mb-5 align-items-center">
                <div class="col">
                    <h4 class="fw-bold mb-1">Update and Grant permissions</h4>
                    <p class="text-muted small mb-0">Control system access levels.</p>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light-subtle border-bottom">
                            <tr class="text-muted small text-uppercase">
                                <th class="ps-4 py-3 fw-bold border-0" style="letter-spacing: 1px;">#</th>
                                <th class="py-3 fw-bold border-0">Name</th>
                                <th class="py-3 fw-bold border-0">Username</th>
                                <th class="py-3 fw-bold border-0">NIC</th>
                                <th class="py-3 fw-bold border-0">Email</th>
                                <th class="py-3 fw-bold border-0 text-center">Role</th>
                                <th class="pe-4 py-3 fw-bold border-0 text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0" id="usersTableBody">
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <tr data-user-id="<?php echo $user['id']; ?>">
                                        <td class="ps-4 py-3">
                                            <div class="text-muted small font-monospace">#<?php echo str_pad($user['id'], 5, '0', STR_PAD_LEFT); ?></div>
                                        </td>
                                        <td class="py-3">
                                            <div class="fw-bold text-dark small"><?php echo htmlspecialchars($user['name']); ?></div>
                                        </td>
                                        <td class="py-3">
                                            <div class="small text-muted font-monospace"><?php echo htmlspecialchars($user['username']); ?></div>
                                        </td>
                                        <td class="py-3">
                                            <div class="small"><?php echo htmlspecialchars($user['nic']); ?></div>
                                        </td>
                                        <td class="py-3">
                                            <div class="small"><?php echo htmlspecialchars($user['email']); ?></div>
                                        </td>
                                        <td class="py-3 text-center">
                                            <span class="badge bg-white text-dark border px-3 py-2 fw-semibold rounded-3 small">
                                                <?php echo htmlspecialchars($user['role'] ?? 'No Role'); ?>
                                            </span>
                                        </td>
                                        <td class="pe-4 py-3 text-end">
                                            <div class="btn-group border rounded-3 p-1 bg-white shadow-sm">
                                                <button class="btn btn-sm btn-white border-0 text-secondary px-3" title="Edit"
                                                    onclick="loadUserData(<?php echo $user['id']; ?>)">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn btn-sm btn-white border-0 text-danger px-3" title="Delete"
                                                    onclick="deleteUser(<?php echo $user['id']; ?>)">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">No users found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Update User Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg rounded-4 text-center">
                    <div class="modal-body p-5">
                        <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-pencil-square fs-3"></i>
                        </div>
                        <h5 class="fw-bold">Modify User</h5>
                        <p class="text-muted small mb-4">Editing profile for ID: <strong id="editUserID">#LIB-000</strong></p>
                        <form id="updateUserForm">
                            <input type="hidden" id="updateUserId">
                            <div class="mb-3 text-start">
                                <label class="form-label small fw-bold text-muted text-uppercase">Full Name</label>
                                <input type="text" id="updateUserName" class="form-control bg-light border-0 p-3 rounded-3" required>
                            </div>
                            <div class="mb-3 text-start">
                                <label class="form-label small fw-bold text-muted text-uppercase">Username</label>
                                <input type="text" id="updateUserUsername" class="form-control bg-light border-0 p-3 rounded-3" required>
                            </div>
                            <div class="mb-3 text-start">
                                <label class="form-label small fw-bold text-muted text-uppercase">Email</label>
                                <input type="email" id="updateUserEmail" class="form-control bg-light border-0 p-3 rounded-3" required>
                            </div>
                            <div class="mb-3 text-start">
                                <label class="form-label small fw-bold text-muted text-uppercase">New Password <span class="text-muted fw-normal">(leave blank to keep current)</span></label>
                                <input type="password" id="updateUserPassword" class="form-control bg-light border-0 p-3 rounded-3" placeholder="••••••••">
                            </div>
                            <div class="mb-3 text-start">
                                <label class="form-label small fw-bold text-muted text-uppercase">Role</label>
                                <select id="updateUserRole" class="form-select bg-light border-0 p-3 rounded-3" required>
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?php echo $role['roleid']; ?>"><?php echo htmlspecialchars($role['role']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-dark w-100 p-3 fw-bold rounded-3 mb-2">Save Profile Changes</button>
                            <button type="button" class="btn btn-light w-100 p-3 fw-bold rounded-3 text-muted" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // XSS-safe escape helper
            function esc(str) {
                const d = document.createElement('div');
                d.appendChild(document.createTextNode(str ?? ''));
                return d.innerHTML;
            }

            // Delete user
            function deleteUser(userId) {
                if (!confirm('Are you sure you want to delete this user?')) return;

                fetch('', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: 'action=deleteUser&userId=' + userId
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        if (data.success) location.reload();
                    })
                    .catch(error => console.error('Error:', error));
            }

            // Load user data into edit modal
            function loadUserData(userId) {
                fetch('', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: 'action=getUserById&userId=' + userId
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const user = data.data;
                            document.getElementById('updateUserId').value = user.id;
                            document.getElementById('updateUserName').value = user.name;
                            document.getElementById('updateUserUsername').value = user.username;
                            document.getElementById('updateUserEmail').value = user.email;
                            document.getElementById('updateUserPassword').value = '';
                            document.getElementById('editUserID').textContent = '#LIB-' + String(user.id).padStart(3, '0');

                            const roleSelect = document.getElementById('updateUserRole');
                            roleSelect.value = user.roleid;
                            if (!roleSelect.value) roleSelect.selectedIndex = 0;

                            new bootstrap.Modal(document.getElementById('updateModal')).show();
                        } else {
                            alert('Failed to load user data. Please try again.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            // Update user form
            document.getElementById('updateUserForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const body = 'action=updateUser' +
                    '&userId='   + document.getElementById('updateUserId').value +
                    '&name='     + encodeURIComponent(document.getElementById('updateUserName').value) +
                    '&username=' + encodeURIComponent(document.getElementById('updateUserUsername').value) +
                    '&email='    + encodeURIComponent(document.getElementById('updateUserEmail').value) +
                    '&password=' + encodeURIComponent(document.getElementById('updateUserPassword').value) +
                    '&roleId='   + document.getElementById('updateUserRole').value;

                fetch('', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: body
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        if (data.success) {
                            bootstrap.Modal.getInstance(document.getElementById('updateModal')).hide();
                            location.reload();
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });

            // Search users
            const allUsers = <?php echo json_encode($users); ?>;

            document.getElementById('searchInput').addEventListener('keyup', function() {
                const searchTerm = this.value;

                if (searchTerm.length === 0) {
                    updateUserTable(allUsers);
                    return;
                }

                fetch('', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: 'action=searchUsers&search=' + encodeURIComponent(searchTerm)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) updateUserTable(data.data);
                    })
                    .catch(error => console.error('Error:', error));
            });

            // Rebuild table from search results
            function updateUserTable(users) {
                const tbody = document.getElementById('usersTableBody');
                tbody.innerHTML = '';

                if (users.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="7" class="text-center py-4 text-muted">No users found</td></tr>';
                    return;
                }

                users.forEach(user => {
                    const row = document.createElement('tr');
                    row.setAttribute('data-user-id', user.id);
                    row.innerHTML = `
                        <td class="ps-4 py-3">
                            <div class="text-muted small font-monospace">#${String(user.id).padStart(5, '0')}</div>
                        </td>
                        <td class="py-3"><div class="fw-bold text-dark small">${esc(user.name)}</div></td>
                        <td class="py-3"><div class="small text-muted font-monospace">${esc(user.username)}</div></td>
                        <td class="py-3"><div class="small">${esc(user.nic)}</div></td>
                        <td class="py-3"><div class="small">${esc(user.email)}</div></td>
                        <td class="py-3 text-center">
                            <span class="badge bg-white text-dark border px-3 py-2 fw-semibold rounded-3 small">
                                ${esc(user.role) || 'No Role'}
                            </span>
                        </td>
                        <td class="pe-4 py-3 text-end">
                            <div class="btn-group border rounded-3 p-1 bg-white shadow-sm">
                                <button class="btn btn-sm btn-white border-0 text-secondary px-3" onclick="loadUserData(${user.id})" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn btn-sm btn-white border-0 text-danger px-3" onclick="deleteUser(${user.id})" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            }
        </script>

    </main>

</body>
</html>
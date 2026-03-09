<?php
// 1. Database Configuration
$server = "localhost";
$username = "root";
$password = "";
$database = "minilibrary";

// 2. Create Connection
$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 3. Execute Query
$sql = "SELECT * FROM user,role WHERE user.roleid = role.roleid";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniLibrary Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/assets/css/rollpromotion.css">
</head>

<body class="bg-light">

    <?php include '../../src/Includes/navsidebar.php' ?>

    <div class="content d-flex flex-column flex-grow-1" id="main-content">

<<<<<<< Kirana
        <div class="container-fluid">
            <header class="d-flex justify-content-between align-items-center mb-4 pb-3  shadow-sm">
=======
        <?php include '../Includes/navbar.php' ?>

        <div class="container-fluid mt-5">
            <header class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom bg-white px-3 rounded shadow-sm">
>>>>>>> main
                <div>
                    <h2 class="h4 mb-0  fw-bold">
                        <i class="bi bi-speedometer2 me-2"></i>Admin Dashboard
                    </h2>
                    <small class="text-muted">MiniLibrary Management System</small>
                </div>
                
            </header>

            <!-- <div class="row g-4 mb-4">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card border-0 border-start border-primary border-4 shadow-sm h-100 bg-white">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="text-uppercase fw-bold text-muted small mb-2">Total Users</h6>
                                    <h2 class="display-6 fw-bold mb-0 text-dark">2</h2>
                                </div>
                                <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people-fill fs-3 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card border-0 border-start border-danger border-4 shadow-sm h-100 bg-white">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="text-uppercase fw-bold text-muted small mb-2">Admins</h6>
                                    <h2 class="display-6 fw-bold mb-0 text-dark">1</h2>
                                </div>
                                <div class="rounded-circle bg-danger bg-opacity-10 p-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-badge-fill fs-3 text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card border-0 border-start border-success border-4 shadow-sm h-100 bg-white">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="text-uppercase fw-bold text-muted small mb-2">Librarians</h6>
                                    <h2 class="display-6 fw-bold mb-0 text-dark">1</h2>
                                </div>
                                <div class="rounded-circle bg-success bg-opacity-10 p-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-journal-bookmark fs-3 text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card border-0 border-start border-info border-4 shadow-sm h-100 bg-white">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="text-uppercase fw-bold text-muted small mb-2">Members</h6>
                                    <h2 class="display-6 fw-bold mb-0 text-dark">0</h2>
                                </div>
                                <div class="rounded-circle bg-info bg-opacity-10 p-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-check fs-3 text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card stat-card p-3 shadow-sm delay-1">
                        <div class="d-flex align-items-center">
                            <div class="p-3 rounded-3 me-3" style="background-color: #F8FAF9;">
                                <i class="bi bi-people-fill fs-3 text-primary"></i>
                            </div>
                            <div>
                                <p class="text-muted small mb-0">Total Users</p>
                                <h4 class="fw-bold mb-0" style="color: var(--main-dark);">16,450</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card p-3 shadow-sm delay-2">
                        <div class="d-flex align-items-center">
                            <div class="p-3 rounded-3 me-3" style="background-color: #F8FAF9;">
                                <i class="bi bi-person-badge-fill fs-3 text-danger"></i>
                            </div>
                            <div>
                                <p class="text-muted small mb-0">Admins</p>
                                <h4 class="fw-bold mb-0" style="color: var(--main-dark);">1</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card p-3 shadow-sm delay-3">
                        <div class="d-flex align-items-center">
                            <div class="p-3 rounded-3 me-3" style="background-color: #F8FAF9;">
                                <i class="bi bi-journal-bookmark fs-3"></i>
                            </div>
                            <div>
                                <p class="text-muted small mb-0">Librarians</p>
                                <h4 class="fw-bold mb-0" style="color: var(--main-dark);">1</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card p-3 shadow-sm delay-4">
                        <div class="d-flex align-items-center">
                            <div class="p-3 rounded-3 me-3" style="background-color: #F8FAF9;">
                                <i class="bi bi-person-check fs-3 text-info"></i>
                            </div>
                            <div>
                                <p class="text-muted small mb-0">Members</p>
                                <h4 class="fw-bold mb-0" style="color: var(--main-dark);">15,000</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="card-header bg-white py-3 border-bottom">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0 fw-bold">User Management</h5>
                        </div>
                        
                    </div>
                </div>
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light-subtle border-bottom">
                            <tr class="text-muted small text-uppercase">
                                
                                <th class="ps-4 py-3 border-0">Name</th>
                                <th class="ps-4 py-3 border-0">Username</th>
                                <th class="ps-4 py-3 border-0">NIC</th>
                                <th class="ps-4 py-3 border-0">Email</th>
                                <th class="ps-4 py-3 border-0">Role</th>
                                
                            </tr>
                        </thead>
                        <tbody class="border-top-0" id="usersTableBody">
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    
                                    echo "<td class='ps-4 fw-bold'>" . htmlspecialchars($row["name"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                                    echo "<td class='text-muted'>" . htmlspecialchars($row["nic"]) . "</td>";
                                    echo "<td>
                                            <a href='mailto:" . htmlspecialchars($row["email"]) . "' class='text-decoration-none'>
                                                <i class='bi bi-envelope me-1'></i>" . htmlspecialchars($row["email"]) . "
                                            </a>
                                          </td>";
                                    echo "<td class='pe-4'>
                                            <span class='badge bg-light text-dark border'>" . htmlspecialchars($row["role"]) . "</span>
                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5' class='text-center py-5 text-muted'>
                                        <i class='bi bi-folder-x display-1 d-block mb-3'></i>
                                        No results found in the database.
                                      </td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
                <div class="card-footer bg-white border-top-0 py-3">
                    <nav class="d-flex justify-content-between align-items-center">
                        
                        
                    </nav>
                </div>
            </div>
        </div>

        <script src="public/assets/js/navsidebar.js"></script>
        <script src="public/assets/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        </main>
</body>

</html>
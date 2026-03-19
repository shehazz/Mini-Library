<?php
ob_start();
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

$total_users   = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM user"))['t'];
$total_admins  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM user WHERE roleid = 1"))['t'];
$total_libs    = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM user WHERE roleid = 2"))['t'];
$total_members = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM user WHERE roleid = 3"))['t'];
$total_books   = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM book"))['t'];
$total_borrowed = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM borrowdetails WHERE returndate = '0000-00-00'"))['t'];
$total_overdue = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM borrowdetails WHERE returndate = '0000-00-00' AND duedate < CURDATE()"))['t'];
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniLibrary Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

    <?php include '../../src/Includes/navsidebar.php' ?>

    <div class="content d-flex flex-column flex-grow-1" id="main-content">

        <?php include '../Includes/navbar.php' ?>

        <div class="container-fluid mt-5">
            <header
                class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom bg-white px-3 rounded shadow-sm">
                <div>
                    <h2 class="h4 mb-0  fw-bold">
                        <i class="bi bi-speedometer2 me-2"></i>Welcome Admin
                    </h2>
                    <small class="text-muted">Management System</small>
                </div>
            </header>

            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card stat-card p-3 shadow-sm delay-1 rounded-4">
                        <div class="d-flex align-items-center">
                            <div class="p-3 rounded-3 me-3" style="background-color: #F8FAF9;">
                                <i class="bi bi-people-fill fs-3 "></i>
                            </div>
                            <div>
                                <p class="text-muted small mb-0">Total Users</p>
                                <h4 class="fw-bold mb-0"><?php echo number_format($total_users); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card p-3 shadow-sm delay-2 rounded-4">
                        <div class="d-flex align-items-center">
                            <div class="p-3 rounded-3 me-3" style="background-color: #F8FAF9;">
                                <i class="bi bi-person-badge-fill fs-3 "></i>
                            </div>
                            <div>
                                <p class="text-muted small mb-0">Admins</p>
                                <h4 class="fw-bold mb-0"><?php echo number_format($total_admins); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card p-3 shadow-sm delay-3 rounded-4">
                        <div class="d-flex align-items-center">
                            <div class="p-3 rounded-3 me-3" style="background-color: #F8FAF9;">
                                <i class="bi bi-journal-bookmark fs-3"></i>
                            </div>
                            <div>
                                <p class="text-muted small mb-0">Librarians</p>
                                <h4 class="fw-bold mb-0"><?php echo number_format($total_libs); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card p-3 shadow-sm delay-4 rounded-4">
                        <div class="d-flex align-items-center">
                            <div class="p-3 rounded-3 me-3" style="background-color: #F8FAF9;">
                                <i class="bi bi-person-check fs-3 text-info"></i>
                            </div>
                            <div>
                                <p class="text-muted small mb-0">Members</p>
                                <h4 class="fw-bold mb-0"><?php echo number_format($total_members); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card p-3 shadow-sm delay-1 rounded-4">
                        <div class="d-flex align-items-center">
                            <div class="p-3 rounded-3 me-3" style="background-color: #F8FAF9;">
                                <i class="bi bi-book text-dark" style="font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <p class="text-muted small mb-0">Total Books</p>
                                <h4 class="fw-bold mb-0"><?php echo number_format($total_books); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card p-3 shadow-sm delay-2 rounded-4">
                        <div class="d-flex align-items-center">
                            <div class="p-3 rounded-3 me-3" style="background-color: #F8FAF9;">
                                <i class="bi bi-journal-check text-dark" style="font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <p class="text-muted small mb-0">Borrowed</p>
                                <h4 class="fw-bold mb-0"><?php echo number_format($total_borrowed); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card p-3 shadow-sm delay-3 rounded-4">
                        <div class="d-flex align-items-center">
                            <div class="p-3 rounded-3 me-3" style="background-color: #FEE2E2;">
                                <i class="bi bi-exclamation-triangle text-danger" style="font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <p class="text-muted small mb-0">Overdue</p>
                                <h4 class="fw-bold mb-0 text-danger"><?php echo number_format($total_overdue); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-4" style="border-radius: 12px; background-color: #fff;">
                    <h5 class="fw-bold mb-3" style="color: var(--main-dark);">Quick Actions</h5>
                    <ul class="nav nav-tabs border-0 mb-2" id="quickActionTabs" role="tablist"
                        style="border-bottom: 1px solid #E2E8F0 !important;">
                        <li class="nav-item"><button class="nav-link active custom-tab" data-bs-toggle="tab"
                                data-bs-target="#overview" type="button">Overview</button></li>
                        <li class="nav-item"><button class="nav-link custom-tab" data-bs-toggle="tab"
                                data-bs-target="#add-book" type="button">Add New Book</button></li>
                        <li class="nav-item"><button class="nav-link custom-tab" data-bs-toggle="tab"
                                data-bs-target="#register" type="button">Register User</button></li>
                        <li class="nav-item"><button class="nav-link custom-tab" data-bs-toggle="tab"
                                data-bs-target="#issuebook" type="button">Reserve Book</button></li>
                        <li class="nav-item"><button class="nav-link custom-tab" data-bs-toggle="tab"
                                data-bs-target="#returnbook" type="button">Return Book</button></li>
                    </ul>

                    <div class="tab-content pt-3" id="quickActionContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel">
                            <?php include '../Views/overduetable.php'; ?></div>
                        <div class="tab-pane fade" id="add-book" role="tabpanel">
                            <?php include '../Views/insertbook.php'; ?></div>
                        <div class="tab-pane fade" id="register" role="tabpanel">
                            <?php include '../Views/registerstudent.php'; ?></div>
                        <div class="tab-pane fade" id="issuebook" role="tabpanel">
                            <?php include '../Views/reservebook.php'; ?></div>
                        <div class="tab-pane fade" id="returnbook" role="tabpanel">
                            <?php include '../Includes/returnbook.php'; ?></div>
                    </div>
                </div>

            </div>


        </div>

        <script src="public/assets/js/navsidebar.js"></script>
        <script src="public/assets/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        </main>
</body>

</html>
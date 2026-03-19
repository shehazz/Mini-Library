<?php

session_start();
require_once '../../Config/DBConnection.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../../index.php");
    exit();
}

$db = new DBConnection();
$conn = $db->getConnection();

$logged_username = $_SESSION['username'];
$query = "SELECT name, nic, email FROM user WHERE username = ?";

$stat = $conn->prepare($query);
$stat->bind_param("s", $logged_username);
$stat->execute();
$result = $stat->get_result();

$user = $result->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/navsidebar.css">
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Profile view</title>
</head>

<body>

    <?php include '../Includes/navsidebar.php' ?>

    <div class="content d-flex flex-column flex-grow-1" id="main-content">

        <?php include '../Includes/navbar.php' ?>

        <?php

        require_once '../../Config/DBConnection.php';

        if (!isset($_SESSION['username'])) {
            header("Location: ../../index.php");
            exit();
        }

        $db = new DBConnection();
        $conn = $db->getConnection();

        $logged_username = $_SESSION['username'];
        $query = "SELECT name, nic, email FROM user WHERE username = ?";

        $stat = $conn->prepare($query);
        $stat->bind_param("s", $logged_username);
        $stat->execute();
        $result = $stat->get_result();

        $user = $result->fetch_assoc();

        ?>

        <main class="flex-grow-1" style="overflow-y: auto;">

            <div class="container">

                <div class="row g-4">

                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                            <h5 class="fw-bold mb-4"><i class="bi bi-person-lines-fill me-2"></i>Edit Personal Information</h5>

                            <div class="container mt-5">

                                    <form action="../Controllers/ProfileUpdateController.php" method="POST">

                                        <div class="mb-3">
                                            <label class="form-label text-secondary">Full Name</label>
                                            <input type="text" name="fullname" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label text-secondary">Email Address</label>
                                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label text-secondary">NIC Number</label>
                                            <input type="text" name="nic" class="form-control" value="<?= htmlspecialchars($user['nic']) ?>" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label text-secondary">Username</label>
                                            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($_SESSION['username']) ?>" readonly>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label text-secondary">New Password (leave blank to keep current)</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>

                                        <div class="d-flex gap-2">
                                            <button type="submit" name="update_profile" id="submitbtn" class="btn btn-primary px-4 rounded-pill">Save Changes</button>
                                            <a href="profile.php" class="btn btn-light px-4 rounded-pill">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="../public/assets/js/navsidebar.js"></script>
    <script src="../public/assets/js/bootstrap.bundle.min.js"></script>


</body>


</html>
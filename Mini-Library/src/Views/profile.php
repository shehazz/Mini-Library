<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/css/navsidebar.css">
    <link rel="stylesheet" href="../../public/assets/css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Profile view</title>
</head>

<body>

    <?php

    session_start();
    require_once '../../Config/DBConnection.php';

    if (isset($_SESSION['username'])) {
        header("Location: ../../index.php");
        exit();
    }

    $db = new DBConnection();
    $conn = $db->getConnection();

    $logged_user_id = $_SESSION['username'];
    $query = "SELECT name, nic, email FROM user WHERE username = ?";

    $stat = $conn->prepare($query);
    $stat->bind_param("i", $logged_user_id);
    $stat->execute();
    $result = $stat->get_result();

    $user = $result->fetch_assoc();

    ?>


    <div class="container py-5">

        <div class="row g-4">

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 text-center p-4">
                    <div class="position-relative d-inline-block mx-auto mb-3">
                        <img src="https://ui-avatars.com/api/?name">
                    </div>
                    <h4 class="fw-bold mb-1"><?= $user['name'] ?></h4>
                    <p class="text-muted small mb-3">@<?= $_SESSION['username'] ?></p>
                    <div class="d-grid gap-2">
                        <button id="editbtn">Edit Profile</button>
                        <button id="logoutbtn">Logout</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h5 class="fw-bold mb-4"><i class="bi bi-person-lines-fill me-2"></i>Personal Information</h5>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-secondary">Full Name</div>
                        <div class="col-sm-8 fw-semibold"><?= $user['name'] ?></div>
                    </div>
                    <hr class="text-light">
                    <div class="row mb-3">
                        <div class="col-sm-4 text-secondary">NIC Number</div>
                        <div class="col-sm-8"><?= $user['nic'] ?></div>
                    </div>
                    <hr class="text-light">
                    <div class="row mb-3">
                        <div class="col-sm-4 text-secondary">Email Address</div>
                        <div class="col-sm-8 text-primary"><?= $user['email'] ?></div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm rounded-4 p-3 bg-light">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-white p-3 rounded-3 shadow-sm me-3">
                                    <i class="bi bi-book text-primary fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 text-secondary">Borrowed</h6>
                                    <span class="fw-bold fs-5">05 Books</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm rounded-4 p-3 bg-light">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-white p-3 rounded-3 shadow-sm me-3">
                                    <i class="bi bi-exclamation-triangle text-danger fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 text-secondary">Fine Due</h6>
                                    <span class="fw-bold fs-5">Rs. 250.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../public/assets/js/navsidebar.js"></script>
    <script src="../../public/assets/js/bootstrap.bundle.min.js"></script>


</body>


</html>
<?php
// No ob_start here if it's already in AdminDashboard.php
require_once '../Controllers/RollPromotionController.php';

$RollPromotionController = new RollPromotionController();
$roles = $RollPromotionController->getAllRoles();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/navsidebar.css">
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Add New User</title>
</head>

<body class="bg-light p-4">

    <div class="card border-0 shadow-sm"
        style="border-radius: 12px; border: 1px solid #E2E8F0 !important; background-color: #FFFFFF;">

        <div class="p-4 border-bottom d-flex justify-content-between align-items-center"
            style="border-color: #E2E8F0 !important;">
            <div class="d-flex align-items-center">
                <i class="bi bi-person-plus-fill me-2 fs-5" style="color: #2C3E50;"></i>
                <h5 class="fw-bold mb-0" style="color: #34495E;">Add New User</h5>
            </div>
            <a href="member_directory.php" class="text-decoration-none small fw-bold" style="color: #2C3E50;">
                Member Directory <i class="bi bi-arrow-right-short"></i>
            </a>
        </div>

        <div class="card-body p-4">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row g-4">

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted text-uppercase">Username</label>
                        <input type="text" name="username" class="form-control bg-light border-0 p-2 shadow-none"
                            placeholder="e.g. jhon_doe" style="border-radius: 8px;" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted text-uppercase">Password</label>
                        <input type="password" name="password" class="form-control bg-light border-0 p-2 shadow-none"
                            placeholder="••••••••" style="border-radius: 8px;" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted text-uppercase">Full Name</label>
                        <input type="text" name="fullname" class="form-control bg-light border-0 p-2 shadow-none"
                            placeholder="Enter full name" style="border-radius: 8px;" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted text-uppercase">NIC Number</label>
                        <input type="text" name="nic" class="form-control bg-light border-0 p-2 shadow-none"
                            placeholder="e.g. 199512345678" style="border-radius: 8px;" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted text-uppercase">Email Address</label>
                        <input type="email" name="email" class="form-control bg-light border-0 p-2 shadow-none"
                            placeholder="email@example.com" style="border-radius: 8px;" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted text-uppercase">System Role</label>
                        <select name="roleid" class="form-select bg-light border-0 p-2 shadow-none"
                            style="border-radius: 8px;" required>
                            <option value="" selected disabled>Select Role</option>
                            <?php foreach ($roles as $role): ?>
                                <option value="<?php echo $role['roleid']; ?>">
                                    <?php echo htmlspecialchars($role['role']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                     <div class="col-12 text-center mb-2">
                        <label class="form-label small fw-bold text-muted d-block text-uppercase">Profile
                            Picture</label>
                        <div class="d-inline-block position-relative">
                            <input type="file" name="profile_pic" id="profilePicInput" class="d-none" accept="image/*">
                            <label for="profilePicInput"
                                class="btn btn-light border-0 shadow-sm d-flex align-items-center justify-content-center"
                                style="border-radius: 50%; width: 100px; height: 100px; background-color: #F8FAF9; cursor: pointer; transition: 0.3s;">
                                <i class="bi bi-camera fs-2 text-muted"></i>
                            </label>
                            <small class="text-muted d-block mt-2">Click to upload</small>
                        </div>
                    </div>
                    

                    <div class="col-12 mt-4 d-flex gap-2">
                        <button type="submit" name="add_user" class="btn px-5 py-2 rounded-pill shadow-sm text-white"
                            style="background-color: #728C63; border: none;">
                            <i class="bi bi-check-circle me-2"></i>Save User
                        </button>
                        <button type="reset" class="btn btn-light px-5 py-2 rounded-pill text-muted border"
                            style="background-color: #F8FAF9;">
                            Clear
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <script src="../public/assets/js/navsidebar.js"></script>
    <script src="../public/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
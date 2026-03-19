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
    <title>Register User</title>
</head>

<body>
    <div class="container py-5">
        <div class="card border-0 shadow-sm" style="border-radius: 12px; border: 1px solid #E2E8F0 !important; background-color: #FFFFFF;">
            
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center" style="border-color: #E2E8F0 !important;">
                <div class="d-flex align-items-center">
                    <i class="bi bi-person-plus me-2 fs-5" style="color: #2C3E50;"></i>
                    <h5 class="fw-bold mb-0" style="color: #344767;">Register New User</h5>
                </div>
                <a href="directory.php" class="text-decoration-none small fw-bold" style="color: #4E6A85;">
                    Member Directory <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>

        <div class="card-body p-4">
            <form action="../../src/Controllers/MemberController.php" method="POST">
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted">User Name</label>
                        <input type="text" name="username" class="form-control bg-light border-0 p-2 shadow-none"
                            placeholder="e.g. LIB-2026-001" style="border-radius: 8px;" required>
                    </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label small fw-bold text-secondary text-uppercase" style="letter-spacing: 0.5px;">NIC Number</label>
                            <input type="text" name="nic" class="form-control border-0 py-2 shadow-none" 
                                   style="background-color: #f8f9fa;" placeholder="e.g. 199512345678" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label small fw-bold text-secondary text-uppercase" style="letter-spacing: 0.5px;">Email Address</label>
                            <input type="email" name="email" class="form-control border-0 py-2 shadow-none" 
                                   style="background-color: #f8f9fa;" placeholder="e.g. member@example.com" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label small fw-bold text-secondary text-uppercase" style="letter-spacing: 0.5px;">User Name</label>
                            <input type="text" name="username" class="form-control border-0 py-2 shadow-none" 
                                   style="background-color: #f8f9fa;" placeholder="e.g. johndoe" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label small fw-bold text-secondary text-uppercase" style="letter-spacing: 0.5px;">Password</label>
                            <input type="password" name="password" class="form-control border-0 py-2 shadow-none" 
                                   style="background-color: #f8f9fa;" placeholder="********" required>
                        </div>

                        <div class="col-md-6 mb-4">
                        <label class="form-label small fw-bold text-secondary text-uppercase">Role</label>
                        <select name="roleid" class="form-select border-0 py-2" style="background-color: #f8f9fa;">
                            <option selected disabled>Select Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Librarian</option>
                            <option value="3">Student</option>
                        </select>
                    </div>

                        <div class="col-md-12">
                            <label class="form-label small fw-bold text-muted">UPLOAD PROFILE PICTURE</label>
                            <div class="p-4 text-center"
                                style="border: 2px dashed #E2E8F0; border-radius: 12px; background-color: #F8FAF9;">
                                <i class="bi bi-cloud-arrow-up fs-1" style="color: #4E6A85;"></i>
                                <input type="file" name="profilepic" class="form-control mt-3 shadow-none"
                                    accept="image/*" onblur="validate()" oninput="validate()">
                            </div>
                            <span id="profilepicErr" class="text-danger small"></span>
                        </div>

                    <div class="mt-2">
                        <button type="submit" class="btn px-4 py-2 me-2 text-white shadow-sm" 
                                style="background-color: #7a8e69; border-radius: 25px; border: none;">
                            <i class="bi bi-person-plus-fill me-2" name="register_user"></i>Register Member
                        </button>
                        <button type="reset" class="btn px-4 py-2 bg-white border shadow-sm" 
                                style="border-radius: 25px; color: #6c757d; border-color: #E2E8F0 !important;">
                            Clear Fields
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../public/assets/js/navsidebar.js"></script>
    <script src="../public/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
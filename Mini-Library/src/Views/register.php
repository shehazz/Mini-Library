<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- FIX: removed duplicate Bootstrap CSS (was loaded twice) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center vh-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 shadow-lg rounded-4 overflow-hidden bg-white p-0 d-flex flex-column flex-md-row">

            <div class="col-md-5 bg-primary text-white p-5 d-none d-md-flex flex-column justify-content-center">
                <h2 class="fw-bold">University Library Management System</h2>
                <p class="small opacity-75">v2.0</p>
            </div>

            <div class="col-md-7 p-5">
                <h3 class="fw-bold mb-3">Sign Up</h3>
                <p class="text-muted mb-4">Please enter your details to create an account.</p>

                <?php
                // Show error flash message if redirected back from controller
                if (session_status() === PHP_SESSION_NONE) session_start();
                if (!empty($_SESSION['register_error'])) {
                    echo '<div class="alert alert-danger">' . htmlspecialchars($_SESSION['register_error']) . '</div>';
                    unset($_SESSION['register_error']);
                }
                ?>

                <form name="registerform" action="../../src/Controllers/RegisterController.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Username</label>
                        <input type="text" name="username" class="form-control form-control-lg fs-6"
                            placeholder="Enter your username"
                            oninput="username_validation()" onblur="username_validation()" required>
                        <span id="usernameerror" class="small text-danger"></span>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg fs-6"
                            placeholder="Enter your password"
                            oninput="password_validation()" onblur="password_validation()" required>
                        <span id="passworderror" class="small text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Full Name</label>
                        
                        <input type="text" name="fullname" class="form-control form-control-lg fs-6"
                            placeholder="Enter your full name"
                            oninput="fullname_validation()" onblur="fullname_validation()" required>
                        <span id="fullnameerror" class="small text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">NIC</label>
                        <input type="text" name="nic" class="form-control form-control-lg fs-6"
                            placeholder="Enter your NIC"
                            oninput="nic_validation()" onblur="nic_validation()" required>
                        <span id="nicerror" class="small text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Email</label>
                        <input type="email" name="email" class="form-control form-control-lg fs-6"
                            placeholder="Enter your email address"
                            oninput="email_validation()" required>
                        <span id="emailerror" class="small text-danger"></span>
                    </div>

                    <div class="d-grid">
                        <button type="submit" name="register" class="btn btn-primary btn-lg fs-6 shadow-sm">
                            Sign Up
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script src="../../public/assets/js/signupValidation.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
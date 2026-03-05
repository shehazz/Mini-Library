<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/assets/css/navsidebar.css">
    <link rel="stylesheet" href="public/assets/css/index.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>LMS Home Page</title>
</head>

<body class="d-flex justify-content-center align-items-center min-vh-100">

    <!-- NAVIGATION & SIDEBAR -->



    <!-- RESPONSIVE BODY W/SIDEBAR -->



        <!-- LOGIN FORM -->

        <div class="container">

            <div class="row justify-content-center align-items-center">

                <div class="col-12 shadow-lg rounded-4 overflow-hidden bg-white p-0 d-flex flex-column flex-md-row">
                    <div class="cover col-md-5 text-white p-5 d-none d-md-flex flex-column justify-content-center">
                        <h2 class="fw-bold">University Library Management System</h2>
                        <p class="small opacity-75"> v1.0</p>
                    </div>

                    <div class="col-md-7 p-5">
                        <h3 class="fw-bold mb-3"> Login</h3>
                        <p class="text-muted mb-4">Please enter your credentials to continue.</p>

                        <form name="login" action="src/Controllers/LoginController.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label small fw-bold">Username</label>
                                <input type="text" class="form-control form-control-lg fs-6"
                                    placeholder="Enter your username" oninput="username_validation()"
                                    onblur="username_validation()" id="username" name="username"
                                    required>
                                <span id="usernameerror" class="small text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Password</label>
                                <input type="password" class="form-control form-control-lg fs-6"
                                    placeholder="Enter your password" oninput="password_validation()"
                                    onblur="password_validation()" id="password" name="password"
                                    required>
                                <span id="passworderror" class="small text-danger"></span>
                            </div>

                            <div class="row justify-content-center align-items-center">

                                <div class="col-4 my-4">
                                    <div class="d-grid mb-2">
                                        <button type="submit" name="admin-login" class="button fs-6 p-2 justify-content-center shadow-sm rounded-5">
                                            Sign In
                                        </button>
                                    </div>
                                </div>

                                <div class="row justify-content-center align-items-center">
                                    <div class="col-auto">
                                        Don't have an account ?
                                        <a href="src/Views/register.php" class="fs-6">
                                            Create account
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </form>
                    
                    </div>
                    
                </div>

            </div>

        </div>


    <!-- <?php include 'src/Includes/footer.php' ?> -->

    <script src="public/assets/js/navsidebar.js"></script>
    <script src="public/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
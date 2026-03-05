<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/css/navsidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>LMS Home Page</title>
</head>

<body>
    <nav class="navbar">
        <div class="nav-left col-lg-4 ms-3">
            <button id="toggle-btn"><i class="bi bi-layout-sidebar-inset"></i></button>
            <span class="brand">LibManage<strong>Pro</strong></span>
        </div>
        <div class="col-lg-4 me-3 d-flex justify-content-end align-items-end">
            <input class="form-control me-2 rounded-4" type="search" placeholder="Search" aria-label="Search">
            <button class="btn border rounded-4" type="submit" style="border: #26322E;">Search</button>
        </div>

        <div class="nav-right d-flex align-items-center gap-3 me-3">
            <div class="dropdown">
                <button class="btn btn-outline-secondary rounded-4" type="button" id="roleChangeMenu" data-bs-toggle="dropdown" aria-expanded="false" style="border-color: var(--lms-border);">
                    <i class="bi bi-person-badge"></i> Edit Role
                </button>

                <div class="dropdown-menu dropdown-menu-end p-4 rounded-4 shadow-lg" aria-labelledby="roleChangeMenu" style="width: 300px; border: none;">
                    <h6 class="mb-3" style="color: var(--lms-main);">Update User Role</h6>
                    <form action="src/Actions/update_role.php" method="POST">
                        <div class="mb-2">
                            <label class="form-label small">User NIC</label>
                            <input type="text" name="nic" class="form-control form-control-sm rounded-3" placeholder="Enter NIC" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label small">User Email</label>
                            <input type="email" name="email" class="form-control form-control-sm rounded-3" placeholder="email@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">New Role</label>
                            <select name="role" class="form-select form-select-sm rounded-3">
                                <option value="member">Guest</option>
                                <option value="member" selected>Member</option>
                                <option value="librarian">Librarian</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-sm w-100 rounded-3 text-white" style="background-color: var(--lms-main);">Update Role</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="user-profile">
            <a href="../../src/Views/profile.php">
                <h2>
                    <i class="bi bi-person-circle"></i>
                </h2>
            </a>
        </div>
    </nav>

    <div class="container-fluid">

        <aside class="sidebar shadow" id="sidebar">

            <?php if ($_SESSION['roleid'] = 1): ?>

                <ul class="nav-list d-flex flex-column">
                    <li class="rounded-4"><a href="../Views/home.php"><i class="bi bi-house-door-fill"></i><span class="sidebtn">Home</span></a></li>
                    <li class="rounded-4"><a href="#"><i class="bi bi-ui-checks-grid"></i><span class="sidebtn">Dashboard</span></a></li>
                    <li class="rounded-4"><a href="../Views/rollpromotion.php"><i class="bi bi-person-vcard-fill"></i><span class="sidebtn">Manage Roles</span></a></li>
                    <li class="rounded-4"><a href="#"><i class="bi bi-people-fill"></i><span class="sidebtn">Manage Members</span></a></li>
                    <li class="rounded-4"><a href="#"><span class="sidebtn">Manage Books</span></a></li>
                    <li class="rounded-4 align-items-start mb-auto"><a href="#"><i class="bi bi-cash-stack"></i><span class="sidebtn">Fines & Payments</span></a></li>
                    <li class="rounded-4 align-items-end mt-auto"><a href="#"><i class="bi bi-gear-fill"></i><span class="sidebtn">Settings</span></a></li>
                    <li class="rounded-4"><a href="#"><i class="bi bi-box-arrow-right"></i><span class="sidebtn">Logout</span></a></li>
                </ul>

            <?php elseif ($_SESSION['roleid'] = 2): ?>

                <ul class="nav-list d-flex flex-column">
                    <li class="rounded-4"><a href="src/Views/libariandashboard.php"><i class="bi bi-ui-checks-grid"></i><span class="button">Dashboard</span></a></li>
                    <li class="rounded-4"><a href="#"><i class="bi bi-people-fill"></i><span class="button">Manage Members</span></a></li>
                    <li class="rounded-4"><a href="#"><i class="bi bi-people-fill"></i><span class="sidebtn">Manage Books</span></a></li>
                    <li class="rounded-4 align-items-start mb-auto"><a href="#"><i class="bi bi-cash-stack"></i><span class="sidebtn">Fines & Payments</span></a></li>
                    <li class="rounded-4 align-items-end mt-auto"><a href="#"><i class="bi bi-gear-fill"></i><span class="sidebtn">Settings</span></a></li>
                    <li class="rounded-4"><a href="#"><i class="bi bi-box-arrow-right"></i><span class="sidebtn">Logout</span></a></li>
                </ul>

            <?php elseif ($_SESSION['roleid'] = 3): ?>

                <ul class="nav-list d-flex flex-column">
                    <li class="rounded-4 active"><a href="src/Views/libariandashboard.php"><i class="bi bi-ui-checks-grid"></i><span class="button">Home</span></a></li>
                    <li class="rounded-4 align-items-start mb-auto"><a href="#"><i class="bi bi-cash-stack"></i><span class="sidebtn">Fines & Payments</span></a></li>
                    <li class="rounded-4 align-items-end mt-auto"><a href="#"><i class="bi bi-gear-fill"></i><span class="sidebtn">Settings</span></a></li>
                    <li class="rounded-4"><a href="#"><i class="bi bi-box-arrow-right"></i><span class="sidebtn">Logout</span></a></li>
                </ul>

            <?php elseif ($_SESSION['roleid'] = 4): ?>

                <ul class="nav-list d-flex flex-column">
                    <li class="rounded-4 active"><a href="src/Views/libariandashboard.php"><i class="bi bi-ui-checks-grid"></i><span class="button">Home</span></a></li>
                    <li class="rounded-4 align-items-end mt-auto"><a href="#"><i class="bi bi-gear-fill"></i><span class="sidebtn">Settings</span></a></li>
                    <li class="rounded-4"><a href="#"><i class="bi bi-box-arrow-right"></i><span class="sidebtn">Logout</span></a></li>
                </ul>

            <?php endif; ?>

        </aside>

    </div>

    <script src="../../public/assets/js/navsidebar.js"></script>
    <script src="../../public/assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>
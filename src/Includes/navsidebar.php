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

    <aside class="sidebar" id="sidebar">

        <?php if ($_SESSION['roleid'] = 1): ?>

            <ul class="nav-list d-flex flex-column">
                <li class="rounded-4" id="toggle-btn"><a href="#"><i class="bi bi-list"></i></a></li>
                <li class="rounded-4"><a href="../Views/home.php"><i class="bi bi-house-door-fill"></i><span class="sidebtn">Home</span></a></li>
                <li class="rounded-4"><a href="../Views/AdminDashboard.php"><i class="bi bi-ui-checks-grid"></i><span class="sidebtn">Dashboard</span></a></li>
                <li class="rounded-4"><a href="../Views/rollpromotion.php"><i class="bi bi-person-vcard-fill"></i><span class="sidebtn">Manage Roles</span></a></li>
                <li class="rounded-4"><a href="#"><i class="bi bi-people-fill"></i><span class="sidebtn">Manage Members</span></a></li>
                <li class="rounded-4"><a href="#"><i class="bi bi-journal-arrow-up"></i><span class="sidebtn">Manage Books</span></a></li>
                <li class="rounded-4"><a href="../Views/MemberReservedbook.php"><i class="bi bi-cart-dash-fill"></i><span class="sidebtn">Reserved Books</span></a></li>
                <li class="rounded-4 align-items-start mb-auto"><a href="../Views/finesview.php"><i class="bi bi-cash-stack"></i><span class="sidebtn">Fines & Payments</span></a></li>
                <li class="rounded-4 align-items-end mt-auto"><a href="#"><i class="bi bi-gear-fill"></i><span class="sidebtn">Settings</span></a></li>
                <li class="rounded-4"><a href="../Controllers/logoutController.php"><i class="bi bi-box-arrow-right"></i><span class="sidebtn">Logout</span></a></li>
            </ul>

        <?php elseif ($_SESSION['roleid'] == 2): ?>

            <ul class="nav-list d-flex flex-column">
                <li class="rounded-4"><a href="../Views/home.php"><i class="bi bi-house-door-fill"></i><span class="sidebtn">Home</span></a></li>
                <li class="rounded-4"><a href="../Views/AdminDashboard.php"><i class="bi bi-ui-checks-grid"></i><span class="sidebtn">Dashboard</span></a></li>
                <li class="rounded-4"><a href="../Views/rollpromotion.php"><i class="bi bi-person-vcard-fill"></i><span class="sidebtn">Manage Roles</span></a></li>
                <li class="rounded-4"><a href="#"><i class="bi bi-people-fill"></i><span class="sidebtn">Manage Members</span></a></li>
                <li class="rounded-4"><a href="#"><i class="bi bi-journal-arrow-up"></i><span class="sidebtn">Manage Books</span></a></li>
                <li class="rounded-4"><a href="../Views/MemberReservedbook.php"><i class="bi bi-cart-dash-fill"></i><span class="sidebtn">Reserved Books</span></a></li>
                <li class="rounded-4 align-items-start mb-auto"><a href="../Views/finesview.php"><i class="bi bi-cash-stack"></i><span class="sidebtn">Fines & Payments</span></a></li>
                <li class="rounded-4 align-items-end mt-auto"><a href="#"><i class="bi bi-gear-fill"></i><span class="sidebtn">Settings</span></a></li>
                <li class="rounded-4"><a href="#"><i class="bi bi-box-arrow-right"></i><span class="sidebtn">Logout</span></a></li>
            </ul>

        <?php elseif ($_SESSION['roleid'] == 3): ?>

            <ul class="nav-list d-flex flex-column">
                <li class="rounded-4"><a href="../Views/home.php"><i class="bi bi-house-door-fill"></i><span class="sidebtn">Home</span></a></li>
                <li class="rounded-4"><a href="../Views/AdminDashboard.php"><i class="bi bi-ui-checks-grid"></i><span class="sidebtn">Dashboard</span></a></li>
                <li class="rounded-4"><a href="../Views/rollpromotion.php"><i class="bi bi-person-vcard-fill"></i><span class="sidebtn">Manage Roles</span></a></li>
                <li class="rounded-4"><a href="#"><i class="bi bi-people-fill"></i><span class="sidebtn">Manage Members</span></a></li>
                <li class="rounded-4"><a href="#"><i class="bi bi-journal-arrow-up"></i><span class="sidebtn">Manage Books</span></a></li>
                <li class="rounded-4"><a href="../Views/MemberReservedbook.php"><i class="bi bi-cart-dash-fill"></i><span class="sidebtn">Reserved Books</span></a></li>
                <li class="rounded-4 align-items-start mb-auto"><a href="../Views/finesview.php"><i class="bi bi-cash-stack"></i><span class="sidebtn">Fines & Payments</span></a></li>
                <li class="rounded-4 align-items-end mt-auto"><a href="#"><i class="bi bi-gear-fill"></i><span class="sidebtn">Settings</span></a></li>
                <li class="rounded-4"><a href="#"><i class="bi bi-box-arrow-right"></i><span class="sidebtn">Logout</span></a></li>
            </ul>

        <?php elseif ($_SESSION['roleid'] == 4): ?>

            <ul class="nav-list d-flex flex-column">
                <li class="rounded-4"><a href="../Views/home.php"><i class="bi bi-house-door-fill"></i><span class="sidebtn">Home</span></a></li>
                <li class="rounded-4"><a href="../Views/AdminDashboard.php"><i class="bi bi-ui-checks-grid"></i><span class="sidebtn">Dashboard</span></a></li>
                <li class="rounded-4"><a href="../Views/rollpromotion.php"><i class="bi bi-person-vcard-fill"></i><span class="sidebtn">Manage Roles</span></a></li>
                <li class="rounded-4"><a href="#"><i class="bi bi-people-fill"></i><span class="sidebtn">Manage Members</span></a></li>
                <li class="rounded-4"><a href="#"><i class="bi bi-journal-arrow-up"></i><span class="sidebtn">Manage Books</span></a></li>
                <li class="rounded-4"><a href="../Views/MemberReservedbook.php"><i class="bi bi-cart-dash-fill"></i><span class="sidebtn">Reserved Books</span></a></li>
                <li class="rounded-4 align-items-start mb-auto"><a href="../Views/finesview.php"><i class="bi bi-cash-stack"></i><span class="sidebtn">Fines & Payments</span></a></li>
                <li class="rounded-4 align-items-end mt-auto"><a href="#"><i class="bi bi-gear-fill"></i><span class="sidebtn">Settings</span></a></li>
                <li class="rounded-4"><a href="#"><i class="bi bi-box-arrow-right"></i><span class="sidebtn">Logout</span></a></li>
            </ul>

        <?php endif; ?>

    </aside>


    <script src="../../public/assets/js/navsidebar.js"></script>
    <script src="../../public/assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>
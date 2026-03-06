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

    <main class="content" id="main-content">

        <div class="container-fluid">
            <header class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom bg-white px-3 rounded shadow-sm">
                <div>
                    <h2 class="h4 mb-0 text-primary fw-bold">
                        <i class="bi bi-speedometer2 me-2"></i>Admin Dashboard
                    </h2>
                    <small class="text-muted">MiniLibrary Management System</small>
                </div>
                <div class="text-end">
                    <a href="rollpromotion.php" class="btn btn-outline-primary btn-sm fw-bold">
                        <i class="bi bi-plus-lg me-1"></i> Add Role
                    </a>
                </div>
            </header>

            <div class="row g-4 mb-4">
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
            </div>

            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="card-header bg-white py-3 border-bottom">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0 fw-bold">User Management</h5>
                        </div>
                        <div class="col text-end">
                            <div class="input-group input-group-sm w-auto d-inline-flex">
                                <input type="text" class="form-control" placeholder="Search users...">
                                <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light text-secondary">
                                <tr>
                                    <th class="ps-4">ID</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Email Address</th>
                                    <th>NIC Number</th>
                                    <th class="text-center">Account Role</th>
                                </tr>
                            </thead>
                            <tbody class="border-top-0">
                                <tr>
                                    <td class="ps-4 fw-bold text-muted">1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center me-2 fw-bold" style="width: 35px; height: 35px; font-size: 0.8rem;">AK</div>
                                            Amodh Kushan
                                        </div>
                                    </td>
                                    <td>amodhkushan</td>
                                    <td>amodhkushan@gmail.com</td>
                                    <td><code class="text-dark">200507801424</code></td>
                                    <td class="text-center">
                                        <span class="badge rounded-pill border border-dark  px-3">Admin</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold text-muted">2</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center me-2 fw-bold" style="width: 35px; height: 35px; font-size: 0.8rem;">JD</div>
                                            Jayodya Dewmini
                                        </div>
                                    </td>
                                    <td>dewminijdh</td>
                                    <td>jayodyadewmini@gmail.com</td>
                                    <td><code class="text-dark">200515014530</code></td>
                                    <td class="text-center">
                                        <span class="badge rounded-pill border border-dark  px-3">Librarian</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0 py-3">
                    <nav class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Showing 2 of 2 entries</small>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                        </ul>
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
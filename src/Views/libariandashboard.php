<?php
require_once __DIR__ . '/../Controllers/OverdueBookController.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian Dashboard</title>
    <link rel="stylesheet" href="../../public/assets/css/navsidebar.css">
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/css/dashboradstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<body>
    <?php include '../../src/Includes/navsidebar.php' ?>

    <div class="content d-flex flex-column flex-grow-1" id="main-content">

        <?php include '../Includes/navbar.php' ?>

            <div class="container-fluid mt-5">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h3 class="fw-bold mb-0" style="color: var(--main-dark);">Welcome! Libarian</h3>
                        <small class="text-muted">MAR 04, 2026 | Wednesday</small>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="card stat-card p-3 shadow-sm delay-1">
                            <div class="d-flex align-items-center">
                                <div class="p-3 rounded-3 me-3" style="background-color: #F8FAF9;">
                                    <i class="bi bi-book text-dark" style="font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <p class="text-muted small mb-0">Total Books</p>
                                    <h4 class="fw-bold mb-0" style="color: var(--main-dark);">12,450</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card p-3 shadow-sm delay-2">
                            <div class="d-flex align-items-center">
                                <div class="p-3 rounded-3 me-3" style="background-color: #F8FAF9;">
                                    <i class="bi bi-journal-check text-dark" style="font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <p class="text-muted small mb-0">Borrowed</p>
                                    <h4 class="fw-bold mb-0" style="color: var(--main-dark);">680</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card p-3 shadow-sm delay-3">
                            <div class="d-flex align-items-center">
                                <div class="p-3 rounded-3 me-3" style="background-color: #FEE2E2;">
                                    <i class="bi bi-exclamation-triangle text-danger" style="font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <p class="text-muted small mb-0">Overdue</p>
                                    <h4 class="fw-bold mb-0 text-danger"><?php echo $overdueCount; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card p-3 shadow-sm delay-4">
                            <div class="d-flex align-items-center">
                                <div class="p-3 rounded-3 me-3" style="background-color: #F8FAF9;">
                                    <i class="bi bi-people text-dark" style="font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <p class="text-muted small mb-0">Members</p>
                                    <h4 class="fw-bold mb-0" style="color: var(--main-dark);">15,000</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-4" style="border-radius: 12px; background-color: #fff;">
                    <h5 class="fw-bold mb-3" style="color: var(--main-dark);">Quick Actions</h5>
                    <ul class="nav nav-tabs border-0 mb-2" id="quickActionTabs" role="tablist" style="border-bottom: 1px solid #E2E8F0 !important;">
                        <li class="nav-item"><button class="nav-link active custom-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button">Overview</button></li>
                        <li class="nav-item"><button class="nav-link custom-tab" data-bs-toggle="tab" data-bs-target="#add-book" type="button">Add New Book</button></li>
                        <li class="nav-item"><button class="nav-link custom-tab" data-bs-toggle="tab" data-bs-target="#register" type="button">Register Member</button></li>
                        <li class="nav-item"><button class="nav-link custom-tab" data-bs-toggle="tab" data-bs-target="#issuebook" type="button">Reserve Book</button></li>
                        <li class="nav-item"><button class="nav-link custom-tab" data-bs-toggle="tab" data-bs-target="#returnbook" type="button">Return Book</button></li>
                    </ul>

                    <div class="tab-content pt-3" id="quickActionContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"><?php include __DIR__ . '/overduetable.php'; ?></div>
                        <div class="tab-pane fade" id="add-book" role="tabpanel"><?php include __DIR__ . '/insertbook.php'; ?></div>
                        <div class="tab-pane fade" id="register" role="tabpanel"><?php include __DIR__ . '/registerstudent.php'; ?></div>
                        <div class="tab-pane fade" id="issuebook" role="tabpanel"><?php include __DIR__ . '/reservebook.php'; ?></div>
                        <div class="tab-pane fade" id="returnbook" role="tabpanel"><?php include __DIR__ . '/returnbook.php'; ?></div>
                    </div>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
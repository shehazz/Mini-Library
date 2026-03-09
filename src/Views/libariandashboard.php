<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian Dashboard</title>
    <link rel="stylesheet" href="../../public/assets/css/navsidebar.css">
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/css/dashboradstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<<<<<<< HEAD
<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

=======
</head>
<<<<<<< HEAD
>>>>>>> 7f1600e (Refactor controllers/views; update dashboard UI)
=======

>>>>>>> 66c717b (correction)
<body>

<<<<<<< HEAD

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
                                    <h4 class="fw-bold mb-0 text-danger">24</h4>
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
=======
=======
</head>

<body>

<<<<<<< HEAD
>>>>>>> 7f1600e (Refactor controllers/views; update dashboard UI)
=======
>>>>>>> 66c717b391986eed31f2354722d6452803ae4aa0
>>>>>>> 80a064e3a9c10b09a020d08483bb605fc5e0c67a
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Mini-Library/src/Includes/navsidebar.php'; ?>

    <main class="main-content" style="margin-left: var(--sidebar-width); transition: margin 0.3s ease;">
        <div class="container-fluid p-4">

<<<<<<< HEAD
<<<<<<< HEAD

=======
            
>>>>>>> 7f1600e (Refactor controllers/views; update dashboard UI)
=======

>>>>>>> 66c717b (correction)
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold mb-0" style="color: var(--main-dark);">Welcome, Librarian</h3>
                    <small class="text-muted">
                        <?= date('M d, Y | l') ?>
                    </small>
                </div>
            </div>

<<<<<<< HEAD
<<<<<<< HEAD

            <div class="row g-3 mb-4">
                <?php
                $stats = [
                    ['icon' => 'bi-book', 'label' => 'Total Books', 'value' => '12,450', 'bg' => '#F8FAF9', 'color' => 'text-dark', 'danger' => false],
                    ['icon' => 'bi-journal-check', 'label' => 'Borrowed', 'value' => '680', 'bg' => '#F8FAF9', 'color' => 'text-dark', 'danger' => false],
                    ['icon' => 'bi-exclamation-triangle', 'label' => 'Overdue', 'value' => '24', 'bg' => '#FEE2E2', 'color' => 'text-danger', 'danger' => true],
                    ['icon' => 'bi-people', 'label' => 'Members', 'value' => '15,000', 'bg' => '#F8FAF9', 'color' => 'text-dark', 'danger' => false],
=======
            
            <div class="row g-3 mb-4">
                <?php
                $stats = [
                    ['icon' => 'bi-book',               'label' => 'Total Books', 'value' => '12,450', 'bg' => '#F8FAF9', 'color' => 'text-dark',   'danger' => false],
                    ['icon' => 'bi-journal-check',      'label' => 'Borrowed',    'value' => '680',    'bg' => '#F8FAF9', 'color' => 'text-dark',   'danger' => false],
                    ['icon' => 'bi-exclamation-triangle','label' => 'Overdue',    'value' => '24',     'bg' => '#FEE2E2', 'color' => 'text-danger', 'danger' => true],
                    ['icon' => 'bi-people',             'label' => 'Members',     'value' => '15,000', 'bg' => '#F8FAF9', 'color' => 'text-dark',   'danger' => false],
>>>>>>> 7f1600e (Refactor controllers/views; update dashboard UI)
=======

            <div class="row g-3 mb-4">
                <?php
                $stats = [
                    ['icon' => 'bi-book', 'label' => 'Total Books', 'value' => '12,450', 'bg' => '#F8FAF9', 'color' => 'text-dark', 'danger' => false],
                    ['icon' => 'bi-journal-check', 'label' => 'Borrowed', 'value' => '680', 'bg' => '#F8FAF9', 'color' => 'text-dark', 'danger' => false],
                    ['icon' => 'bi-exclamation-triangle', 'label' => 'Overdue', 'value' => '24', 'bg' => '#FEE2E2', 'color' => 'text-danger', 'danger' => true],
                    ['icon' => 'bi-people', 'label' => 'Members', 'value' => '15,000', 'bg' => '#F8FAF9', 'color' => 'text-dark', 'danger' => false],
>>>>>>> 66c717b (correction)
                ];
                foreach ($stats as $i => $stat): ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="card stat-card p-3 shadow-sm delay-<?= $i + 1 ?> h-100">
                            <div class="d-flex align-items-center">
                                <div class="p-3 rounded-3 me-3 flex-shrink-0" style="background-color: <?= $stat['bg'] ?>;">
                                    <i class="bi <?= $stat['icon'] ?> <?= $stat['color'] ?>" style="font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <p class="text-muted small mb-0"><?= $stat['label'] ?></p>
                                    <h4 class="fw-bold mb-0 <?= $stat['danger'] ? 'text-danger' : '' ?>"
                                        style="<?= !$stat['danger'] ? 'color: var(--main-dark);' : '' ?>">
                                        <?= $stat['value'] ?>
                                    </h4>
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 7f1600e (Refactor controllers/views; update dashboard UI)
=======
=======
>>>>>>> 80a064e3a9c10b09a020d08483bb605fc5e0c67a
>>>>>>> 7f1600e (Refactor controllers/views; update dashboard UI)
=======
>>>>>>> 66c717b391986eed31f2354722d6452803ae4aa0
                                </div>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
<<<<<<< HEAD
                </div>

<<<<<<< HEAD
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
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"><?php include '../Includes/overduetable.php'; ?></div>
                        <div class="tab-pane fade" id="add-book" role="tabpanel"><?php include '../Includes/addbook.php'; ?></div>
                        <div class="tab-pane fade" id="register" role="tabpanel"><?php include '../Includes/registerstudent.php'; ?></div>
                        <div class="tab-pane fade" id="issuebook" role="tabpanel"><?php include '../Views/reservebook.php'; ?></div>
                        <div class="tab-pane fade" id="returnbook" role="tabpanel"><?php include '../Includes/returnbook.php'; ?></div>
                    </div>
                </div>
=======
                <?php endforeach; ?>
>>>>>>> 7f1600e (Refactor controllers/views; update dashboard UI)
            </div>
        </main>

<<<<<<< HEAD
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
=======
            
=======

>>>>>>> 66c717b (correction)
=======
                <?php endforeach; ?>
            </div>

<<<<<<< HEAD
<<<<<<< HEAD
            
>>>>>>> 7f1600e (Refactor controllers/views; update dashboard UI)
=======

>>>>>>> 66c717b (correction)
=======

>>>>>>> 66c717b391986eed31f2354722d6452803ae4aa0
>>>>>>> 80a064e3a9c10b09a020d08483bb605fc5e0c67a
            <div class="card border-0 shadow-sm p-4" style="border-radius: 12px; background-color: #fff;">
                <h5 class="fw-bold mb-3" style="color: var(--main-dark);">Quick Actions</h5>

                <ul class="nav nav-tabs border-0 mb-2" id="quickActionTabs" role="tablist"
                    style="border-bottom: 1px solid #E2E8F0 !important;">
                    <?php
                    $tabs = [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 66c717b (correction)
                        ['id' => 'overview', 'label' => 'Overview'],
                        ['id' => 'add-book', 'label' => 'Add New Book'],
                        ['id' => 'register', 'label' => 'Register Member'],
                        ['id' => 'issuebook', 'label' => 'Reserve Book'],
                        ['id' => 'returnbook', 'label' => 'Return Book'],
<<<<<<< HEAD
                    ];
                    foreach ($tabs as $i => $tab): ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link custom-tab <?= $i === 0 ? 'active' : '' ?>" id="tab-<?= $tab['id'] ?>"
                                data-bs-toggle="tab" data-bs-target="#<?= $tab['id'] ?>" type="button" role="tab"
                                aria-controls="<?= $tab['id'] ?>" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>">
=======
                        ['id' => 'overview',    'label' => 'Overview'],
                        ['id' => 'add-book',    'label' => 'Add New Book'],
                        ['id' => 'register',    'label' => 'Register Member'],
                        ['id' => 'issuebook',   'label' => 'Reserve Book'],
                        ['id' => 'returnbook',  'label' => 'Return Book'],
                    ];
                    foreach ($tabs as $i => $tab): ?>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link custom-tab <?= $i === 0 ? 'active' : '' ?>"
                                id="tab-<?= $tab['id'] ?>"
                                data-bs-toggle="tab"
                                data-bs-target="#<?= $tab['id'] ?>"
                                type="button"
                                role="tab"
                                aria-controls="<?= $tab['id'] ?>"
                                aria-selected="<?= $i === 0 ? 'true' : 'false' ?>">
>>>>>>> 7f1600e (Refactor controllers/views; update dashboard UI)
=======
                    ];
                    foreach ($tabs as $i => $tab): ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link custom-tab <?= $i === 0 ? 'active' : '' ?>" id="tab-<?= $tab['id'] ?>"
                                data-bs-toggle="tab" data-bs-target="#<?= $tab['id'] ?>" type="button" role="tab"
                                aria-controls="<?= $tab['id'] ?>" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>">
>>>>>>> 66c717b (correction)
                                <?= $tab['label'] ?>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="tab-content pt-3" id="quickActionContent">
<<<<<<< HEAD
<<<<<<< HEAD
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="tab-overview">
                        <?php include $_SERVER['DOCUMENT_ROOT'] . '/Mini-Library/src/Views/overduetable.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="add-book" role="tabpanel" aria-labelledby="tab-add-book">
                        <?php include $_SERVER['DOCUMENT_ROOT'] . '/Mini-Library/src/Views/Insertbook.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="tab-register">
                        <?php include $_SERVER['DOCUMENT_ROOT'] . '/Mini-Library/src/Views/registerstudent.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="issuebook" role="tabpanel" aria-labelledby="tab-issuebook">
=======
                    <div class="tab-pane fade show active" id="overview"   role="tabpanel" aria-labelledby="tab-overview">
=======
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="tab-overview">
>>>>>>> 66c717b (correction)
                        <?php include $_SERVER['DOCUMENT_ROOT'] . '/Mini-Library/src/Views/overduetable.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="add-book" role="tabpanel" aria-labelledby="tab-add-book">
                        <?php include $_SERVER['DOCUMENT_ROOT'] . '/Mini-Library/src/Views/Insertbook.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="tab-register">
                        <?php include $_SERVER['DOCUMENT_ROOT'] . '/Mini-Library/src/Views/registerstudent.php'; ?>
                    </div>
<<<<<<< HEAD
                    <div class="tab-pane fade" id="issuebook"  role="tabpanel" aria-labelledby="tab-issuebook">
>>>>>>> 7f1600e (Refactor controllers/views; update dashboard UI)
=======
                    <div class="tab-pane fade" id="issuebook" role="tabpanel" aria-labelledby="tab-issuebook">
>>>>>>> 66c717b (correction)
                        <?php include $_SERVER['DOCUMENT_ROOT'] . '/Mini-Library/src/Views/reservebook.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="returnbook" role="tabpanel" aria-labelledby="tab-returnbook">
                        <?php include $_SERVER['DOCUMENT_ROOT'] . '/Mini-Library/src/Views/returnbook.php'; ?>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
</html>
>>>>>>> 7f1600e (Refactor controllers/views; update dashboard UI)
=======

</html>
>>>>>>> 66c717b (correction)
=======
=======
>>>>>>> 80a064e3a9c10b09a020d08483bb605fc5e0c67a
</html>
>>>>>>> 7f1600e (Refactor controllers/views; update dashboard UI)
=======

</html>
>>>>>>> 66c717b (correction)
=======

</html>
>>>>>>> 66c717b391986eed31f2354722d6452803ae4aa0

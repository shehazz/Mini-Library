<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/assets/css/dashboradstyle.css">
</head>

<body>
    <div class="container my-4">
        <div class="row">
            <h2>Book Management</h2>
        </div>
        <div class="row">
            <div
                class="d-flex flex-wrap align-items-center justify-content-between gap-3 p-3 bg-white rounded shadow-sm">

                <div class="d-flex flex-grow-1 align-items-center gap-3" style="min-width: 300px;">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0 ps-0 shadow-none"
                            placeholder="Search by Title, Author, ISBN...">
                    </div>

                    <div class="d-none d-lg-flex gap-3 text-secondary small text-nowrap align-items-center">
                        <div class="dropdown">
                            <span class="cursor-pointer dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="bi bi-filter me-1"></i> Category
                            </span>
                            <ul class="dropdown-menu shadow-sm">
                                <li><a class="dropdown-item" href="#">Fiction</a></li>
                                <li><a class="dropdown-item" href="#">Science</a></li>
                            </ul>
                        </div>
                        <span class="cursor-pointer"><i class="bi bi-check-circle me-1"></i> Available</span>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="index.php?action=add-book" class="btn btn-teal px-3 shadow-none">
                        <i class="bi bi-plus-lg me-1"></i> Add Book
                    </a>

                    <a href="index.php?action=return-book" class="btn px-3 shadow-none"
                        style="background-color: #DCFCE7; color: #166534; border: 1px solid #BBF7D0;">
                        <i class="bi bi-arrow-return-left me-1"></i> Return Book
                    </a>

                    <a href="../Views/editbook.php" class="btn px-3 shadow-none"
                        style="background-color: #E0F2FE; color: #0369A1; border: 1px solid #BAE6FD;">
                        <i class="bi bi-pencil-square me-1"></i> Edit Book
                    </a>
                </div>
            </div>
        </div>

    </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <?php include '../Includes/booktable.php'; ?>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
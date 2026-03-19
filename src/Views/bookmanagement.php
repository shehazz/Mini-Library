<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-journal-bookmark-fill me-2"></i>Book Manager</a>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Inventory Overview</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">
                <i class="bi bi-plus-lg"></i> Add New Book
            </button>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Books</h5>
                        <p class="card-text fs-2">1,240</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Available</h5>
                        <p class="card-text fs-2">856</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Borrowed</h5>
                        <p class="card-text fs-2">384</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Book List</h5>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control form-control-sm" placeholder="Search by title or author...">
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ISBN</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>978-0143127550</td>
                                <td><strong>The Martian</strong></td>
                                <td>Andy Weir</td>
                                <<td>Sci-Fi</td>
                                <td><span class="badge bg-success">In Stock</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>978-0062315007</td>
                                <td><strong>The Alchemist</strong></td>
                                <td>Paulo Coelho</td>
                                <td>Fiction</td>
                                <td><span class="badge bg-warning text-dark">Lent Out</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
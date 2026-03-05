<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Book | Librarian Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/dashboradstyle.css">
</head>

<body>
    <div class="container py-4">
        <div class="card border-0 shadow-sm"
            style="border-radius: 12px; border: 1px solid #E2E8F0 !important; background-color: #FFFFFF;">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center"
                style="border-color: #E2E8F0 !important;">
                <div class="d-flex align-items-center">
                    <i class="bi bi-book me-2 fs-5" style="color: var(--main-light);"></i>
                    <h5 class="fw-bold mb-0" style="color: var(--main-dark);">Add Book</h5>
                </div>
                <a href="bookmanagement.php" class="text-decoration-none small fw-bold"
                    style="color: var(--main-light);">
                    Inventory List <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>

            <div class="card-body p-4">
                <form action="/Mini-Library-1/src/Controllers/insertbook.php" method="POST" enctype="multipart/form-data"
                    onsubmit="return validate()">
                    <div class="row g-4">

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">BOOK TITLE</label>
                            <input type="text" name="bookname" class="form-control bg-light border-0 p-2 shadow-none"
                                placeholder="e.g. Madolduwa" onblur="validate()" oninput="validate()">
                            <span id="booknameErr" class="text-danger small"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">AUTHOR NAME</label>
                            <input type="text" name="author" class="form-control bg-light border-0 p-2 shadow-none"
                                placeholder="e.g. James Clear" onblur="validate()" oninput="validate()">
                            <span id="authorErr" class="text-danger small"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">ISBN NUMBER</label>
                            <input type="text" name="isbn" class="form-control bg-light border-0 p-2 shadow-none"
                                placeholder="e.g. 978-0735211292" onblur="validate()" oninput="validate()">
                            <span id="isbnErr" class="text-danger small"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">BOOK PRICE</label>
                            <input type="text" name="bookprice" class="form-control bg-light border-0 p-2 shadow-none"
                                placeholder="e.g. 1500.00" onblur="validate()" oninput="validate()">
                            <span id="priceErr" class="text-danger small"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">CATEGORY</label>
                            <select name="category" class="form-select bg-light border-0 p-2 shadow-none"
                                onblur="validate()" oninput="validate()">
                                <option value="" selected disabled>Choose Category...</option>
                                <option value="Fiction">Fiction</option>
                                <option value="Science">Science</option>
                                <option value="History">History</option>
                                <option value="Biography">Biography</option>
                                <option value="Travel">Travel</option>
                                <option value="Novel">Novel</option>
                                <option value="Cooking">Light Novel</option>
                            </select>
                            <span id="categoryErr" class="text-danger small"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">NO. OF COPIES</label>
                            <input type="number" name="bookquantity"
                                class="form-control bg-light border-0 p-2 shadow-none" value="1" min="1"
                                onblur="validate()" oninput="validate()">
                            <span id="copiesErr" class="text-danger small"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label small fw-bold text-muted">DESCRIPTION / SUMMARY</label>
                            <textarea name="description" class="form-control bg-light border-0 p-2 shadow-none"
                                rows="3" onblur="validate()" oninput="validate()"></textarea>
                            <span id="descriptionErr" class="text-danger small"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label small fw-bold text-muted">UPLOAD COVER PAGE</label>
                            <div class="p-4 text-center"
                                style="border: 2px dashed #E2E8F0; border-radius: 12px; background-color: #F8FAF9;">
                                <i class="bi bi-cloud-arrow-up fs-1" style="color: #728C63;"></i>
                                <input type="file" name="coverimg" class="form-control mt-3 shadow-none"
                                    accept="image/*" onblur="validate()" oninput="validate()">
                            </div>
                            <span id="coverimgErr" class="text-danger small"></span>
                        </div>

                        <div class="col-12 mt-2 d-flex gap-2">
                            <button type="submit" name="save_book"
                                class="btn px-4 py-2 rounded-pill shadow-sm text-white"
                                style="background-color: #728C63;">
                                <i class="bi bi-plus-circle me-2"></i>Add Book
                            </button>
                            <button type="reset" class="btn btn-light px-4 py-2 rounded-pill text-muted border">
                                Clear Fields
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/Mini-Library-1/public/assets/js/addbookvalidation.js"></script>

    <!-- SweetAlert2 status popups -->
    <?php
        $status = $_GET['status'] ?? '';
    ?>
    <script>
        const status = "<?= htmlspecialchars($status) ?>";

        if (status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Book Added!',
                text: 'The book has been successfully added to the library.',
                confirmButtonColor: '#728C63',
                confirmButtonText: 'OK'
            });
        } else if (status === 'error') {
            Swal.fire({
                icon: 'error',
                title: 'Failed!',
                text: 'Something went wrong. Please try again.',
                confirmButtonColor: '#728C63',
                confirmButtonText: 'Try Again'
            });
        } else if (status === 'empty') {
            Swal.fire({
                icon: 'warning',
                title: 'Missing Fields',
                text: 'Please fill in all required fields.',
                confirmButtonColor: '#728C63',
                confirmButtonText: 'OK'
            });
        }
    </script>

</body>
</html>
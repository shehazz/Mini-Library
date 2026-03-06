<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../public/assets/css/dashboradstyle.css">
</head>

<body>
    <div class="card border-0 shadow-sm"
        style="border-radius: 12px; border: 1px solid #E2E8F0 !important; background-color: #FFFFFF;">
        <div class="p-4 border-bottom d-flex justify-content-between align-items-center"
            style="border-color: #E2E8F0 !important;">
            <div class="d-flex align-items-center">
                <i class="bi bi-pencil-square me-2 fs-5" style="color: #6B8E61;"></i>
                <h5 class="fw-bold mb-0" style="color: #4A6741;">Edit Book Details</h5>
            </div>
            <a href="index.php?action=manage-books" class="text-decoration-none small fw-bold" style="color: #6B8E61;">
                Back to Inventory <i class="bi bi-arrow-right-short"></i>
            </a>
        </div>

        <div class="card-body p-4">
            <form action="index.php?action=update-book" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $book['id'] ?>">

                <div class="row g-4">

                    <div class="col-md-12">
                        <label class="form-label small fw-bold text-muted">BOOK TITLE</label>
                        <input type="text" name="title" class="form-control bg-light border-0 p-2 shadow-none"
                            value="<?= htmlspecialchars($book['title']) ?>" style="border-radius: 8px;" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted">AUTHOR NAME</label>
                        <input type="text" name="author" class="form-control bg-light border-0 p-2 shadow-none"
                            value="<?= htmlspecialchars($book['author']) ?>" style="border-radius: 8px;" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted">ISBN NUMBER</label>
                        <input type="text" name="isbn" class="form-control bg-light border-0 p-2 shadow-none"
                            value="<?= htmlspecialchars($book['isbn']) ?>" style="border-radius: 8px;" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted">CATEGORY</label>
                        <select name="category" class="form-select bg-light border-0 p-2 shadow-none"
                            style="border-radius: 8px;">
                            <option value="Fiction" <?= $book['category'] == 'Fiction' ? 'selected' : '' ?>>Fiction
                            </option>
                            <option value="Science" <?= $book['category'] == 'Science' ? 'selected' : '' ?>>Science
                            </option>
                            <option value="History" <?= $book['category'] == 'History' ? 'selected' : '' ?>>History
                            </option>
                            <option value="Self-Help" <?= $book['category'] == 'Self-Help' ? 'selected' : '' ?>>Self-Help
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted">NUMBER OF COPIES</label>
                        <input type="number" name="copies" class="form-control bg-light border-0 p-2 shadow-none"
                            value="<?= $book['copies'] ?>" style="border-radius: 8px;" required>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label small fw-bold text-muted">DESCRIPTION</label>
                        <textarea name="description" class="form-control bg-light border-0 p-2 shadow-none" rows="3"
                            style="border-radius: 8px;"><?= htmlspecialchars($book['description']) ?></textarea>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label small fw-bold text-muted d-block">BOOK COVER PAGE</label>

                        <div class="d-flex align-items-center gap-4 p-3 bg-light rounded"
                            style="border: 1px dashed #CBD5E1;">
                            <div class="text-center">
                                <p class="extra-small text-muted mb-1" style="font-size: 10px;">Current Cover</p>
                                <img src="<?= htmlspecialchars($book['cover_image']) ?>" class="rounded shadow-sm"
                                    style="width: 70px; height: 100px; object-fit: cover; border: 1px solid #E2E8F0;">
                            </div>

                            <div class="flex-grow-1">
                                <p class="small text-muted mb-2">Select a new image to replace the current one</p>
                                <input type="file" name="cover_image"
                                    class="form-control form-control-sm border-0 shadow-none bg-white">
                                <input type="hidden" name="existing_cover" value="<?= $book['cover_image'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-4 d-flex gap-2">
                        <button type="submit" name="update_book"
                            class="btn px-5 py-2 rounded-pill shadow-sm text-white fw-bold"
                            style="background-color: #728C63; border: none;">
                            Update Book Details
                        </button>
                        <a href="index.php?action=manage-books"
                            class="btn btn-light px-4 py-2 rounded-pill text-muted border"
                            style="background-color: #F8FAF9;">
                            Cancel
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</body>

</html>
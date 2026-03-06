<?php
    include 'src/Controllers/BookController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $book['bookname']; ?>
    </title>
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        
        .book-card {
            max-width: 900px;
            margin: 50px auto;
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 30px;
        }

        .rules-box {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border-left: 5px solid #374e30;
        }

        .badge {
            background-color: #5b7254;
        }

        .buttn1 {
            background-color: #6B8E61;
            height: 50px;
            width: 350px;
        }

        .buttn2 {
            border-color: #6B8E61;
            background-color: #e9f3e6;
            color: #6B8E61;
            height: 50px;
            width: 350px;

        }
    </style>
</head>

<body class="bg-light">

    <div class="container">
        <div class="book-card bg-white shadow">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="display-6 fw-bold"><?php echo $bookname; ?></h1>
                    <p class="lead text-muted">By <?php echo $author; ?></p>
                    <p><strong>Category:</strong> <span
                            class="badge d-flex p-2 justify-content-between align-items-between"><?php echo $category; ?></span>
                    </p>

                    <hr class="my-4">

                    <div class="rules-section">
                        <h5 class="fw-bold">Borrowing Rules</h5>
                        <div class="rules-box small">
                            <ul class="mb-0">
                                <li><strong>Loan Period:</strong> Must return within 2 weeks (14 days).</li>
                                <li><strong>Overdue Fine:</strong> After 2 weeks, a fine of
                                    <strong>$<?php echo number_format($calculatedFine, 2); ?></strong>
                                    (<?php echo $fineRate; ?>%) will be added daily until returned.
                                </li>
                                <li><strong>Damage Policy:</strong> If the book is damaged, you must inform the
                                    librarian and pay the full value of
                                    <strong>$<?php echo number_format($bookPrice, 2); ?></strong>.
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" value="" id="ruleCheck" required>
                        <label class="form-check-label fw-bold" for="ruleCheck">
                            I agree to the library rules and conditions.
                        </label>
                    </div>
                </div>

                <div class="col-md-5 text-center d-flex flex-column justify-content-between">
                    <div>
                        <img src="<?php echo $coverimg; ?>" alt="Book Cover" class="img-fluid rounded shadow-sm mb-4"
                            style="max-height: 350px;">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="buttn1 btn-lg rounded-pill fw-bold text-light" id="confirmBtn"
                            disabled>
                            Confirm Reservation
                        </button>
                        <button type="button" class="buttn2 btn-lg rounded-pill fw-bold">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="public/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
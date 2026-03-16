<?php

session_start();
$_SESSION['nic'] = '200513433433';
include '../Controllers/reservebookcontroller.php'; 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $bookname ?? 'Book Details'; ?></title>
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/css/reservebook.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container">
    <div class="book-card bg-white shadow">
        <form method="POST" action="reservebook.php">
            <input type="hidden" name="isbn" value="<?php echo $isbn; ?>">
            <input type="hidden" name="confirm_reservation" value="1">

            <div class="row">
                <div class="col-md-7">
                    <h1 class="fw-bold bname mb-1"><?php echo $bookname; ?></h1>
                    <span class="fs-5 mb-3 text2">by <?php echo $author; ?></span>

                    <div class="mt-3">
                        <div class="row g-0 mb-1 align-items-center">
                            <div class="col-auto text1 vertical-line">ISBN</div>
                            <div class="col-auto px-2 text1">:</div>
                            <div class="col text2 ps-1"><?php echo $isbn; ?></div>
                        </div>

                        <div class="row g-0 mb-1 align-items-center">
                            <div class="col-auto text1 vertical-line">Category</div>
                            <div class="col-auto px-2 text1">:</div>
                            <div class="col text2 ps-1"><?php echo $category; ?></div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div>
                        <h5 class="fw-bold text1">Borrowing Rules</h5>
                        <div class="rules-box small">
                            <p><i class="bi bi-exclamation-diamond-fill text1 me-2"></i> <strong class="text1"> Loan Period  :</strong> <span class="text2"> Must return within 2 weeks (14 days).</span></p>

                            <p><i class="bi bi-exclamation-diamond-fill text1 me-2"></i> <strong class="text1">Overdue Fine :</strong> 
                            <span class="text2"> After 2 weeks, a fine of <strong>$<?php echo number_format($fineamount, 2); ?></strong>
                            (<?php echo $dailyrate; ?>%) will be added <span class="ms-4"> daily until returned.</span></span></p>

                            <p><i class="bi bi-exclamation-diamond-fill text1 me-2"></i><strong class="text1"> Damage Policy :</strong>
                            <span class="text2"> If the book is damaged, you must inform the <span class="ms-4"> librarian and pay the full value of
                            <strong>$<?php echo number_format($bookprice, 2); ?></strong>.</span></span></p>
                        
                        </div>
                    </div>

                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="ruleCheck" required>
                        <label class="form-check-label fw-bold text1" for="ruleCheck">I agree to the library rules and conditions.</label>
                    </div>
                </div>

                <div class="col-md-5 text-center d-flex flex-column justify-content-between">
                    <div>
                        <img src="<?php echo $coverimg; ?>" alt="Book Cover" class="img-fluid rounded shadow-sm mb-4" style="max-height: 350px;">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="buttn1 btn-lg rounded-pill fw-bold text-light" id="confirmBtn" name="add" disabled>
                            Confirm Reservation
                        </button>
                        <button type="button" class="buttn2 btn-lg rounded-pill fw-bold" onclick="window.history.back();">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../../public/assets/js/bootstrap.bundle.min.js"></script>
<script src="../../public/assets/js/reservebook.js"></script>
</body>
</html>
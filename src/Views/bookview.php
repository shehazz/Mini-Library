<?php
include '../Controllers/bookviewcontroller.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($book['bookname']); ?></title>
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/css/bookview.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="coverpage d-flex align-items-center justify-content-center">
        <h1 class="display-4 fw-bold text-uppercase"><i class="bi bi-journal-richtext"></i> Test Book</h1>
    </div>

    <div class="container overlap-content pb-5">
        <div class="row g-4">
            <div class="col-md-4 col-lg-3">
                <div class="bookcard shadow border-0 rounded-4 overflow-hidden">

                    <img src="data:image/jpeg;base64,<?php echo base64_encode($book['coverimg']); ?>"
                        class="img-fluid rounded-4" alt="<?php echo htmlspecialchars($book['bookname']); ?>">

                    <div class="card-body mt-3 text-center">
                        <a href="../Views/reservebook.php?isbn=<?php echo urlencode($book['isbn']); ?>"
                            class="text-decoration-none">
                            <?php if (($book['available_count'] ?? 0) > 0): ?>
                                <button class="borrowbtn rounded-pill">Borrow</button>
                            <?php else: ?>
                                <button class="stockout rounded-pill" disabled>Out of Stock</button>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-lg-9 pt-md-5 mt-md-5">
                <div class="ps-md-4">
                    <h1 class="fw-bold bname mb-1"><?php echo htmlspecialchars($book['bookname']); ?></h1>
                    <p class="fs-5 text2 mb-2">by <span
                            class="text2"><?php echo htmlspecialchars($book['author']); ?></span></p>
                    <div>
                        <div class="row g-0 mb-1 align-items-center">
                            <div class="col-auto text1 vertical-line">ISBN</div>
                            <div class="col-auto px-2 text1">:</div>
                            <div class="col text2 ps-1"><?php echo htmlspecialchars($book['isbn']); ?></div>
                        </div>

                        <div class="row g-0 mb-1 align-items-center">
                            <div class="col-auto text1 vertical-line">Category</div>
                            <div class="col-auto px-2 text1">:</div>
                            <div class="col text2 ps-1"><?php echo htmlspecialchars($book['category']); ?></div>
                        </div>
                    </div>

                    <hr class="opacity-25 my-4">

                    <div class="description-section">
                        <span class="text1 mb-3">Description</span>
                        <p class="text2 lh-lg"><?php echo htmlspecialchars($book['description']); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-1">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <h4 class="fw-bold text1 mb-0">More books in this category...</h4>
                <a href="#" class="text-decoration-none text2 fw-semibold">
                    View All <i class="bi bi-chevron-double-right"></i>
                </a>
            </div>

            <div class="row row-cols-2 row-cols-md-4 g-5 ">
                <?php foreach ($relatedBooks as $related): ?>
                    <div class="col">
                        <div class="bookcard h-100 border-0 shadow-sm rounded-4 text-center p-3">

                            <img src="data:image/jpeg;base64,<?php echo base64_encode($related['coverimg']); ?>"
                                class="img-fluid rounded-3" alt="Book Cover">

                            <div class="card-body pt-0 text-center">
                                <small
                                    class="d-block fw-bold mt-3 text1"><?php echo htmlspecialchars($related['bookname']); ?></small>
                                <small class="text-muted d-block mb-1 text2">by
                                    <?php echo htmlspecialchars($related['author']); ?></small>

                                <a href="../Views/reservebook.php?isbn=<?php echo urlencode($related['isbn']); ?>">
                                    <button class="borrowbtn rounded-pill mt-2">Borrow</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="../../public/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
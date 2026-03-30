<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/navsidebar.css">
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>LMS Home Page</title>
</head>

<body>

    <?php include '../Includes/navsidebar.php' ?>

    <div class="content d-flex flex-column flex-grow-1" id="main-content">

        <?php include '../Includes/navbar.php' ?>

        <main class="flex-grow-1" style="overflow-y: auto;">

            <?php

            require_once '../Models/homemodel.php';

            $bookModel = new BookModel();
            $result = $bookModel->getHomeBooks(12);

            ?>

            <div class="container mt-5">
                <div class="row">
                    <?php while ($book = $result->fetch_assoc()): ?>

                        <div class="bcard col-lg-2 col-md-3 col-sm-6 g-4">

                            <a href="bookview.php?isbn=<?php echo $book['isbn']; ?>" class="text-decoration-none text-dark">
                                <div class="card shadow rounded-4" id="card">
                                    <div class="card-body">

                                        <div class="card bg-dark text-white d-flex align-items-end">
                                            <img src='data:image/jpeg;base64,<?php echo base64_encode($book["coverimg"]); ?>' class="img-fluid rounded-3" id="cover-img">
                                            <div class="card-img-overlay shadow-lg d-flex flex-column justify-content-end">
                                                <h5 class="card-title fw-bold shadow-lg"><?php echo $book['bookname']; ?></h5>
                                                <p class="card-subtitle text-light shadow-lg">by <?php echo $book['author']; ?></p>
                                            </div>
                                        </div>
                                        <!-- <p>Category: <?php echo $book['category_name']; ?></p> -->
                                        <!-- <p>ISBN: <?php echo $book['isbn']; ?></p> -->
                                        <div class="d-flex justify-content-center align-items-center">
                                            <hr class="w-75">
                                        </div>
                            </a>

                            <?php if ($book['available_count'] > 0): ?>
                                <div class="d-flex justify-content-center align-items-center w-auto">
                                    <a href="reservebook.php?isbn=<?php echo $book['isbn']; ?>" class="text-decoration-none">
                                        <button class="borrow-btn btn btn-sm rounded-4 px-5" id="borrowbtn">Borrow</button>
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="d-flex justify-content-center align-items-center w-auto">
                                    <button class="borrow-btn btn btn-sm rounded-4 px-5" id="notavailablebtn" disabled>Not Available</button>
                                </div>
                            <?php endif; ?>

                        </div>
                </div>
            </div>
        <?php endwhile; ?>


        </main>

    </div>

    <script src="../public/assets/js/navsidebar.js"></script>
    <script src="../public/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
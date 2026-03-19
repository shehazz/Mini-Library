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

            require_once '../../Config/DBConnection.php';

            $db = new DBConnection();
            $conn = $db->getConnection();

            $query = "SELECT 
            b.bookname,
            b.coverimg,
            b.author,
            b.isbn,
            b.categoryid,
            b.description,
            cat.category,
          (SELECT COUNT(*) FROM bookcopies bc 
           WHERE bc.isbn = b.isbn AND bc.availability = 'Available') as available_count
          FROM book b LEFT JOIN bookcategory cat ON b.categoryid = cat.category
          LIMIT 12";
            $result = $conn->query($query);

            ?>

            <div class="container mt-5">
                <div class="row">
                    <?php while ($book = $result->fetch_assoc()): ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 g-4">

                            <a href="bookview.php?isbn=<?php echo $book['isbn']; ?>" class="text-decoration-none text-dark">
                                <div class="card h-100 shadow rounded-4" id="card">
                                    <div class="card-body">

                                        <?php if ($book['available_count'] > 0): ?>
                                            <div>
                                                <span class="badge bg-success">Available</span>
                                            </div>
                                        <?php else: ?>
                                            <div>
                                                <span class="badge bg-danger">Issued</span>
                                            </div>
                                        <?php endif; ?>

                                        <img src="coverimg/<?php echo $book['coverimg']; ?>" class="img-fluid" alt="Book Cover"
                                            class="rounded-3">
                                        <h5 class="card-title fw-bold"><?php echo $book['bookname']; ?></h5>
                                        <h6 class="card-subtitle fw-bold mb-3">by <?php echo $book['author']; ?></h6>
                                        <p>Category: <?php echo $book['category']; ?></p>
                                        <p>ISBN: <?php echo $book['isbn']; ?></p>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <hr class="w-75">
                                        </div>
                            </a>

                            <?php if ($book['available_count'] > 0): ?>
                                <div class="d-flex justify-content-center align-items-center w-auto">
                                    <a href="reservebook.php?isbn=<?php echo $book['isbn']; ?>" class="text-decoration-none">
                                        <button class="btn btn-sm rounded-5 px-5" id="borrowbtn">Borrow</button>
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="d-flex justify-content-center align-items-center w-auto">
                                    <button class="btn btn-sm rounded-5 px-5" id="notavailablebtn" disabled>Not Available</button>
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
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

            $query = "SELECT b.bookname, b.author, b.isbn, b.categoryid, b.description, 
          (SELECT COUNT(*) FROM bookcopies bc 
           WHERE bc.isbn = b.isbn AND bc.availability = 'Available') as available_count
          FROM book b 
          LIMIT 12";
            $result = $conn->query($query);
            ?>

            <div class="container mt-5">
                <div class="row">
                    <?php while ($book = $result->fetch_assoc()): ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 g-4">
                            <a href="bookview.php?isbn=<?php echo $book['isbn']; ?>" class="text-decoration-none">
                                <div class="card h-100 shadow rounded-4" id="card">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold"><?php echo $book['bookname']; ?></h5>
                                        <h6 class="card-subtitle mb-2">by <?php echo $book['author']; ?></h6>
                                        <p class="small">ISBN: <?php echo $book['isbn']; ?></p>


                                        <?php if ($book['available_count'] > 0): ?>
                                            <div class="">
                                                <span class="badge bg-success">Available</span>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center w-auto mt-5">
                                                <button class="btn btn-sm px-5 py-2 rounded-4" id="borrowbtn">Borrow</button>
                                            </div>
                                        <?php else: ?>
                                            <div class="">
                                                <span class="badge bg-danger">Issued</span>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center w-auto mt-5">
                                                <button class="btn btn-sm px-5 py-2 rounded-4" id="borrowbtn" disabled>Borrow</button>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>

                </div>
            </div>


        </main>

    </div>

    <script src="../public/assets/js/navsidebar.js"></script>
    <script src="../public/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
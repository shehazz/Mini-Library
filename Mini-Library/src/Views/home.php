<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/navsidebar.css">
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>LMS Home Page</title>
</head>

<body>

    <?php include '../Includes/navsidebar.php' ?>

    <main class="content mt-5" id="main-content">

        <?php

        require_once '../../Config/DBConnection.php';

        $db = new DBConnection();
        $conn = $db->getConnection();

        $query = "SELECT b.bookname, b.author, b.isbn, b.category, b.description, 
          (SELECT COUNT(*) FROM bookcopies bc 
           WHERE bc.isbn = b.isbn AND bc.availability = 'Available') as available_count
          FROM book b 
          LIMIT 12";
        $result = $conn->query($query);
        ?>

        <div class="container mt-5">
            <h3>Available Books</h3>
            <div class="row">
                <?php while ($book = $result->fetch_assoc()): ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <a href="bookview.php?isbn=<?php echo $book['isbn']; ?>" class="text-decoration-none">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold"><?php echo $book['bookname']; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">by <?php echo $book['author']; ?></h6>
                                    <p class="small text-muted">ISBN: <?php echo $book['isbn']; ?></p>


                                    <?php if ($book['available_count'] > 0): ?>
                                        <button class="btn btn-sm btn-success">Borrow</button>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Issued</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>


    </main>

    

    <script src="../public/assets/js/navsidebar.js"></script>
    <script src="../public/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
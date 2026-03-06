<?php
include 'src/Controllers/BookController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $book['bookname']; ?></title>
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/css/bookview.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

    <?php
    require_once '../../Config/DBConnection.php';

    $db = new DBConnection();
    $conn = $db->getConnection();

    $isbn = $_GET['isbn'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM book WHERE isbn = ?");
    $stmt->bind_param("s", $isbn);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();

    if (!$book) {
        die("Book not found!");
    }
    ?>

    <div class="container my-5">

        <div class="row mb-5 pb-5 border-bottom">
            <div class="col-md-4 col-lg-3 text-center">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    <img src="coverimg/<?php echo $book['coverimg']; ?>">
                    <div class="card-body bg-white">
                        
                        <div class="d-flex gap-2">
                            <a href="../Views/reservebook.php"><button class="borrowbtn rounded-pill mx-1 py-2">Borrow</button></a>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-lg-9 mt-4 mt-md-0">
                <h1 class="fw-bold"><?php echo htmlspecialchars($book['bookname']); ?></h1>
                <p class="text-secondary fs-6"><big class="fw-bold text-dark">By :  </big><?php echo htmlspecialchars($book['author']); ?></p>

                <div class="mt-2">
                    <p><strong> ISBN  :</strong> <span class="text-muted"> <?php echo htmlspecialchars($book['isbn']); ?></span>
                    <br><strong> Category  :</strong> <span class="text-muted"> <?php echo htmlspecialchars($book['category']); ?></span></p>
                    <hr class="text-muted opacity-25">
                    <h5 class="fw-bold mt-4">Description</h5>
                    <p class="text-muted lh-lg">
                        <?php echo htmlspecialchars($book['description']); ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">More books in this category...</h4>
            <a href="#" class="text-decoration-none text-dark fw-semibold">View All <i
                    class="bi bi-chevron-double-right"></i></a>
        </div>

        <div class="row row-cols-2 row-cols-md-4 g-4">
            <?php          
                for ($i = 0; $i < 4; $i++):
            ?>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-3 bg-white">
                        <img src="https://via.placeholder.com/150x200" class="card-img-top rounded-3" alt="Interest Cover">
                        <div class="card-body px-0 pb-0">
                            <button class="borrowbtn rounded-pill mt-2">Borrow</button>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>

    </div>

    <script src="public/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
include 'src/Controllers/BookController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Search
    </title>
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        .rounded-pill-start {
            border-radius: 50rem 0 0 50rem;
        }

        .rounded-pill-end {
            border-radius: 0 50rem 50rem 0;
        }

        .book-card {
            transition: transform 0.3s ease, shadow 0.3s ease;
        }

        .book-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(8, 43, 7, 0.1);
        }
    </style>

</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-normal"><i class="bi bi-journal-richtext h2 me-3"></i>Search Books</h2>
            <p class="text-muted"> by Book Name or Author Name...</p>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <form action="search.php" method="POST" class="input-group">
                    <span class="input-group-text bg-white border-end-0 rounded-pill-start">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" name="query" class="form-control border-start-0 rounded-pill-end shadow-sm py-2"
                        value="<?php echo isset($_POST['query']) ? htmlspecialchars($_POST['query']) : ''; ?>">
                </form>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php if (mysqli_num_rows($books) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($books)): ?>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm text-center p-3 book-card">
                            <div class="mb-3" style="height: 200px;">
                                <img src="coverimg/<?php echo $row['coverimg']; ?>" class="rounded h-100 w-100 shadow-sm"
                                    style="object-fit: cover;" alt="Cover">
                            </div>
                            <div class="card-body p-1">
                                <h6 class="card-title fw-bold mb-1">
                                    <?php echo htmlspecialchars($row['bookname']); ?>
                                    <i class="bi bi-chevron-double-right small text-muted"></i>
                                </h6>
                                <p class="card-text text-muted small">
                                    by <?php echo htmlspecialchars($row['author']); ?>
                                </p>
                                <a href="src/Views/reservebook.php?id=<?php echo $row['id']; ?>" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12 text-center text-muted">
                    <p>No books found. Try a different title or author.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <script src="public/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
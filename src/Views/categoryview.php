<?php
require_once '../Models/bookviewmodel.php';
$model = new BookModel();

$catId = $_GET['categoryid'] ?? null;
if (!$catId) die("Category not found.");

$books = $model->getAvailableBooksByCategory($catId);
$categoryName = $books[0]['category'] ?? "Books";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category - <?php echo $categoryName; ?></title>
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/css/categoryview.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

    <div class="d-flex align-items-center ps-5">
        <p class="display-4 catname mb-3 mt-3 text-uppercase">Category: <?php echo $categoryName; ?></p>
    </div>

    <div class="container overlap-content pb-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php if (empty($books)): ?>
                <div class="col-12 text-center mt-5">
                    <h3 class="text-muted">No available books in this category right now.</h3>
                </div>
            <?php else: ?>
                <?php foreach ($books as $row): ?>
                    <div class="col">
                        <a href='bookview.php?isbn=<?php echo $row["isbn"]; ?>' class="text-decoration-none">
                        <div class="bookcard shadow-sm">
                            <div class="image-container">
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['coverimg']); ?>" 
                                 alt="Cover" class="rounded-3 mb-2">
                            </div>
                            
                            <div class="card-body-fixed">
                                <h6 class="fw-bold text1 mb-1"><?php echo htmlspecialchars($row['bookname']); ?></h6>
                                <p class="small text2 mb-2">by <?php echo htmlspecialchars($row['author']); ?></p>
                                
                                <a href="reservebook.php?isbn=<?php echo $row['isbn']; ?>">
                                    <button class="borrowbtn rounded-pill w-100">Borrow</button>
                                </a>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
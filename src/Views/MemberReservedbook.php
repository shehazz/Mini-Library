<?php
require_once("../../Config/DBConnection.php");

$db = new DBConnection();
$conn = $db->getConnection();

$sql = "SELECT 
            id,   
            bookname, 
            isbn, 
            category,
            author, 
            coverimg, 
            bookprice, 
            description,
            bookquantity
        FROM book AS bd
        INNER JOIN book AS b ON bd.isbn = b.isbn 
        ORDER BY bd.id DESC";

if (isset($_POST['add'])) {
    $bookname = $_POST['bookname'];
    $isbn = $_POST['isbn'];
    $duedate = $_POST['duedate'];
    $returnday = $_POST['returnday'];

    $sql = "INSERT INTO borrowdetails (bookname,isbn, duedate, returnday)
            VALUES ('$bookname','$isbn','$duedate','$returnday')";

    if ($conn->query($sql)) {
        $message = "Book added successfully";
    } else {
        $message = "Error: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM borrowdetails ORDER BY id DESC");
$books = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniLib | Management Console</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../public/assets/css/rollpromotion.css">
</head>

<body>

    <?php include '../../src/Includes/navsidebar.php' ?>

    <div class="content d-flex flex-column flex-grow-1" id="main-content">

        <?php include '../Includes/navbar.php' ?>

        <div class="container-fluid mt-5">

            <div class="row mb-5 align-items-center">
                <div class="col">
                    <h4 class="fw-bold mb-1">Update and Grant permissions</h4>
                    <p class="text-muted small mb-0">Control system access levels.</p>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">

                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light-subtle border-bottom">
                            <tr class="text-muted small text-uppercase">
                                <th class="py-3 fw-bold border-0">BookName</th>
                                <th class="py-3 fw-bold border-0">isbn</th>
                                <th class="py-3 fw-bold border-0">duedate</th>
                                <th class="py-3 fw-bold border-0">returndate</th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($books)): ?>
                                <?php foreach ($books as $book): ?>
                                    <tr>
                                        <td><?php echo $book['id']; ?></td>
                                        <td><?php echo $book['bookname']; ?></td>
                                        <td><?php echo $book['duedate']; ?></td>
                                        <td><?php echo $book['returnday']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">No books found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>



                    </table>
                </div>
            </div>
        </div>




</body>

</html>
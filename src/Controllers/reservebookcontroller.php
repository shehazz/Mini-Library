<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../Models/bookviewmodel.php';

class ReserveController
{
    private $bookModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    public function handlePostRequest()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_reservation'])) {

        if (!isset($_SESSION['nic']) || empty($_SESSION['nic'])) {
            echo "<script>
                alert('Session Error: No user found. Please log in again.');
                window.location.href='login.php'; 
            </script>";
            exit();
        }

        $isbn = $_POST['isbn'] ?? null;
        $nic = $_SESSION['nic'];
        $dueDate = date('Y-m-d', strtotime('+14 days'));

        if (!$isbn) {
            echo "<script>alert('Error: Missing ISBN data.');</script>";
            return;
        }

        if ($this->bookModel->reserveBook($nic, $isbn, $dueDate)) {
            header("Location: bookview.php?isbn=$isbn&status=success");
            exit();
        } else {
            echo "<script>alert('Database Error: Check if you already have this book.');</script>";
        }
    }
}

    public function getReservationData()
    {
        $isbn = $_REQUEST['isbn'] ?? null;
        if (!$isbn)
            die("Error: No ISBN provided.");

        $book = $this->bookModel->getBookByIsbn($isbn);
        if (!$book)
            die("Error: Book not found.");

        // Ensure category exists for the view
        if (!isset($book['category']))
            $book['category'] = "General";

        // Calculations
        $book['bookprice'] = $book['bookprice'] ?? 0.00;
        $book['fineamount'] = $book['bookprice'] * 0.05;
        $book['dailyrate'] = 5;
        $book['coverimg'] = "../../public/assets/images/coverimg/" . ($book['coverimg'] ?? 'default.jpg');

        return $book;
    }
}

$resController = new ReserveController();
$resController->handlePostRequest(); // Logic to save
$data = $resController->getReservationData(); // Logic to display
extract($data);
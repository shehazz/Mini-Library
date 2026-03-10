<?php
require_once '../Models/bookviewmodel.php';

if (session_status() === PHP_SESSION_NONE) { session_start(); }

class ReserveController {
    private $bookModel;

    public function __construct() {
        $this->bookModel = new BookModel();
    }

    public function getReservationData() {
        $isbn = $_GET['isbn'] ?? $_POST['isbn'] ?? null;
        if (!$isbn) die("Error: No ISBN provided.");

        $book = $this->bookModel->getBookByIsbn($isbn);
        if (!$book) die("Error: Book not found.");
 
        $book['bookprice'] = $book['bookprice'] ?? 20.00;
        $book['dailyrate'] = 5; 
        $book['fineamount'] = $book['bookprice'] * ($book['dailyrate'] / 100);
        $book['coverimg'] = "coverimg/" . $book['coverimg'];

        return $book;
    }

    public function handlePostRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_reservation'])) {
            
            $isbn = $_POST['isbn'];
            // Use the NIC from your session or a form input
            $nic = $_SESSION['nic'] ?? '000000000000'; 
            
            // Due date is 14 days from today
            $dueDate = date('Y-m-d', strtotime('+14 days'));

            if ($this->bookModel->reserveBook($nic, $isbn, $dueDate)) {
                header("Location: ../Views/bookview.php?isbn=$isbn&status=reserved");
                exit();
            } else {
                echo "Database Error: Could not record borrowing details.";
            }
        }
    }
}

$resController = new ReserveController();
$resController->handlePostRequest();
$data = $resController->getReservationData();
extract($data);
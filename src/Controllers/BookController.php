<?php

require_once __DIR__ . '/../Models/BookModel.php';

class BookController
{
    private $bookModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    /**
     * Process POST request from the add-book form and insert record.
     */
    public function saveBook()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['save_book'])) {
            return; // nothing to do
        }

        $bookname = trim($_POST['bookname'] ?? '');
        $author = trim($_POST['author'] ?? '');
        $isbn = trim($_POST['isbn'] ?? '');
        $category = trim($_POST['category'] ?? '');
        $copies = $_POST['copies'];
        $description = trim($_POST['description'] ?? '');
        $coverBlob = trim($_POST['coverimg'] ?? '');
        // other fields (copies/description/rating) are currently not stored

        $coverBlob = null;
        if (!empty($_FILES['coverimg']['tmp_name']) && is_uploaded_file($_FILES['coverimg']['tmp_name'])) {
            $coverBlob = file_get_contents($_FILES['coverimg']['tmp_name']);
        }

        try {
            $this->bookModel->insertBook($bookname, $author, $isbn, $category, $copies, $description, $coverBlob);
            // after successful insert redirect back to dashboard (prevent form resubmission)
            header('Location: libariandashboard.php?added=1');
            exit;
        } catch (Exception $e) {
            // simple error display; you may want to log this instead
            echo '<p class="text-danger">Error saving book: ' . htmlspecialchars($e->getMessage()) . '</p>';
        }
    }
}

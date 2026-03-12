<?php

require_once '../Models/bookviewmodel.php';

class BookController {
    private $bookModel;

    public function __construct() {
        $this->bookModel = new BookModel();
    }

    public function showBookDetails() {
       
        $isbn = $_REQUEST['isbn'] ?? null;

        if ($isbn) {
            return $this->bookModel->getBookByIsbn($isbn);
        }
        return null;
    }
}


$controller = new BookController();
$book = $controller->showBookDetails();

if (!$book) {
    die("Book not found!");
}
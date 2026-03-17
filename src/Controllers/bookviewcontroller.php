<?php

require_once '../Models/bookviewmodel.php';

class BookController
{
    private $bookModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    public function showBookDetails()
    {

        $isbn = $_REQUEST['isbn'] ?? null;
        if ($isbn) {
            $book = $this->bookModel->getBookByIsbn($isbn);

            $relatedBooks = [];
            if ($book) {
                $relatedBooks = $this->bookModel->getBooksByCategory($book['categoryid'], 4);
            }

            return ['mainBook' => $book, 'relatedBooks' => $relatedBooks];
        }
        return null;
    }
}

$controller = new BookController();
$data = $controller->showBookDetails();

if (!$data || !$data['mainBook']) {
    die("Book not found!");
}

$book = $data['mainBook'];
$relatedBooks = $data['relatedBooks'];


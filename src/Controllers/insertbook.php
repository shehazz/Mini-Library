<?php
/**
 * manage interactions between models and views.
 */
require_once '../Models/BookModel.php';

class BookController
{

    private $bookModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    // send all form data to BookModel
    public function formSubmit()
    {
        if (isset($_POST['bookname']) && isset($_POST['isbn']) && isset($_POST['category']) && isset($_POST['author'])) {

            if (!empty($_POST['bookname']) && !empty($_POST['isbn']) && !empty($_POST['category']) && !empty($_POST['author'])) {

                $bookname = trim(htmlspecialchars($_POST['bookname']));
                $isbn = trim(htmlspecialchars($_POST['isbn']));
                $category = trim(htmlspecialchars($_POST['category']));
                $author = trim(htmlspecialchars($_POST['author']));
                $bookprice = floatval($_POST['bookprice']);
                $bookquantity = intval($_POST['bookquantity']);
                $description = trim(htmlspecialchars($_POST['description']));

                $imgData = null;
                if (!empty($_FILES['coverimg']['tmp_name'])) {
                    $imgData = file_get_contents($_FILES['coverimg']['tmp_name']);
                }

                $result = $this->bookModel->insertBook(
                    $bookname,
                    $isbn,
                    $category,
                    $author,
                    $imgData,
                    $bookprice,
                    $description,
                    $bookquantity
                );

                if ($result) {
                    header("Location: /Mini-Library-1/src/Views/libariandashboard.php?status=success");
                } else {
                    header("Location: /Mini-Library-1/src/Includes/addbook.php?status=error");
                }
                exit;

            } else {
                header("Location: /Mini-Library-1/src/Includes/addbook.php?status=empty");
                exit;
            }
        }
    }
}

if (isset($_POST['save_book'])) {
    $bookController = new BookController();
    $bookController->formSubmit();
}
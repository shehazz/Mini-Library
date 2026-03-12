<?php

require_once __DIR__ . '/../Models/InsertBookModel.php';

class InsertBookController
{
    private $bookModel;

    public function __construct()
    {
        $this->bookModel = new InsertBookModel();
    }


    public function formSubmit()
    {
        if (
            isset($_POST['bookname']) && isset($_POST['isbn']) && isset($_POST['category']) &&
            isset($_POST['author']) && isset($_POST['bookprice']) && isset($_POST['bookquantity']) &&
            isset($_POST['description'])
        ) {
            if (
                !empty($_POST['bookname']) && !empty($_POST['isbn']) && !empty($_POST['category']) &&
                !empty($_POST['author']) && !empty($_POST['bookprice']) && !empty($_POST['bookquantity']) &&
                !empty($_POST['description'])
            ) {
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

                if ($result === 'duplicate') {
                    header("Location: /Mini-Library/src/Views/libariandashboard.php?status=duplicate");
                } else if ($result) {
                    header("Location: /Mini-Library/src/Views/libariandashboard.php?status=success");
                } else {
                    header("Location: /Mini-Library/src/Views/libariandashboard.php?status=error");
                }
                exit;

            } else {
                header("Location: /Mini-Library/src/Views/libariandashboard.php?status=empty");
                exit;
            }
        }
    }
}

if (isset($_POST['save_book'])) {
    $controller = new InsertBookController();
    $controller->formSubmit();
}

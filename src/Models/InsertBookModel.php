<?php

require_once __DIR__ . '/../../Config/DBConnection.php';

class InsertBookModel
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnection();
        $this->conn = $db->getConnection();
    }

 
    private function getCategoryId($categoryName)
    {
        $stmt = $this->conn->prepare("SELECT categoryid FROM bookcategory WHERE category = ?");
        $stmt->bind_param("s", $categoryName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $stmt->close();
            return null;
        }

        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['categoryid'];
    }

   
    public function insertBook($bookname, $isbn, $category, $author, $imgData, $bookprice, $description, $bookquantity)
{
    $categoryid = $this->getCategoryId($category);

    if ($categoryid === null) {
        return false;
    }

   
    $check = $this->conn->prepare("SELECT * FROM book WHERE isbn = ?");
    $check->bind_param("s", $isbn);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 1) {
        $check->close();
        return 'duplicate';
    }
    $check->close();

    try {
        $stmt = $this->conn->prepare(
            "INSERT INTO book (bookname, isbn, categoryid, author, coverimg, bookprice, description, bookquantity)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
        );

        $stmt->bind_param("ssissdsi",
            $bookname,
            $isbn,
            $categoryid,
            $author,
            $imgData,
            $bookprice,
            $description,
            $bookquantity
        );

        $stmt->execute();
        $stmt->close();
        return true;

    } catch (mysqli_sql_exception $e) {
        if (str_contains($e->getMessage(), 'Duplicate entry')) {
            return 'duplicate';
        }
        return false;
    }
}
}

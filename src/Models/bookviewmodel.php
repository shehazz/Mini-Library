<?php
require_once '../../Config/DBConnection.php';

class BookModel extends DBConnection
{
    public function getBookByIsbn($isbn)
    {
        $conn = $this->getConnection();

        $sql = "SELECT b.*, c.category 
            FROM book b 
            LEFT JOIN bookcategory c ON b.categoryid = c.categoryid 
            WHERE b.isbn = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $isbn);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();

        return $result;
    }

    public function getBooksByCategory($categoryId, $limit = 4)
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM book WHERE categoryid = ? LIMIT ?");
        $stmt->bind_param("ii", $categoryId, $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function reserveBook($nic, $isbn, $dueDate)
    {
        $conn = $this->getConnection();

        $returndate = '';
        $fineamount = '0.00';
        $paymentstatus = 'Pending';

        $sql = "INSERT INTO borrowdetails (nic, isbn, duedate, returndate, fineamount, paymentstatus) 
            VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ssssss", $nic, $isbn, $dueDate, $returndate, $fineamount, $paymentstatus);

        return $stmt->execute();
    }
}
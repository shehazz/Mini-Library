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

        $conn->begin_transaction();

        try {
            $returndate = '';
            $fineamount = '0.00';
            $paymentstatus = 'Pending';
            $sql1 = "INSERT INTO borrowdetails (nic, isbn, duedate, returndate, fineamount, paymentstatus) 
                 VALUES (?, ?, ?, ?, ?, ?)";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bind_param("ssssss", $nic, $isbn, $dueDate, $returndate, $fineamount, $paymentstatus);
            $stmt1->execute();

            $sql2 = "UPDATE book SET bookquantity = bookquantity - 1 WHERE isbn = ? AND bookquantity > 0";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("s", $isbn);
            $stmt2->execute();

            if ($stmt2->affected_rows === 0) {
                throw new Exception("Book out of stock");
            }

            $sql3 = "UPDATE bookcopies SET availability = 'Reserved' 
                 WHERE isbn = ? AND availability = 'Available' LIMIT 1";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->bind_param("s", $isbn);
            $stmt3->execute();

            $conn->commit();
            return true;

        } catch (Exception $e) {

            $conn->rollback();
            return false;
        }
    }
}
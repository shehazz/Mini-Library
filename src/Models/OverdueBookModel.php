<?php
/**
 * handles all database operations related to overdue books.
 */
require_once __DIR__ . '/../../Config/DBConnection.php';

class OverdueBooksModel
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnection();
        $this->conn = $db->getConnection();
    }

    // get all overdue books from borrowdetails table
    public function getOverdueBooks()
    {
        $stmt = $this->conn->prepare("
        SELECT 
            bd.nic,
            bd.isbn,
            bd.duedate,
            bd.fineamount,
            bd.paymentstatus
        FROM borrowdetails bd
        WHERE bd.returndate + INTERVAL 14 DAY < CURDATE()
          AND bd.paymentstatus = 'unpaid'
        ORDER BY bd.returndate ASC
    ");
        $stmt->execute();
        $result = $stmt->get_result();

        $overdueBooks = [];
        while ($row = $result->fetch_assoc()) {
            $overdueBooks[] = $row;
        }

        $stmt->close();
        return $overdueBooks;
    }


    // get total count of overdue books
    public function getOverdueCount()
    {
        $stmt = $this->conn->prepare("
        SELECT COUNT(*) AS total
        FROM borrowdetails
        WHERE returndate + INTERVAL 14 DAY < CURDATE()
          AND paymentstatus = 'unpaid'
    ");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['total'];
    }
}
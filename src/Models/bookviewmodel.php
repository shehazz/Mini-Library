<?php
require_once '../../Config/DBConnection.php';

class BookModel extends DBConnection {
    public function getBookByIsbn($isbn) {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM book WHERE isbn = ?");
        $stmt->bind_param("s", $isbn);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function reserveBook($nic, $isbn, $dueDate) {
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
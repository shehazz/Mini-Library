<?php
require_once '../../Config/DBConnection.php';

class BookModel extends DBConnection
{

    public function getBookByIsbn($isbn)
    {
        $db = new DBConnection();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT * FROM book WHERE isbn = ?");
        $stmt->bind_param("s", $isbn);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
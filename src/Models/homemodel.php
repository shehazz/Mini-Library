<?php

require_once '../../Config/DBConnection.php';

class BookModel extends DBConnection
{
    public $conn;

    public function __construct()
    {
        return parent::__construct();
        $this->conn = $this->getConnection();
    }

    public function getHomeBooks($limit = 12)
    {
        $query = "SELECT
                    b.coverimg,
                    b.bookname,
                    b.author,
                    b.isbn,
                    b.categoryid,
                    b.description,
                    cat.category AS category_name,
                    (SELECT COUNT(*) FROM bookcopies bc WHERE bc.isbn = b.isbn AND bc.availability = 'Available') AS available_count FROM book b LEFT JOIN bookcategory cat ON b.categoryid = cat.categoryid LIMIT ?";

        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("i", $limit);
            $stmt->execute();
            return $stmt->get_result();
        }
        return false;
    }
}

<?php
require_once '../../Config/DBConnection.php';

class BookModel extends DBConnection {

    // insert new book to the database
    public function insertBook($bookname, $isbn, $category, $author, $imgData, $bookprice, $description, $bookquantity) {
        $query = "INSERT INTO book (bookname, isbn, category, author, coverimg, bookprice, description, bookquantity) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $this->conn->prepare($query)) {
            $null = null;
            $stmt->bind_param("ssssbisi", $bookname, $isbn, $category, $author, $null, $bookprice, $description, $bookquantity);

            if ($imgData) { $stmt->send_long_data(4, $imgData); }

            $stmt->execute();
            $stmt->close();

            return $this->insertCopies($isbn, $bookquantity);
        } else {
            echo "Error preparing statement: " . $this->conn->error;
        }
    }

    private function insertCopies($isbn, $quantity) {
        $query = "INSERT INTO bookcopies (isbn, copyid, availability) VALUES (?, ?, 'Available')";

        if ($stmt = $this->conn->prepare($query)) {
            for ($i = 1; $i <= $quantity; $i++) {
                $stmt->bind_param("si", $isbn, $i);
                $stmt->execute();
            }
            $stmt->close();
            return true;
        }
        return false;
    }

    // get all books from database
    public function fetch() {
        $data = null;
        $query = "SELECT * FROM book";

        if ($sql = $this->conn->query($query)) {
            while ($rows = mysqli_fetch_assoc($sql)) {
                $data[] = $rows;
            }
        }
        return $data;
    }

    // get book details by isbn from database
    public function fetch_single($isbn) {
        $data = null;
        $query = "SELECT * FROM book WHERE isbn = '$isbn'";

        if ($sql = $this->conn->query($query)) {
            while ($rows = mysqli_fetch_assoc($sql)) {
                $data = $rows;
            }
        }
        return $data;
    }

    // update book
    public function updateBook($id, $bookname, $isbn, $category, $author, $bookprice, $description, $bookquantity) {
        $query = "UPDATE book SET bookname = ?, isbn = ?, category = ?, author = ?, bookprice = ?, description = ?, bookquantity = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssissi", $bookname, $isbn, $category, $author, $bookprice, $description, $bookquantity, $id);
        return $stmt->execute();
    }

    // delete selected book from database
    public function deleteBook($id) {
        $query = "DELETE FROM book WHERE id = ?";
        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        }
        return false;
    }
}
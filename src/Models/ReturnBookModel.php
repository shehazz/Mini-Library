<?php

require_once '../../Config/DBConnection.php';

class ReturnBookModel extends DBConnection
{
    public function getBorrowRecord(string $isbn, string $nic): ?array
    {
        $conn = $this->getConnection();

        $stmt = $conn->prepare("
            SELECT br.id, br.borrow_date, br.due_date, br.book_id, br.member_id
            FROM borrow_records br
            JOIN books b ON b.id = br.book_id
            JOIN members m ON m.id = br.member_id
            WHERE b.isbn = ?
              AND m.nic = ?
              AND br.status = 'borrowed'
            LIMIT 1
        ");
        $stmt->bind_param('ss', $isbn, $nic);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
        $stmt->close();

        return $row ?: null;
    }

    public function processReturn(array $record, string $returnDate, string $condition): array
    {
        $conn = $this->getConnection();
        $conn->begin_transaction();

        try {
            // 1. Mark borrow record as returned
            $stmt = $conn->prepare("
                UPDATE borrow_records
                SET status = 'returned',
                    return_date = ?,
                    book_condition = ?
                WHERE id = ?
            ");
            $stmt->bind_param('ssi', $returnDate, $condition, $record['id']);
            $stmt->execute();
            $stmt->close();

            // 2. Restore stock (skip if Lost)
            if ($condition !== 'Lost') {
                $stmt = $conn->prepare("
                    UPDATE books SET available_copies = available_copies + 1 WHERE id = ?
                ");
                $stmt->bind_param('i', $record['book_id']);
                $stmt->execute();
                $stmt->close();
            }

            // 3. Calculate fine and insert if applicable
            $fine = $this->calculateFine($condition, $record['book_id']);
            if ($fine > 0) {
                $this->insertFine($record['member_id'], $record['id'], $fine, $condition);
            }

            $conn->commit();

            return [
                'success' => true,
                'fine'    => $fine,
                'message' => $this->buildMessage($condition, $fine),
            ];

        } catch (Exception $e) {
            $conn->rollback();
            return [
                'success' => false,
                'fine'    => 0,
                'message' => 'Return failed: ' . $e->getMessage(),
            ];
        }
    }

    private function getBookPrice(int $bookId): float
    {
        $conn = $this->getConnection();

        $stmt = $conn->prepare("SELECT price FROM books WHERE id = ? LIMIT 1");
        $stmt->bind_param('i', $bookId);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        return $row ? (float) $row['price'] : 0.00;
    }

    private function calculateFine(string $condition, int $bookId): float
    {
        $price = $this->getBookPrice($bookId);

        return match ($condition) {
            'Lost'    => $price,
            'Damaged' => round($price / 2, 2),
            default   => 0.00,
        };
    }

    private function insertFine(int $memberId, int $borrowId, float $amount, string $reason): void
    {
        $conn = $this->getConnection();

        $stmt = $conn->prepare("
            INSERT INTO fines (member_id, borrow_id, amount, reason, status, created_at)
            VALUES (?, ?, ?, ?, 'unpaid', NOW())
        ");
        $stmt->bind_param('iids', $memberId, $borrowId, $amount, $reason);
        $stmt->execute();
        $stmt->close();
    }

    private function buildMessage(string $condition, float $fine): string
    {
        if ($fine <= 0) {
            return 'Book returned successfully in good condition.';
        }

        $fmt = 'Rs. ' . number_format($fine, 2);

        return match ($condition) {
            'Lost'    => "Book marked as lost. A fine of $fmt (full book price) has been charged.",
            'Damaged' => "Book returned as damaged. A fine of $fmt (half of book price) has been charged.",
            default   => "Book returned. A fine of $fmt has been charged.",
        };
    }
}
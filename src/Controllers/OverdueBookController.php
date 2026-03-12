<?php
/**
 * manage interactions between models and views.
 */
require_once __DIR__ . '/../Models/OverdueBookModel.php';

class OverdueBooksController
{
    private $overdueModel;

    public function __construct()
    {
        $this->overdueModel = new OverdueBooksModel();
    }

    // fetch overdue books and pass to view
    public function loadOverdueBooks()
    {
        $overdueBooks = $this->overdueModel->getOverdueBooks();
        $overdueCount = $this->overdueModel->getOverdueCount();

        return [
            'overdueBooks' => $overdueBooks,
            'overdueCount' => $overdueCount,
        ];
    }
}

$controller   = new OverdueBooksController();
$data         = $controller->loadOverdueBooks();
$overdueBooks = $data['overdueBooks'];
$overdueCount = $data['overdueCount'];
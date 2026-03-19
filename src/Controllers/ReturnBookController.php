<?php

require_once '../models/ReturnBookModel.php';

class ReturnController
{
    private ReturnBookModel $model;

    public function __construct()
    {
        
        $this->model = new ReturnBookModel();
    }

    
    public function index(): void
    {
        $data = [
            'success'    => null,
            'error'      => null,
            'fine'       => 0,
            'message'    => '',
            'condition'  => 'Good',
            'returnDate' => date('Y-m-d'),
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['return_book'])) {
            $result = $this->handleReturn();
            $data   = array_merge($data, $result);
        }

        $this->render('return/index', $data);
    }

        private function handleReturn(): array
    {
        $isbn       = trim($_POST['isbn']        ?? '');
        $nic        = trim($_POST['nic']         ?? '');
        $returnDate = trim($_POST['return_date'] ?? date('Y-m-d'));
        $condition  = $_POST['condition']        ?? 'Good';

        if (empty($isbn) || empty($nic)) {
            return [
                'success'    => false,
                'error'      => 'ISBN and NIC are required.',
                'condition'  => $condition,
                'returnDate' => $returnDate,
            ];
        }

        if (!in_array($condition, ['Good', 'Damaged', 'Lost'], true)) {
            return [
                'success'    => false,
                'error'      => 'Invalid book condition selected.',
                'condition'  => $condition,
                'returnDate' => $returnDate,
            ];
        }

        if (!$this->isValidDate($returnDate)) {
            return [
                'success'    => false,
                'error'      => 'Invalid return date.',
                'condition'  => $condition,
                'returnDate' => $returnDate,
            ];
        }

        $record = $this->model->getBorrowRecord($isbn, $nic);

        if (!$record) {
            return [
                'success'    => false,
                'error'      => 'No active borrow record found for this ISBN and NIC.',
                'condition'  => $condition,
                'returnDate' => $returnDate,
            ];
        }

        $result = $this->model->processReturn($record, $returnDate, $condition);

        if (!$result['success']) {
            return [
                'success'    => false,
                'error'      => $result['message'],
                'condition'  => $condition,
                'returnDate' => $returnDate,
            ];
        }

        return [
            'success'    => true,
            'fine'       => $result['fine'],
            'message'    => $result['message'],
            'condition'  => $condition,
            'returnDate' => $returnDate,
        ];
    }

    
    private function render(string $view, array $data = []): void
    {
        extract($data);
        $viewPath = '../views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new RuntimeException("View not found: $viewPath");
        }

        require $viewPath;
    }

    
    private function isValidDate(string $date): bool
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }
}
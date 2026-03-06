<?php
// Sample data (In a real app, this would come from your Database)
$overdueBooks = [
    ["title" => "The 5 AM Club", "borrower" => "J.A. Thirundu", "date" => "2025-04-28", "fine" => "80.00"],
    ["title" => "Atomic Habits", "borrower" => "K.G. Perera", "date" => "2025-05-01", "fine" => "50.00"],
];
?>

<div class="card border-0 shadow-sm" style="border-radius: 12px; border: 1px solid #E2E8F0 !important;">
    <div class="card-body p-0">
        <div class="p-3 d-flex justify-content-between align-items-center">
            <h6 class="fw-bold mb-0" style="color: #4A6741;">Overdue Books List</h6>
            <span class="badge" style="background-color: #FEE2E2; color: #DC2626;">Action Required</span>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background-color: #F8FAF9; color: #4A6741;">
                    <tr>
                        <th class="border-0 px-3 py-3 small">BOOK TITLE</th>
                        <th class="border-0 py-3 small">BORROWER</th>
                        <th class="border-0 py-3 small">DUE DATE</th>
                        <th class="border-0 py-3 small">FINE</th>
                        <th class="border-0 px-3 py-3 small text-end">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($overdueBooks as $book): ?>
                    <tr class="align-middle">
                        <td class="px-3 fw-medium"><?php echo $book['title']; ?></td>
                        <td><?php echo $book['borrower']; ?></td>
                        <td><?php echo $book['date']; ?></td>
                        <td>
                            <span class="badge" style="background-color: #FEE2E2; color: #DC2626;">
                                LKR <?php echo $book['fine']; ?>
                            </span>
                        </td>
                        <td class="px-3 text-end">
                            <button class="btn btn-sm shadow-none" style="background-color: #E8F0E6; color: #4A6741;">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
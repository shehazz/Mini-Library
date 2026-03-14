<?php
/**
 * displays overdue books list.
 * $overdueBooks and $overdueCount are loaded from libariandashboard.php
 */
?>

<div class="card border-0 shadow-sm" style="border-radius: 12px; border: 1px solid #E2E8F0 !important;">
    <div class="card-body p-0">
        <div class="p-3 d-flex justify-content-between align-items-center">
            <h6 class="fw-bold mb-0" style="color: #4A6741;">Overdue Books List</h6>
            <span class="badge" style="background-color: #FEE2E2; color: #DC2626;">
                <?php echo $overdueCount; ?> Action Required
            </span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background-color: #F8FAF9; color: #4A6741;">
                    <tr>
                        <th class="border-0 px-3 py-3 small">NIC</th>
                        <th class="border-0 py-3 small">ISBN</th>
                        <th class="border-0 py-3 small">DUE DATE</th>
                        <th class="border-0 py-3 small">FINE</th>
                        <th class="border-0 py-3 small">PAYMENT STATUS</th>
                        <th class="border-0 px-3 py-3 small text-end">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($overdueBooks)): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted px-3 py-4">
                                No overdue books found.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($overdueBooks as $book): ?>
                        <tr class="align-middle">
                            <td class="px-3 fw-medium"><?php echo htmlspecialchars($book['nic']); ?></td>
                            <td><?php echo htmlspecialchars($book['isbn']); ?></td>
                            <td><?php echo htmlspecialchars($book['duedate']); ?></td>
                            <td>
                                <span class="badge" style="background-color: #FEE2E2; color: #DC2626;">
                                    LKR <?php echo htmlspecialchars($book['fineamount']); ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge" style="background-color: #FEF9C3; color: #CA8A04;">
                                    <?php echo htmlspecialchars($book['paymentstatus']); ?>
                                </span>
                            </td>
                            <td class="px-3 text-end">
                                <button class="btn btn-sm shadow-none" style="background-color: #E8F0E6; color: #4A6741;">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/assets/css/dashboradstyle.css"  >   
</head>
<body>
<div class="card border-0 shadow-sm" style="border-radius: 12px; border: 1px solid #E2E8F0 !important;">
    <div class="p-4 border-bottom">
        <h5 class="fw-bold mb-0" style="color: #4A6741;">Active Book Issues</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 text-center">
            <thead class="bg-light small fw-bold">
                <tr style="color: #4A6741;">
                    <th class="border-0">MEMBER</th>
                    <th class="border-0">BOOK</th>
                    <th class="border-0">DUE DATE</th>
                    <th class="border-0">STATUS</th>
                    <th class="border-0">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rentals as $rental): ?>
                <tr>
                    <td class="fw-bold"><?= $rental['member_name'] ?></td>
                    <td class="text-muted small"><?= $rental['book_title'] ?></td>
                    <td class="small fw-bold text-danger"><?= $rental['due_date'] ?></td>
                    <td>
                        <span class="badge px-3" style="background-color: #FEE2E2; color: #DC2626;">Overdue</span>
                    </td>
                    <td>
                        <form action="index.php?action=process-return" method="POST">
                            <input type="hidden" name="rental_id" value="<?= $rental['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-outline-success rounded-pill px-3">
                                <i class="bi bi-arrow-return-left me-1"></i>Return
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
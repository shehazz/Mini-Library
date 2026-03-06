<div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color: #F8FAF9; color: #4A6741;">
                <tr class="small fw-bold">
                    <th class="border-0 px-4">COVER</th>
                    <th class="border-0">BOOK NAME & ISBN</th>
                    <th class="border-0">AUTHOR</th>
                    <th class="border-0">CATEGORY</th>
                    <th class="border-0">DESCRIPTION</th>
                    <th class="border-0 text-center">COPIES</th>
                    <th class="border-0 text-end px-4">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                <tr>
                    <td class="px-4">
                        <img src="<?= htmlspecialchars($book['cover_image']) ?>" 
                             class="rounded shadow-sm" 
                             style="width: 45px; height: 65px; object-fit: cover; border: 1px solid #E2E8F0;">
                    </td>

                    <td>
                        <div class="fw-bold text-dark"><?= htmlspecialchars($book['title']) ?></div>
                        <div class="text-muted extra-small" style="font-size: 0.75rem;"><?= htmlspecialchars($book['isbn']) ?></div>
                    </td>

                    <td class="small text-muted"><?= htmlspecialchars($book['author']) ?></td>

                    <td>
                        <span class="badge rounded-pill fw-normal px-3" style="background-color: #E8F0E6; color: #4A6741; border: 1px solid #D1DBCE;">
                            <?= htmlspecialchars($book['category']) ?>
                        </span>
                    </td>

                    <td class="small text-muted" style="max-width: 200px;">
                        <span class="d-inline-block text-truncate" style="max-width: 150px;" title="<?= htmlspecialchars($book['description']) ?>">
                            <?= htmlspecialchars($book['description']) ?>
                        </span>
                    </td>

                    <td class="text-center fw-bold small">
                        <span class="<?= $book['copies'] < 3 ? 'text-danger' : 'text-dark' ?>">
                            <?= $book['copies'] ?>
                        </span>
                    </td>

                    <td class="px-4 text-end">
                        <div class="d-flex justify-content-end gap-2">
                            <a href="index.php?action=edit-book&id=<?= $book['id'] ?>" class="btn btn-sm p-1 text-primary shadow-none"><i class="bi bi-pencil-square"></i></a>
                            <a href="index.php?action=delete-book&id=<?= $book['id'] ?>" class="btn btn-sm p-1 text-danger shadow-none" onclick="return confirm('Delete this book?')"><i class="bi bi-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
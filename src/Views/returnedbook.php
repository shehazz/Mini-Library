
<div class="card border-0 shadow-sm" 
     style="border-radius: 12px; border: 1px solid #E2E8F0 !important; background-color: #FFFFFF;">
    
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center" 
         style="border-color: #E2E8F0 !important;">
        <div class="d-flex align-items-center">
            <i class="bi bi-arrow-return-left me-2 fs-5" style="color: #2C3E50;"></i>
            <h5 class="fw-bold mb-0" style="color: #34495E;">Return Borrowed Book</h5>
        </div>
        <a href="issued_list.php" class="text-decoration-none small fw-bold" style="color: #2C3E50;">
            Issued List <i class="bi bi-list-ul"></i>
        </a>
    </div>

    <div class="card-body p-4">
        <form action="" method="POST">
            <div class="row g-4">
                
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">BOOK ISBN</label>
                    <input type="text" name="isbn" class="form-control bg-light border-0 p-2 shadow-none" 
                           placeholder="Enter ISBN to Return" style="border-radius: 8px;" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">MEMBER NIC</label>
                    <input type="text" name="nic" class="form-control bg-light border-0 p-2 shadow-none" 
                           placeholder="Enter Member NIC" style="border-radius: 8px;" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">RETURN DATE (TODAY)</label>
                    <input type="text" name="return_date" class="form-control bg-light border-0 p-2 shadow-none" 
                           value="<?php echo date('Y-m-d'); ?>" style="border-radius: 8px;" readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">BOOK CONDITION</label>
                    <select name="condition" class="form-select bg-light border-0 p-2 shadow-none" style="border-radius: 8px;">
                        <option value="Good" selected>Good</option>
                        <option value="Damaged">Damaged</option>
                        <option value="Lost">Lost</option>
                    </select>
                </div>

                <div class="col-12 mt-4 d-flex gap-2">
                    <button type="submit" name="return_book" 
                            class="btn px-4 py-2 rounded-pill shadow-sm text-white" 
                            style="background-color: #728C63; border: none;">
                        <i class="bi bi-check2-circle me-2"></i>Process Return
                    </button>
                    <button type="reset" class="btn btn-light px-4 py-2 rounded-pill text-muted border" 
                            style="background-color: #F8FAF9;">
                        Clear
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

<?php if ($success): ?>
<?php
    $bookPrice = 2400.00; // pulled from your DB in real use
    $conditionClass = match($condition ?? 'Good') {
        'Damaged' => 'damaged',
        'Lost'    => 'lost',
        default   => 'good',
    };
    $badgeClass = match($conditionClass) {
        'damaged' => 'badge-damaged',
        'lost'    => 'badge-lost',
        default   => 'badge-good',
    };
?>
<div class="receipt-card">
  <div class="receipt-header">
    <i class="bi bi-book"></i>
    <div>
      <p class="title">Book Return Receipt</p>
      <p class="sub">Library Management System</p>
    </div>
  </div>
  <div class="receipt-body">
    <div class="receipt-row">
      <span class="label">Return date</span>
      <span class="value"><?= htmlspecialchars($returnDate) ?></span>
    </div>
    <div class="receipt-row">
      <span class="label">Book condition</span>
      <span class="value">
        <span class="condition-badge <?= $badgeClass ?>">
          <?= htmlspecialchars($condition) ?>
        </span>
      </span>
    </div>
    <div class="fine-box <?= $conditionClass ?>-fine">
      <div class="fine-box-row">
        <span class="fine-label"><?= $fine > 0 ? 'Fine charged' : 'No fine charged' ?></span>
        <span class="fine-amount">Rs. <?= number_format($fine, 2) ?></span>
      </div>
      <p class="fine-note"><?= htmlspecialchars($message) ?></p>
    </div>
  </div>
</div>
<?php endif; ?>

<?php if ($error): ?>
<div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>
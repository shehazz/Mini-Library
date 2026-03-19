<div class="card border-0 shadow-sm" 
     style="border-radius: 12px; border: 1px solid #E2E8F0 !important; background-color: #FFFFFF;">
    
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center" 
         style="border-color: #E2E8F0 !important;">
        <div class="d-flex align-items-center">
            <i class="bi bi-book me-2 fs-5" style="color: #2C3E50;"></i>
            <h5 class="fw-bold mb-0" style="color: #34495E;">Issue New Book</h5>
        </div>
        <a href="borrow_history.php" class="text-decoration-none small fw-bold" style="color: #2C3E50;">
            View Records <i class="bi bi-arrow-right-short"></i>
        </a>
    </div>

    <div class="card-body p-4">
        <form action="../../src/Controllers/IssueController.php" method="POST">
            <div class="row g-4">
                
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">MEMBER NIC</label>
                    <input type="text" name="nic" class="form-control bg-light border-0 p-2 shadow-none" 
                           placeholder="e.g. 199512345678" style="border-radius: 8px;" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">BOOK ISBN</label>
                    <input type="text" name="isbn" class="form-control bg-light border-0 p-2 shadow-none" 
                           placeholder="e.g. 978-3-16-148410-0" style="border-radius: 8px;" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">DUE DATE</label>
                    <input type="date" name="due_date" class="form-control bg-light border-0 p-2 shadow-none" 
                           style="border-radius: 8px;" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">ISSUE DATE</label>
                    <input type="text" class="form-control bg-light border-0 p-2 shadow-none" 
                           value="<?php echo date('Y-m-d'); ?>" style="border-radius: 8px;" readonly>
                </div>

                <div class="col-12 mt-4 d-flex gap-2">
                    <button type="submit" name="issue_book" 
                            class="btn px-4 py-2 rounded-pill shadow-sm text-white" 
                            style="background-color: #728C63; border: none;">
                        <i class="bi bi-journal-plus me-2"></i>Issue Book
                    </button>
                    <button type="reset" class="btn btn-light px-4 py-2 rounded-pill text-muted border" 
                            style="background-color: #F8FAF9;">
                        Clear Fields
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
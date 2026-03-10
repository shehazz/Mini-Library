<div class="card border-0 shadow-sm" style="border-radius: 12px; border: 1px solid #E2E8F0 !important; background-color: #FFFFFF;">
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center" style="border-color: #E2E8F0 !important;">
        <div class="d-flex align-items-center">
            <i class="bi bi-journal-arrow-up me-2 fs-5" style="color: #6B8E61;"></i>
            <h5 class="fw-bold mb-0" style="color: #4A6741;">Quick Issue</h5>
        </div>
        <a href="main_issue_log.php" class="text-decoration-none small fw-bold" style="color: #6B8E61;">
            Issue Log <i class="bi bi-arrow-right-short"></i>
        </a>
    </div>

    <div class="card-body p-4">
        <form action="process_issue.php" method="POST">
            <div class="row g-4"> 
                
                <div class="col-md-12">
                    <label class="form-label small fw-bold text-muted">SEARCH MEMBER</label>
                    <input type="text" name="member_search" class="form-control bg-light border-0 p-2 shadow-none" 
                           placeholder="e.g. Type Name or Member ID" list="memberList" style="border-radius: 8px;">
                    <datalist id="memberList">
                        <option value="M001 - J.A. Thirundu">
                        <option value="M002 - K.G. Perera">
                    </datalist>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">SELECT BOOK</label>
                    <select name="book_id" class="form-select bg-light border-0 p-2 shadow-none" style="border-radius: 8px;">
                        <option selected disabled>Choose Book Title...</option>
                        <option value="501">The 5 AM Club</option>
                        <option value="502">Atomic Habits</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">DUE DATE</label>
                    <input type="date" name="due_date" class="form-control bg-light border-0 p-2 shadow-none" style="border-radius: 8px;" required>
                </div>

                <div class="col-12 mt-4 d-flex gap-2">
                    <button type="submit" name="issue_book" class="btn px-4 py-2 rounded-pill shadow-sm text-white" style="background-color: #728C63; border: none;">
                        <i class="bi bi-check-circle me-2"></i>Issue Book Now
                    </button>
                    <button type="reset" class="btn btn-light px-4 py-2 rounded-pill text-muted border" style="background-color: #F8FAF9;">
                        Clear
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
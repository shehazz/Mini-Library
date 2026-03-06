<div class="card border-0 shadow-sm" style="border-radius: 12px; border: 1px solid #E2E8F0 !important; background-color: #FFFFFF;">
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center" style="border-color: #E2E8F0 !important;">
        <div class="d-flex align-items-center">
            <i class="bi bi-person-plus me-2 fs-5" style="color: #6B8E61;"></i>
            <h5 class="fw-bold mb-0" style="color: #4A6741;">Register New Member</h5>
        </div>
        <a href="member_directory.php" class="text-decoration-none small fw-bold" style="color: #6B8E61;">
            Member Directory <i class="bi bi-arrow-right-short"></i>
        </a>
    </div>

    <div class="card-body p-4">
        <form action="../../src/Controllers/MemberController.php" method="POST">
            <div class="row g-4">
                
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">MEMBER ID</label>
                    <input type="text" name="member_id" class="form-control bg-light border-0 p-2 shadow-none" 
                           placeholder="e.g. LIB-2026-001" style="border-radius: 8px;" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">FULL NAME</label>
                    <input type="text" name="fullname" class="form-control bg-light border-0 p-2 shadow-none" 
                           placeholder="e.g. J.A. Thirundu" style="border-radius: 8px;" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">NIC NUMBER</label>
                    <input type="text" name="nic" class="form-control bg-light border-0 p-2 shadow-none" 
                           placeholder="e.g. 199512345678" style="border-radius: 8px;" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">EMAIL ADDRESS</label>
                    <input type="text" name="email" class="form-control bg-light border-0 p-2 shadow-none" 
                           placeholder="e.g. member@example.com" style="border-radius: 8px;" required>
                </div>

                <div class="col-12 mt-4 d-flex gap-2">
                    <button type="submit" name="register_member" class="btn px-4 py-2 rounded-pill shadow-sm text-white" style="background-color: #728C63; border: none;">
                        <i class="bi bi-person-check me-2"></i>Register Member
                    </button>
                    <button type="reset" class="btn btn-light px-4 py-2 rounded-pill text-muted border" style="background-color: #F8FAF9;">
                        Clear Fields
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
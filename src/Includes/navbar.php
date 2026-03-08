<nav class="navbar">
    <div class="nav-left col-lg-4 ms-3">
        <span class="brand fw-bold">LibManage<strong>Pro</strong></span>
    </div>
    
    <div class="col-lg-4 d-flex justify-content-center">
        <input class="form-control me-2 rounded-4" type="search" placeholder="Search" aria-label="Search">
        <button class="btn border rounded-4" type="submit" style="border: #26322E;">Search</button>
    </div>

    <div class="nav-right d-flex align-items-center gap-3 me-3 ms-auto">
        <div class="dropdown">
            <button class="btn btn-outline-secondary rounded-4" type="button" id="roleChangeMenu" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-badge"></i> Edit Role
            </button>

            <div class="dropdown-menu dropdown-menu-end p-4 rounded-4 shadow-lg" aria-labelledby="roleChangeMenu" style="width: 300px; border: none;">
                <h6 class="mb-3">Update User Role</h6>
                <form action="src/Actions/update_role.php" method="POST">
                    <div class="mb-2">
                        <label class="form-label small">User NIC</label>
                        <input type="text" name="nic" class="form-control form-control-sm rounded-3" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">New Role</label>
                        <select name="role" class="form-select form-select-sm rounded-3">
                            <option value="member">Member</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm w-100 rounded-3 text-white" style="background-color: var(--main-dark);">Update Role</button>
                </form>
            </div>
        </div>

        <div class="user-profile">
            <a href="../../src/Views/profile.php" class="text-dark">
                <h2 class="m-0"><i class="bi bi-person-circle"></i></h2>
            </a>
        </div>
    </div>
</nav>
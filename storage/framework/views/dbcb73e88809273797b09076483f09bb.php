<aside class="sidebar navbar navbar-expand-lg bg-dark d-flex flex-column gap-4 align-content-lg-center mx-2 my-2 rounded">
    <h5 class="navbar-brand">Footie</h5>
    <div class="collapse navbar-collapse flex-grow-0" id="navbarNavDropdown">
        <ul class="navbar-nav flex-column gap-3 px-2">
            <li class="navbar-item rounded <?php echo e(Request::path() == 'admin/dashboard' ? "bg-info" : ""); ?>">
                <a href="dashboard" class="nav-link">
                    <div class="d-flex gap-3">
                        <span class="material-icons">dashboard</span>
                        <p class="m-0 p-0">Dashboard</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded <?php echo e(Request::path() == 'admin/product' ? "bg-info" : ""); ?>">
                <a href="product" class="nav-link">
                    <div class="d-flex gap-3">
                        <span class="material-icons">inventory</span>
                        <p class="m-0 p-0">Product</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded <?php echo e(Request::path() == 'admin/user_management' ? "bg-info" : ""); ?>">
                <a href="user_management" class="nav-link">
                    <div class="d-flex gap-3">
                        <span class="material-icons">people_alt</span>
                        <p class="m-0 p-0">User</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded <?php echo e(Request::path() == '' ? "bg-info" : ""); ?>">
                <a href="/" class="nav-link">
                    <div class="d-flex gap-3">
                        <span class="material-icons">home</span>
                        <p class="m-0 p-0">Home</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item">
                <a href="logout" class="nav-link">
                    <div class="d-flex gap-3">
                        <span class="material-icons">logout</span>
                        <p class="m-0 p-0">Logout</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</aside><?php /**PATH C:\xampp\htdocs\Footie\resources\views/admin/components/sidebar.blade.php ENDPATH**/ ?>
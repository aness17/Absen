<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?= ($header != "dashboard") ? 'collapsed' : ''; ?>" href="<?= base_url('admin') ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        <li class="nav-item ">
            <a class="nav-link <?= ($header != "user") ? 'collapsed' : ''; ?>" href="<?= base_url('admin/datauser') ?>">
                <i class="bi bi-person"></i>
                <span>User Data</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item <?= ($header == "att") ? 'collapsed' : ''; ?>">
            <a class="nav-link collapsed" href="<?= base_url('admin/dataatt') ?>">
                <i class="bi bi-card-list"></i>
                <span>Attendance Data</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('auth/logout') ?>">
                <i class="bi bi-box-arrow-in-left"></i>
                <span>Log out</span>
            </a>
        </li><!-- End Login Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
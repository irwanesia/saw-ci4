<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">

            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <!-- <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> -->
                    <span class="text-dark"><?= ucwords(session()->get('nama_user')) ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <?php if (session()->get('role') == 'admin' || session()->get('role') == 'manager') : ?>
                        <a class="dropdown-item" href="/setting"><i class="align-middle me-1" data-feather="settings"></i><small>Setting</small></a>
                    <?php endif ?>
                    <a class="dropdown-item" href="<?= site_url('logout') ?>"><i class="align-middle me-1" data-feather="log-out"></i><small>Logout</small></a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <div class="sidebar-brand">
            <span class="align-middle">GTP</span>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            <li class="sidebar-item mt-n1">
                <a class="sidebar-link" href="/dashboard">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header mt-n2">
                Data Documents
            </li>
            <li class="sidebar-item mt-n1">
                <a class="sidebar-link" href="/nota-belanja">
                    <i class="align-middle" data-feather="folder"></i> <span class="align-middle">Nota Belanja</span>
                </a>
            </li>
            <li class="sidebar-item mt-n1">
                <a class="sidebar-link" href="/invoice">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Invoice</span>
                </a>
            </li>
            <li class="sidebar-item mt-n1">
                <a class="sidebar-link" href="/kwitansi">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Kwitansi</span>
                </a>
            </li>
            <li class="sidebar-item mt-n1">
                <a class="sidebar-link" href="/surat_penawaran_harga">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">SPH</span>
                </a>
            </li>
            <li class="sidebar-item mt-n1">
                <a class="sidebar-link" href="/penawaran/penawaran">
                    <i class="align-middle" data-feather="folder"></i> <span class="align-middle">Penawaran</span>
                </a>
            </li>
            <li class="sidebar-item mt-n1">
                <a class="sidebar-link" href="/piutang/uploadpiutang">
                    <i class="align-middle" data-feather="upload"></i> <span class="align-middle">Upload Docs</span>
                </a>
            </li>
            <?php if (session()->get('role') == 'admin' || session()->get('role') == 'manager') : ?>
                <li class="sidebar-header mt-n2">
                    Data Piutang
                </li>
                <li class="sidebar-item mt-n1">
                    <a class="sidebar-link" href="/piutang/piutang">
                        <i class="align-middle" data-feather="folder"></i> <span class="align-middle">Piutang</span>
                    </a>
                </li>
            <?php endif ?>

            <?php if (session()->get('role') == 'admin' || session()->get('role') == 'staff') : ?>
                <li class="sidebar-header mt-n2">
                    Data Master
                </li>
                <li class="sidebar-item mt-n1">
                    <a class="sidebar-link" href="/barang">
                        <i class="align-middle" data-feather="list"></i> <span class="align-middle">Data Barang</span>
                    </a>
                </li>
                <li class="sidebar-item mt-n1">
                    <a class="sidebar-link" href="/pelanggan/customers">
                        <i class="align-middle" data-feather="list"></i> <span class="align-middle">Data Customers</span>
                    </a>
                </li>
                <li class="sidebar-item mt-n1">
                    <a class="sidebar-link" href="/pelanggan/suppliers">
                        <i class="align-middle" data-feather="list"></i> <span class="align-middle">Data Suppliers</span>
                    </a>
                </li>
            <?php endif ?>

            <?php if (session()->get('role') == 'admin') : ?>
                <li class="sidebar-header mt-n2">
                    Management Users
                </li>
                <li class="sidebar-item mt-n1">
                    <a class="sidebar-link" href="/role/role">
                        <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Role</span>
                    </a>
                </li>
                <li class="sidebar-item mt-n1">
                    <a class="sidebar-link" href="/user/user">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">User</span>
                    </a>
                </li>
            <?php endif ?>


            <!-- <li class="sidebar-header">
                Laporan
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="/laporan/data_barang">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Laporan Barang</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="/laporan/data_nota">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Laporan Nota Belanja</span>
                </a>
            </li>
            <?php if (session()->get('role') == 'admin' || session()->get('role') == 'manager') : ?>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/laporan/data_piutang">
                        <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Laporan Piutang</span>
                    </a>
                </li>
            <?php endif ?>
            <li class="sidebar-item">
                <a class="sidebar-link" href="/laporan/data_penawaran">
                    <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Laporan Penawaran</span>
                </a>
            </li> -->
            <li class="sidebar-header">
                <hr>
            </li>
        </ul>
    </div>
</nav>
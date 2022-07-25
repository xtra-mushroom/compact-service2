<aside class="main-sidebar sidebar-dark-secondary elevation-2" style="background-color: #12263d">
    <a href="#" class="brand-link">
        <img src="../assets/images/pdam-logo.png" alt="PDAM Balangan Logo" class="brand-image img-circle elevation-2"
            style="margin-left: 6px">
        <span class="brand-text font-weight-light"><b>PDAM BALANGAN</b></span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/images/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block text-uppercase"><?= $_SESSION['username'] ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="../pimpinan/index.php" class="nav-link <?= $activeHome ?>">
                        <i class="nav-icon fas fa-igloo"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-header mt-2"><b>MENU UTAMA</b></li>
                <li class="nav-item">
                    <a href="../pimpinan/antrian-pengesahan.php" class="nav-link <?php echo $activePengesahan ?>">
                        <i class="bi bi-pen-fill mr-2"></i>
                        <p>
                            Antrian Pengesahan
                        </p>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="../pimpinan/laporan.php" class="nav-link <?php echo $activeLaporan ?>">
                    <i class="bi bi-file-earmark-fill mr-2"></i>
                        <p>
                            Laporan Biaya Pelayanan
                        </p>
                    </a>
                </li>
                <li class="nav-header"><b>MENU LAINNYA</b></li>
                <li class="nav-item">
                    <a href="../pimpinan/tambahkan-pengguna.php" class="nav-link <?php echo $activeTambahUser ?>">
                        <i class="bi bi-person-plus-fill mr-2"></i>
                        <p>
                            Tambahkan Pengguna
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../logsystem/logout.php" class="nav-link">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
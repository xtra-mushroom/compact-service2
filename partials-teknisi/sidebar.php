<aside class="main-sidebar sidebar-dark-secondary elevation-2" style="background-color: #12263d">
    <a href="#" class="brand-link">
        <img src="../assets/images/pdam-logo.png" alt="PDAM Balangan Logo" class="brand-image img-circle elevation-2"
            style="margin-left: 6px">
        <span class="brand-text font-weight-light"><b>PDAM BALANGAN</b></span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php echo '<img src="../../assets/images/avatar4.png" class="img-circle elevation-2" alt="User Image">' ?>
            </div>
            <div class="info">
            <a href="#" class="d-block text-uppercase"><?= $_SESSION['username'] ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="../perencanaan/index.php" class="nav-link <?= $activeHome ?>">
                        <i class="nav-icon fas fa-igloo"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-header mt-2"><b>MENU UTAMA</b></li>
                <li class="nav-item">
                    <a href="../perencanaan/antrian-survei.php" class="nav-link <?php echo $activeSurvei ?>">
                    <i class="bi bi-list-nested mr-2"></i>
                        <p>
                            Antrian Survei
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../bacameter/input-baca.php" class="nav-link <?php echo $activeBaca ?>">
                    <!-- <i class="fas fa-ruler mr-2"></i> -->
                    <i class="bi bi-rulers mr-2"></i>
                        <p>
                            Input Baca Meter
                        </p>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="../perencanaan/antrian-bukatutup.php" class="nav-link <?php echo $activeAntriBukatutup ?>">
                        <i class="bi bi-toggles mr-2"></i>
                        <p>
                            Antrian Buka Tutup
                        </p>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="../perencanaan/keluhan-pelanggan.php" class="nav-link <?php echo $activeKeluhan ?>">
                        <i class="fas fa-exclamation mr-3"></i>
                        <p>
                            Keluhan Pelanggan
                        </p>
                    </a>
                </li>
                <li class="nav-header"><b>MENU LAINNYA</b></li>
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
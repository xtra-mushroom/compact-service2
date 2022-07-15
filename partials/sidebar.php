<aside class="main-sidebar sidebar-dark-secondary elevation-2" style="background-color: #383434">
    <a href="#" class="brand-link">
        <img src="../assets/images/pdam-logo.png" alt="PDAM Balangan Logo" class="brand-image img-circle elevation-2"
            style="margin-left: 6px">
        <span class="brand-text font-weight-light"><b>PDAM BALANGAN</b></span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php echo '<img src="../../assets/images/'.$image.'" class="img-circle elevation-2" alt="User Image">' ?>
            </div>
            <div class="info">
                <a href="#" class="d-block text-uppercase"><?= $_SESSION['username'] ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="../index.php" class="nav-link <?= $activeHome ?>">
                        <i class="nav-icon fas fa-igloo"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-header mt-2"><b>MENU UTAMA</b></li>
                <!-- pendaftaran -->
                <li class="nav-item <?= $openDaftar ?>">
                <a href="#" class="nav-link <?= $activeDaftar ?>">
                    <i class="nav-icon fas fa-sticky-note"></i>
                        <p>
                            Pendaftaran
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" >
                        <li class="nav-item">
                            <a href="../pendaftaran/antri-pemohon.php" class="nav-link <?= $activeAntriMohon ?>">
                                <i class="bi bi-bar-chart-steps ml-4 mr-2"></i>
                                <p>Antrian Pemohon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../pendaftaran/antri-survei.php" class="nav-link <?= $activeAntriSurvei ?>">
                                <i class="bi bi-menu-app ml-4 mr-2"></i>
                                <p>Antrian Survei</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../pendaftaran/cetakreport.php" class="nav-link <?= $activeReportDaftar ?>">
                                <i class="bi bi-printer ml-4 mr-2"></i>
                                <p>Cetak Laporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- pemasangan -->
                <li class="nav-item mt-2 <?= $openPasang ?>">
                    <a href="#" class="nav-link <?= $activePasang ?>">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Pemasangan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../pemasangan/index.php" class="nav-link <?= $activeInputPasang ?>">
                                <i class="bi bi-menu-app ml-4 mr-2"></i>
                                <p>Input Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../pemasangan/cari.php" class="nav-link <?= $activeCariPasang ?>">
                                <i class="bi bi-search ml-4 mr-2"></i>
                                <p>Cari Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../pemasangan/surat.php" class="nav-link <?= $activeSuratPasang ?>">
                                <i class="bi bi-file-text ml-4 mr-2"></i>
                                <p>Cetak Surat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../pemasangan/cetakreport.php" class="nav-link <?= $activeReportPasang ?>">
                                <i class="bi bi-archive ml-4 mr-2"></i>
                                <p>Cetak Laporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header mt-3"><b>MENU LAINNYA</b></li>
                <!-- buka tutup -->
                <li class="nav-item <?= $openBukaTutup ?>">
                    <a href="#" class="nav-link <?= $activeBukaTutup ?>">
                        <i class="nav-icon fas fa-toggle-on"></i>
                        <p>
                            Buka & Tutup
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../bukatutup/index.php" class="nav-link <?= $activeInputBukaTutup ?>">
                                <i class="bi bi-menu-app ml-4 mr-2"></i>
                                <p>Input & Cek Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../bukatutup/antrian-bukatutup.php" class="nav-link <?= $activeAntrianBukaTutup ?>">
                                <i class="bi bi-bar-chart-steps ml-4 mr-2"></i>
                                <p>Antrian Buka Tutup</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../bukatutup/report-jumlah-biaya-bukatutup.php" class="nav-link <?= $activeReportBukaTutup ?>">
                                <i class="bi bi-archive ml-4 mr-2"></i>
                                <p>Cetak Laporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- balik nama -->
                <li class="nav-item mt-2 <?= $openBaliknama ?>">
                    <a href="#" class="nav-link <?= $activeBaliknama ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Balik Nama
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../baliknama/index.php" class="nav-link <?= $activeInputBaliknama ?>">
                                <i class="bi bi-menu-app ml-4 mr-2"></i>
                                <p>Input Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../baliknama/cari.php" class="nav-link <?= $activeCariBaliknama ?>">
                                <i class="bi bi-search ml-4 mr-2"></i>
                                <p>Cari Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../baliknama/report-jumlah-biaya-baliknama.php" class="nav-link <?= $activeReportBaliknama ?>">
                                <i class="bi bi-archive ml-4 mr-2"></i>
                                <p>Cetak Laporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- keluhan pelanggan -->
                <li class="nav-item mt-2 mb-1 <?= $openKeluhan ?>">
                    <a href="#" class="nav-link <?= $activeKeluhan ?>">
                        <i class="nav-icon fas fa-exclamation-circle"></i>
                        <p>
                            Keluhan Pelanggan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../keluhan/index.php" class="nav-link <?= $activeInputKeluhan ?>">
                                <i class="bi bi-plus-square ml-4 mr-2"></i>
                                <p>Input Keluhan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../keluhan/penanganan.php" class="nav-link <?= $activePenanganan ?>">
                                <i class="bi bi-menu-app ml-4 mr-2"></i>
                                <p>Antrian Penanganan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../keluhan/report/report-baliknama.php" class="nav-link <?= $activeReportKeluhan ?>" target="_blank">
                                <i class="bi bi-archive ml-4 mr-2"></i>
                                <p>Cetak Laporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- data pelanggan -->
                <li class="nav-item">
                    <a href="../pelanggan/index.php" class="nav-link <?php echo $activePelanggan ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Data Pelanggan
                        </p>
                    </a>
                </li>
                <!-- laporan nonair -->
                <li class="nav-item mb-5">
                    <a href="../reportnonair/index.php" class="nav-link <?php echo $activeReportNonair ?>">
                        <i class=" nav-icon fas fa-print"></i>
                        <p>
                            Laporan Non Air
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
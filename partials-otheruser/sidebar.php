<aside class="main-sidebar sidebar-dark-secondary elevation-2" style="background-color: #12263d">
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
                    <a href="index.php" class="nav-link <?= $activeHome ?>">
                        <i class="nav-icon fas fa-igloo"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-header mt-2"><b>MENU PEMOHON</b></li>
                <li class="nav-item">
                    <a href="../otheruser/lengkapi-berkas.php" class="nav-link <?php echo $activeBerkas ?>">
                    <i class="fas fa-file mr-2"></i>
                        <p>
                            Lengkapi Berkas
                        </p>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="../otheruser/hasil-survei.php" class="nav-link <?php echo $activeSurvei?>">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <p>
                            Hasil Survei Pemasangan
                        </p>
                    </a>
                </li>
                <?php
                $nolog = $_SESSION['no_log'];
                $sql = "SELECT * FROM antri_daftar WHERE no_log='$nolog' AND status_pasang='Terpasang';";
                $result = $conn->query($sql);
                                          
                $data = $result->fetch_assoc();
                $row = mysqli_num_rows($result);
                if($row > 0){
                ?>
                <li class="nav-header mt-1"><b>MENU PELANGGAN</b></li>
                <li class="nav-item">
                    <a href="../otheruser/lengkapi-berkas.php" class="nav-link <?php echo $activeAjututup ?>">
                    <i class="fas fa-file mr-2"></i>
                        <p>
                            Pengajuan Penutupan
                        </p>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="../otheruser/hasil-survei.php" class="nav-link <?php echo $activeKeluhan?>">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <p>
                            Keluhan
                        </p>
                    </a>
                </li>
                <?php } ?>
                <li class="nav-header"><b>MENU LAINNYA</b></li>
                <li class="nav-item">
                    <a href="../logsystem/logout.php" class="nav-link <?php echo $activePelanggan ?>">
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
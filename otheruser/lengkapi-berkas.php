<?php
session_start();
    include_once ("../functions.php");

    if(isset($_SESSION['peran'])){
        header("location: ../logsystem/index.php");
        exit;
    }

    if (!isset($_SESSION['signin'])){
        header("location: ../logsystem/index.php");
    }

    $activeBerkas = "active";

    if($_SESSION['jenis_kel'] == 'Laki-Laki'){
        $image = "avatar.png";
    }elseif($_SESSION['jenis_kel'] == 'Perempuan'){
        $image = "avatar2.png";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials-otheruser/head.php") ?>
    <!-- sweetalert css -->
    <link rel="stylesheet" href="../libraries/sweetalert2/dist/sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>
    <div class="wrapper">
        <?php include_once ("../partials-otheruser/navbar.php") ?>
        <?php include_once ("../partials-otheruser/sidebar.php") ?>
<?php 
        if(isset($_SESSION['hasil'])){
            if($_SESSION['hasil']){
?>
            <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION["pesan"] ?>',
                showConfirmButton: true
                })
            </script>
<?php 
            } else {
?>
            <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '<?php echo $_SESSION["pesan"] ?>',
                showConfirmButton: true
                })
            </script>
<?php
            }
            unset($_SESSION['pesan']);
            unset($_SESSION['hasil']);
        }
?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-12 text-center">
                            <h1 class="d-inline">Lengkapi Berkas Registrasi</h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body mt-1">
                                    <?php 
                                    $nolog = $_SESSION['no_log'];
                                    $noreg = $_SESSION['noreg'];
                                    $sqlDaftar = "SELECT * FROM pendaftaran WHERE no_reg='$noreg'";
                                    $sqlCabang = "SELECT * FROM antri_daftar WHERE no_reg='$noreg'";
                                    $resultDaftar = $conn->query($sqlDaftar);
                                    $resultCabang = $conn->query($sqlCabang);
                                          
                                    $dataPendaftaran = $resultDaftar->fetch_assoc();
                                    $dataCabang = $resultCabang->fetch_assoc();
                                    ?>
                                    <form method="post" action="action-berkas.php" enctype="multipart/form-data">
                                        <div class="form-group row mt-3">
                                            <label for="no_reg" class="col-sm-2 col-form-label">Nomor Registrasi</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="no_reg" name="no_reg" value="<?= $noreg ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <label for="no_log" class="col-sm-2 col-form-label">Nomor Login</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="no_log" name="no_log" value="<?= $nolog ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_ktp" class="col-sm-2 col-form-label">Nomor KTP / NIK</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ktp" name="no_ktp" value="<?= $dataPendaftaran['no_ktp'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ktp" class="col-sm-2 col-form-label">Upload KTP</label>
                                            <div class="col-sm-4">
                                                <input type="file" class="form-control form-control-sm border-secondary mb-2" id="ktp" name="ktp" required>
                                                <img src="ktppic/<?= $dataPendaftaran['ktp'] ?>" alt="" width="160px">
                                            </div>
                                            <div id="phoneHelp" class="form-text">
                                                Ukuran maksimal 1 MB
                                                <span style="color:#f25056; font-size:.9em;">*Ekstensi foto .png | .jpg | .jpeg</span>
                                            </div>
                                        </div>
                                        <?php 
                                        $dataCabang['cabang']
                                        ?>
                                        <div class="form-group row">
                                            <label for="cabang" class="col-sm-2 col-form-label">Wilayah / Cabang</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="cabang" name="cabang" value="<?= $dataCabang['cabang'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-8 float-right mt-3 mb-4">
                                            <span class="col-sm-5">
                                                <button type="submit" name="save" class="btn" style="background:#046ea7; color:white;">SIMPAN</button>
                                            </span>
                                            <span class="col-sm-5">
                                                <button type="submit" name="edit" class="btn" style="background:#02a44f; color:white;">UBAH</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php include_once ("../partials-otheruser/importjs.php") ?>
</body>
</html>
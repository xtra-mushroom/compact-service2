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
    <?php include_once ("partials/head.php") ?>
    <!-- sweetalert css -->
    <link rel="stylesheet" href="../libraries/sweetalert2/dist/sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>
    <div class="wrapper">
        <?php include_once ("partials/navbar.php") ?>
        <?php include_once ("partials/sidebar.php") ?>
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
                                    $nolog = $_SESSION['password'];
                                    $noreg = $_SESSION['noreg'];
                                    $sql = "SELECT * FROM pendaftaran WHERE no_reg='$noreg'";
                                    $result = $conn->query($sql);
                                          
                                    $data = $result->fetch_assoc();
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
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ktp" name="no_ktp" value="<?= $data['no_ktp'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ktp" class="col-sm-2 col-form-label">Upload KTP</label>
                                            <div class="col-sm-4">
                                                <input type="file" class="form-control form-control-sm border-secondary mb-2" id="ktp" name="ktp" required>
                                                <img src="ktppic/<?= $data['ktp'] ?>" alt="" width="160px">
                                            </div>
                                            <div id="phoneHelp" class="form-text">
                                                Ukuran maksimal 1 MB
                                                <span style="color:#f25056; font-size:.9em;">*Ekstensi foto .png | .jpg | .jpeg</span>
                                            </div>
                                        </div>
                                        <?php 
                                        if($data['cabang'] == '01'){
                                            $select1 = 'selected';
                                        }elseif($data['cabang'] == '02'){
                                            $select2 = 'selected';
                                        }elseif($data['cabang'] == '3'){
                                            $select3 = 'selected';
                                        }elseif($data['cabang'] == '04'){
                                            $select4 = 'selected';
                                        }elseif($data['cabang'] == '05'){
                                            $select5 = 'selected';
                                        }elseif($data['cabang'] == '06'){
                                            $select5 = 'selected';
                                        }elseif($data['cabang'] == '07'){
                                            $select7 = 'selected';
                                        }elseif($data['cabang'] == '08'){
                                            $select8 = 'selected';
                                        }
                                        ?>
                                        <div class="form-group row">
                                            <label for="wil" class="col-sm-2 col-form-label">Wilayah / Cabang</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="wil" name="wil" required>
                                                    <option class="text-secondary" value="">---</option>
                                                    <option value="01" <?= $select1 ?>>01 Paringin</option>
                                                    <option value="02" <?= $select2 ?>>02 Paringin Selatan</option>
                                                    <option value="03" <?= $select3 ?>>03 Awayan</option>
                                                    <option value="04" <?= $select4 ?>>04 Lampihong</option>
                                                    <option value="05" <?= $select5 ?>>05 Juai</option>
                                                    <option value="06" <?= $select6 ?>>06 Halong</option>
                                                    <option value="07" <?= $select7 ?>>07 Batumandi</option>
                                                    <option value="08" <?= $select8 ?>>08 Tebing Tinggi</option>
                                                </select>
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

    <?php include_once ("partials/importjs.php") ?>
</body>
</html>
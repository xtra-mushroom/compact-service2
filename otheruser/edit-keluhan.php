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

    $activeKeluhan = "active";

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
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once ("../partials-otheruser/navbar.php") ?>
        <?php include_once ("../partials-otheruser/sidebar.php") ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-7">
                            <h1 class="d-inline">Edit Data Keluhan</h1>
                        </div>
                        <div class="col-sm-5">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Keluhan</li>
                                <li class="breadcrumb-item">Edit Keluhan</li>
                            </ol>
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
                                <div class="card-body mt-2">
                                    <!-- di sini form buka tutup -->
                                    <?php 
                                    $no_ds = $_SESSION['no_log'];
                                    $sql = "SELECT * FROM keluhan WHERE no_ds='$no_ds'";
                                    $result = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    ?>
                                    <form method="post" action="update-keluhan.php" enctype="multipart/form-data">
                                        <div class="form-group row mt-2">
                                            <label for="id_keluhan" class="col-sm-2 col-form-label">ID Keluhan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="id_keluhan" name="id_keluhan" value="<?=$data['no_keluhan']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-2">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor DS</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ds" name="no_ds" value="<?=$data['no_ds']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama" name="nama" value="<?=$data['nama']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat" name="alamat" value="<?=$data['alamat']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp" name="no_hp" value="<?=$data['no_hp']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_keluhan" class="col-sm-2 col-form-label">Tanggal Keluhan</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl_keluhan" name="tgl_keluhan" value="<?=$data['tgl_keluhan']?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control form-control-sm border-secondary" id="keluhan" name="keluhan" rows="5"><?=$data['keluhan']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="foto_keluhan" class="col-sm-2 col-form-label">Upload Foto Keluhan <span class="text-danger">*opsional</span></label>
                                            <div class="col-sm-4">
                                                <input type="file" class="form-control form-control-sm border-secondary" id="foto_keluhan" name="foto_keluhan">
                                                <input name="x" type="hidden" id="x" value="<?=$data['img_keluhan']?>">
                                            </div>
                                        </div>
                                        <div class="card-footer col-6 text-right">
                                            <button type="submit" name="update" class="btn btn-dark float-right ml-3">UBAH</button>
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
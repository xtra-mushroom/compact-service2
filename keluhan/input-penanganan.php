<?php
session_start();
include_once "../functions.php";
include_once ("../partials/session-pegawai.php");

$openKeluhan = "menu-open";
$activeKeluhan = "active"; $activePenanganan = "active";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once ("../partials/navbar.php") ?>
        <?php include_once ("../partials/sidebar.php") ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-7">
                            <h1 class="d-inline">Input Penanganan</h1>
                        </div>
                        <div class="col-sm-5">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Antrian Penanganan</li>
                                <li class="breadcrumb-item">Input Penanganan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body ml-3 mt-2">
                                    <!-- di sini form buka tutup -->
                                    <?php 
                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM keluhan WHERE no_keluhan='$id'";
                                    $result = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    ?>
                                    <h5 class="text-center mb-3">Data Keluhan</h5>
                                    <form method="post" action="">
                                        <div class="form-group row mt-2">
                                            <label for="no_ds" class="col-sm-4 col-form-label">Nomor DS</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ds" name="no_ds" value="<?=$data['no_ds']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama" name="nama" value="<?=$data['nama']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat" name="alamat" value="<?=$data['alamat']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-4 col-form-label">Nomor HP</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp" name="no_hp" value="<?=$data['no_hp']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_keluhan" class="col-sm-4 col-form-label">Tanggal Keluhan</label>
                                            <div class="col-sm-7">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl_keluhan" name="tgl_keluhan" value="<?=$data['tgl_keluhan']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="keluhan" class="col-sm-4 col-form-label">Keluhan</label>
                                            <div class="col-sm-7">
                                                <textarea class="form-control form-control-sm border-secondary" id="keluhan" name="keluhan" rows="5" readonly><?=$data['keluhan']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="foto_keluhan" class="col-sm-4 col-form-label">Gambar Bukti</label>
                                            <div class="col-sm-7">
                                                <img src="../otheruser/img-keluhan/<?=$data['img_keluhan']?>" width="100px" alt="">
                                                <p class="text-secondary" style="font-size:.9em"><b>klik kanan > open image in new tab</b></p> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body ml-3 mt-2">
                                    <h5 class="text-center mb-3">Penanganan</h5>
                                    <form method="post" action="">
                                        <div class="form-group row mt-2">
                                            <label for="jenis" class="col-sm-4 col-form-label">Jenis Penanganan</label>
                                            <div class="col-sm-7">
                                                <select class="form-control form-control-sm border-secondary" id="jenis" name="jenis" required>
                                                    <option class="text-secondary" selected>---</option>
                                                    <option value="Butuh observasi dan tindak lanjut">Butuh observasi dan tindak lanjut</option>
                                                    <option value="Penanganan instan">Penanganan instan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="penanganan" class="col-sm-4 col-form-label">Penanganan</label>
                                            <div class="col-sm-7">
                                                <textarea class="form-control form-control-sm border-secondary" id="penanganan" name="penanganan" rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="catatan" class="col-sm-4 col-form-label">Catatan</label>
                                            <div class="col-sm-7">
                                                <textarea class="form-control form-control-sm border-secondary" id="catatan" name="catatan" rows="2" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_tangani" class="col-sm-4 col-form-label">Tanggal Penanganan</label>
                                            <div class="col-sm-7">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl_tangani" name="tgl_tangani" required>
                                            </div>
                                        </div>
                                        <div class="card-footer col-12 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark float-right ml-3">SIMPAN</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php 
                        if(isset($_POST['submit'])){
                            $id = $_GET['id'];
                            $jenis = $_POST['jenis'];
                            $penanganan = $_POST['penanganan'];
                            $catatan = $_POST['catatan'];
                            $tglTangani = $_POST['tgl_tangani'];

                            if($jenis == 'Penanganan instan'){
                                $statusPenanganan = 'Telah ditangani';
                            }elseif($jenis == 'Butuh observasi dan tindak lanjut'){
                                $statusPenanganan = 'Belum ditangani'; // karena akan dilempar dulu ke teknisi untuk dicek ke lapangan, status penanganan akan diupdate teknisi jika masalah telah diatasi
                            }

                            $sqlUpdate = "UPDATE keluhan SET jenis_penanganan='$jenis', penanganan='$penanganan', catatan='$catatan', tgl_tangani='$tglTangani', status_penanganan='$statusPenanganan' WHERE no_keluhan='$id';";
                            $updatePenanganan = mysqli_query($conn, $sqlUpdate);

                            if($updatePenanganan == true){
                                $_SESSION['hasil'] = true;
                                $_SESSION['pesan'] = "Data berhasil disimpan";
                            } else {
                                $_SESSION['hasil'] = false;
                                $_SESSION['pesan'] = "Gagal menyimpan data";
                            }
                            echo "<meta http-equiv='refresh' content='0;url=penanganan.php'>";
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php include_once ("../partials-otheruser/importjs.php") ?>
</body>
</html>
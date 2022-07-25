<?php
session_start();
include_once ("../partials/session-pegawai.php");
require_once "../functions.php";
$openPasang = "menu-open";
$activePasang = "active"; $activeCariPasang = "active";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once ("../partials/navbar.php") ?>

        <!-- Sidebar -->
        <?php include_once ("../partials/sidebar.php") ?>

        <!-- Content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1>Edit Data Pemasangan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pemasangan</li>
                                <li class="breadcrumb-item active">Cari Data</li>
                                <li class="breadcrumb-item">Edit Data</li>
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
                                <div class="card-body ml-5 mt-3">
                                    <!-- di sini form pemasangan -->
                                    <?php 
                                    $no = $_GET['no_ds'];
                                    $sql = "SELECT pemasangan.no_ds, pemasangan.tgl_pasang, pemasangan.status_kep_rumah, pemasangan.jumlah_jiwa, pemasangan.pln, pemasangan.cabang, pemasangan.gol_tarif, pemasangan.biaya, antri_daftar.nama, pendaftaran.no_ktp, antri_daftar.jenis_kel, antri_daftar.alamat, antri_daftar.no_hp FROM pemasangan INNER JOIN pendaftaran ON pemasangan.no_ds = pendaftaran.no_ds INNER JOIN antri_daftar ON antri_daftar.no_reg = pendaftaran.no_reg WHERE pemasangan.no_ds='$no'";
                                    $result = $conn->query($sql);
                                                
                                    while($data = $result->fetch_assoc()){
                                    ?>

                                    <form action="" method="post">
                                        <div class="form-group row">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor Sambungan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ds"
                                                name="no_ds" value="<?= $data['no_ds']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_pasang" class="col-sm-2 col-form-label">Tanggal Pemasangan</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl_pasang" name="tgl_pasang" autocomplete="off" value="<?= $data['tgl_pasang']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama"
                                                name="nama" autocomplete="off" value="<?= $data['nama']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="jenis_kel"
                                                name="jenis_kel" autocomplete="off" value="<?= $data['jenis_kel']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat"
                                                name="alamat" autocomplete="off" value="<?= $data['alamat']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status_kep_rumah" class="col-sm-2 col-form-label">Kepemilikan Rumah</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="status_kep_rumah"
                                                    name="status_kep_rumah" value="<?= $data['status_kep_rumah']; ?>">
                                                    <option class="text-secondary" selected>---</option>
                                                    <?php 
                                                    if($data['status_kep_rumah'] == "Milik sendiri"){
                                                        $milikSendiri = "selected";
                                                    } elseif($data['status_kep_rumah'] == "Sewa"){
                                                        $sewa = "selected";
                                                    } elseif($data['status_kep_rumah'] == "Milik keluarga"){
                                                        $milikKel = "selected";
                                                    } elseif($data['status_kep_rumah'] == "Lain-lain"){
                                                        $lainnya = "selected";
                                                    }
                                                    ?>
                                                    <option value="Milik sendiri" <?= " " . $milikSendiri; ?>>Milik sendiri</option>
                                                    <option value="Sewa" <?= " " . $sewa; ?>>Sewa</option>
                                                    <option value="Milik keluarga" <?= " " . $milikKel; ?>>Milik keluarga</option>
                                                    <option value="Lain-lain" <?= " " . $lainnya; ?>>Lain-lain</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jumlah_jiwa" class="col-sm-2 col-form-label">Jumlah Jiwa</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="jumlah_jiwa"
                                                name="jumlah_jiwa" autocomplete="off" value="<?= $data['jumlah_jiwa']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pln" class="col-sm-2 col-form-label">PLN</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="pln" name="pln" autocomplete="off" value="<?= $data['pln']; ?>">
                                            </div>
                                        </div>
                                        <hr>
                                        <h5 class="mb-3">Cabang & Biaya</h5>
                                        <div class="form-group row">
                                            <label for="cabang" class="col-sm-2 col-form-label">Cabang / Wilayah</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="cabang"
                                                name="cabang" autocomplete="off" value="<?= $data['cabang']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gol_tarif" class="col-sm-2 col-form-label">ID Tarif</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="gol_tarif"
                                                name="gol_tarif" autocomplete="off" value="<?= $data['gol_tarif']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="biaya"
                                                name="biaya" autocomplete="off" value="<?= $data['biaya']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="card-footer col-6 text-right">
                                            <button type="submit" name="update" class="btn btn-dark">UBAH</button>
                                        </div>
                                    </form>
                                    <?php } ?>

                                    <?php
                                    if(isset($_POST["update"])){
                                     
                                        $ds = $_POST["no_ds"];
                                        $tgl = $_POST["tgl_pasang"];
                                        $statusRumah = $_POST["status_kep_rumah"];
                                        $jmlhJiwa = $_POST["jumlah_jiwa"];
                                        $pln = $_POST["pln"];
                                    
                                        $query = "UPDATE pemasangan
                                                    SET
                                                    tgl_pasang='$tgl', status_kep_rumah='$statusRumah', jumlah_jiwa='$jmlhJiwa', pln='$pln'
                                                    WHERE no_ds='$ds';";
                                    
                                        $updatePemasangan = mysqli_query($conn, $query);
                                         
                                        if($updatePemasangan == true){
                                            $_SESSION['hasil'] = true;
                                            $_SESSION['pesan'] = "Berhasil ubah data pemasangan";
                                        } else {
                                            $_SESSION['hasil'] = false;
                                            $_SESSION['pesan'] = "Gagal ubah data pemasangan";
                                        }
                                        echo "<meta http-equiv='refresh' content='0;url=cari.php'>";
                                    
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <script src="script.js"></script>

    <?php include_once ("../partials/importjs.php") ?>
</body>
</html>
<?php
session_start();
include_once "../functions.php";
include_once "../partials/session-pegawai.php";

$openDaftar = "menu-open";
$activeDaftar = "active"; $activeAntriSurvei = "active";
?>

<!DOCTYPE html>
<head>
    <?php include_once ("../partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>

    <div class="wrapper">
        <!-- Navbar right-->
        <?php include_once ("../partials/navbar.php") ?>

        <!-- Sidebar -->
        <?php include_once ("../partials/sidebar.php") ?>

        <!-- Content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1 class="d-inline mr-4">Verifikasi Berkas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pendaftaran</li>
                                <li class="breadcrumb-item">Antrian Survei</li>
                                <li class="breadcrumb-item">Verifikasi Berkas</li>
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
                                <div class="card-body ml-5 mt-1">
                                    <?php 
                                    $noreg = $_GET['no_reg'];
                                    $sql = "SELECT pendaftaran.no_reg, antri_daftar.nama, antri_daftar.jenis_kel, antri_daftar.no_hp, antri_daftar.alamat, pendaftaran.no_ktp, pendaftaran.ktp, pendaftaran.tgl_daftar, pendaftaran.biaya, pendaftaran.status_berkas, pendaftaran.tgl_survei, pendaftaran.status_survei FROM pendaftaran INNER JOIN antri_daftar ON pendaftaran.no_reg = antri_daftar.no_reg WHERE pendaftaran.no_reg='$noreg'";
                                    $result = $conn->query($sql);
                                                
                                    while($data = $result->fetch_assoc()){
                                    ?>
                                    
                                    <form method="post" action="">
                                        <div class="form-group row mt-3">
                                            <label for="no_reg" class="col-sm-2 col-form-label">Nomor Registrasi</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="no_reg" name="no_reg" value="<?php echo $data['no_reg']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama" name="nama" autocomplete="off" value="<?php echo $data['nama']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="jenis_kel" name="jenis_kel" disabled>
                                                    <option class="text-secondary" selected>---</option>
                                                    <?php
                                                    if($data['jenis_kel'] == "Laki-Laki"){
                                                        $laki = "selected";
                                                    }elseif($data['jenis_kel'] == "Perempuan"){
                                                        $perem = "selected";
                                                    }
                                                    ?>
                                                    <option value="Laki-Laki"<?= ' ' . $laki ?>>Laki-Laki</option>
                                                    <option value="Perempuan"<?= ' ' . $perem ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp" name="no_hp" autocomplete="off" value="<?php echo $data['no_hp']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat" name="alamat" autocomplete="off" value="<?php echo $data['alamat']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_ktp" class="col-sm-2 col-form-label">Nomor KTP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ktp" name="no_ktp" autocomplete="off" value="<?php echo $data['no_ktp']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ktp" class="col-sm-2 col-form-label">KTP</label>
                                            <div class="col-sm-4">
                                                <img src="../otheruser/ktppic/<?php echo $data['ktp']; ?>" width="100px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_daftar" class="col-sm-2 col-form-label">Tanggal Upload Berkas</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="tgl_daftar" name="tgl_daftar" autocomplete="off" value="<?php echo $data['tgl_daftar']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="biaya" name="biaya" autocomplete="off" value="<?php echo rupiah($data['biaya']); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lalong" class="col-sm-2 col-form-label">Nilai Koordinat</label>
                                            <div class="col-sm-1">
                                                <a href="https://www.google.com/maps/place/Gedung+Sanggam/@-2.3364099,115.4577036,17z/data=!3m1!4b1!4m5!3m4!1s0x2de54fd2bff45cd5:0xfe7251852b053f72!8m2!3d-2.33642!4d115.459891" target="_blank" class="btn btn-sm btn-warning"><i class="bi bi-geo-alt-fill"></i></a>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="lalong" name="lalong" autocomplete="off" value="<?php echo $data['lalong_val']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-10 float-right">
                                            <div class="form-check">
                                                <div class="col-sm-5">
                                                    <input class="form-check-input" type="checkbox" value="diverifikasi" id="status" name="status">
                                                    <label class="form-check-label text-danger" for="status">
                                                        <b>Telah Diverifikasi</b>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="card-footer col-sm-5 text-right">
                                                <button type="submit" name="submit" class="btn btn-dark">SIMPAN</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php } ?> 
                                    
                                    <?php
                                    if(isset($_POST["submit"])){
                                        $noreg = $_POST['no_reg'];
                                        $status = $_POST['status'];
                                        $koordinat = $_POST['lalong'];
                                        
                                        $query = "UPDATE pendaftaran
                                                    SET
                                                    status_berkas='$status', lalong_val='$koordinat' WHERE no_reg='$noreg';";
                                        
                                        $verifBerkas = mysqli_query($conn, $query);
                                        
                                        if($verifBerkas == true){
                                            $_SESSION['hasil'] = true;
                                            $_SESSION['pesan'] = "Berhasil verifikasi berkas";
                                        } else {
                                            $_SESSION['hasil'] = false;
                                            $_SESSION['pesan'] = "Gagal verifkasi berkas";
                                        }
                                        echo "<meta http-equiv='refresh' content='0;url=antri-survei.php'>";
                                    }
                                    ?>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="script.js"></script>

    <?php include_once ("../partials/importjs.php") ?>

</body>

</html>
<?php
session_start();
require_once "../functions.php";
include_once "../partials/session-pegawai.php";

$openDaftar = "menu-open";
$activeDaftar = "active"; $activeAntriMohon = "active";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>

    <div class="wrapper">
        <?php include_once ("../partials/navbar.php") ?>
        <?php include_once ("../partials/sidebar.php") ?>
        <!-- Content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1 class="d-inline mr-4">Verifikasi Data dan Pembayaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pendaftaran</li>
                                <li class="breadcrumb-item active">Antri Pemohon</li>
                                <li class="breadcrumb-item">Verifikasi</li>
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
                                    $sql = "SELECT * FROM antri_daftar WHERE no_reg='$noreg'";
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
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama" name="nama" autocomplete="off" value="<?php echo $data['nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="jenis_kel"
                                                    name="jenis_kel">
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
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat" name="alamat" autocomplete="off" value="<?php echo $data['alamat']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="wil" class="col-sm-2 col-form-label">Wilayah / Cabang</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="wil" name="wil">
                                                    <option class="text-secondary" value="">---</option>
                                                    <option value="01">01 Paringin</option>
                                                    <option value="02">02 Paringin Selatan</option>
                                                    <option value="03">03 Awayan</option>
                                                    <option value="04">04 Lampihong</option>
                                                    <option value="05">05 Juai</option>
                                                    <option value="06">06 Halong</option>
                                                    <option value="07">07 Batumandi</option>
                                                    <option value="08">08 Tebing Tinggi</option>
                                                </select>
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
                                        $noreg = $_GET['no_reg'];
                                        $nama = $_POST['nama'];
                                        $jenisKel = $_POST['jenis_kel'];
                                        $hp = $_POST['no_hp'];
                                        $alamat = $_POST['alamat'];
                                        $idWil = $_POST['wil'];
                                        $biaya = $_POST['biaya'];
                                        $status = $_POST['status'];

                                        // generate nomor login
                                        $nolog = $idWil.substr($hp,-4).rand(1000,9999);
                                        // var_dump($nolog);
                                        
                                        $buktiBayar = "report/kwitansi.php?no_reg=".$noreg;

                                        $query = "UPDATE antri_daftar
                                                    SET
                                                    nama='$nama', jenis_kel='$jenisKel', alamat='$alamat', cabang='$idWil', no_log='$nolog', bukti_bayar='$buktiBayar', status_bayar='$status' WHERE no_reg='$noreg';";
                                        $resultUploadKwitansi = mysqli_query($conn, $query);

                                        if($resultUploadKwitansi == true){
                                            echo "<meta http-equiv='refresh' content='0;url=report/kwitansi.php?no_reg=$noreg'>";
                                        }
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

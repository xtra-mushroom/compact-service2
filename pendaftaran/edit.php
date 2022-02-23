<?php 
require_once "../functions.php";
$query = query("SELECT * FROM pendaftaran");
$no = $_GET['no_pend'];
$sql = "SELECT * FROM pendaftaran where no_pend='$no'";
$pendaftaran = $conn->query($sql)->fetch_assoc();

$openDaftar = "menu-open";
$activeDaftar = "active"; $activeCariDaftar = "active";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
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
                            <h1 class="d-inline mr-4">Edit Data Pendaftaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pendaftaran</li>
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
                                <div class="card-body ml-5 mt-1">
                                    <!-- di sini form pendaftaran -->
                                    <?php 
                                    $no = $_GET['no_pend'];
                                    $sql = "SELECT * FROM pendaftaran where no_pend='$no'";
                                    $result = $conn->query($sql);
                                                
                                    while($data = $result->fetch_assoc()){
                                    ?>
                                    
                                    <form method="post" action="">
                                        <div class="form-group row mt-3">
                                            <label for="no_pend" class="col-sm-2 col-form-label">Nomor Pendaftaran</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="no_pend" name="no_pend" value="<?php echo $data['no_pend']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_daftar" class="col-sm-2 col-form-label">Tanggal Pendaftaran</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl_daftar" name="tgl_daftar" value="<?php echo $data['tgl_daftar']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_ktp" class="col-sm-2 col-form-label">Nomor KTP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ktp" name="no_ktp" autocomplete="off" value="<?php echo $data['no_ktp']; ?>">
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
                                                    if($pendaftaran['jenis_kel'] == "Laki-Laki"){
                                                        $laki = "selected";
                                                    }elseif($pendaftaran['jenis_kel'] == "Perempuan"){
                                                        $perem = "selected";
                                                    }
                                                    ?>
                                                    <option value="Laki-Laki"<?= ' ' . $laki ?>>Laki-Laki</option>
                                                    <option value="Perempuan"<?= ' ' . $perem ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat" name="alamat" autocomplete="off" value="<?php echo $data['alamat']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp" name="no_hp" autocomplete="off" value="<?php echo $data['no_hp']; ?>">
                                            </div>
                                        </div>
    
                                        <div class="form-group row">
                                            <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="kecamatan"
                                                    name="kecamatan">
                                                    <option class="text-secondary" value="">---</option>
                                                    <?php
                                                    $sql1 = "SELECT * FROM kecamatan";
                                                    $result1 = $conn->query($sql1);
                                                    while($kecamatan = $result1->fetch_assoc()){
                                                        if ($pendaftaran['kecamatan'] == $kecamatan['id']) {
                                                            echo "<option value='".$kecamatan['id']."' selected>".$kecamatan['nama']."</option>";
                                                        } else {
                                                            echo "<option value='".$kecamatan['id']."'>".$kecamatan['nama']."</option>";
                                                        }
                                                    }  
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="desa" class="col-sm-2 col-form-label">Desa</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="desa" name="desa" value="<?php echo $data['desa']; ?>">
                                                    <option class="text-secondary">---</option>
                                                    <?php
                                                    
                                                    $sql = "SELECT * FROM desa";
                                                    $result = $conn->query($sql);
                                                    while($desa = $result->fetch_assoc()){
                                                        if ($pendaftaran['desa'] == $desa['id']) {
                                                            echo "<option value='".$desa['id']."' selected>".$desa['nama']."</option>";
                                                        } else {
                                                            echo "<option value='".$desa['id']."'>".$desa['nama']."</option>";
                                                        }
                                                    }
                                                    
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="wil" class="col-sm-2 col-form-label">Wilayah / Cabang</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="wil" name="wil" value="">
                                                    <option class="text-secondary" value="">---</option>
                                                    <?php
                                                    $wil1 = "";
                                                    $wil2 = "";
                                                    $wil3 = "";
                                                    $wil4 = "";
                                                    $wil5 = "";
                                                    $wil6 = "";
                                                    $wil7 = "";
                                                    $wil8 = "";
                                                    $wil9 = "";

                                                    if ($pendaftaran['wil'] == "Paringin 1") {
                                                        $wil1 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "Paringin 2") {
                                                        $wil2 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "Awayan") {
                                                        $wil3 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "Lampihong") {
                                                        $wil4 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "Halong") {
                                                        $wil5 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "Juai") {
                                                        $wil6 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "Batumandi") {
                                                        $wil7 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "Paringin Selatan") {
                                                        $wil8 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "Tebing Tinggi") {
                                                        $wil9 = "selected";
                                                    }
                                                    ?>
                                                    <option value="Paringin 1"<?= " " . $wil1 ?>>01 Paringin 1</option>
                                                    <option value="Paringin 2"<?= " " . $wil2 ?>>02 Paringin 2</option>
                                                    <option value="Awayan"<?= " " . $wil3 ?>>03 Awayan</option>
                                                    <option value="Lampihong"<?= " " . $wil4 ?>>04 Lampihong</option>
                                                    <option value="Halong"<?= " " . $wil5 ?>>05 Halong</option>
                                                    <option value="Juai"<?= " " . $wil6 ?>>06 Juai</option>
                                                    <option value="Batumandi"<?= " " . $wil7 ?>>07 Batumandi</option>
                                                    <option value="Paringin Selatan"<?= " " . $wil8 ?>>08 Paringin Selatan</option>
                                                    <option value="Tebing Tinggi"<?= " " . $wil9 ?>>09 Tebing Tinggi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer col-6 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark">SIMPAN</button>
                                        </div>
                                    </form>
                                    <?php } ?> 
                                    
                                    <?php
                                    if(isset($_POST["submit"])){
                                        if($_POST["wil"] == "Paringin 1"){
                                            $idWil = "01";
                                        }elseif($_POST["wil"] == "Paringin 2"){
                                            $idWil = "02";
                                        }elseif($_POST["wil"] == "Awayan"){
                                            $idWil = "03";
                                        }elseif($_POST["wil"] == "Lampihong"){
                                            $idWil = "04";
                                        }elseif($_POST["wil"] == "Halong"){
                                            $idWil = "05";
                                        }elseif($_POST["wil"] == "Juai"){
                                            $idWil = "06";
                                        }elseif($_POST["wil"] == "Batumandi"){
                                            $idWil = "07";
                                        }elseif($_POST["wil"] == "Paringin Selatan"){
                                            $idWil = "08";
                                        }elseif($_POST["wil"] == "Tebing Tinggi"){
                                            $idWil = "09";
                                        }
                                        
                                        $no = $_POST['no_pend'];
                                        $tgl = $_POST['tgl_daftar'];
                                        $ktp = $_POST['no_ktp'];
                                        $nama = $_POST['nama'];
                                        $jenisKel = $_POST['jenis_kel'];
                                        $alamat = $_POST['alamat'];
                                        $kec = $_POST['kecamatan'];
                                        $desa = $_POST['desa'];
                                        $hp = $_POST["no_hp"];
                                        $wilayah = $_POST["wil"];
                                        
                                        $query = "UPDATE pendaftaran
                                                    SET
                                                    no_pend=$no, tgl_daftar='$tgl', no_ktp='$ktp', nama='$nama', jenis_kel='$jenisKel', alamat='$alamat', kecamatan='$kec', desa='$desa', no_hp='$hp', id_wil='$idWil', wil='$wilayah' where no_pend='$no'";
                                        
                                        $updateDaftar = mysqli_query($conn, $query);
                                        // var_dump($query);
                                        
                                        if($updateDaftar == true){
                                            $_SESSION['hasil'] = true;
                                            $_SESSION['pesan'] = "Berhasil ubah data pendaftaran";
                                        } else {
                                            $_SESSION['hasil'] = false;
                                            $_SESSION['pesan'] = "Gagal ubah data pendaftaran";
                                        }
                                        echo "<meta http-equiv='refresh' content='0;url=cari.php'>";

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
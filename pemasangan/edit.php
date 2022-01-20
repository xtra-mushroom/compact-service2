<?php 
require_once "../functions.php";
$query = query("SELECT * FROM pemasangan");
$no = $_GET['no_ds'];
$sql = "SELECT * FROM pemasangan where no_ds='$no'";
$pemasangan = $conn->query($sql)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layanan</title>

    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../layout/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../layout/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../layout/dist/css/adminlte.min.css">
    <!-- icon tab -->
    <link rel="shortcut icon" href="../layout/dist/img/pdam-logo.png">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar right-->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../login/logout.php" class="nav-link"><i class="bi bi-box-arrow-right mr-1"></i>Logout</a>
                </li>
            </ul>
        </nav>
        <!-- end of Navbar right -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../layout/dist/img/pdam-logo.png" alt="PDAM Balangan Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light text-secondary"><b>PELAYANAN</b></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link">
                                <i class="nav-icon fas fa-igloo"></i>
                                <p>
                                    Home Page
                                </p>
                            </a>
                        </li>
                        <li class="nav-header mt-2">MENU PELAYANAN</li>
                            <!-- pendaftaran -->
                            <li class="nav-item">
                                <a href="../pendaftaran/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-marker"></i>
                                    <p>
                                        Pendaftaran
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../pendaftaran/index.php" class="nav-link">
                                            <i class="bi bi-menu-app ml-4 mr-2"></i>
                                            <p>Input Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pendaftaran/cari.php?cari=" class="nav-link">
                                            <i class="bi bi-search ml-4 mr-2"></i>
                                            <p>Cari Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pendaftaran/surat.php?cari=" class="nav-link">
                                            <i class="bi bi-printer ml-4 mr-2"></i>
                                            <p>Cetak Surat</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pendaftaran/report/report-pendaftaran.php" class="nav-link" target="_blank">
                                            <i class="bi bi-archive ml-4 mr-2"></i>
                                            <p>Cetak Report</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- pemasangan -->
                            <li class="nav-item menu-open mt-2">
                                <a href="#" class="nav-link active">
                                    <h4>
                                        <i class="nav-icon fas fa-wrench"></i>
                                        Pemasangan   
                                    </h4>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="index.php" class="nav-link">
                                            <i class="bi bi-menu-app ml-4 mr-2"></i>
                                            <p>Input Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cari.php?cari=" class="nav-link active">
                                            <i class="bi bi-search ml-4 mr-2"></i>
                                            <p>Cari Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="surat.php?cari=" class="nav-link">
                                            <i class="bi bi-printer ml-4 mr-2"></i>
                                            <p>Cetak Surat</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="report/report-pemasangan.php" class="nav-link" target="_blank">
                                            <i class="bi bi-archive ml-4 mr-2"></i>
                                            <p>Cetak Report</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- buka tutup -->
                            <li class="nav-item mt-2">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-toggle-on"></i>
                                    <p>
                                        Buka & Tutup
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../bukatutup/index.php" class="nav-link">
                                            <i class="bi bi-menu-app ml-4 mr-2"></i>
                                            <p>Input & Cek Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../bukatutup/surrat.php?cari=" class="nav-link">
                                            <i class="bi bi-printer ml-4 mr-2"></i>
                                            <p>Cetak Surat</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../bukatutup/report/report-bukatutup.php" class="nav-link" target="_blank">
                                            <i class="bi bi-archive ml-4 mr-2"></i>
                                            <p>Cetak Report</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- balik nama -->
                            <li class="nav-item mt-2">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users-cog"></i>
                                    <p>
                                        Balik Nama
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="bi bi-menu-app ml-4 mr-2"></i>
                                            <p>Input Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="bi bi-search ml-4 mr-2"></i>
                                            <p>Cari Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" target="_blank">
                                            <i class="bi bi-archive ml-4 mr-2"></i>
                                            <p>Cetak Report</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- keluhan pelanggan -->
                            <li class="nav-item mt-2 mb-5">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-exclamation-circle"></i>
                                    <p>
                                        Keluhan Pelanggan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../keluhan/index.php" class="nav-link">
                                            <i class="bi bi-menu-app ml-4 mr-2"></i>
                                            <p>Input Keluhan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../keluhan/cari.php?cari=" class="nav-link">
                                            <i class="bi bi-search ml-4 mr-2"></i>
                                            <p>Cari Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../keluhan/report/report-baliknama.php" class="nav-link" target="_blank">
                                            <i class="bi bi-archive ml-4 mr-2"></i>
                                            <p>Cetak Report</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
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
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-body ml-5 mt-3">
                                    <!-- di sini form pemasangan -->
                                    <?php 
                                    $no = $_GET['no_ds'];
                                    $sql = "SELECT * FROM pemasangan where no_ds='$no'";
                                    $result = $conn->query($sql);
                                                
                                    while($data = $result->fetch_assoc()){
                                    ?>

                                    <form action="update.php" method="post">
                                        <div class="form-group row">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor Sambungan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ds"
                                                name="no_ds" value="<?php echo $data['no_ds']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_pasang" class="col-sm-2 col-form-label">Tanggal Pemasangan</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl_pasang" name="tgl_pasang">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_ktp" class="col-sm-2 col-form-label">Nomor KTP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ktp"
                                                name="no_ktp" value="<?php echo $data['no_ktp']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama"
                                                name="nama" value="<?php echo $data['nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="jenis_kel"
                                                    name="jenis_kel" value="">
                                                    <option class="text-secondary" selected>---</option>
                                                    <?php 
                                                    $male = "";
                                                    $female = "";
                                                    if($pemasangan['jenis_kel'] == "Laki-Laki"){
                                                        $male = "selected";
                                                    } elseif ($pemasangan['jenis_kel'] == "Perempuan"){
                                                        $female = "selected";
                                                    }
                                                    ?>
                                                    <option value="Laki-Laki" <?php echo " " . $male; ?>>Laki-Laki</option>
                                                    <option value="Perempuan" <?php echo " " . $female; ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tmpt_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="tmpt_lahir"
                                                name="tmpt_lahir" value="<?php echo $data['tmpt_lahir']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="tgl_lahir" name="tgl_lahir" placeholder="hh/bb/tttt" value="<?php echo $data['tgl_lahir'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status_kep_rumah" class="col-sm-2 col-form-label">Kepemilikan Rumah</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="status_kep_rumah"
                                                    name="status_kep_rumah" value="<?php echo $data['status_kep_rumah']; ?>">
                                                    <option class="text-secondary" selected>---</option>
                                                    <?php 
                                                    $milikSendiri = "";
                                                    $sewa = "";
                                                    $milikKel = "";
                                                    $lainnya = "";

                                                    if($pemasangan['status_kep_rumah'] == "Milik sendiri"){
                                                        $milikSendiri = "selected";
                                                    } elseif($pemasangan['status_kep_rumah'] == "Sewa"){
                                                        $sewa = "selected";
                                                    } elseif($pemasangan['status_kep_rumah'] == "Milik keluarga"){
                                                        $milikKel = "selected";
                                                    } elseif($pemasangan['status_kep_rumah'] == "Lain-lain"){
                                                        $lainnya = "selected";
                                                    }
                                                    ?>
                                                    <option value="Milik sendiri" <?php echo " " . $milikSendiri; ?>>Milik sendiri</option>
                                                    <option value="Sewa" <?php echo " " . $sewa; ?>>Sewa</option>
                                                    <option value="Milik keluarga" <?php echo " " . $milikKel; ?>>Milik keluarga</option>
                                                    <option value="Lain-lain" <?php echo " " . $lainnya; ?>>Lain-lain</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jumlah_jiwa" class="col-sm-2 col-form-label">Jumlah Jiwa</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="jumlah_jiwa"
                                                name="jumlah_jiwa" value="<?php echo $data['jumlah_jiwa']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pln" class="col-sm-2 col-form-label">PLN</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="pln" name="pln" value="<?php echo $data['pln']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat"
                                                name="alamat" value="<?php echo $data['alamat']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="kecamatan"
                                                    name="kecamatan" value="<?php echo $data['kecamatan']; ?>">
                                                    <option class="text-secondary" value="">---</option>
                                                    <?php
                                                    $sql1 = "SELECT * FROM kecamatan";
                                                    $result1 = $conn->query($sql1);
                                                    while($kecamatan = $result1->fetch_assoc()){
                                                        if ($pemasangan['kecamatan'] == $kecamatan['id']) {
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
                                                    $sql1 = "SELECT * FROM desa";
                                                    $result1 = $conn->query($sql1);
                                                    while($desa = $result1->fetch_assoc()){
                                                        if ($pemasangan['desa'] == $desa['id']) {
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
                                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp"
                                                name="no_hp" value="<?php echo $data['no_hp']; ?>">
                                            </div>
                                        </div>
                                        <hr>
                                        <h5 class="mb-3">Cabang & Biaya</h5>
                                        <div class="form-group row">
                                            <label for="cabang" class="col-sm-2 col-form-label">Cabang</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="cabang" name="cabang" value="">
                                                    <option class="text-secondary" value="">---</option>
                                                    <?php
                                                    $par1 = "";
                                                    $par2 = "";
                                                    $awayan = "";
                                                    $halong = "";
                                                    $lampihong = "";
                                                    $juai = "";
                                                    $btm = "";
                                                    $parsel = "";
                                                    $tTinggi = "";

                                                    if ($pemasangan['cabang'] == "01") {
                                                        $par1 = "selected";
                                                    } elseif ($pemasangan['cabang'] == "02") {
                                                        $par2 = "selected";
                                                    } elseif ($pemasangan['cabang'] == "03") {
                                                        $awayan = "selected";
                                                    } elseif ($pemasangan['cabang'] == "04") {
                                                        $lampihong = "selected";
                                                    } elseif ($pemasangan['cabang'] == "05") {
                                                        $halong = "selected";
                                                    } elseif ($pemasangan['cabang'] == "06") {
                                                        $juai = "selected";
                                                    } elseif ($pemasangan['cabang'] == "07") {
                                                        $btm = "selected";
                                                    } elseif ($pemasangan['cabang'] == "08") {
                                                        $parsel = "selected";
                                                    } elseif ($pemasangan['cabang'] == "09") {
                                                        $tTinggi = "selected";
                                                    }
                                                    ?>
                                                    <option value="01" <?php echo " " . $par1; ?>>Paringin 1</option>
                                                    <option value="02" <?php echo " " . $par2; ?>>Paringin 2</option>
                                                    <option value="03" <?php echo " " . $awayan; ?>>Awayan</option>
                                                    <option value="04" <?php echo " " . $lampihong; ?>>Lampihong</option>
                                                    <option value="05" <?php echo " " . $halong; ?>>Halong</option>
                                                    <option value="06" <?php echo " " . $juai; ?>>Juai</option>
                                                    <option value="07" <?php echo " " . $btm; ?>>Batumandi</option>
                                                    <option value="08" <?php echo " " . $parsel; ?>>Paringin Selatan</option>
                                                    <option value="09" <?php echo " " . $tTinggi; ?>>Tebing Tinggi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gol_tarif" class="col-sm-2 col-form-label">Golongan Tarif</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="gol_tarif"
                                                    name="gol_tarif" value="">
                                                    <option value="">---</option>
                                                    <?php
                                                    $gol1 = "";
                                                    $gol2 = "";
                                                    $gol3 = "";
                                                    $gol4 = "";
                                                    $gol5 = "";
                                                    $gol6 = "";
                                                    $gol7 = "";
                                                    $gol8 = "";
                                                    $gol9 = "";
                                                    $gol10 = "";

                                                    if ($pemasangan['gol_tarif'] == "NN") {
                                                        $gol1 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "NU") {
                                                        $gol2 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "SK") {
                                                        $gol3 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "SU") {
                                                        $gol4 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "R1") {
                                                        $gol5 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "R2") {
                                                        $gol6 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "R3") {
                                                        $gol7 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "IP") {
                                                        $gol8 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "NK") {
                                                        $gol9 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "NB") {
                                                        $gol10 = "selected";
                                                    }
                                                    ?>
                                                    <option value="NN" <?php echo " " . $gol1 ?>>NN</option>
                                                    <option value="NU" <?php echo " " . $gol2 ?>>NU</option>
                                                    <option value="SK" <?php echo " " . $gol3 ?>>SK</option>
                                                    <option value="SU" <?php echo " " . $gol4 ?>>SU</option>
                                                    <option value="R1" <?php echo " " . $gol5 ?>>R1</option>
                                                    <option value="R2" <?php echo " " . $gol6 ?>>R2</option>
                                                    <option value="R3" <?php echo " " . $gol7 ?>>R3</option>
                                                    <option value="IP" <?php echo " " . $gol8 ?>>IP</option>
                                                    <option value="NK" <?php echo " " . $gol9 ?>>NK</option>
                                                    <option value="NB" <?php echo " " . $gol10 ?>>NB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="biaya"
                                                name="biaya" value="<?php echo $data['biaya']; ?>">
                                            </div>
                                        </div>
                                        <div class="card-footer col-6 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark">SIMPAN</button>
                                        </div>
                                    </form>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
        </div>
        </section>
        <!-- end of content -->
    </div>
    <!-- end of content-wrapper -->

    </div>
    <!-- end of main wrapper -->
    
    <script src="script.js"></script>

    <!-- jQuery -->
    <script src="../layout/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../layout/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../layout/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../layout/dist/js/demo.js"></script>

</body>

</html>
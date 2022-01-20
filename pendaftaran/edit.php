<?php 
require_once "../functions.php";
$query = query("SELECT * FROM pendaftaran");
$no = $_GET['no_pend'];
$sql = "SELECT * FROM pendaftaran where no_pend='$no'";
$pendaftaran = $conn->query($sql)->fetch_assoc();
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
    <script src="../sweetalert2/dist/sweetalert2.min.js"></script>

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
                <img src="../layout/dist/img/pdam-logo.png" alt="PDAM Balangan Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
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
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <h4>
                                        <i class="nav-icon fas fa-marker"></i>
                                        Pendaftaran   
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
                                        <a href="report/report-pendaftaran.php" class="nav-link" target="_blank">
                                            <i class="bi bi-archive ml-4 mr-2"></i>
                                            <p>Cetak Report</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- pemasangan -->
                            <li class="nav-item mt-2">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-wrench"></i>
                                    <p>
                                        Pemasangan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../pemasangan/index.php" class="nav-link">
                                            <i class="bi bi-menu-app ml-4 mr-2"></i>
                                            <p>Input Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pemasangan/#" class="nav-link">
                                            <i class="bi bi-search ml-4 mr-2"></i>
                                            <p>Cari Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pemasangan/#" class="nav-link">
                                            <i class="bi bi-printer ml-4 mr-2"></i>
                                            <p>Cetak Surat</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pemasangan/report/report-pemasangan.php" class="nav-link" target="_blank">
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
                                        <a href="../bukatutup/surat.php?cari=" class="nav-link">
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
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-body ml-5 mt-1">
                                    <!-- di sini form pendaftaran -->
                                    <?php 
                                    $no = $_GET['no_pend'];
                                    $sql = "SELECT * FROM pendaftaran where no_pend='$no'";
                                    $result = $conn->query($sql);
                                                
                                    while($data = $result->fetch_assoc()){
                                    ?>
                                    
                                    <form method="post" action="update.php">
                                        <div class="form-group row mt-3">
                                            <label for="no_pend" class="col-sm-2 col-form-label">Nomor Pendaftaran</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_pend" name="no_pend" value="<?php echo $data['no_pend']; ?>" readonly>
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
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ktp" name="no_ktp" value="<?php echo $data['no_ktp']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp" name="no_hp" value="<?php echo $data['no_hp']; ?>">
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
                                            <label for="wil" class="col-sm-2 col-form-label">Wilayah</label>
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

                                                    if ($pendaftaran['wil'] == "01") {
                                                        $wil1 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "02") {
                                                        $wil2 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "03") {
                                                        $wil3 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "04") {
                                                        $wil4 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "05") {
                                                        $wil5 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "06") {
                                                        $wil6 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "07") {
                                                        $wil7 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "08") {
                                                        $wil8 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "09") {
                                                        $wil9 = "selected";
                                                    }
                                                    ?>
                                                    <option value="01" <?php echo " " . $wil1 ?>>01</option>
                                                    <option value="02" <?php echo " " . $wil2 ?>>02</option>
                                                    <option value="03" <?php echo " " . $wil3 ?>>03</option>
                                                    <option value="04" <?php echo " " . $wil4 ?>>04</option>
                                                    <option value="05" <?php echo " " . $wil5 ?>>05</option>
                                                    <option value="06" <?php echo " " . $wil6 ?>>06</option>
                                                    <option value="07" <?php echo " " . $wil7 ?>>07</option>
                                                    <option value="08" <?php echo " " . $wil8 ?>>08</option>
                                                    <option value="09" <?php echo " " . $wil9 ?>>09</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer col-6 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark">SIMPAN</button>
                                        </div>
                                    </form>
                                    <?php } ?>    
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

    <script src="../layout/dist/js/adminlte.min.js"></script>

    <script src="../layout/dist/js/demo.js"></script>

</body>

</html>
<?php 
session_start();
require "../functions.php";
include_once ("../partials/session-pegawai.php");

$openPasang = "menu-open";
$activePasang = "active"; $activeReportPasang = "active";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials/head.php") ?>
     <!-- Include library Bootstrap Datepicker -->
     <link href="libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../sweetalert2/dist/sweetalert2.min.js"></script>

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar right-->
        <?php include_once ("../partials/navbar.php") ?>

        <!-- Main Sidebar Container -->
        <?php include_once ("../partials/sidebar.php") ?>

        <!-- Content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1 class="d-inline mr-4">Cetak Laporan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pemasangan</li>
                                <li class="breadcrumb-item">Cetak Laporan</li>
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
                                <div class="card-body ml-5 mt-3 d-flex justify-content-between">
                                    <a href="report-jumlah-biaya-pasba.php">
                                        <div class="card text-white bg-info mb-3" style="max-width: 25rem;">
                                            <div class="card-header">
                                                <h5>Laporan Jumlah Biaya Pemasangan Baru Per-Cabang</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Lihat total biaya pemasangan baru yang masuk per-cabang, sesuai periode waktu tertentu</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="report-jumlah-biaya-pergolongan.php" class="">
                                        <div class="card text-white bg-info mb-3" style="max-width: 25rem;">
                                            <div class="card-header">
                                                <h5>Laporan Jumlah Biaya Pemasangan Baru Per-Golongan Tarif</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Lihat total biaya dan jumlah pemasangan per-golongan tarif, sesuai periode waktu tertentu</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    
    <?php include_once ("../partials/importjs.php") ?>

</body>
</html>
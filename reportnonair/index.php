<?php 
session_start();
require "../functions.php";
include_once ("../partials/session-pegawai.php");
$activeReportNonair = "active";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials/head.php") ?>
     <link href="libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../sweetalert2/dist/sweetalert2.min.js"></script>
    <div class="wrapper">
        <?php include_once ("../partials/navbar.php") ?>
        <?php include_once ("../partials/sidebar.php") ?>

        <!-- Content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1 class="d-inline mr-4">Laporan Non Air</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Laporan Non Air</li>
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
                                    <a href="report-jumlah-biaya-nonair.php">
                                        <div class="card text-white bg-info mb-3" style="max-width: 28rem;">
                                            <div class="card-header">
                                                <h5>Laporan Jumlah Biaya Non Air Masuk</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Lihat rincian dan total biaya non-air yang masuk di pelayanan</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="report-rincian-gudang.php" class="">
                                        <div class="card text-white bg-info mb-3" style="max-width: 28rem;">
                                            <div class="card-header">
                                                <h5>Laporan Rincian Data Pemakaian Gudang</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Lihat rincian data pemakaian bahan-bahan dari gudang untuk pemasangan</p>
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
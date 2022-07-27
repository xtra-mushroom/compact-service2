<?php 
session_start();
require "../functions.php";
include_once ("../partials/session-pegawai.php");
$activeReportLainnya = "active";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials/head.php") ?>
     <link href="../libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
     <style>
        table th {
            text-align:center;
            background:#a5f2e5;
            border: solid 1px;
            width: 30%;
        }
        table tr td {
            border: solid 1px;
        }
     </style>
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
                            <h1 class="d-inline mr-4">Cetak Laporan Biaya Non Air</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Laporan Non Air</li>
                                <li class="breadcrumb-item">Laporan Biaya Nonair</li>
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
                                <div class="card-body ml-3">
                                    <h5 align="center">Laporan Jumlah Biaya Non Air Masuk</h5>
                                    <form method="get" action="report-jumlah-biaya-nonair.php">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group my-2">
                                                    <label>Filter Tanggal</label><p class="d-inline mr-2 text-secondary"> : yyyy-mm-dd</p>
                                                    <div class="input-group">
                                                        <input type="text" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control text-center tgl_awal" placeholder="Tanggal Awal">
                                                        <span class="input-group-text">s/d</span>
                                                        <input type="text" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control text-center tgl_akhir" placeholder="Tanggal Akhir">
                                                        <button type="submit" name="filter" value="true" class="btn btn-primary ml-3">TAMPILKAN</button>
                                                    </div>
                                                </div>   
                                            </div>
                                        </div>
                                        
                                        <?php
                                        if(isset($_GET['filter']))
                                            echo '<a href="report-jumlah-biaya-nonair.php" class="btn btn-sm btn-default">RESET</a>';
                                        ?>

                                    </form>  
                                    <?php 
                                    $tgl_awal = @$_GET['tgl_awal'];
                                    $tgl_akhir = @$_GET['tgl_akhir'];
                                    if(empty($tgl_awal) or empty($tgl_akhir)){
                                        $queryDaftar = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM pendaftaran";
                                        $queryPasang = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM pemasangan";
                                        $queryTutup = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM penutupan";
                                        $queryBuka = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM pembukaan";
                                        $queryBalik = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM baliknama";
                                        $url_cetak = "report/report-jumlah-biaya-nonair.php";
                                        $label = "Semua data, periode waktu keseluruhan";
                                    }else{  
                                        $queryDaftar = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM pendaftaran WHERE (tgl_daftar BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
                                        $queryPasang = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM pemasangan WHERE (tgl_pasang BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
                                        $queryTutup = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM penutupan WHERE (tgl_tutup BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
                                        $queryBuka = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM pembukaan WHERE (tgl_buka BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
                                        $queryBalik = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM baliknama WHERE (tanggal BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
                                        $url_cetak = "report/report-jumlah-biaya-nonair.php?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir."&filter=true";
                                        $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
                                        $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
                                        $label = 'Periode Tanggal <b>'.$tgl_awal.'</b> s/d <b>'.$tgl_akhir.'</b>';
                                    }
                                    ?>

                                    <div>
                                        <a href="<?php echo $url_cetak ?>" target="_blank" class="btn btn-success mt-4 mb-2">CETAK PDF</a>
                                    </div>

                                    <?php echo $label ?>
                                    <br />

                                    <div class="table-responsive col-10">
                                        <table class="table table-sm table-hover mt-3" border=2>
                                            <?php 
                                            $pendaftaran = mysqli_query($conn, $queryDaftar);
                                            $pemasangan = mysqli_query($conn, $queryPasang);
                                            $penutupan = mysqli_query($conn, $queryTutup);
                                            $pembukaan = mysqli_query($conn, $queryBuka);
                                            $baliknama = mysqli_query($conn, $queryBalik);
                                            $dataDaftar = mysqli_fetch_assoc($pendaftaran);
                                            $dataPasang = mysqli_fetch_assoc($pemasangan);
                                            $dataTutup = mysqli_fetch_assoc($penutupan);
                                            $dataBuka = mysqli_fetch_assoc($pembukaan);
                                            $dataBalik = mysqli_fetch_assoc($baliknama);
                                            $totalNonair = $dataDaftar['biaya'] + $dataPasang['biaya'] + $dataTutup['biaya'] + $dataBuka['biaya'] + $dataBalik['biaya'];    
                                            ?>
                                                <tr>
                                                    <th scope="col">Jenis Biaya Non Air</th>
                                                    <th scope="col">Jumlah Data</th>
                                                    <th scope="col">Total Biaya</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="font-weight-normal">Biaya Pendaftaran</th>
                                                    <td align="center"><?= $dataDaftar['total_data']; ?></td>
                                                    <td align="right"><?= rupiah($dataDaftar['biaya']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="font-weight-normal">Biaya Pemasangan</th>
                                                    <td align="center"><?= $dataPasang['total_data']; ?></td>
                                                    <td align="right"><?= rupiah($dataPasang['biaya']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="font-weight-normal">Biaya Penutupan</th>
                                                    <td align="center"><?= $dataTutup['total_data']; ?></td>
                                                    <td align="right"><?= rupiah($dataTutup['biaya']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="font-weight-normal">Biaya Pembukaan</th>
                                                    <td align="center"><?= $dataBuka['total_data']; ?></td>
                                                    <td align="right"><?= rupiah($dataBuka['biaya']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="font-weight-normal">Biaya Balik Nama</th>
                                                    <td align="center"><?= $dataBalik['total_data']; ?></td>
                                                    <td align="right"><?= rupiah($dataBalik['biaya']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Total Non Air</th>
                                                    <td align="right" colspan=2 class="text-bold"><?= rupiah($totalNonair); ?></td>
                                                </tr>
                                        </table>
                                        
                                    </div>
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
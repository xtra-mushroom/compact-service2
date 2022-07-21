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
                                <li class="breadcrumb-item active">Pendaftaran</li>
                                <li class="breadcrumb-item active">Cetak Laporan</li>
                                <li class="breadcrumb-item">Report Biaya Pasba</li>
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
                                    <h5 align="center">Laporan Jumlah Biaya Pemasangan Baru Per-Cabang</h5>
                                    <form method="get" action="report-jumlah-biaya-pasba.php">
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
                                            echo '<a href="report-jumlah-biaya-pasba.php" class="btn btn-sm btn-default">RESET</a>';
                                        ?>

                                    </form>  
                                    <?php 
                                    $tgl_awal = @$_GET['tgl_awal'];
                                    $tgl_akhir = @$_GET['tgl_akhir'];
                                    if(empty($tgl_awal) or empty($tgl_akhir)){
                                        $query = "SELECT cabang, SUM(biaya) as total_pasba, COUNT(cabang) as total_data FROM pemasangan GROUP BY cabang ORDER BY cabang ASC";
                                        $url_cetak = "report/report-jumlah-biaya-pemasangan.php";
                                        $label = "Semua Data, per-cabang";
                                    }else{  
                                        $query = "SELECT cabang, SUM(biaya) as total_pasba, COUNT(cabang) as total_data FROM pemasangan WHERE (pemasangan.tgl_pasang BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."') GROUP BY cabang ORDER BY cabang ASC";
                                        $url_cetak = "report/report-jumlah-biaya-pemasangan.php?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir."&filter=true";
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
                                        <table class="table table-sm table-hover table-bordered mt-3">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">ID Wilayah</th>
                                                    <th scope="col">Wilayah / Cabang</th>
                                                    <th scope="col">Jumlah Data Pemasangan</th>
                                                    <th scope="col">Jumlah Biaya Pemasangan Baru</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $result = $conn->query($query);	
                                            $row = mysqli_num_rows($result);
                                            

                                            if($row > 0){
                                            while($data = $result->fetch_assoc()){
                                                $tgl = date('d-m-Y', strtotime($data['tgl']));
                                                $no = 1;
                                                if($data['cabang'] == '01'){
                                                    $namaCabang = 'Paringin';
                                                }elseif($data['cabang'] == '02'){
                                                    $namaCabang = 'Paringin Selatan';
                                                }elseif($data['cabang'] == '3'){
                                                    $namaCabang = 'Awayan';
                                                }elseif($data['cabang'] == '04'){
                                                    $namaCabang = 'Lampihong';
                                                }elseif($data['cabang'] == '05'){
                                                    $namaCabang = 'Juai';
                                                }elseif($data['cabang'] == '06'){
                                                    $namaCabang = 'Halong';
                                                }elseif($data['cabang'] == '07'){
                                                    $namaCabang = 'Batumandi';
                                                }elseif($data['cabang'] == '08'){
                                                    $namaCabang = 'Tebing Tinggi';
                                                }
                                            ?>
                                                <tr>
                                                    <td align="center"><?= $no++; ?></td>
                                                    <td align="center"><?= $data['cabang']; ?></td>
                                                    <td align="center"><?= $namaCabang; ?></td>
                                                    <td align="center"><?= $data['total_data']; ?></td>
                                                    <td align="center"><?= rupiah($data['total_pasba']); ?></td>
                                                </tr>
                                            <?php }
                                            }else{
                                                echo "<tr><td colspan='5'>Data tidak diitemukan</td></tr>";
                                            } ?>   
                                            </tbody>
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
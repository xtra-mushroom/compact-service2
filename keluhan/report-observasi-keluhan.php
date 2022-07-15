<?php 
session_start();
require "../functions.php";
include_once ("../partials/session-pegawai.php");

$openKeluhan = "menu-open";
$activeKeluhan = "active"; $activeReportKeluhan = "active";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials/head.php") ?>
    <link href="../libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
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
                            <h1 class="d-inline mr-4">Cetak Laporan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Keluhan</li>
                                <li class="breadcrumb-item">Cetak Report</li>
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
                                    <h5 align="center">Laporan Observasi Keluhan Pelanggan</h5>
                                    <form method="get" action="report-observasi-keluhan.php">
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
                                            echo '<a href="report-observasi-keluhan.php" class="btn btn-sm btn-default">RESET</a>';
                                        ?>
                                    </form>  

                                    <?php 
                                    $tgl_awal = @$_GET['tgl_awal'];
                                    $tgl_akhir = @$_GET['tgl_akhir'];
                                    if(empty($tgl_awal) or empty($tgl_akhir)){
                                        $query = "SELECT * FROM keluhan WHERE jenis_penanganan='Butuh observasi dan tindak lanjut' ORDER BY no_keluhan DESC LIMIT 10";
                                        $url_cetak = "report/report-observasi-keluhan.php";
                                        $label = "10 data keluhan terbaru yang diobservasi";
                                    }else{  
                                        $query = "SELECT * FROM keluhan WHERE jenis_penanganan='Butuh observasi dan tindak lanjut' AND (tgl_keluhan BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."') ORDER BY no_keluhan ASC";
                                        $url_cetak = "report/report-observasi-keluhan.php?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir."&filter=true";
                                        $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
                                        $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
                                        $label = 'Periode Tanggal <b>'.$tgl_awal.'</b> s/d <b>'.$tgl_akhir.'</b>';
                                    }
                                    ?>
                                    
                                    <div>
                                        <a href="<?php echo $url_cetak ?>" target="_blank" class="btn btn-success mt-3 mb-2">CETAK PDF</a>
                                    </div>

                                    <p class="font-italic"><?php echo $label ?></p>

                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Nomor Sambungan</th>
                                                    <th scope="col">Alamat / Lokasi</th>
                                                    <th scope="col">Tanggal Keluhan</th>
                                                    <th scope="col">Keluhan</th>
                                                    <th scope="col">Penanganan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $result = $conn->query($query);	
                                            $row = mysqli_num_rows($result);

                                            if($row > 0){
                                            $no = 1;
                                            while($data = $result->fetch_assoc()){
                                                // $tgl = date('d-m-Y', strtotime($data['tgl']));
                                            ?>
                                                <tr>
                                                    <td align="center"><?= $no++; ?></td>
                                                    <td align="center"><?= $data['no_ds']; ?></td>
                                                    <td align="left"><?= $data['alamat']; ?></td>
                                                    <td align="center"><?= $data['tgl_keluhan']; ?></td>
                                                    <td align="left"><?= $data['keluhan']; ?></td>
                                                    <td align="left"><?= $data['penanganan']; ?></td>
                                                </tr>
                                            <?php }
                                            }else{
                                                echo "<tr><td colspan='6'>Data tidak tersedia</td></tr>";
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
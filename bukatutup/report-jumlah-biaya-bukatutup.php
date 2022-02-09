<?php 
require "../functions.php";
$openBukaTutup = "menu-open";
$activeBukaTutup = "active"; $activeReportBukaTutup = "active";
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
                                <li class="breadcrumb-item active">Buka & Tutup</li>
                                <li class="breadcrumb-item active">Cetak Laporan</li>
                                <li class="breadcrumb-item">Report Biaya Buka Tutup</li>
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
                                    <h5 align="center">Laporan Jumlah Biaya Pembukaan dan Penutupan Per-Cabang</h5>
                                    <form method="get" action="report-jumlah-biaya-bukatutup.php">
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
                                            echo '<a href="report-jumlah-biaya-bukatutup.php" class="btn btn-sm btn-default">RESET</a>';
                                        ?>

                                    </form>  
                                    <?php 
                                    $tgl_awal = @$_GET['tgl_awal'];
                                    $tgl_akhir = @$_GET['tgl_akhir'];
                                    if(empty($tgl_awal) or empty($tgl_akhir)){
                                        $queryBuka = "SELECT pendaftaran.id_wil, pendaftaran.wil, SUM(pembukaan.biaya) as total_buka, COUNT(pembukaan.no_ds) as total_databuka FROM pembukaan INNER JOIN pendaftaran ON pembukaan.no_ds = pendaftaran.no_ds GROUP BY pendaftaran.id_wil ORDER BY pendaftaran.id_wil ASC;";
                                        $queryTutup = "SELECT pendaftaran.id_wil, pendaftaran.wil, SUM(penutupan.biaya) as total_tutup, COUNT(penutupan.no_ds) as total_datatutup FROM penutupan INNER JOIN pendaftaran ON penutupan.no_ds = pendaftaran.no_ds GROUP BY pendaftaran.id_wil ORDER BY pendaftaran.id_wil ASC;";
                                        $url_cetak = "report/report-jumlah-biaya-bukatutup.php";
                                        $label = "Semua Data Biaya Pembukaan dan Penutupan, per-cabang";
                                    }else{  
                                        $queryBuka = "SELECT pendaftaran.id_wil, pendaftaran.wil, SUM(pembukaan.biaya) as total_buka, COUNT(pembukaan.no_ds) as total_databuka FROM pembukaan INNER JOIN pendaftaran ON pembukaan.no_ds = pendaftaran.no_ds WHERE (pembukaan.tgl_buka BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."') GROUP BY pendaftaran.id_wil ORDER BY pendaftaran.id_wil ASC;";
                                        $queryTutup = "SELECT pendaftaran.id_wil, pendaftaran.wil, SUM(penutupan.biaya) as total_tutup, COUNT(penutupan.no_ds) as total_datatutup FROM penutupan INNER JOIN pendaftaran ON penutupan.no_ds = pendaftaran.no_ds WHERE (penutupan.tgl_tutup BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."') GROUP BY pendaftaran.id_wil ORDER BY pendaftaran.id_wil ASC;";
                                        $url_cetak = "report/report-jumlah-biaya-bukatutup.php?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir."&filter=true";
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
                                                    <th scope="col">Wilayah/Cabang</th>
                                                    <th scope="col">Jumlah Data</th>
                                                    <th scope="col">Jumlah Biaya Pembukaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $result = $conn->query($queryBuka);	
                                            $row = mysqli_num_rows($result);
                                            $no = 0;

                                            if($row > 0){
                                            while($data = $result->fetch_assoc()){
                                                $tgl = date('d-m-Y', strtotime($data['tgl']));
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td align="center"><?= $no; ?></td>
                                                    <td align="center"><?= $data['id_wil']; ?></td>
                                                    <td align="center"><?= $data['wil']; ?></td>
                                                    <td align="center"><?= $data['total_databuka']; ?></td>
                                                    <td align="center"><?= rupiah($data['total_buka']); ?></td>
                                                </tr>
                                            <?php }
                                            }else{
                                                echo "<tr><td colspan='5'>Data tidak ditemukan</td></tr>";
                                            } ?>   
                                            </tbody>
                                        </table>

                                        <table class="table table-sm table-hover table-bordered mt-3">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">ID Wilayah</th>
                                                    <th scope="col">Wilayah/Cabang</th>
                                                    <th scope="col">Jumlah Data</th>
                                                    <th scope="col">Jumlah Biaya Penutupan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $result = $conn->query($queryTutup);	
                                            $row = mysqli_num_rows($result);
                                            $no = 0;

                                            if($row > 0){
                                            while($data = $result->fetch_assoc()){
                                                $tgl = date('d-m-Y', strtotime($data['tgl']));
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td align="center"><?= $no; ?></td>
                                                    <td align="center"><?= $data['id_wil']; ?></td>
                                                    <td align="center"><?= $data['wil']; ?></td>
                                                    <td align="center"><?= $data['total_datatutup']; ?></td>
                                                    <td align="center"><?= rupiah($data['total_tutup']); ?></td>
                                                </tr>
                                            <?php }
                                            }else{
                                                echo "<tr><td colspan='5'>Data tidak ditemukan</td></tr>";
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
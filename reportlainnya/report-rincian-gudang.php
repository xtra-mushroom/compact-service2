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
                            <h1 class="d-inline mr-4">Cetak Laporan Rincian Gudang</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Laporan Non Air</li>
                                <li class="breadcrumb-item">Laporan Rincian Gudang</li>
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
                                    <h5 align="center">Laporan Rincian Pemakaian Bahan dari Gudang</h5>
                                    <form method="get" action="report-rincian-gudang.php">
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
                                            echo '<a href="report-rincian-gudang.php" class="btn btn-sm btn-default">RESET</a>';
                                        ?>

                                    </form>  
                                    <?php 
                                    $tgl_awal = @$_GET['tgl_awal'];
                                    $tgl_akhir = @$_GET['tgl_akhir'];
                                    if(empty($tgl_awal) or empty($tgl_akhir)){
                                        $query = "SELECT sb.tgl_survei, dsb.kode_bahan, SUM(dsb.banyaknya), g.nama, g.jenis, g.nomor, g.ukuran, g.harga FROM survei_bahan sb INNER JOIN detail_survei_bahan dsb ON sb.no_reg = dsb.no_reg INNER JOIN gudang g ON dsb.kode_bahan = g.kode WHERE sb.keterangan = 'terpasang' GROUP BY g.kode ORDER BY g.nomor ASC";
                                        $url_cetak = "report/report-rincian-gudang.php";
                                        $label = "Semua data, periode waktu keseluruhan";
                                    }else{  
                                        $query = "SELECT sb.tgl_survei, dsb.kode_bahan, SUM(dsb.banyaknya), g.nama, g.jenis, g.nomor, g.ukuran, g.harga FROM survei_bahan sb INNER JOIN detail_survei_bahan dsb ON sb.no_reg = dsb.no_reg INNER JOIN gudang g ON dsb.kode_bahan = g.kode WHERE sb.keterangan = 'terpasang' AND (tgl_survei BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')GROUP BY g.kode ORDER BY g.nomor ASC";
                                        $url_cetak = "report/report-rincian-gudang.php?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir."&filter=true";
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
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Jenis</th>
                                                    <th scope="col">Ukuran</th>
                                                    <th scope="col">Harga Satuan</th>
                                                    <th scope="col">Jumlah Terpakai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $result = $conn->query($query);	
                                            $row = mysqli_num_rows($result);
                                            $no = 0;

                                            if($row > 0){
                                            while($data = $result->fetch_assoc()){
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td align="center"><?php echo $no; ?></td>
                                                    <td align="center"><?php echo $data['nama']; ?></td>
                                                    <td align="center"><?php echo $data['jenis']; ?></td>
                                                    <td align="center"><?php echo $data['ukuran']; ?></td>
                                                    <td align="center"><?php echo rupiah($data['harga']); ?></td>
                                                    <td align="center"><?php echo $data['SUM(dsb.banyaknya)']; ?></td>
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
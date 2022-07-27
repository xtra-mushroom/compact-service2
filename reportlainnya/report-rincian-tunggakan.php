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
                            <h1 class="d-inline mr-4">Cetak Laporan Rincian Tunggakan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Laporan Lainnya</li>
                                <li class="breadcrumb-item">Laporan Rincian Tunggakan</li>
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
                                <div class="card-body">
                                    <h5 align="center">Laporan Rincian Data Tunggakan Rekening Air Pelanggan</h5>
                                    <form method="get" action="report-rincian-tunggakan.php">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Filter Tahun</label>
                                                    <div class="input-group">
                                                        <input type="text" name="tahun" value="<?= @$_GET['tahun'] ?>" class="form-control text-center tahun" placeholder="Tahun">
                                                        <button type="submit" name="filter" value="true" class="btn btn-primary ml-3">TAMPILKAN</button>
                                                    </div>
                                                </div>   
                                            </div>
                                        </div>
                                        
                                        <?php
                                        if(isset($_GET['filter']))
                                            echo '<a href="report-rincian-tunggakan.php" class="btn btn-sm btn-default">RESET</a>';
                                        ?>

                                    </form>  
                                    <?php 
                                    $tahun = @$_GET['tahun'];
                                    if(empty($tahun)){
                                        $query = "SELECT p.no_ds, p.nama, p.alamat, p.jenis_kel, p.no_hp, t.no_ds, t.tgl_lunas, SUM(t.tagihan) as total_tagihan, SUM(t.denda) as total_denda, COUNT(*) as jumlah_tunggakan FROM tagihan t INNER JOIN pelanggan p ON t.no_ds=p.no_ds WHERE t.tgl_lunas='0000-00-00' AND denda=5000 GROUP BY t.no_ds ORDER BY jumlah_tunggakan DESC";
                                        $url_cetak = "report/report-rincian-tunggakan.php";
                                        $label = "Semua data, periode waktu keseluruhan";
                                    }else{  
                                        $query = "SELECT p.no_ds, p.nama, p.alamat, p.jenis_kel, p.no_hp, t.no_ds, t.tgl_lunas, SUM(t.tagihan) as total_tagihan, SUM(t.denda) as total_denda, COUNT(*) as jumlah_tunggakan FROM tagihan t INNER JOIN pelanggan p ON t.no_ds=p.no_ds WHERE t.tgl_lunas='0000-00-00' AND denda=5000 AND t.tahun=$tahun GROUP BY t.no_ds ORDER BY jumlah_tunggakan DESC";
                                        $url_cetak = "report/report-rincian-tunggakan.php?tahun=".$tahun."&filter=true";
                                        $label = 'Periode Tahun <b>'.$tahun.'</b>';
                                    }
                                    ?>

                                    <div>
                                        <a href="<?php echo $url_cetak ?>" target="_blank" class="btn btn-success mt-4 mb-2">CETAK PDF</a>
                                    </div>

                                    <?php echo $label ?>
                                    <br />

                                    <div class="table-responsive col-12">
                                        <table class="table table-sm table-hover table-bordered mt-3">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Nomor DS</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Jenis Kelamin</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Nomor HP</th>
                                                    <th scope="col">Jumlah Tunggakan</th>
                                                    <th scope="col">Total Tunggakan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $result = $conn->query($query);	
                                            $row = mysqli_num_rows($result);
                                            $no = 1;

                                            if($row > 0){
                                            while($data = $result->fetch_assoc()){
                                            ?>
                                                <tr>
                                                    <td align="center"><?php echo $no++; ?></td>
                                                    <td align="center"><?php echo $data['no_ds']; ?></td>
                                                    <td align="left"><?php echo $data['nama']; ?></td>
                                                    <td align="center"><?php echo $data['jenis_kel']; ?></td>
                                                    <td align="left"><?php echo $data['alamat']; ?></td>
                                                    <td align="center"><?php echo $data['no_hp']; ?></td>
                                                    <td align="center"><?php echo $data['jumlah_tunggakan']; ?></td>
                                                    <td align="right"><?php echo rupiah($data['total_tagihan']+$data['total_denda']); ?></td>
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
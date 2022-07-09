<?php
session_start();
    include_once ("../functions.php");

    if(isset($_SESSION['peran'])){
        header("location: ../logsystem/index.php");
        exit;
    }

    if (!isset($_SESSION['signin'])){
        header("location: ../logsystem/index.php");
    }

    $activeHome = "active";

    if($_SESSION['jenis_kel'] == 'Laki-Laki'){
        $image = "avatar.png";
    }elseif($_SESSION['jenis_kel'] == 'Perempuan'){
        $image = "avatar2.png";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials-otheruser/head.php") ?>
</head>
<?php include_once ("../database.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once ("../partials-otheruser/navbar.php") ?>
        <?php include_once ("../partials-otheruser/sidebar.php") ?>

        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="jumbotron bg-white" style="border-radius:0; height:160px; padding-top:20px;">
                                    <h1 class="display-6 text-center">Selamat Datang!</h1>
                                    <p class="lead text-center">Compact Service PDAM Kabupaten Balangan mencakup seluruh rangkaian pelayanan dalam satu aplikasi</p>
                                    <hr class="mt-4">
                                </div>
                                <div class="card-body text-center">
                                    <?php 
                                    $no_ds = $_SESSION['no_log'];

                                    $sqlTagihan = "SELECT p.nama, p.no_ds, p.alamat, t.no_ds, t.bulan, t.tahun, t.tagihan, t.denda, t.pakai, t.tgl_lunas FROM pelanggan as p INNER JOIN tagihan as t ON p.no_ds = t.no_ds WHERE t.no_ds='$no_ds' AND t.tgl_lunas='0000-00-00';";
                                    $resultTagihan = mysqli_query($conn, $sqlTagihan);
                                    $row = mysqli_num_rows($resultTagihan);

                                    if($row > 0){
                                    ?>
                                    <h4>Info Tagihan Anda</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Nomor Sambungan</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Bulan & Tahun Tagihan</th>
                                                    <th scope="col">Jumlah Tagihan</th>
                                                    <th scope="col">Jumlah Pemakaian</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            
                                            $no = 1;    

                                            while ($data = mysqli_fetch_assoc($resultTagihan)) {  
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $data['no_ds'] ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['alamat'] ?></td>
                                                    <td><?= $data['bulan'] . " " . $data['tahun'] ?></td>
                                                    <td><?= rupiah($data['tagihan'] + $data['denda']) ?></td>
                                                    <td><?= $data['pakai'] . " Meter Kubik" ?></td>
                                                </tr>
                                            </tbody>
                                            <?php } ?>

                                        </table>
                                    </div>
                                    <?php }else{ ?>
                                    <h4>Info Tagihan Anda</h4>
                                    <h6 class="text-secondary">Belum Ada Tagihan</h6>
                                    <?php } ?>
                                </div>
                                <div class="card-footer text-center pt-4 mt-lg-4">
                                    <p class="text-secondary"><b>Copyright</b> &copy; <b>2022 ~ <em style="color:#b8b2b2">Version 0.2.0</em></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>

    <?php include_once ("../partials-otheruser/importjs.php") ?>
</body>
</html>
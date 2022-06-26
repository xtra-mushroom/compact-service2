<?php 
require "../functions.php";
$openDaftar = "menu-open";
$activeDaftar = "active"; $activeAntriMohon = "active";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once ("../partials/head.php");
    include_once ("../partials/cssdatatables.php");
    ?>
</head>
<?php include_once ("../database.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">
<script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>
    <div class="wrapper">
        <!-- Navbar right-->
        <?php include_once ("../partials/navbar.php") ?>

        <!-- Sidebar -->
        <?php include_once ("../partials/sidebar.php") ?>

        <!-- Content -->
        <div class="content-wrapper">
            <section class="content-header">
<?php 
                if(isset($_SESSION['hasil'])){
                    if($_SESSION['hasil']){
?>
                    <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: '<?php echo $_SESSION["pesan"] ?>',
                        showConfirmButton: true
                        })
                    </script>
<?php 
                    } else {
?>
                    <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: '<?php echo $_SESSION["pesan"] ?>',
                        showConfirmButton: true
                        })
                    </script>
<?php
                    }
                    unset($_SESSION['pesan']);
                    unset($_SESSION['hasil']);
                }
?>
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-7">
                            <h1 class="mr-4">
                                Antrian Pemohon & Verifikasi Bukti Bayar
                                <button type="button" class="btn btn-sm btn-danger rounded-circle" data-container="body" data-toggle="popover" data-placement="bottom" data-content='Data yang ditampilkan bukan data pelanggan secara real-time, cari data pelanggan di menu "Data Pelanggan"'>
                                    <i class="bi bi-exclamation-diamond-fill"></i>
                                </button>
                            </h1>
                            
                        </div>
                        <div class="col-sm-5">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pendaftaran</li>
                                <li class="breadcrumb-item">Antrian Pemohon</li>
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
                                    <h5 class="mb-3 text-center">Menunggu Verifikasi Pembayaran</h5>
                                    <div class="table-responsive"> 
                                        <table id="" class="myTable table table-sm table-bordered table-hover">
                                            <thead align="center">
                                                <tr>
                                                    <th>Nomor Registrasi</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Nomor HP</th>
                                                    <th>Alamat</th>
                                                    <th>Bukti Bayar</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlDaftar = "SELECT * FROM antri_daftar WHERE status_bayar='';";
                                                $resultDaftar = $db->prepare($sqlDaftar);
                                                $resultDaftar->execute();
                                                
                                                while ($data = $resultDaftar->fetch(PDO::FETCH_ASSOC)) {
                                                    $noreg = $data['no_reg'];
                                                ?>
                                                <tr>
                                                    <td align="center"><?= $noreg ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td align='center'><?= $data['jenis_kel'] ?></td>
                                                    <td><?= $data['no_hp'] ?></td>
                                                    <td><?= $data['alamat'] ?></td>
                                                    <td><?= "<img src='../Paypic/".$data['bukti_bayar']."'style='width:100px; height:100px;'>" ?></td>
                                                    <td align='center' style='color:green'><?= $data['status_bayar'] ?></td>
                                                    <td align="center">
                                                        <a href="verifikasi.php?no_reg=<?= $noreg ?>" class="btn btn-sm btn-success">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                        <a href="report/kwitansi.php?no_reg=<?= $noreg ?>" class="btn btn-sm btn-warning" target="_blank">
                                                            <i class="bi bi-printer"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>                                            
                                </div>  
                            </div>
                        </div>
                    </div>
                    <!-- tabel data telah diverifikasi -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-3 text-center">Sudah Diverifikasi</h5>
                                    <div class="table-responsive">
                                        <table id="" class="myTable table table-sm table-bordered table-hover">
                                            <thead align="center">
                                                <tr>
                                                    <th>Nomor Registrasi</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Nomor HP</th>
                                                    <th>Alamat</th>
                                                    <th>Bukti Bayar</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlDaftar = "SELECT * FROM antri_daftar WHERE status_bayar='Diverifikasi';";
                                                $resultDaftar = $db->prepare($sqlDaftar);
                                                $resultDaftar->execute();
                                                
                                                while ($data = $resultDaftar->fetch(PDO::FETCH_ASSOC)) {
                                                    $noreg = $data['no_reg'];
                                                ?>
                                                <tr>
                                                    <td align="center"><?= $noreg ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td align='center'><?= $data['jenis_kel'] ?></td>
                                                    <td><?= $data['no_hp'] ?></td>
                                                    <td><?= $data['alamat'] ?></td>
                                                    <td><?= "<img src='../Paypic/".$data['bukti_bayar']."'style='width:100px; height:100px;'>" ?></td>
                                                    <td align='center' style='color:green'><?= $data['status_bayar'] ?></td>
                                                    <td align="center">
                                                        <a href="verifikasi.php?no_reg=<?= $noreg ?>" class="btn btn-sm btn-success">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                        <a href="report/kwitansi.php?no_reg=<?= $noreg ?>" class="btn btn-sm btn-warning" target="_blank">
                                                            <i class="bi bi-printer"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
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

    <?php
    include_once ("../partials/importjs.php");
    include_once ("../partials/scriptsdatatables.php");
    ?>

    <script>
        $(function () {
        $('[data-toggle="popover"]').popover()
        })
    </script>

</body>
</html>
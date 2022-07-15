<?php 
session_start();
include_once "../functions.php";
include_once ("../partials/session-pegawai.php");

$openBaliknama = "menu-open";
$activeBaliknama = "active"; $activeCariBaliknama = "active";
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
        <!-- Navbar -->
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
                        <div class="col-sm-6">
                            <h1>Cari Data Balik Nama</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Balik Nama</li>
                                <li class="breadcrumb-item">Cari Data</li>
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
                                    <form action="cari.php" method="get" class="d-inline">
                                        <label>Cari :</label>
                                        <input type="text" name="cari" class="d-inline form-control form-control-sm border-primary col-3" autocomplete="off" autofocus required>
                                        <button type="submit" name="submit" value="true" class="d-inline btn btn-primary btn-sm"><i class="bi bi-search"></i></button>  
                                    </form>
                                    <span><a href="cari.php"><button type="submit" class="ml-3 d-inline btn btn-danger btn-sm"><i class="bi bi-eraser-fill mr-2"></i>RESET</button><a></span>
                                    <div class="table-responsive">
                                        <?php 
                                        if(isset($_GET['cari'])){
                                            $cari = $_GET['cari'];
                                            echo "<b>Hasil pencarian : <span class='text-green'>".$cari."</span></b>";
                                        }
                                        ?>
                                        <table class="table table-hover table-sm table-bordered mt-4">
                                            <thead align="center">
                                                <tr>
                                                    <th scope="col">Action</th>
                                                    <th scope="col">Nomor Sambungan</th>
                                                    <th scope="col">Tanggal Balik Nama</th>
                                                    <th scope="col">Nama Asal</th>
                                                    <th scope="col">Nama Baru</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Wilayah</th>
                                                </tr>
                                            </thead>
                                            <?php 
                                            if(isset($_GET['submit'])){
                                                $cari = $_GET['cari'];
                                                $query = "SELECT * FROM baliknama WHERE no_ds LIKE '$cari' OR nama_baru LIKE '%$cari%' OR nama_asal LIKE '%$cari%' OR alamat LIKE '%$cari%' ORDER BY id DESC";
                                                $result = mysqli_query($conn, $query);				
                                            }else{
                                                $query = "";
                                                $result = mysqli_query($conn, $query);		
                                            }
                                            while($data = mysqli_fetch_assoc($result)){
                                                if($data['id_wilayah'] == '01'){
                                                    $namaCabang = 'Paringin';
                                                }elseif($data['id_wilayah'] == '02'){
                                                    $namaCabang = 'Paringin Selatan';
                                                }elseif($data['id_wilayah'] == '3'){
                                                    $namaCabang = 'Awayan';
                                                }elseif($data['id_wilayah'] == '04'){
                                                    $namaCabang = 'Lampihong';
                                                }elseif($data['id_wilayah'] == '05'){
                                                    $namaCabang = 'Juai';
                                                }elseif($data['id_wilayah'] == '06'){
                                                    $namaCabang = 'Halong';
                                                }elseif($data['id_wilayah'] == '07'){
                                                    $namaCabang = 'Batumandi';
                                                }elseif($data['id_wilayah'] == '08'){
                                                    $namaCabang = 'Tebing Tinggi';
                                                }
                                                $id = $data['id'];
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td align="center">
                                                        <a href="edit.php?id=<?= $id; ?>" class="btn btn-sm btn-success">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    </td>
                                                    <td align="center"><?php echo $data['no_ds']; ?></td>
                                                    <td align="center"><?php echo $data['tanggal']; ?></td>
                                                    <td><?php echo $data['nama_asal']; ?></td>
                                                    <td><?php echo $data['nama_baru']; ?></td>
                                                    <td><?php echo $data['alamat']; ?></td>
                                                    <td align="center"><?php echo $namaCabang; ?></td>
                                                </tr>
                                            </tbody>
                                            <?php } ?>
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

</body>
</html>
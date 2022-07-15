<?php 
session_start();
include_once "../functions.php";
include_once ("../partials/session-pegawai.php");

$activePelanggan = "active";
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
    <div class="wrapper">
        <!-- Navbar right-->
        <?php include_once ("../partials/navbar.php") ?>

        <!-- Sidebar -->
        <?php include_once ("../partials/sidebar.php") ?>

        <!-- Content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-7">
                            <h1 class="mr-4">
                                Cari Data Pelanggan
                            </h1>
                            
                        </div>
                        <div class="col-sm-5">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Data Pelanggan</li>
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
                                    <form action="index.php" method="get" class="d-inline">
                                        <label>Cari :</label>
                                        <input type="text" name="cari" class="d-inline form-control form-control-sm border-primary col-3" autocomplete="off" autofocus required>
                                        <button type="submit" name="submit" value="true" class="d-inline btn btn-primary btn-sm"><i class="bi bi-search"></i></button>  
                                    </form>
                                    <span><a href="index.php"><button type="submit" class="ml-3 d-inline btn btn-danger btn-sm"><i class="bi bi-eraser-fill mr-2"></i>RESET</button><a></span>
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
                                                    <th>Nomor Pendaftaran</th>
                                                    <th>Nomor Sambungan</th>
                                                    <th>Status Sambungan</th>
                                                    <th>Golongan Tarif</th>
                                                    <th>Nama</th>
                                                    <th>NIK</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Alamat</th>
                                                    <th>Nomor HP</th>
                                                    <th>ID Wilayah</th>
                                                    <th>Wilayah</th>
                                                </tr>
                                            </thead>
                                            <?php 
                                            if(isset($_GET['cari'])){
                                                $cari = $_GET['cari'];
                                                $query = "SELECT ad.no_reg, d.no_reg, d.no_ds, d.cabang, p.no_ds, p.status_ket, p.id_tarif, p.nama, p.nik, p.jenis_kel, p.alamat, p.no_hp FROM antri_daftar ad INNER JOIN pendaftaran d ON ad.no_reg=d.no_reg INNER JOIN pelanggan p ON d.no_ds=p.no_ds WHERE p.no_ds LIKE '$cari' OR p.nama LIKE '%$cari%' OR p.nik LIKE '%$cari%' OR p.alamat LIKE '%$cari%'";
                                                $result = mysqli_query($conn, $query);				
                                            }else{
                                                $query = "";
                                                $result = mysqli_query($conn, $query);		
                                            }
                                            while($data = mysqli_fetch_assoc($result)){
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
                                            <tbody>
                                                <tr>
                                                    <td><?= $data['no_reg']; ?></td>
                                                    <td><?= $data['no_ds']; ?></td>
                                                    <td><?= $data['status_ket']; ?></td>
                                                    <td><?= $data['id_tarif']; ?></td>
                                                    <td><?= $data['nama']; ?></td>
                                                    <td><?= $data['nik']; ?></td>
                                                    <td><?= $data['jenis_kel']; ?></td>
                                                    <td><?= $data['alamat']; ?></td>
                                                    <td><?= $data['no_hp']; ?></td>
                                                    <td><?= $data['cabang']; ?></td>
                                                    <td><?= $namaCabang; ?></td>
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

    <script>
        $(function () {
        $('[data-toggle="popover"]').popover()
        })
    </script>

</body>
</html>
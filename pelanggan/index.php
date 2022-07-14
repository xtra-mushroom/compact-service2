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
                                <li class="breadcrumb-item active">Data Pelanggan /</li>
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
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-sm table-bordered table-hover">
                                            <thead align="center">
                                                <tr>
                                                    <th>Nomor Pendaftaran</th>
                                                    <th>Nomor Sambungan</th>
                                                    <th>Status Sambungan</th>
                                                    <th>Golongan Tarif</th>
                                                    <th>Nama</th>
                                                    <th>NIK</th>
                                                    <th>TTL</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Alamat</th>
                                                    <th>Nomor HP</th>
                                                    <th>ID Wilayah</th>
                                                    <th>Wilayah</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlDaftar = "SELECT pelanggan.*, pendaftaran.no_pend, pendaftaran.id_wil, pendaftaran.wil, pendaftaran.desa, pendaftaran.kecamatan FROM pelanggan INNER JOIN pendaftaran ON pelanggan.no_ds = pendaftaran.no_ds ORDER BY pendaftaran.id_wil ASC";
                                                $resultDaftar = $db->prepare($sqlDaftar);
                                                $resultDaftar->execute();
                                                
                                                while ($data = $resultDaftar->fetch(PDO::FETCH_ASSOC)) {
                                                ?>

                                                <tr>
                                                    <td align="center"><?= $data['no_pend'] ?></td>
                                                    <td><?= $data['no_ds'] ?></td>
                                                    <td align="center"><?= $data['status_ket'] ?></td>
                                                    <td align='center'><?= $data['id_tarif'] ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['nik'] ?></td>
                                                    <td><?= $data['ttl'] ?></td>
                                                    <td><?= $data['jenis_kel'] ?></td>

                                                    <?php  
                                                    // agar yang tampil adalah nama kecamatannya
                                                    $valueKec = $data['kecamatan'];
                                                    $queryKec = "SELECT * FROM kecamatan WHERE id='$valueKec'";
                                                    $resultKec = $conn->query($queryKec);
                                                    $dataKec = $resultKec->fetch_assoc();
                                                    if($data['kecamatan'] == $dataKec['id']){
                                                        $namaKec = $dataKec['nama'];
                                                    }
                                                    // agar yang tampil adalah nama desanya
                                                    $valueDesa = $data['desa'];
                                                    $queryDesa = "SELECT * FROM desa WHERE id='$valueDesa'";
                                                    $resultDesa = $conn->query($queryDesa);
                                                    $dataDesa = $resultDesa->fetch_assoc();
                                                    if($data['desa'] == $dataDesa['id']){
                                                        $namaDesa = $dataDesa['nama'];
                                                    }
                                                    ?>  

                                                    <td><?= $data['alamat'] . ', ' . $namaDesa . ', ' . $namaKec ?></td>
                                                    <td align='center'><?= $data['no_hp'] ?></td>
                                                    <td align='center'><?= $data['id_wil'] ?></td>
                                                    <td align='center'><?= $data['wil'] ?></td>
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
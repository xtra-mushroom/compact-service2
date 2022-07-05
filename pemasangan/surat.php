<?php 
session_start();
require "../functions.php";
include_once ("../partials/session-pegawai.php");

$pemasangan = query("SELECT * FROM pemasangan");
$openPasang = "menu-open";
$activePasang = "active"; $activeSuratPasang = "active";
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
        <!-- Navbar -->
        <?php include_once ("../partials/navbar.php") ?>

        <!-- Sidebar -->
        <?php include_once ("../partials/sidebar.php") ?>

        <!-- Content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1 class="d-inline mr-4">Cetak Surat Pernyataan & Hasil Survei</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pemasangan</li>
                                <li class="breadcrumb-item">Cetak Surat</li>
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
                                        <table class="myTable table table-sm table-hover table-bordered mt-3">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Nomor Sambungan</th>
                                                    <th>Tanggal Pemasangan</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Nomor HP</th>
                                                    <th>Surat</th>
                                                    <th>Survei</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlPasang = "SELECT pemasangan.*, pendaftaran.no_ds, pendaftaran.no_reg, antri_daftar.no_reg, antri_daftar.nama, antri_daftar.alamat, antri_daftar.no_hp FROM antri_daftar INNER JOIN pendaftaran ON pendaftaran.no_reg = antri_daftar.no_reg INNER JOIN pemasangan ON pendaftaran.no_ds = pemasangan.no_ds;";
                                                $resultPasang = $db->prepare($sqlPasang);
                                                $resultPasang->execute();

                                                
                                                while ($data = $resultPasang->fetch(PDO::FETCH_ASSOC)) {
                                                    $nods = $data['no_ds'];
                                                    $noreg = $data['no_reg'];
                                                ?>

                                                <tr>
                                                    <td align="center"><?= $data['no_ds']; ?></td>
                                                    <td align="center"><?= $data['tgl_pasang']; ?></td>
                                                    <td class="text-nowrap"><?= $data['nama']; ?></td>
                                                    <td><?= $data['alamat']; ?></td>
                                                    <td><?php echo $data['no_hp']; ?></td>
                                                    <td align="center" class="text-nowrap">
                                                        <a href="report/surat-pelanggan.php?no_ds=<?= $nods ?>" target="_blank" class="text-bold">Pernyataan Pelanggan</a>
                                                        <br/>
                                                        <a href="report/surat-terpasang.php?no_ds=<?= $nods ?>" target="_blank" class="text-bold">Pernyataan Terpasang</a>
                                                    </td>
                                                    <td align="center" class="text-nowrap">
                                                        <a href="../perencanaan/report/hasil-surveibahan.php?no_reg=<?= $noreg ?>" class="text-primary text-bold" target="_blank">
                                                            Survei Bahan
                                                        </a>
                                                        <br/>
                                                        <a href="../perencanaan/report/hasil-surveigoltar.php?no_reg=<?= $noreg ?>" class="text-warning text-bold" target="_blank">
                                                            Survei Tarif
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

</body>
</html>
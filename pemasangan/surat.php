<?php 
require "../functions.php";
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
                            <h1 class="d-inline mr-4">Cetak Surat Pernyataan</h1>
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
                                        <table id="myTable" class="table table-sm table-hover table-bordered mt-3">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Actions</th>
                                                    <th>Nomor Sambungan</th>
                                                    <th>Tanggal Pemasangan</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Nomor HP</th>
                                                    <th>Golongan Tarif</th>
                                                    <th>Biaya</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlPasang = "SELECT pemasangan.*, pendaftaran.nama, pendaftaran.alamat, pendaftaran.no_hp, pendaftaran.kecamatan, pendaftaran.desa
                                                                from pemasangan INNER JOIN pendaftaran ON pemasangan.no_ds = pendaftaran.no_ds";
                                                $resultPasang = $db->prepare($sqlPasang);
                                                $resultPasang->execute();

                                                
                                                while ($data = $resultPasang->fetch(PDO::FETCH_ASSOC)) {
                                                    $no = $data['no_ds'];
                                                ?>

                                                <tr>
                                                    <td align="center">
                                                        <a href="report/surat-pelanggan.php?no_ds=<?= $no ?>" target="_blank">Pernyataan Pelanggan</a>
                                                        <a href="report/surat-terpasang.php?no_ds=<?= $no ?>" target="_blank">Pernyataan Terpasang</a>
                                                    </td>
                                                    <td align="center"><?= $data['no_ds']; ?></td>
                                                    <td><?= $data['tgl_pasang']; ?></td>
                                                    <td><?= $data['nama']; ?></td>

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

                                                    <td><?= $data['alamat'] . ', ' .  $namaDesa . ', ' . $namaKec ?></td>
                                                    <td><?php echo $data['no_hp']; ?></td>
                                                    <td align="center"><?php echo $data['gol_tarif']; ?></td>
                                                    <td><?php echo $data['biaya']; ?></td>
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
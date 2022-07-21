<?php
session_start();
include_once "../functions.php";

if($_SESSION['peran'] !== "TEKNISI"){
    header("location: ../logsystem/index.php");
    exit;
}

if (!isset($_SESSION['signin'])){
    header("location: ../logsystem/index.php");
}

$activeAntriBukatutup = "active";
?>

<!DOCTYPE html>
<head>
    <?php
    include_once ("../partials-teknisi/head.php");
    include_once ("../partials-teknisi/cssdatatables.php");
    ?> 
</head>
<?php include_once ("../database.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>
    <div class="wrapper">
        <?php include_once ("../partials-teknisi/navbar.php") ?>
        <?php include_once ("../partials-teknisi/sidebar.php") ?>

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
                        <div class="col-sm-8">
                            <h1 class="d-inline mr-4">Antrian Pembukaan & Penutupan</h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Buka & Tutup</li>
                                <li class="breadcrumb-item">Antrian Buka Tutup</li>
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
                                    <h5 class="text-center text-bold">Antrian Penutupan</h5>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover table-bordered mt-3">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col">Nomor Sambungan</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Nomor HP</th>
                                                    <th scope="row">Lihat Koordinat</th>
                                                    <th scope="row">Status Tindakan</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlAntriTutup = "SELECT pelanggan.*, pendaftaran.*, penutupan.status_tindakan FROM pelanggan INNER JOIN penutupan ON pelanggan.no_ds = penutupan.no_ds INNER JOIN pendaftaran ON penutupan.no_ds = pendaftaran.no_ds WHERE penutupan.status_tindakan = 'belum ditindak'";
                                                $resultAntriTutup = $db->prepare($sqlAntriTutup);
                                                $resultAntriTutup->execute();

                                                while ($data1 = $resultAntriTutup->fetch(PDO::FETCH_ASSOC)) {
                                                    $no_ds = $data1['no_ds'];
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $data1['no_ds']; ?></td>
                                                    <td><?php echo $data1['nama']; ?></td>
                                                    <td><?php echo $data1['alamat']; ?></td>
                                                    <td><?php echo $data1['no_hp']; ?></td>
                                                    <td align="center">
                                                        <a href="tampil-lokasi-trandis.php?no_ds=<?=$no_ds?>">
                                                            <?= $data1['lalong_val'] ?>
                                                        </a>
                                                    </td>
                                                    <td class="text-bold text-center text-danger"><a href="tindak-penutupan.php?no_ds=<?=$no_ds?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin perbarui status penindakan menjadi SELESAI?')"><?= $data1['status_tindakan']; ?></a></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-center text-bold">Antrian Pembukaan</h5>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover table-bordered mt-3">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col">Nomor Sambungan</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Nomor HP</th>
                                                    <th scope="row">Lihat Koordinat</th>
                                                    <th scope="row">Status Tindakan</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlAntriBuka = "SELECT pelanggan.*, pendaftaran.*, pembukaan.status_tindakan FROM pelanggan INNER JOIN pembukaan ON pelanggan.no_ds = pembukaan.no_ds INNER JOIN pendaftaran ON pembukaan.no_ds = pendaftaran.no_ds WHERE pembukaan.status_tindakan = 'belum ditindak'";
                                                $resultAntriBuka = $db->prepare($sqlAntriBuka);
                                                $resultAntriBuka->execute();

                                                while ($data2 = $resultAntriBuka->fetch(PDO::FETCH_ASSOC)) {
                                                    $no_ds = $data2['no_ds'];
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $data2['no_ds']; ?></td>
                                                    <td><?php echo $data2['nama']; ?></td>
                                                    <td><?php echo $data2['alamat']; ?></td>
                                                    <td><?php echo $data2['no_hp']; ?></td>
                                                    <td align="center">
                                                        <a href="tampil-lokasi-trandis.php?no_ds=<?=$no_ds?>">
                                                            <?= $data2['lalong_val'] ?>
                                                        </a>
                                                    </td>
                                                    <td class="text-bold text-center text-danger"><a href="tindak-pembukaan.php?no_ds=<?=$no_ds?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin perbarui status penindakan menjadi SELESAI?')"><?= $data2['status_tindakan']; ?></a></td>
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
    include_once ("../partials-teknisi/importjs.php");
    include_once ("../partials-teknisi/scriptsdatatables.php");
    ?>

</body>

</html>
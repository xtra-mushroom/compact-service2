<?php
session_start();
include_once "../functions.php";

if(!isset($_SESSION['peran'])){
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
    include_once ("../partials-perencanaan/head.php");
    include_once ("../partials-perencanaan/cssdatatables.php");
    ?> 
</head>
<?php include_once ("../database.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once ("../partials-perencanaan/navbar.php") ?>

        <!-- Sidebar -->
        <?php include_once ("../partials-perencanaan/sidebar.php") ?>

        <!-- Content -->
        <div class="content-wrapper">
            <section class="content-header">
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
                                    <h5 class="text-center">Antrian Penutupan</h5>
                                    <div class="table-responsive">
                                        <table class="myTable table table-sm table-hover table-bordered mt-3">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="row">Surat Perintah</th>
                                                    <th scope="row">Status Tindakan</th>
                                                    <th scope="col">Nomor Sambungan</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Nomor HP</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlAntriTutup = "SELECT pelanggan.*, penutupan.status_tindakan FROM pelanggan INNER JOIN penutupan ON pelanggan.no_ds = penutupan.no_ds WHERE penutupan.status_tindakan = 'belum ditindak'";
                                                $resultAntriTutup = $db->prepare($sqlAntriTutup);
                                                $resultAntriTutup->execute();

                                                while ($data1 = $resultAntriTutup->fetch(PDO::FETCH_ASSOC)) {
                                                    $no_ds = $data2['no_ds'];
                                                ?>
                                                <tr>
                                                    <td align="center">
                                                        <?php 
                                                        if($data1['status_ket'] == "TERBUKA"){
                                                            echo "<a href='../bukatutup/report/surat-pembukaan.php?no_ds=$no_ds' target='_blank'>Surat Perintah</a>";
                                                        }elseif($data1['status_ket'] == "TERTUTUP"){
                                                            echo "<a href='../bukatutup/report/surat-penutupan.php?no_ds=$no_ds' target='_blank'>Surat Perintah</a>";
                                                        }else{
                                                            echo "";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-bold text-center text-danger"><?php echo $data1['status_tindakan']; ?></td>
                                                    <td class="text-center"><?php echo $data1['no_ds']; ?></td>
                                                    <td><?php echo $data1['nama']; ?></td>
                                                    <td><?php echo $data1['alamat']; ?></td>
                                                    <td><?php echo $data1['no_hp']; ?></td>
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
                                    <h5 class="text-center">Antrian Pembukaan</h5>
                                    <div class="table-responsive">
                                        <table class="myTable table table-sm table-hover table-bordered mt-3">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="row">Surat Perintah</th>
                                                    <th scope="row">Status Tindakan</th>
                                                    <th scope="col">Nomor Sambungan</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Nomor HP</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlAntriBuka = "SELECT pelanggan.*, pembukaan.status_tindakan FROM pelanggan INNER JOIN pembukaan ON pelanggan.no_ds = pembukaan.no_ds WHERE pembukaan.status_tindakan = 'belum ditindak'";
                                                $resultAntriBuka = $db->prepare($sqlAntriBuka);
                                                $resultAntriBuka->execute();

                                                while ($data2 = $resultAntriBuka->fetch(PDO::FETCH_ASSOC)) {
                                                    $no_ds = $data2['no_ds'];
                                                ?>
                                                <tr>
                                                    <td align="center">
                                                        <?php 
                                                        if($data2['status_ket'] == "TERBUKA"){
                                                            echo "<a href='../bukatutup/report/surat-pembukaan.php?no_ds=$no_ds' target='_blank'>Surat Perintah</a>";
                                                        }elseif($data2['status_ket'] == "TERTUTUP"){
                                                            echo "<a href='../bukatutup/report/surat-penutupan.php?no_ds=$no_ds' target='_blank'>Surat Perintah</a>";
                                                        }else{
                                                            echo "";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-bold text-center text-danger"><?php echo $data2['status_tindakan']; ?></td>
                                                    <td class="text-center"><?php echo $data2['no_ds']; ?></td>
                                                    <td><?php echo $data2['nama']; ?></td>
                                                    <td><?php echo $data2['alamat']; ?></td>
                                                    <td><?php echo $data2['no_hp']; ?></td>
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
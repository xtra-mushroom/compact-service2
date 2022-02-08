<?php 
require "../functions.php";
$openBukaTutup = "menu-open";
$activeBukaTutup = "active"; $activeSuratBukaTutup = "active";
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
                        <div class="col-sm-8">
                            <h1 class="d-inline mr-4">Cetak Surat Perintah Pembukaan / Penutupan</h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Buka & Tutup</li>
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
                                            <thead>
                                                <tr>
                                                    <th scope="row">Actions</th>
                                                    <th scope="col">Nomor Sambungan</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Nomor HP</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlBukaTutup = "SELECT * FROM pelanggan";
                                                $resultBukaTutup = $db->prepare($sqlBukaTutup);
                                                $resultBukaTutup->execute();

                                                
                                                while ($data = $resultBukaTutup->fetch(PDO::FETCH_ASSOC)) {
                                                    $no = $data['no_ds'];
                                                ?>

                                                <tr>
                                                    <td align="center">
                                                        <?php 
                                                        if($data['status_ket'] == "TERBUKA"){
                                                            echo "<a href='report/surat-pembukaan.php?no_ds=$no' target='_blank'>Surat Perintah</a>";
                                                        }elseif($data['status_ket'] == "TERTUTUP"){
                                                            echo "<a href='report/surat-penutupan.php?no_ds=$no' target='_blank'>Surat Perintah</a>";
                                                        }else{
                                                            echo "";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $data['no_ds']; ?></td>
                                                    <td><?php echo $data['status_ket']; ?></td>
                                                    <td><?php echo $data['nama']; ?></td>
                                                    <td><?php echo $data['alamat']; ?></td>
                                                    <td><?php echo $data['no_hp']; ?></td>
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
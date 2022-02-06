<?php 
require "../functions.php";
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
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-sm table-hover table-bordered mt-3">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col">Nomor Sambungan</th>
                                                    <th scope="col">Tanggal Balik Nama</th>
                                                    <th scope="col">Nama Asal</th>
                                                    <th scope="col">Nama Baru</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Wilayah</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlBaliknama = "SELECT * FROM baliknama";
                                                $resultBaliknama = $db->prepare($sqlBaliknama);
                                                $resultBaliknama->execute();

                                                
                                                while ($data = $resultBaliknama->fetch(PDO::FETCH_ASSOC)) {
                                                    $no = $data['no_ds'];
                                                ?>

                                                <tr>
                                                    <td align="center"><?php echo $data['no_ds']; ?></td>
                                                    <td align="center"><?php echo $data['tanggal']; ?></td>
                                                    <td><?php echo $data['nama_asal']; ?></td>
                                                    <td><?php echo $data['nama_baru']; ?></td>
                                                    <td><?php echo $data['alamat']; ?></td>
                                                    <td align="center"><?php echo $data['wilayah']; ?></td>
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
<?php 
require "../functions.php";
$openBaliknama = "menu-open";
$activeBaliknama = "active"; $activeCariBaliknama = "active";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials/head.php") ?>
</head>

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
                                <div class="card-body ml-2 mt-2">
                                    <!-- di sini form buka tutup -->
                                    <form method="get" action="cari.php">
                                        <div class="form-group col-12">
                                          <div class="form-inline mt-2">
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="cari" placeholder="cari nama">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary btn-sidebar" type="submit" value="cari">
                                                        <i class="fas fa-search fa-fw"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>  

                                    <?php 
                                    if(isset($_GET['cari'])){
                                        $cari = $_GET['cari'];
                                        echo "<b class='text-primary'>Hasil pencarian : ".$cari."</b>";
                                    }
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover table-bordered mt-3">
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
                                            
                                            <?php 

                                            if(isset($_GET['cari'])){
                                                $cari = $_GET['cari'];
                                                $wildcard = "%$cari%";
                                                $sql = "SELECT * FROM baliknama where nama_asal like '$wildcard' OR nama_baru like '$wildcard'"; //'%".$cari."%'
                                                $result = $conn->query($sql);	
                                            }
                                            
                                            while($data = $result->fetch_assoc()){
                                            ?>

                                            <tbody>
                                                <tr>
                                                    <td><?php echo $data['no_ds']; ?></td>
                                                    <td><?php echo $data['tanggal']; ?></td>
                                                    <td><?php echo $data['nama_asal']; ?></td>
                                                    <td><?php echo $data['nama_baru']; ?></td>
                                                    <td><?php echo $data['alamat']; ?></td>
                                                    <td><?php echo $data['wilayah']; ?></td>
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

    <?php include_once ("../partials/importjs.php") ?>

</body>
</html>
<?php 
require "../functions.php";
$pemasangan = query("SELECT * FROM pemasangan");
$openPasang = "menu-open";
$activePasang = "active"; $activeSuratPasang = "active";
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
                                <div class="card-body ml-2 mt-3">
                                    <!-- di sini pencarian pendaftaran -->
                                    <form method="get" action="surat.php">
                                        <div class="form-group col-12">
                                          <div class="form-inline mt-2">
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="cari" placeholder="cari nomor ds">
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
                                                    <th scope="row">Actions</th>
                                                    <th scope="col">Nomor Sambungan</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Nomor HP</th>
                                                    <th scope="col">Biaya</th>
                                                </tr>
                                            </thead>
                                            
                                            <?php 
                                            if(isset($_GET['cari'])){
                                                $cari = $_GET['cari'];
                                                $sql = "SELECT * FROM pemasangan WHERE no_ds LIKE '%".$cari."%'";
                                                $result = $conn->query($sql);	
                                                // $data = $result->fetch_all();

                                                // print_r($data);
                                            }
                                            
                                            while($data = $result->fetch_assoc()){
                                                $no = $data['no_ds'];
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td align="center">
                                                        <a href="report/surat-terpasang.php?no_ds=<?php echo $no; ?>" target="_blank">Surat Pernyataan Terpasang</a>
                                                        <br/>
                                                        <a href="report/surat-pelanggan.php?no_ds=<?php echo $no; ?>" target="_blank">Surat Pernyataan Pelanggan</a>
                                                    </td>
                                                    <td><?php echo $data['no_ds']; ?></td>
                                                    <td><?php echo $data['nama']; ?></td>
                                                    <td><?php echo $data['alamat']; ?></td>
                                                    <td><?php echo $data['no_hp']; ?></td>
                                                    <td><?php echo $data['biaya']; ?></td>
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

    <?php include_once ("../partials/importjs.php") ?>
</body>

</html>
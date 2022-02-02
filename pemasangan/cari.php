<?php 
require "../functions.php";
$openPasang = "menu-open";
$activePasang = "active"; $activeCariPasang = "active";
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
                            <h1 class="d-inline mr-4">Cari Data Pemasangan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pemasangan</li>
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
                                <div class="card-body ml-2 mt-3">
                                    <!-- di sini pencarian pendaftaran -->
                                    <form method="get" action="cari.php">
                                        <div class="form-group col-12">
                                          <div class="form-inline mt-2">
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="cari" placeholder="cari ds, nama, alamat">
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
                                                    <th scope="col">Tanggal Pemasangan</th>
                                                    <th scope="col">Nomor KTP</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Jenis Kelamin</th>
                                                    <th scope="col">Tempat Lahir</th>
                                                    <th scope="col">Tanggal Lahir</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Status Kepemilikan Rumah</th>
                                                    <th scope="col">Jumlah Jiwa</th>
                                                    <th scope="col">Kecamatan</th>
                                                    <th scope="col">Desa</th>
                                                    <th scope="col">Nomor HP</th>
                                                    <th scope="col">Cabang</th>
                                                    <th scope="col">Golongan Tarif</th>
                                                    <th scope="col">Biaya</th>

                                                </tr>
                                            </thead>
                                            
                                            <?php 
                                            if(isset($_GET['cari'])){
                                                $cari = $_GET['cari'];
                                                $wildcard = "%$cari%";
                                                $sql = "SELECT * FROM pemasangan where nama like '$wildcard' OR alamat like '$wildcard' OR no_ds like '$wildcard'";
                                                $result = $conn->query($sql);	
                                                // $data = $result->fetch_all();
                                                // print_r($data);
                                            }
                                            
                                            while($data = $result->fetch_assoc()){
                                                $no = $data['no_ds'];
                                            ?>

                                            <tbody>
                                                <tr>
                                                    <td align="center"><a href="edit.php?no_ds=<?php echo $no; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                                    <td><?php echo $data['no_ds']; ?></td>
                                                    <td><?php echo $data['tgl_pasang']; ?></td>
                                                    <td><?php echo $data['no_ktp']; ?></td>
                                                    <td><?php echo $data['nama']; ?></td>
                                                    <td><?php echo $data['jenis_kel']; ?></td>
                                                    <td><?php echo $data['tmpt_lahir']; ?></td>
                                                    <td><?php echo $data['tgl_lahir']; ?></td>
                                                    <td><?php echo $data['alamat']; ?></td>
                                                    <td><?php echo $data['status_kep_rumah']; ?></td>
                                                    <td><?php echo $data['jumlah_jiwa']; ?></td>

                                                    <?php 
                                                    // agar yang tampil adalah nama kecamatannya
                                                    $valueKec = $data['kecamatan'];
                                                    $queryKec = "SELECT * FROM kecamatan WHERE id='$valueKec'";
                                                    $resultKec = $conn->query($queryKec);
                                                    $dataKec = $resultKec->fetch_assoc();
                                                    if($data['kecamatan'] == $dataKec['id']){
                                                        $namaKec = $dataKec['nama'];
                                                        echo "<td align='center'>".$namaKec."</td>";
                                                    }

                                                    // agar yang tampil adalah nama desanya
                                                    $valueDesa = $data['desa'];
                                                    $queryDesa = "SELECT * FROM desa WHERE id='$valueDesa'";
                                                    $resultDesa = $conn->query($queryDesa);
                                                    $dataDesa = $resultDesa->fetch_assoc();
                                                    if($data['desa'] == $dataDesa['id']){
                                                        $namaDesa = $dataDesa['nama'];
                                                        echo "<td align='center'>".$namaDesa."</td>";
                                                    }
                                                    ?>
                                                    
                                                    <td><?php echo $data['no_hp']; ?></td>
                                                    <td><?php echo $data['cabang']; ?></td>
                                                    <td><?php echo $data['gol_tarif']; ?></td>
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
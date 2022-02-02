<?php 
require "../functions.php";
$openDaftar = "menu-open";
$activeDaftar = "active"; $activeCariDaftar = "active";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once ("../partials/head.php") ?>
</head>

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
                        <div class="col-sm-6">
                            <h1 class="d-inline mr-4">Cari Data Pendaftaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pendaftaran</li>
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
                                <div class="card-body ml-3 mt-3">
                                    <!-- di sini pencarian pendaftaran -->
                                    <form method="get" action="cari.php">
                                        <div class="form-group col-11">
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
                                        </div>
                                    </form> 
                                    <div>
                                        <?php 
                                            if(isset($_GET['cari'])){
                                                $cari = $_GET['cari'];
                                                echo "<b class='text-primary'>Hasil pencarian : ".$cari."</b>";
                                            }
                                                
                                            echo "<div class='table-responsive'>";
                                                echo "<table class='table table-sm table-hover table-bordered mt-3'>";
                                                    echo "<thead class='text-center'>";
                                                        echo "<tr>";
                                                            echo "<th scope='row'>Actions</th>";
                                                            echo "<th>Nomor Pendaftaran</th>";
                                                            echo "<th>Nomor Sambungan</th>";
                                                            echo "<th>Tanggal Daftar</th>";
                                                            echo "<th>Nomor KTP</th>";
                                                            echo "<th>Nama</th>";
                                                            echo "<th>Jenis Kelamin</th>";
                                                            echo "<th>Alamat</th>";
                                                            echo "<th>Kecamatan</th>";
                                                            echo "<th>Desa</th>";
                                                            echo "<th>Nomor HP</th>";
                                                            echo "<th>Wilayah</th>";
                                                        echo "</tr>";
                                                    echo "</thead>";
                                                        
                                        
                                            if(isset($_GET['cari'])){
                                                $cari = $_GET['cari'];
                                                $sql = "SELECT * FROM pendaftaran where nama like '%".$cari."%' ORDER BY no_pend DESC";
                                                $result = $conn->query($sql);	
                                                    
                                            }
 
                                            while($data = $result->fetch_assoc()){
                                                $no = $data['no_pend'];
                                                        
                                            echo "<tbody>";
                                                echo "<tr>";
                                                echo "<td align='center'><a href='edit.php?no_pend=$no'><i class='bi bi-pencil-square'></i></a></td>";
                                                echo "<td align='center'>".$no."</td>";
                                                echo "<td>".$data['no_ds']."</td>";
                                                echo "<td align='center'>".$data['tgl_daftar']."</td>";
                                                echo "<td>".$data['no_ktp']."</td>";
                                                echo "<td>".$data['nama']."</td>";
                                                echo "<td>".$data['jenis_kel']."</td>";
                                                echo "<td>".$data['alamat']."</td>";
                                                
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
                                                
                                                echo "<td align='center'>".$data['no_hp']."</td>";
                                                echo "<td align='center'>".$data['wil']."</td>";
                                                echo "</tr>";

                                            echo "</tbody>";
                                            }
                                        
                                            echo "</table>";
                                        ?>   
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
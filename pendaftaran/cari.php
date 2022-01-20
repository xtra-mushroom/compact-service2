<?php 
require "../functions.php";
$pendaftaran = query("SELECT * FROM pendaftaran");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layanan</title>

    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../layout/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../layout/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../layout/dist/css/adminlte.min.css">
    <!-- icon tab -->
    <link rel="shortcut icon" href="../layout/dist/img/pdam-logo.png">
    <!-- sweet alert -->
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar right-->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav ml-auto">            
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../login/logout.php" class="nav-link"><i class="bi bi-box-arrow-right mr-1"></i>Logout</a>
                </li>
            </ul>
        </nav>
        <!-- end of Navbar right -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../layout/dist/img/pdam-logo.png" alt="PDAM Balangan Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light text-secondary"><b>PELAYANAN</b></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link">
                                <i class="nav-icon fas fa-igloo"></i>
                                <p>
                                    Home Page
                                </p>
                            </a>
                        </li>
                        <li class="nav-header mt-2">MENU PELAYANAN</li>
                            <!-- pendaftaran -->
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <h4>
                                        <i class="nav-icon fas fa-marker"></i>
                                        Pendaftaran   
                                    </h4>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="index.php" class="nav-link">
                                            <i class="bi bi-menu-app ml-4 mr-2"></i>
                                            <p>Input Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cari.php?cari=" class="nav-link active">
                                            <i class="bi bi-search ml-4 mr-2"></i>
                                            <p>Cari Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="surat.php?cari=" class="nav-link">
                                            <i class="bi bi-printer ml-4 mr-2"></i>
                                            <p>Cetak Surat</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="report/report-pendaftaran.php" class="nav-link" target="_blank">
                                            <i class="bi bi-archive ml-4 mr-2"></i>
                                            <p>Cetak Report</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- pemasangan -->
                            <li class="nav-item mt-2">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-wrench"></i>
                                    <p>
                                        Pemasangan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../pemasangan/index.php" class="nav-link">
                                            <i class="bi bi-menu-app ml-4 mr-2"></i>
                                            <p>Input Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pemasangan/cari.php?cari=" class="nav-link">
                                            <i class="bi bi-search ml-4 mr-2"></i>
                                            <p>Cari Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pemasangan/surat.php?cari=" class="nav-link">
                                            <i class="bi bi-printer ml-4 mr-2"></i>
                                            <p>Cetak Surat</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pemasangan/report/report-pemasangan.php" class="nav-link" target="_blank">
                                            <i class="bi bi-archive ml-4 mr-2"></i>
                                            <p>Cetak Report</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- buka tutup -->
                            <li class="nav-item mt-2">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-toggle-on"></i>
                                    <p>
                                        Buka & Tutup
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../bukatutup/index.php" class="nav-link">
                                            <i class="bi bi-menu-app ml-4 mr-2"></i>
                                            <p>Input & Cek Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../bukatutup/surat.php?cari=" class="nav-link">
                                            <i class="bi bi-printer ml-4 mr-2"></i>
                                            <p>Cetak Surat</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../bukatutup/report/report-bukatutup.php" class="nav-link" target="_blank">
                                            <i class="bi bi-archive ml-4 mr-2"></i>
                                            <p>Cetak Report</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- balik nama -->
                            <li class="nav-item mt-2">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users-cog"></i>
                                    <p>
                                        Balik Nama
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../baliknama/index.php" class="nav-link">
                                            <i class="bi bi-menu-app ml-4 mr-2"></i>
                                            <p>Input Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../baliknama/cari.php?cari=" class="nav-link">
                                            <i class="bi bi-search ml-4 mr-2"></i>
                                            <p>Cari Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" target="_blank">
                                            <i class="bi bi-archive ml-4 mr-2"></i>
                                            <p>Cetak Report</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- keluhan pelanggan -->
                            <li class="nav-item mt-2 mb-5">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-exclamation-circle"></i>
                                    <p>
                                        Keluhan Pelanggan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../keluhan/index.php" class="nav-link">
                                            <i class="bi bi-menu-app ml-4 mr-2"></i>
                                            <p>Input Keluhan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../keluhan/cari.php?cari=" class="nav-link">
                                            <i class="bi bi-search ml-4 mr-2"></i>
                                            <p>Cari Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../keluhan/report/report-baliknama.php" class="nav-link" target="_blank">
                                            <i class="bi bi-archive ml-4 mr-2"></i>
                                            <p>Cetak Report</p>
                                        </a>
                                    </li>
                                </ul>
                            </li> 
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
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
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
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
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- end of content -->
        </div>
        <!-- end of content-wrapper -->

    </div>
    <!-- end of main wrapper -->

    <!-- jQuery -->
    <script src="../layout/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../layout/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../layout/dist/js/demo.js"></script>

</body>

</html>
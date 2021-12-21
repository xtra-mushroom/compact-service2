<?php 
require "../functions.php";
$pemasangan = query("SELECT * FROM pemasangan");

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
                    <a href="login/logout.php" class="nav-link"><i class="bi bi-box-arrow-right mr-1"></i>Logout</a>
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
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-marker"></i>
                                    <p>
                                        Pendaftaran
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../pendaftaran/index.php" class="nav-link">
                                            <i class="bi bi-menu-app ml-4 mr-2"></i>
                                            <p>Input Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pendaftaran/cari.php?cari=" class="nav-link">
                                            <i class="bi bi-search ml-4 mr-2"></i>
                                            <p>Cari Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pendaftaran/surat.php?cari=" class="nav-link">
                                            <i class="bi bi-printer ml-4 mr-2"></i>
                                            <p>Cetak Surat</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pendaftaran/report/report-pendaftaran.php" class="nav-link" target="_blank">
                                            <i class="bi bi-archive ml-4 mr-2"></i>
                                            <p>Cetak Report</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- pemasangan -->
                            <li class="nav-item menu-open mt-2">
                                <a href="#" class="nav-link active">
                                    <h4>
                                        <i class="nav-icon fas fa-wrench"></i>
                                        Pemasangan   
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
                                        <a href="report/report-pemasangan.php" class="nav-link" target="_blank">
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
                                        <a href="#" class="nav-link">
                                            <i class="bi bi-menu-app ml-4 mr-2"></i>
                                            <p>Input Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="bi bi-search ml-4 mr-2"></i>
                                            <p>Cari Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="bi bi-printer ml-4 mr-2"></i>
                                            <p>Cetak Surat</p>
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
                            <h1 class="d-inline mr-4">Cari Data Pemasangan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pemasangan</li>
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
                                <div class="card-body ml-2 mt-3">
                                    <!-- di sini pencarian pendaftaran -->
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
                                                $sql = "SELECT * FROM pemasangan where nama like '%".$cari."%'";
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
                                                    <td><?php echo $data['kecamatan']; ?></td>
                                                    <td><?php echo $data['desa']; ?></td>
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
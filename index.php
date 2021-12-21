<?php 
    session_start();

    if (!isset($_SESSION['username'])){
        header("location: login/index.php");
    }
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
    <link rel="stylesheet" href="layout/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="layout/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="layout/dist/css/adminlte.min.css">
    <!-- icon tab -->
    <link rel="shortcut icon" href="layout/dist/img/pdam-logo.png">

    <script src="chartjs/Chart.js"></script>
    
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
                <img src="../layout/dist/img/pdam-logo.png" alt="PDAM Balangan Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light text-secondary"><b>PELAYANAN</b></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- SidebarSearch Form -->
                <!-- <div class="form-inline mt-2">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href=""../index.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Home Page
                                </p>
                            </a>
                        </li>
                        <li class="nav-header mt-2">
                            MENU PELAYANAN
                        </li>
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
                                    <a href="pendaftaran/index.php" class="nav-link">
                                        <i class="bi bi-menu-app ml-4 mr-2"></i>
                                        <p>Input Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pendaftaran/cari.php?cari=" class="nav-link">
                                        <i class="bi bi-search ml-4 mr-2"></i>
                                        <p>Cari Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pendaftaran/surat.php?cari=" class="nav-link">
                                        <i class="bi bi-printer ml-4 mr-2"></i>
                                        <p>Cetak Surat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pendaftaran/report/report-pendaftaran.php" class="nav-link" target="_blank">
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
                                    <a href="pemasangan/index.php" class="nav-link">
                                        <i class="bi bi-menu-app ml-4 mr-2"></i>
                                        <p>Input Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pemasangan/cari.php?cari=" class="nav-link">
                                        <i class="bi bi-search ml-4 mr-2"></i>
                                        <p>Cari Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pemasangan/surat.php?cari=" class="nav-link">
                                        <i class="bi bi-printer ml-4 mr-2"></i>
                                        <p>Cetak Surat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pemasangan/report/report-pemasangan.php" class="nav-link" target="_blank">
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
                                    <a href="bukatutup/index.php" class="nav-link">
                                        <i class="bi bi-menu-app ml-4 mr-2"></i>
                                        <p>Input & Cek Status</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="bukatutup/surat.php?cari=" class="nav-link">
                                        <i class="bi bi-printer ml-4 mr-2"></i>
                                        <p>Cetak Surat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="bukatutup/report/report-bukatutup.php" class="nav-link" target="_blank">
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
                                    <a href="baliknama/index.php" class="nav-link">
                                        <i class="bi bi-menu-app ml-4 mr-2"></i>
                                        <p>Input Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="baliknama/cari.php?cari=" class="nav-link">
                                        <i class="bi bi-search ml-4 mr-2"></i>
                                        <p>Cari Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="baliknama/surat.php?no_ds=" class="nav-link">
                                        <i class="bi bi-printer ml-4 mr-2"></i>
                                        <p>Cetak Surat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="baliknama/report/report-baliknama.php" class="nav-link" target="_blank">
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
                            <h1>Home Page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Home Page /</li>
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
                                <div class="card-body mx-auto mt-lg-5 text-center">
                                    <h5>Statistik Data Pelayanan</h5>

                                    <?php 
                                    include 'connection.php';
                                    ?>

                                    <div style="width: 500px; height: 300px;">
                                        <canvas id="myChart"></canvas>
                                    </div>

                                    <script>
                                        var ctx = document.getElementById("myChart").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ["Pendaftaran", "Pemasangan", "Pembukaan", "Penutupan"],
                                                datasets: [{
                                                    label: '# of Total data',
                                                    data: [
                                                        <?php
                                                        $jumlah_pendaftaran = mysqli_query($conn, "SELECT * FROM pendaftaran");
                                                        echo mysqli_num_rows($jumlah_pendaftaran);
                                                        ?>,
                                                        <?php
                                                        $jumlah_pemasangan = mysqli_query($conn, "SELECT * FROM pemasangan");
                                                        echo mysqli_num_rows($jumlah_pemasangan);
                                                        ?>,
                                                        <?php
                                                        $jumlah_pembukaan = mysqli_query($conn, "SELECT * FROM pembukaan");
                                                        echo mysqli_num_rows($jumlah_pembukaan);
                                                        ?>,
                                                        <?php
                                                        $jumlah_penutupan = mysqli_query($conn, "SELECT * FROM penutupan");
                                                        echo mysqli_num_rows($jumlah_penutupan);
                                                        ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(106, 235, 38, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255,99,132,1)',
                                                        'rgba(106, 235, 38, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero: true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                    </script> 
                                </div>

                                <div class="card-footer text-center">
                                    <p class="text-secondary">Copyright &copy; 2021</p>
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
    <script src="layout/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="layout/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="layout/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="layout/dist/js/demo.js"></script>

</body>

</html>
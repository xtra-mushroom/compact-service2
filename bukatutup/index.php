<?php 
require "../functions.php";
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
    <!-- SweetAlert2 bootstrap -->
    <link rel="stylesheet" href="../sweetalert2/dist/sweetalert2.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../layout/plugins/toastr/toastr.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../layout/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../layout/dist/css/adminlte.min.css">
    <!-- icon tab -->
    <link rel="shortcut icon" href="../layout/dist/img/pdam-logo.png">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->
    

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<script src="../sweetalert2/dist/sweetalert2.min.js"></script>
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
                <img src="../layout/dist/img/pdam-logo.png" alt="PDAM Balangan Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
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
                                <a href="../pendaftaran/index.php" class="nav-link">
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
                            <li class="nav-item menu-open mt-2">
                                <a href="#" class="nav-link active">
                                    <h4>
                                        <i class="nav-icon fas fa-toggle-on"></i>
                                        Buka & Tutup
                                    </h4>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="index.php" class="nav-link active">
                                            <i class="bi bi-menu-app ml-4 mr-2"></i>
                                            <p>Input & Cek Status</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="surat.php?cari=" class="nav-link">
                                            <i class="bi bi-printer ml-4 mr-2"></i>
                                            <p>Cetak Surat</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="report/report-bukatutup.php" class="nav-link" target="_blank">
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
                                        <a href="../baliknama/surat.php?cari=" class="nav-link">
                                            <i class="bi bi-printer ml-4 mr-2"></i>
                                            <p>Cetak Surat</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../baliknama/report/report-baliknama.php" class="nav-link" target="_blank">
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
                            <h1>Input Buka / Tutup & Cek Status</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Buka Tutup</li>
                                <li class="breadcrumb-item">Input & Cek Status</li>
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
                                <div class="card-body ml-5 mt-2">
                                    <!-- di sini form buka tutup -->
                                    <form action="" method="post">
                                        <div class="form-group row">
                                            <select class="form-control form-control-lg col-6 font-weight-bold text-center bg-success" id="menu" name="menu">
                                                    <option value="" selected>--Pilih menu--</option>
                                                    <option value="1">PEMBUKAAN</option>
                                                    <option value="0">PENUTUPAN</option>
                                            </select>
                                        </div>
                                        <div class="form-group row mt-2">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor DS</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ds" name="no_ds" onkeyup="autofill()">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status" class="col-sm-2 col-form-label">Status Saat Ini</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="status" name="status" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama" name="nama" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat" name="alamat" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp" name="no_hp" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl" class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl" name="tgl">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="keterangan" name="keterangan">
                                            </div>
                                        </div>
                                        
                                        <div class="card-footer col-6 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark ml-3">SIMPAN</button>
                                            
                                        </div>
                                    </form>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        function autofill(){
                                            var no_ds = $("#no_ds").val();
                                            $.ajax({
                                                url: 'getData.php',
                                                data:"no_ds="+no_ds ,
                                            }).success(function (data) {
                                                var json = data,
                                                obj = JSON.parse(json);
                                                $('#status').val(obj.status_ket);
                                                $('#nama').val(obj.nama);
                                                $('#alamat').val(obj.alamat);
                                                $('#no_hp').val(obj.no_hp); 
                                            });
                                        }
                                    </script>

                                    <?php 
                                    if(isset($_POST["submit"])){
                                        if($_POST["menu"] == "1"){
                                            $ds = $_POST["no_ds"];
                                            $nama = $_POST["nama"];
                                            $alamat = $_POST["alamat"];
                                            $hp = $_POST["no_hp"];
                                            $tgl = $_POST["tgl"];
                                            $ket = $_POST["keterangan"];
                                            $sValue = $_POST["menu"];
                                            $status = "TERBUKA";
                                    
                                            $query = "INSERT INTO pembukaan
                                                        VALUES
                                                        ('$tgl', '$ds', '$nama', '$alamat', '$hp', '$ket');";
                                    
                                            $query .= "UPDATE pelanggan
                                                        SET
                                                        status_ket='$status' WHERE no_ds='$ds'";
                                    
                                            $mysqlBuka = mysqli_multi_query($conn, $query);

                                            if($mysqlBuka == true){
                                                echo "<script>
                                                Swal.fire({
                                                    position: 'center',
                                                    icon: 'success',
                                                    title: 'Pembukaan Berhasil!',
                                                    showConfirmButton: true
                                                });
                                                </script>";
                                            }else{
                                                echo "<script>
                                                Swal.fire({
                                                    position: 'center',
                                                    icon: 'error',
                                                    title: 'Pembukaan Gagal!',
                                                    showConfirmButton: true
                                                });
                                                </script>";
                                            }
                                    
                                        }elseif($_POST["menu"] == "0"){
                                            $ds = $_POST["no_ds"];
                                            $nama = $_POST["nama"];
                                            $alamat = $_POST["alamat"];
                                            $hp = $_POST["no_hp"];
                                            $tgl = $_POST["tgl"];
                                            $ket = $_POST["keterangan"];
                                            $sValue = $_POST["menu"];
                                            $status = "TERTUTUP";
                                        
                                            $query = "INSERT INTO penutupan
                                                        VALUES
                                                        ('$tgl', '$ds', '$nama', '$alamat', '$hp', '$ket');";
                                    
                                            $query .= "UPDATE pelanggan
                                                        SET
                                                        status_ket='$status' WHERE no_ds='$ds'";
                                    
                                            $mysqlTutup = mysqli_multi_query($conn, $query);
                                            
                                            if($mysqlTutup == true){
                                                echo "<script>
                                                Swal.fire({
                                                    position: 'center',
                                                    icon: 'success',
                                                    title: 'Penutupan Berhasil!',
                                                    showConfirmButton: true
                                                });
                                                </script>";
                                            }else{
                                                echo "<script>
                                                Swal.fire({
                                                    position: 'center',
                                                    icon: 'error',
                                                    title: 'Penutupan Gagal!',
                                                    showConfirmButton: true
                                                });
                                                </script>";
                                            } 
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </section>
            <!-- end of content -->
        </div>
    </div>
    <!-- end of content-wrapper -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> -->

    <!-- jQuery .. jquery bawaan adminlte dicomment karena bentrok dengan ajax untuk fungsi autofill -->
    <!-- <script src="../layout/plugins/jquery/jquery.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <script src="../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../layout/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../layout/plugins/toastr/toastr.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../layout/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../layout/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../layout/dist/js/demo.js"></script>

</body>

</html>
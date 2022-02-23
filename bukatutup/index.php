<?php 
require "../functions.php";
$openBukaTutup = "menu-open";
$activeBukaTutup = "active"; $activeInputBukaTutup = "active";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>

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
                            <h1>Input Buka / Tutup & Cek Status</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Buka Tutup</li>
                                <li class="breadcrumb-item">Input & Cek Status</li>
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
                                <div class="card-body ml-5 mt-2">
                                    <!-- di sini form buka tutup -->
                                    <form action="" method="post">
                                        <div class="form-group row">
                                            <select class="form-control form-control-lg col-6 font-weight-bold text-center bg-success" id="menu" name="menu" autofocus>
                                                    <option value="" selected>--Pilih menu--</option>
                                                    <option value="1">PEMBUKAAN</option>
                                                    <option value="0">PENUTUPAN</option>
                                            </select>
                                        </div>
                                        <div class="form-group row mt-2">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor DS</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ds" name="no_ds" onkeyup="autofill()" autocomplete="off">
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
                                            <label for="id_wil" class="col-sm-2 col-form-label">ID Wilayah</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="id_wil" name="id_wil" readonly>
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
                                            <select class="form-control form-control-sm border-secondary" id="keterangan"
                                                    name="keterangan">
                                                    <option class="text-secondary" selected>---</option>
                                                    <option value="1">Permintaan Penutupan</option>
                                                    <option value="2">Permintaan Pembukaan</option>
                                                    <option value="3">Penutupan Otomatis</option>
                                                </select>
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
                                                $('#id_wil').val(obj.id_wil);
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
                                            $id_wil = $_POST["id_wil"];
                                            $hp = $_POST["no_hp"];
                                            $tgl = $_POST["tgl"];
                                            $sValue = $_POST["menu"];
                                            $status = "TERBUKA";
                                    
                                            $query = "INSERT INTO pembukaan
                                                        VALUES
                                                        ('$ds', '$id_wil', '$tgl', '$nama', '$alamat', '$hp', 'Permintaan Pembukaan', 20000);";
                                    
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
                                                    showConfirmButton: false,
                                                    timer: 1600
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
                                            $keterangan = "";
                                            if($_POST['keterangan'] == '1'){
                                                $keterangan = "Permintaan Penutupan";
                                                $biaya = 20000;
                                            }elseif($_POST['keterangan'] == '3'){
                                                $keterangan = "Penutupan Otomatis";
                                                $biaya = "null";
                                            }

                                            $ds = $_POST["no_ds"];
                                            $nama = $_POST["nama"];
                                            $alamat = $_POST["alamat"];
                                            $id_wil = $_POST["id_wil"];
                                            $hp = $_POST["no_hp"];
                                            $tgl = $_POST["tgl"];
                                            $sValue = $_POST["menu"];
                                            $status = "TERTUTUP";
                                        
                                            $query = "INSERT INTO penutupan
                                                        VALUES
                                                        ('$ds', '$id_wil', '$tgl', '$nama', '$alamat', '$hp', '$keterangan', $biaya);";
                                    
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
                                                    showConfirmButton: false,
                                                    timer: 1600
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
                                        }else{
                                            echo "<script>
                                                Swal.fire({
                                                    position: 'center',
                                                    icon: 'warning',
                                                    title: 'Pilih menu terlebih dahulu!',
                                                    showConfirmButton: true
                                                });
                                                </script>";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- jQuery .. jquery bawaan adminlte dicomment karena conflict dengan ajax untuk fungsi autofill -->
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
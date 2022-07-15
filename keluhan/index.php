<?php 
session_start();
include_once "../functions.php";
include_once ("../partials/session-pegawai.php");

$openKeluhan = "menu-open";
$activeKeluhan = "active"; $activeInputKeluhan = "active";
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
                            <h1>Input Data Keluhan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Keluhan</li>
                                <li class="breadcrumb-item">Input Keluhan</li>
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
                                <div class="card-body ml-4 mt-2">
                                    <!-- di sini form buka tutup -->
                                    <form action="" method="post">
                                        <div class="form-group row mt-2">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor DS</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ds" name="no_ds" required onkeyup="autofill()" autofocus>
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
                                            <label for="tgl_keluhan" class="col-sm-2 col-form-label">Tanggal Keluhan</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl_keluhan" name="tgl_keluhan" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control form-control-sm border-secondary" id="keluhan" name="keluhan" rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div class="card-footer col-6 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark float-right ml-3">SIMPAN</button>
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
                                                $('#nama').val(obj.nama);
                                                $('#alamat').val(obj.alamat);
                                                $('#no_hp').val(obj.no_hp);
                                            });
                                        }
                                    </script>

                                    <?php 
                                    if(isset($_POST["submit"])){
                                        $ds = $_POST["no_ds"];
                                        $nama = $_POST["nama"];
                                        $alamat = $_POST["alamat"];
                                        $hp = $_POST["no_hp"];
                                        $tgl = $_POST["tgl_keluhan"];
                                        $keluhan = $_POST["keluhan"];

                                        $sqlID = "SELECT * FROM keluhan WHERE no_ds='$ds' ORDER BY no_keluhan DESC LIMIT 1";
                                        $resultID = mysqli_query($conn, $sqlID);
                                        if($resultID->num_rows > 0){
                                            while($dataID = mysqli_fetch_assoc($resultID)){
                                                $last_ID = $dataID['no_keluhan'];
                                            }
                                            $splitLastID = substr($last_ID,4); // substring id
                                            $splitNewID = (int)$splitLastID + 1;

                                            for($i=1; $i<3; $i++){
                                                $nol = "0";
                                                if(strlen($splitNewID) == $i){
                                                    $splitNewID = $nol . (string)$splitNewID;
                                                }
                                            }
                                            $generateID = substr($ds,2) . $splitNewID;
                                        }else{
                                            $generateID = substr($ds,2) . "001";
                                        }
                                
                                        if(empty($nama)){
                                            $query = error;
                                        }else{
                                            $query = "INSERT INTO keluhan
                                                    VALUES
                                                    ('$ds', '$generateID', '$nama', '$alamat', '$hp', '$tgl', '$keluhan', 'tidak tersedia', '', '', '0000-00-00', '', 'Belum ditangani')";
                                        }
                                
                                        $mysqlKeluhan = mysqli_query($conn, $query);

                                        if($mysqlKeluhan == true){
                                            echo "<script>
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'success',
                                                title: 'Input Keluhan Berhasil!',
                                                showConfirmButton: true
                                            })
                                            </script>";
                                        }elseif($mysqlKeluhan == false){
                                            echo "<script>
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'error',
                                                title: 'Input Keluhan Gagal! Pastikan tidak ada kolom inputan yang kosong',
                                                showConfirmButton: true
                                            })
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

    <!-- jQuery .. jquery bawaan adminlte dicomment karena confilct dengan ajax untuk fungsi autofill -->
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
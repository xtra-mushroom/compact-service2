<?php
session_start();
include_once "../functions.php";

if(!isset($_SESSION['peran'])){
    header("location: ../logsystem/index.php");
    exit;
}

if (!isset($_SESSION['signin'])){
    header("location: ../logsystem/index.php");
}

$activeBaca = "active";

// if($_SESSION['jenis_kel'] == 'Laki-Laki'){
//     $image = "avatar.png";
// }elseif($_SESSION['jenis_kel'] == 'Perempuan'){
//     $image = "avatar2.png";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials-teknisi/head.php") ?>
    <!-- sweetalert css -->
    <link rel="stylesheet" href="../libraries/sweetalert2/dist/sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>
    <div class="wrapper">
        <?php include_once ("../partials-teknisi/navbar.php") ?>
        <?php include_once ("../partials-teknisi/sidebar.php") ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-12 text-center">
                            <h1 class="d-inline">Input Baca Meter</h1>
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
                                <div class="card-body mt-1">
                                    <?php 
                                    // $nolog = $_SESSION['no_log'];
                                    // $noreg = $_SESSION['noreg'];
                                    // $sql = "SELECT * FROM pendaftaran WHERE no_reg='$noreg'";
                                    // $result = $conn->query($sql);
                                          
                                    // $data = $result->fetch_assoc();
                                    ?>
                                    <form method="post" action="">
                                        <div class="form-group row mt-3">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor DS</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="no_ds" name="no_ds" onkeyup="autofill()" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
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
                                            <label for="gol_tarif" class="col-sm-2 col-form-label">Golongan Tarif</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="gol_tarif" name="gol_tarif" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cabang" class="col-sm-2 col-form-label">Cabang</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="cabang" name="cabang" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Bulan & Tahun</label>
                                            <div class="col-sm-2">
                                                <select class="form-control form-control-sm border-secondary" id="bulan" name="bulan">
                                                    <option class="text-secondary" selected>Pilih Bulan</option>
                                                    <option value="Januari">Januari</option>
                                                    <option value="Februari">Februari</option>
                                                    <option value="Maret">Maret</option>
                                                    <option value="April">April</option>
                                                    <option value="Mei">Mei</option>
                                                    <option value="Juni">Juni</option>
                                                    <option value="Juli">Juli</option>
                                                    <option value="Agustus">Agustus</option>
                                                    <option value="September">September</option>
                                                    <option value="Oktober">Oktober</option>
                                                    <option value="November">November</option>
                                                    <option value="Desember">Desember</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="tahun" name="tahun" placeholder="Isi Tahun">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pakai" class="col-sm-2 col-form-label">Pemakaian (hanya angka)</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="pakai" name="pakai">
                                            </div>
                                        </div>
                                        <div class="col-8 float-right mt-3 mb-4">
                                            <span class="col-sm-5">
                                                <button type="submit" name="save" class="btn" style="background:#046ea7; color:white;">SIMPAN</button>
                                            </span>
                                            <span class="col-sm-5">
                                                <button type="submit" name="edit" class="btn" style="background:#02a44f; color:white;">UBAH</button>
                                            </span>
                                        </div>
                                    </form>

                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        function autofill(){
                                            var no_ds = $("#no_ds").val();
                                            $.ajax({
                                                url: 'getData.php',
                                                data:'no_ds='+no_ds ,
                                            }).success(function (data) {
                                                var json = data,
                                                obj = JSON.parse(json);
                                                $('#nama').val(obj.nama);
                                                $('#alamat').val(obj.alamat);
                                                $('#gol_tarif').val(obj.goltar); 
                                                $('#cabang').val(obj.cabang); 
                                            });
                                        }
                                    </script>

                                    <?php 
                                    if(isset($_POST["save"])){
                                        $tgl_rilis = date("Y-m-d");
                                        $no_ds = $_POST["no_ds"];
                                        $cabang = $_POST["cabang"];
                                        $bulan = $_POST["bulan"];
                                        $tahun = $_POST["tahun"];
                                        $pakai = $_POST["pakai"];

                                        // menentukan beban dan tarif berdasarkan id_tarif
                                        if($_POST["gol_tarif"] == "R1"){
                                            $stan = 20000;
                                            $tarif = 3000;
                                        }elseif($_POST["gol_tarif"] == "R2"){
                                            $stan = 25000;
                                            $tarif = 3200;
                                        }elseif($_POST["gol_tarif"] == "R3"){
                                            $stan = 25000;
                                            $tarif = 3500;
                                        }elseif($_POST["gol_tarif"] == "IP"){
                                            $stan = 30000;
                                            $tarif = 3500;
                                        }elseif($_POST["gol_tarif"] == "NK"){
                                            $stan = 30000;
                                            $tarif = 3400;
                                        }elseif($_POST["gol_tarif"] == "NB"){
                                            $stan = 35000;
                                            $tarif = 4000;
                                        }elseif($_POST["gol_tarif"] == "SU"){
                                            $stan = 20000;
                                            $tarif = 3000;
                                        }elseif($_POST["gol_tarif"] == "R2"){
                                            $stan = 20000;
                                            $tarif = 3000;
                                        }

                                        // menentukan tagihan
                                        $tagihan = $stan + $tarif * $pakai;

                                        $denda = 0;
                                        $tgl_lunas = "0000-00-00";

                                        // query untuk ambil tgl_rilis tagihan bulan lalu
                                        $sqlDenda = "SELECT no_ds, tgl_rilis, tgl_lunas FROM tagihan WHERE no_ds = '$no_ds' ORDER BY tgl_rilis DESC LIMIT 1";
                                        $resultDenda = mysqli_query($conn, $sqlDenda);

                                        if($resultDenda->num_rows > 0){
                                            $fetchDenda = mysqli_fetch_assoc($resultDenda);
                                            // menghitung selisih tgl_rilis bulan lalu dan bulan ini
                                            $tgl_lalu = new DateTime($fetchDenda["tgl_rilis"]);
                                            $tgl_skrng = new DateTime($tgl_rilis);
                                            $diff = date_diff($tgl_lalu, $tgl_skrng);
                                            $diffWaktu = $diff->days;
                                            // pengkondisian update denda
                                            $tgl_lunas = $fetchDenda["tgl_lunas"];
                                            if($tgl_lunas == "0000-00-00" && $diffWaktu > 30){
                                                $updateDenda = 5000;
                                                $tgl_lalu = $tgl_lalu->format('Y-m-d');
                                            }elseif($tgl_lunas !== "0000-00-00"){
                                                $updateDenda = 0;
                                            }
                                        }else{
                                            $denda = 0;
                                        }

                                        $query = "INSERT INTO tagihan
                                                    VALUES
                                                    ('$no_ds', '$cabang', '$bulan', '$tahun', $stan, $pakai, $tagihan, $denda, '$tgl_rilis', '$tgl_lunas');";
                                        
                                        $query .= "UPDATE tagihan SET denda=$updateDenda WHERE no_ds='$no_ds' AND tgl_rilis='$tgl_lalu'";
                                        
                                        $mysqlBacaMeter = mysqli_multi_query($conn, $query);

                                        if($mysqlBacaMeter == true){
                                            echo "<script>
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'success',
                                                title: 'Data Berhasil Tersimpan!',
                                                showConfirmButton: false,
                                                timer: 1600
                                            })
                                            </script>";
                                        }else{
                                            echo "<script>
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'error',
                                                title: 'Data Gagal Tersimpan!',
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

    <script src="../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../layout/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../layout/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../layout/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../layout/dist/js/demo.js"></script>
</body>
</html>
<?php 
session_start();
require "../functions.php";
include_once ("../partials/session-pegawai.php");

$openPasang = "menu-open";
$activePasang = "active"; $activeInputPasang = "active";

if(isset($_POST["submit"])){
    // var_dump($_POST);
    $tgl_pasang = $_POST["tgl_pasang"];
    $noreg = $_POST["no_reg"];
    $nama = $_POST["nama"];
    $nik = $_POST["no_ktp"];
    $alamat = $_POST["alamat"];
    $hp = $_POST["no_hp"];
    $jenisKel = $_POST["jenis_kel"];
    $statusRumah = $_POST["status_kep_rumah"];
    $jmlhJiwa = $_POST["jumlah_jiwa"];
    $pln = $_POST["pln"];
    $cabang = $_POST["cabang"];
    $gol = $_POST["gol_tarif"];
    $biaya = $_POST["biaya"];
    $status = "TERBUKA";
    $gol_tarif = $_POST["gol_tarif"];

    // generate nomor sambungan
    $sql = "SELECT * FROM pemasangan ORDER BY urut_ds DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if($result->num_rows > 0){
        while($data = mysqli_fetch_assoc($result)){
            $last_ds = $data['no_ds'];
            $urutDS = $data['urut_ds'] + 1; // 011001
        }
        $split_last_ds = substr($last_ds,2); // 1001
        $split_new_ds = $split_last_ds + 1;

        for($i=1; $i<4; $i++){
            $nol = "0";
            if(strlen($split_new_ds) == $i){
                $split_new_ds = $nol . (string) $split_new_ds;
            }
        }
        $generate_ds = $cabang . $split_new_ds;
    }else{
        $generate_ds = $cabang . "0001";
        $urutDS = 1;
    }

    $pw_pelanggan = md5($generate_ds);

    $query = "INSERT INTO pemasangan
                VALUES
                ('$generate_ds', '$urutDS', '$tgl_pasang', '$statusRumah', '$jmlhJiwa', '$pln', '$cabang', '$gol', $biaya);";
                            
    // otomatis juga memasukkan data ke tabel pelanggan
    $query .= "INSERT INTO pelanggan
                VALUES
                ('$generate_ds', '$status', '$gol_tarif', '$nama', '$nik', '$jenisKel', '$alamat', '$hp');";

    // update nomor sambungan dan status_pasang di tabel pendaftaran
    $query .= "UPDATE pendaftaran
                SET
                no_ds='$generate_ds', status_pasang='terpasang' WHERE no_reg=$noreg;";

    // update status_pasang dan no-log di tabel antri_daftar
    $query .= "UPDATE antri_daftar
                SET
                status_pasang='terpasang', no_log='$generate_ds', passwd_pelanggan='$pw_pelanggan' WHERE no_reg=$noreg;";

    // update ketarangan pada survei bahan
    $query .= "UPDATE survei_bahan SET keterangan='terpasang' WHERE no_reg=$noreg;";

    $mysqlPemasangan = mysqli_multi_query($conn, $query);

    if($mysqlPemasangan == true){
        $label = "Data Berhasil Tersimpan! \nNomor Sambungan Baru : ".$generate_ds;
    }else{
        $label = "Data Gagal Tersimpan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>

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
                            <h1>Input Data Pemasangan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pemasangan</li>
                                <li class="breadcrumb-item">Input Data</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <form action="" method="post">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="tgl_pasang" class="col-sm-4 col-form-label">Tanggal</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl_pasang" name="tgl_pasang" autofocus required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_reg" class="col-sm-4 col-form-label">Nomor Registrasi</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="no_reg" name="no_reg" onkeyup="autofill()" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status_kep_rumah" class="col-sm-4 col-form-label">Kepemilikan Rumah</label>
                                            <div class="col-sm-8">
                                                <select class="form-control form-control-sm border-secondary" id="status_kep_rumah" name="status_kep_rumah" required>
                                                    <option class="text-secondary" selected>---</option>
                                                    <option value="Milik sendiri">Milik sendiri</option>
                                                    <option value="Sewa">Sewa</option>
                                                    <option value="Milik keluarga">Milik keluarga</option>
                                                    <option value="Lain-lain">Lain-lain</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jumlah_jiwa" class="col-sm-4 col-form-label">Jumlah Jiwa</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="jumlah_jiwa" name="jumlah_jiwa" autocomplete="off" requied>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pln"  class="col-sm-4 col-form-label">Nomor Pelanggan PLN</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="pln" name="pln" autocomplete="off" required>
                                            </div>
                                        </div>                                        
                                        <hr>
                                        <div class="card-footer col-12 text-right">
                                            <p><?php echo $label ?></p>
                                            <button type="submit" name="submit" class="btn btn-dark float-right ml-3">SIMPAN</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama" name="nama" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_ktp" class="col-sm-4 col-form-label">Nomor KTP</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ktp" name="no_ktp" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat" name="alamat" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-4 col-form-label">Nomor HP</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp" name="no_hp" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="jenis_kel" name="jenis_kel" readonly>
                                            </div>
                                        </div>                                       
                                        <hr>
                                        <h5 class=" mb-3">Cabang & Biaya</h5>
                                        <div class="form-group row">
                                            <label for="cabang" class="col-sm-4 col-form-label">Cabang</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="cabang" name="cabang" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gol_tarif" class="col-sm-4 col-form-label">Golongan Tarif</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="gol_tarif" name="gol_tarif" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="biaya" class="col-sm-4 col-form-label">Biaya</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="biaya" name="biaya" autocomplete="off" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </section>
            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script type="text/javascript">
                function autofill(){
                    var noreg = $("#no_reg").val();
                    $.ajax({
                        url: 'getData.php',
                        data:'no_reg='+noreg ,
                    }).success(function (data) {
                        var json = data,
                        obj = JSON.parse(json);
                        $('#nama').val(obj.nama);
                        $('#no_ktp').val(obj.no_ktp);
                        $('#alamat').val(obj.alamat);
                        $('#no_hp').val(obj.no_hp); 
                        $('#jenis_kel').val(obj.jenis_kel); 
                        $('#cabang').val(obj.cabang); 
                        $('#gol_tarif').val(obj.goltar); 
                        $('#biaya').val(obj.biaya); 
                    });
                }
            </script>
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
    <!-- AdminLTE App -->
    <script src="../layout/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../layout/dist/js/demo.js"></script>

</body>
</html>
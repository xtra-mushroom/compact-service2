<?php 
require "../functions.php";
$openPasang = "menu-open";
$activePasang = "active"; $activeInputPasang = "active";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<script src="../sweetalert2/dist/sweetalert2.min.js"></script>

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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body ml-5 mt-3">
                                    <!-- di sini form pemasangan -->
                                    <form action="" method="post">
                                        <div class="form-group row">
                                            <label for="tgl_pasang" class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl_pasang"
                                                name="tgl_pasang">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_ktp" class="col-sm-2 col-form-label">Nomor KTP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ktp"
                                                name="no_ktp" onkeyup="autofill()">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama"
                                                name="nama" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat"
                                                name="alamat" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="kecamatan"
                                                name="kecamatan" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="desa" class="col-sm-2 col-form-label">Desa</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="desa"
                                                name="desa" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp"
                                                name="no_hp" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="jenis_kel"
                                                    name="jenis_kel">
                                                    <option class="text-secondary" selected>---</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tmpt_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="tmpt_lahir"
                                                name="tmpt_lahir">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="tgl_lahir" name="tgl_lahir" placeholder="hh/bb/tttt">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status_kep_rumah" class="col-sm-2 col-form-label">Kepemilikan Rumah</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="status_kep_rumah"
                                                    name="status_kep_rumah">
                                                    <option class="text-secondary" selected>---</option>
                                                    <option value="Milik sendiri">Milik sendiri</option>
                                                    <option value="Sewa">Sewa</option>
                                                    <option value="Milik keluarga">Milik keluarga</option>
                                                    <option value="Lain-lain">Lain-lain</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jumlah_jiwa" class="col-sm-2 col-form-label">Jumlah Jiwa</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="jumlah_jiwa"
                                                name="jumlah_jiwa">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pln"  class="col-sm-2 col-form-label">PLN</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="pln" name="pln">
                                            </div>
                                        </div>                                        
                                        <hr>
                                        <h5 class=" mb-3">Cabang & Biaya</h5>
                                        <div class="form-group row">
                                            <label for="cabang" class="col-sm-2 col-form-label">Cabang</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="cabang" name="cabang">
                                                    <option class="text-secondary" value="">---</option>
                                                    <option value="01">Paringin 1</option>
                                                    <option value="02">Paringin 2</option>
                                                    <option value="03">Awayan</option>
                                                    <option value="04">Lampihong</option>
                                                    <option value="05">Halong</option>
                                                    <option value="06">Juai</option>
                                                    <option value="07">Batumandi</option>
                                                    <option value="08">Paringin Selatan</option>
                                                    <option value="09">Tebing Tinggi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gol_tarif" class="col-sm-2 col-form-label">Golongan Tarif</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="gol_tarif"
                                                    name="gol_tarif">
                                                    <option value="">---</option>
                                                    <option value="NN">NN</option>
                                                    <option value="NU">NU</option>
                                                    <option value="SK">SK</option>
                                                    <option value="SU">SU</option>
                                                    <option value="R1">R1</option>
                                                    <option value="R2">R2</option>
                                                    <option value="R3">R3</option>
                                                    <option value="IP">IP</option>
                                                    <option value="NK">NK</option>
                                                    <option value="NB">NB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="biaya"
                                                name="biaya">
                                            </div>
                                        </div>
                                        <div class="card-footer col-6 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark">SIMPAN</button>
                                        </div>
                                    </form>

                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        function autofill(){
                                            var no_ktp = $("#no_ktp").val();
                                            $.ajax({
                                                url: 'getData.php',
                                                data:"no_ktp="+no_ktp ,
                                            }).success(function (data) {
                                                var json = data,
                                                obj = JSON.parse(json);
                                                $('#nama').val(obj.nama);
                                                $('#alamat').val(obj.alamat);
                                                $('#kecamatan').val(obj.kecamatan);
                                                $('#desa').val(obj.desa);
                                                $('#no_hp').val(obj.no_hp); 
                                            });
                                        }
                                    </script>

                                    <?php 
                                    if(isset($_POST["submit"])){
                                        // var_dump($_POST);
                                        $ktp = $_POST["no_ktp"];
                                        $tgl_pasang = $_POST["tgl_pasang"]; // tanggal ketika pelanggan melakukan pembayaran biaya instalasi
                                        $tgl_install = "0000-00-00"; // tanggal ketika instalasi pipa dilakukan oleh petugas lapangan
                                        $nama = $_POST["nama"];
                                        $jenisKel = $_POST["jenis_kel"];
                                        $tmpLahir = $_POST["tmpt_lahir"];
                                        $tglLahir = $_POST["tgl_lahir"];
                                        $statusRumah = $_POST["status_kep_rumah"];
                                        $jmlhJiwa = $_POST["jumlah_jiwa"];
                                        $pln = $_POST["pln"];
                                        $alamat = $_POST["alamat"];
                                        $kec = $_POST["kecamatan"];
                                        $desa = $_POST["desa"];
                                        $hp = $_POST["no_hp"];
                                        $cabang = $_POST["cabang"];
                                        $gol = $_POST["gol_tarif"];
                                        $biaya = $_POST["biaya"];
                                        $status = "TERBUKA";
                                        $id_tarif = $_POST["gol_tarif"];

                                        $sql = "SELECT * FROM pelanggan ORDER BY no_ds LIMIT 1;";
                                        $result = mysqli_query($conn, $sql);

                                        if($result->num_rows > 0){
                                            while($data = mysqli_fetch_assoc($result)){
                                                $last_ds = $data['no_ds']; // 001001
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
                                        }

                                        $query = "INSERT INTO pemasangan
                                                    VALUES
                                                    ('$generate_ds', '$ktp', '$tgl_pasang', '$tgl_install', '$nama', '$jenisKel', '$tmpLahir', '$tglLahir', '$statusRumah', '$jmlhJiwa', '$pln', '$alamat', '$kec', '$desa', '$hp', '$cabang', '$gol', $biaya);";
                                        
                                        // otomatis juga memasukkan data ke tabel pelanggan
                                        $query .= "INSERT INTO pelanggan
                                                    VALUES
                                                    ('$generate_ds', '$status', '$id_tarif', '$nama', '$jenisKel', '$alamat', '$hp');";

                                        // update nomor sambungan di tabel pendaftaran
                                        $query .= "UPDATE pendaftaran
                                                    SET
                                                    no_ds='$generate_ds' WHERE no_ktp='$ktp'";

                                        $mysqlPemasangan = mysqli_multi_query($conn, $query);

                                        var_dump($mysqlPemasangan);

                                        if($mysqlPemasangan == true){
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
                                                showConfirmButton: false,
                                                timer: 1600
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
            </div>
        </section>
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
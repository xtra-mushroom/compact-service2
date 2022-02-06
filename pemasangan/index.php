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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body ml-5 mt-3">
                                    <!-- di sini form pemasangan -->
                                    <form action="" method="post">
                                        <div class="form-group row">
                                            <label for="tgl_pasang" class="col-sm-3 col-form-label">Tanggal</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl_pasang"
                                                name="tgl_pasang">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_pend" class="col-sm-3 col-form-label">Nomor Pendaftaran</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="no_pend"
                                                name="no_pend" onkeyup="autofill()">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama"
                                                name="nama" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_ktp" class="col-sm-3 col-form-label">Nomor KTP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ktp"
                                                name="no_ktp" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat"
                                                name="alamat" readonly>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan & Desa</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="kecamatan"
                                                name="kecamatan" readonly>
                                            </div> 
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="desa"
                                                name="desa" readonly>
                                            </div>
                                        </div> -->
                                        
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-3 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp"
                                                name="no_hp" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="jenis_kel"
                                                name="jenis_kel" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tmpt_lahir" class="col-sm-3 col-form-label">Tempat & Tanggal Lahir</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="tmpt_lahir"
                                                name="tmpt_lahir" placeholder="Tempat Lahir">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="tgl_lahir" name="tgl_lahir" placeholder="dd-mm-yyyy">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status_kep_rumah" class="col-sm-3 col-form-label">Kepemilikan Rumah</label>
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
                                            <label for="jumlah_jiwa" class="col-sm-3 col-form-label">Jumlah Jiwa</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="jumlah_jiwa"
                                                name="jumlah_jiwa">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pln"  class="col-sm-3 col-form-label">PLN</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="pln" name="pln">
                                            </div>
                                        </div>                                        
                                        <hr>
                                        <h5 class=" mb-3">Cabang & Biaya</h5>
                                        <div class="form-group row">
                                            <label for="cabang" class="col-sm-3 col-form-label">Cabang</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="cabang" name="cabang" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gol_tarif" class="col-sm-3 col-form-label">Golongan Tarif</label>
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
                                            <label for="biaya" class="col-sm-3 col-form-label">Biaya</label>
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
                                            var no_pend = $("#no_pend").val();
                                            $.ajax({
                                                url: 'getData.php',
                                                data:'no_pend='+no_pend ,
                                            }).success(function (data) {
                                                var json = data,
                                                obj = JSON.parse(json);
                                                $('#nama').val(obj.nama);
                                                $('#no_ktp').val(obj.no_ktp);
                                                $('#alamat').val(obj.alamat);
                                                $('#no_hp').val(obj.no_hp); 
                                                $('#jenis_kel').val(obj.jenis_kel); 
                                                $('#cabang').val(obj.id_wil); 
                                            });
                                        }
                                    </script>

                                    <?php 
                                    if(isset($_POST["submit"])){
                                        // var_dump($_POST);
                                        $no_pend = $_POST["no_pend"];
                                        $tgl_pasang = $_POST["tgl_pasang"];
                                        $nama = $_POST["nama"];
                                        $ttl = $_POST["tmpt_lahir"] . ", " . $_POST["tgl_lahir"];
                                        $jenisKel = $_POST["jenis_kel"];
                                        $statusRumah = $_POST["status_kep_rumah"];
                                        $jmlhJiwa = $_POST["jumlah_jiwa"];
                                        $pln = $_POST["pln"];
                                        $alamat = $_POST["alamat"];
                                        $hp = $_POST["no_hp"];
                                        $cabang = $_POST["cabang"];
                                        $gol = $_POST["gol_tarif"];
                                        $biaya = $_POST["biaya"];
                                        $status = "TERBUKA";
                                        $id_tarif = $_POST["gol_tarif"];

                                        // generate nomor sambungan
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
                                                    ('$generate_ds', '$no_pend', '$tgl_pasang', '$statusRumah', '$jmlhJiwa', '$pln', '$cabang', '$gol', $biaya);";
                                        
                                        // otomatis juga memasukkan data ke tabel pelanggan
                                        $query .= "INSERT INTO pelanggan
                                                    VALUES
                                                    ('$generate_ds', '$status', '$id_tarif', '$nama', '$ttl', '$jenisKel', '$alamat', '$hp');";

                                        // update nomor sambungan di tabel pendaftaran
                                        $query .= "UPDATE pendaftaran
                                                    SET
                                                    no_ds='$generate_ds' WHERE no_pend='$no_pend'";

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
                                                title: 'Data Gagal Tersimpan! Duplicate Entry -> Nomor Pendaftaran',
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
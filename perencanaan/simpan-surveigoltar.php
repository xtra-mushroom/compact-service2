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

$activeSurvei = "active";
?>

<!DOCTYPE html>
<head>
    <?php
    include_once ("partials/head.php");
    include_once ("partials/cssdatatables.php");
    ?> 
</head>
<?php include_once ("../database.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>

    <div class="wrapper">
        <?php include_once ("partials/navbar.php") ?>
        <?php include_once ("partials/sidebar.php") ?>

        <div class="content-wrapper">
            <section class="content-header">
<?php 
                if(isset($_SESSION['hasil'])){
                    if($_SESSION['hasil']){
?>
                    <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: '<?php echo $_SESSION["pesan"] ?>',
                        showConfirmButton: true
                        })
                    </script>
<?php 
                    } else {
?>
                    <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: '<?php echo $_SESSION["pesan"] ?>',
                        showConfirmButton: true
                        })
                    </script>
<?php
                    }
                    unset($_SESSION['pesan']);
                    unset($_SESSION['hasil']);
                }
?>
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1 class="d-inline mr-4">Tentukan Klasifikasi Tarif</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Antrian Survei</li>
                                <li class="breadcrumb-item active">Input Hasil Survei</li>
                                <li class="breadcrumb-item">Input Golongan Tarif</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- tabel antri survei -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body mt-3">
                                    <!-- di sini form pemasangan -->
                                    <?php 
                                    $noreg = $_GET['no_reg'];
                                    $sql = "SELECT pendaftaran.*, antri_daftar.nama, antri_daftar.jenis_kel, antri_daftar.no_hp, antri_daftar.alamat
                                            FROM pendaftaran INNER JOIN antri_daftar ON pendaftaran.no_reg = antri_daftar.no_reg WHERE pendaftaran.no_reg='$noreg'";
                                    $result = $conn->query($sql);
                                                
                                    while($data = $result->fetch_assoc()){
                                    ?>

                                    <form action="" method="post">
                                        <div class="form-group row">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor Registrasi</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ds"
                                                name="no_ds" value="<?= $noreg; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama"
                                                name="nama" autocomplete="off" value="<?= $data['nama']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control form-control-sm border-secondary" id="alamat"
                                                name="alamat" rows="2" autocomplete="off" value="" readonly><?= $data['alamat']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp"
                                                name="no_hp" autocomplete="off" value="<?= $data['no_hp']; ?>" readonly>
                                            </div>
                                        </div>
                                        <!-- <div class="card-footer col-6 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark">SIMPAN</button>
                                        </div> -->
                                    </form>
                                    <?php } ?>

                                    <hr>
                                    <?php 
                                    $queryGoltar = "SELECT * FROM survei_goltar_noniaga WHERE no_reg='$noreg'";
                                    $resultGoltar = mysqli_query($conn, $queryGoltar);
                                    $goltar = mysqli_fetch_assoc($resultGoltar);
                                    ?>
                                    <h6>Klasifikasi Rumah Tangga (RT) NON NIAGA menggunakan parameter dan data terukur :</h6>
                                    <h6 class="font-italic">(Isi kolom nilai pada masing-masing Indikator Penilaian untuk menginput poin)</h6>
                                    <form method="POST">
                                        <div class="table-responsive">
                                            <table class="table table-sm" border="2">
                                                    <tr class="bg-secondary text-bold">
                                                        <td rowspan="2" class="text-center align-middle border-dark">Indikator Penilaian</td>
                                                        <td colspan="3" class="text-center border-dark">Poin</td>
                                                        <td rowspan="2" class="text-center align-middle border-dark">Nilai</td>
                                                    </tr>
                                                    <tr class="bg-secondary text-bold">
                                                        <td class="text-center border-dark">2</td>
                                                        <td class="text-center border-dark">3</td>
                                                        <td class="text-center border-dark">4</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center border-dark">Pondasi</td>
                                                        <td class="text-center border-dark">Kayu Biasa</td>
                                                        <td class="text-center border-dark">Kayu Ulin</td>
                                                        <td class="text-center text-nowrap border-dark">Pasangan Batu / Cor</td>
                                                        <td class="text-center border-dark"><input type="number" id="pondasi" name="pondasi" style='width:60px;' value="<?=$goltar['pondasi']?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center border-dark">Dinding</td>
                                                        <td class="text-center border-dark">Papan Biasa / Seng / Kalsiboard</td>
                                                        <td class="text-center border-dark">Campuran Papan dan Bata / Plesteran</td>
                                                        <td class="text-center border-dark">Papan Ulin / Bata / Beton</td>
                                                        <td class="text-center border-dark"><input type="number" id="dinding" name="dinding" style='width:60px;' value="<?=$goltar['dinding']?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center border-dark">Lantai</td>
                                                        <td class="text-center border-dark">Papan Biasa</td>
                                                        <td class="text-center text-nowrap border-dark">Rabat Tanpa Keramik</td>
                                                        <td class="text-center border-dark">Papan Ulin / Keramik</td>
                                                        <td class="text-center border-dark"><input type="number" id="lantai" name="lantai" style='width:60px;' value="<?=$goltar['lantai']?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center border-dark">Atap</td>
                                                        <td class="text-center border-dark">Daun</td>
                                                        <td class="text-center border-dark">Seng / Asbes</td>
                                                        <td class="text-center border-dark">Sirap / Metal / Dak / Genteng</td>
                                                        <td class="text-center border-dark"><input type="number" id="atap" name="atap" style='width:60px;' value="<?=$goltar['atap']?>"></td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center test-nowrap border-dark">Luas Bangunan</td>
                                                        <td class="text-center text-nowrap border-dark">Kurang dari 36 m<sup>2</sup></td>
                                                        <td class="text-center border-dark">36 - 200 m<sup>2</sup></td>
                                                        <td class="text-center border-dark">Lebih dari 200 m<sup>2</sup></td>
                                                        <td class="text-center border-dark"><input type="number" id="luas_bangunan" name="luas_bangunan" style='width:60px;' value="<?=$goltar['luas_bangunan']?>"></td>
                                                    </tr>
                                            </table>
                                        </div>
                                    </form>

                                    <?php
                                    // if(isset($_POST["submit"])){
                                    //     // var_dump($_POST);
                                    //     $ktp = $_POST["no_ktp"];
                                    //     $ds = $_POST["no_ds"];
                                    //     $tgl = $_POST["tgl_pasang"];
                                    //     $nama = $_POST["nama"];
                                    //     $jenisKel = $_POST["jenis_kel"];
                                    //     $tmpLahir = $_POST["tmpt_lahir"];
                                    //     $tglLahir = $_POST["tgl_lahir"];
                                    //     $statusRumah = $_POST["status_kep_rumah"];
                                    //     $jmlhJiwa = $_POST["jumlah_jiwa"];
                                    //     $pln = $_POST["pln"];
                                    //     $alamat = $_POST["alamat"];
                                    //     $kec = $_POST["kecamatan"];
                                    //     $desa = $_POST["desa"];
                                    //     $hp = $_POST["no_hp"];
                                    //     $cabang = $_POST["cabang"];
                                    //     $gol = $_POST["gol_tarif"];
                                    //     $biaya = $_POST["biaya"];
                                    //     $ttl = $_POST["tmpt_lahir"] . "," . $_POST['tgl_lahir'];
                                    
                                    //     $query = "UPDATE pemasangan
                                    //                 SET
                                    //                 tgl_pasang='$tgl', status_kep_rumah='$statusRumah', jumlah_jiwa='$jmlhJiwa', pln='$pln', cabang='$cabang', gol_tarif='$gol', biaya=$biaya
                                    //                 WHERE no_ds='$ds';";
                                        
                                    //     $query .= "UPDATE pendaftaran
                                    //                 SET
                                    //                 no_ktp='$ktp', nama='$nama', jenis_kel='$jenisKel', alamat='$alamat', no_hp='$hp'
                                    //                 WHERE no_ds='$ds';";
                                        
                                    //     $query .= "UPDATE pelanggan
                                    //                 SET ttl='$ttl' WHERE no_ds='$ds';";
                                    
                                    //     $updatePemasangan = mysqli_multi_query($conn, $query);
                                         
                                    //     if($updatePemasangan == true){
                                    //         $_SESSION['hasil'] = true;
                                    //         $_SESSION['pesan'] = "Berhasil ubah data pemasangan";
                                    //     } else {
                                    //         $_SESSION['hasil'] = false;
                                    //         $_SESSION['pesan'] = "Gagal ubah data pemasangan";
                                    //     }
                                    //     echo "<meta http-equiv='refresh' content='0;url=cari.php'>";
                                    
                                    // }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php
    include_once ("partials/importjs.php");
    include_once ("partials/scriptsdatatables.php");
    ?>

    <script>
        $(function () {
        $('[data-toggle="popover"]').popover()
        })
    </script>

</body>

</html>
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
    include_once ("../partials-perencanaan/head.php");
    include_once ("../partials-perencanaan/cssdatatables.php");
    ?> 
</head>
<?php include_once ("../database.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>

    <div class="wrapper">
        <?php include_once ("../partials-perencanaan/navbar.php") ?>
        <?php include_once ("../partials-perencanaan/sidebar.php") ?>

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
                            <h1 class="d-inline mr-4">Input Hasil Survei</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Antrian Survei</li>
                                <li class="breadcrumb-item">Input Hasil Survei</li>
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
                                    $queryGudang = 'SELECT * FROM gudang ORDER BY nomor ASC';
                                    $resultGudang = mysqli_query($conn, $queryGudang);
                                    ?>
                                    <h5>Pilih bahan yang dibutuhkan</h5>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="text-center">Jenis</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Ukuran (inci)</th>
                                                    <th scope="col" class="text-right">Harga (satuan)</th>
                                                    <th scope="col" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            while($bahan = mysqli_fetch_object($resultGudang)) { 
                                            $kode = $bahan->kode    
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td align='center'><?= $bahan->jenis; ?></td>
                                                    <td><?= $bahan->nama; ?></td>
                                                    <td><?= $bahan->ukuran; ?></td>
                                                    <td align='right'><?= rupiah($bahan->harga); ?></td>
                                                    <td align='center'><a href="survei-cart.php?kode=<?= $kode; ?>&action=add&no_reg=<?= $noreg ?>">Pilih</a></td>
                                                </tr>
                                            </tbody>
                                            <?php } ?>
                                        </table>
                                    </div>

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
    include_once ("../partials-perencanaan/importjs.php");
    include_once ("../partials-perencanaan/scriptsdatatables.php");
    ?>

    <script>
        $(function () {
        $('[data-toggle="popover"]').popover()
        })
    </script>

</body>

</html>
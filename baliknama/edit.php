<?php 
session_start();
include_once "../functions.php";
include_once ("../partials/session-pegawai.php");

$openBaliknama = "menu-open";
$activeBaliknama = "active"; $activeCariBaliknama = "active";
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
                            <h1>Ubah Data Balik Nama</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Balik Nama</li>
                                <li class="breadcrumb-item">Ubah Data</li>
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
                                <?php 
                                    $ds = $_GET['no_ds'];
                                    $sql = "SELECT * FROM baliknama WHERE no_ds='$ds'";
                                    $result = $conn->query($sql);
                                                
                                    while($data = $result->fetch_assoc()){
                                    ?>
                                    <!-- di sini form buka tutup -->
                                    <form action="" method="post">
                                        <div class="form-group row mt-2">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor DS</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ds" name="no_ds" value="<?=$ds ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_asal" class="col-sm-2 col-form-label">Nama Asal</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama_asal" name="nama_asal" value="<?= $data['nama_asal'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_baru" class="col-sm-2 col-form-label">Nama Baru</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama_baru" name="nama_baru" value="<?= $data['nama_baru'] ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nik_baru" class="col-sm-2 col-form-label">NIK Baru</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nik_baru" name="nik_baru" value="<?= $data['nik_baru'] ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tmpt_lahir" class="col-sm-2 col-form-label">TTL Baru</label>
                                            <?php
                                            $ttl = $data['ttl_baru'];
                                            $pecahTtl = explode(',', $ttl);
                                            ?>
                                            <div class="col-sm-2"> 
                                                <input type="text" class="form-control form-control-sm border-secondary" id="tmpt_lahir"
                                                name="tmpt_lahir" value="<?= $pecahTtl[0] ?>" autocomplete="off">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="tgl_lahir"
                                                name="tgl_lahir" value="<?= $pecahTtl[1] ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel_baru" class="col-sm-2 col-form-label">Jenis Kelamin Baru</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="jenis_kel_baru"
                                                    name="jenis_kel_baru" value="">
                                                    <option class="text-secondary" selected>---</option>
                                                    <?php 
                                                    $male = "";
                                                    $female = "";
                                                    if($data['jk_baru'] == "Laki-Laki"){
                                                        $male = "selected";
                                                    } elseif ($data['jk_baru'] == "Perempuan"){
                                                        $female = "selected";
                                                    }
                                                    ?>
                                                    <option value="Laki-Laki" <?= " " . $male; ?>>Laki-Laki</option>
                                                    <option value="Perempuan" <?= " " . $female; ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hp_baru" class="col-sm-2 col-form-label">Nomor HP Baru</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="hp_baru" name="hp_baru" value="<?= $data['hp_baru'] ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tanggal" name="tanggal" value="<?= $data['tanggal'] ?>">
                                            </div>
                                        </div>
                                        <div class="card-footer col-6 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark float-right ml-3">SIMPAN</button>
                                        </div>
                                    </form>
                                    <?php } ?>

                                    <?php 
                                    if(isset($_POST["submit"])){
                                        $ds = $_POST["no_ds"];
                                        $nama = $_POST["nama_asal"];
                                        $nama_baru = $_POST["nama_baru"];
                                        $nik_baru = $_POST["nik_baru"];
                                        $ttl_baru = $_POST["tmpt_lahir"] . "," . $_POST["tgl_lahir"];
                                        $jenisKel_baru = $_POST["jenis_kel_baru"];
                                        $hp_baru = $_POST["hp_baru"];
                                        $tgl = $_POST["tanggal"];
                                
                                        $query = "UPDATE baliknama
                                                    SET
                                                    nama_baru = '$nama_baru', jk_baru='$jenisKel_baru', ttl_baru='$ttl_baru', nik_baru='$nik_baru', hp_baru='$hp_baru', tanggal='$tgl' WHERE no_ds='$ds';";
                                
                                        $query .= "UPDATE pelanggan
                                                    SET
                                                    nama='$nama_baru', nik='$nik_baru', ttl='$ttl_baru', jenis_kel='$jenisKel_baru', no_hp='$hp_baru' WHERE no_ds='$ds';";
                                
                                        $updateBaliknama = mysqli_multi_query($conn, $query);

                                        if($updateBaliknama == true){
                                            $_SESSION['hasil'] = true;
                                            $_SESSION['pesan'] = "Berhasil ubah data balik nama";
                                        } else {
                                            $_SESSION['hasil'] = false;
                                            $_SESSION['pesan'] = "Gagal ubah data balik nama";
                                        }
                                        echo "<meta http-equiv='refresh' content='0;url=cari.php'>";

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

    <script src="../layout/plugins/jquery/jquery.min.js"></script>
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
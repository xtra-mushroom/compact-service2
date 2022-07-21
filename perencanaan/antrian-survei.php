<?php
session_start();
include_once "../functions.php";

if($_SESSION['peran'] !== "TEKNISI"){
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
    include_once ("../partials-teknisi/head.php");
    include_once ("../partials-teknisi/cssdatatables.php");
    ?> 
</head>
<?php include_once ("../database.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>

    <div class="wrapper">
        <?php include_once ("../partials-teknisi/navbar.php") ?>
        <?php include_once ("../partials-teknisi/sidebar.php") ?>

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
                            <h1 class="d-inline mr-4">Antrian Survei</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Antrian Survei</li>
                                <!-- <li class="breadcrumb-item active">Antrian Survei</li> -->
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
                                <div class="card-body">
                                    <h5 class="mb-3 text-center">Data Antrian Survei</h5>
                                    <div class="table-responsive"> 
                                        <table class="table table-sm table-bordered table-hover">
                                            <thead align="center">
                                                <tr>
                                                    <th>Nomor Registrasi</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>KTP</th>
                                                    <th>Alamat</th>
                                                    <th>Lihat Koordinat</th>
                                                    <th>Tanggal Survei</th>
                                                    <th>Status Survei</th>
                                                    <th>Input Survei</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sql = "SELECT pendaftaran.no_reg, antri_daftar.nama, antri_daftar.jenis_kel, antri_daftar.no_hp, antri_daftar.alamat, pendaftaran.no_ktp, pendaftaran.ktp, pendaftaran.tgl_daftar, pendaftaran.biaya, pendaftaran.status_berkas, pendaftaran.tgl_survei, pendaftaran.status_survei, pendaftaran.status_pasang, pendaftaran.lalong_val FROM pendaftaran INNER JOIN antri_daftar ON pendaftaran.no_reg = antri_daftar.no_reg WHERE pendaftaran.status_survei='belum' AND pendaftaran.status_berkas!='';";
                                                $result = $db->prepare($sql);
                                                $result->execute();
                                                
                                                while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                                                    $noreg = $data['no_reg'];
                                                ?>
                                                <tr>
                                                    <td align="center"><?= $noreg ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= "<img src='../otheruser/ktppic/".$data['ktp']."'style='width:100px; height:100px;'>" ?></td>
                                                    <td align='center'><?= $data['alamat'] ?></td>
                                                    <td align="center">
                                                        <a href="tampil-lokasi-perencana.php?no_reg=<?= $noreg ?>">
                                                            <?= $data['lalong_val'] ?>
                                                        </a>
                                                    </td>
                                                    <td align='center'><?= $data['tgl_survei'] ?></td>
                                                    <td align='center'><?= $data['status_survei'] ?></td>
                                                    <td align="center">
                                                        <a href="input-survei.php?no_reg=<?= $noreg ?>" class="btn btn-sm btn-success">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <!-- tabel antri survei -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-3 text-center">Selesai disurvei</h5>
                                    <div class="table-responsive"> 
                                        <table class="table table-sm table-bordered table-hover">
                                            <thead align="center">
                                                <tr>
                                                    <th>Nomor Registrasi</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>KTP</th>
                                                    <th>Tanggal Daftar</th>
                                                    <th>Status Berkas</th>
                                                    <th>Tanggal Survei</th>
                                                    <th>Status Survei</th>
                                                    <th>Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sql = "SELECT pendaftaran.no_reg, antri_daftar.nama, antri_daftar.jenis_kel, antri_daftar.no_hp, antri_daftar.alamat, pendaftaran.no_ktp, pendaftaran.ktp, pendaftaran.tgl_daftar, pendaftaran.biaya, pendaftaran.status_berkas, pendaftaran.tgl_survei, pendaftaran.status_survei, pendaftaran.status_pasang FROM pendaftaran INNER JOIN antri_daftar ON pendaftaran.no_reg = antri_daftar.no_reg WHERE pendaftaran.status_survei='selesai' AND pendaftaran.status_berkas='diverifikasi'";
                                                $result = $db->prepare($sql);
                                                $result->execute();
                                                
                                                while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                                                    $noreg = $data['no_reg'];
                                                ?>
                                                <tr>
                                                    <td align="center"><?= $noreg ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= "<img src='../otheruser/ktppic/".$data['ktp']."'style='width:100px; height:100px;'>" ?></td>
                                                    <td align="center"><?= $data['tgl_daftar'] ?></td>
                                                    <td align='center' style='color:green'><?= $data['status_berkas'] ?></td>
                                                    <td><?= $data['tgl_survei'] ?></td>
                                                    <td align='center' class='text-success'><?= $data['status_survei'] ?></td>
                                                    <td align="center">
                                                        <a href="report/hasil-surveibahan.php?no_reg=<?= $noreg ?>" class="text-primary text-bold" target="_blank">
                                                            Survei Bahan
                                                        </a>
                                                        <br/>
                                                        <a href="report/hasil-surveigoltar.php?no_reg=<?= $noreg ?>" class="text-warning text-bold" target="_blank">
                                                            Survei Tarif
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php
    include_once ("../partials-teknisi/importjs.php");
    include_once ("../partials-teknisi/scriptsdatatables.php");
    ?>

    <script>
        $(function () {
        $('[data-toggle="popover"]').popover()
        })
    </script>

</body>

</html>
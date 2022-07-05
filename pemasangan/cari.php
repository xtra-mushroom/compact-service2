<?php 
session_start();
require "../functions.php";
include_once ("../partials/session-pegawai.php");

$openPasang = "menu-open";
$activePasang = "active"; $activeCariPasang = "active";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once ("../partials/head.php");
    include_once ("../partials/cssdatatables.php");
    ?>
</head>
<?php include_once ("../database.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">
<script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once ("../partials/navbar.php") ?>

        <!-- Sidebar -->
        <?php
        include_once ("../partials/sidebar.php");
        ?>

        <!-- Content -->
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
                            <h1 class="d-inline mr-4">
                                Cari Data Pemasangan
                                <button type="button" class="btn btn-sm btn-danger rounded-circle" data-container="body" data-toggle="popover" data-placement="bottom" data-content='Data yang ditampilkan bukan data pelanggan secara real-time, cari data pelanggan di menu "Data Pelanggan"'>
                                    <i class="bi bi-exclamation-diamond-fill"></i>
                                </button>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pemasangan</li>
                                <li class="breadcrumb-item">Cari Data</li>
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
                                <div class="card-body"> 
                                    <div class="table-responsive">
                                        <table class="myTable table table-sm table-hover table-bordered">
                                            <thead align="center">
                                                <tr>
                                                    <th>Actions</th>
                                                    <th>Nomor DS</th>
                                                    <th>Tanggal Pemasangan</th>
                                                    <th>Nomor KTP</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Nomor HP</th>
                                                    <th>Status Kepemilikan Rumah</th>
                                                    <th>Jumlah Jiwa</th>
                                                    <th>Nomor PLN</th>
                                                    <th>Cabang</th>
                                                    <th>Golongan Tarif</th>
                                                    <th>Biaya</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlPasang = "SELECT pemasangan.no_ds, pemasangan.tgl_pasang, pemasangan.status_kep_rumah, pemasangan.jumlah_jiwa, pemasangan.pln, pemasangan.cabang, pemasangan.gol_tarif, pemasangan.biaya, antri_daftar.nama, pendaftaran.no_ktp, antri_daftar.jenis_kel, antri_daftar.alamat, antri_daftar.no_hp FROM pemasangan INNER JOIN pendaftaran ON pemasangan.no_ds = pendaftaran.no_ds INNER JOIN antri_daftar ON antri_daftar.no_reg = pendaftaran.no_reg;";
                                                $resultPasang = $db->prepare($sqlPasang);
                                                $resultPasang->execute();

                                                while ($data = $resultPasang->fetch(PDO::FETCH_ASSOC)) {
                                                    $no = $data['no_ds'];
                                                ?>

                                                <tr>
                                                    <td align="center">
                                                        <a href="edit.php?no_ds=<?= $no; ?>" class="btn btn-sm btn-success">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    </td>
                                                    <td align="center"><?= $data['no_ds']; ?></td>
                                                    <td><?= $data['tgl_pasang']; ?></td>
                                                    <td><?= $data['no_ktp']; ?></td>
                                                    <td><?= $data['nama']; ?></td>

                                                    <?php 
                                                    // agar yang tampil adalah nama kecamatannya
                                                    // $valueKec = $data['kecamatan'];
                                                    // $queryKec = "SELECT * FROM kecamatan WHERE id='$valueKec'";
                                                    // $resultKec = $conn->query($queryKec);
                                                    // $dataKec = $resultKec->fetch_assoc();
                                                    // if($data['kecamatan'] == $dataKec['id']){
                                                    //     $namaKec = $dataKec['nama'];
                                                    // }

                                                    // agar yang tampil adalah nama desanya
                                                    // $valueDesa = $data['desa'];
                                                    // $queryDesa = "SELECT * FROM desa WHERE id='$valueDesa'";
                                                    // $resultDesa = $conn->query($queryDesa);
                                                    // $dataDesa = $resultDesa->fetch_assoc();
                                                    // if($data['desa'] == $dataDesa['id']){
                                                    //     $namaDesa = $dataDesa['nama'];
                                                    // }
                                                    ?>

                                                    <td><?= $data['alamat']; ?></td>
                                                    <td><?= $data['jenis_kel']; ?></td>
                                                    <td><?= $data['no_hp']; ?></td>
                                                    <td align="center"><?= $data['status_kep_rumah']; ?></td>
                                                    <td align="center"><?= $data['jumlah_jiwa']; ?></td>
                                                    <td align="center"><?= $data['pln']; ?></td>
                                                    <td align="center"><?= $data['cabang']; ?></td>
                                                    <td align="center"><?= $data['gol_tarif']; ?></td>
                                                    <td><?= $data['biaya']; ?></td>
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
    include_once ("../partials/importjs.php");
    include_once ("../partials/scriptsdatatables.php");
    ?>

    <script>
        $(function () {
        $('[data-toggle="popover"]').popover()
        })
    </script>

</body>
</html>
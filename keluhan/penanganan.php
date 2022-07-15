<?php 
session_start();
include_once "../functions.php";
include_once ("../partials/session-pegawai.php");

$openKeluhan = "menu-open";
$activeKeluhan = "active"; $activePenanganan = "active";
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
        <?php include_once ("../partials/sidebar.php") ?>

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
                            <h1>Antrian & Penanganan Keluhan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Keluhan</li>
                                <li class="breadcrumb-item">Antrian Penanganan</li>
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
                                <div class="card-body ml-2 mt-2">
                                    <div class="table-responsive">
                                        <table class="myTable table table-sm table-hover table-bordered mt-3">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col">Nomor Sambungan</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Nomor HP</th>
                                                    <th scope="col">Tanggal Keluhan</th>
                                                    <th scope="col">Isi Keluhan</th>
                                                    <th scope="col">Gambar Bukti</th>
                                                    <th scope="col">Tangani</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlKeluhan = "SELECT * FROM keluhan WHERE status_penanganan='Belum ditangani'";
                                                $resultKeluhan = $db->prepare($sqlKeluhan);
                                                $resultKeluhan->execute();

                                                while ($data = $resultKeluhan->fetch(PDO::FETCH_ASSOC)) {
                                                    $id = $data['no_keluhan'];
                                                ?>

                                                <tr>
                                                    <td class="text-center"><?php echo $data['no_ds']; ?></td>
                                                    <td><?php echo $data['nama']; ?></td>
                                                    <td><?php echo $data['alamat']; ?></td>
                                                    <td><?php echo $data['no_hp']; ?></td>
                                                    <td class="text-center"><?php echo $data['tgl_keluhan']; ?></td>
                                                    <td><?php echo $data['keluhan']; ?></td>
                                                    <?php 
                                                    if($data['img_keluhan'] == "tidak tersedia"){
                                                        echo "<td class='text-danger text-center'>Tidak tersedia</td>";
                                                    }elseif($data['img_keluhan'] !== "tidak tersedia"){
                                                    ?>
                                                    <td class='text-center'><img src="../otheruser/img-keluhan/<?php echo $data['img_keluhan']; ?>" style='width:100px;'></td>
                                                    <?php } ?>
                                                    <td align="center">
                                                        <a href="input-penanganan.php?id=<?= $id; ?>" class="btn btn-sm btn-success">
                                                            <i class="bi bi-plus-circle"></i>
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
    include_once ("../partials/importjs.php");
    include_once ("../partials/scriptsdatatables.php");
    ?>

</body>
</html>
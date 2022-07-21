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

$activeKeluhan = "active";
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
                            <h1 class="d-inline mr-4">Antrian Tindak Lanjut Keluhan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Keluhan Pelanggan</li>
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
                                    <h5 class="mb-3 text-center">Keluhan Pelanggan</h5>
                                    <div class="table-responsive"> 
                                        <table class="table table-sm table-hover table-bordered mt-3">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col">Nomor Sambungan</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Nomor HP</th>
                                                    <th scope="col">Tanggal Keluhan</th>
                                                    <th scope="col">Isi Keluhan</th>
                                                    <th scope="col">Gambar Bukti</th>
                                                    <th scope="col">Penanganan</th>
                                                    <th scope="col">Catatan</th>
                                                    <th scope="col">Tindak Lanjut</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlKeluhan = "SELECT * FROM keluhan WHERE jenis_penanganan='Butuh observasi dan tindak lanjut' AND status_penanganan='Belum ditangani'";
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
                                                    <td><?php echo $data['penanganan']; ?></td>
                                                    <td><?php echo $data['catatan']; ?></td>
                                                    <td align="center">
                                                        <a href="tindak-lanjut.php?id=<?= $id; ?>" class="btn btn-sm btn-success">
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
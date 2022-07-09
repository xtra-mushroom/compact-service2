<?php 
session_start();
include_once ("../functions.php");

if(isset($_SESSION['peran'])){
    header("location: ../logsystem/index.php");
    exit;
}

if (!isset($_SESSION['signin'])){
    header("location: ../logsystem/index.php");
}

$activeKeluhan = "active";
$no_ds =$_SESSION['no_log'];

if($_SESSION['jenis_kel'] == 'Laki-Laki'){
    $image = "avatar.png";
}elseif($_SESSION['jenis_kel'] == 'Perempuan'){
    $image = "avatar2.png";
}
?>

<!DOCTYPE html>
<head>
    <?php
    include_once ("../partials-otheruser/head.php");
    include_once ("../partials-otheruser/cssdatatables.php");
    ?>
</head>
<?php include_once ("../database.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>
    <div class="wrapper">
        <!-- Navbar right-->
        <?php include_once ("../partials-otheruser/navbar.php") ?>

        <!-- Sidebar -->
        <?php include_once ("../partials-otheruser/sidebar.php") ?>

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
                        <div class="col-sm-7">
                            <h1 class="mr-4">
                                Keluhan Anda
                                <button type="button" class="btn btn-sm btn-danger rounded-circle" data-container="body" data-toggle="popover" data-placement="bottom" data-content='Keluhan anda akan ditindak paling lambat 5 hari'>
                                    <i class="bi bi-exclamation-diamond-fill"></i>
                                </button>
                            </h1>
                        </div>
                        <div class="col-sm-5">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Keluhan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- table data menunggu verifikasi -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                <a href="input-keluhan.php?no_ds=<?= $no_ds; ?>" class="btn btn-sm btn-success mb-3">
                                    <i class="bi bi-plus-circle-fill mr-2"></i>KELUHAN BARU
                                </a>
                                    <div class="table-responsive"> 
                                        <table class="myTable table table-sm table-bordered table-hover">
                                            <thead align="center">
                                                <tr>
                                                    <th>Nomor Sambungan</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Alamat</th>
                                                    <th>Nomor HP</th>
                                                    <th>Tanggal Keluhan</th>
                                                    <th>Isi Keluhan</th>
                                                    <th>Gambar Bukti (jika ada)</th>
                                                    <th>Penanganan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead> 
                                            <tbody>
                                                <?php
                                                $database = new Database();
                                                $db = $database->getConnection();

                                                $sqlDaftar = "SELECT * FROM keluhan WHERE no_ds='$no_ds'";
                                                $resultDaftar = $db->prepare($sqlDaftar);
                                                $resultDaftar->execute();
                                                
                                                while ($data = $resultDaftar->fetch(PDO::FETCH_ASSOC)) {
                                                    $noreg = $data['no_reg'];
                                                    $id = $data['no_keluhan'];
                                                ?>
                                                <tr>
                                                    <td align="center"><?= $no_ds ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['alamat'] ?></td>
                                                    <td><?= $data['no_hp'] ?></td>
                                                    <td align='center'><?= $data['tgl_keluhan'] ?></td>
                                                    <td align='center'><?= $data['keluhan'] ?></td>
                                                    <?php 
                                                    if($data['img_keluhan'] == "tidak tersedia"){
                                                        echo "<td class='text-danger text-center'>Tidak tersedia</td>";
                                                    }elseif($data['img_keluhan'] !== "tidak tersedia"){
                                                    ?>
                                                    <td><?= "<img src='img-keluhan/".$data['img_keluhan']."'style='width:100px;'>" ?></td>
                                                    <?php } ?>
                                                    <td align="center">
                                                        <?php 
                                                        if($data['penanganan'] == ''){
                                                            echo "<p class='text-danger'>Belum tersedia</p>";
                                                        }else{
                                                        ?>
                                                        <a href="../keluhan/report/report-penanganan.php?id=<?= $id ?>" class="btn btn-sm btn-warning text-bold" target="_blank">
                                                            <i class="bi bi-printer mr-2"></i>HASIL
                                                        </a>
                                                        <?php } ?>
                                                    </td>
                                                    <td align="center">
                                                        <a href="edit-keluhan.php?no_ds=<?= $no_ds; ?>" class="btn btn-sm btn-success">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                        <a href="hapus-keluhan.php?no_ds=<?= $no_ds; ?>" onclick="return confirm('Yakin ingin menghapus keluhan?')" class="btn btn-sm btn-danger">
                                                            <i class="bi bi-trash-fill"></i>
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
    include_once ("../partials-otheruser/importjs.php");
    include_once ("../partials-otheruser/scriptsdatatables.php");
    ?>

    

</body>
</html>
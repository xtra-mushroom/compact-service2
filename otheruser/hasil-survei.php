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

    $activeSurvei = "active";

    if($_SESSION['jenis_kel'] == 'Laki-Laki'){
        $image = "avatar.png";
    }elseif($_SESSION['jenis_kel'] == 'Perempuan'){
        $image = "avatar2.png";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials-otheruser/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once ("../partials-otheruser/navbar.php") ?>
        <?php include_once ("../partials-otheruser/sidebar.php") ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-12 text-center">
                            <h1 class="d-inline">Hasil Survei Pemasangan</h1>
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
                                <div class="card-body mt-1">
                                    <?php 
                                    $nolog = $_SESSION['username'];
                                    $noreg = $_SESSION['noreg'];
                                    $sql = "SELECT * FROM pendaftaran WHERE no_reg='$noreg'";
                                    $result = $conn->query($sql);
                                          
                                    $data = $result->fetch_assoc();
                                    $row = mysqli_num_rows($result);
                                    if($row > 0){
                                        $waktuSurvei = $data['tgl_survei'];
                                    ?>
                                    <div class="card" style="max-width: 540px;">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <img src="../assets/images/pdf-logo.jpg" class="card-img" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <a href="../perencanaan/report/hasil-surveibahan.php?no_reg=<?= $noreg ?>" class="text-primary" target="_blank">
                                                        <h5 class="card-title text-bold">Survei Bahan</h5>
                                                    </a>
                                                    <p class="card-text text-secondary" style="font-size:.9em">Rincian kebutuhan biaya untuk pemasangan sambungan baru</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="max-width: 540px;">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <img src="../assets/images/pdf-logo.jpg" class="card-img" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <a href="../perencanaan/report/hasil-surveigoltar.php?no_reg=<?= $noreg ?>" class="text-primary" target="_blank">
                                                        <h5 class="card-title text-bold">Survei Klasifikasi Tarif</h5>
                                                    </a>
                                                    <p class="card-text text-secondary" style="font-size:.9em">Hasil pengukuran data untuk menentukan klasifikasi tarif pelanggan</p>
                                                    <!-- <p class="card-text"><small class="text-muted">Diposting 19 menit lalu</small></p> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                    }else{?>
                                    <div class="card-body mx-auto text-center">
                                        <h4 class="col-8 mx-auto">Detail hasil survei pemasangan beserta biaya dapat dilihat di sini apabila teknisi telah selesai melakukan survei</h4>
                                    </div>
                                    <?php } ?> 
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php include_once ("../partials-otheruser/importjs.php") ?>
</body>
</html>
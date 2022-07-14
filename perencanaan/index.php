<?php
session_start();
include_once ("../functions.php");

if($_SESSION['peran'] !== "TEKNISI"){
    header("location: ../logsystem/index.php");
    exit;
}

if (!isset($_SESSION['signin'])){
    header("location: ../logsystem/index.php");
}

$activeHome = "active";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials-teknisi/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once ("../partials-teknisi/navbar.php") ?>
        <?php include_once ("../partials-teknisi/sidebar.php") ?>

        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="jumbotron bg-white" style="border-radius:0; height:200px; padding-top:20px;">
                                    <h1 class="display-6 text-center">Selamat Datang!</h1>
                                    <p class="lead text-center">Compact Service PDAM Kabupaten Balangan mencakup seluruh rangkaian pelayanan dalam satu aplikasi</p>
                                    <hr class="my-4">
                                    <!-- <p class="text-secondary ml-3">Pertama kali menggunakan Compact Service?</p>
                                    <a class="btn btn-primary text-secondary ml-3" href="panduan/index.php" role="button">Pelajari Panduan</a> -->
                                </div>
                                <div class="card-body mx-auto text-center">
                                    <h4>Silahkan cek antrian survei dan isi form hasil survei</h4>  
                                </div>

                                <div class="card-footer text-center pt-4">
                                    <p class="text-secondary"><b>Copyright</b> &copy; <b>2022 ~ <em style="color:#b8b2b2">Version 0.2.0</em></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>

    <?php include_once ("../partials-teknisi/importjs.php") ?>
</body>
</html>
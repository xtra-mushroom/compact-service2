<?php
session_start();
include_once ("../functions.php");

if($_SESSION['peran'] == !"KEUANGAN"){
    header("Location: ../logsystem/index.php");
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
    <?php include_once ("../partials-pengesahan/head.php") ?>
</head>
<?php include_once ("../database.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once ("../partials-pengesahan/navbar.php") ?>
        <?php include_once ("../partials-pengesahan/sidebar.php") ?>

        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="jumbotron bg-white" style="border-radius:0; height:160px; padding-top:20px;">
                                    <h1 class="display-6 text-center">Selamat Datang!</h1>
                                    <p class="lead text-center">Compact Service PDAM Kabupaten Balangan mencakup seluruh rangkaian pelayanan dalam satu aplikasi</p>
                                    <hr class="mt-4">
                                </div>
                                <div class="card-body text-center">
                        
                                    <h4>Informasi</h4>
                                    <h6 class="text-secondary">Silahkan cek antrian pengesahan</h6>
                                </div>
                                <div class="card-footer text-center pt-4 mt-lg-4">
                                    <p class="text-secondary"><b>Copyright</b> &copy; <b>2022 ~ <em style="color:#b8b2b2">Version 0.2.0</em></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>

    <?php include_once ("../partials-pengesahan/importjs.php") ?>
</body>
</html>
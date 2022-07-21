<?php
session_start();
include_once "../functions.php";

if($_SESSION['peran'] == !"PIMPINAN"){
    header("Location: ../logsystem/index.php");
    exit;
}

if (!isset($_SESSION['signin'])){
    header("location: ../logsystem/index.php");
}

$activePengesahan = "active";
?>

<!DOCTYPE html>
<head>
    <?php
    include_once ("../partials-pimpinan/head.php");
    include_once ("../partials-pimpinan/cssdatatables.php");
    ?> 
</head>
<?php include_once ("../database.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>

    <div class="wrapper">
        <?php include_once ("../partials-pimpinan/navbar.php") ?>
        <?php include_once ("../partials-pimpinan/sidebar.php") ?>

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
                            <h1 class="d-inline mr-4">Buat Pengesahan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Antrian Pengesahan</li>
                                <li class="breadcrumb-item">Buat Pengesahan</li>
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
                                    <h5 class="mb-4 text-center">Generate QRcode Pengesahan</h5>
                                    <form method="post" action="">
                                        <fieldset>
                                            <p>
                                                <label for="qr_code_data">Masukkan Konten Data</label>
                                                <input type="text" name="qr_code_data" id="qr_code_data" minlength="4" 	value="<?php $val=isset($_POST['generate']) ? $_POST['qr_code_data'] : ""; echo $val; ?>">
                                            </p>
                                            <p>
                                                <button type="submit" name="generate" class="btn btn-dark">GENERATE</button>
                                            </p>
                                        </fieldset>
                                    </form>
                                    <?php
                                    if (isset($_POST['generate'])){
                                        $noreg = $_GET['no_reg'];
                                        $queryAmbil = "SELECT p.no_reg,  ad.no_reg, ad.nama FROM pendaftaran as p INNER JOIN antri_daftar as ad ON p.no_reg=ad.no_reg WHERE ad.no_reg='$noreg'";
                                        $resultAmbil = mysqli_query($conn, $queryAmbil);
                                        $dataAmbil = mysqli_fetch_assoc($resultAmbil);

                                        include "../libraries/php-qrcode-library/qrlib.php"; 
                                        /*create folder*/
                                        $tempdir="qr-pengesahan/";
                                        if (!file_exists($tempdir))
                                        mkdir($tempdir, 0755);
                                        $file_name=date("Ymd").rand().".png";	
                                        $file_path = $tempdir.$file_name;

                                        $content = "Diperiksa Oleh : Drajat Windarto, SE \nJabatan : Kabag Administrasi & Keuangan \n".date('d-m-Y');
                                        
                                        QRcode::png($content, $file_path, "H", 6, 4);
                                        /* param (1)qrcontent,(2)filename,(3)errorcorrectionlevel,(4)pixelwidth,(5)margin */

                                        $sql = "UPDATE pendaftaran SET pengesahan='$file_path' WHERE no_reg='$noreg'";
                                        mysqli_query($conn, $sql);
                                        
                                        echo "<p class='result text-success text-bold'>PENGESAHAN BERHASIL <span class='ml-2 text-primary'><a href='antrian-pengesahan.php'>Kembali ke halaman antrian</a></span></p>";
                                        echo "<p><img src='".$file_path."' width='200px' /></p>";
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

    <?php
    include_once ("../partials-pimpinan/importjs.php");
    include_once ("../partials-pimpinan/scriptsdatatables.php");
    ?>

    <script>
        $(function () {
        $('[data-toggle="popover"]').popover()
        })
    </script>

</body>

</html>
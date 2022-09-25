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

    $activeGantiPW = "active";

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
    <!-- sweetalert css -->
    <link rel="stylesheet" href="../libraries/sweetalert2/dist/sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>
    <div class="wrapper">
        <?php include_once ("../partials-otheruser/navbar.php") ?>
        <?php include_once ("../partials-otheruser/sidebar.php") ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-12 text-center">
                            <h1 class="d-inline">Ganti Password</h1>
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
                                    $no_ds = $_SESSION['no_log'];
                                    $sql = "SELECT ad.passwd_pelanggan, p.nama, ad.no_log FROM antri_daftar as ad INNER JOIN pelanggan as p ON p.no_ds=ad.no_log WHERE ad.no_log='$no_ds'";
                                    $result = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    ?>
                                    <form method="post" action="">
                                        <div class="form-group row mt-3">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor Sambungan</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="no_ds" name="no_ds" value="<?= $no_ds ?>" readonly>
                                            </div>
                                        </div>
                                        <p class="text-danger" style="font-size:.9em">Apabila anda belum pernah mengganti password, maka password lama adalah nomor sambungan</p>
                                        <div class="form-group row mt-3">
                                            <label for="pw_lama" class="col-sm-2 col-form-label">Password Lama</label>
                                            <div class="col-sm-4">
                                                <input type="password" class="form-control form-control-sm border-secondary" id="pw_lama" name="pw_lama" requierd>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pw_baru" class="col-sm-2 col-form-label">Password Baru</label>
                                            <div class="col-sm-4">
                                                <input type="password" class="form-control form-control-sm border-secondary" id="pw_baru" name="pw_baru" required>
                                            </div>
                                        </div>
                                        <div class="col-8 float-right mt-3 mb-4">
                                            <span class="col-sm-5">
                                                <button type="submit" name="save" class="btn" style="background:#046ea7; color:white;">SIMPAN</button>
                                            </span>
                                        </div>
                                    </form>
                                    <?php 
                                    if(md($_POST['pw_lama']) == $data['passwd_pelanggan']){
                                        $verify_pw = true;
                                    }else{
                                        $verify_pw = false;
                                    }

                                    if(isset($_POST['save']) AND $verify_pw == true){  
                                        $ds = $_POST['no_ds'];  
                                        $pw_baru = md5($_POST['pw_baru']);

                                        $sql = "UPDATE antri_daftar SET passwd_pelanggan='$pw_baru' WHERE no_log='$no_ds'";
                                        $updatePW = mysqli_query($conn, $sql);

                                        echo "<script>
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: 'Ubah Password Berhasil!',
                                            showConfirmButton: true
                                        })
                                        </script>";
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

    <?php include_once ("../partials-otheruser/importjs.php") ?>
</body>
</html>
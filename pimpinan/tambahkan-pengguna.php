<?php
session_start();
include_once "../functions.php";

if($_SESSION['peran'] !== "PIMPINAN"){
    header("Location: ../logsystem/index.php");
    exit;
}

if (!isset($_SESSION['signin'])){
    header("location: ../logsystem/index.php");
}

$activeTambahUser = "active";
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
                            <h1 class="d-inline mr-4">Tambahkan Pengguna</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Tambahkan Pengguna</li>
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
                                    <form method="post" action="">
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama" name="nama" autocomplete="off" autofocus required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="jenis_kel" name="jenis_kel" required>
                                                    <option class="text-secondary" value="" selected>---</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="username" name="username" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-4">
                                                <input type="password" class="form-control form-control-sm border-secondary" id="password" name="password" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="peran" class="col-sm-2 col-form-label">Peran</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="peran" name="peran" required>
                                                    <option class="text-secondary" value="" selected>---</option>
                                                    <option value="PIMPINAN">Pimpinan</option>
                                                    <option value="TEKNISI">Teknisi (Trandis / Perencana)</option>
                                                    <option value="PEGAWAI">Pegawai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer col-6 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark float-right ml-3">SIMPAN</button>
                                        </div>
                                    </form>
                                    <?php
                                    if(isset($_POST['submit'])){
                                        $nama = $_POST['nama'];
                                        $jenisKel = $_POST['jenis_kel'];
                                        $uname = $_POST['username'];
                                        $passwd = md5($_POST['password']); 
                                        $peran = $_POST['peran'];

                                        $sql = "INSERT INTO login VALUES (NULL, '$nama', '$jenisKel', '$uname', '$passwd', '$peran', NULL)";
                                        $addUser = mysqli_query($conn, $sql);
                                        
                                        if($addUser == true){
                                            echo "<script>
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'success',
                                                title: 'Pengguna baru berhasil ditambahkan!',
                                                showConfirmButton: true
                                            })
                                            </script>";
                                        }elseif($addUser == false){
                                            echo "<script>
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'error',
                                                title: 'Gagal menambahkan pengguna baru!',
                                                showConfirmButton: true
                                            })
                                            </script>";
                                        }
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
<?php 
require "../functions.php";
$openDaftar = "menu-open";
$activeDaftar = "active"; $activeInputDaftar = "active";
?>

<!DOCTYPE html>
<head>
    <?php include_once ("../partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>

    <div class="wrapper">
        <!-- Navbar right-->
        <?php include_once ("../partials/navbar.php") ?>

        <!-- Sidebar -->
        <?php include_once ("../partials/sidebar.php") ?>

        <!-- Content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1 class="d-inline mr-4">Input Data Pendaftaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pendaftaran</li>
                                <li class="breadcrumb-item">Input Data</li>
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
                                <div class="card-body ml-5 mt-3">
                                    <!-- di sini form pendaftaran -->
                                    <form method="post" action="">
                                        <div class="form-group row">
                                            <label for="tgl_daftar" class="col-sm-2 col-form-label">Tanggal Pendaftaran</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl_daftar" name="tgl_daftar" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_ktp" class="col-sm-2 col-form-label">Nomor KTP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ktp" name="no_ktp" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama" name="nama" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="jenis_kel"
                                                    name="jenis_kel">
                                                    <option class="text-secondary" selected>---</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat" name="alamat" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="kecamatan"
                                                    name="kecamatan">
                                                    <option class="text-secondary" value="">---</option>
                                                    <?php
                                                    $sql = "SELECT * FROM kecamatan";
                                                    $result = $conn->query($sql); 
                                                    // var_dump($result);
                                                    
                                                    while($data = $result->fetch_assoc()){
                                                        echo "<option value='".$data['id']."'>".$data['nama']."</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="desa" class="col-sm-2 col-form-label">Desa</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="desa" name="desa">
                                                    <option class="text-secondary">---</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp" name="no_hp" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="wil" class="col-sm-2 col-form-label">Wilayah / Cabang</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="wil" name="wil">
                                                    <option class="text-secondary" value="">---</option>
                                                    <option value="Paringin 1">01 Paringin 1</option>
                                                    <option value="Paringin 2">02 Paringin 2</option>
                                                    <option value="Awayan">03 Awayan</option>
                                                    <option value="Lampihong">04 Lampihong</option>
                                                    <option value="Halong">05 Halong</option>
                                                    <option value="Juai">06 Juai</option>
                                                    <option value="Batumandi">07 Batumandi</option>
                                                    <option value="Paringin Selatan">08 Paringin Selatan</option>
                                                    <option value="Tebing Tinggi">09 Tebing Tinggi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer col-6 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark">SIMPAN</button>
                                        </div>
                                    </form>
                                    <?php 
                                    if(isset($_POST["submit"])){

                                        if($_POST["wil"] == "Paringin 1"){
                                            $idWil = "01";
                                        }elseif($_POST["wil"] == "Paringin 2"){
                                            $idWil = "02";
                                        }elseif($_POST["wil"] == "Awayan"){
                                            $idWil = "03";
                                        }elseif($_POST["wil"] == "Lampihong"){
                                            $idWil = "04";
                                        }elseif($_POST["wil"] == "Halong"){
                                            $idWil = "05";
                                        }elseif($_POST["wil"] == "Juai"){
                                            $idWil = "06";
                                        }elseif($_POST["wil"] == "Batumandi"){
                                            $idWil = "07";
                                        }elseif($_POST["wil"] == "Paringin Selatan"){
                                            $idWil = "08";
                                        }elseif($_POST["wil"] == "Tebing Tinggi"){
                                            $idWil = "09";
                                        }

                                        // nomor pendaftaran auto_increment
                                        $no_ds = ""; // nomor sambungan hanya akan digenerate saat pemasangan
                                        $tgl = $_POST['tgl_daftar'];
                                        $ktp = $_POST['no_ktp'];
                                        $nama = $_POST['nama'];
                                        $jenisKel = $_POST['jenis_kel'];
                                        $alamat = $_POST['alamat'];
                                        $kec = $_POST['kecamatan'];
                                        $desa = $_POST['desa'];
                                        $hp = $_POST["no_hp"];
                                        $idWilayah = $idWil;
                                        $wilayah = $_POST["wil"];
                                    
                                        $query = "INSERT INTO pendaftaran
                                                    VALUES
                                                    (null, '$no_ds', '$tgl', '$ktp', '$nama', '$jenisKel', '$alamat', '$kec', '$desa', '$hp', '$idWilayah', '$wilayah', 20000);";
                                    
                                        $mysqlPendaftaran = mysqli_query($conn, $query);
                                        // var_dump(mysqli_error($conn));
                                    
                                        if($mysqlPendaftaran == true){
                                            echo "<script>
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'success',
                                                title: 'Data Berhasil Tersimpan!',
                                                showConfirmButton: false,
                                                timer: 1600
                                            });
                                            </script>";
                                        }else{
                                            echo "<script>
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'error',
                                                title: 'Data Gagal Tersimpan! Nomor KTP Sudah Terdaftar',
                                                showConfirmButton: true
                                            });
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

    <script src="script.js"></script>

    <?php include_once ("../partials/importjs.php") ?>

</body>

</html>
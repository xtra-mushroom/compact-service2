<?php 
require_once "../functions.php";
$query = query("SELECT * FROM pendaftaran");
$no = $_GET['no_pend'];
$sql = "SELECT * FROM pendaftaran where no_pend='$no'";
$pendaftaran = $conn->query($sql)->fetch_assoc();

$openDaftar = "menu-open";
$activeDaftar = "active"; $activeCariDaftar = "active";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../sweetalert2/dist/sweetalert2.min.js"></script>

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
                            <h1 class="d-inline mr-4">Edit Data Pendaftaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pendaftaran</li>
                                <li class="breadcrumb-item active">Cari Data</li>
                                <li class="breadcrumb-item">Edit Data</li>
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
                                <div class="card-body ml-5 mt-1">
                                    <!-- di sini form pendaftaran -->
                                    <?php 
                                    $no = $_GET['no_pend'];
                                    $sql = "SELECT * FROM pendaftaran where no_pend='$no'";
                                    $result = $conn->query($sql);
                                                
                                    while($data = $result->fetch_assoc()){
                                    ?>
                                    
                                    <form method="post" action="update.php">
                                        <div class="form-group row mt-3">
                                            <label for="no_pend" class="col-sm-2 col-form-label">Nomor Pendaftaran</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_pend" name="no_pend" value="<?php echo $data['no_pend']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_daftar" class="col-sm-2 col-form-label">Tanggal Pendaftaran</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl_daftar" name="tgl_daftar" value="<?php echo $data['tgl_daftar']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_ktp" class="col-sm-2 col-form-label">Nomor KTP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ktp" name="no_ktp" value="<?php echo $data['no_ktp']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp" name="no_hp" value="<?php echo $data['no_hp']; ?>">
                                            </div>
                                        </div>
    
                                        <div class="form-group row">
                                            <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="kecamatan"
                                                    name="kecamatan">
                                                    <option class="text-secondary" value="">---</option>
                                                    <?php
                                                    $sql1 = "SELECT * FROM kecamatan";
                                                    $result1 = $conn->query($sql1);
                                                    while($kecamatan = $result1->fetch_assoc()){
                                                        if ($pendaftaran['kecamatan'] == $kecamatan['id']) {
                                                            echo "<option value='".$kecamatan['id']."' selected>".$kecamatan['nama']."</option>";
                                                        } else {
                                                            echo "<option value='".$kecamatan['id']."'>".$kecamatan['nama']."</option>";
                                                        }
                                                    }  
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="desa" class="col-sm-2 col-form-label">Desa</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="desa" name="desa" value="<?php echo $data['desa']; ?>">
                                                    <option class="text-secondary">---</option>
                                                    <?php
                                                    
                                                    $sql = "SELECT * FROM desa";
                                                    $result = $conn->query($sql);
                                                    while($desa = $result->fetch_assoc()){
                                                        if ($pendaftaran['desa'] == $desa['id']) {
                                                            echo "<option value='".$desa['id']."' selected>".$desa['nama']."</option>";
                                                        } else {
                                                            echo "<option value='".$desa['id']."'>".$desa['nama']."</option>";
                                                        }
                                                    }
                                                    
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="wil" class="col-sm-2 col-form-label">Wilayah</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="wil" name="wil" value="">
                                                    <option class="text-secondary" value="">---</option>
                                                    <?php
                                                    $wil1 = "";
                                                    $wil2 = "";
                                                    $wil3 = "";
                                                    $wil4 = "";
                                                    $wil5 = "";
                                                    $wil6 = "";
                                                    $wil7 = "";
                                                    $wil8 = "";
                                                    $wil9 = "";

                                                    if ($pendaftaran['wil'] == "01") {
                                                        $wil1 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "02") {
                                                        $wil2 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "03") {
                                                        $wil3 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "04") {
                                                        $wil4 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "05") {
                                                        $wil5 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "06") {
                                                        $wil6 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "07") {
                                                        $wil7 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "08") {
                                                        $wil8 = "selected";
                                                    } elseif ($pendaftaran['wil'] == "09") {
                                                        $wil9 = "selected";
                                                    }
                                                    ?>
                                                    <option value="01" <?php echo " " . $wil1 ?>>01</option>
                                                    <option value="02" <?php echo " " . $wil2 ?>>02</option>
                                                    <option value="03" <?php echo " " . $wil3 ?>>03</option>
                                                    <option value="04" <?php echo " " . $wil4 ?>>04</option>
                                                    <option value="05" <?php echo " " . $wil5 ?>>05</option>
                                                    <option value="06" <?php echo " " . $wil6 ?>>06</option>
                                                    <option value="07" <?php echo " " . $wil7 ?>>07</option>
                                                    <option value="08" <?php echo " " . $wil8 ?>>08</option>
                                                    <option value="09" <?php echo " " . $wil9 ?>>09</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer col-6 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark">SIMPAN</button>
                                        </div>
                                    </form>
                                    <?php } ?>    
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
<?php 
require_once "../functions.php";
$query = query("SELECT * FROM pemasangan");
$no = $_GET['no_ds'];
$sql = "SELECT * FROM pemasangan where no_ds='$no'";
$pemasangan = $conn->query($sql)->fetch_assoc();

$openPasang = "menu-open";
$activePasang = "active"; $activeCariPasang = "active";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once ("../partials/navbar.php") ?>

        <!-- Sidebar -->
        <?php include_once ("../partials/sidebar.php") ?>

        <!-- Content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1>Edit Data Pemasangan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pemasangan</li>
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
                                <div class="card-body ml-5 mt-3">
                                    <!-- di sini form pemasangan -->
                                    <?php 
                                    $no = $_GET['no_ds'];
                                    $sql = "SELECT * FROM pemasangan where no_ds='$no'";
                                    $result = $conn->query($sql);
                                                
                                    while($data = $result->fetch_assoc()){
                                    ?>

                                    <form action="update.php" method="post">
                                        <div class="form-group row">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor Sambungan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ds"
                                                name="no_ds" value="<?php echo $data['no_ds']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_pasang" class="col-sm-2 col-form-label">Tanggal Pemasangan</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl_pasang" name="tgl_pasang">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_ktp" class="col-sm-2 col-form-label">Nomor KTP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ktp"
                                                name="no_ktp" value="<?php echo $data['no_ktp']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama"
                                                name="nama" value="<?php echo $data['nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="jenis_kel"
                                                    name="jenis_kel" value="">
                                                    <option class="text-secondary" selected>---</option>
                                                    <?php 
                                                    $male = "";
                                                    $female = "";
                                                    if($pemasangan['jenis_kel'] == "Laki-Laki"){
                                                        $male = "selected";
                                                    } elseif ($pemasangan['jenis_kel'] == "Perempuan"){
                                                        $female = "selected";
                                                    }
                                                    ?>
                                                    <option value="Laki-Laki" <?php echo " " . $male; ?>>Laki-Laki</option>
                                                    <option value="Perempuan" <?php echo " " . $female; ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tmpt_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="tmpt_lahir"
                                                name="tmpt_lahir" value="<?php echo $data['tmpt_lahir']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="tgl_lahir" name="tgl_lahir" placeholder="hh/bb/tttt" value="<?php echo $data['tgl_lahir'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status_kep_rumah" class="col-sm-2 col-form-label">Kepemilikan Rumah</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="status_kep_rumah"
                                                    name="status_kep_rumah" value="<?php echo $data['status_kep_rumah']; ?>">
                                                    <option class="text-secondary" selected>---</option>
                                                    <?php 
                                                    $milikSendiri = "";
                                                    $sewa = "";
                                                    $milikKel = "";
                                                    $lainnya = "";

                                                    if($pemasangan['status_kep_rumah'] == "Milik sendiri"){
                                                        $milikSendiri = "selected";
                                                    } elseif($pemasangan['status_kep_rumah'] == "Sewa"){
                                                        $sewa = "selected";
                                                    } elseif($pemasangan['status_kep_rumah'] == "Milik keluarga"){
                                                        $milikKel = "selected";
                                                    } elseif($pemasangan['status_kep_rumah'] == "Lain-lain"){
                                                        $lainnya = "selected";
                                                    }
                                                    ?>
                                                    <option value="Milik sendiri" <?php echo " " . $milikSendiri; ?>>Milik sendiri</option>
                                                    <option value="Sewa" <?php echo " " . $sewa; ?>>Sewa</option>
                                                    <option value="Milik keluarga" <?php echo " " . $milikKel; ?>>Milik keluarga</option>
                                                    <option value="Lain-lain" <?php echo " " . $lainnya; ?>>Lain-lain</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jumlah_jiwa" class="col-sm-2 col-form-label">Jumlah Jiwa</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="jumlah_jiwa"
                                                name="jumlah_jiwa" value="<?php echo $data['jumlah_jiwa']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pln" class="col-sm-2 col-form-label">PLN</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="pln" name="pln" value="<?php echo $data['pln']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat"
                                                name="alamat" value="<?php echo $data['alamat']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="kecamatan"
                                                    name="kecamatan" value="<?php echo $data['kecamatan']; ?>">
                                                    <option class="text-secondary" value="">---</option>
                                                    <?php
                                                    $sql1 = "SELECT * FROM kecamatan";
                                                    $result1 = $conn->query($sql1);
                                                    while($kecamatan = $result1->fetch_assoc()){
                                                        if ($pemasangan['kecamatan'] == $kecamatan['id']) {
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
                                                    $sql1 = "SELECT * FROM desa";
                                                    $result1 = $conn->query($sql1);
                                                    while($desa = $result1->fetch_assoc()){
                                                        if ($pemasangan['desa'] == $desa['id']) {
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
                                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp"
                                                name="no_hp" value="<?php echo $data['no_hp']; ?>">
                                            </div>
                                        </div>
                                        <hr>
                                        <h5 class="mb-3">Cabang & Biaya</h5>
                                        <div class="form-group row">
                                            <label for="cabang" class="col-sm-2 col-form-label">Cabang</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="cabang" name="cabang" value="">
                                                    <option class="text-secondary" value="">---</option>
                                                    <?php
                                                    $par1 = "";
                                                    $par2 = "";
                                                    $awayan = "";
                                                    $halong = "";
                                                    $lampihong = "";
                                                    $juai = "";
                                                    $btm = "";
                                                    $parsel = "";
                                                    $tTinggi = "";

                                                    if ($pemasangan['cabang'] == "01") {
                                                        $par1 = "selected";
                                                    } elseif ($pemasangan['cabang'] == "02") {
                                                        $par2 = "selected";
                                                    } elseif ($pemasangan['cabang'] == "03") {
                                                        $awayan = "selected";
                                                    } elseif ($pemasangan['cabang'] == "04") {
                                                        $lampihong = "selected";
                                                    } elseif ($pemasangan['cabang'] == "05") {
                                                        $halong = "selected";
                                                    } elseif ($pemasangan['cabang'] == "06") {
                                                        $juai = "selected";
                                                    } elseif ($pemasangan['cabang'] == "07") {
                                                        $btm = "selected";
                                                    } elseif ($pemasangan['cabang'] == "08") {
                                                        $parsel = "selected";
                                                    } elseif ($pemasangan['cabang'] == "09") {
                                                        $tTinggi = "selected";
                                                    }
                                                    ?>
                                                    <option value="01" <?php echo " " . $par1; ?>>Paringin 1</option>
                                                    <option value="02" <?php echo " " . $par2; ?>>Paringin 2</option>
                                                    <option value="03" <?php echo " " . $awayan; ?>>Awayan</option>
                                                    <option value="04" <?php echo " " . $lampihong; ?>>Lampihong</option>
                                                    <option value="05" <?php echo " " . $halong; ?>>Halong</option>
                                                    <option value="06" <?php echo " " . $juai; ?>>Juai</option>
                                                    <option value="07" <?php echo " " . $btm; ?>>Batumandi</option>
                                                    <option value="08" <?php echo " " . $parsel; ?>>Paringin Selatan</option>
                                                    <option value="09" <?php echo " " . $tTinggi; ?>>Tebing Tinggi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gol_tarif" class="col-sm-2 col-form-label">Golongan Tarif</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="gol_tarif"
                                                    name="gol_tarif" value="">
                                                    <option value="">---</option>
                                                    <?php
                                                    $gol1 = "";
                                                    $gol2 = "";
                                                    $gol3 = "";
                                                    $gol4 = "";
                                                    $gol5 = "";
                                                    $gol6 = "";
                                                    $gol7 = "";
                                                    $gol8 = "";
                                                    $gol9 = "";
                                                    $gol10 = "";

                                                    if ($pemasangan['gol_tarif'] == "NN") {
                                                        $gol1 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "NU") {
                                                        $gol2 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "SK") {
                                                        $gol3 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "SU") {
                                                        $gol4 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "R1") {
                                                        $gol5 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "R2") {
                                                        $gol6 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "R3") {
                                                        $gol7 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "IP") {
                                                        $gol8 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "NK") {
                                                        $gol9 = "selected";
                                                    } elseif ($pemasangan['gol_tarif'] == "NB") {
                                                        $gol10 = "selected";
                                                    }
                                                    ?>
                                                    <option value="NN" <?php echo " " . $gol1 ?>>NN</option>
                                                    <option value="NU" <?php echo " " . $gol2 ?>>NU</option>
                                                    <option value="SK" <?php echo " " . $gol3 ?>>SK</option>
                                                    <option value="SU" <?php echo " " . $gol4 ?>>SU</option>
                                                    <option value="R1" <?php echo " " . $gol5 ?>>R1</option>
                                                    <option value="R2" <?php echo " " . $gol6 ?>>R2</option>
                                                    <option value="R3" <?php echo " " . $gol7 ?>>R3</option>
                                                    <option value="IP" <?php echo " " . $gol8 ?>>IP</option>
                                                    <option value="NK" <?php echo " " . $gol9 ?>>NK</option>
                                                    <option value="NB" <?php echo " " . $gol10 ?>>NB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="biaya"
                                                name="biaya" value="<?php echo $data['biaya']; ?>">
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
            </div>
        </section>
    </div>
    
    <script src="script.js"></script>

    <?php include_once ("../partials/importjs.php") ?>
</body>
</html>
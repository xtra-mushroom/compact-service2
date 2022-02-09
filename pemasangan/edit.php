<?php 
require_once "../functions.php";


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
                                    $sql = "SELECT pemasangan.*, pendaftaran.nama, pendaftaran.no_ktp, pendaftaran.jenis_kel, pendaftaran.alamat, pendaftaran.no_hp, pendaftaran.kecamatan, pendaftaran.desa, pendaftaran.wil, pelanggan.ttl
                                            from pemasangan INNER JOIN pendaftaran ON pemasangan.no_ds = pendaftaran.no_ds
                                            INNER JOIN pelanggan ON pelanggan.no_ds = pemasangan.no_ds WHERE pemasangan.no_ds='$no'";
                                    $result = $conn->query($sql);
                                                
                                    while($data = $result->fetch_assoc()){
                                    ?>

                                    <form action="update.php" method="post">
                                        <div class="form-group row">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor Sambungan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ds"
                                                name="no_ds" value="<?= $data['no_ds']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_pasang" class="col-sm-2 col-form-label">Tanggal Pemasangan</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tgl_pasang" name="tgl_pasang" value="<?= $data['tgl_pasang']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_ktp" class="col-sm-2 col-form-label">Nomor KTP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ktp"
                                                name="no_ktp" value="<?= $data['no_ktp']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama"
                                                name="nama" value="<?= $data['nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="jenis_kel"
                                                    name="jenis_kel" value="">
                                                    <option class="text-secondary" selected>---</option>
                                                    <?php 
                                                    if($data['jenis_kel'] == "Laki-Laki"){
                                                        $male = "selected";
                                                    } elseif ($data['jenis_kel'] == "Perempuan"){
                                                        $female = "selected";
                                                    }
                                                    ?>
                                                    <option value="Laki-Laki" <?= " " . $male; ?>>Laki-Laki</option>
                                                    <option value="Perempuan" <?= " " . $female; ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ttl" class="col-sm-2 col-form-label">TTL</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="ttl"
                                                name="ttl" value="<?= $data['ttl']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status_kep_rumah" class="col-sm-2 col-form-label">Kepemilikan Rumah</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="status_kep_rumah"
                                                    name="status_kep_rumah" value="<?= $data['status_kep_rumah']; ?>">
                                                    <option class="text-secondary" selected>---</option>
                                                    <?php 
                                                    if($data['status_kep_rumah'] == "Milik sendiri"){
                                                        $milikSendiri = "selected";
                                                    } elseif($data['status_kep_rumah'] == "Sewa"){
                                                        $sewa = "selected";
                                                    } elseif($data['status_kep_rumah'] == "Milik keluarga"){
                                                        $milikKel = "selected";
                                                    } elseif($data['status_kep_rumah'] == "Lain-lain"){
                                                        $lainnya = "selected";
                                                    }
                                                    ?>
                                                    <option value="Milik sendiri" <?= " " . $milikSendiri; ?>>Milik sendiri</option>
                                                    <option value="Sewa" <?= " " . $sewa; ?>>Sewa</option>
                                                    <option value="Milik keluarga" <?= " " . $milikKel; ?>>Milik keluarga</option>
                                                    <option value="Lain-lain" <?= " " . $lainnya; ?>>Lain-lain</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jumlah_jiwa" class="col-sm-2 col-form-label">Jumlah Jiwa</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="jumlah_jiwa"
                                                name="jumlah_jiwa" value="<?= $data['jumlah_jiwa']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pln" class="col-sm-2 col-form-label">PLN</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="pln" name="pln" value="<?= $data['pln']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat"
                                                name="alamat" value="<?= $data['alamat']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="kecamatan"
                                                    name="kecamatan" value="<?= $data['kecamatan']; ?>">
                                                    <option class="text-secondary" value="">---</option>
                                                    <?php
                                                    $sql1 = "SELECT * FROM kecamatan";
                                                    $result1 = $conn->query($sql1);
                                                    while($kecamatan = $result1->fetch_assoc()){
                                                        if ($data['kecamatan'] == $kecamatan['id']) {
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
                                                        if ($data['desa'] == $desa['id']) {
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
                                                name="no_hp" value="<?= $data['no_hp']; ?>">
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
                                                    if ($data['cabang'] == "01") {
                                                        $par1 = "selected";
                                                    } elseif ($data['cabang'] == "02") {
                                                        $par2 = "selected";
                                                    } elseif ($data['cabang'] == "03") {
                                                        $awayan = "selected";
                                                    } elseif ($data['cabang'] == "04") {
                                                        $lampihong = "selected";
                                                    } elseif ($data['cabang'] == "05") {
                                                        $halong = "selected";
                                                    } elseif ($data['cabang'] == "06") {
                                                        $juai = "selected";
                                                    } elseif ($data['cabang'] == "07") {
                                                        $btm = "selected";
                                                    } elseif ($data['cabang'] == "08") {
                                                        $parsel = "selected";
                                                    } elseif ($data['cabang'] == "09") {
                                                        $tTinggi = "selected";
                                                    }
                                                    ?>
                                                    <option value="01" <?= " " . $par1; ?>>Paringin 1</option>
                                                    <option value="02" <?= " " . $par2; ?>>Paringin 2</option>
                                                    <option value="03" <?= " " . $awayan; ?>>Awayan</option>
                                                    <option value="04" <?= " " . $lampihong; ?>>Lampihong</option>
                                                    <option value="05" <?= " " . $halong; ?>>Halong</option>
                                                    <option value="06" <?= " " . $juai; ?>>Juai</option>
                                                    <option value="07" <?= " " . $btm; ?>>Batumandi</option>
                                                    <option value="08" <?= " " . $parsel; ?>>Paringin Selatan</option>
                                                    <option value="09" <?= " " . $tTinggi; ?>>Tebing Tinggi</option>
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
                                                    // if ($data['gol_tarif'] == "NN") {
                                                    //     $gol1 = "selected";
                                                    // } elseif ($data['gol_tarif'] == "NU") {
                                                    //     $gol2 = "selected";
                                                    // } else
                                                    
                                                    if ($data['gol_tarif'] == "SK") {
                                                        $gol3 = "selected";
                                                    } elseif ($data['gol_tarif'] == "SU") {
                                                        $gol4 = "selected";
                                                    } elseif ($data['gol_tarif'] == "R1") {
                                                        $gol5 = "selected";
                                                    } elseif ($data['gol_tarif'] == "R2") {
                                                        $gol6 = "selected";
                                                    } elseif ($data['gol_tarif'] == "R3") {
                                                        $gol7 = "selected";
                                                    } elseif ($data['gol_tarif'] == "IP") {
                                                        $gol8 = "selected";
                                                    } elseif ($data['gol_tarif'] == "NK") {
                                                        $gol9 = "selected";
                                                    } elseif ($data['gol_tarif'] == "NB") {
                                                        $gol10 = "selected";
                                                    }
                                                    ?>
                                                    <!-- <option value="NN">NN</option>
                                                    <option value="NU">NU</option> -->
                                                    <option value="SK" <?= " " . $gol3 ?>>SK</option>
                                                    <option value="SU" <?= " " . $gol4 ?>>SU</option>
                                                    <option value="R1" <?= " " . $gol5 ?>>R1</option>
                                                    <option value="R2" <?= " " . $gol6 ?>>R2</option>
                                                    <option value="R3" <?= " " . $gol7 ?>>R3</option>
                                                    <option value="IP" <?= " " . $gol8 ?>>IP</option>
                                                    <option value="NK" <?= " " . $gol9 ?>>NK</option>
                                                    <option value="NB" <?= " " . $gol10 ?>>NB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="biaya"
                                                name="biaya" value="<?= $data['biaya']; ?>">
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
<?php
session_start();
include_once "../functions.php";

if(!isset($_SESSION['peran'])){
    header("location: ../logsystem/index.php");
    exit;
}

if (!isset($_SESSION['signin'])){
    header("location: ../logsystem/index.php");
}

$activeSurvei = "active";
?>

<!DOCTYPE html>
<head>
    <?php
    include_once ("../partials-perencanaan/head.php");
    include_once ("../partials-perencanaan/cssdatatables.php");
    ?> 
</head>
<?php include_once ("../database.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <?php include_once ("../partials-perencanaan/navbar.php") ?>
        <?php include_once ("../partials-perencanaan/sidebar.php") ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1 class="d-inline mr-4">Tentukan Klasifikasi Tarif</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Antrian Survei</li>
                                <li class="breadcrumb-item active">Input Hasil Survei</li>
                                <li class="breadcrumb-item">Input Golongan Tarif</li>
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
                                <div class="card-body mt-3">
                                    <!-- di sini form pemasangan -->
                                    <?php 
                                    $noreg = $_GET['no_reg'];
                                    $sql = "SELECT pendaftaran.*, antri_daftar.nama, antri_daftar.jenis_kel, antri_daftar.no_hp, antri_daftar.alamat
                                            FROM pendaftaran INNER JOIN antri_daftar ON pendaftaran.no_reg = antri_daftar.no_reg WHERE pendaftaran.no_reg='$noreg'";
                                    $result = $conn->query($sql);
                                                
                                    while($data = $result->fetch_assoc()){
                                    ?>

                                    <form action="" method="post">
                                        <div class="form-group row">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor Registrasi</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ds"
                                                name="no_ds" value="<?= $noreg; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama"
                                                name="nama" autocomplete="off" value="<?= $data['nama']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control form-control-sm border-secondary" id="alamat"
                                                name="alamat" rows="2" autocomplete="off" value="" readonly><?= $data['alamat']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp"
                                                name="no_hp" autocomplete="off" value="<?= $data['no_hp']; ?>" readonly>
                                            </div>
                                        </div>
                                        <!-- <div class="card-footer col-6 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark">SIMPAN</button>
                                        </div> -->
                                    </form>
                                    <?php } ?>

                                    <hr>
                                    <?php 
                                    $queryGoltar = "SELECT * FROM survei_goltar_noniaga WHERE no_reg='$noreg'";
                                    $resultGoltar = mysqli_query($conn, $queryGoltar);
                                    $goltar = mysqli_fetch_assoc($resultGoltar);

                                    if(isset($_POST['update']) && !isset($_POST['submit'])){
                                        $pondasi = $_POST['pondasi'];
                                        $dinding = $_POST['dinding'];
                                        $lantai = $_POST['lantai'];
                                        $atap = $_POST['atap'];
                                        $luasBangunan = $_POST['luas_bangunan'];
                                        $s = $pondasi + $dinding + $lantai + $atap + $luasBangunan;
                                    }

                                    if(isset($_POST['update'])){
                                        $pondasiVal = $_POST['pondasi'];
                                        $dindingVal = $_POST['dinding'];
                                        $lantaiVal = $_POST['lantai'];
                                        $atapVal = $_POST['atap'];
                                        $luasBangunanVal = $_POST['luas_bangunan'];
                                        $totalPoin = $pondasiVal + $dindingVal + $lantaiVal + $atapVal + $luasBangunanVal;
                                    }else{
                                        $pondasiVal = $goltar['pondasi'];
                                        $dindingVal = $goltar['dinding'];
                                        $lantaiVal = $goltar['lantai'];
                                        $atapVal = $goltar['atap'];
                                        $luasBangunanVal = $goltar['luas_bangunan'];
                                        $totalPoin = $pondasiVal + $dindingVal + $lantaiVal + $atapVal + $luasBangunanVal;
                                    }
                                    ?>
                                    <h6>Klasifikasi Rumah Tangga (RT) NON NIAGA menggunakan parameter dan data terukur :</h6>
                                    <h6 class="font-italic">(Isi kolom nilai pada masing-masing Indikator Penilaian untuk menginput poin)</h6>
                                    <form method="POST">
                                        <div class="table-responsive">
                                            <table class="table table-sm" border="2">
                                                <tr class="bg-secondary text-bold">
                                                    <td rowspan="2" class="text-center align-middle border-dark">Indikator Penilaian</td>
                                                    <td colspan="3" class="text-center border-dark">Poin</td>
                                                    <td rowspan="2" class="text-center align-middle border-dark">Nilai</td>
                                                </tr>
                                                <tr class="bg-secondary text-bold">
                                                    <td class="text-center border-dark">2</td>
                                                    <td class="text-center border-dark">3</td>
                                                    <td class="text-center border-dark">4</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center border-dark">Pondasi</td>
                                                    <td class="text-center border-dark">Kayu Biasa</td>
                                                    <td class="text-center border-dark">Kayu Ulin</td>
                                                    <td class="text-center text-nowrap border-dark">Pasangan Batu / Cor</td>
                                                    <td class="text-center border-dark"><input type="number" id="pondasi" name="pondasi" style='width:60px;' value="<?=$pondasiVal?>"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center border-dark">Dinding</td>
                                                    <td class="text-center border-dark">Papan Biasa / Seng / Kalsiboard</td>
                                                    <td class="text-center border-dark">Campuran Papan dan Bata / Plesteran</td>
                                                    <td class="text-center border-dark">Papan Ulin / Bata / Beton</td>
                                                    <td class="text-center border-dark"><input type="number" id="dinding" name="dinding" style='width:60px;' value="<?=$dindingVal?>"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center border-dark">Lantai</td>
                                                    <td class="text-center border-dark">Papan Biasa</td>
                                                    <td class="text-center text-nowrap border-dark">Rabat Tanpa Keramik</td>
                                                    <td class="text-center border-dark">Papan Ulin / Keramik</td>
                                                    <td class="text-center border-dark"><input type="number" id="lantai" name="lantai" style='width:60px;' value="<?=$lantaiVal?>"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center border-dark">Atap</td>
                                                    <td class="text-center border-dark">Daun</td>
                                                    <td class="text-center border-dark">Seng / Asbes</td>
                                                    <td class="text-center border-dark">Sirap / Metal / Dak / Genteng</td>
                                                    <td class="text-center border-dark"><input type="number" id="atap" name="atap" style='width:60px;' value="<?=$atapVal?>"></td> 
                                                </tr>
                                                <tr>
                                                    <td class="text-center text-nowrap border-dark">Luas Bangunan</td>
                                                    <td class="text-center text-nowrap border-dark">Kurang dari 36 m<sup>2</sup></td>
                                                    <td class="text-center border-dark">36 - 200 m<sup>2</sup></td>
                                                    <td class="text-center border-dark">Lebih dari 200 m<sup>2</sup></td>
                                                    <td class="text-center border-dark"><input type="number" id="luas_bangunan" name="luas_bangunan" style='width:60px;' value="<?=$luasBangunanVal?>"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right text-bold border-dark"> 
                                                    <input class="bg-secondary" value="Totalkan" type="submit" name="total" alt="Hitung">
                                                    <input type="hidden" name="update">
                                                    </td>
                                                    <td class="text-center border-dark"><?=$totalPoin;?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-sm" border="2">
                                                <tr>
                                                    <td class="text-bold bg-secondary text-center border-dark">Akumulasi Nilai</td>
                                                    <td class="text-center border-dark">10</td>
                                                    <td class="text-center border-dark">11 - 19</td>
                                                    <td class="text-center border-dark">20</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold bg-secondary text-center border-dark">Golongan</td>
                                                    <td class="text-center border-dark">R1</td>
                                                    <td class="text-center border-dark">R2</td>
                                                    <td class="text-center border-dark">R3</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gol_tarif" class="col-sm-2 col-form-label">Golongan Tarif</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="gol_tarif"
                                                    name="gol_tarif" value="">
                                                    <option value="">---</option>
                                                    <?php
                                                    if ($goltar['gol_tarif'] == "SK") {
                                                        $gol1 = "selected";
                                                    } elseif ($goltar['gol_tarif'] == "SU") {
                                                        $gol2 = "selected";
                                                    } elseif ($goltar['gol_tarif'] == "R1") {
                                                        $gol3 = "selected";
                                                    } elseif ($goltar['gol_tarif'] == "R2") {
                                                        $gol4 = "selected";
                                                    } elseif ($goltar['gol_tarif'] == "R3") {
                                                        $gol5 = "selected";
                                                    } elseif ($goltar['gol_tarif'] == "IP") {
                                                        $gol6 = "selected";
                                                    } elseif ($goltar['gol_tarif'] == "NK") {
                                                        $gol7 = "selected";
                                                    } elseif ($goltar['gol_tarif'] == "NB") {
                                                        $gol8 = "selected";
                                                    }
                                                    ?>
                                                    <option value="SK" <?= " " . $gol1 ?>>SK</option>
                                                    <option value="SU" <?= " " . $gol2 ?>>SU</option>
                                                    <option value="R1" <?= " " . $gol3 ?>>R1</option>
                                                    <option value="R2" <?= " " . $gol4 ?>>R2</option>
                                                    <option value="R3" <?= " " . $gol5 ?>>R3</option>
                                                    <option value="IP" <?= " " . $gol6 ?>>IP</option>
                                                    <option value="NK" <?= " " . $gol7 ?>>NK</option>
                                                    <option value="NB" <?= " " . $gol8 ?>>NB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-4 col-12 text-center">
                                            <button type="submit" name="submit" class="btn btn-dark">SIMPAN</button>
                                        </div>
                                    </form>
                                    <?php 
                                    if(isset($_POST['submit'])){
                                        $pondasi = $_POST['pondasi'];
                                        $dinding = $_POST['dinding'];
                                        $lantai = $_POST['lantai'];
                                        $atap = $_POST['atap'];
                                        $luasBangunan = $_POST['luas_bangunan'];
                                        $gol_tarif = $_POST['gol_tarif'];

                                        $query = "INSERT INTO survei_goltar_noniaga
                                                    VALUES
                                                    ('$noreg', $pondasi, $dinding, $lantai, $atap, $luasBangunan, '$gol_tarif');";
                                        mysqli_query($conn, $query);

                                        echo "<meta http-equiv='refresh' content='0;url=antrian-survei.php'>";
                                        
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
    include_once ("../partials-perencanaan/importjs.php");
    include_once ("../partials-perencanaan/scriptsdatatables.php");
    ?>

    <script>
        $(function () {
        $('[data-toggle="popover"]').popover()
        })
    </script>

</body>

</html>
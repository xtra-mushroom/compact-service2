<?php
session_start();
include_once "../functions.php";

if($_SESSION['peran'] !== "TEKNISI"){
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
    include_once ("../partials-teknisi/head.php");
    include_once ("../partials-teknisi/cssdatatables.php");
    ?> 

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 400px;
			width: 600px;
			max-width: 100%;
			max-height: 100%;
		}
	</style>
</head>
<?php include_once ("../database.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>

    <div class="wrapper">
        <?php include_once ("../partials-teknisi/navbar.php") ?>
        <?php include_once ("../partials-teknisi/sidebar.php") ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1 class="d-inline mr-4">Tampilkan Peta</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Antrian Survei</li>
                                <li class="breadcrumb-item">Tampilkan Koordinat</li>
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
                                    <?php
                                    $database = new Database();
                                    $db = $database->getConnection();
                                    $noreg = $_GET['no_reg'];

                                    $sql = "SELECT pendaftaran.no_reg, antri_daftar.nama, antri_daftar.jenis_kel, antri_daftar.no_hp, antri_daftar.alamat, pendaftaran.no_ktp, pendaftaran.ktp, pendaftaran.tgl_daftar, pendaftaran.biaya, pendaftaran.status_berkas, pendaftaran.tgl_survei, pendaftaran.status_survei, pendaftaran.status_pasang, pendaftaran.lalong_val FROM pendaftaran INNER JOIN antri_daftar ON pendaftaran.no_reg = antri_daftar.no_reg WHERE pendaftaran.status_survei='belum' AND pendaftaran.status_berkas!='' AND pendaftaran.no_reg='$noreg';";
                                    $result = $db->prepare($sql);
                                    $result->execute();             
                                    $data = $result->fetch(PDO::FETCH_ASSOC);
                                    $noreg = $data["no_reg"];
                                    ?>
                                    <form method="post" action="">
                                        <a href="input-survei.php?no_reg=<?= $noreg ?>" class="btn btn-sm btn-success">
                                            <i class="bi bi-pencil-square mr-2"></i>Input Survei Sekarang
                                        </a>
                                        <div class="form-group row mt-3">
                                            <label for="no_reg" class="col-sm-2 col-form-label">Nomor Registrasi</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control form-control-sm border-secondary" id="no_reg" name="no_reg" value="<?php echo $data['no_reg']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama" name="nama" autocomplete="off" value="<?php echo $data['nama']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="jenis_kel" name="jenis_kel" disabled>
                                                    <option class="text-secondary" selected>---</option>
                                                    <?php
                                                    if($data['jenis_kel'] == "Laki-Laki"){
                                                        $laki = "selected";
                                                    }elseif($data['jenis_kel'] == "Perempuan"){
                                                        $perem = "selected";
                                                    }
                                                    ?>
                                                    <option value="Laki-Laki"<?= ' ' . $laki ?>>Laki-Laki</option>
                                                    <option value="Perempuan"<?= ' ' . $perem ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp" name="no_hp" autocomplete="off" value="<?php echo $data['no_hp']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat" name="alamat" autocomplete="off" value="<?php echo $data['alamat']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_ktp" class="col-sm-2 col-form-label">Nomor KTP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ktp" name="no_ktp" autocomplete="off" value="<?php echo $data['no_ktp']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ktp" class="col-sm-2 col-form-label">KTP</label>
                                            <div class="col-sm-4">
                                                <img src="../otheruser/ktppic/<?php echo $data['ktp']; ?>" width="100px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="langlong" class="col-sm-2 col-form-label">Nilai Koordinat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="langlong" name="langlong" autocomplete="off" value="<?php echo $data['lalong_val']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div id="map" style="width: 600px; height: 400px;"></div>
                                            <script>
                                                var map = L.map('map').setView([<?= $data["lalong_val"] ?>], 13);

                                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                                }).addTo(map);

                                                L.marker([<?= $data["lalong_val"] ?>]).addTo(map)
                                                    .bindPopup('<?= $data["nama"] ?><br> <?= $data["alamat"] ?>')
                                                    .openPopup();
                                            </script>
                                        </div>
                                    </form>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php
    include_once ("../partials-teknisi/importjs.php");
    include_once ("../partials-teknisi/scriptsdatatables.php");
    ?>

</body>

</html>
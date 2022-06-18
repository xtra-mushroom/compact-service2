<?php
if(isset($_POST["submit"])){
    $nama = $_POST['nama'];
    $jenisKel = $_POST['jenis_kel'];
    $hp = $_POST['phone'];
    $alamat = $_POST['alamat'];

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $namaErr = $jeniskelErr = $hpErr = $alamatErr = "";
    $namaCek = $jeniskelCek = $hpCek = $action = "";
    $namaValue = $jkValue = $hpValue = $alamatValue = false;
    $selectM = $selectF = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($nama)){
        $namaErr = " *nama tidak boleh kosong";
        $namaValue = false;
    }else{
        $namaCek = test_input($nama);
        if(!preg_match("/^[a-zA-Z ]*$/",$namaCek)){
        $namaErr = " *nama tidak boleh mengandung karakter selain huruf dan spasi";
        $namaValue = false;
        }else{
            $namaValue = true;
        }
    }

    if(empty($jenisKel)){
        $jeniskelErr = " *jenis kelamin harus dipilih";
        $jkValue = false;
    }else{
        $jkValue = true;
    }

    if(empty($hp)){
        $hpErr = " *nomor HP tidak boleh kosong";
        $hpValue = false;
    }else{
        $hpCek = test_input($hp);
        if(!preg_match("/^[0-9 ]*$/",$hpCek)){
        $hpErr = " *nomor HP hanya boleh mengandung angka";
        $hpValue = false;
        }else{
            $hpValue = true;
        }
    }

    if(empty($alamat)){
        $alamatErr = " *alamat tidak boleh kosong";
        $alamatValue = false;
    }else{
        $alamatValue = true;
    }
}
if($namaValue && $jkValue && $hpValue && $alamatValue == false){
    $action = "";
}elseif($namaValue && $jkValue && $hpValue && $alamatValue == true){
    $action = "payment-method.php";
}
}    
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pelayanan | PDAM Balangan</title>
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="panduan/css/bootstrap.css" rel="stylesheet">
    <!-- style -->
    <link rel="stylesheet" href="panduan/style.css">
    <!-- icon tab -->
    <link rel="shortcut icon" href="layout/dist/img/pdam-logo.png">
</head>

<body id="beranda">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow fixed-top" style="background-color: #2c3c52">
        <div class="container">
            <img src="../layout/dist/img/pdam-logo.png" alt="PDAM Balangan Logo" class="brand-image rounded-circle shadow border border-success"
                    style="margin-left: 6px; width:3em; height:2.7em;">
            <span class="brand-text font-weight-light ms-2" style="color: #a9d1ab"><b>COMPACT SERVICE</b></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#registrasi">Registrasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login/index.php">Log In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- jumbotron -->
    <section class="jumbotron text-left">
        <div class="#">
            <div class="text-land ps-5">
                <h1 class="display-2 mt-3">Selamat Datang di Compact Service PDAM Balangan</h1>
                <p class="lead">Website pelayanan online PDAM Balangan yang dapat memudahkan anda mengakses layanan kami secara online dari mana saja dan kapan saja</p>
                <p class="lead">Ingin mengajukan pemasangan sambungan baru? <a href="#registrasi">Registrasi di sini</a></p>
            </div>
            <div class="pic-land">
                <img src="panduan/images/half-circle.png" alt="landing image">
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,128L120,128C240,128,480,128,720,112C960,96,1200,64,1320,48L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
    </section>

    <section id="infografis">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h3>Infografis Pelayanan Online</h3>
                </div>
            </div>
            <div class="row justify-content-center fs-6 text-left">
                <div class="col-10" id="infosvg">
                    <img src="panduan/images/infografik-2.svg" type="svg" alt="infosvg">
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a5c3ca" fill-opacity="1" d="M0,224L120,197.3C240,171,480,117,720,101.3C960,85,1200,107,1320,117.3L1440,128L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
    </section>

    <section id="registrasi">
        <div class="container">
            <div class="row text-center mb-3 pt-4">
                <div class="col">
                    <h3>Registrasi Pemasangan Baru</h3>
                </div>
            </div>
            <div class="row justify-content-center fs-6 text-left">
                <div class="col-10">
                    <form method="post" action="<?= htmlspecialchars($action) ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama" value="<?= $nama; ?>">
                            <span class="error"><?= $namaErr ?></span>
                        </div>
                        <?php 
                        if($jenisKel == "Laki-Laki"){
                            $selectM = "selected";
                        }elseif($jenisKel == "Perempuan"){
                            $selectF = "selected";
                        }else{
                            $selectM = $selectF = "";
                        }
                        ?>
                        <div class="mb-3">
                            <label for="jenis_kel" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kel" name="jenis_kel">
                                <option class="text-secondary" selected></option>
                                <option value="Laki-Laki" <?= " ".$selectM ?>>Laki-Laki</option>
                                <option value="Perempuan" <?= " ".$selectF ?>>Perempuan</option>
                            </select>
                            <span class="error"><?= $jeniskelErr ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="phone" aria-describedby="phone" name="phone" value="<?= $hp; ?>">
                            <div id="phoneHelp" class="form-text">Pastikan nomor HP anda aktif</div>
                            <span class="error"><?= $hpErr ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" id="alamat" rows="2" name="alamat"><?= $alamat; ?></textarea>
                            <span class="error"><?= $alamatErr ?></span>
                        </div>
                        <button type="submit" name="submit" class="btn btn-send btn-primary float-end">Daftar</button>    
                    </form>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#2c3c52" fill-opacity="1" d="M0,256L120,234.7C240,213,480,171,720,160C960,149,1200,171,1320,181.3L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
    </section>

    <footer>
        <p class="fw-bold text-white text-center">Made with <i class="bi bi-suit-heart-fill text-danger"></i> by
            <em>Maulida Hikmah</em></p>
    </footer>

    <script src="panduan/js/bootstrap.js"></script>
    <script src="panduan/js/popper.min.js"></script>

</body>
</html>
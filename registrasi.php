<?php
// require "functions.php";

// $namaErr = $jeniskelErr = $hpErr = $alamatErr = "";
// $nama = $jenisKel = $hp = $alamat = "";
// $namaVal = $jkVal = $hpVal = $alamatVal = "";
// $action = "";

// if(isset($_POST['submit'])){

//     if(empty($_POST['nama'])){
//         $namaErr = " *nama tidak boleh kosong";
//     }else{
//         $nama = test_input($_POST["nama"]);
//         if(!preg_match("/^[a-zA-Z ]*$/",$nama)){
//             $namaErr = " *nama tidak boleh mengandung karakter selain huruf dan spasi";
//         }
//     }

//     if(empty($_POST['jenis_kel'])){
//         $jeniskelErr = " *jenis kelamin harus dipilih";
//     }else{
//         $jenisKel = test_input($_POST["jenis_kel"]);
//     }

//     if(empty($_POST['phone'])){
//         $hpErr = " *nomor HP tidak boleh kosong";
//     }else{
//         $hp = test_input($_POST["phone"]);
//         if(!preg_match("/^[0-9]*$/",$hp)){
//         $hpErr = " *nomor HP hanya boleh mengandung angka";
//         }
//     }

//     if(empty($_POST['alamat'])){
//         $alamatErr = " *alamat tidak boleh kosong";
//     }else{
//         $alamat = test_input($_POST["alamat"]);
//     }

//     // penentu nilai action form
//     // if($namaVal && $jkVal && $hpVal && $alamatVal == "valid"){
//     //     $action = "payment-method.php";
//     // }else{
//     //     $action = "";
//     // }
// }

// if($jenisKel == "Laki-Laki"){
//     $selectM = "selected";
// }elseif($jenisKel == "Perempuan"){
//     $selectF = "selected";
// }else{
//     $selectM = $selectF = "";
// }


?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pelayanan | PDAM Balangan</title>
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- style -->
    <link rel="stylesheet" href="assets/style.css">
    <!-- icon tab -->
    <link rel="shortcut icon" href="assets/images/pdam-logo.png">
</head>
<body>
    <section id="registrasi">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h3>Registrasi Pemasangan Baru</h3>
                </div>
            </div>
            <div class="row justify-content-center fs-6 text-left">
                <div class="col-10">
                    <form method="post" action="<?= htmlspecialchars("payment-method.php") ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama" pattern="[A-Za-z\s]{3,150}" oninvalid="this.setCustomValidity('Nama hanya boleh mengandung huruf, spasi, dan tidak boleh kurang dari 3 karakter')" oninput="setCustomValidity('')">
                            <span class="error"><?= $namaErr ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kel" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kel" name="jenis_kel" required oninvalid="this.setCustomValidity('Jenis kelamin harus dipilih')" oninput="setCustomValidity('')">
                                <option class="text-secondary" selected></option>
                                <option value="Laki-Laki" <?= $selectM ?>>Laki-Laki</option>
                                <option value="Perempuan" <?= $selectF ?>>Perempuan</option>
                            </select>
                            <span class="error"><?= $jeniskelErr ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor HP</label>
                            <input type="number" max="999999999999999" class="form-control" id="phone" aria-describedby="phone" name="phone" required>
                            <div id="phoneHelp" class="form-text">Pastikan nomor HP anda aktif</div>
                            <span class="error"><?= $hpErr ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" id="alamat" rows="2" name="alamat" pattern="[A-Za-z\s\d\.]{5,255}" oninvalid="this.setCustomValidity('Alamat tidak boleh kurang dari 5 karakter dan tidak boleh mengandung simbol')" oninput="setCustomValidity('')"></textarea>
                            <span class="error"><?= $alamatErr ?></span>
                        </div>
                        <div class="bottom float-end">
                        <p id="notice-regis" class="text-right">Cek kembali data diri anda sebelum klik Daftar</p>
                        <button type="submit" name="submit" class="btn btn-send btn-primary float-end">Daftar</button>   
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

    <script src="assets/js/bootstrap.js"></script>
    <!-- <script src="assets/js/popper.min.js"></script> -->
</html>
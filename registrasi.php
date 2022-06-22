<?php
require "functions.php";

// $namaErr = $jeniskelErr = $hpErr = $alamatErr = "";
// $namaVal = $jkVal = $hpVal = $alamatVal = "";

// if(isset($_POST['submit'])){

//     if(empty($_POST['nama'])){
//         $namaErr = " *nama tidak boleh kosong";
//     }elseif(!preg_match("/^[a-zA-Z ]*$/",test_input($_POST['nama']))){
//         $namaErr = " *nama tidak boleh mengandung karakter selain huruf dan spasi";
//     }else{
//         $nama = $_POST['nama'];
//         $namaVal = "valid";
//     }

//     if(empty($_POST['jenis_kel'])){
//         $jeniskelErr = " *jenis kelamin harus dipilih";
//     }else{
//         $jkVal = "valid";
//     }

//     if(empty($_POST['phone'])){
//         $hpErr = " *nomor HP tidak boleh kosong";
//     }elseif(!preg_match("/^[0-9]*$/",test_input($_POST['phone']))){
//         $hpErr = " *nomor HP hanya boleh mengandung angka";
//     }else{
//         $hpVal = "valid";
//     }

//     if(empty($_POST['alamat'])){
//         $alamatErr = " *alamat tidak boleh kosong";
//     }else{
//         $alamatVal = "valid";
//     }

//     if($namaVal && $jkVal && $hpVal && $alamatVal == "valid"){
//         $action = "payment-method.php";
//     }else{
//         $action = "";
//     }
// }

                                        
    // if($simpanDaftar == true){
    //     $_SESSION['hasil'] = true;
    //     $_SESSION['pesan'] = "Registrasi Berhasil";
    // } else {
    //     $_SESSION['hasil'] = false;
    //     $_SESSION['pesan'] = "Registrasi Gagal";
    // }
    // echo "<meta http-equiv='refresh' content='1;url=payment-method.php>";

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
            <div class="row text-center mb-3 pt-4">
                <div class="col">
                    <h3>Registrasi Pemasangan Baru</h3>
                </div>
            </div>
            <div class="row justify-content-center fs-6 text-left">
                <div class="col-10">
                    <form method="post" action="<?= htmlspecialchars("payment-method.php") ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama">
                            <span class="error"><?= $namaErr ?></span>
                        </div>
                        <?php 
                        // if($jenisKel == "Laki-Laki"){
                        //     $selectM = "selected";
                        // }elseif($jenisKel == "Perempuan"){
                        //     $selectF = "selected";
                        // }else{
                        //     $selectM = $selectF = "";
                        // }
                        ?>
                        <div class="mb-3">
                            <label for="jenis_kel" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kel" name="jenis_kel">
                                <option class="text-secondary" selected></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <span class="error"><?= $jeniskelErr ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="phone" aria-describedby="phone" name="phone">
                            <div id="phoneHelp" class="form-text">Pastikan nomor HP anda aktif</div>
                            <span class="error"><?= $hpErr ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" id="alamat" rows="2" name="alamat"></textarea>
                            <span class="error"><?= $alamatErr ?></span>
                        </div>
                        <button type="submit" name="submit" class="btn btn-send btn-primary float-end">Daftar</button>    
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

    <script src="assets/js/bootstrap.js"></script>
    <!-- <script src="assets/js/popper.min.js"></script> -->
</html>
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
            <div class="row text-center mb-3">
                <div class="col">
                    <h3>Upload Bukti Pembayaran</h3>
                </div>
            </div>
            <div class="row justify-content-center fs-6 text-left">
                <div class="col-10">
                    <form method="post" action="<?= htmlspecialchars("proses-upload.php") ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="noreg" class="form-label">Nomor Registrasi</label>
                            <input type="text" class="form-control" id="noreg" aria-describedby="noreg" name="noreg" required>
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Pilih Kecamatan</label>
                            <select class="form-control" id="kecamatan" name="kecamatan" required>
                                <option class="text-secondary" selected></option>
                                <option value="01">Paringin</option>
                                <option value="02">Paringin Selatan</option>
                                <option value="03">Awayan</option>
                                <option value="04">Batu Mandi</option>
                                <option value="05">Juai</option>
                                <option value="06">Lampihong</option>
                                <option value="07">Halong</option>
                                <option value="08">Tebing Tinggi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="bukti-bayar" class="form-label">Upload Bukti Bayar <span style="color:#f25056; font-size:.9em;">*Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</span></label>
                            <input type="file" class="form-control" id="bukti-bayar" aria-describedby="bukti-bayar" name="bukti-bayar" required>
                            <div id="phoneHelp" class="form-text">Ukuran maksimal upload foto/pdf 1 MB</div>
                        </div>
                        <div class="bottom float-end">
                        <p id="notice-regis" class="text-right">Cek kembali nomor registrasi anda sebelum klik Upload</p>
                        <button type="submit" name="submit" class="btn btn-send btn-primary float-end">Upload</button>   
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
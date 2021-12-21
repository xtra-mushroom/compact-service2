<?php 
require "../functions.php";
$pendaftaran = query("SELECT * FROM pemasangan");

if(isset($_POST["submit"])){
    // var_dump($_POST);
    $ktp = $_POST["no_ktp"];
    $ds = $_POST['no_ds'];
    $tgl = $_POST['tgl_pasang'];
    $nama = $_POST["nama"];
    $jenisKel = $_POST["jenis_kel"];
    $tmpLahir = $_POST["tmpt_lahir"];
    $tglLahir = $_POST["tgl_lahir"];
    $statusRumah = $_POST["status_kep_rumah"];
    $jmlhJiwa = $_POST["jumlah_jiwa"];
    $pln = $_POST["pln"];
    $alamat = $_POST["alamat"];
    $kec = $_POST["kecamatan"];
    $desa = $_POST["desa"];
    $hp = $_POST["no_hp"];
    $cabang = $_POST["cabang"];
    $gol = $_POST["gol_tarif"];
    $biaya = $_POST["biaya"];

    $query = "UPDATE pemasangan
                SET
                no_ktp='$ktp', no_ds='$ds', tgl_pasang='$tgl', nama='$nama', jenis_kel='$jenisKel', tmpt_lahir='$tmpLahir', tgl_lahir='$tglLahir', status_kep_rumah='$statusRumah', jumlah_jiwa='$jmlhJiwa', pln='$pln', alamat='$alamat', kecamatan='$kec', desa='$desa', no_hp='$hp', cabang='$cabang', gol_tarif='$gol', biaya='$biaya'
                WHERE no_ds='$ds'";

    mysqli_query($conn, $query);
    // var_dump($query);

    // alertWindow("Data berhasil terdaftar!");  
     
    
    header('Location:cari.php?cari=');

    alertWindow("Data berhasil terdaftar"); 

}

?>
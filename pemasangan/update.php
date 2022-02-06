<?php 
require "../functions.php";

if(isset($_POST["submit"])){
    // var_dump($_POST);
    $ktp = $_POST["no_ktp"];
    $no_pend = $_POST["no_pend"];
    $ds = $_POST["no_ds"];
    $tgl = $_POST["tgl_pasang"];
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
    $ttl = $_POST["ttl"];

    $query = "UPDATE pemasangan
                SET
                tgl_pasang='$tgl', status_kep_rumah='$statusRumah', jumlah_jiwa='$jmlhJiwa', pln='$pln', cabang='$cabang', gol_tarif='$gol', biaya=$biaya
                WHERE no_ds='$ds';";
    
    $query .= "UPDATE pendaftaran
                SET
                no_ktp='$ktp', nama='$nama', jenis_kel='$jenisKel', alamat='$alamat', no_hp='$hp'
                WHERE no_ds='$ds';";
    
    $query .= "UPDATE pelanggan
                SET ttl='$ttl' WHERE no_ds='$ds';";

    mysqli_multi_query($conn, $query);
    // var_dump($query); 
     
    header('Location:cari.php?cari=');

}

?>
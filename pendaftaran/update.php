<?php 
require "../functions.php";
$pendaftaran = query("SELECT * FROM pendaftaran");

if($_POST["wil"] == "Paringin 1"){
    $idWil = "01";
}elseif($_POST["wil"] == "Paringin 2"){
    $idWil = "02";
}elseif($_POST["wil"] == "Awayan"){
    $idWil = "03";
}elseif($_POST["wil"] == "Lampihong"){
    $idWil = "04";
}elseif($_POST["wil"] == "Halong"){
    $idWil = "05";
}elseif($_POST["wil"] == "Juai"){
    $idWil = "06";
}elseif($_POST["wil"] == "Batumandi"){
    $idWil = "07";
}elseif($_POST["wil"] == "Paringin Selatan"){
    $idWil = "08";
}elseif($_POST["wil"] == "Tebing Tinggi"){
    $idWil = "09";
}

$no = $_POST['no_pend'];
$tgl = $_POST['tgl_daftar'];
$ktp = $_POST['no_ktp'];
$nama = $_POST['nama'];
$jenisKel = $_POST['jenis_kel'];
$alamat = $_POST['alamat'];
$kec = $_POST['kecamatan'];
$desa = $_POST['desa'];
$hp = $_POST["no_hp"];
$wilayah = $_POST["wil"];

$query = "UPDATE pendaftaran
            SET
            no_pend=$no, tgl_daftar='$tgl', no_ktp='$ktp', nama='$nama', jenis_kel='$jenisKel', alamat='$alamat', kecamatan='$kec', desa='$desa', no_hp='$hp', id_wil='$idWil', wil='$wilayah' where no_pend='$no'";

$mysqlUpdate = mysqli_query($conn, $query);
// var_dump($query);

if(!$mysqlUpdate){
    alertWindow("Gagal mengubah data!");   
}else{
    // session_start();
    // $_SESSION["show_alert"] = alertWindow('Data Berhasil Diubah!');
    // echo $_SESSION["show_alert"];
    echo "<script> alert('berhasil') </script>";
    header("location:cari.php?cari=");   
};
    
?>
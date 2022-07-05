<?php
session_start();
include "../functions.php";

$noreg = $_POST['no_reg'];
$noktp = $_POST['no_ktp'];
$cabang = $_POST['wil'];
$tanggal = date('Y-m-d');

$strbiaya = "20".substr($noreg, -3);
$biaya = (double)$strbiaya;

if(isset($_POST["save"])){
    $rand = rand();
    $ekstensi = array('png','jpg','jpeg');
    $filename = $_FILES['ktp']['name'];
    $ukuran = $_FILES['ktp']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext,$ekstensi) ) {
        header("location:lengkapi-berkas.php?alert=gagal_ekstensi");
    }else{
        if($ukuran < 1044070){		
            $ktp = $rand.'_'.$filename;
            move_uploaded_file($_FILES['ktp']['tmp_name'], 'ktppic/'.$rand.'_'.$filename);
            $query = "INSERT INTO pendaftaran VALUES ('$noreg', '', '$tanggal', '$noktp', '$ktp', '$cabang', $biaya, '', '0000-00-00', '');";
            $simpanBerkas = mysqli_query($conn, $query);

            if($simpanBerkas == true){
                $_SESSION['hasil'] = true;
                $_SESSION['pesan'] = "Berhasil Upload Berkas";
            } else {
                $_SESSION['hasil'] = false;
                $_SESSION['pesan'] = "Gagal Upload Berkas";
            }
            echo "<meta http-equiv='refresh' content='0;url=lengkapi-berkas.php'>";

        }else{
            header("location:lengkapi-berkas.php?alert=gagal_ukuran");
        }
    }

}elseif(isset($_POST["edit"])){
    $rand = rand();
    $ekstensi = array('png','jpg','jpeg');
    $filename = $_FILES['ktp']['name'];
    $ukuran = $_FILES['ktp']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext,$ekstensi) ) {
        header("location:lengkapi-berkas.php?alert=gagal_ekstensi");
    }else{
        if($ukuran < 1044070){		
            $ktp = $rand.'_'.$filename;
            move_uploaded_file($_FILES['ktp']['tmp_name'], 'ktppic/'.$rand.'_'.$filename);
            $query = "UPDATE pendaftaran SET tgl_daftar='$tanggal', no_ktp='$noktp', ktp='$ktp', cabang='$cabang' WHERE no_reg='$noreg'";
            $ubahBerkas = mysqli_query($conn, $query);

            if($ubahBerkas == true){
                $_SESSION['hasil'] = true;
                $_SESSION['pesan'] = "Berhasil Ubah Data";
            } else {
                $_SESSION['hasil'] = false;
                $_SESSION['pesan'] = "Gagal Ubah Data";
            }
            echo "<meta http-equiv='refresh' content='0;url=lengkapi-berkas.php'>";

        }else{
            header("location:lengkapi-berkas.php?alert=gagal_ukuran");
        }
    }
}

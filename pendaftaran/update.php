<?php 
require "../functions.php";
$pendaftaran = query("SELECT * FROM pendaftaran");
    $no = $_POST['no_pend'];
    $tgl = $_POST['tgl_daftar'];
    $ktp = $_POST['no_ktp'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kec = $_POST['kecamatan'];
    $desa = $_POST['desa'];
    $hp = $_POST["no_hp"];
    $wilayah = $_POST["wil"];

    $query = "UPDATE pendaftaran SET no_pend='$no', tgl_daftar='$tgl', no_ktp='$ktp', nama='$nama', alamat='$alamat', kecamatan='$kec', desa='$desa', no_hp='$hp', wil='$wilayah' where no_pend='$no'";

    $mysqlUpdate = mysqli_query($conn, $query);
    // var_dump($query);

    if(!$mysqlUpdate){
        alertWindow("Gagal mengubah data!");   
    }else{
        // session_start();
        // $_SESSION["show_alert"] = alertWindow('Data Berhasil Diubah!');
        // echo $_SESSION["show_alert"];
        echo "<script> alert('berhasil') </script>";
        header("location:cari.php?cari=$nama");   
    };
    
?>
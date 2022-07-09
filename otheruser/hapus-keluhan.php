<?php 
session_start();
include "../functions.php";
$no_ds = $_GET['no_ds'];

$sqlUnlink = "SELECT * FROM keluhan WHERE no_ds='$no_ds'";
$resultUnlink = mysqli_query($conn, $sqlUnlink);
$data = mysqli_fetch_assoc($resultUnlink);
$foto = $data['img_keluhan'];
unlink("img-keluhan/".$foto);

$sqlHapus = "DELETE FROM keluhan WHERE no_ds='$no_ds'";
$hapusKeluhan = mysqli_query($conn, $sqlHapus);

if($hapusKeluhan == true){
    $_SESSION['hasil'] = true;
    $_SESSION['pesan'] = "Keluhan Berhasil Dihapus";
} else {
    $_SESSION['hasil'] = false;
    $_SESSION['pesan'] = "Gagal Menghapus Keluhan";
}
echo "<meta http-equiv='refresh' content='0;url=keluhan.php'>";
?>
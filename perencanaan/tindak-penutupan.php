<?php
session_start();
include "../functions.php";
$tgl = date('Y-m-d');
$sqlTindakTutup = "UPDATE penutupan SET tgl_tindak='$tgl', status_tindakan='selesai'";
$updateStatus = mysqli_query($conn, $sqlTindakTutup);

if($updateStatus == true){
    $_SESSION['hasil'] = true;
    $_SESSION['pesan'] = "Berhasil perbarui status penindakan";
} else {
    $_SESSION['hasil'] = false;
    $_SESSION['pesan'] = "Gagal perbarui status penindakan";
}
echo "<meta http-equiv='refresh' content='0;url=antrian-bukatutup.php'>";
?>
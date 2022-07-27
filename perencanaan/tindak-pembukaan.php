<?php
session_start();
include "../functions.php";
$no_ds = $_GET['no_ds'];
$tgl = date('Y-m-d');
$sqlTindakBuka = "UPDATE pembukaan SET tgl_tindak='$tgl', status_tindakan='selesai' WHERE no_ds='$no_ds'";
$updateStatus = mysqli_query($conn, $sqlTindakBuka);

if($updateStatus == true){
    $_SESSION['hasil'] = true;
    $_SESSION['pesan'] = "Berhasil perbarui status penindakan";
} else {
    $_SESSION['hasil'] = false;
    $_SESSION['pesan'] = "Gagal perbarui status penindakan";
}
echo "<meta http-equiv='refresh' content='0;url=antrian-bukatutup.php'>";
?>
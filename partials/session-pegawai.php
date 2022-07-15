<?php 
if($_SESSION['peran'] !== "PEGAWAI"){
    header("Location: ../logsystem/index.php");
    exit;
}

if (!isset($_SESSION['signin'])){
    header("location: ../logsystem/index.php");
}

if($_SESSION['jenis_kel'] == 'Laki-Laki'){
    $image = "avatar.png";
}elseif($_SESSION['jenis_kel'] == 'Perempuan'){
    $image = "avatar6.jpg";
}
?>
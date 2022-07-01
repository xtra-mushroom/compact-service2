<?php 
if($_SESSION['peran'] !== "PEGAWAI"){
    header("Location: ../logsystem/index.php");
    exit;
}

if (!isset($_SESSION['signin'])){
    header("location: ../logsystem/index.php");
}
?>
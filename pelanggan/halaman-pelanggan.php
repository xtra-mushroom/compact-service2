<?php session_start();
    include_once ("../functions.php");
    
    if($_SESSION['peran'] !== "PELANGGAN"){
        header("location: ../logsystem/index.php");
        exit;
    }

    if (!isset($_SESSION['signin'])){
        header("location: ../logsystem/index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once ("../partials/head.php") ?>
</head>
<body>
    Ini halaman pelanggan
</body>
</html>
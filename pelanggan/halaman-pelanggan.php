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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pelayanan | PDAM Balangan</title>
    <!-- Icon Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- css -->
    <link rel="stylesheet" href="style-halberkas.css">
    <!-- icon tab -->
    <link rel="shortcut icon" href="../assets/images/pdam-logo.png">
</head>
<body>
    <nav>
        <label>PDAM BALANGAN</label>
        <ul>
            <li><a href="../logsystem/logout.php"><i class="bi bi-box-arrow-left"></i>Logout</a></li>
        </ul>
    </nav>

    <div class="side-menu">
        <center>
            <img src="../assets/images/pdam-logo.png">
            <br><br>

            <h2><?= $_SESSION['username'] ?></h2>
        </center>
        <br>

        <a href="#"><i class="bi bi-clipboard-check"></i><span>Lengkapi Berkas</span></a>
        <a href="#"><i class="bi bi-clipboard-check"></i><span>Hasil Survei</span></a>
        <a href="#"><i class="bi bi-clipboard-check"></i><span>Cek Tagihan</span></a>
        <a href="#"><i class="bi bi-clipboard-check"></i><span>Lengkapi Berkas</span></a>
        <a href="#"><i class="bi bi-clipboard-check"></i><span>Buka dan Tutup Sambungan</span></a>
        <a href="#"><i class="bi bi-clipboard-check"></i><span>Balik Nama</span></a>
        <a href="#"><i class="bi bi-clipboard-check"></i><span>Sampaikan Keluhan</span></a>
    </div>
</body>
</html>
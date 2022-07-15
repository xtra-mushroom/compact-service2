<?php
session_start();
include "../functions.php";

if(isset($_POST["submit"])){
    $ds = $_POST["no_ds"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $hp = $_POST["no_hp"];
    $tgl = $_POST["tgl_keluhan"];
    $keluhan = $_POST["keluhan"];

    $sqlID = "SELECT * FROM keluhan WHERE no_ds='$ds' ORDER BY no_keluhan DESC LIMIT 1";
    $resultID = mysqli_query($conn, $sqlID);
    if($resultID->num_rows > 0){
        while($dataID = mysqli_fetch_assoc($resultID)){
            $last_ID = $dataID['no_keluhan'];
        }
        $splitLastID = substr($last_ID,4); // substring id
        $splitNewID = (int)$splitLastID + 1;

        for($i=1; $i<3; $i++){
            $nol = "0";
            if(strlen($splitNewID) == $i){
                $splitNewID = $nol . (string)$splitNewID;
            }
        }
        $generateID = substr($ds,2) . $splitNewID;
    }else{
        $generateID = substr($ds,2) . "001";
    }

    if(isset($_FILES['foto_keluhan'])){
        $rand = rand();
        $ekstensi = array('png','jpg','jpeg');
        $filename = $_FILES['foto_keluhan']['name'];
        $ukuran = $_FILES['foto_keluhan']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if(!in_array($ext,$ekstensi) ) {
            $fotoKeluhan = "tidak tersedia";
            $query = "INSERT INTO keluhan VALUES ('$ds', '$generateID', '$nama', '$alamat', '$hp', '$tgl', '$keluhan', '$fotoKeluhan', '', '', '0000-00-00', '', 'Belum ditangani');";
            $simpanKeluhan = mysqli_query($conn, $query);

            if($simpanKeluhan == true){
                $_SESSION['hasil'] = true;
                $_SESSION['pesan'] = "Berhasil Upload Berkas";
            } else {
                $_SESSION['hasil'] = false;
                $_SESSION['pesan'] = "Gagal Upload Berkas";
            }
            echo "<meta http-equiv='refresh' content='0;url=keluhan.php'>";
        }else{
            if($ukuran < 1044070){		
                $fotoKeluhan = $ds.'_'.$filename;
                move_uploaded_file($_FILES['foto_keluhan']['tmp_name'], 'img-keluhan/'.$ds.'_'.$filename);
                $query = "INSERT INTO keluhan VALUES ('$ds', '$generateID', '$nama', '$alamat', '$hp', '$tgl', '$keluhan', '$fotoKeluhan', '', '', '0000-00-00', '', 'Belum ditangani');";
                $simpanKeluhan = mysqli_query($conn, $query);

                // var_dump($query);

                if($simpanKeluhan == true){
                    $_SESSION['hasil'] = true;
                    $_SESSION['pesan'] = "Berhasil Upload Berkas";
                } else {
                    $_SESSION['hasil'] = false;
                    $_SESSION['pesan'] = "Gagal Upload Berkas";
                }
                echo "<meta http-equiv='refresh' content='0;url=keluhan.php'>";

            }else{
                header("location:input-keluhan.php?alert=gagal_ukuran");
            }
        }

    }
}

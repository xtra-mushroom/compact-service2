<?php
session_start();
include "../functions.php";

if(isset($_POST["update"])){
    $id = $_POST['id_keluhan'];
    $ds = $_POST["no_ds"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $hp = $_POST["no_hp"];
    $tgl = $_POST["tgl_keluhan"];
    $keluhan = $_POST["keluhan"];

    if(isset($_FILES['foto_keluhan'])){
        $filenameLama = $_POST['x'];
        $ekstensi = array('png','jpg','jpeg');
        $filename = $_FILES['foto_keluhan']['name'];
        $ukuran = $_FILES['foto_keluhan']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if(!in_array($ext,$ekstensi) ) {
            $fotoKeluhan = $filenameLama;

            $query = "UPDATE keluhan SET no_ds='$ds', nama='$nama', alamat='$alamat', no_hp='$hp', tgl_keluhan='$tgl', keluhan='$keluhan', img_keluhan='$fotoKeluhan' WHERE no_keluhan='$id'";
            $ubahKeluhan = mysqli_query($conn, $query);
            // var_dump($query);

            if($ubahKeluhan == true){
                $_SESSION['hasil'] = true;
                $_SESSION['pesan'] = "Berhasil Ubah Data Keluhan";
            } else {
                $_SESSION['hasil'] = false;
                $_SESSION['pesan'] = "Gagal Ubah Data Keluhan";
            }
            echo "<meta http-equiv='refresh' content='0;url=keluhan.php'>";
        }else{
            if($ukuran < 1044070){		
                $fotoKeluhan = $ds.'_'.$filename;
                if($filenameLama == $fotoKeluhan){
                    $query = "UPDATE keluhan SET no_ds='$ds', nama='$nama', alamat='$alamat', no_hp='$hp', tgl_keluhan='$tgl', keluhan='$keluhan' WHERE no_ds='$ds'";
                    move_uploaded_file($_FILES['foto_keluhan']['tmp_name'], 'img-keluhan/'.$ds.'_'.$filename);
                    $ubahKeluhan = mysqli_query($conn, $query);
                }elseif($filenameLama !== $fotoKeluhan){
                    $query = "UPDATE keluhan SET no_ds='$ds', nama='$nama', alamat='$alamat', no_hp='$hp', tgl_keluhan='$tgl', keluhan='$keluhan', img_keluhan='$fotoKeluhan' WHERE no_ds='$ds'";
                    move_uploaded_file($_FILES['foto_keluhan']['tmp_name'], 'img-keluhan/'.$ds.'_'.$filename);
                    $ubahKeluhan = mysqli_query($conn, $query);
                    unlink("img-keluhan/".$filenameLama);
                }
                // var_dump($query);

                if($ubahKeluhan == true){
                    $_SESSION['hasil'] = true;
                    $_SESSION['pesan'] = "Berhasil Ubah Data Keluhan";
                } else {
                    $_SESSION['hasil'] = false;
                    $_SESSION['pesan'] = "Gagal Ubah Data Keluhan";
                }
                echo "<meta http-equiv='refresh' content='0;url=keluhan.php'>";

            }else{
                header("location:edit-keluhan.php?alert=gagal_ukuran");
            }
        }
    } 
}

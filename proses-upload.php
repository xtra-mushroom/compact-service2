<?php 
include 'functions.php';
$noreg = $_POST['noreg'];
$idKec = $_POST['kecamatan'];
 
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','pdf');
$filename = $_FILES['bukti-bayar']['name'];
$ukuran = $_FILES['bukti-bayar']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:upload-bayar.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$buktiBayar = $rand.'_'.$filename;
		move_uploaded_file($_FILES['bukti-bayar']['tmp_name'], 'Paypic/'.$rand.'_'.$filename);
		mysqli_query($conn, "UPDATE antri_daftar SET id_kec='$idKec', bukti_bayar='$buktiBayar' WHERE no_reg='$noreg';");
		header("location:upload-bayar.php?alert=berhasil");
	}else{
		header("location:upload-bayar.php?alert=gagal_ukuran");
	}
}
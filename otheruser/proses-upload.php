<?php 
session_start();
include '../functions.php';
$noreg = $_POST['noreg'];
 
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','pdf');
$filename = $_FILES['bukti-bayar']['name'];
$ukuran = $_FILES['bukti-bayar']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	$_SESSION['hasil'] = false;
	$_SESSION['pesan'] = "Pastikan format file sesuai";
	header("location:upload-bayar.php");
}else{
	if($ukuran < 1044070){		
		$buktiBayar = $rand.'_'.$filename;
		$upload = mysqli_query($conn, "UPDATE antri_daftar SET bukti_bayar='$buktiBayar' WHERE no_reg='$noreg';");
		if(mysqli_affected_rows($conn) < 1){
			$_SESSION['hasil'] = false;
			$_SESSION['pesan'] = "Nomor Registrasi Anda Salah";
			header("location:upload-bayar.php");
		}elseif(mysqli_affected_rows($conn) > 0){
			move_uploaded_file($_FILES['bukti-bayar']['tmp_name'], 'Paypic/'.$rand.'_'.$filename);
			$_SESSION['hasil'] = true;
			$_SESSION['pesan'] = "Upload Bukti Pembayaran Berhasil";
			header("location:upload-bayar.php");
		}
		
	}else{
		$_SESSION['hasil'] = false;
		$_SESSION['pesan'] = "Ukuran file terlalu besar";
		header("location:upload-bayar.php?alert=gagal_ukuran");
	}
}
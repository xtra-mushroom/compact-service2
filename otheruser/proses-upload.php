<?php 
include '../functions.php';
$noreg = $_POST['noreg'];
 
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
		$upload = mysqli_query($conn, "UPDATE antri_daftar SET bukti_bayar='$buktiBayar' WHERE no_reg='$noreg';");
		if(mysqli_affected_rows($conn) < 1){
			header("location:upload-bayar.php?alert=no_regsalah");
		}elseif(mysqli_affected_rows($conn) > 0){
			move_uploaded_file($_FILES['bukti-bayar']['tmp_name'], 'Paypic/'.$rand.'_'.$filename);
			header("location:upload-bayar.php?alert=berhasilupload");
		}
		
	}else{
		header("location:upload-bayar.php?alert=gagal_ukuran");
	}
}
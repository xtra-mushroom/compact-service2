<?php 
session_start();
require '../functions.php';
require 'item.php';

$tgl = date('Y-m-d');
$perencana = $_SESSION['nama'];
$noreg = $_GET['no_reg'];

// hitung biaya pemasangan, $bup adalah biaya umum perusahaan sebesar 20% dari $totalAB)
$totalAB = $_SESSION['total'];
$bup = $totalAB * 20 / 100;
$totalSeluruh = $totalAB + $bup;
$totalSeluruh = ceil($totalSeluruh);
if (substr($totalSeluruh,-3)>499){
    $totalPembulatan = round($totalSeluruh,-3);
} else {
    $totalPembulatan = round($totalSeluruh,-3)+1000;
} 

// simpan catatan survei
$sql1 = "INSERT INTO survei_bahan VALUES ('$noreg', '$tgl', 'selesai', $totalPembulatan, '$perencana', '');";
mysqli_query($conn, $sql1);
mysqli_insert_id($conn); 

$sql2 = "UPDATE pendaftaran SET tgl_survei='$tgl', status_survei='selesai' WHERE no_reg='$noreg';";
mysqli_query($conn, $sql2);
mysqli_insert_id($conn); 

// simpan detail survei bahan
$cart = unserialize(serialize($_SESSION['cart']));
for($i=0; $i<count($cart);$i++) {
    $kode = $cart[$i]->kode;
    $harga = (float)$cart[$i]->harga;
    $banyaknya = (int)$cart[$i]->banyaknya;
    $sql3 = "INSERT INTO detail_survei_bahan VALUES ('$kode', '$noreg', $harga, $banyaknya);";
    mysqli_query($conn, $sql3);
}

// clear bahan yang terpilih
unset($_SESSION['cart']);
header("location: input-goltar.php?no_reg=$noreg");
?>
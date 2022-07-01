<?php 
session_start();
require '../functions.php';
require 'item.php';

$tgl = date('Y-m-d');
$perencana = $_SESSION['username'];
$noreg = $_GET['no_reg'];
// simpan catatan survei
$sql1 = "INSERT INTO survei_bahan VALUES ('$noreg', '$tgl', 'Telah disurvei', '$perencana');";
mysqli_query($conn, $sql1);
mysqli_insert_id($conn); 

$sql2 = "UPDATE pendaftaran SET tgl_survei='$tgl', status_survei='Telah disurvei';";
mysqli_query($conn, $sql2);
mysqli_insert_id($conn); 
// Save order details for new orders
$cart = unserialize(serialize($_SESSION['cart']));

for($i=0; $i<count($cart);$i++) {
    $kode = $cart[$i]->kode;
    $harga = (float)$cart[$i]->harga;
    $banyaknya = (int)$cart[$i]->banyaknya;
    $sql3 = "INSERT INTO detail_survei_bahan VALUES ('$kode', '$noreg', $harga, $banyaknya);";
    mysqli_query($conn, $sql3);
}
// Clear all product in cart
unset($_SESSION['cart']);
header("location: input-goltar.php?no_reg=$noreg");
?>
 <!-- Thanks for buying products. Click <a href="index.php">here</a> to continue purchasing products. -->
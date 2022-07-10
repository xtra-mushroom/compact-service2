<?php 
require "../functions.php";

$no_ds = $_GET['no_ds'];

$query = mysqli_query($conn, "SELECT pelanggan.*, pendaftaran.cabang FROM pelanggan INNER JOIN pendaftaran ON pelanggan.no_ds = pendaftaran.no_ds WHERE pelanggan.no_ds='$no_ds'");
$bukaTutup = mysqli_fetch_assoc($query);
$data = array(
    'status_ket' => @$bukaTutup['status_ket'],
    'nama' => @$bukaTutup['nama'],
    'alamat' => @$bukaTutup['alamat'],
    'id_wil' => @$bukaTutup['cabang'],
    'no_hp' => @$bukaTutup['no_hp']);

echo json_encode($data);

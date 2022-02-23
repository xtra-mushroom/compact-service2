<?php 
require "../functions.php";

$no_ds = $_GET['no_ds'];

$sql = mysqli_query($conn, "SELECT pendaftaran.id_wil, pendaftaran.alamat, pelanggan.nama, pelanggan.nik, pelanggan.no_hp, pelanggan.no_ds, pelanggan.jenis_kel, pelanggan.ttl FROM pendaftaran INNER JOIN pelanggan ON pendaftaran.no_ds = pelanggan.no_ds WHERE pelanggan.no_ds='$no_ds'");
$balikNama = mysqli_fetch_assoc($sql);
$data = array(
    'id_wil' => @$balikNama['id_wil'],
    'alamat' => @$balikNama['alamat'],
    'nik' => @$balikNama['nik'],
    'nama' => @$balikNama['nama'],
    'no_hp' => @$balikNama['no_hp'],
    'jenis_kel' => @$balikNama['jenis_kel'],
    'ttl' => @$balikNama['ttl']);

echo json_encode($data);
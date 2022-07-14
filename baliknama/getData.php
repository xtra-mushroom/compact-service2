<?php 
require "../functions.php";

$no_ds = $_GET['no_ds'];

$sql = mysqli_query($conn, "SELECT pendaftaran.cabang, antri_daftar.alamat, pelanggan.nama, pelanggan.nik, pelanggan.no_hp, pelanggan.no_ds, pelanggan.jenis_kel FROM pendaftaran INNER JOIN pelanggan ON pendaftaran.no_ds = pelanggan.no_ds INNER JOIN antri_daftar ON pendaftaran.no_reg = antri_daftar.no_reg WHERE pelanggan.no_ds='$no_ds'");
$balikNama = mysqli_fetch_assoc($sql);
$data = array(
    'id_wil' => @$balikNama['cabang'],
    'alamat' => @$balikNama['alamat'],
    'nik' => @$balikNama['nik'],
    'nama' => @$balikNama['nama'],
    'no_hp' => @$balikNama['no_hp'],
    'jenis_kel' => @$balikNama['jenis_kel'],
    'ttl' => @$balikNama['ttl']);

echo json_encode($data);
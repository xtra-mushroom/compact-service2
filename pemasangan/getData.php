<?php 
require "../functions.php";

//variabel nomor pendaftaran yang dikirimkan index.php pemasangan
$no_pend = $_GET['no_pend'];

//mengambil data dari tabel palanggan, tabel pelanggan mengambil data saat input data pemasangan
$query = mysqli_query($conn, "SELECT * FROM pendaftaran where no_pend=$no_pend");
$pemasangan = mysqli_fetch_array($query);
$data = array(
    'nama'      =>  @$pemasangan['nama'],
    'no_ktp'      =>  @$pemasangan['no_ktp'],
    'alamat'   =>  @$pemasangan['alamat'],
    'no_hp'      =>  @$pemasangan['no_hp'],
    'jenis_kel'      =>  @$pemasangan['jenis_kel'],
    'id_wil'    =>  @$pemasangan['id_wil']);

echo json_encode($data);

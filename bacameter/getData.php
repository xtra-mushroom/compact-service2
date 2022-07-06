<?php 
require "../functions.php";

//variabel nomor pendaftaran yang dikirimkan index.php pemasangan
$no_ds = $_GET['no_ds'];

//mengambil data dari tabel palanggan, tabel pelanggan mengambil data saat input data pemasangan
$query = "SELECT pelanggan.no_ds, pelanggan.nama, pelanggan.alamat, pelanggan.id_tarif, pendaftaran.no_ds, pendaftaran.cabang FROM pelanggan INNER JOIN pendaftaran ON pendaftaran.no_ds=pelanggan.no_ds WHERE pelanggan.no_ds='$no_ds'";
$result = mysqli_query($conn, $query);
$dataBaca = mysqli_fetch_array($result);
$data = array(
    'nama'      =>  @$dataBaca['nama'],
    'alamat'   =>  @$dataBaca['alamat'],
    'cabang'   =>  @$dataBaca['cabang'],
    'goltar'    =>  @$dataBaca['id_tarif']);

echo json_encode($data);

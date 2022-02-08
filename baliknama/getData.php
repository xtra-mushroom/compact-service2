<?php 
require "../functions.php";

//variabel ds yang dikirimkan index.php bukatutup
$no_ds = $_GET['no_ds'];

//mengambil data dari tabel palanggan, tabel pelanggan mengambil data saat input data pemasangan
$sql = mysqli_query($conn, "SELECT pendaftaran.id_wil, pendaftaran.alamat, pelanggan.nama, pelanggan.nik, pelanggan.no_hp, pelanggan.no_ds, pelanggan.jenis_kel, pelanggan.ttl FROM pendaftaran INNER JOIN pelanggan ON pendaftaran.no_ds = pelanggan.no_ds WHERE pelanggan.no_ds='$no_ds'");
$data = mysqli_fetch_assoc($sql);

echo json_encode($data);
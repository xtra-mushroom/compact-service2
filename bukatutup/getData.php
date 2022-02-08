<?php 
require "../functions.php";

//variabel ds yang dikirimkan index.php bukatutup
$no_ds = $_GET['no_ds'];

//mengambil data dari tabel palanggan, tabel pelanggan mengambil data saat input data pemasangan
$query = mysqli_query($conn, "SELECT pelanggan.*, pendaftaran.id_wil, pendaftaran.wil FROM pelanggan INNER JOIN pendaftaran ON pelanggan.no_ds = pendaftaran.no_ds WHERE pelanggan.no_ds='$no_ds'");
$data = mysqli_fetch_assoc($query);

echo json_encode($data);

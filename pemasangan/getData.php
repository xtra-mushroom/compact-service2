<?php 
require "../functions.php";

//variabel ds yang dikirimkan index.php bukatutup
$ktp = $_GET['no_ktp'];

//mengambil data dari tabel palanggan, tabel pelanggan mengambil data saat input data pemasangan
$query = mysqli_query($conn, "SELECT * FROM pendaftaran where no_ktp='$ktp'");
$data = mysqli_fetch_assoc($query);

echo json_encode($data);

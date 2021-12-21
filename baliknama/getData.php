<?php 
require "../functions.php";

//variabel ds yang dikirimkan index.php bukatutup
$no_ds = $_GET['no_ds'];

//mengambil data dari tabel palanggan, tabel pelanggan mengambil data saat input data pemasangan
$query = mysqli_query($conn, "SELECT * FROM pendaftaran where no_ds='$no_ds'");
$data = mysqli_fetch_assoc($query);

echo json_encode($data);

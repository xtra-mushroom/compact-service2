<?php 
require "../functions.php";

//variabel ds yang dikirimkan index.php bukatutup
$no_ds = $_GET['no_ds'];

//mengambil data dari tabel palanggan, tabel pelanggan mengambil data saat input data pemasangan
$query = mysqli_query($conn, "SELECT * FROM pelanggan where no_ds='$no_ds'");
$keluhan = mysqli_fetch_assoc($query);
$data = array(
    'nama' => @$keluhan['nama'],
    'alamat' => @$keluhan['alamat'],
    'no_hp' => @$keluhan['no_hp']);

echo json_encode($data);

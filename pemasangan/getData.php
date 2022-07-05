<?php 
require "../functions.php";

//variabel nomor pendaftaran yang dikirimkan index.php pemasangan
$noreg = $_GET['no_reg'];

//mengambil data dari tabel palanggan, tabel pelanggan mengambil data saat input data pemasangan
$query = "SELECT ad.nama, ad.alamat, ad.no_hp, ad.jenis_kel, ad.no_reg, p.no_ktp, p.cabang, p.no_reg, sgn.no_reg, sgn.gol_tarif, sb.no_reg, sb.total_biaya FROM antri_daftar as ad INNER JOIN pendaftaran as p ON ad.no_reg=p.no_reg INNER JOIN survei_goltar_noniaga as sgn ON sgn.no_reg=p.no_reg INNER JOIN survei_bahan as sb ON sb.no_reg=p.no_reg WHERE p.no_reg='$noreg'";
$result = mysqli_query($conn, $query);
$pemasangan = mysqli_fetch_array($result);
$data = array(
    'nama'      =>  @$pemasangan['nama'],
    'no_ktp'      =>  @$pemasangan['no_ktp'],
    'alamat'   =>  @$pemasangan['alamat'],
    'no_hp'      =>  @$pemasangan['no_hp'],
    'jenis_kel'      =>  @$pemasangan['jenis_kel'],
    'cabang'    =>  @$pemasangan['cabang'],
    'goltar'    =>  @$pemasangan['gol_tarif'],
    'biaya'    =>  @$pemasangan['total_biaya']);

echo json_encode($data);

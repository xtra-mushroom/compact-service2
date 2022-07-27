<?php
require "../../functions.php";
require "../../libraries/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$noreg = $_GET['no_reg'];
$sql = "SELECT dsb.*, g.kode, g.jenis, g.nomor, g.nama as nama_bahan, g.ukuran, ad.no_reg, ad.nama as pemohon, ad.alamat FROM detail_survei_bahan as dsb INNER JOIN gudang as g ON dsb.kode_bahan=g.kode INNER JOIN antri_daftar as ad ON dsb.no_reg=ad.no_reg WHERE dsb.no_reg='$noreg' ORDER BY g.nomor ASC;";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

$html = "<html><head>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>

<style>
* {font-family: Arial, Helvetica, sans-serif;}
h4 {text-align:center;}
td {padding-left:5px;}
body {margin-top:-20px;margin-bottom:-20px;}
.table {font-size:.9em;}
</style></head>";

$html .= "<body>";

$html .= "<h4><strong>RINCIAN KEBUTUHAN PEMASANGAN BARU</strong></h4>
<h4><strong>PERUSAHAAN DAERAH AIR MINUM KABUPATEN BALANGAN</strong></h4>";

$html .= "<hr>";

$html .= "<div style='width:25%;position:relative;left:75%;'>
<table class='table table-sm' border='1' align='right'>
<tr class='active'>
    <td style='vertical-align:middle'><b>No. DS : <span style='color:#ffffff'>______________</span></b></td>
</tr>
</table>
</div>";

$html .= "<b><table width='520px' border=0>
<tr>
    <td>NAMA</b></td>
    <td style='color:#ffffff'>__</td>
    <td>:</td>
    <td style='color:#ffffff'>_</td>
    <td width='80%'>".$data['pemohon']."</td>
</tr>
<tr>
    <td valign='top'>ALAMAT</td>
    <td style='color:#ffffff'>__</td>
    <td valign='top'>:</td>
    <td style='color:#ffffff'>_</td>
    <td width='80%'>".$data['alamat']."</td>
</tr>
</table></b><br/>";

$html .= "<b><p>Rincian Kebutuhan Biaya Pemasangan Baru</p></b>";

$html .= "<table class='table table-sm table-condensed' border='1'>
<tr class='active'>
    <td class='text-center'><b>No.</b></td>
    <td class='text-center'><b>Daftar Bahan dan Upah</b></td>
    <td class='text-center'><b>Ukuran (inci)</b></td>
    <td class='text-center text-nowrap'><b>Banyaknya</b></td>
    <td class='text-center'><b>Harga Satuan</b></td>
    <td class='text-center'><b>Sub Total</b></td>
</tr>
<tr class='active'>
    <td class='text-center'><b>A</b></td>
    <td colspan='5'><b>Rincian Bahan</b></td>
</tr>";

$no = 1;
$queryBahan = "SELECT dsb.*, g.kode, g.jenis, g.nomor, g.nama as nama_bahan, g.ukuran, ad.no_reg, ad.nama as pemohon, ad.alamat FROM detail_survei_bahan as dsb INNER JOIN gudang as g ON dsb.kode_bahan=g.kode INNER JOIN antri_daftar as ad ON dsb.no_reg=ad.no_reg WHERE dsb.no_reg='$noreg' AND g.jenis='BAHAN' ORDER BY g.nomor ASC;";
$resultBahan = mysqli_query($conn, $queryBahan);	
if($resultBahan->num_rows > 0){
    while($data1 = $resultBahan->fetch_assoc()){
        $hargaSatuan = $data1['harga'];
        $banyaknya = $data1['banyaknya'];
        $subTotal = $hargaSatuan * $banyaknya;
        $totalBahan += $subTotal;
        $html .= "<tr>
        <td style='text-align:right;'>".$no++."</td>
        <td>".$data1['nama_bahan']."</td>
        <td style='text-align:center;'>".$data1['ukuran']."</td>
        <td style='text-align:center;'>".$banyaknya."</td>
        <td style='text-align:right;'>".rupiah($hargaSatuan)."</td>
        <td style='text-align:right;'>".rupiah($subTotal)."</td>
        </tr>";
    }
    $html .= "<tr class='active'>
        <td colspan='5' style='text-align:right;'><b>Jumlah A</b></td>
        <td style='text-align:right;'><b>".rupiah($totalBahan)."</b></td>
        </tr>";
}else{ // Jika data tidak ada
    echo "<tr><td colspan='6'>Data tidak ditemukan</td></tr>";
}

$html .= "
<tr class='active'>
    <td class='text-center'><b>B</b></td>
    <td colspan='5'><b>Rincian Upah</b></td>
</tr>";

$queryUpah = "SELECT dsb.*, g.kode, g.jenis, g.nomor, g.nama as nama_bahan, g.ukuran, ad.no_reg, ad.nama as pemohon, ad.alamat FROM detail_survei_bahan as dsb INNER JOIN gudang as g ON dsb.kode_bahan=g.kode INNER JOIN antri_daftar as ad ON dsb.no_reg=ad.no_reg WHERE dsb.no_reg='$noreg' AND g.jenis='UPAH' ORDER BY g.nomor ASC;";
$resultUpah = mysqli_query($conn, $queryUpah);	
if($resultUpah->num_rows > 0){
    while($data2 = $resultUpah->fetch_assoc()){
        $hargaSatuan = $data2['harga'];
        $banyaknya = $data2['banyaknya'];
        $subTotal = $hargaSatuan * $banyaknya;
        $totalUpah += $subTotal;
        $html .= "<tr>
        <td style='text-align:right;'>".$no++."</td>
        <td>".$data2['nama_bahan']."</td>
        <td style='text-align:center;'>".$data2['ukuran']."</td>
        <td style='text-align:center;'>".$banyaknya."</td>
        <td style='text-align:right;'>".rupiah($hargaSatuan)."</td>
        <td style='text-align:right;'>".rupiah($subTotal)."</td>
        </tr>";
    }
    $html .= "<tr class='active'>
        <td colspan='5' style='text-align:right;'><b>Jumlah B</b></td>
        <td style='text-align:right;'><b>".rupiah($totalUpah)."</b></td>
        </tr>";
}else{ // Jika data tidak ada
    echo "<tr><td colspan='6'>Data tidak ditemukan</td></tr>";
}

$html .= "<tr>
<td colspan='5' style='text-align:right;'><em>Total dari A + B</em></td>
<td style='text-align:right;'>".rupiah($totalUpah + $totalBahan)."</td>
</tr>";

$totalAB = $totalBahan + $totalUpah;

$html .= "<tr>
<td colspan='5' style='text-align:right;'><em>Biaya Umum Perusahaan 20% dari Total A + B</em></td>
<td style='text-align:right;'>".rupiah($totalAB * 20 / 100)."</td>
</tr>";

$persenUmum = $totalAB * 20 / 100;

$html .= "<tr>
<td colspan='5' style='text-align:right;'><em>Total Biaya</em></td>
<td style='text-align:right;'>".rupiah($totalAB + $persenUmum)."</td>
</tr>";

$totalSeluruh = $totalAB + $persenUmum;
$totalSeluruh = ceil($totalSeluruh);
if (substr($totalSeluruh,-3)>499){
    $totalPembulatan = round($totalSeluruh,-3);
} else {
    $totalPembulatan = round($totalSeluruh,-3)+1000;
} 

$html .= "<tr>
<td colspan='5' style='text-align:right;'><em>Pembulatan Biaya</em></td>
<td style='text-align:right;background:#f5f17d;'><b>".rupiah($totalPembulatan)."</b></td>
</tr>";

$html .= "<tr>
<td colspan='6' align='right'><b>Terbilang : ".Terbilang($totalPembulatan)."</b></td>
</tr>";

$html .= "</table>";

// laod pengesahan
$queryPengesahan = "SELECT pengesahan FROM pendaftaran WHERE no_reg='$noreg'";
$resultPengesahan = mysqli_query($conn, $queryPengesahan);
$dataPengesahan = mysqli_fetch_assoc($resultPengesahan);
if($dataPengesahan['pengesahan'] == "belum"){  
    $QR = "qr-pengesahan/unnamed.png";
}else{
    $QR = $dataPengesahan['pengesahan'];
}

$html .= "<table class='table table-sm table-condensed'style='border-style:none;'>
<tr>
    <td align='center'>Diketahui Oleh :</td>
    <td align='center' width=50%>Diperiksa Oleh :</td>
</tr>
<tr>
    <td align='center'>Plt. Direktur</td>
    <td align='center'>Kabag Administrasi & Keuangan</td>
</tr>
<tr>
    <td>
        <p align='center' style='color:#ffffff'><br/><br/><br/><br/><br/></p>
        <p align='center'><b>MURJANI</b></p>
    </td>
    <td>
        <p align='center'><img src='../../pimpinan/"."$QR"."' width='90px'></p>
        <p align='center'><b>DRAJAT WINDARTO, SE.</b></p>
    </td>
</tr>
</table>";

$html .= "<table class='table table-sm'>
    <tr>
        <td valign='top' align='right'> Paringin, " . tgl_indo(date('Y-m-d')) . "</td>
    </tr>
</table>";

$html .= "</body></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf, attachment = 0 pdf akan dibuka sebelum didownload
$dompdf->stream("Rincian-Kebutuhan-dan-Biaya",array("Attachment"=>0));
?>
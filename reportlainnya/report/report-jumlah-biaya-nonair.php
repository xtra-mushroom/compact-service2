<?php
require ("../../functions.php");
require ("../../libraries/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$html = "<html><head>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>";

$html .="<style>
body { font-family:Arial, Helvetica, sans-serif;
        text-transform: capitalize;
        margin : -25px 0 }
h4{ text-align:center; font-weight:bold; }
table, th, td{ border-collapse: collapse; }
th { text-align:center; background:#a5f2e5; }
th, td{ padding:5px; }
img { object-fit:cover; }
</style>
</head>";

$html .= "<body><img src='../../assets/images/kop-surat.png' width='700px' style='margin-bottom:5px;'><hr/>";

$tgl_awal = @$_GET['tgl_awal'];
$tgl_akhir = @$_GET['tgl_akhir'];
if(empty($tgl_awal) or empty($tgl_akhir)){
    $queryDaftar = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM pendaftaran";
    $queryPasang = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM pemasangan";
    $queryTutup = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM penutupan";
    $queryBuka = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM pembukaan";
    $queryBalik = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM baliknama";
    $label = "Semua data, periode waktu keseluruhan";
  }else{
    $queryDaftar = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM pendaftaran WHERE (tgl_daftar BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
    $queryPasang = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM pemasangan WHERE (tgl_pasang BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
    $queryTutup = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM penutupan WHERE (tgl_tutup BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
    $queryBuka = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM pembukaan WHERE (tgl_buka BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
    $queryBalik = "SELECT SUM(biaya) as biaya, COUNT(*) as total_data FROM baliknama WHERE (tanggal BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
    $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
    $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
    $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
  }

  $pendaftaran = mysqli_query($conn, $queryDaftar);
  $pemasangan = mysqli_query($conn, $queryPasang);
  $penutupan = mysqli_query($conn, $queryTutup);
  $pembukaan = mysqli_query($conn, $queryBuka);
  $baliknama = mysqli_query($conn, $queryBalik);
  $dataDaftar = mysqli_fetch_assoc($pendaftaran);
  $dataPasang = mysqli_fetch_assoc($pemasangan);
  $dataTutup = mysqli_fetch_assoc($penutupan);
  $dataBuka = mysqli_fetch_assoc($pembukaan);
  $dataBalik = mysqli_fetch_assoc($baliknama);
  $totalNonair = $dataDaftar['biaya'] + $dataPasang['biaya'] + $dataTutup['biaya'] + $dataBuka['biaya'] + $dataBalik['biaya'];    

$html .= "<body><h4>Laporan Total Biaya Non Air Masuk</h4>
<h5 align='right' style='margin-right:45px;font-style:italic;'>".$label."</h5>";

$html .= '<table class="table table-sm" border="1">
<tr style="background:#adcded">
    <th scope="col">Jenis Biaya Non Air</th>
    <th scope="col">Jumlah Data</th>
    <th scope="col">Total Biaya</th>
</tr>
<tr>
    <th scope="row" style="font-weight:normal;">Biaya Pendaftaran</th>
    <td align="center">'. $dataDaftar['total_data'] .'</td>
    <td align="right">'. rupiah($dataDaftar['biaya']) .'</td>
</tr>
<tr>
    <th scope="row" style="font-weight:normal;">Biaya Pemasangan</th>
    <td align="center">'. $dataPasang['total_data'] .'</td>
    <td align="right">'. rupiah($dataPasang['biaya']) .'</td>
</tr>
<tr>
    <th scope="row" style="font-weight:normal;">Biaya Penutupan</th>
    <td align="center">'. $dataTutup['total_data'] .'</td>
    <td align="right">'. rupiah($dataTutup['biaya']) .'</td>
</tr>
<tr>
    <th scope="row" style="font-weight:normal;">Biaya Pembukaan</th>
    <td align="center">'. $dataBuka['total_data'] .'</td>
    <td align="right">'. rupiah($dataBuka['biaya']) .'</td>
</tr>
<tr>
    <th scope="row" style="font-weight:normal;">Biaya Balik Nama</th>
    <td align="center">'. $dataBalik['total_data'] .'</td>
    <td align="right">'. rupiah($dataBalik['biaya']) .'</td>
</tr>
<tr>
    <th scope="row">Total Non Air</th>
    <td align="right" colspan=2 style="font-weight:bold;">'. rupiah($totalNonair) .'</td>
</tr>
</table>';
     
$html .= "<table style='padding-top:50px; padding-right:60px;'>
<tbody>
    <tr>
        <td></td>
        <td valign='top' align='center' style='font-size:.9em'> Paringin, " . tgl_indo(date('Y-m-d')) . "</td>
    </tr>
    <tr>
        <td style='color:rgb(0,0,0,0.0);'>_______________________________________________________________</td>
        <td valign='top' align='center'><br/>Plt. Direktur,<br/><br/><br/><br/><br/></td>
    </tr>
    <tr>
        <td></td>
        <td valign='top' align='center'><b><u>MURJANI</u></b><br/>NIK. 63 08 044</td>
    </tr>
</tbody>
</table>";

$html .= "</body></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf, attachment = 0 pdf akan dibuka sebelum di download
$dompdf->stream("[Report] Data Pendaftaran",array("Attachment"=>0));
?>
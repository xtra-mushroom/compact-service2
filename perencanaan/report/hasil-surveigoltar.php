<?php
require "../../functions.php";
require "../../libraries/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$noreg = $_GET['no_reg'];
$sql = "SELECT ad.no_reg, ad.nama, ad.alamat, sgn.* FROM antri_daftar as ad INNER JOIN survei_goltar_noniaga as sgn ON ad.no_reg = sgn.no_reg WHERE ad.no_reg='$noreg'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

// akumulasi nilai
$pondasi = $data['pondasi'];
$dinding = $data['dinding'];
$lantai = $data['lantai'];
$atap = $data['atap'];
$luasBangunan = $data['luas_bangunan'];
$akumulasi = $pondasi + $dinding + $lantai + $atap + $luasBangunan;

$html = "<html><head>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>

<style>
* {font-family: Arial, Helvetica, sans-serif;}
h4 {text-align:center;}
td {padding-left:5px;}
body {margin-top:-20px;margin-bottom:-20px;}
</style></head>";

$html .= "<body>";

$html .= "<h4><strong>FORMULIR ISIAN KLASIFIKASI PELANGGAN</strong></h4>
<h4><strong>PERUSAHAAN DAERAH AIR MINUM KABUPATEN BALANGAN</strong></h4>";

$html .= "<hr>";

$html .= "<div style='width:25%;position:relative;left:75%;'>
<table class='table table-sm' border='1' align='right'>
<tr class='active'>
    <td style='vertical-align:middle'><b>No. DS : <span style='color:#ffffff'>____________</span></b></td>
</tr>
</table>
</div>";

$html .= "<b><table width='520px' border=0>
<tr>
    <td>NAMA</b></td>
    <td style='color:#ffffff'>__</td>
    <td>:</td>
    <td style='color:#ffffff'>_</td>
    <td width='80%'>".$data['nama']."</td>
</tr>
<tr>
    <td valign='top'>ALAMAT</td>
    <td style='color:#ffffff'>__</td>
    <td valign='top'>:</td>
    <td style='color:#ffffff'>_</td>
    <td width='80%'>".$data['alamat']."</td>
</tr>
</table></b><br/>";

if($data['gol_tarif'] == SU){
    $SU = "black";
    $SK = $R1 = $R2 = $R3 = $IP = $NK = $NB = "white";
}elseif($data['gol_tarif'] == SK){
    $SK = "black";
    $SU = $R1 = $R2 = $R3 = $IP = $NK = $NB = "white";
}elseif($data['gol_tarif'] == R1){
    $R1 = "black";
    $SK = $SU = $R2 = $R3 = $IP = $NK = $NB = "white";
}elseif($data['gol_tarif'] == R2){
    $R2 = "black";
    $SK = $R1 = $SU = $R3 = $IP = $NK = $NB = "white";
}elseif($data['gol_tarif'] == R3){
    $R3 = "black";
    $SK = $R1 = $R2 = $SU = $IP = $NK = $NB = "white";
}elseif($data['gol_tarif'] == IP){
    $IP = "black";
    $SK = $R1 = $R2 = $R3 = $SU = $NK = $NB = "white";
}elseif($data['gol_tarif'] == NK){
    $NK = "black";
    $SK = $R1 = $R2 = $R3 = $IP = $SU = $NB = "white";
}elseif($data['gol_tarif'] == NB){
    $NB = "black";
    $SK = $R1 = $R2 = $R3 = $IP = $NK = $SU = "white";
}

$html .= "<table>
<tr>
    <td style='color:#ffffff'>----</td>
    <td>A. NIAGA</td>
    <td style='color:#ffffff'>----</td>
    <td style='color:#ffffff'>----</td>
    <td>B. SOSIAL</td>
    <td style='color:#ffffff'>----</td>
    <td style='color:#ffffff'>----</td>
    <td>C. NON NIAGA</td>
    <td style='color:#ffffff'>----</td>
    <td style='color:#ffffff'>----</td>
    <td style='color:#ffffff'>----</td>
</tr>
<tr>
    <td style='border-style:groove;background:".$NK.";'><p style='color:".$NK.";'>___</p></td>
    <td>Niaga Kecil</td>
    <td style='color:#ffffff'>----</td>
    <td style='border-style:groove;background:".$SU.";'><p style='color:".$SU.";'>___</p></td>
    <td>Sosial Umum</td>
    <td style='color:#ffffff'>----</td>
    <td style='border-style:groove;background:".$R1.";'><p style='color:".$R1.";'>___</p></td>
    <td>Rumah Tangga 1</td>
    <td style='color:#ffffff'>----</td>
    <td style='border-style:groove;background:".$IP.";'><p style='color:".$IP.";'>___</p></td>
    <td>Instansi Pemerintah</td>
</tr>
<tr>
    <td style='border-style:groove;background:".$NB.";'><p style='color:".$NB.";'>___</p></td>
    <td>Niaga Besar</td>
    <td style='color:#ffffff'>----</td>
    <td style='border-style:groove;background:".$SK.";'><p style='color:".$SK.";'>___</p></td>
    <td>Sosial Khusus</td>
    <td style='color:#ffffff'>----</td>
    <td style='border-style:groove;background:".$R2.";'><p style='color:".$R2.";'>___</p></td>
    <td>Rumah Tangga 2</td>
    <td style='color:#ffffff'>----</td>
    <td style='color:#ffffff'>----</td>
    <td style='color:#ffffff'>----</td>
</tr>
<tr>
    <td style='color:#ffffff'>----</td>
    <td style='color:#ffffff'>----</td>
    <td style='color:#ffffff'>----</td>
    <td style='color:#ffffff'>----</td>
    <td style='color:#ffffff'>----</td>
    <td style='color:#ffffff'>----</td>
    <td style='border-style:groove;background:".$R3.";'><p style='color:".$R3.";'>___</p></td>
    <td>Rumah Tangga 3</td>
    <td style='color:#ffffff'>----</td>
    <td style='color:#ffffff'>----</td>
    <td style='color:#ffffff'>----</td>
</tr>
</table><br/>";

$html .= "<em><p>Khusus untuk klasifikasi Rumah Tangga (NON NIAGA) menggunakan indikator penilaian dan data terukur :</p></em>";

$html .= "<table class='table table-sm' border='1'>
<tr class='active text-bold'>
    <td rowspan='2' class='text-center' style='vertical-align:middle'><strong>Indikator Penilaian</strong></td>
    <td colspan='3' class='text-center' style='vertical-align:middle'><strong>Poin</strong></td>
    <td rowspan='2' class='text-center' style='vertical-align:middle'><strong>Nilai</strong></td>
</tr>
<tr class='active text-bold'>
    <td class='text-center'><strong>2</strong></td>
    <td class='text-center'><strong>3</strong></td>
    <td class='text-center'><strong>4</strong></td>
</tr>
<tr>
    <td class='text-center'>Pondasi</td>
    <td class='text-center'>Kayu Biasa</td>
    <td class='text-center'>Kayu Ulin</td>
    <td class='text-center text-nowrap'>Pasangan Batu / Cor</td>
    <td class='text-center'>".$data['pondasi']."</td>
</tr>
<tr>
    <td class='text-center'>Dinding</td>
    <td class='text-center'>Papan Biasa / Seng / Kalsiboard</td>
    <td class='text-center'>Campuran Papan dan Bata / Plesteran</td>
    <td class='text-center'>Papan Ulin / Bata / Beton</td>
    <td class='text-center'>".$data['dinding']."</td>
</tr>
<tr>
    <td class='text-center'>Lantai</td>
    <td class='text-center'>Papan Biasa</td>
    <td class='text-center text-nowrap'>Rabat Tanpa Keramik</td>
    <td class='text-center'>Papan Ulin / Keramik</td>
    <td class='text-center'>".$data['lantai']."</td>
</tr>
<tr>
    <td class='text-center'>Atap</td>
    <td class='text-center'>Daun</td>
    <td class='text-center'>Seng / Asbes</td>
    <td class='text-center'>Sirap / Metal / Dak / Genteng</td>
    <td class='text-center'>".$data['atap']."</td> 
</tr>
<tr>
    <td class='text-center test-nowrap border-dark'>Luas Bangunan</td>
    <td class='text-center text-nowrap border-dark'>Kurang dari 36 m<sup>2</sup></td>
    <td class='text-center border-dark'>36 - 200 m<sup>2</sup></td>
    <td class='text-center border-dark'>Lebih dari 200 m<sup>2</sup></td>
    <td class='text-center border-dark'>".$data['luas_bangunan']."</td>
</tr>
<tr>
    <td colspan='4' class='text-center test-nowrap border-dark'>Akumulasi Nilai</td>
    <td class='text-center text-nowrap border-dark'>".$akumulasi."</td>
</tr>
</table><br/>";

$html .= "<table class='table table-sm' border='1'>
<tr>
    <td class='text-bold active text-center border-dark'><strong>Akumulasi Nilai</strong></td>
    <td class='text-center border-dark'>10</td>
    <td class='text-center border-dark'>11 - 19</td>
    <td class='text-center border-dark'>20</td>
</tr>
<tr>
    <td class='text-bold active text-center border-dark'><strong>Golongan</strong></td>
    <td class='text-center border-dark'>Rumah Tangga 1</td>
    <td class='text-center border-dark'>Rumah Tangga 2</td>
    <td class='text-center border-dark'>Rumah Tangga 3</td>
</tr>
</table><br/>";

$html .= "<table class='table table-sm' border='1'>
<tr>
    <td align='center'>Tanda Tangan Pelanggan</td>
    <td align='center'>Tanda Tangan Petugas Pelayanan</td>
    <td align='center'>Tanda Tangan Petugas Survei</td>
</tr>
<tr>
    <td>
        <p style='color:#ffffff'>_<br/>_<br/></p>
        <p align='center'>......................................</p>
    </td>
    <td>
        <p style='color:#ffffff'>_<br/>_<br/></p>
        <p align='center'>......................................</p>
    </td>
    <td>
        <p style='color:#ffffff'>_<br/>_<br/></p>
        <p align='center'>......................................</p>
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
$dompdf->stream("Klasifikasi-Golongan-Tarif",array("Attachment"=>0));
?>
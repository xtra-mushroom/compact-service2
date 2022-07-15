<?php
require ("../../functions.php");
require ("../../libraries/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$html = "<html><head>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
<style>
body { font-family:Arial, Helvetica, sans-serif;
        text-transform: capitalize;
        margin : -25px 0 }
h4{ text-align:center; font-weight:bold; margin-bottom:20px; }
table, th, td{ border-collapse: collapse; }
th { text-align:center; background:#adcded; }
th, td{ padding:5px; font-size:.9em; }
img { object-fit:cover; }
</style>";

$html .= "<body><img src='../../assets/images/kop-surat.png' width='700px' style='margin-bottom:5px;'><hr/>";

$tgl_awal = @$_GET['tgl_awal'];
$tgl_akhir = @$_GET['tgl_akhir'];
if(empty($tgl_awal) or empty($tgl_akhir)){
    $query = "SELECT * FROM keluhan WHERE jenis_penanganan='Butuh observasi dan tindak lanjut' ORDER BY no_keluhan DESC LIMIT 10";
    $label = "10 data keluhan terbaru yang diobservasi";
}else{
    $query = "SELECT * FROM keluhan WHERE jenis_penanganan='Butuh observasi dan tindak lanjut' AND (tgl_keluhan BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."') ORDER BY no_keluhan ASC";
    $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
    $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
    $label = 'Periode Tanggal <b>'.$tgl_awal.'</b> s/d <b>'.$tgl_akhir.'</b>';
}

$html .= "<body><h4>Laporan Jumlah Observasi Keluhan Pelanggan</h4>
<h5 align='right' style='margin-right:45px;font-style:italic;'>".$label."</h5>";

$html .= '<table class="table table-sm" border="1">
<tr>
<th>No.</th>
<th>Nomor Sambungan</th>
<th>Alamat / Lokasi</th>
<th>Tanggal Keluhan</th>
<th>Keluhan</th>
<th>Penanganan</th>
</tr>';

$result = $conn->query($query);	
$row = mysqli_num_rows($result);

if($row > 0){
    $no = 1;
    while($data = $result->fetch_array())
    {

    $html .= '<tr>
    <td align="center">'.$no++.'</td>
    <td align="center">'.$data['no_ds'].'</td>
    <td align="left">'.$data['alamat'].'</td>
    <td align="center">'.$data['tgl_keluhan'].'</td>
    <td align="left">'.$data['keluhan'].'</td>
    <td align="left">'.$data['penanganan'].'</td>
</tr>';
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='6'>Data tidak tersedia</td></tr>";
}

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
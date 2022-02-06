<?php
require ("../../functions.php");
require ("../../libraries/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$html = "<html><head><style>
body { font-family:Arial, Helvetica, sans-serif;
        text-transform: capitalize;
        margin : -25px 0 }
h3{ text-align:center; }
table, th, td{ border-collapse: collapse; }
th { text-align:center; }
th, td{ padding:5px; }
img { object-fit:cover; }
</style>";

$html .= "<body><img src='../../layout/dist/img/kop-surat.png' width='700px' style='margin-bottom:5px;'><hr/>";

$tgl_awal = @$_GET['tgl_awal'];
$tgl_akhir = @$_GET['tgl_akhir'];
if(empty($tgl_awal) or empty($tgl_akhir)){
    $query = "SELECT id_wil, wil, COUNT(*) as jumlah_pendaftaran from pendaftaran GROUP BY wil ORDER BY id_wil ASC";
    $label = "Semua Data, Per-Cabang";
  }else{
    $query = "SELECT id_wil, wil, COUNT(*) as jumlah_pendaftaran from pendaftaran WHERE (tgl_daftar BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."') GROUP BY wil ORDER BY id_wil ASC";
    $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
    $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
    $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
  }

$html .= "<body><h3>Laporan Jumlah Data Pendaftaran Per-cabang / Wilayah</h3>
<h5 align='right' style='margin-right:45px;'>".$label."</h5>";

$html .= '<table border="1" width="90%" align="center">
 <tr>
 <th>ID Wilayah</th>
 <th>Wilayah / Cabang</th>
 <th>Jumlah Pendaftaran Per-cabang</th>
 </tr>';

$result = $conn->query($query);	
$row = mysqli_num_rows($result);
if($row > 0){
    while($data = $result->fetch_array())
    {
    $html .= "<tr>
    <td style='text-align:center;'>".$data['id_wil']."</td>
    <td style='text-align:center;'>".$data['wil']."</td>
    <td style='text-align:center;'>".$data['jumlah_pendaftaran']."</td>
    </tr>";
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='5'>Data tidak ditemukan</td></tr>";
}

$html .= "<table style='padding-top:50px; padding-right:60px;'>
<tbody>
    <tr>
        <td></td>
        <td valign='top' align='center' style='font-size:.9em'> Paringin, " . tgl_indo(date('Y-m-d')) . "</td>
    </tr>
    <tr>
        <td style='color:rgb(0,0,0,0.0);'>________________________________________________</td>
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
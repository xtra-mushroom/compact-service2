<?php
require "../../functions.php";
require "../../dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$query = mysqli_query($conn,"SELECT * FROM pendaftaran");
// $dompdf->set_base_path("../layout/dist/css/style.css");
// $html = file_get_contents("konten-pdfnya.html");
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

$html .= "<body><img src='../../layout/dist/img/kop-surat.png' width='1025px' style='margin-bottom:5px;'><hr/>";

$html .= "<body><h3>Laporan Data Permohonan Langganan Baru</h3>";
$html .= '<table border="1" width="100%">
 <tr>
 <th>No Pendaftaran</th>
 <th>Tanggal Daftar</th>
 <th>Nomor KTP</th>
 <th>Nama</th>
 <th>Jenis Kelamin</th>
 <th>Alamat</th>
 <th>Nomor HP</th>
 <th>Wilayah</th>
 </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td style='text-align:center;'>".$no++."</td>
 <td>".$row['tgl_daftar']."</td>
 <td>".$row['no_ktp']."</td>
 <td>".$row['nama']."</td>
 <td>".$row['jenis_kel']."</td>
 <td>".$row['alamat']."</td>
 <td>".$row['no_hp']."</td>
 <td align='center'>".$row['wil']."</td>
 </tr>";
}

$html .= "<table style='padding:50px 10px;'>
<tbody>
    <tr>
        <td></td>
        <td valign='top' align='center'> Paringin, " . tgl_indo(date('Y-m-d')) . "</td>
    </tr>
    <tr>
        <td style='color:rgb(0,0,0,0.0);'>__________________________________________________________________________________</td>
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
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf, attachment = 0 pdf akan dibuka sebelum di download
$dompdf->stream("[Report] Data Pendaftaran",array("Attachment"=>0));
?>
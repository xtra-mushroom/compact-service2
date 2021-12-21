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
        text-transform: capitalize; }
h3{ text-align:center; }
table, th, td{ border-collapse: collapse; }
th { text-align:center; }
th, td{ padding:5px; }
img { object-fit:cover; }
</style>";

$html .= "<body><h3>Data Permohonan Langganan Baru</h3><hr/><br/>";
$html .= '<table border="1" width="100%">
 <tr>
 <th>No Pendaftaran</th>
 <th>Tanggal Daftar</th>
 <th>Nomor KTP</th>
 <th>Nama</th>
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
 <td>".$row['alamat']."</td>
 <td>".$row['no_hp']."</td>
 <td>".$row['wil']."</td>
 </tr>";
}
$html .= "</body></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf, attachment = 0 pdf akan dibuka sebelum di download
$dompdf->stream("[Report] Data Pendaftaran",array("Attachment"=>0));
?>
<?php
include('../../functions.php');
require_once("../../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$sql = "SELECT * FROM pemasangan";
$result = $conn->query($sql);

// $dompdf->set_base_path("../layout/dist/css/style.css");
// $html = file_get_contents("konten-pdfnya.html");
$html = "<html><head><style>
body { font-family:Arial, Helvetica, sans-serif;
        text-transform: capitalize; }
h3{ text-align:center; }
table, th, td{ border-collapse: collapse; }
th { text-align:center; }
th, td{ padding:5px; }

</style>";
$html .= "<body><h3>Data Pemasangan Baru</h3><hr/><br/>";
$html .= '<table border="1" width="100%">
 <tr>
 <th>No</th>
 <th>Nomor KTP</th>
 <th>Nama</th>
 <th>Tanggal Lahir</th>
 <th>PLN</th>
 <th>Alamat</th>
 <th>Nomor HP</th>
 <th>Cabang</th>
 <th>Gol Tarif</th>
 <th>Biaya</th>
 </tr>';
 $no = "1";
while($row = $result->fetch_assoc())
{
 $html .= "<tr>
 <td style='text-align:center;'>".$no++."</td>
 <td>".$row['no_ktp']."</td>
 <td>".$row['nama']."</td>
 <td>".$row['tgl_lahir']."</td>
 <td>".$row['pln']."</td>
 <td>".$row['alamat']."</td>
 <td>".$row['no_hp']."</td>
 <td>".$row['cabang']."</td>
 <td>".$row['gol_tarif']."</td>
 <td>".$row['biaya']."</td>
 </tr>";
}
$html .= "</body></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf, attachment = 0 pdf akan di buka sebelum di download
$dompdf->stream("[Report] Data Pendaftaran",array("Attachment"=>0));
?>
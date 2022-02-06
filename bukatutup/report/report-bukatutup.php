<?php
include('../../functions.php');
require_once("../../librariesdompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$query = "SELECT * FROM pembukaan;";
$result = $conn->query($query);
// $query .= "SELECT * FROM penutupan";

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
$html .= "<body><h3>Data Pembukaan Sambungan</h3><hr/><br/>";
$html .= '<table border="1" width="100%">
 <tr>
 <th>No</th>
 <th>Tanggal Buka</th>
 <th>Nomor Sambungan</th>
 <th>Nama</th>
 <th>Alamat</th>
 <th>Nomor HP</th>
 <th>Keterangan</th>
 </tr>';
$no = 1;
while($row = mysqli_fetch_assoc($result))
{
 $html .= "<tr>
 <td style='text-align:center;'>".$no++."</td>
 <td>".$row['tgl_buka']."</td>
 <td>".$row['no_ds']."</td>
 <td>".$row['nama']."</td>
 <td>".$row['alamat']."</td>
 <td>".$row['no_hp']."</td>
 <td>".$row['keterangan']."</td>
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
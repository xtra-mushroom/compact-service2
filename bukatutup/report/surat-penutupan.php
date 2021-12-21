<?php
require "../../functions.php";
require "../../dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$ds = $_GET['no_ds'];
$sql = "SELECT * FROM pelanggan where no_ds=$ds";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
// $dompdf->set_base_path("../layout/dist/css/style.css");
// $html = file_get_contents("konten-pdfnya.html");
$html = "<html><head><style>
body { font-family:Times New Roman, Times, serif;
        margin: -10px 0px; font-size: 0.9em; }
h3 { text-align:center; }
.ddots{ padding-left:15px; padding-right: 8px; }

</style></head>";

$html .= "<body><img src='../../layout/dist/img/kop-surat.png' width='469px' style='margin-bottom:5px;'>";

$html .= "<hr><h3>SURAT PERINTAH PENUTUPAN</h3>";

$html .= "<p align='justify'>Dengan ini diperintahkan kepada :</p>";

$html .= "<table style='margin-left:40px;'>
<tbody>
    <tr>
        <td>Nama</td>
        <td class='ddots'>:</td>
        <td><b>Abdul Halim</b></td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td class='ddots'>:</td>
        <td><b>Staf Transmisi Distribusi</b></td>
    </tr>
</tbody>
</table>";

$html .= "<p align='justify'>Untuk melaksanakan Penutupan Sambungan Air Minum :</p>";

$html .= "<table style='margin-left:40px;'>
<tbody>
    <tr>
        <td>Nama</td>
        <td class='ddots'>:</td>
        <td><b>" . $data['nama'] . "</b></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td class='ddots'>:</td>
        <td><b>" . $data['alamat'] . "</b></td>
    </tr>
    <tr>
        <td>No. DS</td>
        <td class='ddots'>:</td>
        <td><b>" . $data['no_ds'] . "</b></td>
    </tr>
    <tr>
        <td>No. Hp</td>
        <td class='ddots'>:</td>
        <td><b>" . $data['no_hp'] . "</b></td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td class='ddots'>:</td>
        <td><b>Permintaan Sendiri / Penutupan Otomatis</b></td>
    </tr>
</tbody>
</table>"; //keterangan bisa dicoret salah satu yang tidak dipilih

$html .= "<p>Demikian agar dilaksanakan dengan penuh tanggung jawab.</p>";

$html .= "<table style='padding:0px 15px;'>
<tbody>
    <tr>
        <td></td>
        <td></td>
        <td valign='top' align='center' style='padding-bottom:10px;'> Paringin, " . tgl_indo(date('Y-m-d')) . "</td>
    </tr>
    <tr>
        <td valign='bottom' align='center'>Pemilik Sambungan<br/><br/><br/><br/><br/></td>
        <td><div style='color:rgb(0,0,0,0.0);'>____________</div></td>
        <td valign='top' align='center' style='font-size:0.9em;'>PERUSAHAAN DAERAH AIR MINUM<br>KABUPATEN BALANGAN<br/><br/><br/><br/><br/></td>
    </tr>
    <tr>
        <td valign='top' align='center' style='text-decoration:underline; font-weight:bold; font-size:0.9em; text-transform:uppercase;'>" . $data['nama'] . "</td>
        <td><div style='color:rgb(0,0,0,0.0);'>____________</div></td>
        <td valign='top' align='center' style='font-size:0.9em;'><b><u>MURJANI</u></b><br/>Plt. DIREKTUR</td>
    </tr>
</tbody>
</table>";

$html .= "</body></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A5', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf, attachment = 0 pdf akan di buka sebelum di download
$dompdf->stream("Surat Pernyataan Pelanggan",array("Attachment"=>0));
?>
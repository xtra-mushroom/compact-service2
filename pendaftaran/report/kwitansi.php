<?php
session_start();
require "../../functions.php";
require "../../libraries/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$noreg = $_GET['no_reg'];
$sql = "SELECT * FROM antri_daftar WHERE no_reg=$noreg";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

$ratusan = substr($noreg, -3);
$nominalBayar = "20".$ratusan;

// agar yang tampil adalah nama kecamatannya
// $valueKec = $data['kecamatan'];
// $queryKec = "SELECT * FROM kecamatan WHERE id='$valueKec'";
// $resultKec = $conn->query($queryKec);
// $dataKec = $resultKec->fetch_assoc();
// if($data['kecamatan'] == $dataKec['id']){
//     $namaKec = $dataKec['nama'];
// }

// // agar yang tampil adalah nama desanya
// $valueDesa = $data['desa'];
// $queryDesa = "SELECT * FROM desa WHERE id='$valueDesa'";
// $resultDesa = $conn->query($queryDesa);
// $dataDesa = $resultDesa->fetch_assoc();
// if($data['desa'] == $dataDesa['id']){
//     $namaDesa = $dataDesa['nama'];
// }

$html = "<html><head><style>
body { font-family:Times New Roman, Times, serif;
        margin: -35px 45px; font-size: 0.9em; }
#title{ text-align:center; font-weight:900; }
.ddots{ padding-left:15px; padding-right: 8px; }

</style></head>";

$html .= "<body><img src='../../assets/images/kop-surat.png' width='610px' style='margin-bottom:5px;'>";

$html .= "<hr>";

$html .= "<table>
<tbody>
    <tr>
        <td>No. Pendaftaran</td>
        <td class='ddots'>:</td>
        <td width=460px><b><span style='border-style:solid; border-width:2px; padding:3px; margin-right:3px;'>" . $data['no_reg'] . "</span>/Pend/PDAM/10/2022/01</b></td>
    </tr>
    <tr>
        <td>Terima Dari</td>
        <td class='ddots'>:</td>
        <td style='text-transform: uppercase;'><b>" . $data['nama'] . "</b></td>
    </tr>
    <tr>
        <td></td>
        <td class='ddots'></td>
        <td style='text-transform: capitalize;'><b>" . $data['alamat'] . "</b></td>
    </tr>
</tbody>
</table><br/>";

$html .= "<table width=80%>
<tbody>
    <tr>
        <td>Uang Sejumlah</td>
        <td class='ddots'>:</td>
        <td width='70%'><div style='background-color:grey; text-align:center; text-transform:uppercase;'><b>".terbilang($nominalBayar)."</b></div></td>
    </tr>
    <tr>
        <td>Pembayaran</td>
        <td class='ddots'>:</td>
        <td width='70%'><b>Biaya Pendaftaran Sambungan Baru</b></td>
    </tr>
</tbody>
</table><br/><br/>";

$html .= "<table style='padding:10px 30px;'>
<tbody>
    <tr>
        <td></td>
        <td valign='top' align='center'> Paringin, " . tgl_indo(date('Y-m-d')) . "</td>
    </tr>
    <tr>
        <td style='color:rgb(0,0,0,0.0);'>__________________________________________________</td>
        <td valign='top' align='center'><br/>Plt. Direktur,<br/><br/><br/><br/><br/></td>
    </tr>
    <tr>
        <td></td>
        <td valign='top' align='center'><b><u>MURJANI</u></b><br/>NIK. 63 08 044</td>
    </tr>
</tbody>
</table>";

$html .= "<table>
<tbody>
    <tr>
        <td>Nominal</td>
        <td>:</td>
        <td align='right' style='padding:5px; width:100px; background-color:#b8b6b0;'>
            <b>".rupiah($nominalBayar)."</b>
        </td>
    </tr>
</tbody>
</table>";

$html .= "</body></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A5', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf, attachment = 0 pdf akan dibuka sebelum didownload
$dompdf->stream("Surat Pernyataan Pelanggan",array("Attachment"=>0));
?>
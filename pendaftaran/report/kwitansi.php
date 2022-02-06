<?php
require "../../functions.php";
require "../../libraries/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$cari = $_GET['no_pend'];
$sql = "SELECT * FROM pendaftaran where no_pend=$cari";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

// agar yang tampil adalah nama kecamatannya
$valueKec = $data['kecamatan'];
$queryKec = "SELECT * FROM kecamatan WHERE id='$valueKec'";
$resultKec = $conn->query($queryKec);
$dataKec = $resultKec->fetch_assoc();
if($data['kecamatan'] == $dataKec['id']){
    $namaKec = $dataKec['nama'];
}

// agar yang tampil adalah nama desanya
$valueDesa = $data['desa'];
$queryDesa = "SELECT * FROM desa WHERE id='$valueDesa'";
$resultDesa = $conn->query($queryDesa);
$dataDesa = $resultDesa->fetch_assoc();
if($data['desa'] == $dataDesa['id']){
    $namaDesa = $dataDesa['nama'];
}

$html = "<html><head><style>
body { font-family:Times New Roman, Times, serif;
        margin: -15px 45px; font-size: 0.9em; }
#title{ text-align:center; font-weight:900; }
.ddots{ padding-left:15px; padding-right: 8px; }

</style></head>";

$html .= "<body><img src='../../layout/dist/img/kop-surat.png' width='610px' style='margin-bottom:5px;'>";

$html .= "<hr>";

$html .= "<table>
<tbody>
    <tr>
        <td>No. Pendaftaran</td>
        <td class='ddots'>:</td>
        <td width=460px><b><span style='border-style:solid; border-width:2px; padding:3px; margin-right:3px;'>" . $data['no_pend'] . "</span>/Pend/PDAM/10/2022/01</b></td>
    </tr>
    <tr>
        <td>Terima Dari</td>
        <td class='ddots'>:</td>
        <td style='text-transform: uppercase;'><b>" . $data['nama'] . "</b></td>
    </tr>
    <tr>
        <td></td>
        <td class='ddots'></td>
        <td style='text-transform: capitalize;'><b>" . $data['alamat'] . ', ' . $namaDesa . ', Kec. ' . $namaKec . "</b></td>
    </tr>
</tbody>
</table><br/>";

$html .= "<table>
<tbody>
    <tr>
        <td>Uang Sejumlah</td>
        <td class='ddots'>:</td>
        <td><div style='background-color:grey; text-align:center;'><b>DUA PULUH RIBU RUPIAH</b></div></td>
    </tr>
    <tr>
        <td>Pembayaran</td>
        <td class='ddots'>:</td>
        <td><b>Biaya Pendaftaran Sambungan Baru</b></td>
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
        <td>Terbilang</td>
        <td>:</td>
        <td style='padding:5px; width:150px; background-color:#b8b6b0;'>
            <b>Rp. <span style='margin-left:82px; margin-right:0px;'>20,000</span></b>
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
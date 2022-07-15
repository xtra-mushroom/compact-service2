<?php
require "../../functions.php";
require "../../libraries/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$id = $_GET['id'];
$sql = "SELECT * FROM keluhan WHERE no_keluhan='$id'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
$tgl_keluhan = $data['tgl_keluhan'];
$tgl_tangani = $data['tgl_tangani'];

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

$html = "<html><head>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
<style>
body { font-family:Times New Roman, Times, serif;
        margin: -10px 45px;  }
#title{ text-align:center; font-weight:900; }
.ddots{ padding-left:15px; padding-right: 8px; }

</style>";

$html .= "<body><img src='../../assets/images/kop-surat.png' width='610px' style='margin-bottom:5px;'>";

$html .= "<hr><br/><h5 id='title'><u>LAPORAN HASIL PENANGANAN KELUHAN</u></h5><br/>";

$html .= "<p align='justify'>Sesuai dengan keluhan yang telah anda sampaikan kepada Pihak PDAM Kab. Balangan, anda yang bertanda tangan di bawah ini :</p>";

$html .= "<table>
<tbody>
    <tr>
        <td>Nama</td>
        <td class='ddots'>:</td>
        <td style='text-transform:capitalize;'><b>" . $data['nama'] . "</b></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td class='ddots'>:</td>
        <td style='text-transform:capitalize;' width='450px'><b>" . $data['alamat'] . "</b></td>
    </tr>
    <tr>
        <td>No. Hp</td>
        <td class='ddots'>:</td>
        <td style='text-transform:capitalize;'><b>" . $data['no_hp'] . "</b></td>
    </tr>
    <tr>
        <td>No. DS</td>
        <td class='ddots'>:</td>
        <td style='text-transform:capitalize;'><b>" . $data['no_ds'] . "</b></td>
    </tr>
    <tr>
        <td>Tanggal Keluhan</td>
        <td class='ddots'>:</td>
        <td><b>" . tgl_indo(date($tgl_keluhan)) . "</b></td>
    </tr>
    <tr>
        <td>Isi keluhan</td>
        <td class='ddots'>:</td>
        <td><b>" . $data['keluhan'] . "</b></td>
    </tr>
</tbody>
</table>";

$html .= "<br/><p>Dengan ini pihak PDAM Kab. Balangan menyatakan bahwa masalah telah diatasi dengan detail penanganan sebagai berikut :</p>";

$html .= "<table>
    <tbody>
        <tr>
            <td valign='top' class='text-nowrap'>Tanggal Penindakan</td>
            <td valign='top' class='ddots'>:</td>
            <td valign='top'>" . tgl_indo(date($tgl_tangani)) . "</td>
        </tr>
        <tr>
            <td valign='top'>Status Penanganan</td>
            <td valign='top' class='ddots'>:</td>
            <td valign='top'>" . $data['jenis_penanganan'] . "</td>
        </tr>
        <tr>
            <td valign='top'>Detail Penanganan</td>
            <td valign='top' class='ddots'>:</td>
            <td valign='top'>" . $data['penanganan'] . "</td>
        </tr>
        <tr>
            <td valign='top'>Catatan</td>
            <td valign='top' class='ddots'>:</td>
            <td valign='top'>" . $data['catatan'] . "</td>
        </tr>
    </tbody>
</table>
<br/><br/><br/>";

$html .= "<table style='padding:0px 20px;'>
<tbody>
    <tr>
        <td></td>
        <td><div style='color:rgb(0,0,0,0.0);'>_________________________</div></td>
        <td valign='top' align='center'> Paringin, " . tgl_indo(date('Y-m-d')) . "</td>
    </tr>
    <tr>
        <td valign='top' align='center' style='padding-top: 15px;'>PETUGAS<br/><br/><br/><br/><br/><br/></td>
        <td><div style='color:rgb(0,0,0,0.0);'>________________________________</div></td>
        <td valign='top' align='center' style='padding-top: 15px;'>Pelanggan<br/><br/><br/><br/><br/><br/></td>
    </tr>
    <tr>
        <td valign='top'><b>______________________</b></td>
        <td><div style='color:rgb(0,0,0,0.0);'>_________________________</div></td>
        <td valign='top' align='center' style='text-decoration:underline; font-weight:bold;'>" . $data['nama'] . "</td>
    </tr>
</tbody>
</table>";

$html .= "</body></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf, attachment = 0 pdf akan di buka sebelum di download
$dompdf->stream("Surat Pernyataan Sudah Terpasang",array("Attachment"=>0));
?>
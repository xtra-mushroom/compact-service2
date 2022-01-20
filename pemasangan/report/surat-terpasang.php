<?php
require "../../functions.php";
require "../../dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$cari = $_GET['no_ds'];
$sql = "SELECT * FROM pemasangan where no_ds=$cari";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
// $dompdf->set_base_path("../layout/dist/css/style.css");
// $html = file_get_contents("konten-pdfnya.html");
$html = "<html><head><style>
body { font-family:Times New Roman, Times, serif;
        margin: -10px 45px; font-size: 0.9em; }
#title{ text-align:center; font-weight:900; }
.ddots{ padding-left:15px; padding-right: 8px; }

</style>";

$html .= "<body><img src='../../layout/dist/img/kop-surat.png' width='610px' style='margin-bottom:5px;'>";

$html .= "<hr><br/><p id='title'><u>SURAT PERNYATAAN SUDAH TERPASANG</u></p><br/>";

$html .= "<p align='justify'>Sesuai dengan permohonan yang saya ajukan kepada Pihak PDAM Kab. Balangan tentang permohonan sebagai pelanggan baru, maka dengan ini menyatakan bahwa telah dipasang oleh Pihak PDAM Kab. Balangan Meter Air di tempat saya dan saya yang bertanda tangan di bawah ini :</p>";

$html .= "<table>
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
        <td>No. Hp</td>
        <td class='ddots'>:</td>
        <td><b>" . $data['no_hp'] . "</b></td>
    </tr>
    <tr>
        <td>No. DS</td>
        <td class='ddots'>:</td>
        <td><b>" . $data['no_ds'] . "</b></td>
    </tr>
    <tr>
        <td>Tanggal Terpasang</td>
        <td class='ddots'>:</td>
        <td><b>...........................</b></td>
    </tr>
</tbody>
</table>";

$html .= "<br/><p>Dengan ini saya menyatakan bahwa :</p>";

$html .= "<table>
    <tbody>
        <tr>
            <td valign='top'>1.</td>
            <td valign='top' align='justify'>Menjaga, merawat dan memeliharadengan baik Meter Air yang telah dipasang oleh Pihak PDAM Kab. Balangan, apabila Meter Air hilang yang diakibatkan karena pencurian atau lainnya, maka saya bersedia untuk menerima sanksi yaitu mengganti Meter Air tersebut dengan harga Meter Air yang berlaku pada PDAM Kab. Balangan beserta administrasi lainnya.</td>
        </tr>
    </tbody>
</table>
<br/>";

$html .= "<table>
    <tbody>
        <tr>
            <td valign='top'>2.</td>
            <td valign='top' align='justify'>Tidak memutus Segel yang ada pada Meter Air, tidak mengambil air sebelum meter dan membuka, merubah, mengganjal/merusak Meter Air, sehingga Meter Air tidak berfungsi secara normal atau merugikan PDAM Kab. Balangan.</td>
        </tr>
    </tbody>
</table>
<br/>";

$html .= "<p>Dengan Surat Pernyataan ini saya buat dengan penuh kesadaran dan rasa tanggung jawab yang dalam agar dapat dipergunakan sebagaimana mestinya.</p><br/>";

$html .= "<table style='padding:0px 20px;'>
<tbody>
    <tr>
        <td></td>
        <td><div style='color:rgb(0,0,0,0.0);'>_________________________</div></td>
        <td valign='top' align='center'> Paringin, " . tgl_indo(date('Y-m-d')) . "</td>
    </tr>
    <tr>
        <td valign='top' align='center' style='padding-top: 15px;'>PETUGAS<br/><br/><br/><br/><br/><br/></td>
        <td><div style='color:rgb(0,0,0,0.0);'>_________________________</div></td>
        <td valign='top' align='center' style='padding-top: 15px;'>Pembuat Pernyataan<br/><br/><br/><br/><br/><br/></td>
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
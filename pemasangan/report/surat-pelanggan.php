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

</style></head>";

$html .= "<body><img src='../../layout/dist/img/kop-surat.png' width='610px' style='margin-bottom:5px;'>";

$html .= "<hr><p id='title'><u>PERNYATAAN PELANGGAN</u></p>";

$html .= "<p align='justify'>Saya yang bertanda tangan di bawah ini :</p>";

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
        <td>Biaya Pasang Baru</td>
        <td class='ddots'>:</td>
        <td><b>Rp. " . $data['biaya'] . "</b></td>
    </tr>
</tbody>
</table>";

$html .= "<p>Dengan ini saya menyatakan bahwa :</p>";

$html .= "<table>
    <tbody>
        <tr>
            <td valign='top'>1.</td>
            <td valign='top'>Akan melunasi biaya pasang baru sebagaimana tersebut di atas dalam waktu yang telah ditetapkan.</td>
        </tr>
        <tr>
            <td valign='top'>2.</td>
            <td valign='top' align='justify'>Menyetujui dan tidak akan menggugat apabila setelah terpasang, pipa dinas sampai dengan <i>Water Meter</i> menjadi hak milik PDAM dan PDAM berhak memperluas, mengembangkan, ataupun menghubungkan sambungan baru pada pipa tersebut dengan atau tanpa pemberitahuan sebelumnya.</td>
        </tr>
        <tr>
            <td valign='top'>3.</td>
            <td valign='top' align='justify'>Akan memelihara dan menjaga keamanan semua instalasi yang telah terpasang baik instalasi persil maupun pipa dinas.</td>
        </tr>
        <tr>
            <td valign='top'>4.</td>
            <td valign='top' align='justify'>Tidak akan menuntut dalam bentuk apapun apabila di kemudian hari timbul sengketa mengenai hak di luar tanggung jawab PDAM, maupun bangunan hingga mengakibatkan pipa-pipa persil harus dibongkar.</td>
        </tr>
        <tr>
            <td valign='top'>5.</td>
            <td valign='top' align='justify'>Tidak akan menuntut dalam bentuk apapun, jika di kemudian hari sambungan pipa dinas dicabut karena terjadi pengambangan dan/atau perubahan jaringan pipa dalam persil.</td>
        </tr>
        <tr>
            <td valign='top'>6.</td>
            <td valign='top' align='justify'>Apabila di kemudian hari ada perluasan bangunan rumah dan menutupi letak <i>Water Meter</i> yang berakibat sulitnya pembacaan angka meter, maka saya bersedia mengganti biaya penyempurnaan/perbaikan letak <i>Water Meter</i> tersebut.</td>
        </tr>
        <tr>
            <td valign='top'>7.</td>
            <td valign='top' align='justify'>Berjanji tidak akan menggunakan alat penyedot/pompa secara langsung ke pipa PDAM ataupun dengan alat lain yang dianggap merusak <i>Water Meter</i> atau peralatan pipa dinas PDAM.</td>
        </tr>
        <tr>
            <td valign='top'>8.</td>
            <td valign='top' align='justify'>Siap dikenakan sanksi Penutupa Sementara tanpa pemberitahuan terlebih dahulu apabila setelah batas waktu sebagaimana disebutkan dalam Surat Tagihan Rekening, saya belum melunasi tunggakan rekening air tersebut.</td>
        </tr>
        <tr>
            <td valign='top'>9.</td>
            <td valign='top' align='justify'>Akan mematuhi segala ketentuan dan peraturan yang berlaku di PDAM dan apabila melanggar atau tidak mematuhi, saya siap menerima sanksi.</td>
        </tr>
        <tr>
            <td valign='top'>10.</td>
            <td valign='top' align='justify'>Pernyataan saya ini mempunyai kekuatan hukum sebagai bahan untuk dipergunakan sebagaimana mestinya oleh PDAM.</td>
        </tr>
    </tbody>
</table>";

$html .= "<p>Dengan Surat Pernyataan ini saya buat dengan penuh kesadaran dan rasa tanggung jawab yang dalam agar dapat dipergunakan sebagaimana mestinya.</p>";

$html .= "<table style='padding:0px 30px;'>
<tbody>
    <tr>
        <td valign='top' align='center'>Mengetahui,<br/>Plt. Direktur,<br/><br/><br/><br/><br/></td>
        <td><div style='color:rgb(0,0,0,0.0);'>__________________________________________</div></td>
        <td valign='bottom' align='center'>Pembuat Pernyataan<br/><br/><br/><br/><br/></td>
    </tr>
    <tr>
        <td valign='top' align='center'><b><u>MURJANI</u></b><br/>NIK. 63 08 044</td>
        <td><div style='color:rgb(0,0,0,0.0);'>__________________________________________</div></td>
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
$dompdf->stream("Surat Pernyataan Pelanggan",array("Attachment"=>0));
?>
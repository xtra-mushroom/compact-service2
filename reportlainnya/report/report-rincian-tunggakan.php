<?php
require ("../../functions.php");
require ("../../libraries/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$html = "<html><head>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
<style>
body { font-family:Arial, Helvetica, sans-serif;
        text-transform: capitalize;
        margin : -25px 0 }
h3{ text-align:center; }
table, th, td{ border-collapse: collapse; }
th { text-align:center; }
th, td{ padding:5px; font-size:.9em }
img { object-fit:cover; }
</style>";

$html .= "<body><img src='../../assets/images/kop-surat.png' width='700px' style='margin-bottom:5px;'><hr/>";

$tahun = @$_GET['tahun'];
if(empty($tahun)){
    $query = "SELECT p.no_ds, p.nama, p.alamat, p.jenis_kel, p.no_hp, t.no_ds, t.tgl_lunas, SUM(t.tagihan) as total_tagihan, SUM(t.denda) as total_denda, COUNT(*) as jumlah_tunggakan FROM tagihan t INNER JOIN pelanggan p ON t.no_ds=p.no_ds WHERE t.tgl_lunas='0000-00-00' AND denda=5000 GROUP BY t.no_ds ORDER BY jumlah_tunggakan DESC";
    $label = "Semua data, periode waktu keseluruhan";
  }else{
    $query = "SELECT p.no_ds, p.nama, p.alamat, p.jenis_kel, p.no_hp, t.no_ds, t.tgl_lunas, SUM(t.tagihan) as total_tagihan, SUM(t.denda) as total_denda, COUNT(*) as jumlah_tunggakan FROM tagihan t INNER JOIN pelanggan p ON t.no_ds=p.no_ds WHERE t.tgl_lunas='0000-00-00' AND denda=5000 AND t.tahun=$tahun GROUP BY t.no_ds ORDER BY jumlah_tunggakan DESC";
    $label = 'Periode Tahun '.$tahun;
  }

$html .= "<body><h3>Laporan Rincian Data Tunggakan</h3>
<h5 align='right' style='margin-right:45px; font-style:italic;'>".$label."</h5>";

$html .= '<table class="table table-sm" border="1">
 <tr style="background:#adcded">
 <th>No.</th>
 <th>Nomor DS</th>
 <th>Nama</th>
 <th>Jenis Kelamin</th>
 <th>Alamat</th>
 <th>Nomor HP</th>
 <th>Jumlah Tunggakan</th>
 <th>Total Tunggakan</th>
 </tr>';

$result = $conn->query($query);	
$row = mysqli_num_rows($result);
if($row > 0){
    $no = 1;
    while($data = $result->fetch_assoc())
    {    
    $html .= "<tr>
    <td style='text-align:center;'>".$no++."</td>
    <td style='text-align:center;'>".$data['no_ds']."</td>
    <td style='text-align:left;'>".$data['nama']."</td>
    <td style='text-align:center;'>".$data['jenis_kel']."</td>
    <td style='text-align:left;'>".$data['alamat']."</td>
    <td style='text-align:center;'>".$data['no_hp']."</td>
    <td style='text-align:center;'>".$data['jumlah_tunggakan']."</td>
    <td style='text-align:right;'>".rupiah($data['total_tagihan']+$data['total_denda'])."</td>
    </tr>";
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='5'>Data tidak ditemukan</td></tr>";
}

$html .= "<table style='padding-top:50px; padding-right:60px;'>
<tbody>
    <tr>
        <td></td>
        <td valign='top' align='center' style='font-size:.9em'> Paringin, " . tgl_indo(date('Y-m-d')) . "</td>
    </tr>
    <tr>
        <td style='color:rgb(0,0,0,0.0);'>_______________________________________________________________</td>
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
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf, attachment = 0 pdf akan dibuka sebelum di download
$dompdf->stream("[Report] Data Pendaftaran",array("Attachment"=>0));
?>
<?php
require ("../../functions.php");
require ("../../libraries/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$html = "<html><head><style>
body { font-family:Arial, Helvetica, sans-serif;
        text-transform: capitalize;
        margin : -25px 0 }
h3{ text-align:center; }
table, th, td{ border-collapse: collapse; }
th { text-align:center; }
th, td{ padding:5px; font-size:.9em }
img { object-fit:cover; }
</style>";

$html .= "<body><img src='../../layout/dist/img/kop-surat.png' width='700px' style='margin-bottom:5px;'><hr/>";

$tgl_awal = @$_GET['tgl_awal'];
$tgl_akhir = @$_GET['tgl_akhir'];
if(empty($tgl_awal) or empty($tgl_akhir)){
    $queryBuka = "SELECT pendaftaran.id_wil, pendaftaran.wil, SUM(pembukaan.biaya) as total_buka, COUNT(pembukaan.no_ds) as total_databuka FROM pembukaan INNER JOIN pendaftaran ON pembukaan.no_ds = pendaftaran.no_ds GROUP BY pendaftaran.id_wil ORDER BY pendaftaran.id_wil ASC;";
    $queryTutup = "SELECT pendaftaran.id_wil, pendaftaran.wil, SUM(penutupan.biaya) as total_tutup, COUNT(penutupan.no_ds) as total_datatutup FROM penutupan INNER JOIN pendaftaran ON penutupan.no_ds = pendaftaran.no_ds GROUP BY pendaftaran.id_wil ORDER BY pendaftaran.id_wil ASC;";
    $url_cetak = "report/report-jumlah-biaya-bukatutup.php";
    $label = "Semua Data Biaya Pembukaan dan Penutupan, per-cabang";
}else{  
    $queryBuka = "SELECT pendaftaran.id_wil, pendaftaran.wil, SUM(pembukaan.biaya) as total_buka, COUNT(pembukaan.no_ds) as total_databuka FROM pembukaan INNER JOIN pendaftaran ON pembukaan.no_ds = pendaftaran.no_ds WHERE (pembukaan.tgl_buka BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."') GROUP BY pendaftaran.id_wil ORDER BY pendaftaran.id_wil ASC;";
    $queryTutup = "SELECT pendaftaran.id_wil, pendaftaran.wil, SUM(penutupan.biaya) as total_tutup, COUNT(penutupan.no_ds) as total_datatutup FROM penutupan INNER JOIN pendaftaran ON penutupan.no_ds = pendaftaran.no_ds WHERE (penutupan.tgl_tutup BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."') GROUP BY pendaftaran.id_wil ORDER BY pendaftaran.id_wil ASC;";
    $url_cetak = "report/report-jumlah-biaya-bukatutup.php?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir."&filter=true";
    $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
    $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
    $label = 'Periode Tanggal <b>'.$tgl_awal.'</b> s/d <b>'.$tgl_akhir.'</b>';
}

$html .= "<body><h3>Laporan Jumlah Biaya Pemasangan Baru Per-cabang</h3>
<h5 align='right' style='margin-right:45px;'>".$label."</h5>";

$html .= '<table border="1" width="90%" align="center">
 <tr>
 <th>Nomor</th>
 <th>ID Wilayah</th>
 <th>Wilayah/Cabang</th>
 <th>Jumlah Data</th>
 <th>Jumlah Biaya Pembukaan</th>
 </tr>';

$result = $conn->query($queryBuka);	
$row = mysqli_num_rows($result);
$no = 0;
if($row > 0){
    while($data = $result->fetch_array())
    {
        $no++;
    $html .= "<tr>
    <td style='text-align:center;'>".$no."</td>
    <td style='text-align:center;'>".$data['id_wil']."</td>
    <td style='text-align:center;'>".$data['wil']."</td>
    <td style='text-align:center;'>".$data['total_databuka']."</td>
    <td style='text-align:center;'>".rupiah($data['total_buka'])."</td>
    </tr>";
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='5'>Data tidak ditemukan</td></tr>";
}
$html .= "</table><br/>";

$html .= '<table border="1" width="90%" align="center">
 <tr>
 <th>Nomor</th>
 <th>ID Wilayah</th>
 <th>Wilayah/Cabang</th>
 <th>Jumlah Data</th>
 <th>Jumlah Biaya Penutupan</th>
 </tr>';

$result = $conn->query($queryTutup);	
$row = mysqli_num_rows($result);
$no = 0;
if($row > 0){
    while($data = $result->fetch_array())
    {
        $no++;
    $html .= "<tr>
    <td style='text-align:center;'>".$no."</td>
    <td style='text-align:center;'>".$data['id_wil']."</td>
    <td style='text-align:center;'>".$data['wil']."</td>
    <td style='text-align:center;'>".$data['total_datatutup']."</td>
    <td style='text-align:center;'>".rupiah($data['total_tutup'])."</td>
    </tr>";
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='5'>Data tidak ditemukan</td></tr>";
}
$html .= "</table>";

$html .= "<table style='padding-top:50px; padding-right:60px;'>
<tbody>
    <tr>
        <td></td>
        <td valign='top' align='center' style='font-size:.9em'> Paringin, " . tgl_indo(date('Y-m-d')) . "</td>
    </tr>
    <tr>
        <td style='color:rgb(0,0,0,0.0);'>________________________________________________</td>
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
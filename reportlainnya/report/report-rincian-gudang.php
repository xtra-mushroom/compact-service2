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

$tgl_awal = @$_GET['tgl_awal'];
$tgl_akhir = @$_GET['tgl_akhir'];
if(empty($tgl_awal) or empty($tgl_akhir)){
    $query = "SELECT sb.tgl_survei, dsb.kode_bahan, SUM(dsb.banyaknya), g.nama, g.jenis, g.nomor, g.ukuran, g.harga FROM survei_bahan sb INNER JOIN detail_survei_bahan dsb ON sb.no_reg = dsb.no_reg INNER JOIN gudang g ON dsb.kode_bahan = g.kode WHERE sb.keterangan = 'terpasang' GROUP BY g.kode ORDER BY g.nomor ASC";
    $label = "Semua data, periode waktu keseluruhan";
  }else{
    $query = "SELECT sb.tgl_survei, dsb.kode_bahan, SUM(dsb.banyaknya), g.nama, g.jenis, g.nomor, g.ukuran, g.harga FROM survei_bahan sb INNER JOIN detail_survei_bahan dsb ON sb.no_reg = dsb.no_reg INNER JOIN gudang g ON dsb.kode_bahan = g.kode WHERE sb.keterangan = 'terpasang' AND (tgl_survei BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')GROUP BY g.kode ORDER BY g.nomor ASC";
    $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
    $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
    $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
  }

$html .= "<body><h3>Laporan Rincian Pemakaian Bahan Dari Gudang</h3>
<h5 align='right' style='margin-right:45px; font-style:italic;'>".$label."</h5>";

$html .= '<table class="table table-sm" border="1">
 <tr style="background:#adcded">
 <th>Nomor</th>
 <th>Nama</th>
 <th>Jenis</th>
 <th>Ukuran</th>
 <th>Harga Satuan</th>
 <th>Jumlah Terpakai</th>
 </tr>';

$result = $conn->query($query);	
$row = mysqli_num_rows($result);
if($row > 0){
    $no = 1;
    while($data = $result->fetch_assoc())
    {    
    $html .= "<tr>
    <td style='text-align:center;'>".$no++."</td>
    <td style='text-align:center;'>".$data['nama']."</td>
    <td style='text-align:center;'>".$data['jenis']."</td>
    <td style='text-align:center;'>".$data['ukuran']."</td>
    <td style='text-align:right;'>".rupiah($data['harga'])."</td>
    <td style='text-align:center;'>".$data['SUM(dsb.banyaknya)']."</td>
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
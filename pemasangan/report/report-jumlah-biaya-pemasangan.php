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
    $query = "SELECT cabang, SUM(biaya) as total_pasba, COUNT(cabang) as total_data FROM pemasangan GROUP BY cabang ORDER BY cabang ASC";
    $label = "Semua Data, Per-Cabang";
  }else{
    $query = "SELECT cabang, SUM(biaya) as total_pasba, COUNT(cabang) as total_data FROM pemasangan WHERE (pemasangan.tgl_pasang BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."') GROUP BY cabang ORDER BY cabang ASC";
    $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
    $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
    $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
  }

$html .= "<body><h3>Laporan Jumlah Biaya Pemasangan Baru Per-cabang</h3>
<h5 align='right' style='margin-right:45px;'>".$label."</h5>";

$html .= '<table class="table table-sm" border="1">
 <tr style="background:#adcded">
 <th>Nomor</th>
 <th>ID Wilayah</th>
 <th>Wilayah/Cabang</th>
 <th>Jumlah Data</th>
 <th>Jumlah Biaya Masuk</th>
 </tr>';

$result = $conn->query($query);	
$row = mysqli_num_rows($result);
if($row > 0){
    while($data = $result->fetch_array())
    {
        $no = 1;
        if($data['cabang'] == '01'){
            $namaCabang = 'Paringin';
        }elseif($data['cabang'] == '02'){
            $namaCabang = 'Paringin Selatan';
        }elseif($data['cabang'] == '03'){
            $namaCabang = 'Awayan';
        }elseif($data['cabang'] == '04'){
            $namaCabang = 'Lampihong';
        }elseif($data['cabang'] == '05'){
            $namaCabang = 'Juai';
        }elseif($data['cabang'] == '06'){
            $namaCabang = 'Halong';
        }elseif($data['cabang'] == '07'){
            $namaCabang = 'Batumandi';
        }elseif($data['cabang'] == '08'){
            $namaCabang = 'Tebing Tinggi';
        }
    $html .= "<tr>
    <td style='text-align:center;'>".$no++."</td>
    <td style='text-align:center;'>".$data['cabang']."</td>
    <td style='text-align:center;'>".$namaCabang."</td>
    <td style='text-align:center;'>".$data['total_data']."</td>
    <td style='text-align:center;'>".rupiah($data['total_pasba'])."</td>
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
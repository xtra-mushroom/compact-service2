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
        margin : -25px 70px }
h3{ text-align:center; }
table, th, td{ border-collapse: collapse; }
th { text-align:center; }
th, td{ padding:5px;}
img { object-fit:cover; }
</style>";

$html .= "<body><p align='center'><img src='../../assets/images/kop-surat.png' width='800px' style='margin-top:-7px;'></p><hr/>";

$tgl_awal = @$_GET['tgl_awal'];
$tgl_akhir = @$_GET['tgl_akhir'];
if(empty($tgl_awal) or empty($tgl_akhir)){
    $query = "SELECT ad.no_reg, ad.nama, ad.jenis_kel, ad.no_hp, ad.alamat, p.cabang, p.no_reg, p.no_ds, p.tgl_daftar FROM antri_daftar as ad INNER JOIN pendaftaran as p ON ad.no_reg=p.no_reg WHERE p.no_ds='' ORDER BY p.cabang ASC";
    $label = "Semua Data Pendaftaran Tanpa Pemasangan";
  }else{
    $query = "SELECT ad.no_reg, ad.nama, ad.jenis_kel, ad.no_hp, ad.alamat, p.cabang, p.no_reg, p.no_ds, p.tgl_daftar FROM antri_daftar as ad INNER JOIN pendaftaran as p ON ad.no_reg=p.no_reg WHERE (p.tgl_daftar BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."') AND p.no_ds='' ORDER BY cabang ASC";
    $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
    $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
    $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
  }

$html .= "<body><h3>Laporan Rincian Data Pendaftaran Tanpa Pemasangan</h3>
<h5 align='right' style='margin-right:48px'>".$label."</h5>";

$html .= '<table class="table table-sm" border="1">
 <tr style="background:#adcded">
 <th>Nomor</th>
 <th>Cabang</th>
 <th>Nama</th>
 <th>Jenis Kelamin</th>
 <th>Alamat</th>
 <th>Nomor Telepon</th>
 <th>Tanggal Daftar</th>
 </tr>';

$result = $conn->query($query);	
$row = mysqli_num_rows($result);

if($row > 0){
    while($data = $result->fetch_array())
    {
        if($data['cabang'] == '01'){
            $namaCabang = 'Paringin';
        }elseif($data['cabang'] == '02'){
            $namaCabang = 'Paringin Selatan';
        }elseif($data['cabang'] == '3'){
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
        $no = 1;
    $html .= "<tr>
    <td style='text-align:center;'>".$no++."</td>
    <td style='text-align:center;'>".$namaCabang."</td>
    <td>".$data['nama']."</td>
    <td style='text-align:center;'>".$data['jenis_kel']."</td>
    <td>".$data['alamat']."</td>
    <td style='text-align:center;'>".$data['no_hp']."</td>
    <td style='text-align:center;'>".$data['tgl_daftar']."</td>
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
        <td style='color:rgb(0,0,0,0.0);'>__________________________________________________________________________________</td>
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
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf, attachment = 0 pdf akan dibuka sebelum di download
$dompdf->stream("[Report] Data Pendaftaran",array("Attachment"=>0));
?>
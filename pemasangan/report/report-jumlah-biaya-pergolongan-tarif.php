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
th, td{ padding:5px; font-size:.9em}
img { object-fit:cover; }
</style>";

$html .= "<body><img src='../../layout/dist/img/kop-surat.png' width='700px' style='margin-bottom:5px;'><hr/>";

$tgl_awal = @$_GET['tgl_awal'];
$tgl_akhir = @$_GET['tgl_akhir'];
if(empty($tgl_awal) or empty($tgl_akhir)){
    $query = "SELECT gol_tarif, SUM(biaya) as total_pasba, COUNT(gol_tarif) as total_data FROM pemasangan GROUP BY gol_tarif ORDER BY total_data DESC";
    $label = "Semua Data, per-golongan tarif";
  }else{
    $query = "SELECT gol_tarif, SUM(biaya) as total_pasba, COUNT(gol_tarif) as total_data FROM pemasangan WHERE (tgl_pasang BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."') GROUP BY gol_tarif ORDER BY total_data DESC";
    $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
    $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
    $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
  }

$html .= "<body><h3>Laporan Jumlah Biaya Pemasangan Baru Per-Golongan Tarif</h3>
<h5 align='right' style='margin-right:45px;'>".$label."</h5>";

$html .= '<table border="1" width="90%" align="center">
 <tr>
 <th>Nomor</th>
 <th>Golongan Tarif</th>
 <th>Keterangan Golongan</th>
 <th>Total Pemasangan</th>
 <th>Jumlah Biaya Pemasangan Baru</th>
 </tr>';

$result = $conn->query($query);	
$row = mysqli_num_rows($result);
$no = 0;
if($row > 0){
    while($data = $result->fetch_array())
    {
        if($data['gol_tarif'] == "R1"){
            $keterangan_gol = "Rumah Tangga 2";
        }elseif($data['gol_tarif'] == "R2"){
            $keterangan_gol = "Rumah Tangga 2";
        }elseif($data['gol_tarif'] == "R3"){
            $keterangan_gol = "Rumah Tangga 3";
        }elseif($data['gol_tarif'] == "SU"){
            $keterangan_gol = "Sosial Umum";
        }elseif($data['gol_tarif'] == "SK"){
            $keterangan_gol = "Sosial Khusus";
        }elseif($data['gol_tarif'] == "NK"){
            $keterangan_gol = "Niaga Kecil";
        }elseif($data['gol_tarif'] == "NB"){
            $keterangan_gol = "Niaga Besar";
        }elseif($data['gol_tarif'] == "IP"){
            $keterangan_gol = "Instansi Pemerintah";
        }
        $no++;

    $html .= "<tr>
    <td style='text-align:center;'>".$no."</td>
    <td style='text-align:center;'>".$data['gol_tarif']."</td>
    <td style='text-align:center;'>".$keterangan_gol."</td>
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
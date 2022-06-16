<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pelayanan | PDAM Balangan</title>
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="panduan/css/bootstrap.css" rel="stylesheet">
    <!-- style -->
    <link rel="stylesheet" href="panduan/style.css">
    <!-- icon tab -->
    <link rel="shortcut icon" href="layout/dist/img/pdam-logo.png">
</head>

<body id="bg-payment">
    <div class="wrapper">
        <section id="payment-container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3>Pembayaran</h3>
                    </div>
                </div>
                <?php 
                $angkaAcak = rand(1000, 9999);
                ?>
                <div class="row justify-content-center fs-6 text-center">
                    <div class="col-6 mt-3" id="nominal">
                        <p class="instructions">Nomor Registrasi Anda</p>
                        <h4>00000000<?= $angkaAcak ?></h4>
                        <p>Atas nama : <?= $_POST["nama"] ?></p>
                    </div>
                </div>
                <?php 
                if($_POST["jenis_kel"] == "Laki-Laki"){
                    $pronoun = "Bapak";
                }elseif($_POST["jenis_kel"] == "Perempuan"){
                    $pronoun = "Ibu";
                }else{
                    $pronoun = "Bapak/Ibu";
                }
                ?>
                <div class="row justify-content-center fs-6 text-left">
                    <div class="col-10 mt-2 mb-2" id="nominal">
                        <p>Terima Kasih kepada <?= $pronoun." ".$_POST["nama"] ?> telah melakukan registrasi pemasangan sambungan
                            baru. Harap segera melakukan pembayaran biaya pendaftaran sebesar <b>Rp. 20.000,-</b> sesuai
                            instruksi pada metode pembayaran yang anda pilih.</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-2 mt-2" id="nominal">
                        <p>Pilih metode bayar</p>
                    </div>
                    <div class="col-8 mb-4" id="payment">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        Kantor PDAM
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <table class="instructions">
                                            <tr>
                                                <td valign="top">1.</td>
                                                <td>Kunjungi Kantor PDAM Kabupaten Balangan</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">2.</td>
                                                <td>Tunjukkan Nomor Registrasi anda dan beritahukan kepada operator pelayanan bahwa anda ingin melakukan
                                                    Pembayaran Biaya Pendaftaran</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">3.</td>
                                                <td>Operator pelayanan akan memberikan anda kwitansi untuk kemudian
                                                    diserahkan ke kasir</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">4.</td>
                                                <td>Kasir kemudian akan meminta anda membayar biaya pendaftaran sesuai
                                                    nominal yang tertera pada kwitansi</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">5.</td>
                                                <td>Ikuti instruksi selanjutnya dari petugas kasir untuk menyelesaikan
                                                    pembayaran anda</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        Kantor Pos
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <table class="instructions">
                                            <tr>
                                                <td valign="top">1.</td>
                                                <td>Kunjungi Kantor POS terdekat dari lokasi anda</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">2.</td>
                                                <td>Beritahukan kepada kasir bahwa anda ingin melakukan Pembayaran
                                                    Registrasi PDAM Balangan</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">3.</td>
                                                <td>Tunjukkan Nomor REgistrasi anda pada petugas kasir</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">4.</td>
                                                <td>Petugas kasir kemudian akan meminta anda membayar sebesar Rp.
                                                    20.000,- beserta biaya admin</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">5.</td>
                                                <td>Ikuti instruksi selanjutnya dari petugas kasir untuk menyelesaikan
                                                    pembayaran anda</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        Transfer Bank
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <label class="ins-title mb-2">via ATM</label>
                                        <table class="instructions mb-3">
                                            <tr>
                                                <td valign="top">1.</td>
                                                <td>Kunjungi Kantor POS terdekat dari lokasi anda</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">2.</td>
                                                <td>Beritahukan kepada kasir bahwa anda ingin melakukan Pembayaran
                                                    Registrasi PDAM Balangan</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">3.</td>
                                                <td>Perlihatkan nomor registrasi anda pada petugas kasir</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">4.</td>
                                                <td>Petugas kasir kemudian akan meminta anda membayar sebesar Rp.
                                                    20.000,- beserta biaya admin</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">5.</td>
                                                <td>Ikuti instruksi selanjutnya dari petugas kasir untuk menyelesaikan
                                                    pembayaran anda</td>
                                            </tr>
                                        </table>

                                        <label class="ins-title mb-2">via m-Banking</label>
                                        <table class="instructions">
                                            <tr>
                                                <td valign="top">1.</td>
                                                <td>Kunjungi Kantor POS terdekat dari lokasi anda</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">2.</td>
                                                <td>Beritahukan kepada kasir bahwa anda ingin melakukan Pembayaran
                                                    Registrasi PDAM Balangan</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">3.</td>
                                                <td>Perlihatkan nomor registrasi anda pada petugas kasir</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">4.</td>
                                                <td>Petugas kasir kemudian akan meminta anda membayar sebesar Rp.
                                                    20.000,- beserta biaya admin</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">5.</td>
                                                <td>Ikuti instruksi selanjutnya dari petugas kasir untuk menyelesaikan
                                                    pembayaran anda</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="panduan/js/bootstrap.js"></script>
    <script src="panduan/js/popper.min.js"></script>

</body>

</html>
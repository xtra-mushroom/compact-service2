<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panduan Pelayanan | PDAM Balangan</title>
    <meta charset="utf-8">
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- style -->
    <link rel="stylesheet" href="style.css">
</head>

<body id="head">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color: #383434">
        <a class="navbar-brand ms-3" href="../index.php"><i class="bi bi-box-arrow-left"></i></a>
        <div class="container">
            <a class="navbar-brand text-uppercase" href="#">panduan compact service</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#head">Head</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#pendaftaran">Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pemasangan">Pemasangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bukatutup">Buka & Tutup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#baliknama">Balik Nama</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- jumbotron -->
    <section class="jumbotron text-center">
        <img src="images/pdam-logo.png" alt="logo" class="rounded-circle"
            width="190">
        <h1 class="display-2 mt-3">Pertama Kali Menggunakan Compact Service?</h1>
        <p class="lead">Pelajari lebih lanjut bagaimana Compact Service bekerja</p>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,128L120,128C240,128,480,128,720,112C960,96,1200,64,1320,48L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
    </section>

    <section id="pendaftaran">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>Pendaftaran</h2>
                </div>
            </div>
            <div class="row justify-content-center fs-6 text-left">
                <div class="col-10">
                    <table>
                        <tr>
                            <td valign="top">1.</td>
                            <td>Pada sub-menu <em>Input Data</em>, NOMOR PENDAFTARAN tidak perlu diisi karena <em>auto increment</em></td>
                        </tr>
                        <tr>
                            <td valign="top">2.</td>
                            <td>Data yang berhasil tersimpan akan masuk ke tabel pendaftaran, dengan NOMOR SAMBUNGAN (no_ds) masih kosong, karena calon pelanggan belum terdaftar di tahap pemasangan</td>
                        </tr>
                        <tr>
                            <td valign="top">3.</td>
                            <td>Pada sub-menu <em>Cari & Cetak</em> terdapat dua pilihan <em>action</em>, yaitu EDIT DATA dan CETAK KWITANSI PENDAFTARAN</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#8a7a76" fill-opacity="1" d="M0,160L120,176C240,192,480,224,720,224C960,224,1200,192,1320,176L1440,160L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
    </section>

    <section id="pemasangan">
        <div class="container pb-5">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>Pemasangan</h2>
                </div>
            </div>
            <div class="row justify-content-center fs-6 text-left">
                <div class="col-10">
                    <table>
                        <tr>
                            <td valign="top">1.</td>
                            <td>Pada sub-menu <em>Input Data</em>, proses <em>generate</em> NOMOR SAMBUNGAN menghitung jumlah data dari tabel pelanggan</td>
                        </tr>
                        <tr>
                            <td valign="top">2.</td>
                            <td>Data yang tersimpan akan masuk ke tabel pemasangan dan tabel pelanggan, NOMOR SAMBUNGAN yang berhasil di-<em>generate</em> akan diperbarui ke kolom <em>no_ds</em> di tabel pendaftaran dan tabel pelanggan</td>
                        </tr>
                        <tr>
                            <td valign="top">3.</td>
                            <td>Kolom inputan NAMA, NIK, ALAMAT, NOMOR HP, JENIS KELAMIN, serta CABANG akan otomatis terisi jika NOMOR PENDAFTARAN yang diinput pada kolom NOMOR PENDAFTARAN telah terdaftar di tahap pendaftaran, apabila NOMOR PENDAFTARAN tidak ditemukan maka kolom inputan akan kosong</td>
                        </tr>
                        <tr>
                            <td valign="top">4.</td>
                            <td>Pada sub-menu <em>Cari Data</em>, operator dapat melakukan perubahan apabila ada kesalahan penginputan data</td>
                        </tr>
                        <tr>
                            <td valign="top">5.</td>
                            <td>Pada sub-menu <em>Cetak Surat</em>, terdapat dua surat yang harus dicetak yaitu SURAT PERNYATAAN TERPASANGAN dan SURAT PERNYATAAN PELANGGAN</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,96L120,117.3C240,139,480,181,720,192C960,203,1200,181,1320,170.7L1440,160L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
    </section>
  
    <section id="bukatutup">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>Pembukaan dan Penutupan</h2>
                </div>
            </div>
            <div class="row justify-content-center fs-6 text-left">
                <div class="col-10">
                    <table>
                        <tr>
                            <td valign="top">1.</td>
                            <td>Kolom inputan STATUS, NAMA, ID WILAYAH, serta NOMOR HP akan otomatis terisi jika NOMOR SAMBUNGAN yang diinput pada kolom NOMOR SAMBUNGAN berhasil ditemukan pada tabel pelanggan dan pendaftaran, apabila NOMOR SAMBUNGAN tidak ditemukan, maka kolom inputan akan kosong</td>
                        </tr>
                        <tr>
                            <td valign="top">2.</td>
                            <td>Pada sub-menu <em>Input Data</em> bisa sekaligus digunakan untuk CEK STATUS (terbuka atau tertutup)</td>
                        </tr>
                        <tr>
                            <td valign="top">3.</td>
                            <td>Pada sub-menu <em>Cetak Surat</em>, surat perintah yang dicetak akan menyesesuaikan dengan STATUS, apabila STATUS TERTUTUP maka yang akan dicetak adalah SURAT PERINTAH PENUTUPAN, dan begitu pun sebaliknya</td>
                        </tr>
                        <tr>
                            <td valign="top">4.</td>
                            <td>Input data akan disimpan ke tabel pembukaan / penutupan, sesuai menu yang dipilih</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#8a7a76" fill-opacity="1" d="M0,224L120,197.3C240,171,480,117,720,101.3C960,85,1200,107,1320,117.3L1440,128L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
    </section>

    <section id="baliknama">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>Balik Nama</h2>
                </div>
            </div>
            <div class="row justify-content-center fs-6 text-left">
                <div class="col-10">
                    <table>
                        <tr>
                            <td valign="top">1.</td>
                            <td>Kolom inputan data-data pelanggan asal akan otomatis terisi jika NOMOR SAMBUNGAN yang diinput pada kolom NOMOR SAMBUNGAN berhasil ditemukan pada tabel pelanggan, apabila NOMOR SAMBUNGAN tidak ditemukan, maka kolom inputan akan kosong</td>
                        </tr>
                        <tr>
                            <td valign="top">2.</td>
                            <td>Data pelanggan semula dan data pelanggan baru akan tersimpan di tabel baliknama, semua riwayat balik nama akan selalu tercatat dalam database, dan jika sewaktu-waktu diperlukan data dari pelanggan asal maka hanya perlu mencari riwayatnya menggunakan NOMOR SAMBUNGAN</td>
                        </tr>
                        <tr>
                            <td valign="top">3.</td>
                            <td>Pada sub-menu <em>Cari Data</em>, operator dapat melakukan perubahan apabila ada kesalahan penginputan data</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#383434" fill-opacity="1" d="M0,256L120,234.7C240,213,480,171,720,160C960,149,1200,171,1320,181.3L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
    </section>

    <footer>
        <p class="fw-bold text-white text-center">Made with <i class="bi bi-suit-heart-fill text-danger"></i> by
            <em>Maulida Hikmah</em></p>
    </footer>

    <script src="js/bootstrap.js"></script>
    <script src="js/popper.min.js"></script>

</body>
</html>
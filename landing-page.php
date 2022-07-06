<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pelayanan | PDAM Balangan</title>
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- style -->
    <link rel="stylesheet" href="assets/style.css">
    <!-- icon tab -->
    <link rel="shortcut icon" href="assets/images/pdam-logo.png">
</head>

<body id="beranda">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow fixed-top" style="background-color: #2c3c52">
        <div class="container">
            <img src="assets/images/pdam-logo.png" alt="PDAM Balangan Logo" class="brand-image rounded-circle shadow border border-success"
                    style="margin-left: 6px; width:3em; height:2.7em;">
            <span class="brand-text font-weight-light ms-2" style="color: #a9d1ab"><b>PDAM BALANGAN</b></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="pemohon/registrasi.php">Registrasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logsystem/index.php">Log In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- jumbotron -->
    <section class="jumbotron text-left">
        <div class="#">
            <div class="text-land ps-5">
                <h1 class="display-2 mt-3">Selamat Datang di Compact Service PDAM Balangan</h1>
                <p class="lead">Website pelayanan online PDAM Balangan yang dapat memudahkan anda mengakses layanan kami secara online dari mana saja dan kapan saja</p>
                <p class="lead1">Ingin mengajukan pemasangan sambungan baru? <a href="pemohon/registrasi.php">Registrasi di sini</a></p>
                <p class="lead1">Sudah registrasi dan melakukan pembayaran biaya pendaftaran? <a href="pemohon/upload-bayar.php">Upload bukti bayar di sini</a></p>
            </div>
            <div class="pic-land">
                <img src="assets/images/half-circle.png" alt="landing image">
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,128L120,128C240,128,480,128,720,112C960,96,1200,64,1320,48L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
    </section>

    <section id="infografis">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h3>Infografis Pelayanan Online</h3>
                </div>
            </div>
            <div class="row justify-content-center fs-6 text-left">
                <div class="col-10" id="infosvg">
                    <img src="assets/images/infografik-2.svg" type="svg" alt="infosvg">
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#557981" fill-opacity="1" d="M0,224L120,197.3C240,171,480,117,720,101.3C960,85,1200,107,1320,117.3L1440,128L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
    </section>

    <section id="panduan">
        <div class="container">
            <div class="row text-center mb-3 pt-4">
                <div class="col">
                    <h3>Prosedur Pengajuan Pemasangan Baru</h3>
                </div>
            </div>
            <div class="row justify-content-center fs-6 text-left">
                <div class="col-10">
                    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/images/1.png" class="d-block w-100 rounded" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Tahap Pertama</h5>
                                    <p>Pendaftaran atau registrasi online dapat dilakukan dengan mengisi form registrasi</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/bg-carousel.jpg" class="d-block w-100 rounded" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Tahap Kedua</h5>
                                    <img src="assets/images/pdam-logo.png" alt="...">
                                    <p>Pembayaran biaya pendaftaran dapat dilakukan dengan metode pembayaran via Kantor PDAM maupun via Transfer Bank</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/bg-carousel.jpg" class="d-block w-100 rounded" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Tahap Kedua</h5>
                                    <img src="assets/images/pdam-logo.png" alt="...">
                                    <p>Pembayaran biaya pendaftaran dapat dilakukan dengan metode pembayaran via Kantor PDAM maupun via Transfer Bank</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#2c3c52" fill-opacity="1" d="M0,256L120,234.7C240,213,480,171,720,160C960,149,1200,171,1320,181.3L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
    </section>

    <footer>
        <p class="fw-bold text-white text-center">Made with <i class="bi bi-suit-heart-fill text-danger"></i> by
            <em>Maulida Hikmah</em></p>
    </footer>

    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/popper.min.js"></script>

</body>
</html>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pelayanan | PDAM Balangan</title>
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!-- style -->
    <link rel="stylesheet" href="../assets/style1.css">
    <!-- icon tab -->
    <link rel="shortcut icon" href="../assets/images/pdam-logo.png">
</head>
<body id="bg-uploadbayar">
    <section id="registrasi">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h3>Upload Bukti Pembayaran</h3>
                </div>
            </div>
            <div class="row justify-content-center fs-6 text-left">
                <div class="col-9">
                    <form method="post" action="<?= htmlspecialchars("proses-upload.php") ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="noreg" class="form-label">Nomor Registrasi</label>
                            <input type="text" class="form-control" id="noreg" aria-describedby="noreg" name="noreg" required>
                        </div>
                        <div class="mb-3">
                            <label for="bukti-bayar" class="form-label">Upload Bukti Bayar <span style="color:#f25056; font-size:.9em;">*Ekstensi yang dibolehkan .png | .jpg | .jpeg</span></label>
                            <input type="file" class="form-control" id="bukti-bayar" aria-describedby="bukti-bayar" name="bukti-bayar" required>
                            <div id="phoneHelp" class="form-text">Ukuran maksimal upload foto: 1 MB</div>
                        </div>
                        <div class="bottom float-end">
                        <p id="notice-regis" class="text-right">Cek kembali nomor registrasi anda sebelum klik "Upload"</p>
                        <button type="submit" name="submit" class="btn btn-send btn-primary float-end">Upload</button>   
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

    <script src="../assets/js/bootstrap.js"></script>
    <!-- <script src="assets/js/popper.min.js"></script> -->
</html>
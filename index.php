<?php 
session_start();
include_once ("functions.php");
include_once ("partials/session-pegawai.php");

$activeHome = "active";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("partials/head.php") ?>

    <script src="libraries/chartjs/Chart.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once ("partials/navbar.php") ?>
        <?php include_once ("partials/sidebar.php") ?>

        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="jumbotron bg-white" style="border-radius:0; height:200px; padding-top:20px;">
                                    <h1 class="display-6 text-center">Selamat Datang!</h1>
                                    <p class="lead text-center">Compact Service PDAM Kabupaten Balangan mencakup seluruh rangkaian pelayanan dalam satu aplikasi</p>
                                    <hr class="mt-4">
                                    <!-- <p class="text-secondary ml-3">Pertama kali menggunakan Compact Service?</p>
                                    <a class="btn btn-primary text-secondary ml-3" href="panduan/index.php" role="button">Pelajari Panduan</a> -->
                                </div>
                                <div style="margin-top:-60px;" class="card-body mx-auto text-center row">
                                    <div class="col-12" style="width: 500px; height: 300px;">
                                        <h4>Statistik Data Antrian (menunggu verifikasi)</h4>
                                        <canvas id="chartDataAntrian"></canvas>
                                    </div>
                                </div>
                                <div class="card-body mx-auto text-center row">  
                                    <div class="col-12" style="width: 500px; height: 300px;">
                                        <h4>Statistik Data Pelayanan</h4>
                                        <canvas id="chartDataPelayanan"></canvas>
                                    </div>
                                </div>

                                <script>
                                        var ctx = document.getElementById("chartDataPelayanan").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ["Pendaftaran", "Pemasangan", "Pembukaan", "Penutupan"],
                                                datasets: [{
                                                    label: '# of Total data',
                                                    data: [
                                                        <?php
                                                        $jumlah_pendaftaran = mysqli_query($conn, "SELECT * FROM pendaftaran");
                                                        echo mysqli_num_rows($jumlah_pendaftaran);
                                                        ?>,
                                                        <?php
                                                        $jumlah_pemasangan = mysqli_query($conn, "SELECT * FROM pemasangan");
                                                        echo mysqli_num_rows($jumlah_pemasangan);
                                                        ?>,
                                                        <?php
                                                        $jumlah_pembukaan = mysqli_query($conn, "SELECT * FROM pembukaan");
                                                        echo mysqli_num_rows($jumlah_pembukaan);
                                                        ?>,
                                                        <?php
                                                        $jumlah_penutupan = mysqli_query($conn, "SELECT * FROM penutupan");
                                                        echo mysqli_num_rows($jumlah_penutupan);
                                                        ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(106, 235, 38, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255,99,132,1)',
                                                        'rgba(106, 235, 38, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero: true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                    </script> 
                                    <script>
                                        var ctx = document.getElementById("chartDataAntrian").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ["Antrian Pemohon", "Antrian Berkas", "Antrian Survei", "Antrian Keluhan"],
                                                datasets: [{
                                                    label: '# of Total data',
                                                    data: [
                                                        <?php
                                                        $jumlah_pendaftaran = mysqli_query($conn, "SELECT * FROM antri_daftar WHERE status_bayar='belum' AND bukti_bayar!='';");
                                                        echo mysqli_num_rows($jumlah_pendaftaran);
                                                        ?>,
                                                        <?php
                                                        $jumlah_pemasangan = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE status_berkas='belum';");
                                                        echo mysqli_num_rows($jumlah_pemasangan);
                                                        ?>,
                                                        <?php
                                                        $jumlah_pembukaan = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE status_survei='belum';");
                                                        echo mysqli_num_rows($jumlah_pembukaan);
                                                        ?>,
                                                        <?php
                                                        $jumlah_pembukaan = mysqli_query($conn, "SELECT * FROM keluhan WHERE penanganan='';");
                                                        echo mysqli_num_rows($jumlah_pembukaan);
                                                        ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(106, 235, 38, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255,99,132,1)',
                                                        'rgba(106, 235, 38, 1)',
                                                        'rgba(255, 206, 86, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero: true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                    </script>

                                <div class="card-footer text-center pt-4">
                                    <p class="text-secondary"><b>Copyright</b> &copy; <b>2022 ~ <em style="color:#b8b2b2">Version 0.2.0</em></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>

    <?php include_once ("partials/importjs.php") ?>
</body>
</html>
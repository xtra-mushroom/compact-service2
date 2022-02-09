<?php 
require "../functions.php";
$openBaliknama = "menu-open";
$activeBaliknama = "active"; $activeInputBaliknama = "active";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ("../partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>

    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once ("../partials/navbar.php") ?>

        <!-- Sidebar -->
        <?php include_once ("../partials/sidebar.php") ?>

        <!-- Content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1>Input Data Balik Nama</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Balik Nama</li>
                                <li class="breadcrumb-item">Input Data</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body ml-5 mt-2">
                                    <!-- di sini form buka tutup -->
                                    <form action="" method="post">
                                        <div class="form-group row mt-2">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor DS</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ds" name="no_ds" onkeyup="autofill()">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="wil" class="col-sm-2 col-form-label">Wilayah</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="wil" name="wil" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nik_asal" class="col-sm-2 col-form-label">NIK Asal</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nik_asal" name="nik_asal" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hp_asal" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="hp_asal" name="hp_asal" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="alamat" name="alamat" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="jenis_kel" name="jenis_kel" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ttl_asal" class="col-sm-2 col-form-label">TLL</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="ttl_asal" name="ttl_asal" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_asal" class="col-sm-2 col-form-label">Nama Asal</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama_asal" name="nama_asal" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_baru" class="col-sm-2 col-form-label">Nama Baru</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama_baru" name="nama_baru">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nik_baru" class="col-sm-2 col-form-label">NIK Baru</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nik_baru" name="nik_baru">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tmpt_lahir" class="col-sm-2 col-form-label">TTL Baru</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="tmpt_lahir"
                                                name="tmpt_lahir" placeholder="Tempat Lahir">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="tgl_lahir" name="tgl_lahir" placeholder="dd-mm-yyyy">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_kel_baru" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-sm border-secondary" id="jenis_kel_baru"
                                                    name="jenis_kel_baru">
                                                    <option class="text-secondary" selected>---</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hp_baru" class="col-sm-2 col-form-label">Nomor HP Baru</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="hp_baru" name="hp_baru">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control form-control-sm border-secondary" id="tanggal" name="tanggal">
                                            </div>
                                        </div>
                                        <div class="card-footer col-6 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark float-right ml-3">SIMPAN</button>
                                        </div>
                                    </form>

                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        function autofill(){
                                            var no_ds = $("#no_ds").val();
                                            $.ajax({
                                                url: 'getData.php',
                                                data:"no_ds="+no_ds,
                                            }).success(function (data) {
                                                var json = data,
                                                obj = JSON.parse(json);
                                                $('#wil').val(obj.id_wil);
                                                $('#alamat').val(obj.alamat);
                                                $('#nik_asal').val(obj.nik);
                                                $('#nama_asal').val(obj.nama);
                                                $('#hp_asal').val(obj.no_hp); 
                                                $('#jenis_kel').val(obj.jenis_kel); 
                                                $('#ttl_asal').val(obj.ttl); 
                                            });
                                        }
                                    </script>

                                    <?php 
                                    if(isset($_POST["submit"])){
                                        $ds = $_POST["no_ds"];
                                        $wil = $_POST["wil"];
                                        $nik = $_POST["nik_asal"];
                                        $hp = $_POST["hp_asal"];
                                        $jenisKel = $_POST["jenis_kel"];
                                        $ttl = $_POST["ttl_asal"];
                                        $alamat = $_POST["alamat"];
                                        $nama = $_POST["nama_asal"];
                                        $nama_baru = $_POST["nama_baru"];
                                        $nik_baru = $_POST["nik_baru"];
                                        $ttl_baru = $_POST["tmpt_lahir"] . ', ' . $_POST["tgl_lahir"];
                                        $jenisKel_baru = $_POST["jenis_kel_baru"];
                                        $hp_baru = $_POST["hp_baru"];
                                        $tgl = $_POST["tanggal"];
                                
                                        $query = "INSERT INTO baliknama
                                                    VALUES
                                                    ('$ds', '$wil', '$alamat', '$nik', '$ttl', '$hp', '$jenisKel', '$nama', '$nama_baru', '$jenisKel_baru', '$ttl_baru', '$nik_baru', '$hp_baru', '$tgl', 20000);";
                                
                                        $query .= "UPDATE pelanggan
                                                    SET
                                                    nama='$nama_baru', nik='$nik_baru', ttl='$ttl_baru', jenis_kel='$jenisKel_baru', no_hp='$hp_baru' WHERE no_ds='$ds';";
                                
                                        $mysqlBaliknama = mysqli_multi_query($conn, $query);

                                        if($mysqlBaliknama == true){
                                            echo "<script>
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'success',
                                                title: 'Balik Nama Berhasil!',
                                                showConfirmButton: false,
                                                timer : 1600
                                            })
                                            </script>";
                                        }else{
                                            echo "<script>
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'error',
                                                title: 'Balik Nama Gagal! Duplicate Entry',
                                                showConfirmButton: true
                                            })
                                            </script>";
                                        }
                                     }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- jQuery .. jquery bawaan adminlte dicomment karena confilct dengan ajax untuk fungsi autofill -->
    <!-- <script src="../layout/plugins/jquery/jquery.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <script src="../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../layout/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../layout/plugins/toastr/toastr.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../layout/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../layout/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../layout/dist/js/demo.js"></script>

</body>
</html>
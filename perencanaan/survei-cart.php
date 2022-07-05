<?php
session_start();
include_once "../functions.php";
require 'item.php';

if(!isset($_SESSION['peran'])){
    header("location: ../logsystem/index.php");
    exit;
}

if (!isset($_SESSION['signin'])){
    header("location: ../logsystem/index.php");
}

$activeSurvei = "active";
?>

<!DOCTYPE html>
<head>
    <?php
    include_once ("partials/head.php");
    include_once ("partials/cssdatatables.php");
    ?> 
</head>
<?php include_once ("../database.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="../libraries/sweetalert2/dist/sweetalert2.min.js"></script>

    <div class="wrapper">
        <?php include_once ("partials/navbar.php") ?>
        <?php include_once ("partials/sidebar.php") ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1 class="d-inline mr-4">Keranjang Bahan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Antrian Survei</li>
                                <li class="breadcrumb-item active">Input Hasil Survei</li>
                                <li class="breadcrumb-item">Keranjang Bahan</li>
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
                                <div class="card-body my-3">
                                    <?php 
                                    $noreg = $_GET['no_reg'];
                                    $sql = "SELECT pendaftaran.*, antri_daftar.nama, antri_daftar.jenis_kel, antri_daftar.no_hp, antri_daftar.alamat
                                            FROM pendaftaran INNER JOIN antri_daftar ON pendaftaran.no_reg = antri_daftar.no_reg WHERE pendaftaran.no_reg='$noreg'";
                                    $result = $conn->query($sql);
                                                
                                    while($data = $result->fetch_assoc()){
                                    ?>

                                    <form action="" method="post">
                                        <div class="form-group row">
                                            <label for="no_ds" class="col-sm-2 col-form-label">Nomor Registrasi</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_ds"
                                                name="no_ds" value="<?= $noreg; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="nama"
                                                name="nama" autocomplete="off" value="<?= $data['nama']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control form-control-sm border-secondary" id="alamat"
                                                name="alamat" rows="2" autocomplete="off" value="" readonly><?= $data['alamat']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm border-secondary" id="no_hp"
                                                name="no_hp" autocomplete="off" value="<?= $data['no_hp']; ?>" readonly>
                                            </div>
                                        </div>
                                        <!-- <div class="card-footer col-6 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark">SIMPAN</button>
                                        </div> -->
                                    </form>
                                    <?php } ?>

                                    <hr>
                                    <?php 
                                    if(isset($_GET['kode']) && !isset($_POST['update']))  { 
                                        $kode = $_GET['kode'];
                                        $sql1 = "SELECT * FROM gudang WHERE kode='$kode'";
                                        $result1 = mysqli_query($conn, $sql1);
                                        $bahan = mysqli_fetch_object($result1); 
                                        $item = new Item();
                                        $item->kode = $bahan->kode;
                                        $item->jenis = $bahan->jenis;
                                        $item->nama = $bahan->nama;
                                        $item->harga = $bahan->harga;
                                        $item->ukuran = $bahan->ukuran;
                                        // $iteminstock = $product->quantity;
                                        $item->banyaknya = 1;
                                        // Check product is existing in cart
                                        $index = -1;
                                        $cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
                                        for($i=0; $i<count($cart);$i++)
                                            if ($cart[$i]->kode == $_GET['kode']){
                                                $index = $i;
                                                break;
                                            }
                                            if($index == -1){
                                                $_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
                                            }else{
                                                     $cart[$index]->banyaknya++;
                                                     $_SESSION['cart'] = $cart;
                                            }
                                    }
                                    // Delete product in cart
                                    if(isset($_GET['index']) && !isset($_POST['update'])) {
                                        $cart = unserialize(serialize($_SESSION['cart']));
                                        unset($cart[$_GET['index']]);
                                        $cart = array_values($cart);
                                        $_SESSION['cart'] = $cart;
                                    }
                                    // Update quantity in cart
                                    if(isset($_POST['update'])) {
                                      $arrQuantity = $_POST['banyaknya'];
                                      $cart = unserialize(serialize($_SESSION['cart']));
                                      for($i=0; $i<count($cart);$i++) {
                                         $cart[$i]->banyaknya = $arrQuantity[$i];
                                      }
                                      $_SESSION['cart'] = $cart;
                                    }
                                    ?>
                                    <h5>Bahan yang telah dipilih</h5>
                                    <form method="POST">
                                        <div class="table-responsive">
                                            <table class="table table-sm">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="text-center">Opsi</th>
                                                        <th scope="col" class="text-center">Jenis</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">Ukuran (inci)</th>
                                                        <th scope="col" class="text-right">Harga (satuan)</th>
                                                        <th scope="col" class="text-center">Banyaknya</th>
                                                        <th scope="col" class="text-right">Sub Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    $cart = unserialize(serialize($_SESSION['cart']));
                                                    $s = 0;
                                                    $index = 0;
                                                    for($i=0; $i<count($cart); $i++){
                                                        $s += $cart[$i]->harga * $cart[$i]->banyaknya;
                                                ?>	
                                                    <tr>
                                                        <td class="text-center"><a href="survei-cart.php?index=<?= $index; ?>" onclick="return confirm('Yakin ingin menghapus item?')" class="text-danger">Hapus</a></td>
                                                        <td align='center'><?= $cart[$i]->jenis; ?></td>
                                                        <td> <?= $cart[$i]->nama; ?> </td>
                                                        <td> <?= $cart[$i]->ukuran; ?> </td>
                                                        <td class="text-right"><?= $cart[$i]->harga; ?></td>
                                                        <td class="text-center"><input type="number" min="1" value="<?= $cart[$i]->banyaknya; ?>" style='width:50px;' name="banyaknya[]"> </td>  
                                                        <td class="text-right"><?= rupiah($cart[$i]->harga * $cart[$i]->banyaknya); ?></td>
                                                    </tr>
                                                    <?php $index++; }
                                                    $_SESSION['total'] = $s; ?>
                                                    <tr>
                                                        <td colspan="6" style="text-align:right; font-weight:bold"> 
                                                        <input class="bg-secondary" value="Totalkan" type="submit" name="update" alt="Totalkan">
                                                        <input type="hidden" name="update">
                                                        </td>
                                                        <td class="text-right"><input value="<?=$s;?>" type="number" name="total" alt="Total dari Sub-Total" style='width:100px;text-align:right;'></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                    <div class="text-right">
                                        <a href="input-survei.php?no_reg=<?=$noreg?>" class="mr-4 text-bold"><i class="bi bi-plus-circle"></i>Tambahkan Bahan Lain</a>
                                        <a href="simpan-surveibahan.php?no_reg=<?=$noreg?>" class="text-success text-bold"><i class="bi bi-save"></i>Simpan Survei</a>
                                        <?php 
                                        if(isset($_GET["kode"]) || isset($_GET["index"])){
                                        header('Location: survei-cart.php');
                                        } 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php
    include_once ("partials/importjs.php");
    include_once ("partials/scriptsdatatables.php");
    ?>

    <script>
        $(function () {
        $('[data-toggle="popover"]').popover()
        })
    </script>

</body>

</html>
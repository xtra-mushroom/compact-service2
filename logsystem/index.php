<?php 
session_start();
include('../functions.php');

if(isset($_POST['signin'])){
    $uname = $_POST['username'];
    $pw = $_POST['password'];
    $latestLogin = date("Y-m-d H:i:s");

    $result1 = mysqli_query($conn, "SELECT * FROM login WHERE username = '$uname'");
    $result2 = mysqli_query($conn, "SELECT ad.nama as nama_pemohon, ad.jenis_kel as pemohon_jk, ad.no_reg, ad.no_log, ad.passwd_pelanggan, p.nama as nama_pelanggan, p.jenis_kel as pelanggan_jk, p.no_ds FROM antri_daftar as ad INNER JOIN pelanggan as p ON p.no_ds = ad.no_log WHERE no_log = '$uname'");
    $result3 = mysqli_query($conn, "SELECT ad.nama as nama_pemohon, ad.jenis_kel as pemohon_jk, ad.no_reg, ad.no_log FROM antri_daftar as ad WHERE no_log = '$uname'");

    if(mysqli_num_rows($result1) > 0){
        $row =  mysqli_fetch_assoc($result1);
        
        if(md5($pw) == $row['password']){
            $_SESSION['signin'] = true;
            $_SESSION['peran'] = $row['peran'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['jenis_kel'] = $row['jenis_kel'];
            $_SESSION['id'] = $row['id'];
            if($row['peran'] == "PEGAWAI"){
                $update = mysqli_query($conn, "UPDATE login SET login_terakhir = '$latestLogin' WHERE username = '$uname'");
                header("Location: ../index.php");
            }elseif($row['peran'] == "TEKNISI"){
                $update = mysqli_query($conn, "UPDATE login SET login_terakhir = '$latestLogin' WHERE username = '$uname'");
                header("Location: ../perencanaan/index.php");
            }elseif($row['peran'] == "PIMPINAN"){
                $update = mysqli_query($conn, "UPDATE login SET login_terakhir = '$latestLogin' WHERE username = '$uname'");
                header("Location: ../pimpinan/index.php");
            }else{
                $message = "Anda tidak memiliki hak akses";
            }
            exit;
        }else{
            $message = "Password anda salah";
        }

    }elseif(mysqli_num_rows($result1) < 1){
        $row =  mysqli_fetch_assoc($result2);

        if(md5($pw) == $row['passwd_pelanggan']){
            $_SESSION['signin'] = true;
            $_SESSION['username'] = $row['nama_pelanggan'];
            $_SESSION['noreg'] = $row['no_reg'];
            $_SESSION['no_log'] = $row['no_ds'];
            $_SESSION['jenis_kel'] = $row['pelanggan_jk'];
            header("Location: ../otheruser/index.php");

        }elseif(mysqli_num_rows($result2) < 1){
        $row =  mysqli_fetch_assoc($result3);

            if($pw == $row['no_log']){
                $_SESSION['signin'] = true;
                $_SESSION['username'] = $row['nama_pemohon'];
                $_SESSION['noreg'] = $row['no_reg'];
                $_SESSION['no_log'] = $row['no_log'];
                $_SESSION['jenis_kel'] = $row['pemohon_jk'];
                header("Location: ../otheruser/index.php");
            }else{
                $message = "Nomor Login Anda Salah";
            }
        }

    }else{
        $message = "Akun anda tidak terdaftar";
    }
    $error = true;
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Login Pelayanan | PDAM Balangan</title>
    <!-- icon tab -->
    <link rel="shortcut icon" href="../assets/images/pdam-logo.png">
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form" method="post">
                <img src="../assets/images/pdam-logo.png" width="120px" alt="">
                    <h2 class="title">Log in</h2>
                    <p style="color:red"><?= $message ?></p>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" required autofocus autocomplete="off"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password"/ required>
                    </div>
                    <input type="submit" name="signin" value="Login" class="btn solid"/>
                </form>
                <!-- <form action="#" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-briefcase"></i>
                        <input type="jabatan" placeholder="Employment"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password"/>
                    </div>
                    <input type="submit" class="btn" value="Sign up"/>
                </form> -->
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    
                    <h3>PDAM BALANGAN</h3>
                    <p>
                        Silahkan masuk dengan akun anda untuk mengakses menu pelayanan
                    </p>
                    <!-- <p>
                        Anda karyawan dan belum memilik akun?
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button> -->
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
            <!-- <div class="panel right-panel">
                <div class="content">
                    <h3>PDAM BALANGAN</h3>
                    <p>
                        Silahkan lengkapi form untuk membuat akun
                    </p>
                    <p>
                        Sudah memiliki akun?
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div> -->
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
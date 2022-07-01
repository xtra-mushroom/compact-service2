<?php 
session_start();
include('../functions.php');

if(isset($_POST['signin'])){
    $uname = $_POST['username'];
    $pw = $_POST['password'];
    $latestLogin = date("Y-m-d H:i:s");

    $result1 = mysqli_query($conn, "SELECT * FROM login WHERE username = '$uname'");
    $result2 = mysqli_query($conn, "SELECT nama, jenis_kel, no_reg, no_log FROM antri_daftar WHERE no_log = '$uname'");

    if(mysqli_num_rows($result1) > 0){
        $row =  mysqli_fetch_assoc($result1);

        if(md5($pw) == $row['password']){
            $_SESSION['signin'] = true;
            $_SESSION['peran'] = $row['peran'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];

            if($row['peran'] == "PEGAWAI"){
                $_SESSION['username'] = $uname;
		        $_SESSION['peran'] = "PEGAWAI";
                $update = mysqli_query($conn, "UPDATE login SET login_terakhir = '$latestLogin' WHERE username = '$uname'");
                header("Location: ../index.php");
            }elseif($row['peran'] == "PELANGGAN"){
                $_SESSION['username'] = $uname;
		        $_SESSION['peran'] = "PELANGGAN";
                $update = mysqli_query($conn, "UPDATE login SET login_terakhir = '$latestLogin' WHERE username = '$uname'");
                header("Location: ../pelanggan/halaman-pelanggan.php");
            }elseif($row['peran'] == "PERENCANA"){
                $_SESSION['username'] = $uname;
		        $_SESSION['peran'] = "PERENCANA";
                $update = mysqli_query($conn, "UPDATE login SET login_terakhir = '$latestLogin' WHERE username = '$uname'");
                header("Location: ../perencanaan/index.php");
            }elseif($row['peran'] == "DIREKTUR"){
                $update = mysqli_query($conn, "UPDATE login SET login_terakhir = '$latestLogin' WHERE username = '$uname'");
                header("Location: ../pimpinan/halaman-pengesahan.php");
            }else{
                $message = "Anda tidak memiliki hak akses";
            }
            exit;
        }else{
            $message = "Password anda salah";
        }

    }elseif(mysqli_num_rows($result1) < 1){
        $row =  mysqli_fetch_assoc($result2);

        if($pw == $row['no_log']){
            $_SESSION['signin'] = true;
            $_SESSION['username'] = $row['nama'];
            $_SESSION['noreg'] = $row['no_reg'];
            $_SESSION['password'] = $row['no_log'];
            $_SESSION['jenis_kel'] = $row['jenis_kel'];
            header("Location: ../pemohon/index.php");
        }else{
            $message = "Nomor Login Anda Salah";
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
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="#" class="sign-in-form" method="post">
                    <h2 class="title">Sign in</h2>
                    <p style="color:red"><?= $message ?></p>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password"/ required>
                    </div>
                    <input type="submit" name="signin" value="Login" class="btn solid"/>
                </form>
                <form action="#" class="sign-up-form">
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
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>PDAM BALANGAN</h3>
                    <p>
                        Silahkan masuk dengan akun anda untuk mengakses menu pelayanan
                    </p>
                    <p>
                        Anda karyawan dan belum memilik akun?
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
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
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
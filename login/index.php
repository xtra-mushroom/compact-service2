<?php 
session_start();

$server = "localhost";
$user = "lava";
$passwd = "linolee";
$db = "compact_service";

$conn = new mysqli($server, $user, $passwd, $db);

$username = "";

if(isset($_POST['signin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $latestLogin = date("Y-m-d H:i:s");
    if($username == '' || $password == ''){
        $message = "Data tidak bisa kosong!";
    }else{
        $query = "SELECT * FROM login WHERE username ='$username'";
        $sql1 = mysqli_query($conn, $query);
        $result = mysqli_fetch_array($sql1);

        if($result['username'] == ''){
            $message = "Username tidak terdaftar!";
        } elseif($result['password'] != md5($password)){
            $message = "Password tidak terdaftar atau salah!";
        } else {
            $message = "";
            $_SESSION['username'] = $username;
            $_SESSION['password'] = md5($password);
            header("location: ../index.php");
        }   
    }
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
                    <p class="text-danger"><?= $message ?></p>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password"/>
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
                        <input type="jabatan" placeholder="Jabatan"/>
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
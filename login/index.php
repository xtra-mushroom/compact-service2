<?php 
session_start();

$server = "localhost";
$user = "lava";
$passwd = "linolee";
$db = "compact_service";

$conn = new mysqli($server, $user, $passwd, $db);

$username = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == '' || $password == ''){
        echo "Data tidak bisa kosong!";
    }else{
        $query = "SELECT * FROM login WHERE username ='$username'";
        $sql1 = mysqli_query($conn, $query);
        $result = mysqli_fetch_array($sql1);

        if($result['username'] == ''){
            echo "username tidak terdaftar!";
        } elseif($result['password'] != md5($password)){
            echo "password tidak terdaftar atau salah!";
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = md5($password);
            header("location: ../index.php");
        }   
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../layout/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars
 <link rel="stylesheet" href="../layout/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
 <!-- Theme style -->
    <link rel="stylesheet" href="../layout/dist/css/adminlte.min.css">
    <!-- icon tab -->
    <link rel="shortcut icon" href="../layout/dist/img/pdam-logo.png">
    <link rel="stylesheet" href="../layout/dist/css/style.css">
</head>

<body>
	<div class="kotak_login">
		<p class="tulisan_login">Login Pelayanan</p>

		<form id="loginform" method="post" role="form">
			<label for="username">Username</label>
            <input id="login-username" type="text" class="form-control form-control-lg form_login border-primary" name="username" value="<?php echo $username ?>" placeholder="Username atau Email">

			<label for="password">Password</label>
            <input id="login-password" type="password" class="form-control form-control-lg form_login border-primary" name="password" placeholder="Password">

			<input type="submit" name="login" class="tombol_login mb-3" value="Login">

		</form>
		
	</div>

    <script src="login.js"></script>
</body>

</html>
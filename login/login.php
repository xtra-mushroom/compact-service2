<?php

session_start();

$server = "localhost";
$user = "lava";
$passwd = "linolee";
$db = "compact_service";
$namaUser = $_POST['username'];
$passwordUser = md5($_POST['password']);

$conn = new mysqli($server, $user, $passwd, $db);

if ($conn->connect_error){
    echo $conn->connect_error;
} else {
    $query = "SELECT * FROM user_admin WHERE nama = '$namaUser' AND password = '$passwordUser'";

    $result = $conn->query($query);
    if ($result->num_rows > 0){
    $data = $result->fetch_assoc();
    $_SESSION['nama']=$data['nama'];
    $_SESSION['id']=$data['id'];
    // echo $_SESSION['iduser'];
    header("location: ../index.php");
  } else {
    header("location: index.php");
  }
}
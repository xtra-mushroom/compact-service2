<?php
// session_destroy(); // Hapus semua session
// header("location: index.php"); // Redirect ke halaman index.php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("Location: index.php");
exit;
?>
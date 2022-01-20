<?php
require "../functions.php";

$id_kec = $_GET['id_kecamatan'];

$sql = "SELECT * FROM desa WHERE id_kec='$id_kec'";
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($data);
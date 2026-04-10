<?php

$host = getenv("MYSQLHOST");
$user = getenv("MYSQLUSER");
$pass = getenv("MYSQLPASSWORD");
$db   = getenv("MYSQLDATABASE");
$port = getenv("MYSQLPORT");

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (!isset($_GET['nama']) || empty($_GET['nama'])) {
    echo "nama kosong";
    exit;
}

$nama = $_GET['nama'];

$stmt = $conn->prepare("INSERT INTO absensi (nama) VALUES (?)");
$stmt->bind_param("s", $nama);

if($stmt->execute()){
    echo "success";
}else{
    echo "error";
}

$stmt->close();
$conn->close();
?>

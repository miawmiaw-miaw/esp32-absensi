<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = getenv("MYSQLHOST");
$user = getenv("MYSQLUSER");
$pass = getenv("MYSQLPASSWORD");
$db   = getenv("MYSQLDATABASE");
$port = getenv("MYSQLPORT");

if (!isset($_GET['nama']) || empty($_GET['nama'])) {
    echo "nama kosong";
    exit;
}

$nama = $_GET['nama'];

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO absensi (nama) VALUES (:nama)");
    $stmt->bindParam(':nama', $nama);

    $stmt->execute();

    echo "success";

} catch (PDOException $e) {
    echo "error: " . $e->getMessage();
}
?>

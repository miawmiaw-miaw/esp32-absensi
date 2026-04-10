<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ambil ENV (pakai fallback)
$host = getenv("MYSQLHOST") ?: $_ENV["MYSQLHOST"] ?? null;
$user = getenv("MYSQLUSER") ?: $_ENV["MYSQLUSER"] ?? null;
$pass = getenv("MYSQLPASSWORD") ?: $_ENV["MYSQLPASSWORD"] ?? null;
$db   = getenv("MYSQLDATABASE") ?: $_ENV["MYSQLDATABASE"] ?? null;
$port = getenv("MYSQLPORT") ?: $_ENV["MYSQLPORT"] ?? 3306;

// Validasi
if (!$host || !$user || !$db) {
    die("ENV database tidak terbaca");
}

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

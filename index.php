<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ambil ENV (pakai fallback biar pasti kebaca)
$host = getenv("MYSQLHOST") ?: $_ENV["MYSQLHOST"] ?? null;
$user = getenv("MYSQLUSER") ?: $_ENV["MYSQLUSER"] ?? null;
$pass = getenv("MYSQLPASSWORD") ?: $_ENV["MYSQLPASSWORD"] ?? null;
$db   = getenv("MYSQLDATABASE") ?: $_ENV["MYSQLDATABASE"] ?? null;
$port = getenv("MYSQLPORT") ?: $_ENV["MYSQLPORT"] ?? 3306;

// Validasi
if (!$host || !$user || !$db) {
    die("ENV database tidak terbaca");
}

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT * FROM absensi ORDER BY waktu DESC");

    echo "<h2>Data Absensi</h2>";

    if ($stmt->rowCount() > 0) {
        foreach ($stmt as $row) {
            echo htmlspecialchars($row['nama']) . " - " . $row['waktu'] . "<br>";
        }
    } else {
        echo "Belum ada data";
    }

} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>

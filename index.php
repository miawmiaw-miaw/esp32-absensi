<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = getenv("MYSQLHOST");
$user = getenv("MYSQLUSER");
$pass = getenv("MYSQLPASSWORD");
$db   = getenv("MYSQLDATABASE");
$port = getenv("MYSQLPORT");

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT * FROM absensi ORDER BY waktu DESC");

    echo "<h2>Data Absensi</h2>";

    foreach ($stmt as $row) {
        echo $row['nama'] . " - " . $row['waktu'] . "<br>";
    }

} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>

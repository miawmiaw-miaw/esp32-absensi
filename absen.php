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

$result = $conn->query("SELECT * FROM absensi ORDER BY waktu DESC");

echo "<h2>Data Absensi</h2>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        echo $row['nama']." - ".$row['waktu']."<br>";
    }
} else {
    echo "Belum ada data";
}

$conn->close();
?>

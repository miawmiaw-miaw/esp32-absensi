<?php

$conn = new mysqli("mysql.railway.internal","root","LnVOUTmdkpbjVWQpYWvWuUOXZVZvdFOr","railway");

$result = $conn->query("SELECT * FROM absensi ORDER BY waktu DESC");

echo "<h2>Data Absensi</h2>";

while($row = $result->fetch_assoc()){
    echo $row['nama']." - ".$row['waktu']."<br>";
}

$conn->close();

?>
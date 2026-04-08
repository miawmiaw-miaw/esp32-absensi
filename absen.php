<?php

$conn = new mysqli("mysql.railway.internal","root","LnVOUTmdkpbjVWQpYWvWuUOXZVZvdFOr","railway");

$nama = $_GET['nama'];

$sql = "INSERT INTO absensi (nama) VALUES ('$nama')";

if($conn->query($sql)){
    echo "success";
}else{
    echo "error";
}

$conn->close();

?>

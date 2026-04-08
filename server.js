const express = require("express");
const mysql = require("mysql2");

const app = express();

const db = mysql.createConnection({
  host: "mysql.railway.internal",
  user: "root",
  password: process.env.MYSQLPASSWORD,
  database: "railway",
  port: 3306
});

app.get("/absen", (req,res)=>{
  const nama = req.query.nama;

  db.query(
    "INSERT INTO absensi (nama) VALUES (?)",
    [nama],
    (err,result)=>{
      if(err){
        res.send("ERROR");
      } else {
        res.send("ABSEN BERHASIL");
      }
    }
  );
});

const port = process.env.PORT || 3000;
app.listen(port, ()=>console.log("Server running"));
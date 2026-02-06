<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "dbbelajarweb";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal");
}

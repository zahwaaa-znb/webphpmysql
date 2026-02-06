<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi,
    "SELECT * FROM user_account 
     WHERE username='$username' AND password='$password'"
);

$data = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];

    header("Location: index.php");
    exit;
} else {
    echo "<script>alert('Username / Password salah');window.location='login.php';</script>";
}

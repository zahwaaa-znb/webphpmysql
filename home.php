<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link href="bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5 text-center">
  <h2 class="text-danger">Selamat Datang 🎉</h2>
  <p>Kamu berhasil login</p>

  <a href="index.php" class="btn btn-danger">Masuk Data Produk</a>
</div>

</body>
</html>

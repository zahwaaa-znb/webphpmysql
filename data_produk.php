<?php
include 'koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Produk</title>
  <link href="bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3 class="text-center text-danger">Data Produk</h3>

  <table class="table table-bordered mt-3">
    <tr class="table-danger">
      <th>No</th>
      <th>Nama</th>
      <th>Harga Jual</th>
      <th>Gambar</th>
    </tr>

    <?php $no=1; while($row=mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $row['nama_produk'] ?></td>
      <td>Rp <?= number_format($row['harga_jual']) ?></td>
      <td>
        <img src="gambar/<?= $row['gambar_produk'] ?>" width="70">
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>

</body>
</html>

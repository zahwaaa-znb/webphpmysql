<?php
include 'koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Laporan Produk</title>
  <style>
    body { font-family: Arial; }
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #000; padding: 8px; }
    th { background: #eee; }
  </style>
</head>
<body onload="window.print()">

<h3 align="center">LAPORAN DATA PRODUK</h3>

<table>
<tr>
  <th>No</th>
  <th>Nama Produk</th>
  <th>Harga Beli</th>
  <th>Harga Jual</th>
</tr>

<?php $no=1; while($row=mysqli_fetch_assoc($result)): ?>
<tr>
  <td><?= $no++ ?></td>
  <td><?= $row['nama_produk'] ?></td>
  <td><?= number_format($row['harga_beli']) ?></td>
  <td><?= number_format($row['harga_jual']) ?></td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>

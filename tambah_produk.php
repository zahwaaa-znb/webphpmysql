<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Produk</title>
  <link href="bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
<input type="text" name="nama_produk" class="form-control mb-2" placeholder="Nama Produk" required>
<input type="text" name="deskripsi" class="form-control mb-2" placeholder="Deskripsi">
<input type="number" name="harga_beli" class="form-control mb-2" placeholder="Harga Beli">
<input type="number" name="harga_jual" class="form-control mb-2" placeholder="Harga Jual">
<input type="file" name="gambar_produk" class="form-control mb-2">
<button class="btn btn-danger">Simpan</button>
</form>
</div>

</body>
</html>

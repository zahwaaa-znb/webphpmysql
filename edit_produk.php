<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM produk WHERE id=$id"));
?>
<form method="POST" action="proses_edit.php" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $id ?>">
<input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>">
<button>Simpan</button>
</form>

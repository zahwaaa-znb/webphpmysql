<?php
include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama_produk'];

mysqli_query($koneksi,"UPDATE produk SET nama_produk='$nama' WHERE id=$id");
header("Location: index.php");

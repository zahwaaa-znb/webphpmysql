<?php
include 'koneksi.php';

$nama = $_POST['nama_produk'];
$desk = $_POST['deskripsi'];
$hb   = $_POST['harga_beli'];
$hj   = $_POST['harga_jual'];

$gambar = $_FILES['gambar_produk']['name'];
$tmp    = $_FILES['gambar_produk']['tmp_name'];
$nama_baru = rand()."-".$gambar;

move_uploaded_file($tmp, "gambar/".$nama_baru);

mysqli_query($koneksi,
"INSERT INTO produk VALUES(null,'$nama','$desk','$hb','$hj','$nama_baru')");

header("Location: index.php");

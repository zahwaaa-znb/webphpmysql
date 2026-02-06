<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include('koneksi.php');

// --- PAGINATION SETTINGS ---
$limit = 5; // jumlah data per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// --- FILTER PENCARIAN ---
$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';
$where = "";
if (!empty($search)) {
  $where = "WHERE nama_produk LIKE '%$search%' OR deskripsi LIKE '%$search%'";
}

// Hitung total data
$total_query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM produk $where");
$total_data = mysqli_fetch_assoc($total_query)['total'];
$total_pages = ceil($total_data / $limit);

// Ambil data dengan pagination & filter
$query = "SELECT * FROM produk $where ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($koneksi, $query);

if (!$result) {
  die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Produk</title>

  <link href="bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="./gambar/logo.png" height="40" class="me-2 rounded">
      <strong>Data Produk</strong>
    </a>
    <li class="nav-item ms-lg-3">
  <a href="logout.php"
     class="btn btn-light btn-sm"
     onclick="return confirm('Yakin ingin logout?')">
     Logout
  </a>
</li>


    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="tambah_produk.php">Tambah Produk</a></li>
        <li class="nav-item"><a class="nav-link" href="cetak_laporan.php">Laporan</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- CONTENT -->
<div class="container my-5">
  <div class="card shadow">
    <div class="card-body">

      <h4 class="text-center text-danger mb-4">Daftar Produk</h4>

      <!-- ACTION -->
      <div class="d-flex justify-content-between mb-3">
        <a href="tambah_produk.php" class="btn btn-danger">
          + Tambah Produk
        </a>

        <form method="get" class="d-flex">
          <input type="text" name="search" class="form-control me-2"
                 placeholder="Cari produk..." value="<?= htmlspecialchars($search); ?>">
          <button class="btn btn-outline-danger">Cari</button>
        </form>
      </div>

      <!-- TABLE -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
          <thead class="table-danger text-center">
            <tr>
              <th>No</th>
              <th>Produk</th>
              <th>Deskripsi</th>
              <th>Harga Beli</th>
              <th>Harga Jual</th>
              <th>Gambar produk</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($result) == 0) {
              echo "<tr><td colspan='7' class='text-center'>Tidak ada data</td></tr>";
            } else {
              $no = $offset + 1;
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td class="text-center"><?= $no++; ?></td>
              <td><?= htmlspecialchars($row['nama_produk']); ?></td>
              <td><?= htmlspecialchars(substr($row['deskripsi'], 0, 30)); ?>...</td>
              <td>Rp <?= number_format($row['harga_beli'], 0, ',', '.'); ?></td>
              <td><span class="badge bg-success">Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?></span></td>
              <td class="text-center">
                <img src="gambar/<?= htmlspecialchars($row['gambar_produk']); ?>" 
                     class="img-thumbnail" width="80">
              </td>
              <td class="text-center">
                <a href="edit_produk.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="proses_hapus.php?id=<?= $row['id']; ?>" 
                   onclick="return confirm('Yakin hapus produk ini?')" 
                   class="btn btn-sm btn-danger">Hapus</a>
              </td>
            </tr>
            <?php } } ?>
          </tbody>
        </table>
      </div>

      <!-- PAGINATION -->
      <nav>
        <ul class="pagination justify-content-center">
          <?php if ($page > 1): ?>
            <li class="page-item">
              <a class="page-link" href="?page=<?= $page - 1; ?>&search=<?= urlencode($search); ?>">
                &laquo;
              </a>
            </li>
          <?php endif; ?>

          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
              <a class="page-link" href="?page=<?= $i; ?>&search=<?= urlencode($search); ?>">
                <?= $i; ?>
              </a>
            </li>
          <?php endfor; ?>

          <?php if ($page < $total_pages): ?>
            <li class="page-item">
              <a class="page-link" href="?page=<?= $page + 1; ?>&search=<?= urlencode($search); ?>">
                &raquo;
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>

    </div>
  </div>
</div>

<!-- FOOTER -->
<footer class="bg-danger text-white text-center py-3 fixed-bottom">
  &copy; <?= date('Y'); ?> Data Produk | Tim Developer
</footer>

<script src="bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM buku ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Buku</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrap">
  <h1>📚 Data Buku</h1>
  <?php if (isset($_GET['msg'])): ?>
    <p class="sukses">Data berhasil disimpan!</p>
  <?php endif; ?>
  <a class="btn hijau" href="form.php">+ Tambah Buku</a>
  <table>
    <tr><th>No</th><th>Sampul</th><th>Judul</th><th>Pengarang</th><th>Tahun</th><th>Aksi</th></tr>
    <?php $no = 1; while ($row = mysqli_fetch_assoc($data)): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><img src="uploads/<?= $row['foto'] ?>" alt="sampul"></td>
      <td><?= htmlspecialchars($row['judul']) ?></td>
      <td><?= htmlspecialchars($row['pengarang']) ?></td>
      <td><?= $row['tahun'] ?></td>
      <td>
        <a class="btn kuning" href="form.php?id=<?= $row['id'] ?>">Edit</a>
        <button class="btn merah" onclick="konfirmHapus(<?= $row['id'] ?>)">Hapus</button>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>
<script src="app.js"></script>
</body>
</html>

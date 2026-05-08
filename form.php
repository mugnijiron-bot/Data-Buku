<?php include 'koneksi.php';
$id   = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$buku = ['id'=>0,'judul'=>'','pengarang'=>'','tahun'=>date('Y'),'foto'=>''];
if ($id) $buku = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM buku WHERE id=$id"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= $id ? 'Edit' : 'Tambah' ?> Buku</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrap kecil">
  <h1><?= $id ? 'Edit' : 'Tambah' ?> Buku</h1>
  <form method="POST" action="simpan.php" enctype="multipart/form-data" onsubmit="return validasi(<?= $id ?>)">
    <input type="hidden" name="id" value="<?= $buku['id'] ?>">
    <input type="hidden" name="foto_lama" value="<?= $buku['foto'] ?>">

    <label>Judul Buku</label>
    <input type="text" name="judul" id="judul" value="<?= htmlspecialchars($buku['judul']) ?>">

    <label>Pengarang</label>
    <input type="text" name="pengarang" id="pengarang" value="<?= htmlspecialchars($buku['pengarang']) ?>">

    <label>Tahun Terbit</label>
    <input type="number" name="tahun" id="tahun" value="<?= $buku['tahun'] ?>" min="1000" max="<?= date('Y') ?>">

    <label>Foto Sampul <?= $id ? '<small>(kosongkan jika tidak diubah)</small>' : '' ?></label>
    <?php if ($buku['foto']): ?>
      <img id="prev" src="uploads/<?= $buku['foto'] ?>" alt="preview">
    <?php else: ?>
      <img id="prev" style="display:none" alt="preview">
    <?php endif; ?>
    <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png">

    <button type="submit" class="btn biru">💾 Simpan</button>
  </form>
  <a href="index.php">← Kembali</a>
</div>
<script src="app.js"></script>
</body>
</html>

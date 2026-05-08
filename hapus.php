<?php
include 'koneksi.php';
$id = (int)$_GET['id'];
$r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT foto FROM buku WHERE id=$id"));
if ($r && file_exists("uploads/{$r['foto']}")) unlink("uploads/{$r['foto']}");
mysqli_query($conn, "DELETE FROM buku WHERE id=$id");
header("Location: index.php");
exit;

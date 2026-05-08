<?php
include 'koneksi.php';
$id        = (int)$_POST['id'];
$judul     = mysqli_real_escape_string($conn, $_POST['judul']);
$pengarang = mysqli_real_escape_string($conn, $_POST['pengarang']);
$tahun     = (int)$_POST['tahun'];
$foto      = $_POST['foto_lama'];

if (!empty($_FILES['foto']['name'])) {
    $ext  = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
    $foto = time() . '.' . $ext;
    move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/$foto");
    if ($_POST['foto_lama'] && file_exists("uploads/{$_POST['foto_lama']}"))
        unlink("uploads/{$_POST['foto_lama']}");
}

if ($id)
    mysqli_query($conn, "UPDATE buku SET judul='$judul',pengarang='$pengarang',tahun=$tahun,foto='$foto' WHERE id=$id");
else
    mysqli_query($conn, "INSERT INTO buku(judul,pengarang,tahun,foto) VALUES('$judul','$pengarang',$tahun,'$foto')");

header("Location: index.php?msg=simpan");
exit;

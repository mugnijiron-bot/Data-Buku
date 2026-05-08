 Aplikasi Data Buku (CRUD PHP)
Aplikasi sederhana untuk mengelola data buku (tambah, edit, hapus) dengan upload sampul.

 Fitur
Tampilkan daftar buku

Tambah / edit / hapus buku

Upload sampul (JPG/PNG max 2MB)

Preview gambar sebelum upload

 Instalasi
Pindahkan semua file ke htdocs/buku/

Buat database: jalankan database.sql di phpMyAdmin

Pastikan folder uploads/ ada dan bisa ditulis

Akses: http://localhost/buku/index.php

 Struktur
File	Fungsi
index.php	Daftar buku
form.php	Form tambah/edit
simpan.php	Proses simpan
hapus.php	Hapus data & file
koneksi.php	Koneksi DB
style.css	Tampilan
app.js	Validasi & preview
 Konfigurasi DB
Edit koneksi.php sesuai setting MySQL Anda:

php
mysqli_connect("localhost", "root", "", "db_buku");
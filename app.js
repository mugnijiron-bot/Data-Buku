// Preview foto sebelum upload
var inputFoto = document.getElementById('foto');
if (inputFoto) {
  inputFoto.addEventListener('change', function () {
    if (this.files[0]) {
      var prev = document.getElementById('prev');
      prev.src = URL.createObjectURL(this.files[0]);
      prev.style.display = 'block';
    }
  });
}

// Konfirmasi hapus
function konfirmHapus(id) {
  if (confirm('Yakin ingin menghapus data ini?')) {
    location.href = 'hapus.php?id=' + id;
  }
}

// Validasi form sebelum submit
function validasi(isEdit) {
  var judul     = document.getElementById('judul').value.trim();
  var pengarang = document.getElementById('pengarang').value.trim();
  var tahun     = document.getElementById('tahun').value.trim();
  var foto      = document.getElementById('foto');

  if (!judul)     { alert('Judul wajib diisi!'); return false; }
  if (!pengarang) { alert('Pengarang wajib diisi!'); return false; }
  if (!tahun)     { alert('Tahun wajib diisi!'); return false; }

  if (!isEdit && foto.files.length === 0) {
    alert('Foto sampul wajib dipilih!'); return false;
  }

  if (foto.files.length > 0) {
    var ext  = foto.files[0].name.split('.').pop().toLowerCase();
    var size = foto.files[0].size;
    if (!['jpg','jpeg','png'].includes(ext)) { alert('File harus JPG atau PNG!'); return false; }
    if (size > 2 * 1024 * 1024)             { alert('Ukuran file maksimal 2 MB!'); return false; }
  }

  return true;
}

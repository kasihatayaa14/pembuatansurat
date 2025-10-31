<div class="card card-warning">
    <form action="db/dbsurat.php?proses=tambah" method="POST" enctype="multipart/form-data">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Data Surat Baru</h3>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="tanggal_surat">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="nosurat">Nomor Surat</label>
                <input type="text" name="nosurat" class="form-control" placeholder="Masukkan Nomor Surat Resmi" required>
            </div>

            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" name="perihal" class="form-control" placeholder="Perihal/Subjek Surat" required>
            </div>

            <div class="form-group">
                <label for="isisurat">Isi Surat</label>
                <textarea name="isisurat" class="form-control" rows="4" placeholder="Masukkan isi surat atau ringkasan" required></textarea>
            </div>
            
            <hr>

            <div class="form-group">
                <label for="fotosurat">File Surat (Dokumen / Lampiran)</label>
                <input type="file" name="fotosurat" class="form-control" accept="image/*, application/pdf" onchange="previewImage(event)">
                <small class="form-text text-muted">Hanya menerima gambar (JPG, PNG) atau PDF.</small>
                <br>
                
                <img id="preview" src="#" alt="Preview File Surat" style="max-width: 150px; display:none; border-radius:5px; border:1px solid #ddd;">
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-upload"></i> Simpan Data Surat
            </button>
            <a href="index.php?halaman=surat" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>

<script>
// Fungsi JavaScript untuk menampilkan preview gambar
function previewImage(event) {
    const file = event.target.files[0];
    const output = document.getElementById('preview');
    
    // Cek jika file adalah gambar
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function() {
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        // Jika bukan gambar (misal PDF), sembunyikan preview
        output.style.display = 'none';
        output.src = '#'; 
    }
}
</script>
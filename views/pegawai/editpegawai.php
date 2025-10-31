<?php
// editpegawai.php

// Pastikan koneksi.php tersedia dan berfungsi
include "koneksi.php"; 

// -------------------------------------------------------------
// 1. Logic Pengambilan Data Pegawai
// -------------------------------------------------------------

// Ambil ID Pegawai dari URL (menggunakan idpegawai, sesuai primary key tabel)
$id_pegawai = isset($_GET['idpegawai']) ? $_GET['idpegawai'] : null; 

// Validasi parameter
if (!$id_pegawai) {
    echo "<div class='alert alert-danger'>ID Pegawai tidak ditemukan!</div>";
    exit();
}

// Query untuk mengambil data pegawai
$query_pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE idpegawai='$id_pegawai'");

// Cek apakah query gagal
if (!$query_pegawai) {
    die("Query Gagal: " . mysqli_error($koneksi)); 
}

// Ambil datanya
$data_pegawai = mysqli_fetch_array($query_pegawai); 

// Jika data tidak ditemukan, tampilkan pesan error
if (!$data_pegawai) {
    echo "<div class='alert alert-danger'>Data Pegawai dengan ID *{$id_pegawai}* tidak ditemukan!</div>";
    exit();
}
?>

<section class="content">
    <div class="card text-sm">
        <div class="card-header bg-gradient-warning">
            <h2 class="card-title text-white">Edit Data Pegawai: *<?php echo htmlspecialchars($data_pegawai['nama']); ?>*</h2>
        </div>

        <div class="card-body">
            <div class="card card-warning">
                <form action="db/dbpegawai.php?proses=edit" method="POST" enctype="multipart/form-data">
                    <div class="card-body-sm ml-2">

                        <input type="hidden" name="idpegawai" value="<?php echo $data_pegawai['idpegawai']; ?>">

                        <div class="form-group">
                            <label for="nama">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?php echo htmlspecialchars($data_pegawai['nama']); ?>"
                                placeholder="Masukkan nama lengkap pegawai" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                value="<?php echo htmlspecialchars($data_pegawai['jabatan']); ?>"
                                placeholder="Contoh: Staff Administrasi" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="2"
                                placeholder="Masukkan alamat lengkap" required><?php echo htmlspecialchars($data_pegawai['alamat']); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="nohp">Nomor HP</label>
                            <input type="text" class="form-control" id="nohp" name="nohp"
                                value="<?php echo htmlspecialchars($data_pegawai['nohp']); ?>"
                                placeholder="Masukkan Nomor HP" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?php echo htmlspecialchars($data_pegawai['email']); ?>"
                                placeholder="Masukkan alamat email" required>
                        </div>

                        <div class="form-group">
                            <label for="fotopegawai">Foto Pegawai</label>
                            <input type="file" name="fotopegawai" class="form-control" accept="image/*" onchange="previewEditImage(event)">
                            <br>

                            <?php if (!empty($data_pegawai['fotopegawai'])): ?>
                                <img id="previewEdit" src="assets/foto_pegawai/<?php echo $data_pegawai['fotopegawai']; ?>" alt="Foto Lama" style="max-width: 120px; border-radius:10px; border:1px solid #ccc;">
                            <?php else: ?>
                                <img id="previewEdit" src="#" alt="Preview Foto" style="max-width: 120px; display:none; border-radius:10px; border:1px solid #ccc;">
                            <?php endif; ?>
                        </div>

                        <script>
                            function previewEditImage(event) {
                                const reader = new FileReader();
                                reader.onload = function() {
                                    const output = document.getElementById('previewEdit');
                                    output.src = reader.result;
                                    output.style.display = 'block';
                                }
                                reader.readAsDataURL(event.target.files[0]);
                            }
                        </script>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning float-right ml-3">
                                <i class="fa fa-edit"></i> Update
                            </button>
                            <a href="index.php?halaman=pegawai" class="btn btn-secondary float-right">
                                <i class="fa fa-arrow-left"></i> Batal
                            </a>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="card-footer text-sm text-muted">
            Formulir untuk memperbarui data detail pegawai.
        </div>
    </div>
</section>
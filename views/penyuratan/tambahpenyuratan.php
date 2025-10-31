<div class="card card-warning">
    <form action="db/dbpenyuratan.php?proses=tambah" method="POST">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Proses Penyuratan Baru</h3>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="idadmin">ID Admin</label>
                <input type="text" name="idadmin" class="form-control" placeholder="Masukkan ID Admin" required>
            </div>

            <div class="form-group">
                <label for="idsurat">ID Surat</label>
                <input type="text" name="idsurat" class="form-control" placeholder="Masukkan ID Surat" required>
            </div>

            <div class="form-group">
                <label for="idpegawai">ID Pegawai</label>
                <input type="text" name="idpegawai" class="form-control" placeholder="Masukkan ID Pegawai" required>
            </div>

            <div class="form-group">
                <label for="jenissurat">Jenis Surat</label>
                <input type="text" name="jenissurat" class="form-control" placeholder="Masukkan Jenis Surat" required>
            </div>

            <div class="form-group">
                <label for="status">Status Proses</label>
                <select name="status" class="form-control" required>
                    <option value="Pending">Pending</option>
                    <option value="Diproses">Diproses</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tanggalproses">Tanggal Proses</label>
                <input type="date" name="tanggalproses" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Simpan Proses
            </button>
            <a href="index.php?halaman=penyuratan" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>
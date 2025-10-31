<?php
include "koneksi.php";

// Ambil data dari tabel admin
$query = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY idadmin ASC");
?>

<!-- Default box -->
<div class="card card-solid shadow-sm border-0">
  <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
    <h4 class="mb-0"><i class="fas fa-user-shield me-2"></i> Data Admin</h4>
    <a href="index.php?halaman=tambahadmin" class="btn btn-light btn-sm fw-bold shadow-sm">
      <i class="fas fa-user-plus me-1"></i> Tambah Admin
    </a>
  </div>

  <div class="card-body pb-0 bg-light">
    <div class="row">
      <?php
      if (mysqli_num_rows($query) > 0) {
        while ($data = mysqli_fetch_assoc($query)) {
      ?>
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-white d-flex flex-fill border-0 shadow-sm">
              <div class="card-header text-muted border-bottom-0">
                Administrator
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-7">
                    <h2 class="lead mb-1"><b><?= htmlspecialchars($data['nama']); ?></b></h2>
                    <p class="text-muted text-sm mb-1"><b>Email:</b> <?= htmlspecialchars($data['email']); ?></p>
                    <p class="text-muted text-sm"><b>Password:</b> <?= htmlspecialchars($data['password']); ?></p>
                  </div>
                  <div class="col-5 text-center">
                    <?php if (!empty($data['fotoadmin'])) { ?>
                      <img src="uploads/<?= htmlspecialchars($data['fotoadmin']); ?>" alt="Foto Admin" class="img-circle img-fluid" style="object-fit: cover; width: 100px; height: 100px;">
                    <?php } else { ?>
                      <img src="dist/img/user2-160x160.jpg" alt="Default User" class="img-circle img-fluid">
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <a href="index.php?halaman=editadmin&idadmin=<?= $data['idadmin']; ?>" class="btn btn-sm btn-warning me-1">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <a href="db/dbadmin.php?proses=hapus&idadmin=<?= $data['idadmin']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus admin ini?');">
                    <i class="fas fa-trash"></i> Hapus
                  </a>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo "<div class='col-12 text-center text-muted'>Belum ada data admin.</div>";
      }
      ?>
    </div>
  </div>

  <div class="card-footer bg-white">
    <nav aria-label="Admin Page Navigation">
      <ul class="pagination justify-content-center m-0">
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
      </ul>
    </nav>
  </div>
</div>

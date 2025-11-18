<?php
session_start();
include 'koneksi.php';

// CEK LOGIN
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$idadmin = $_SESSION['idadmin'];

// AMBIL DATA ADMIN
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE idadmin='$idadmin'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Profil Saya</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">

<style>
body {
    background: #f0f2f5;
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    width: 550px;
    background: #fff;
    margin: 60px auto;
    padding: 35px;
    border-radius: 18px;
    box-shadow: 0 8px 28px rgba(0,0,0,0.15);
}

.title {
    font-size: 24px;
    font-weight: 600;
    color: #003b70;
    text-align: center;
    margin-bottom: 25px;
}

.profile-photo {
    width: 130px;
    height: 130px;
    border-radius: 20px;
    object-fit: cover;
    display: block;
    margin: 0 auto 15px;
    border: 3px solid #0d6efd;
}

.info-group {
    margin-bottom: 16px;
}

label {
    font-weight: 600;
    font-size: 14px;
    color: #003b70;
}

input {
    width: 100%;
    padding: 12px;
    border: 1px solid #bbb;
    border-radius: 10px;
    margin-top: 5px;
    font-size: 14px;
}

input[readonly] {
    background: #e9ecef;
}

.btn-update {
    width: 100%;
    padding: 13px;
    background: #0d6efd;
    border: none;
    border-radius: 12px;
    color: white;
    font-size: 15px;
    font-weight: 600;
    margin-top: 15px;
    cursor: pointer;
    transition: 0.25s;
}

.btn-update:hover {
    background: #094bb8;
}

.back {
    text-align: center;
    margin-top: 15px;
}

.back a {
    color: #0d6efd;
    text-decoration: none;
}
</style>
</head>

<body>

<div class="container">

    <h2 class="title">Profil Admin</h2>

    <img src="uploads/<?php echo $data['foto']; ?>" class="profile-photo">

    <form action="updateprofile.php" method="POST" enctype="multipart/form-data">

        <div class="info-group">
            <label>ID Admin</label>
            <input type="text" value="<?php echo $data['idadmin']; ?>" readonly>
        </div>

        <div class="info-group">
            <label>Nama Admin</label>
            <input type="text" name="namaadmin" value="<?php echo $data['namaadmin']; ?>" required>
        </div>

        <div class="info-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $data['username']; ?>" required>
        </div>

        <div class="info-group">
            <label>Foto Profil</label>
            <input type="file" name="foto">
        </div>

        <button type="submit" class="btn-update">Perbarui Profil</button>

    </form>

    <div class="back">
        <a href="index.php?halaman=dashboard">← Kembali ke Dashboard</a>
    </div>

</div>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Aplikasi Pembuatan Surat</title>

<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #ff6fb1, #c2408c);
    color: #1a1a1a;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background: #ffffff;
    padding: 50px 40px;
    border-radius: 16px;
    width: 420px;
    text-align: center;
    box-shadow: 0px 12px 30px rgba(0,0,0,0.18);
    animation: fadeIn 0.7s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.logo {
    width: 90px;
    margin-bottom: 15px;
    border-radius: 12px;
}

h1 {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #c2408c;
}

p {
    font-size: 14px;
    color: #555;
    margin-bottom: 25px;
}

.btn {
    width: 100%;
    padding: 14px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    margin-bottom: 12px;
    transition: 0.25s;
}

/* Tombol Login */
.btn-login {
    background: #ff5fa2;
    color: white;
}
.btn-login:hover {
    background: #e04886;
}

/* Tombol Register */
.btn-register {
    background: #ffe4f2;
    color: #c2408c;
    border: 2px solid #ff5fa2;
}
.btn-register:hover {
    background: #ffd1eb;
}
</style>
</head>

<body>

<div class="container">
    <img src="assets/img/logo.png" class="logo">

    <h1>Aplikasi Pembuatan Surat</h1>
    <p>Sistem profesional untuk mengelola surat masuk, surat keluar, dan proses penyuratan dengan mudah dan cepat.</p>

    <a href="login.php">
        <button class="btn btn-login">Masuk ke Sistem</button>
    </a>

    <a href="register.php">
        <button class="btn btn-register">Daftar Pengguna Baru</button>
    </a>
</div>

</body>
</html>

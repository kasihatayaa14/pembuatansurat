<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login - Aplikasi Pembuatan Surat</title>

<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #ff99c8, #ff5ea6);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* CARD LOGIN */
.login-card {
    width: 380px;
    background: #ffffff;
    padding: 40px 35px;
    border-radius: 16px;
    box-shadow: 0px 10px 28px rgba(255, 0, 120, 0.15);
    text-align: center;
    animation: fadeIn 0.7s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.logo {
    width: 90px;
    margin-bottom: 10px;
    border-radius: 12px;
}

h2 {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 5px;
    color: #c21875;
}

p {
    font-size: 13px;
    color: #777;
    margin-bottom: 25px;
}

.input-group {
    text-align: left;
    margin-bottom: 18px;
}

label {
    font-size: 14px;
    color: #c21875;
    font-weight: 600;
}

input {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #f8b4d9;
    margin-top: 6px;
    font-size: 14px;
    background: #fff0f7;
}

input:focus {
    outline: none;
    border-color: #ff5ea6;
    box-shadow: 0 0 6px rgba(255, 94, 166, 0.7);
}

/* BUTTON PINK */
.btn-login {
    width: 100%;
    padding: 14px;
    border-radius: 10px;
    border: none;
    background: #ff5ea6;
    color: white;
    font-weight: 600;
    cursor: pointer;
    transition: 0.25s;
}

.btn-login:hover {
    background: #e65194;
}

/* LINK */
a {
    color: #ff5ea6;
    text-decoration: none;
    font-size: 13px;
}

a:hover {
    text-decoration: underline;
}
</style>
</head>

<body>

<div class="login-card">

    <img src="assets/img/logo.png" class="logo">

    <h2>Login Sistem</h2>
    <p>Aplikasi Pembuatan Surat</p>

    <form action="ceklogin.php" method="POST">

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>

        <button class="btn-login" type="submit">Masuk</button>
    </form>

    <br>
    <a href="register.php">Belum punya akun? Daftar</a>

</div>

</body>
</html>

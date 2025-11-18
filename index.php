<?php
session_start();

// CEK LOGIN
if (!isset($_SESSION['admin'])) {
    header("Location: landing.php");
    exit;
}

ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <?php include 'pages/header.php'; ?>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse">

<div class="wrapper">

    <!-- PRELOADER -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="dist/img/AdminLTELogo.png" height="60" width="60">
    </div>

    <!-- NAVBAR -->
    <nav class="main-header navbar navbar-expand navbar-dark bg-dark">
        <?php include 'pages/navbar.php'; ?>
    </nav>

    <!-- SIDEBAR -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <?php include 'pages/sidebar.php'; ?>
    </aside>

    <!-- CONTENT WRAPPER -->
    <div class="content-wrapper">
        <section class="content p-3">

            <?php

            // Router halaman aplikasi pembuatan surat
            $halaman = $_GET['halaman'] ?? 'landingafterlogin';

            $routes = [

                // ADMIN
                'admin'             => 'views/admin/admin.php',
                'tambahadmin'       => 'views/admin/tambahadmin.php',
                'editadmin'         => 'views/admin/editadmin.php',

                // PEGAWAI
                'pegawai'           => 'views/pegawai/pegawai.php',
                'tambahpegawai'     => 'views/pegawai/tambahpegawai.php',
                'editpegawai'       => 'views/pegawai/editpegawai.php',

                // KATEGORI SURAT
                'kategori'          => 'views/kategori/kategori.php',
                'tambahkategori'    => 'views/kategori/tambahkategori.php',
                'editkategori'      => 'views/kategori/editkategori.php',

                // SURAT
                'surat'             => 'views/surat/surat.php',
                'tambahsurat'       => 'views/surat/tambahsurat.php',
                'editsurat'         => 'views/surat/editsurat.php',

                // PROSES PENYURATAN
                'penyuratan'        => 'views/penyuratan/penyuratan.php',
                'tambahpenyuratan'  => 'views/penyuratan/tambahpenyuratan.php',
                'editpenyuratan'    => 'views/penyuratan/editpenyuratan.php',

                // PROFILE ADMIN
                'profile'           => 'views/profile.php',

                // DASHBOARD
                'dashboard'         => 'views/dashboard.php',
                'home'              => 'views/dashboard.php',

                // AFTER LOGIN
                'landingafterlogin' => 'views/landingafterlogin.php'
            ];

            // Sistem Routing
            if (array_key_exists($halaman, $routes) && file_exists($routes[$halaman])) {
                include $routes[$halaman];
            } else {
                include 'views/dashboard.php';
            }

            ?>

        </section>
    </div>

    <!-- FOOTER -->
    <footer class="main-footer text-center">
        <?php include 'pages/footer.php'; ?>
    </footer>

</div>

<!-- SCRIPTS -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>

</body>
</html>

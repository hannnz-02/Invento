
<?php
$nama = session()->get('nama');
$email = session()->get('email');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Invento</title>

    <link href="<?= base_url('sb-admin2/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('sb-admin2/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #f5f6fc;
            font-family: Arial, sans-serif;
            color: #444;
        }

        .sidebar {
            position: fixed;
            width: 249px;
            height: 100vh;
            background: linear-gradient(180deg, #667eea, #764ba2);
            padding: 25px 15px;
            color: white;
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 23px;
            font-weight: bold;
            padding: 10px 15px 35px;
        }

        .brand i {
            font-size: 25px;
        }

        .menu-label {
            font-size: 11px;
            letter-spacing: 1px;
            opacity: .7;
            padding: 0 13px;
            margin-bottom: 12px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 13px 16px;
            margin-bottom: 8px;
            border-radius: 9px;
            color: rgba(255,255,255,.9);
            text-decoration: none;
            transition: .2s;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255,255,255,.2);
            color: white;
        }

        .sidebar a i {
            width: 25px;
            font-size: 17px;
        }

        .sidebar-bottom {
            position: absolute;
            bottom: 25px;
            left: 15px;
            right: 15px;
        }

        .main {
            margin-left: 249px;
            min-height: 100vh;
        }

        .topbar {
            height: 70px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,.04);
        }

        .topbar strong {
            font-size: 18px;
            color: #333;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #667eea;
            font-weight: 600;
        }

        .content {
            padding: 30px;
        }

        .page-title {
            font-size: 26px;
            font-weight: bold;
            color: #34364a;
            margin: 0 0 8px;
        }

        .page-subtitle {
            color: #858796;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .welcome-card {
            background: linear-gradient(135deg, #667eea, #764ba2);
            padding: 30px;
            border-radius: 15px;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 5px 18px rgba(102,126,234,.2);
        }

        .welcome-card h2 {
            font-size: 24px;
            font-weight: bold;
            margin-top: 0;
        }

        .welcome-card p {
            margin-bottom: 0;
            opacity: .9;
            line-height: 1.6;
        }

        .welcome-icon {
            font-size: 60px;
            opacity: .3;
        }

        .stat-card {
            background: white;
            border-radius: 13px;
            padding: 23px;
            margin-bottom: 22px;
            box-shadow: 0 3px 12px rgba(45,55,100,.06);
            border-left: 5px solid #667eea;
            min-height: 135px;
        }

        .stat-card h4 {
            color: #858796;
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .stat-card h2 {
            color: #34364a;
            font-size: 28px;
            font-weight: bold;
            margin: 0;
        }

        .stat-icon {
            font-size: 38px;
            color: #d1d3e2;
        }

        .profile-card {
            background: white;
            border-radius: 13px;
            padding: 25px;
            box-shadow: 0 3px 12px rgba(45,55,100,.06);
            margin-top: 5px;
        }

        .profile-icon {
            width: 65px;
            height: 65px;
            line-height: 65px;
            text-align: center;
            font-size: 30px;
            background: #eef0ff;
            color: #667eea;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .profile-card h3 {
            color: #34364a;
            font-weight: bold;
        }

        .profile-card p {
            color: #858796;
        }

        .btn-logout {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 18px;
        }

        .btn-logout:hover {
            color: white;
            opacity: .9;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 75px;
                padding: 20px 8px;
            }

            .brand {
                font-size: 0;
                justify-content: center;
                padding: 10px 0 30px;
            }

            .brand i { font-size: 25px; }

            .menu-label,
            .menu-text { display: none; }

            .sidebar a {
                justify-content: center;
                padding: 15px 5px;
                font-size: 0;
            }

            .sidebar a i {
                font-size: 18px;
                width: auto;
            }

            .sidebar-bottom {
                left: 8px;
                right: 8px;
            }

            .main { margin-left: 75px; }
            .content { padding: 20px 12px; }
            .topbar { padding: 0 15px; }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">
        <i class="fa fa-cube"></i>
        <span>INVENTO</span>
    </div>

    <div class="menu-label">MENU UTAMA</div>

    <a href="<?= site_url('dashboard') ?>" class="active">
        <i class="fa fa-dashboard"></i>
        <span class="menu-text">Dashboard</span>
    </a>

    <a href="<?= site_url('kategori') ?>">
        <i class="fa fa-tags"></i>
        <span class="menu-text">Kategori Barang</span>
    </a>

    <a href="<?= site_url('barang') ?>">
        <i class="fa fa-cubes"></i>
        <span class="menu-text">Data Barang</span>
    </a>

    <a href="<?= site_url('profil') ?>">
        <i class="fa fa-user"></i>
        <span class="menu-text">Profil</span>
    </a>

    <div class="sidebar-bottom">
        <a href="<?= site_url('logout') ?>">
            <i class="fa fa-sign-out"></i>
            <span class="menu-text">Logout</span>
        </a>
    </div>
</aside>

<main class="main">

    <header class="topbar">
        <strong>Manajemen Inventaris</strong>

        <div class="user-info">
            <i class="fa fa-user-circle"></i>
            <?= esc($nama) ?>
        </div>
    </header>

    <div class="content">

        <h1 class="page-title">Dashboard</h1>

        <p class="page-subtitle">
            Ringkasan informasi sistem manajemen inventaris barang.
        </p>

        <div class="welcome-card">
            <div class="row">
                <div class="col-xs-9">
                    <h2>Selamat Datang, <?= esc($nama) ?>!</h2>
                    <p>
                        Selamat datang di Invento.
                        Kelola data inventaris barang dengan mudah melalui aplikasi ini.
                    </p>
                </div>

                <div class="col-xs-3 text-right">
                    <i class="fa fa-cubes welcome-icon"></i>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="stat-card" style="border-left-color:#667eea;">
                    <div class="row">
                        <div class="col-xs-8">
                            <h4>Total Barang</h4>
                            <h2><?= esc($totalBarang) ?></h2>
                        </div>
                        <div class="col-xs-4 text-right">
                            <i class="fa fa-cubes stat-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="stat-card" style="border-left-color:#1cc88a;">
                    <div class="row">
                        <div class="col-xs-8">
                            <h4>Total Kategori</h4>
                            <h2><?= esc($totalKategori) ?></h2>
                        </div>
                        <div class="col-xs-4 text-right">
                            <i class="fa fa-tags stat-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="profile-card">
            <div class="row">

                <div class="col-sm-2 text-center">
                    <div class="profile-icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>

                <div class="col-sm-7">
                    <h3><?= esc($nama) ?></h3>

                    <p>
                        <i class="fa fa-envelope"></i>
                        <?= esc($email) ?>
                    </p>

                    <p>
                        <i class="fa fa-check-circle"></i>
                        Status akun: Aktif
                    </p>
                </div>

                <div class="col-sm-3 text-right">
                    <a href="<?= site_url('logout') ?>" class="btn btn-logout">
                        <i class="fa fa-sign-out"></i>
                        Logout
                    </a>
                </div>

            </div>
        </div>

    </div>
</main>

<script src="<?= base_url('sb-admin2/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('sb-admin2/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>

</body>
</html>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Invento</title>

    <link href="<?= base_url('sb-admin2/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            background: #f5f6fa;
            color: #333;
        }

        .sidebar {
            width: 249px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: linear-gradient(180deg, #667eea, #764ba2);
            color: white;
            padding: 25px 15px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 12px 35px;
        }

        .brand-logo {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .brand h2 {
            font-size: 21px;
            letter-spacing: 1px;
        }

        .menu-label {
            font-size: 11px;
            opacity: .7;
            padding: 0 13px;
            margin-bottom: 12px;
            letter-spacing: 1px;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin-bottom: 8px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            color: white;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            transition: .2s;
        }

        .menu a:hover {
            background: rgba(255,255,255,.15);
        }

        .menu a.active {
            background: rgba(255,255,255,.22);
            font-weight: bold;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
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

        .topbar h3 {
            font-size: 18px;
            color: #333;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            background: #667eea;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .content {
            padding: 30px;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-header h2 {
            font-size: 24px;
            margin-bottom: 7px;
        }

        .page-header p {
            color: #888;
            font-size: 14px;
        }

        .profile-layout {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 22px;
            align-items: start;
        }

        .card {
            background: white;
            border-radius: 13px;
            padding: 25px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
        }

        .profile-card {
            text-align: center;
        }

        .profile-avatar {
            width: 95px;
            height: 95px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            font-weight: bold;
            margin: 5px auto 18px;
        }

        .profile-card h3 {
            font-size: 19px;
            margin-bottom: 6px;
        }

        .profile-card .email {
            color: #888;
            font-size: 13px;
            margin-bottom: 15px;
            word-break: break-word;
        }

        .role-badge {
            display: inline-block;
            padding: 6px 15px;
            border-radius: 20px;
            background: #eef0ff;
            color: #667eea;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .profile-info {
            text-align: left;
            border-top: 1px solid #eee;
            margin-top: 22px;
            padding-top: 18px;
        }

        .profile-info p {
            font-size: 13px;
            color: #777;
            margin-bottom: 10px;
        }

        .form-card h3 {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 15px;
            color: #667eea;
            margin: 22px 0 15px;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 13px;
            outline: none;
            transition: .2s;
        }

        .form-group input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,.1);
        }

        .form-note {
            font-size: 12px;
            color: #888;
            margin-bottom: 18px;
        }

        .btn-save {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        .btn-save:hover {
            opacity: .9;
            transform: translateY(-1px);
        }

        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .alert-success {
            background: #e8f8ee;
            color: #23864c;
        }

        .alert-error {
            background: #fdecec;
            color: #c0392b;
        }

        @media (max-width: 900px) {
            .profile-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
            }

            .content {
                padding: 18px;
            }

            .topbar {
                padding: 0 18px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-logo">
                <i class="fa fa-cube"></i>
            </div>
            <h2>Invento</h2>
        </div>

        <div class="menu-label">MENU UTAMA</div>

        <ul class="menu">
            <li>
                <a href="<?= site_url('dashboard') ?>">
                    <span class="menu-icon"><i class="fa fa-dashboard"></i></span>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="<?= site_url('kategori') ?>">
                    <span class="menu-icon"><i class="fa fa-tags"></i></span>
                    Kategori Barang
                </a>
            </li>

            <li>
                <a href="<?= site_url('barang') ?>">
                    <span class="menu-icon"><i class="fa fa-cubes"></i></span>
                    Data Barang
                </a>
            </li>

            <li>
                <a href="<?= site_url('profil') ?>" class="active">
                    <span class="menu-icon"><i class="fa fa-user"></i></span>
                    Profil
                </a>
            </li>
        </ul>

        <div class="sidebar-bottom">
            <ul class="menu">
                <li>
                    <a href="<?= site_url('logout') ?>">
                        <span class="menu-icon"><i class="fa fa-sign-out"></i></span>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">

        <header class="topbar">
            <h3>Manajemen Inventaris</h3>

            <div class="topbar-user">
                <div class="avatar">
                    <?= strtoupper(substr($user['nama'], 0, 1)) ?>
                </div>
                <span><?= esc($user['nama']) ?></span>
            </div>
        </header>

        <section class="content">

            <div class="page-header">
                <h2>Profil Saya</h2>
                <p>Kelola informasi akun dan keamanan password Anda.</p>
            </div>

            <div class="profile-layout">

                <!-- PROFILE INFORMATION -->
                <div class="card profile-card">

                    <div class="profile-avatar">
                        <?= strtoupper(substr($user['nama'], 0, 1)) ?>
                    </div>

                    <h3><?= esc($user['nama']) ?></h3>
                    <p class="email"><?= esc($user['email']) ?></p>

                    <span class="role-badge">
                        <?= esc($user['role']) ?>
                    </span>

                    <div class="profile-info">
                        <p><i class="fa fa-user"></i> Informasi Akun</p>
                        <p><strong>Nama:</strong> <?= esc($user['nama']) ?></p>
                        <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
                        <p><strong>Role:</strong> <?= esc($user['role']) ?></p>
                    </div>

                </div>

                <!-- EDIT PROFILE FORM -->
                <div class="card form-card">

                    <h3><i class="fa fa-pencil"></i> Edit Profil</h3>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= esc(session()->getFlashdata('success')) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-error">
                            <?= esc(session()->getFlashdata('error')) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-error">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <div><?= esc($error) ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('profil/update') ?>" method="post">
                        <?= csrf_field() ?>

                        <h4 class="section-title">Informasi Akun</h4>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input
                                type="text"
                                name="nama"
                                value="<?= esc(old('nama', $user['nama'])) ?>"
                                placeholder="Masukkan nama lengkap"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input
                                type="email"
                                name="email"
                                value="<?= esc(old('email', $user['email'])) ?>"
                                placeholder="Masukkan email"
                                required>
                        </div>

                        <h4 class="section-title">Ganti Password</h4>

                        <p class="form-note">
                            Kosongkan semua bagian password jika tidak ingin menggantinya.
                        </p>

                        <div class="form-group">
                            <label>Password Lama</label>
                            <input
                                type="password"
                                name="password_lama"
                                placeholder="Masukkan password lama">
                        </div>

                        <div class="form-group">
                            <label>Password Baru</label>
                            <input
                                type="password"
                                name="password_baru"
                                placeholder="Masukkan password baru">
                        </div>

                        <div class="form-group">
                            <label>Konfirmasi Password Baru</label>
                            <input
                                type="password"
                                name="konfirmasi_password"
                                placeholder="Masukkan ulang password baru">
                        </div>

                        <button type="submit" class="btn-save">
                            <i class="fa fa-save"></i> Simpan Perubahan
                        </button>

                    </form>

                </div>

            </div>

        </section>

    </main>

</body>
</html>

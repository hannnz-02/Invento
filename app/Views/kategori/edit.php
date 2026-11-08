
<?php
$nama = session()->get('nama');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Kategori - Invento</title>

    <link href="<?= base_url('sb-admin2/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('sb-admin2/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f6fc;
            font-family: Arial, sans-serif;
            color: #444;
        }

        .sidebar {
            position: fixed;
            width: 245px;
            height: 100vh;
            background: linear-gradient(180deg, #667eea, #764ba2);
            padding: 25px 15px;
            color: white;
            z-index: 10;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
            padding: 10px 15px 35px;
        }

        .sidebar a {
            display: block;
            padding: 14px 16px;
            margin-bottom: 8px;
            border-radius: 10px;
            color: rgba(255,255,255,.85);
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255,255,255,.2);
            color: white;
        }

        .sidebar a i {
            width: 25px;
        }

        .main {
            margin-left: 245px;
            min-height: 100vh;
        }

        .topbar {
            height: 75px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            box-shadow: 0 2px 10px rgba(0,0,0,.04);
        }

        .user-info {
            color: #667eea;
            font-weight: 600;
        }

        .content {
            padding: 35px;
        }

        .page-title {
            font-size: 27px;
            font-weight: bold;
            color: #34364a;
            margin: 0 0 8px;
        }

        .page-subtitle {
            color: #858796;
            margin-bottom: 28px;
        }

        .form-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(45,55,100,.06);
            max-width: 850px;
        }

        .form-heading {
            border-bottom: 1px solid #eee;
            padding-bottom: 18px;
            margin-bottom: 25px;
        }

        .form-heading h3 {
            font-size: 20px;
            font-weight: bold;
            color: #34364a;
            margin: 0 0 8px;
        }

        .form-heading p {
            color: #999;
            margin: 0;
        }

        .form-group {
            margin-bottom: 23px;
        }

        .form-group label {
            color: #555;
            font-weight: 600;
            margin-bottom: 9px;
        }

        .form-control {
            height: 45px;
            border: 1px solid #e1e3ed;
            border-radius: 8px;
            box-shadow: none;
            padding: 10px 13px;
        }

        textarea.form-control {
            height: auto;
            resize: vertical;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,.1);
        }

        .btn-update {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 11px 20px;
            font-weight: 600;
        }

        .btn-update:hover {
            color: white;
            opacity: .9;
        }

        .btn-back {
            background: #f1f2f7;
            color: #666;
            border: none;
            border-radius: 8px;
            padding: 11px 20px;
            font-weight: 600;
        }

        .btn-back:hover {
            background: #e5e6ee;
            color: #444;
        }

        .alert {
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 75px;
                padding: 20px 8px;
            }

            .brand {
                font-size: 0;
                padding: 10px 12px 30px;
            }

            .brand i {
                font-size: 25px;
            }

            .sidebar a {
                text-align: center;
                font-size: 0;
                padding: 15px 5px;
            }

            .sidebar a i {
                font-size: 18px;
                width: auto;
            }

            .main {
                margin-left: 75px;
            }

            .content {
                padding: 20px 12px;
            }

            .topbar {
                padding: 0 15px;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<aside class="sidebar">

    <div class="brand">
        <i class="fa fa-cube"></i> Invento
    </div>

    <a href="<?= site_url('dashboard') ?>">
        <i class="fa fa-dashboard"></i> Dashboard
    </a>

    <a href="<?= site_url('kategori') ?>" class="active">
        <i class="fa fa-tags"></i> Kategori Barang
    </a>

    <a href="#">
        <i class="fa fa-cubes"></i> Data Barang
    </a>

    <a href="#">
        <i class="fa fa-users"></i> Pengguna
    </a>

    <a href="#">
        <i class="fa fa-user"></i> Profil
    </a>

    <a href="<?= site_url('logout') ?>">
        <i class="fa fa-sign-out"></i> Logout
    </a>

</aside>

<!-- MAIN -->
<main class="main">

    <div class="topbar">
        <strong>Manajemen Inventaris</strong>

        <div class="user-info">
            <i class="fa fa-user-circle"></i>
            <?= esc($nama) ?>
        </div>
    </div>

    <div class="content">

        <h1 class="page-title">Edit Kategori</h1>

        <p class="page-subtitle">
            Perbarui informasi kategori barang inventaris.
        </p>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="form-card">

            <div class="form-heading">
                <h3>
                    <i class="fa fa-pencil" style="color:#667eea;"></i>
                    Form Edit Kategori
                </h3>

                <p>Ubah informasi kategori sesuai kebutuhan.</p>
            </div>

            <form action="<?= site_url('kategori/update/' . $kategori['id']) ?>"
                  method="post">

                <?= csrf_field() ?>

                <div class="form-group">
                    <label>Nama Kategori</label>

                    <input
                        type="text"
                        name="nama_kategori"
                        class="form-control"
                        value="<?= esc(old('nama_kategori', $kategori['nama_kategori'])) ?>"
                        placeholder="Masukkan nama kategori"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Deskripsi Kategori</label>

                    <textarea
                        name="deskripsi"
                        class="form-control"
                        rows="5"
                        placeholder="Masukkan deskripsi kategori..."
                    ><?= esc(old('deskripsi', $kategori['deskripsi'] ?? '')) ?></textarea>
                </div>

                <hr>

                <button type="submit" class="btn btn-update">
                    <i class="fa fa-save"></i> Simpan Perubahan
                </button>

                <a href="<?= site_url('kategori') ?>" class="btn btn-back">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>

            </form>

        </div>

    </div>

</main>

<script src="<?= base_url('sb-admin2/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('sb-admin2/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>

</body>
</html>

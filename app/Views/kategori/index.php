
<?php
$nama = session()->get('nama');
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kategori Barang - Invento</title>

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

        /* SIDEBAR */
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
            transition: .2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255,255,255,.2);
            color: white;
        }

        .sidebar a i {
            width: 25px;
        }

        .sidebar-bottom {
            position: absolute;
            bottom: 20px;
            left: 15px;
            right: 15px;
        }

        /* MAIN CONTENT */
        .main {
            margin-left: 245px;
            min-height: 100vh;
        }

        /* TOPBAR */
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

        /* CONTENT */
        .content {
            padding: 35px;
        }

        .page-title {
            font-size: 27px;
            font-weight: 700;
            color: #34364a;
            margin: 0 0 8px;
        }

        .page-subtitle {
            color: #858796;
            margin-bottom: 28px;
        }

        /* CARD */
        .content-card {
            background: white;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 5px 20px rgba(45,55,100,.06);
        }

        .card-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .card-heading h3 {
            margin: 0 0 7px;
            color: #34364a;
            font-weight: 700;
            font-size: 20px;
        }

        .card-heading p {
            color: #999;
            margin: 0;
        }

        /* BUTTON */
        .btn-add {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 11px 17px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-add:hover {
            color: white;
            opacity: .9;
        }

        .btn-edit {
            background: #fff4df;
            color: #d69b20;
            border: none;
            border-radius: 7px;
            padding: 8px 11px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-delete {
            background: #ffe9ec;
            color: #e05260;
            border: none;
            border-radius: 7px;
            padding: 8px 11px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #e05260;
            color: white;
        }

        /* TABLE */
        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f5f6fc;
            color: #555;
            border-bottom: 1px solid #e8e9f1;
            padding: 15px;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: #fafaff;
        }

        .category-icon {
            display: inline-flex;
            width: 35px;
            height: 35px;
            align-items: center;
            justify-content: center;
            background: #eef0ff;
            color: #667eea;
            border-radius: 9px;
            margin-right: 9px;
        }

        .alert {
            border-radius: 10px;
        }

        .empty-state {
            text-align: center;
            color: #999;
            padding: 35px !important;
        }

        /* RESPONSIVE */
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

        <a href="<?= site_url('barang') ?>">
            <i class="fa fa-cubes"></i> Data Barang
        </a>

        <a href="<?= site_url('profil') ?>">
            <i class="fa fa-user"></i> Profil
        </a>

        <div class="sidebar-bottom">
            <a href="<?= site_url('logout') ?>">
                <i class="fa fa-sign-out"></i> Logout
            </a>
        </div>

    </aside>

    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <strong>Manajemen Inventaris</strong>

            <div class="user-info">
                <i class="fa fa-user-circle"></i>
                <?= esc($nama) ?>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="content">

            <h1 class="page-title">Kategori Barang</h1>

            <p class="page-subtitle">
                Kelola dan atur kategori barang inventaris kamu.
            </p>

            <!-- NOTIFIKASI -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= esc(session()->getFlashdata('success')) ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>

            <!-- CARD KATEGORI -->
            <div class="content-card">

                <div class="card-heading">

                    <div>
                        <h3>Daftar Kategori</h3>
                        <p>Daftar seluruh kategori barang yang tersedia.</p>
                    </div>

                    <a href="<?= site_url('kategori/create') ?>"
                       class="btn-add">

                        <i class="fa fa-plus"></i>
                        Tambah Kategori

                    </a>

                </div>

                <!-- TABEL -->
                <div class="table-responsive">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th width="65">No.</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th width="155">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php if (!empty($kategori)): ?>

                                <?php $no = 1; ?>

                                <?php foreach ($kategori as $item): ?>

                                    <tr>

                                        <td><?= $no++ ?></td>

                                        <td>
                                            <span class="category-icon">
                                                <i class="fa fa-tag"></i>
                                            </span>

                                            <strong>
                                                <?= esc($item['nama_kategori']) ?>
                                            </strong>
                                        </td>

                                        <td>
                                            <?= esc($item['deskripsi'] ?? '-') ?>
                                        </td>

                                        <td>

                                            <!-- TOMBOL EDIT -->
                                            <a href="<?= site_url('kategori/edit/' . $item['id']) ?>"
                                               class="btn-edit"
                                               title="Edit">

                                                <i class="fa fa-pencil"></i>

                                            </a>

                                            <!-- TOMBOL HAPUS: MENGGUNAKAN POST -->
                                            <form action="<?= site_url('kategori/delete/' . $item['id']) ?>"
                                                  method="post"
                                                  style="display:inline;"
                                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                                <?= csrf_field() ?>

                                                <button type="submit"
                                                        class="btn-delete"
                                                        title="Hapus">

                                                    <i class="fa fa-trash"></i>

                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>
                                    <td colspan="4" class="empty-state">

                                        <i class="fa fa-folder-open fa-3x"></i>

                                        <p style="margin-top:12px;">
                                            Belum ada kategori barang.
                                        </p>

                                        <p>
                                            Silakan tambahkan kategori baru.
                                        </p>

                                    </td>
                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </main>

    <script src="<?= base_url('sb-admin2/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('sb-admin2/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>

</body>
</html>

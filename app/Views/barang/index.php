
<?php
$nama = session()->get('nama');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Barang - Invento</title>

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

        /* MAIN */
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

        /* CARD */
        .card {
            background: white;
            border-radius: 13px;
            padding: 25px;
            box-shadow: 0 3px 12px rgba(45,55,100,.06);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 22px;
        }

        .card-header h3 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            color: #34364a;
        }

        /* BUTTON */
        .btn-add,
        .btn-search,
        .btn-reset {
            display: inline-block;
            border: none;
            border-radius: 8px;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 13px;
            cursor: pointer;
        }

        .btn-add,
        .btn-search {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-add:hover,
        .btn-search:hover {
            color: white;
            opacity: .9;
        }

        /* SEARCH */
        .filter-form {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .filter-form input,
        .filter-form select {
            min-height: 39px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 13px;
            outline: none;
            background: white;
        }

        .filter-form input {
            flex: 1;
            min-width: 190px;
        }

        .filter-form select {
            min-width: 180px;
        }

        .filter-form input:focus,
        .filter-form select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,.1);
        }

        .btn-reset {
            background: #eaecf4;
            color: #555;
        }

        .btn-reset:hover {
            background: #dfe1eb;
            color: #333;
        }

        /* TABLE */
        .table {
            margin-bottom: 0;
        }

        .table thead {
            background: #f5f6fc;
            color: #555;
        }

        .table th {
            border-bottom: 1px solid #e5e7f0 !important;
            font-size: 12px;
            padding: 14px 10px !important;
            white-space: nowrap;
        }

        .table td {
            padding: 12px 10px !important;
            vertical-align: middle !important;
            font-size: 13px;
        }

        .product-image,
        .no-image {
            width: 55px;
            height: 55px;
            border-radius: 8px;
            object-fit: cover;
        }

        .no-image {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0f1f8;
            color: #aaa;
            font-size: 22px;
        }

        /* ACTION */
        .action-buttons {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .action-buttons form {
            margin: 0;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-edit {
            background: #36b9cc;
        }

        .btn-delete {
            background: #e74a3b;
        }

        .btn-action:hover {
            color: white;
            opacity: .85;
        }

        .empty {
            text-align: center;
            color: #999;
            padding: 35px !important;
        }

        .empty p {
            margin: 10px 0 0;
        }

        .alert {
            border-radius: 8px;
        }

        /* RESPONSIVE */
        @media(max-width: 900px) {
            .sidebar {
                width: 75px;
                padding: 20px 8px;
            }

            .brand {
                font-size: 0;
                justify-content: center;
                padding: 10px 0 30px;
            }

            .brand i {
                font-size: 25px;
            }

            .menu-label,
            .menu-text {
                display: none;
            }

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

            .main {
                margin-left: 75px;
            }

            .content {
                padding: 20px 12px;
            }

            .topbar {
                padding: 0 15px;
            }

            .card {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<aside class="sidebar">

    <div class="brand">
        <i class="fa fa-cube"></i>
        <span>INVENTO</span>
    </div>

    <div class="menu-label">MENU UTAMA</div>

    <a href="<?= site_url('dashboard') ?>">
        <i class="fa fa-dashboard"></i>
        <span class="menu-text">Dashboard</span>
    </a>

    <a href="<?= site_url('kategori') ?>">
        <i class="fa fa-tags"></i>
        <span class="menu-text">Kategori Barang</span>
    </a>

    <a href="<?= site_url('barang') ?>" class="active">
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

<!-- MAIN -->
<main class="main">

    <!-- TOPBAR -->
    <header class="topbar">
        <strong>Manajemen Inventaris</strong>

        <div class="user-info">
            <i class="fa fa-user-circle"></i>
            <?= esc($nama) ?>
        </div>
    </header>

    <!-- CONTENT -->
    <section class="content">

        <h1 class="page-title">Data Barang</h1>

        <p class="page-subtitle">
            Kelola informasi barang dalam sistem inventaris.
        </p>

        <!-- PESAN SUKSES -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i>
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>

        <!-- PESAN ERROR -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <i class="fa fa-exclamation-circle"></i>
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <div class="card">

            <!-- HEADER CARD -->
            <div class="card-header">

                <h3>
                    <i class="fa fa-list"></i>
                    Daftar Barang
                </h3>

                <a href="<?= site_url('barang/create') ?>" class="btn-add">
                    <i class="fa fa-plus"></i>
                    Tambah Barang
                </a>

            </div>

            <!-- PENCARIAN DAN FILTER -->
            <form action="<?= site_url('barang') ?>" method="get" class="filter-form">

                <input
                    type="text"
                    name="keyword"
                    placeholder="Cari kode atau nama barang..."
                    value="<?= esc($keyword ?? '') ?>"
                >

                <select name="kategori_id">

                    <option value="">Semua Kategori</option>

                    <?php foreach ($kategori as $kat): ?>
                        <option
                            value="<?= esc($kat['id']) ?>"
                            <?= (string)($kategoriTerpilih ?? '') === (string)$kat['id'] ? 'selected' : '' ?>
                        >
                            <?= esc($kat['nama_kategori']) ?>
                        </option>
                    <?php endforeach; ?>

                </select>

                <button type="submit" class="btn-search">
                    <i class="fa fa-search"></i>
                    Cari
                </button>

                <a href="<?= site_url('barang') ?>" class="btn-reset">
                    <i class="fa fa-refresh"></i>
                    Reset
                </a>

            </form>

            <!-- TABEL BARANG -->
            <div class="table-responsive">

                <table class="table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($barang)): ?>

                            <?php $no = 1; ?>

                            <?php foreach ($barang as $item): ?>

                                <tr>

                                    <td><?= $no++ ?></td>

                                    <!-- GAMBAR -->
                                    <td>
                                        <?php if (!empty($item['gambar'])): ?>

                                            <img
                                                src="<?= base_url('uploads/barang/' . $item['gambar']) ?>"
                                                class="product-image"
                                                alt="Gambar barang"
                                            >

                                        <?php else: ?>

                                            <div class="no-image">
                                                <i class="fa fa-image"></i>
                                            </div>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?= esc($item['kode_barang']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['nama_barang']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['nama_kategori'] ?? '-') ?>
                                    </td>

                                    <td>
                                        <?= esc($item['stok']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['satuan']) ?>
                                    </td>

                                    <td>
                                        Rp <?= number_format((float)$item['harga'], 0, ',', '.') ?>
                                    </td>

                                    <!-- TOMBOL AKSI -->
                                    <td>

                                        <div class="action-buttons">

                                            <!-- EDIT -->
                                            <a
                                                href="<?= site_url('barang/edit/' . $item['id']) ?>"
                                                class="btn-action btn-edit"
                                                title="Edit"
                                            >
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <!-- HAPUS -->
                                            <form
                                                action="<?= site_url('barang/delete/' . $item['id']) ?>"
                                                method="post"
                                                onsubmit="return confirm('Yakin ingin menghapus barang ini?')"
                                            >

                                                <?= csrf_field() ?>

                                                <button
                                                    type="submit"
                                                    class="btn-action btn-delete"
                                                    title="Hapus"
                                                >
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="9" class="empty">
                                    <i class="fa fa-inbox fa-2x"></i>
                                    <p>Belum ada data barang.</p>
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</main>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - Invento</title>

    <link rel="stylesheet" href="<?= base_url('sb-admin2/vendor/fontawesome-free/css/all.min.css') ?>">

    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #333;
        }
        .sidebar {
            width: 235px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 25px 15px;
            color: white;
            background: linear-gradient(180deg, #667eea, #764ba2);
        }
        .brand {
            font-size: 25px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 8px;
        }
        .sidebar a:hover, .sidebar a.active {
            background: rgba(255,255,255,.2);
        }
        .sidebar i { width: 25px; }
        .main { margin-left: 235px; padding: 30px; }
        .topbar { margin-bottom: 25px; }
        .topbar h2 { margin: 0; }
        .card {
            background: white;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 3px 15px rgba(0,0,0,.05);
            max-width: 900px;
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .form-group { margin-bottom: 18px; }
        .form-group.full { grid-column: 1 / -1; }
        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }
        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 7px;
            font-size: 14px;
            background: white;
        }
        textarea { resize: vertical; min-height: 100px; }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
        }
        .preview {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin: 10px 0;
            display: block;
        }
        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .btn {
            padding: 11px 18px;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-primary { background: #667eea; color: white; }
        .btn-secondary { background: #e9ecef; color: #333; }
        .alert {
            padding: 13px 16px;
            border-radius: 7px;
            margin-bottom: 18px;
            background: #f8d7da;
            color: #721c24;
        }
        @media(max-width: 768px) {
            .sidebar { width: 70px; padding: 20px 8px; }
            .brand { font-size: 0; }
            .brand:first-letter { font-size: 22px; }
            .sidebar a { text-align: center; font-size: 0; }
            .sidebar i { font-size: 18px; width: auto; }
            .main { margin-left: 70px; padding: 18px; }
            .form-grid { grid-template-columns: 1fr; }
            .form-group.full { grid-column: auto; }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="brand">Invento</div>

    <a href="<?= site_url('dashboard') ?>">
        <i class="fas fa-home"></i> Dashboard
    </a>
    <a href="<?= site_url('kategori') ?>">
        <i class="fas fa-tags"></i> Kategori
    </a>
    <a href="<?= site_url('barang') ?>" class="active">
        <i class="fas fa-box"></i> Barang
    </a>
</div>

<div class="main">
    <div class="topbar">
        <h2>Edit Barang</h2>
        <p>Perbarui informasi barang.</p>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <div class="card">
        <form
            action="<?= site_url('barang/update/' . $barang['id']) ?>"
            method="post"
            enctype="multipart/form-data"
        >
            <?= csrf_field() ?>

            <div class="form-grid">
                <div class="form-group">
                    <label>Kode Barang</label>
                    <input
                        type="text"
                        name="kode_barang"
                        value="<?= esc(old('kode_barang', $barang['kode_barang'])) ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input
                        type="text"
                        name="nama_barang"
                        value="<?= esc(old('nama_barang', $barang['nama_barang'])) ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori_id" required>
                        <option value="">-- Pilih Kategori --</option>

                        <?php foreach ($kategori as $kat): ?>
                            <option
                                value="<?= esc($kat['id']) ?>"
                                <?= old('kategori_id', $barang['kategori_id']) == $kat['id'] ? 'selected' : '' ?>
                            >
                                <?= esc($kat['nama_kategori']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input
                        type="number"
                        name="stok"
                        min="0"
                        value="<?= esc(old('stok', $barang['stok'])) ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Satuan</label>
                    <input
                        type="text"
                        name="satuan"
                        value="<?= esc(old('satuan', $barang['satuan'])) ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input
                        type="text"
                        name="harga"
                        inputmode="numeric"
                        value="<?= esc(old('harga', number_format((float)$barang['harga'], 0, ',', '.'))) ?>"
                        placeholder="Contoh: 3.000"
                        required
                    >
                </div>

                <div class="form-group full">
                    <label>Gambar Saat Ini</label>

                    <?php if (!empty($barang['gambar'])): ?>
                        <img
                            src="<?= base_url('uploads/barang/' . $barang['gambar']) ?>"
                            class="preview"
                            alt="Gambar barang"
                        >
                    <?php else: ?>
                        <p>Belum ada gambar.</p>
                    <?php endif; ?>

                    <label>Ganti Gambar (Opsional)</label>
                    <input type="file" name="gambar" accept="image/*">
                </div>

                <div class="form-group full">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi"><?= esc(old('deskripsi', $barang['deskripsi'] ?? '')) ?></textarea>
                </div>
            </div>

            <div class="buttons">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>

                <a href="<?= site_url('barang') ?>" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
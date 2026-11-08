<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'kode_barang',
        'nama_barang',
        'kategori_id',
        'stok',
        'satuan',
        'harga',
        'gambar',
        'deskripsi'
    ];

    protected $useTimestamps = true;
}
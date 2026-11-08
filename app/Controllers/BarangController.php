<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;

class BarangController extends BaseController
{
    protected $barangModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->kategoriModel = new KategoriModel();
    }

    private function cekLogin()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return null;
    }

    public function index()
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        $keyword = $this->request->getGet('keyword');
        $kategoriId = $this->request->getGet('kategori_id');

        $builder = $this->barangModel
            ->select('barang.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = barang.kategori_id', 'left');

        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('barang.kode_barang', $keyword)
                ->orLike('barang.nama_barang', $keyword)
                ->groupEnd();
        }

        if (!empty($kategoriId)) {
            $builder->where('barang.kategori_id', $kategoriId);
        }

        $data = [
            'barang' => $builder->orderBy('barang.id', 'DESC')->findAll(),
            'kategori' => $this->kategoriModel->findAll(),
            'keyword' => $keyword,
            'kategoriTerpilih' => $kategoriId
        ];

        return view('barang/index', $data);
    }

    public function create()
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        return view('barang/create', [
            'kategori' => $this->kategoriModel->findAll()
        ]);
    }

    public function store()
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        $rules = [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'stok' => 'required|numeric',
            'satuan' => 'required',
            'harga' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Periksa kembali data yang dimasukkan.');
        }

        $gambar = $this->request->getFile('gambar');
        $namaGambar = null;

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $folder = FCPATH . 'uploads/barang/';

            if (!is_dir($folder)) {
                mkdir($folder, 0777, true);
            }

            $namaGambar = $gambar->getRandomName();
            $gambar->move($folder, $namaGambar);
        }
        $harga = preg_replace(
            '/[^0-9]/',
            '',
            (string) $this->request->getPost('harga')
        );
        $this->barangModel->insert([
            'kode_barang' => $this->request->getPost('kode_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'stok' => $this->request->getPost('stok'),
            'satuan' => $this->request->getPost('satuan'),
            'harga' => $harga,
            'gambar' => $namaGambar,
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/barang')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        $barang = $this->barangModel->find($id);

        if (!$barang) {
            return redirect()->to('/barang')
                ->with('error', 'Data barang tidak ditemukan.');
        }

        return view('barang/edit', [
            'barang' => $barang,
            'kategori' => $this->kategoriModel->findAll()
        ]);
    }

    public function update($id)
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        $barang = $this->barangModel->find($id);

        if (!$barang) {
            return redirect()->to('/barang')
                ->with('error', 'Data barang tidak ditemukan.');
        }

        $rules = [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'stok' => 'required|numeric',
            'satuan' => 'required',
            'harga' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Periksa kembali data yang dimasukkan.');
        }

        $namaGambar = $barang['gambar'];
        $gambar = $this->request->getFile('gambar');

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $folder = FCPATH . 'uploads/barang/';

            if (!is_dir($folder)) {
                mkdir($folder, 0777, true);
            }

            $namaGambarBaru = $gambar->getRandomName();
            $gambar->move($folder, $namaGambarBaru);

            if (
                !empty($namaGambar) &&
                file_exists($folder . $namaGambar)
            ) {
                unlink($folder . $namaGambar);
            }

            $namaGambar = $namaGambarBaru;
        }
        $harga = preg_replace(
            '/[^0-9]/',
            '',
            (string) $this->request->getPost('harga')
        );
        $this->barangModel->update($id, [
            'kode_barang' => $this->request->getPost('kode_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'stok' => $this->request->getPost('stok'),
            'satuan' => $this->request->getPost('satuan'),
            'harga' => $harga,
            'gambar' => $namaGambar,
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/barang')
            ->with('success', 'Data barang berhasil diperbarui.');
    }

    public function delete($id)
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        $barang = $this->barangModel->find($id);

        if (!$barang) {
            return redirect()->to('/barang')
                ->with('error', 'Data barang tidak ditemukan.');
        }

        if (!empty($barang['gambar'])) {
            $pathGambar = FCPATH . 'uploads/barang/' . $barang['gambar'];

            if (file_exists($pathGambar)) {
                unlink($pathGambar);
            }
        }

        $this->barangModel->delete($id);

        return redirect()->to('/barang')
            ->with('success', 'Barang berhasil dihapus.');
    }
}
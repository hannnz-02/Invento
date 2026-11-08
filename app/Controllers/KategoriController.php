<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    // Menampilkan daftar kategori
    public function index()
    {
        $kategoriModel = new KategoriModel();

        $data = [
            'kategori' => $kategoriModel->findAll()
        ];

        return view('kategori/index', $data);
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('kategori/create');
    }

    // Menyimpan kategori baru
    public function store()
    {
        $kategoriModel = new KategoriModel();

        $rules = [
            'nama_kategori' => 'required|min_length[3]',
            'deskripsi' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $kategoriModel->save([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/kategori')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $kategoriModel = new KategoriModel();

        $kategori = $kategoriModel->find($id);

        if (!$kategori) {
            return redirect()->to('/kategori')
                ->with('error', 'Kategori tidak ditemukan.');
        }

        return view('kategori/edit', ['kategori' => $kategori]);
    }

    // Memperbarui kategori
    public function update($id)
    {
        $kategoriModel = new KategoriModel();

        $kategori = $kategoriModel->find($id);

        if (!$kategori) {
            return redirect()->to('/kategori')
                ->with('error', 'Kategori tidak ditemukan.');
        }

        $rules = [
            'nama_kategori' => 'required|min_length[3]',
            'deskripsi' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/kategori')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    // Menghapus kategori
    public function delete($id)
    {
        $kategoriModel = new KategoriModel();

        if (!$kategoriModel->find($id)) {
            return redirect()->to('/kategori')
                ->with('error', 'Kategori tidak ditemukan.');
        }

        try {
            $kategoriModel->delete($id);

            return redirect()->to('/kategori')
                ->with('success', 'Kategori berhasil dihapus!');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('/kategori')
                ->with('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh data barang.');
        }
    }
}

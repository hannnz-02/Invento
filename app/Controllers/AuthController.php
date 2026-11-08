<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BarangModel;
use App\Models\KategoriModel;

class AuthController extends BaseController
{
    // Menampilkan halaman login
    public function login()
    {
        return view('auth/login');
    }

    // Memproses login admin
    public function authLogin()
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Mencari akun berdasarkan email
        $user = $userModel->where('email', $email)->first();

        // Memeriksa akun, password, dan role admin
        if (
            !$user ||
            $user['role'] !== 'admin' ||
            !password_verify($password, $user['password'])
        ) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email atau password salah!');
        }

        // Membuat session baru
        session()->regenerate();

        session()->set([
            'user_id' => $user['id'],
            'nama' => $user['nama'],
            'email' => $user['email'],
            'role' => $user['role'],
            'isLoggedIn' => true
        ]);

        return redirect()->to('/dashboard');
    }

    // Dashboard
    public function dashboard()
    {
        // Hanya admin yang boleh mengakses dashboard
        if (
            !session()->get('isLoggedIn') ||
            session()->get('role') !== 'admin'
        ) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $barangModel = new BarangModel();
        $kategoriModel = new KategoriModel();

        $data = [
            'totalUsers' => $userModel->countAll(),
            'totalBarang' => $barangModel->countAll(),
            'totalKategori' => $kategoriModel->countAll()
        ];

        return view('dashboard', $data);
    }

    // Logout
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}

<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfilController extends BaseController
{
    // Menampilkan profil pengguna
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();

        $user = $userModel->find(session()->get('user_id'));

        if (!$user) {
            session()->destroy();
            return redirect()->to('/login');
        }

        return view('profil/index', [
            'user' => $user
        ]);
    }

    // Memproses perubahan profil
    public function update()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $id = session()->get('user_id');
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('/login');
        }

        $nama = trim($this->request->getPost('nama'));
        $email = trim($this->request->getPost('email'));
        $passwordLama = $this->request->getPost('password_lama');
        $passwordBaru = $this->request->getPost('password_baru');
        $konfirmasiPassword = $this->request->getPost('konfirmasi_password');

        // Validasi nama dan email
        $rules = [
            'nama' => 'required|min_length[3]',
            'email' => "required|valid_email|is_unique[users.email,id,{$id}]"
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Jika pengguna ingin mengganti password
        if (!empty($passwordBaru)) {

            if (empty($passwordLama) ||
                !password_verify($passwordLama, $user['password'])) {

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Password lama tidak sesuai!');
            }

            if (strlen($passwordBaru) < 6) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Password baru minimal 6 karakter!');
            }

            if ($passwordBaru !== $konfirmasiPassword) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Konfirmasi password tidak cocok!');
            }

            $userModel->update($id, [
                'nama' => $nama,
                'email' => $email,
                'password' => password_hash(
                    $passwordBaru,
                    PASSWORD_DEFAULT
                )
            ]);

        } else {
            // Jika hanya mengubah nama dan email
            $userModel->update($id, [
                'nama' => $nama,
                'email' => $email
            ]);
        }

        // Perbarui data session
        session()->set([
            'nama' => $nama,
            'email' => $email
        ]);

        return redirect()->to('/profil')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}

<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginRegister extends BaseController
{
    public function login()
    {
        return view('Login');
    }

    public function process()
    {
        $model = new UserModel();

        // Ambil data dari formulir
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Verifikasi pengguna
        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Simpan data ke sesi
            $session = session();
            $session->set([
                'id' => $user['id'],
                'email' => $user['email'],
                'name' => $user['name'],
                'role' => $user['role'], // Simpan peran pengguna
                'logged_in' => true
            ]);

            // Redirect berdasarkan peran
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/user');
            }
        } else {
            // Redirect kembali ke halaman login dengan pesan error
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }


    public function register()
    {
        return view('Register');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/');
    }
}

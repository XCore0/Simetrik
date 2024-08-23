<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        // Pastikan pengguna adalah user
        if (session()->get('role') !== 'user') {
            return redirect()->to('/login');
        }

        return view('/user'); // Ganti dengan view user yang sesuai
    }
}

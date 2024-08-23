<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        // Pastikan pengguna adalah admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        // Pastikan path view sesuai
        return view('admin/Dashboard'); // Ganti dengan path view admin yang sesuai
    }
}

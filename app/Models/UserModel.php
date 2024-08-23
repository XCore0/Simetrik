<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = ['email', 'password', 'name', 'role'];

    protected $useTimestamps = false;

    // Menggunakan tipe data objek untuk hasil pencarian
    protected $returnType = 'array';
}

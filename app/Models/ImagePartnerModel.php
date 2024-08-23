<?php

namespace App\Models;

use CodeIgniter\Model;

class ImagePartnerModel extends Model
{
    protected $table = 'Image_Partner'; // Pastikan nama tabel benar
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'deskripsi', 'image'];
}

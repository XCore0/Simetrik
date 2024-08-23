<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageApotikModel extends Model
{
    protected $table = 'image_apotik';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'image'];
}

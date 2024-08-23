<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageFasilitasModel extends Model
{
    protected $table = 'image_fasilitas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'image'];
}

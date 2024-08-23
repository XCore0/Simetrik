<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageBesarModel extends Model
{
    protected $table = 'image_imagebesar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'image'];
}

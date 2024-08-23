<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageAcaraModel extends Model
{
    protected $table = 'image_acara';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'image'];
}

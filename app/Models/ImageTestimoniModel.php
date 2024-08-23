<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageTestimoniModel extends Model
{
    protected $table = 'image_testimoni';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'image'];
}

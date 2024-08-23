<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageChatModel extends Model
{
    protected $table = 'image_chat';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'image'];
}

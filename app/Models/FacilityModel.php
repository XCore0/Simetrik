<?php

namespace App\Models;

use CodeIgniter\Model;

class FacilityModel extends Model
{
    protected $table = 'facilities';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'health_facility_name',
        'name',
        'whatsapp',
        'email',
        'city',
        'product_variant',
        'terms_accepted',
        'promotion_info',
        'status' // Pastikan status ada di allowedFields
    ];

    protected $useTimestamps = false;
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'prodCode', 'created_at', 'updated_at'];
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetail extends Model
{
    protected $table = 'orderdetail';
    protected $primaryKey = 'odOrderNumber';
    protected $allowedFields = [
        'odOrderNumber', 'odProductCode', 'odQuantityOrdered', 'odPrice'
    ];
}
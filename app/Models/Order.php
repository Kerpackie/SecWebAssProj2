<?php

namespace App\Models;

use CodeIgniter\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'oOrderNumber';
    protected $allowedFields = [
        'oOrderDate', 'oRequiredDate', 'oShippedDate', 'oStatus', 'oComments', 'oCustomerNumber'
    ];
}
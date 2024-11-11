<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'prodCode';
    protected $allowedFields = ['prodDescription', 'prodCategory', 'prodArtist',
        'prodQtyInStock', 'prodBuyCost', 'prodSalePrice', 'prodPhoto',
        'priceAlreadyDiscounted'
    ];
    protected $useTimestamps = true;
}
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

    public function search($query)
    {
        return $this->like('prodDescription', $query)
            ->orLike('prodCategory', $query)
            ->orLike('prodArtist', $query)
            ->findAll();
    }
}
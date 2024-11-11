<?php

namespace App\Models;

use CodeIgniter\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'custNumber';
    protected $allowedFields = [
        'custLastName', 'custFirstName', 'custPhone',
        'custAddressLine1', 'custAddressLine2', 'custCity', 'custPostalCode',
        'custCountry', 'custCreditLimit', 'custEmail', 'custPassword', 'remember_token'
    ];
}
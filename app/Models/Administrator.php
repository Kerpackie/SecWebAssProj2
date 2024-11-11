<?php

namespace App\Models;

use CodeIgniter\Model;

class Administrator extends Model
{
    protected $table = 'administrators';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];
    protected $useTimestamps = true;
}
<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('dashboard');
        echo view('templates/footer');
    }
}
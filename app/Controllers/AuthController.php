<?php

namespace App\Controllers;

use App\Models\Administrator;
use App\Models\Customer;
use App\Models\Customer_Model;
use CodeIgniter\Controller;

class AuthController extends BaseController
{
    public function login()
    {
        helper(['form']);
        echo view('templates/header');
        echo view('auth/login');
        echo view('templates/footer');
    }

    public function loginSubmit()
    {
        $session = session();
        $model = new Customer_Model();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $rememberMe = $this->request->getVar('remember_me');

        $customer = $model->where('custEmail', $email)->first();

        if ($customer && password_verify($password, $customer['custPassword'])) {
            $session->set([
                'customer_id' => $customer['custNumber'],
                'customer_email' => $customer['custEmail'],
                'logged_in' => true,
            ]);

            if ($rememberMe) {
                $this->setRememberMe($customer['custNumber']);
            }

            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('error', 'Invalid login credentials');
            return redirect()->to('/login');
        }
    }

    private function setRememberMe($customerId)
    {
        $token = bin2hex(random_bytes(16));
        $expiration = time() + (86400 * 30); // 30 days

        setcookie('remember_me', $token, $expiration, "/");

        $model = new Customer_Model();
        $model->update($customerId, ['remember_token' => $token]);
    }

    public function checkRememberMe()
    {
        if (isset($_COOKIE['remember_me'])) {
            $token = $_COOKIE['remember_me'];
            $model = new Customer_Model();
            $customer = $model->where('remember_token', $token)->first();

            if ($customer) {
                $session = session();
                $session->set([
                    'customer_id' => $customer['custNumber'],
                    'customer_email' => $customer['custEmail'],
                    'logged_in' => true,
                ]);
                return redirect()->to('/dashboard');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        setcookie('remember_me', '', time() - 3600, "/");
        return redirect()->to('/login');
    }

    public function adminLogin()
    {
        helper(['form']);
        echo view('templates/header');
        echo view('auth/admin_login');
        echo view('templates/footer');
    }

    public function adminLoginSubmit()
    {
        $session = session();
        $adminModel = new Administrator();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $admin = $adminModel->where('username', $email)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            $session->set([
                'user_id' => $admin['id'],
                'user_email' => $admin['username'],
                'is_admin' => true,
                'logged_in' => true,
            ]);

            return redirect()->to('/admin/dashboard');
        } else {
            $session->setFlashdata('error', 'Invalid admin login credentials');
            return redirect()->to('/adminLogin');
        }
    }

    public function addAdmin()
    {
        helper(['form']);
        echo view('templates/header');
        echo view('auth/add_admin');
        echo view('templates/footer');
    }

    public function addAdminSubmit()
    {
        $session = session();
        $model = new Administrator();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        if ($model->insert($data)) {
            $session->setFlashdata('success', 'Administrator added successfully');
        } else {
            $session->setFlashdata('error', 'Failed to add administrator');
        }

        return redirect()->to('/addAdmin');
    }

    public function register()
    {
        helper(['form']);
        echo view('templates/header');
        echo view('auth/register');
        echo view('templates/footer');
    }

    public function registerSubmit()
    {
        $model = new Customer();
        $data = [
            'custLastName' => $this->request->getPost('custLastName'),
            'custFirstName' => $this->request->getPost('custFirstName'),
            'custPhone' => $this->request->getPost('custPhone'),
            'custAddressLine1' => $this->request->getPost('custAddressLine1'),
            'custAddressLine2' => $this->request->getPost('custAddressLine2'),
            'custCity' => $this->request->getPost('custCity'),
            'custPostalCode' => $this->request->getPost('custPostalCode'),
            'custCountry' => $this->request->getPost('custCountry'),
            'custEmail' => $this->request->getPost('custEmail'),
            'custPassword' => password_hash($this->request->getPost('custPassword'), PASSWORD_DEFAULT)
        ];
        $model->save($data);
        return redirect()->to('/login');
    }
}
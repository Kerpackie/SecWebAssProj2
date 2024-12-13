<?php

namespace App\Controllers;

use App\Models\Administrator;
use App\Models\Customer_Model;
use App\Models\Order;
use App\Models\Order_Model;
use Config\Database;

class AdminController extends BaseController
{
    // Using the constructor to check if the user is an admin
    // This way we can restrict access to the admin dashboard - think of it as poor mans RBAC
    // Doesn't quite work as I'd like... would be better to use a middleware or implement something from the start
    public function __construct()
    {
        helper('url');
        $this->checkAdmin();
    }

    private function checkAdmin()
    {
        $session = session();
        if (!$session->get('is_admin')) {
            return redirect()->to('/adminLogin')->send();
        }
    }

    public function adminDashboard()
    {
        helper(['form']);
        echo view('templates/header');
        echo view('admin/dashboard');
        echo view('templates/footer');
    }

    public function manageProducts()
    {
        helper(['form']);
        echo view('templates/header');
        echo view('admin/manage_products');
        echo view('templates/footer');
    }

    public function manageCustomers()
    {
        $this->checkAdmin();

        $model = new Customer_Model();
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $data['customers'] = $model->like('custFirstName', $keyword)
                ->orLike('custLastName', $keyword)
                ->orLike('custEmail', $keyword)
                ->paginate(10);
            session()->setFlashdata('success', 'Search results for: ' . $keyword);
        } else {
            $data['customers'] = $model->paginate(10); // Fetch 10 customers per page
        }

        $data['pager'] = $model->pager;
        $data['keyword'] = $keyword;

        echo view('templates/header');
        echo view('admin/customers/manage_customers', $data);
        echo view('templates/footer');
    }

    public function editCustomer($id)
    {
        $customerModel = new Customer_Model();
        $data['customer'] = $customerModel->find($id);

        echo view('templates/header');
        echo view('admin/customers/edit_customer', $data);
        echo view('templates/footer');
    }

    public function updateCustomer($id)
    {
        $customerModel = new Customer_Model();
        $data = $this->request->getPost();
        $customerModel->update($id, $data);

        return redirect()->to(base_url('admin/customer/manageCustomers'));
    }

    public function deleteCustomer($id)
    {
        $customerModel = new Customer_Model();
        $db = Database::connect();
        $db->transStart();

        try {

            // Do we want to delete related orders as well?
/*            // Delete related orders
            $db->table('orders')->where('oCustomerNumber', $id)->delete();*/

            // Delete customer
            $customerModel->delete($id);

            $db->transComplete();

            if ($db->transStatus() === FALSE) {
                throw new \Exception('Transaction failed');
            }

            session()->setFlashdata('success', 'Customer deleted successfully.');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Failed to delete customer: ' . $e->getMessage());
        }

        return redirect()->to(base_url('admin/customer/manageCustomers'));
    }

    public function adminManageOrders()
    {
        $orderModel = new Order();
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $data['orders'] = $orderModel->like('orderNumber', $keyword)
                ->orLike('orderDate', $keyword)
                ->orLike('status', $keyword)
                ->paginate(10);
            session()->setFlashdata('success', 'Search results for: ' . $keyword);
        } else {
            $data['orders'] = $orderModel->paginate(10); // Fetch 10 orders per page
        }

        $data['pager'] = $orderModel->pager;
        $data['keyword'] = $keyword;

        echo view('templates/header');
        echo view('admin/orders/manageOrders', $data);
        echo view('templates/footer');
    }

    public function adminViewOrder($orderId)
    {
        $orderModel = new Order();
        $order = $orderModel->find($orderId);

        $data['order'] = $order;

        echo view('templates/header');
        echo view('admin/orders/viewOrder', $data);
        echo view('templates/footer');
    }

    public function adminEditOrder($orderId)
    {
        $orderModel = new Order();
        $order = $orderModel->find($orderId);

        $data['order'] = $order;

        echo view('templates/header');
        echo view('admin/orders/editOrder', $data);
        echo view('templates/footer');
    }

    public function adminUpdateOrder($orderId)
    {
        $orderModel = new Order();
        $data = $this->request->getPost();

        if (!empty($data)) {
            $orderModel->update($orderId, $data);
            return redirect()->to(base_url('admin/orders/manageOrders'))->with('success', 'Order updated successfully.');
        } else {
            return redirect()->back()->with('error', 'No data to update.');
        }
    }

    public function manageAdmins()
    {
        helper(['form']);
        echo view('templates/header');
        echo view('admin/manage_admins');
        echo view('templates/footer');
    }

    public function manageCategories()
    {
        helper(['form']);
        echo view('templates/header');
        echo view('admin/manage_categories');
        echo view('templates/footer');
    }

    public function manageUsers()
    {
        helper(['form']);
        echo view('templates/header');
        echo view('admin/manage_users');
        echo view('templates/footer');
    }

    public function manageArtists()
    {
        helper(['form']);
        echo view('templates/header');
        echo view('admin/manage_artists');
        echo view('templates/footer');
    }

}
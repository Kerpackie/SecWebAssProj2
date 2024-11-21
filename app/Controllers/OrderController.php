<?php

namespace App\Controllers;

use App\Models\Order;
use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;

class OrderController extends BaseController
{
    public function viewOrder($orderId)
    {
        $session = session();
        $userId = $session->get('customer_id');

        $orderModel = new Order();
        $order = $orderModel->where('oOrderNumber', $orderId)->where('oCustomerNumber', $userId)->first();

        if (empty($order)) {
            // redirect and flash data
            return redirect()->to('/orders/viewAllOrders')->with('error', 'Order not found: ' . $orderId);
            //throw new PageNotFoundException('Order not found: ' . $orderId);
        }

        $data['order'] = $order;

        echo view('templates/header');
        echo view('order/viewOrder', $data);
        echo view('templates/footer');
    }

    public function viewAllOrders()
    {
        $session = session();
        $userId = $session->get('customer_id');

        $orderModel = new Order();
        $orders = $orderModel->where('oCustomerNumber', $userId)->paginate(10); // Fetch 10 orders per page

        $data['orders'] = $orders;
        $data['pager'] = $orderModel->pager;

        echo view('templates/header');
        echo view('order/viewAllOrders', $data);
        echo view('templates/footer');
    }

    public function editOrder($orderId)
    {
        $model = new Order();
        $data['order'] = $model->find($orderId);

        echo view('templates/header');
        echo view('order/editOrder', $data);
        echo view('templates/footer');
    }

    public function updateOrder($orderId)
    {
        $model = new Order();
        $data = [
            'oOrderDate' => $this->request->getPost('oOrderDate'),
            'oRequiredDate' => $this->request->getPost('oRequiredDate'),
            'oShippedDate' => $this->request->getPost('oShippedDate'),
            'oStatus' => $this->request->getPost('oStatus'),
            'oComments' => $this->request->getPost('oComments'),
            'oCustomerNumber' => $this->request->getPost('oCustomerNumber')
        ];
        $model->update($orderId, $data);
        return redirect()->to('/orders/view/' . $orderId);
    }
}
<?php

namespace App\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class CheckoutController extends BaseController
{
    public function checkout()
    {
        $session = session();
        $cartItems = $session->get('cart');

        if (empty($cartItems)) {
            return redirect()->to('/cart')->with('error', 'Your cart is empty.');
        }

        $lineItems = [];
        foreach ($cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item['prodDescription'],
                    ],
                    'unit_amount' => $item['prodSalePrice'] * 100,
                ],
                'quantity' => $item['quantity'],
            ];
        }

        Stripe::setApiKey(env('stripe.secret'));

        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [$lineItems],
            'mode' => 'payment',
            'success_url' => base_url('checkout/success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => base_url('checkout/cancel'),
        ]);

        return redirect()->to($checkoutSession->url);
    }

    public function success()
    {
        $session = session();
        $cartItems = $session->get('cart');
        $sessionId = $this->request->getVar('session_id');

        if (empty($cartItems)) {
            return redirect()->to('/cart')->with('error', 'Your cart is empty.');
        }

        Stripe::setApiKey(env('stripe.secret'));
        $checkoutSession = Session::retrieve($sessionId);

        if ($checkoutSession->payment_status == 'paid') {
            $orderModel = new Order();
            $orderDetailModel = new OrderDetail();

            $orderData = [
                'oOrderDate' => date('Y-m-d H:i:s'),
                'oRequiredDate' => date('Y-m-d H:i:s', strtotime('+7 days')),
                'oStatus' => 'Processing',
                'oCustomerNumber' => $session->get('customer_id')
            ];

            $orderId = $orderModel->insert($orderData);

            foreach ($cartItems as $item) {
                $orderDetailData = [
                    'odOrderNumber' => $orderId,
                    'odProductCode' => $item['prodCode'],
                    'odQuantityOrdered' => $item['quantity'],
                    'odPrice' => $item['prodSalePrice']
                ];
                $orderDetailModel->insert($orderDetailData);
            }

            $session->remove('cart');

            return redirect()->to('/orders/view/' . $orderId)->with('success', 'Your order has been placed successfully.');
        }

        return redirect()->to('/cart')->with('error', 'Payment failed. Please try again.');
    }

    public function cancel()
    {
        return redirect()->to('/cart/view')->with('error', 'Payment was cancelled.');
    }
}
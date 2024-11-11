<?php

namespace App\Controllers;

use App\Models\Product;

class CartController extends BaseController
{
    public function addToCart($prodCode)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$prodCode])) {
            $cart[$prodCode]['quantity']++;
        } else {
            $productModel = new Product();
            $product = $productModel->find($prodCode);
            $cart[$prodCode] = [
                'prodCode' => $product['prodCode'],
                'prodDescription' => $product['prodDescription'],
                'prodSalePrice' => $product['prodSalePrice'],
                'quantity' => 1
            ];
        }

        $session->set('cart', $cart);
        return redirect()->to('/cart/view');
    }

    public function removeFromCart($prodCode)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$prodCode])) {
            unset($cart[$prodCode]);
        }

        $session->set('cart', $cart);
        return redirect()->to('/cart/view');
    }

    public function viewCart()
    {
        $session = session();
        $data['cart'] = $session->get('cart') ?? [];

        echo view('templates/header');
        echo view('cart/cart', $data);
        echo view('templates/footer');
    }
}
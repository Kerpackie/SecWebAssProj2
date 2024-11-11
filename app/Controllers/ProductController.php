<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Wishlist;

class ProductController extends BaseController
{
    public function index()
    {
        $model = new Product();
        $data['products'] = $model->findAll();

        echo view('templates/header');
        echo view('product/productList', $data);
        echo view('templates/footer');
    }

    public function search()
    {
        $model = new Product();
        $query = $this->request->getVar('query');
        $data['products'] = $model->like('prodDescription', $query)->orLike('prodCategory', $query)->findAll();

        echo view('templates/header');
        echo view('product/productList', $data);
        echo view('templates/footer');
    }

    public function view($id)
    {
        $model = new Product();
        $data['product'] = $model->find($id);

        echo view('templates/header');
        echo view('product/productView', $data);
        echo view('templates/footer');
    }

    public function create()
    {
        helper(['form']);
        echo view('templates/header');
        echo view('product/addProduct');
        echo view('templates/footer');
    }

    public function store()
    {
        $model = new Product();
        $data = [
            'prodCode' => $this->request->getPost('prodCode'),
            'prodDescription' => $this->request->getPost('prodDescription'),
            'prodCategory' => $this->request->getPost('prodCategory'),
            'prodArtist' => $this->request->getPost('prodArtist'),
            'prodQtyInStock' => $this->request->getPost('prodQtyInStock'),
            'prodBuyCost' => $this->request->getPost('prodBuyCost'),
            'prodSalePrice' => $this->request->getPost('prodSalePrice'),
            'prodPhoto' => $this->request->getPost('prodPhoto'),
            'priceAlreadyDiscounted' => $this->request->getPost('priceAlreadyDiscounted')
        ];
        $model->save($data);
        return redirect()->to('/products');
    }

    public function edit($id)
    {
        $model = new Product();
        $data['product'] = $model->find($id);

        echo view('templates/header');
        echo view('product/editProduct', $data);
        echo view('templates/footer');
    }

    public function update($id)
    {
        $model = new Product();
        $data = [
            'prodCode' => $this->request->getPost('prodCode'),
            'prodDescription' => $this->request->getPost('prodDescription'),
            'prodCategory' => $this->request->getPost('prodCategory'),
            'prodArtist' => $this->request->getPost('prodArtist'),
            'prodQtyInStock' => $this->request->getPost('prodQtyInStock'),
            'prodBuyCost' => $this->request->getPost('prodBuyCost'),
            'prodSalePrice' => $this->request->getPost('prodSalePrice'),
            'prodPhoto' => $this->request->getPost('prodPhoto'),
            'priceAlreadyDiscounted' => $this->request->getPost('priceAlreadyDiscounted')
        ];
        $model->update($id, $data);
        return redirect()->to('/products');
    }

    public function delete($id)
    {
        $model = new Product();
        $model->delete($id);
        return redirect()->to('/products');
    }

    public function addToWishlist($prodCode)
    {
        if (!session()->has('customer_id')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('customer_id');
        $wishlist = new Wishlist();
        $data = [
            'user_id' => $userId,
            'prodCode' => $prodCode
        ];

        if ($wishlist->save($data)) {
            return redirect()->to('products/viewWishlist')->with('success', 'Item added to wishlist');
        } else {
            return redirect()->to('products/viewWishlist')->with('error', 'Failed to add item to wishlist');
        }
    }

    public function deleteFromWishlist($id)
    {
        if (!session()->has('customer_id')) {
            return redirect()->to('/login');
        }

        $wishlist = new Wishlist();
        if ($wishlist->delete($id)) {
            return redirect()->to('/products/viewWishlist')->with('success', 'Item removed from wishlist');
        } else {
            return redirect()->to('/products/viewWishlist')->with('error', 'Failed to remove item from wishlist');
        }
    }

    public function viewWishlist()
    {
        $wishlist = new Wishlist();
        $product = new Product();
        $user_id = session()->get('customer_id');
        $wishlistItems = $wishlist->where('user_id', $user_id)->findAll();
        $data['products'] = [];

        foreach ($wishlistItems as $item) {
            $productData = $product->find($item['prodCode']);
            $productData['wishlist_id'] = $item['id'];
            $data['products'][] = $productData;
        }

        echo view('templates/header');
        echo view('product/wishlist', $data);
        echo view('templates/footer');
    }
}
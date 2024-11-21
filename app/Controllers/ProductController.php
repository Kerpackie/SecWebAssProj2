<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Config\Services;

class ProductController extends BaseController
{
    public function index()
    {
        $productModel = new Product();
        $data['products'] = $productModel->paginate(12); // Fetch 10 products per page
        $data['pager'] = $productModel->pager;

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
        echo view('admin/products/addProduct');
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
        echo view('admin/products/editProduct', $data);
        echo view('templates/footer');
    }

    public function update($prodCode)
    {
        $productModel = new Product();
        $data = $this->request->getPost();

        // Handle file upload
        $file = $this->request->getFile('prodPhoto');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(FCPATH . 'assets/images/products/full', $fileName);
            $data['prodPhoto'] = $fileName;

            // Create thumbnail
            $image = Services::image()
                ->withFile(FCPATH . 'assets/images/products/full/' . $fileName)
                ->resize(150, 150, true, 'height')
                ->save(FCPATH . 'assets/images/products/thumbs/' . $fileName);
        } else {
            return redirect()->back()->with('error', 'Photo upload failed.');
        }

        $productModel->update($prodCode, $data);
        return redirect()->to(base_url('admin/products/manageProducts'))->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $model = new Product();
        $model->delete($id);
        return redirect()->to('/admin/products/manageProducts');
    }

    public function manageProducts()
    {
        $model = new Product();
        $query = $this->request->getVar('query');

        if ($query) {
            $data['products'] = $model->search($query);
            session()->setFlashdata('success', 'Search results for: ' . $query);
        } else {
            $data['products'] = $model->paginate(10); // Fetch 10 products per page
            $data['pager'] = $model->pager;
        }

        $data['query'] = $query;

        echo view('templates/header');
        echo view('admin/products/manageProducts', $data);
        echo view('templates/footer');
    }

    public function adminView($prodCode)
    {
        $model = new Product();
        $data['product'] = $model->find($prodCode);

        echo view('templates/header');
        echo view('admin/products/viewProduct', $data);
        echo view('templates/footer');
    }

    public function addToWishlist($prodCode)
    {
        if (!session()->has('customer_id')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('customer_id');
        $wishlist = new Wishlist();

        // Check if the product is already in the wishlist
        $existingItem = $wishlist->where('user_id', $userId)
            ->where('prodCode', $prodCode)
            ->first();

        if ($existingItem) {
            // Product is already in the wishlist
            return redirect()->to('products/viewWishlist')->with('error', 'Product is already in your wishlist.');
        }

        // Add product to the wishlist
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
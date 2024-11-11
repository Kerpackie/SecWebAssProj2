<!-- app/Views/productList.php -->
<div class="container mt-5">
    <h2>Products</h2>
    <form action="<?= base_url('products/search') ?>" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="query" placeholder="Search for products...">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?= base_url('uploads/' . $product['prodPhoto']) ?>" class="card-img-top" alt="<?= $product['prodDescription'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['prodDescription'] ?></h5>
                        <p class="card-text">Category: <?= $product['prodCategory'] ?></p>
                        <p class="card-text">Price: $<?= $product['prodSalePrice'] ?></p>
                        <a href="<?= base_url('products/view/' . $product['prodCode']) ?>" class="btn btn-primary">View Details</a>
                        <a href="<?= base_url('products/addToWishlist/' . $product['prodCode']) ?>" class="btn btn-secondary">Add to Wishlist</a>
                        <a href="<?= base_url('cart/addToCart/' . $product['prodCode']) ?>" class="btn btn-success">Add to Cart</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
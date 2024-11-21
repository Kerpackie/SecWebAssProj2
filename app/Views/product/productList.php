<style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
    }
    .card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }
    .card-body {
        flex-grow: 1;
    }

    .card-body a {
        color: inherit;
        text-decoration: none;
    }
    .card-body a:hover {
        text-decoration: underline;
    }
    .btn-group {
        width: 100%;
    }
    .btn-group .btn {
        flex: 1;
    }
</style>

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
    <div class="row card-container">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <a href="<?= base_url('products/view/' . $product['prodCode']) ?>">
                        <img src="<?= base_url('assets/images/products/full/' . $product['prodPhoto']) ?>" class="card-img-top" alt="<?= $product['prodDescription'] ?>">
                    </a>
                    <div class="card-body">
                        <a href="<?= base_url('products/view/' . $product['prodCode']) ?>">
                            <h5 class="card-title"><?= $product['prodDescription'] ?></h5>
                        </a>
                        <p class="card-text">Category: <?= $product['prodCategory'] ?></p>
                        <p class="card-text">Price: $<?= $product['prodSalePrice'] ?></p>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="<?= base_url('products/addToWishlist/' . $product['prodCode']) ?>" class="btn btn-danger">Add to Wishlist</a>
                        <a href="<?= base_url('cart/addToCart/' . $product['prodCode']) ?>" class="btn btn-success">Add to Cart</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <nav aria-label="Page navigation">
        <?= $pager->links('default', 'bootstrap_pagination') ?>
    </nav>
</div>
<div class="container mt-5">
    <h2>My Wishlist</h2>
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?= base_url('assets/images/products/thumbs/' . $product['prodPhoto']) ?>" class="card-img-top" alt="<?= $product['prodDescription'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['prodDescription'] ?></h5>
                        <p class="card-text">Category: <?= $product['prodCategory'] ?></p>
                        <p class="card-text">Price: $<?= $product['prodSalePrice'] ?></p>
                        <a href="<?= base_url('products/view/' . $product['prodCode']) ?>" class="btn btn-primary">View Details</a>
                        <a href="<?= base_url('products/deleteFromWishlist/' . $product['wishlist_id']) ?>" class="btn btn-danger">Remove</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
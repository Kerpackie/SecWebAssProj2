<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= base_url('uploads/' . $product['prodPhoto']) ?>" class="img-fluid" alt="<?= $product['prodDescription'] ?>">
        </div>
        <div class="col-md-6">
            <h2><?= $product['prodDescription'] ?></h2>
            <p>Category: <?= $product['prodCategory'] ?></p>
            <p>Price: $<?= $product['prodSalePrice'] ?></p>
            <a href="<?= base_url('cart/addToCart/' . $product['prodCode']) ?>" class="btn btn-success">Add to Cart</a>
        </div>
    </div>
</div>
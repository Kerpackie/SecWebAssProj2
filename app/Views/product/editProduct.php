<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Product</h2>
    <form action="<?= base_url('products/update/' . $product['id']) ?>" method="post">
        <div class="form-group">
            <label for="prodCode">Product Code</label>
            <input type="text" class="form-control" id="prodCode" name="prodCode" value="<?= $product['prodCode'] ?>" required>
        </div>
        <div class="form-group">
            <label for="prodDescription">Description</label>
            <textarea class="form-control" id="prodDescription" name="prodDescription"><?= $product['prodDescription'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="prodCategory">Category</label>
            <input type="text" class="form-control" id="prodCategory" name="prodCategory" value="<?= $product['prodCategory'] ?>">
        </div>
        <div class="form-group">
            <label for="prodArtist">Artist</label>
            <input type="text" class="form-control" id="prodArtist" name="prodArtist" value="<?= $product['prodArtist'] ?>">
        </div>
        <div class="form-group">
            <label for="prodQtyInStock">Quantity in Stock</label>
            <input type="number" class="form-control" id="prodQtyInStock" name="prodQtyInStock" value="<?= $product['prodQtyInStock'] ?>">
        </div>
        <div class="form-group">
            <label for="prodBuyCost">Buy Cost</label>
            <input type="number" step="0.01" class="form-control" id="prodBuyCost" name="prodBuyCost" value="<?= $product['prodBuyCost'] ?>">
        </div>
        <div class="form-group">
            <label for="prodSalePrice">Sale Price</label>
            <input type="number" step="0.01" class="form-control" id="prodSalePrice" name="prodSalePrice" value="<?= $product['prodSalePrice'] ?>">
        </div>
        <div class="form-group">
            <label for="prodPhoto">Photo</label>
            <input type="text" class="form-control" id="prodPhoto" name="prodPhoto" value="<?= $product['prodPhoto'] ?>">
        </div>
        <div class="form-group">
            <label for="priceAlreadyDiscounted">Price Already Discounted</label>
            <input type="checkbox" id="priceAlreadyDiscounted" name="priceAlreadyDiscounted" value="1" <?= $product['priceAlreadyDiscounted'] ? 'checked' : '' ?>>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
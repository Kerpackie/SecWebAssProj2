<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View Product</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Product Details</h2>
    <table class="table table-bordered">
        <tr>
            <th>Product Code</th>
            <td><?= $product['prodCode'] ?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?= $product['prodDescription'] ?></td>
        </tr>
        <tr>
            <th>Category</th>
            <td><?= $product['prodCategory'] ?></td>
        </tr>
        <tr>
            <th>Artist</th>
            <td><?= $product['prodArtist'] ?></td>
        </tr>
        <tr>
            <th>Quantity in Stock</th>
            <td><?= $product['prodQtyInStock'] ?></td>
        </tr>
        <tr>
            <th>Buy Cost</th>
            <td><?= $product['prodBuyCost'] ?></td>
        </tr>
        <tr>
            <th>Sale Price</th>
            <td><?= $product['prodSalePrice'] ?></td>
        </tr>
        <tr>
            <th>Photo</th>
            <td><img src="<?= base_url('assets/images/products/full/' . $product['prodPhoto']) ?>" alt="Product Photo" width="100"></td>
        </tr>
        <tr>
            <th>Price Already Discounted</th>
            <td><?= $product['priceAlreadyDiscounted'] ? 'Yes' : 'No' ?></td>
        </tr>
    </table>
    <a href="<?= base_url('admin/products/manageProducts') ?>" class="btn btn-primary">Back to Manage Products</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
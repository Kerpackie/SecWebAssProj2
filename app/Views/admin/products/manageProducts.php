<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Manage Products</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Product Code</th>
            <th>Description</th>
            <th>Category</th>
            <th>Artist</th>
            <th>Quantity in Stock</th>
            <th>Buy Cost</th>
            <th>Sale Price</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['prodCode'] ?></td>
                <td><?= $product['prodDescription'] ?></td>
                <td><?= $product['prodCategory'] ?></td>
                <td><?= $product['prodArtist'] ?></td>
                <td><?= $product['prodQtyInStock'] ?></td>
                <td><?= $product['prodBuyCost'] ?></td>
                <td><?= $product['prodSalePrice'] ?></td>
                <td>
                    <a href="<?= base_url('admin/products/edit/' . $product['prodCode']) ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url('admin/products/adminView/' . $product['prodCode']) ?>" class="btn btn-info">View</a>
                    <a href="<?= base_url('admin/products/delete/' . $product['prodCode']) ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation">
        <?= $pager->links('default', 'bootstrap_pagination') ?>
    </nav>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
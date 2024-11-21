<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-2">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <h2>Manage Orders</h2>
    <form action="<?= base_url('admin/orders/manageOrders') ?>" method="get" class="form-inline mb-3">
        <input type="text" name="keyword" class="form-control mr-2" placeholder="Search orders" value="<?= isset($keyword) ? $keyword : '' ?>">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <a href="<?= base_url('orders/create') ?>" class="btn btn-primary mb-3">Add New Order</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Order Number</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $order['oOrderNumber'] ?></td>
                <td><?= $order['oOrderDate'] ?></td>
                <td><?= $order['oStatus'] ?></td>
                <td>
                    <a href="<?= base_url('admin/orders/edit/' . $order['oOrderNumber']) ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url('admin/orders/view/' . $order['oOrderNumber']) ?>" class="btn btn-info">View</a>
                    <a href="<?= base_url('admin/orders/delete/' . $order['oOrderNumber']) ?>" class="btn btn-danger">Delete</a>
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
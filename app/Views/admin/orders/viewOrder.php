<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Order Details</h2>

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

    <table class="table table-bordered">
        <tr>
            <th>Order Number</th>
            <td><?= $order['oOrderNumber'] ?></td>
        </tr>
        <tr>
            <th>Customer Number</th>
            <td><?= $order['oCustomerNumber'] ?></td>
        </tr>
        <tr>
            <th>Order Date</th>
            <td><?= $order['oOrderDate'] ?></td>
        </tr>
        <tr>
            <th>Required Date</th>
            <td><?= $order['oRequiredDate'] ?></td>
        </tr>
        <tr>
            <th>Shipped Date</th>
            <td><?= $order['oShippedDate'] ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= $order['oStatus'] ?></td>
        </tr>
        <tr>
            <th>Comments</th>
            <td><?= $order['oComments'] ?></td>
        </tr>

    </table>

    <a href="<?= base_url('admin/orders/manageOrders') ?>" class="btn btn-secondary">Back to Orders</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
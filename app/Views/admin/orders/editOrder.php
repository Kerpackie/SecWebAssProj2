<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Order</h2>

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

    <form method="post" action="<?= base_url('admin/orders/update/' . $order['oOrderNumber']) ?>">
        <div class="form-group">
            <label for="orderNumber">Order Number</label>
            <input type="text" class="form-control" id="orderNumber" name="oOrderNumber" value="<?= $order['oOrderNumber'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="customerNumber">Customer Number</label>
            <input type="text" class="form-control" id="customerNumber" name="oCustomerNumber" value="<?= $order['oCustomerNumber'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="orderDate">Order Date</label>
            <input type="date" class="form-control" id="orderDate" name="oOrderDate" value="<?= $order['oOrderDate'] ?>">
        </div>
        <div class="form-group">
            <label for="requiredDate">Required Date</label>
            <input type="date" class="form-control" id="requiredDate" name="oRequiredDate" value="<?= $order['oRequiredDate'] ?>">
        </div>
        <div class="form-group">
            <label for="shippedDate">Shipped Date</label>
            <input type="date" class="form-control" id="shippedDate" name="oShippedDate" value="<?= $order['oShippedDate'] ?>">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="oStatus">
                <option value="Pending" <?= $order['oStatus'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                <option value="Processing" <?= $order['oStatus'] == 'Processing' ? 'selected' : '' ?>>Processing</option>
                <option value="Shipped" <?= $order['oStatus'] == 'Shipped' ? 'selected' : '' ?>>Shipped</option>
                <option value="Delivered" <?= $order['oStatus'] == 'Delivered' ? 'selected' : '' ?>>Delivered</option>
                <option value="Cancelled" <?= $order['oStatus'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
            </select>
        </div>
        <div class="form-group">
            <label for="comments">Comments</label>
            <textarea class="form-control" id="comments" name="oComments"><?= $order['oComments'] ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Order</button>
        <a href="<?= base_url('admin/orders/manageOrders') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<div class="container mt-5">
    <h2>Order Details</h2>
    <table class="table">
        <tr>
            <th>Order ID</th>
            <td><?= $order['oOrderNumber'] ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= $order['oStatus'] ?></td>
        </tr>
        <tr>
            <th>Created At</th>
            <td><?= $order['oOrderDate'] ?></td>
        </tr>
    </table>

    <h3>Order Items</h3>
    <table class="table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Product Code</th>
            <th>Description</th>
            <th>Quantity Ordered</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($orderDetails as $item): ?>
            <tr>
                <td><img src="<?= base_url('assets/images/products/thumbs/' . $item['prodPhoto']) ?>" alt="Product Image" width="50"></td>
                <td><?= $item['odProductCode'] ?></td>
                <td><?= $item['prodDescription'] ?></td>
                <td><?= $item['odQuantityOrdered'] ?></td>
                <td>$<?= $item['odPrice'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= base_url('orders/view') ?>" class="btn btn-secondary">Back to Orders</a>
</div>
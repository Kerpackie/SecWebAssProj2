<div class="container mt-5">
    <h2>Order Details</h2>
    <p><strong>Order Number:</strong> <?= esc($order['oOrderNumber']) ?></p>
    <p><strong>Order Date:</strong> <?= esc($order['oOrderDate']) ?></p>
    <p><strong>Required Date:</strong> <?= esc($order['oRequiredDate']) ?></p>
    <p><strong>Shipped Date:</strong> <?= esc($order['oShippedDate']) ?></p>
    <p><strong>Status:</strong> <?= esc($order['oStatus']) ?></p>
    <p><strong>Customer Number:</strong> <?= esc($order['oCustomerNumber']) ?></p>
    <a href="<?= base_url('orders/edit/' . $order['oOrderNumber']) ?>" class="btn btn-primary">Edit Order</a>
</div>
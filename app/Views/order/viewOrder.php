<!-- app/Views/order/viewOrder.php -->
<div class="container mt-5">
    <h2>Order Details</h2>
    <p>Order ID: <?= $order['oOrderNumber'] ?></p>
    <p>Order Date: <?= $order['oOrderDate'] ?></p>
    <p>Total Amount: $<?= $order['oStatus'] ?></p>
    <a href="<?= base_url('orders/edit/' . $order['oOrderNumber']) ?>" class="btn btn-primary">Edit Order</a>
</div>
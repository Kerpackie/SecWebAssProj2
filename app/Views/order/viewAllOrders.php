<div class="container mt-5">
    <h2>Your Orders</h2>
    <?php if (empty($orders)): ?>
        <p>You have no orders.</p>
    <?php else: ?>
        <table class="table">
            <thead>
            <tr>
                <th>Order Number</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['oOrderNumber'] ?></td>
                    <td><?= $order['oOrderDate'] ?></td>
                    <td>$<?= $order['oStatus'] ?></td>
                    <td>
                        <a href="<?= base_url('orders/view/' . $order['oOrderNumber']) ?>" class="btn btn-primary">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
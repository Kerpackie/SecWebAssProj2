<div class="container mt-5">
    <h2>Shopping Cart</h2>
    <?php if (empty($cart)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="table">
            <thead>
            <tr>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cart as $item): ?>
                <tr>
                    <td><?= $item['prodDescription'] ?></td>
                    <td>$<?= $item['prodSalePrice'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>$<?= $item['prodSalePrice'] * $item['quantity'] ?></td>
                    <td>
                        <a href="<?= base_url('cart/removeFromCart/' . $item['prodCode']) ?>" class="btn btn-danger">Remove</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
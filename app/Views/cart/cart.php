<div class="container mt-5">
    <h2>Shopping Cart</h2>
    <?php if (empty($cart)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <form action="<?= base_url('cart/updateCart') ?>" method="post">
            <table class="table">
                <thead>
                <tr>
                    <th>Image</th>
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
                        <td><img src="<?= base_url('assets/images/products/thumbs/' . $item['prodPhoto']) ?>" alt="Product Image" width="50"></td>
                        <td><?= $item['prodDescription'] ?></td>
                        <td>$<?= $item['prodSalePrice'] ?></td>
                        <td>
                            <input type="number" name="quantities[<?= $item['prodCode'] ?>]" value="<?= $item['quantity'] ?>" min="1" style="width: 3em;">
                        </td>
                        <td>$<?= $item['prodSalePrice'] * $item['quantity'] ?></td>
                        <td>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?= base_url('cart/removeFromCart/' . $item['prodCode']) ?>" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </form>
        <a href="<?= base_url('checkout') ?>" class="btn btn-primary">Checkout with Stripe</a>
    <?php endif; ?>
</div>
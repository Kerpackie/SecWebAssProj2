<div class="container mt-5">
    <h2>Edit Order</h2>
    <form action="<?= base_url('orders/update/' . $order['oOrderNumber']) ?>" method="post">
        <div class="form-group">
            <label for="oOrderDate">Order Date</label>
            <input type="date" class="form-control" id="oOrderDate" name="oOrderDate" value="<?= $order['oOrderDate'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="oRequiredDate">Required Date</label>
            <input type="date" class="form-control" id="oRequiredDate" name="oRequiredDate" value="<?= $order['oRequiredDate'] ?>" required>
        </div>
        <div class="form-group">
            <label for="oShippedDate">Shipped Date</label>
            <input type="date" class="form-control" id="oShippedDate" name="oShippedDate" value="<?= $order['oShippedDate'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="oCustomerNumber">Customer Number</label>
            <input type="text" class="form-control" id="oCustomerNumber" name="oCustomerNumber" value="<?= $order['oCustomerNumber'] ?>" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Update Order</button>
    </form>
</div>
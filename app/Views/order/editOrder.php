<div class="container mt-5">
    <h2>Edit Order</h2>
    <form action="<?= base_url('orders/update/' . $order['oOrderNumber']) ?>" method="post">
        <div class="form-group">
            <label for="oOrderDate">Order Date</label>
            <input type="date" class="form-control" id="oOrderDate" name="oOrderDate" value="<?= $order['oOrderDate'] ?>" required>
        </div>
        <div class="form-group">
            <label for="oRequiredDate">Required Date</label>
            <input type="date" class="form-control" id="oRequiredDate" name="oRequiredDate" value="<?= $order['oRequiredDate'] ?>" required>
        </div>
        <div class="form-group">
            <label for="oShippedDate">Shipped Date</label>
            <input type="date" class="form-control" id="oShippedDate" name="oShippedDate" value="<?= $order['oShippedDate'] ?>">
        </div>
        <div class="form-group">
            <label for="oStatus">Status</label>
            <input type="text" class="form-control" id="oStatus" name="oStatus" value="<?= $order['oStatus'] ?>" required>
        </div>
        <div class="form-group">
            <label for="oComments">Comments</label>
            <textarea class="form-control" id="oComments" name="oComments"><?= $order['oComments'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="oCustomerNumber">Customer Number</label>
            <input type="text" class="form-control" id="oCustomerNumber" name="oCustomerNumber" value="<?= $order['oCustomerNumber'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Order</button>
    </form>
</div>
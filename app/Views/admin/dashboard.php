
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Admin Dashboard</h2>
    <ul class="list-group">
        <li class="list-group-item"><a href="<?= base_url('admin/customer/manageCustomers') ?>">Manage Users</a></li>
        <li class="list-group-item"><a href="<?= base_url('admin/products/manageProducts') ?>">Manage Products</a></li>
        <li class="list-group-item"><a href="<?= base_url('admin/orders/manageOrders') ?>">Manage Orders</a></li>
        <li class="list-group-item"><a href="<?= base_url('addAdmin') ?>">Add Admins</a></li>
    </ul>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
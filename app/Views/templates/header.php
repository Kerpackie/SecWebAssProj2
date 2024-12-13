<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adare Design Gallery</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= base_url('/') ?>">
        <img src="<?= base_url('assets/images/site/Logo.png') ?>" alt="Logo" style="height: 80px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/dashboard') ?>">Products</a>
            </li>
            <?php if (session()->get('logged_in')): ?>
                <?php if (session()->get('is_admin')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/admin/dashboard') ?>">Admin Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/admin/products/manageProducts') ?>">Manage Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/admin/customer/manageCustomers') ?>">Manage Customers</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/orders/view') ?>">View Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/products/viewWishlist') ?>">View Wishlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/adminLogin') ?>">Admin Login</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/logout') ?>">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/login') ?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/register') ?>">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<div class="container mt-1 mb-3">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Customer</h2>
    <form action="<?= base_url('admin/customer/update/' . $customer['custNumber']) ?>" method="post">
        <div class="form-group">
            <label for="custFirstName">First Name</label>
            <input type="text" class="form-control" id="custFirstName" name="custFirstName" value="<?= $customer['custFirstName'] ?>" required>
        </div>
        <div class="form-group">
            <label for="custLastName">Last Name</label>
            <input type="text" class="form-control" id="custLastName" name="custLastName" value="<?= $customer['custLastName'] ?>" required>
        </div>
        <div class="form-group">
            <label for="custPhone">Phone</label>
            <input type="text" class="form-control" id="custPhone" name="custPhone" value="<?= $customer['custPhone'] ?>" required>
        </div>
        <div class="form-group">
            <label for="custAddressLine1">Address Line 1</label>
            <input type="text" class="form-control" id="custAddressLine1" name="custAddressLine1" value="<?= $customer['custAddressLine1'] ?>" required>
        </div>
        <div class="form-group">
            <label for="custAddressLine2">Address Line 2</label>
            <input type="text" class="form-control" id="custAddressLine2" name="custAddressLine2" value="<?= $customer['custAddressLine2'] ?>">
        </div>
        <div class="form-group">
            <label for="custCity">City</label>
            <input type="text" class="form-control" id="custCity" name="custCity" value="<?= $customer['custCity'] ?>" required>
        </div>
        <div class="form-group">
            <label for="custPostalCode">Postal Code</label>
            <input type="text" class="form-control" id="custPostalCode" name="custPostalCode" value="<?= $customer['custPostalCode'] ?>" required>
        </div>
        <div class="form-group">
            <label for="custCountry">Country</label>
            <input type="text" class="form-control" id="custCountry" name="custCountry" value="<?= $customer['custCountry'] ?>" required>
        </div>
        <div class="form-group">
            <label for="custCreditLimit">Credit Limit</label>
            <input type="number" class="form-control" id="custCreditLimit" name="custCreditLimit" value="<?= $customer['custCreditLimit'] ?>" required>
        </div>
        <div class="form-group">
            <label for="custEmail">Email</label>
            <input type="email" class="form-control" id="custEmail" name="custEmail" value="<?= $customer['custEmail'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Customer</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
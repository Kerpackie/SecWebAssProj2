<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Artists</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Manage Artists</h2>
    <a href="<?= base_url('artists/create') ?>" class="btn btn-primary mb-3">Add New Artist</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Genre</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($artists as $artist): ?>
            <tr>
                <td><?= $artist['id'] ?></td>
                <td><?= $artist['name'] ?></td>
                <td><?= $artist['genre'] ?></td>
                <td>
                    <a href="<?= base_url('artists/edit/' . $artist['id']) ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url('artists/delete/' . $artist['id']) ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Artists List</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Business Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($artists) && is_array($artists)): ?>
            <?php foreach ($artists as $artist): ?>
                <tr>
                    <td><?= esc($artist['artId']) ?></td>
                    <td><?= esc($artist['artBusinessName']) ?></td>
                    <td><?= esc($artist['artAddress']) ?></td>
                    <td><?= esc($artist['artContact']) ?></td>
                    <td><img src="<?= base_url('uploads/' . $artist['artPhoto']) ?>" alt="Artist Photo" width="100"></td>
                    <td>
                        <a href="<?= base_url('drilldownArtist/' . $artist['artId']) ?>" class="btn btn-primary">View Details</a>
                        <a href="<?= base_url('updateArtist/' . $artist['artId']) ?>" class="btn btn-warning">Update</a>
                        <a href="<?= base_url('deleteArtist/' . $artist['artId']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this artist?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No artists found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
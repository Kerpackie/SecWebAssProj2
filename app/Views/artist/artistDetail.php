<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Detail</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Artist Detail</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= esc($artist['artBusinessName']) ?></h5>
            <p class="card-text"><strong>Address:</strong> <?= esc($artist['artAddress']) ?></p>
            <p class="card-text"><strong>Contact:</strong> <?= esc($artist['artContact']) ?></p>
            <p class="card-text"><strong>Photo:</strong></p>
            <img src="<?= base_url('images/site/' . $artist['artPhoto']) ?>" alt="Artist Photo" width="200">
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
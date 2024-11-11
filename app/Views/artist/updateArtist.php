<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Artist</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Update Artist</h2>
    <form action="<?= base_url('updateArtist/' . $artist['artId']) ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="artBusinessName">Business Name</label>
            <input type="text" class="form-control" id="artBusinessName" name="artBusinessName" value="<?= esc($artist['artBusinessName']) ?>" required>
        </div>
        <div class="form-group">
            <label for="artAddress">Address</label>
            <input type="text" class="form-control" id="artAddress" name="artAddress" value="<?= esc($artist['artAddress']) ?>" required>
        </div>
        <div class="form-group">
            <label for="artContact">Contact</label>
            <input type="text" class="form-control" id="artContact" name="artContact" value="<?= esc($artist['artContact']) ?>" required>
        </div>
        <div class="form-group">
            <label for="artPhoto">Existing Photo</label>
            <img src="<?= base_url('uploads/' . $artist['artPhoto']) ?>" alt="Artist Photo" width="100">
        </div>
        <div class="form-group">
            <label for="artPhoto">New Photo Upload</label>
            <input type="file" class="form-control-file" id="artPhoto" name="artPhoto">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <?php if (isset($validation)) echo $validation->listErrors() ?>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
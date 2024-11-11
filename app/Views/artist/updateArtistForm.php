<form action="<?= base_url() ?>update/<?= $artist['artId'] ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="artId" value="<?= $artist['artId'] ?>">
    <div class="form-group">
        <label for="artBusinessName">Business Name</label>
        <input type="text" class="form-control" id="artBusinessName" name="artBusinessName" value="<?= $artist['artBusinessName'] ?>" required>
    </div>
    <div class="form-group">
        <label for="artAddress">Address</label>
        <input type="text" class="form-control" id="artAddress" name="artAddress" value="<?= $artist['artAddress'] ?>">
    </div>
    <div class="form-group">
        <label for="artContact">Contact</label>
        <input type="text" class="form-control" id="artContact" name="artContact" value="<?= $artist['artContact'] ?>">
    </div>
    <div class="form-group">
        <label for="artPhoto">Photo</label>
        <input type="file" class="form-control" id="artPhoto" name="artPhoto">
        <img src="/uploads/<?= $artist['artPhoto'] ?>" alt="Artist Photo" width="100">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<form action="<?= base_url() ?>/insertArtist" method="post">
    <div class="form-group">
        <label for="artBusinessName">Business Name</label>
        <input type="text" class="form-control" id="artBusinessName" name="artBusinessName" required>
    </div>
    <div class="form-group">
        <label for="artAddress">Address</label>
        <input type="text" class="form-control" id="artAddress" name="artAddress">
    </div>
    <div class="form-group">
        <label for="artContact">Contact</label>
        <input type="text" class="form-control" id="artContact" name="artContact">
    </div>
    <div class="form-group">
        <label for="artPhoto">Photo</label>
        <input type="file" class="form-control" id="artPhoto" name="artPhoto">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="container">
    <h1 class="text-center">Tambah Berita</h1>
    <form method="POST" action="<?= base_url() ?>dashboard/storeEditForm">
        <input type="hidden" class="form-control" id="id_xml" name="id_xml" aria-describedby="id_xml" value="<?= $laporan['id_xml'] ?>">
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" aria-describedby="judul" placeholder="Masukan judul..." autocomplete="off" value="<?= $laporan['judul'] ?>" required>
        </div>
        <div class=" form-group">
            <label for="judul">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"><?= $laporan['deskripsi'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="judul">Tautan</label>
            <input type="text" class="form-control" id="tautan" name="tautan" aria-describedby="tautan" autocomplete="off" placeholder="Masukan tautan..." value="<?= $laporan['tautan'] ?>" required>
        </div>
        <div class="d-flex justify-content-end">
            <a href="<?= base_url() ?>dashboard" class="btn btn-danger">Cancel</a>
            &nbsp;
            <button type="submit" class="btn btn-primary ">Submit</button>
        </div>
    </form>
</div>
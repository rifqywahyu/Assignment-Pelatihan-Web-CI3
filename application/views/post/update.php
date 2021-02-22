<div class="container">

  <div class="row mt-4">
  <div class="col-md-8">

    <?php foreach($post as $post): ?>
    <div class="card">
      <div class="card-header">
        <i class="fas fa-edit"></i> Update Jurnal
      </div>
      <div class="card-body">
      
      <form action="<?= base_url(); ?>post/prosesUpdate/<?= $post['id_post'] ?>" method="POST">
      <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" name="judul" id="judul" placeholder="Input Judul" value="<?= $post['judul'] ?>" required>
        <?= form_error('judul', '<small class="pl-3 text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="isi">Isi</label>
        <textarea class="form-control" name="isi" id="isi" placeholder="Input Isi" rows="6" required><?= $post['isi'] ?></textarea>
        <?= form_error('isi', '<small class="pl-3 text-danger">', '</small>'); ?>
      </div>
      <label for="kategori">Kategori</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <input type="radio" name="kategori" id="kategori" value="entertainment" required>
          </div>
        </div>
        <span class="input-group-text" id="">Entertainment</span> &nbsp&nbsp

        <div class="input-group-prepend">
          <div class="input-group-text">
            <input type="radio" name="kategori" id="kategori" value="health" required>
          </div>
        </div>
        <span class="input-group-text" id="">Health</span> &nbsp&nbsp

        <div class="input-group-prepend">
          <div class="input-group-text">
            <input type="radio" name="kategori" id="kategori" value="lifestyle" required>
          </div>
        </div>
        <span class="input-group-text" id="">Lifestyle</span> &nbsp&nbsp

        <div class="input-group-prepend">
          <div class="input-group-text">
            <input type="radio" name="kategori" id="kategori" value="opinion" required>
          </div>
        </div>
        <span class="input-group-text" id="">Opinion</span> &nbsp&nbsp

        <div class="input-group-prepend">
          <div class="input-group-text">
            <input type="radio" name="kategori" id="kategori" value="business" required>
          </div>
        </div>
        <span class="input-group-text" id="">Business</span>
        <?= form_error('kategori', '<small class="pl-3 text-danger">', '</small>'); ?>
      </div>

      <hr>
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="<?= base_url() ?>post" class="btn btn-secondary">Batal</a>
      </form>
      </div>
    </div>
    <?php endforeach; ?>

  </div>
  </div>

  <hr>

</div>

<div class="container" style="padding-top: 20px;">

  <?php foreach($post as $post): ?>
  <div class="card mb-3" style="max-width: 825px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?= base_url(); ?>/assets/img/<?= $post['kategori']; ?>.jpg" class="img-thumbnail" alt="photo">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?= $post['judul']; ?></h5>
          <p class="card-text">Kategori : <?= $post['kategori']; ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
  <div class="col-md-9">
    <div class="card" style="padding: 10px;">
      Isi Jurnal :
      <p><?= $post['isi'] ?></p>
    </div>
    <?php endforeach; ?>
  </div>
  </div>

  <hr>
</div>
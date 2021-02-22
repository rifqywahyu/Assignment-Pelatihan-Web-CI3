<div class="container" style="margin-top: 20px; margin-bottom: 20px;">

<span class="">
  <?= $this->session->flashdata('message'); ?>
  <?= $this->session->unset_userdata('message') ?>
</span>

<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= base_url(); ?>/assets/img/carousel_lifestyle.jpg" class="d-block w-100" alt="Lifestyle">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="stroke">Share your current lifestyle</h5>
          <p class="stroke">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= base_url(); ?>/assets/img/carousel_entertainment.jpg" class="d-block w-100" alt="Entertainment">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="stroke">Relieve your cherised moment</h5>
          <p class="stroke">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= base_url(); ?>/assets/img/carousel_business.jpg" class="d-block w-100" alt="Business">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="stroke">Talk about your business</h5>
          <p class="stroke">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>

<div class="container">
    <hr>
    <div class="row">
      <h2 style="font-family: sans-serif;">About Us</h2>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-4">
        <img src="<?= base_url(); ?>/assets/img/about.gif" alt="gif" class="img-thumbnail">
      </div>
      <div class="col">
        <p>Adalah sebuah blog sederhana yang saya buat demi kepentingan assignment web. Blog ini masih dalam tahap alpha banget dah oleh karena itu jika ada error, bug, ataupun kecelakaan lainnya mohon untuk dimaklumi. Blog ini bertujuan untuk berbagi cerita oleh sesama mahluk manusia.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>

    <hr>
    <div class="row">
      <h2 style="font-family: sans-serif;">Latest Post</h2>
    </div>
    <hr>
    <div class="row">

      <?php if (isset($posts)) : ?>
      <?php foreach ($posts as $post) : ?>

      <div class="col">
      <div class="card mb-3" style="max-width: 600px;">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="<?= base_url(); ?>/assets/img/<?= $post['kategori']; ?>.jpg" class="img-thumbnail" alt="photo">
          </div>
          <div class="col-md-7">
          <div class="card-body">
            <h5 class="card-title"> <?= $post['judul']; ?> </h5> <hr>
            <p class="card-text" style="-webkit-line-clamp:3; overflow:hidden; text-overflow:ellipsis; display: -webkit-box; -webkit-box-orient:vertical;"> <?= $post['isi']; ?> </p> 
            <a href="<?= base_url() ?>post/lihat/<?= $post['id_post'] ?>" class="btn btn-primary">Lihat &raquo;</a>
            <?php if (logged_in()) : ?>
              <a href="<?= base_url() ?>post/update/<?= $post['id_post'] ?>" class="btn btn-success">Update</a>
              <a href="<?= base_url() ?>post/hapus/<?= $post['id_post'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus Post?')">Hapus</a>
            <?php endif ?>
          </div>
          </div>
        </div>
      </div>
      </div>

      <?php endforeach; ?>
      <?php endif; ?>

    </div>
    <hr>
</div>
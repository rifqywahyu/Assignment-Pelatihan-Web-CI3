<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/ab30f42cc1.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/style.css">
  <link rel="icon" href="<?= base_url(); ?>/assets/img/icon.png">

	<title><?= $judul; ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class = "container">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url(); ?>"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
      </li>
      <form action="<?= base_url(); ?>post" method="POST" class="form-inline my-2 my-lg-0">
        <input type="hidden" value="" name="keyword">
        <button class="nav-link btn" type="submit" name="submit">Jurnal
        </button>
      </form>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>post/tambah">Tulis</a>
      </li>
    </ul>
  </div>
  <div class="col-6">
    <h2 style="color: white;">MY BLOG</h2>
  </div>
  <div>
    <?php if (logged_in()) : ?>
                <a class="btn btn-success my-2 my-sm-0 mx-3" href="<?= base_url('auth/'); ?>logout "> <i
                        class="fas fa-sign-out-alt" aria-hidden="true"
                        onclick="return confirm ('Yakin ingin logout?')"></i> Logout</a>
                <?php else : ?>
                <a class="btn btn-info my-2 my-sm-0 mx-3" href="<?= base_url('auth'); ?>"><i
                        class="fas fa-sign-in-alt" aria-hidden="true"></i> Login</a>
                <?php endif; ?>
  </div>
</div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>post/entertainment">Entertainment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>post/health">Health</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>post/lifestyle">Lifestyle</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>post/opinion">Opinion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>post/business">Business</a>
      </li>
    </ul>

</div>
</nav>

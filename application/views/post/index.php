<div class="container" style="margin-top: 20px">
	<span class="">
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->unset_userdata('message') ?>
    </span>
	<div class="row">
		<div class="col-md-12 d-flex justify-content-between">
			<h2><i class="fas fa-book"></i> Jurnal</h2>
			<form class="form-inline my-2 my-lg-0" action="<?= base_url(); ?>post" method="POST">
		      <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Cari Judul" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
		    </form>
		</div>
	</div>
	
	<hr>
	<div class="row mt-3">

		<?php if (isset($posts)) : ?>
			<?php foreach ($posts as $post) : ?>

			<div class="card mb-3" style="max-width: 900px;">
			  <div class="row no-gutters">
			    <div class="col-md-3">
			      <img src="<?= base_url(); ?>/assets/img/<?= $post['kategori']; ?>.jpg" class="img-thumbnail" alt="photo">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
					<h5 class="card-title"><?= $post['judul']; ?></h5> <hr>
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

			<?php endforeach; ?>
		<?php endif; ?>

	</div>
	<hr>
	<div class="row">
		<div class="col">
			<?= $this->pagination->create_links(); ?>
		</div>
	</div>

</div>
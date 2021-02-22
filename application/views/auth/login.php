<main class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">
                        <a href="<?= base_url() ?>" class="btn btn-info"><i class="fas fa-home"></i> Home</a>
                    </div>
                    <div class="card-body" style="padding-right: 100px; padding-left: 100px; padding-bottom: 70px; padding-top: 50px;">
                        <form action="<?= base_url(); ?>auth" method="POST">
                            <span class="">
                                <?= $this->session->flashdata('message'); ?>
                                <?= $this->session->unset_userdata('message') ?>
                            </span>
                            <h2 align="center" style="font-family: sans-serif;">LOGIN</h2> <hr>
                            
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                              </div>
                              <input type="email" class="form-control" name="email" id="email" placeholder="Email Adress" aria-label="Email Adress" aria-describedby="basic-addon1" value="<?= set_value('email'); ?>">
                            </div>
                            <?= form_error('email', '<small class="pl-3 text-danger">', '</small>'); ?>

                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                              </div>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                            </div>
                            <?= form_error('password', '<small class="pl-3 text-danger">', '</small>'); ?>

                            <div align="center">
                                <button type="submit" class="btn btn-primary">Masuk</button>
                            </div>
                        </form>
                        <div align="center">
                            <small>Belum punya akun? <a href="<?= base_url('auth/'); ?>register" class="font-weight-bold">Daftar</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

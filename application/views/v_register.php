<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="register-box text-center">

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register Pelanggan</p>

                    <?php
                    echo validation_errors('<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                ', '</div>');

                    if ($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-success alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo '<i class="fas fa-check"></i> ' . $this->session->flashdata('sukses');
                        echo '</div>';
                    }

                    echo form_open('pelanggan/register');
                    ?>
                    <div class="input-group mb-3">
                        <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" value="<?= set_value('nama_pelanggan') ?>" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="ulangi_password" class="form-control" placeholder="Ulangi Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <?= form_close() ?>
                    Sudah punya akun ? <a href="<?= base_url('pelanggan/login') ?>" class="text-center">Silahkan Login</a>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
    </div>
</div>
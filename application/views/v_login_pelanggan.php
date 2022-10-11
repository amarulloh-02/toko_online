<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="register-box text-center">

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Login Pelanggan</p>

                    <?php
                    echo validation_errors('<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                ', '</div>');

                    if ($this->session->flashdata('gagal')) {
                        echo '<div class="alert alert-danger alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo '<i class="fas fa-exclamation-triangle"></i> ' . $this->session->flashdata('gagal');
                        echo '</div>';
                    }

                    if ($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-success alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo '<i class="fas fa-check"></i> ' . $this->session->flashdata('sukses');
                        echo '</div>';
                    }

                    echo form_open('pelanggan/login');
                    ?>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>" autofocus>
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
                    <div class="row">
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <?= form_close() ?>
                    Belum punya akun ? <a href="<?= base_url('pelanggan/register') ?>" class="text-center">Silahkan Registrasi</a>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
    </div>
</div>
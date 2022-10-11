<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $title ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if ($this->session->flashdata('sukses')) {
                echo '<div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo '<i class="fas fa-check"></i> ' . $this->session->flashdata('sukses');
                echo '</div>';
            }

            echo form_open('admin/setting') ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" class="form-control"></select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kota</label>
                        <select name="kota" class="form-control">
                            <option value="<?= $setting->lokasi ?>"><?= $setting->lokasi ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Toko</label>
                        <input type="text" name="nama_toko" class="form-control" placeholder="Nama Toko" value="<?= $setting->nama_toko ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>No. Telp</label>
                        <input type="number" name="no_telp" class="form-control" placeholder="No. Telp" value="<?= $setting->no_telp ?>">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat_toko" class="form-control" placeholder="Alamat"><?= $setting->alamat_toko ?></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        <?php echo
        form_close();
        ?>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
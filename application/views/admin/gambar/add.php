<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $title ?> : <?= $barang->nama_barang ?></h3>
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
            ?>
            <?php
            echo validation_errors('<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i>', '</h5></div>');

            if (isset($error_upload)) {
                echo '<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                </button>
                <h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5></div>';
            }

            echo form_open_multipart('admin/gambar/add/' . $barang->id_barang) ?>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label>Ket. Gambar</label>
                    <input type="text" class="form-control" name="ket" placeholder="Ket. Gambar" value="<?= set_value('ket') ?>" autofocus>
                </div>
                <div class="form-group col-sm-4">
                    <label>Foto</label>
                    <input type="file" name="gambar" class="form-control" id="preview_gambar">
                </div>
                <div class="form-group col-sm-4">
                    <img src="<?= base_url('./assets/img/' . $barang->foto) ?>" width="200px" id="gambar_load" class="img img-bordered">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="<?= base_url('admin/gambar') ?>" class="btn btn-info">Back</a>
            <?php echo
            form_close();
            ?>
            <hr>
            <div class="row">
                <?php foreach ($gambar as $key => $value) { ?>
                    <div class="col-sm-3 mt-3">
                        <div class="form-group">
                            <img src="<?= base_url('./assets/gambar_barang/' . $value->gambar) ?>" width="250px" id="gambar_load" class="img" height="250px">
                        </div>
                        <p>Ket : <?= $value->ket ?></p>
                        <button class="btn btn-danger btn-block btn-xs" data-toggle="modal" data-target="#delete<?= $value->id_gambar ?>"><i class="fas fa-trash"></i></button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- Modal Hapus -->
<?php foreach ($gambar as $key => $value) : ?>

    <div class="modal fade" id="delete<?= $value->id_gambar ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->ket ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Apakah anda yakin ingin menghapus data ini ?</h4>
                    <div class="form-group text-center">
                        <img src="<?= base_url('./assets/gambar_barang/' . $value->gambar) ?>" width="250px" id="gambar_load" class="img" height="250px">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/gambar/delete/' . $value->id_barang . '/' . $value->id_gambar) ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

<?php endforeach; ?>
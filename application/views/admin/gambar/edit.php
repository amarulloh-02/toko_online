<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit <?= $title ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
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

            echo form_open_multipart('admin/barang/edit/' . $barang->id_barang) ?>
            <div class="form-group">
                <label>Nama barang</label>
                <input type="text" class="form-control" name="nama_barang" placeholder="Nama barang" value="<?= $barang->nama_barang ?>">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control">
                    <?php foreach ($kategori as $value) { ?>
                        <option value="<?= $value->id_kategori ?>" <?= ($barang->id_barang == $value->id_kategori) ? 'selected' : ''; ?>><?= $value->nama_kategori ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Harga barang</label>
                <input type="number" class="form-control" name="harga" placeholder="Harga barang" value="<?= $barang->harga ?>">
            </div>
            <div class=" form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" cols="30" placeholder="Deskripsi"><?= $barang->deskripsi ?></textarea>
            </div>
            <div class="form-group col-md-6">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control" id="preview_gambar">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <img src="<?= base_url('./assets/img/' . $barang->foto) ?>" width="200px" id="gambar_load" class="img img-bordered">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="<?= base_url('admin/barang') ?>" class="btn btn-info">Back</a>
        </div>
        <?php echo
        form_close();
        ?>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
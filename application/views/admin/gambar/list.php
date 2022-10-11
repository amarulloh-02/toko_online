<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $title ?></h3>
            <!-- /.card-tools -->
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
            <table class="table table-bordered" id="example1">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Cover</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($gambar as $key => $value) : ?>
                        <tr>
                            <td class="text-center"><?= $key + 1 ?></td>
                            <td><?= $value->nama_barang ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/img/' . $value->foto) ?>" width="100px"></td>
                            <td class="text-center"><span class="badge bg-primary">
                                    <h5><?= $value->total_gambar ?></h5>
                                </span></td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/gambar/add/' . $value->id_barang) ?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add Gambar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->


<!-- Modal Hapus -->
<!-- <?php foreach ($barang as $key => $value) : ?>

    <div class="modal fade" id="delete<?= $value->id_barang ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->nama_barang ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Apakah anda yakin ingin menghapus data ini ?</h4>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/barang/delete/' . $value->id_barang) ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php endforeach; ?> -->
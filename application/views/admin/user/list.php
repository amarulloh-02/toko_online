<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $title ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Add
                </button>
            </div>
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
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $key => $value) : ?>
                        <tr>
                            <td class="text-center"><?= $key + 1 ?></td>
                            <td><?= $value->nama_user ?></td>
                            <td><?= $value->username ?></td>
                            <td><?php
                                if ($value->level_user == 1) {
                                    echo '<span class="badge bg-primary">Admin</span>';
                                } else {
                                    echo '<span class="badge bg-success">User</span>';
                                }
                                ?></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value->id_user ?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value->id_user ?>"><i class="fas fa-trash"></i></button>
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

<!-- Modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('admin/user/add') ?>
                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class="form-control" name="nama_user" placeholder="Nama User" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select name="level_user" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <?php echo
            form_close();
            ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Edit -->
<?php foreach ($user as $key => $value) : ?>

    <div class="modal fade" id="edit<?= $value->id_user ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('admin/user/edit/' . $value->id_user) ?>
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form-control" name="nama_user" placeholder="Nama User" value="<?= $value->nama_user ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?= $value->username ?>" required>
                    </div>
                    <!-- <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?= $value->password ?>" required>
                    </div> -->
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level_user" class="form-control">
                            <option value="1" <?php if ($value->level_user == 1) {
                                                    echo 'selected';
                                                } ?>>Admin</option>
                            <option value="2" <?php if ($value->level_user == 2) {
                                                    echo 'selected';
                                                } ?>>User</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                <?php echo
                form_close();
                ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

<?php endforeach; ?>

<!-- Modal Hapus -->
<?php foreach ($user as $key => $value) : ?>

    <div class="modal fade" id="delete<?= $value->id_user ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->nama_user ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Apakah anda yakin ingin menghapus data ini ?</h4>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/user/delete/' . $value->id_user) ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

<?php endforeach; ?>
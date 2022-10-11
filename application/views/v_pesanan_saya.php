<div class="row">
    <div class="col-sm-12">
        <?php
        if ($this->session->flashdata('sukses')) {
            echo '<div class="alert alert-success alert-dismissible col-12">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo '<i class="fas fa-check"></i> ' . $this->session->flashdata('sukses');
            echo '</div>';
        }
        ?>
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Proses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Dikirim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Selesai</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <table class="table">
                            <tr>
                                <th>No. Order</th>
                                <th>Tanggal</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($belum_bayar as $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= date('d-m-Y', strtotime($value->tgl_order)) ?></td>
                                    <td>
                                        <b><?= $value->expedisi ?></b><br>
                                        Paket : <?= $value->paket ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir) ?>
                                    </td>
                                    <td>
                                        <b>Rp. <?= number_format($value->total_bayar) ?></b><br>
                                        <?php if ($value->status_bayar == 0) { ?>
                                            <span class="badge badge-warning">Belum Bayar</span>
                                        <?php } else { ?>
                                            <span class="badge badge-success">Sudah Bayar</span><br>
                                            <span class="badge badge-primary">Menunggu Verifikasi</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($value->status_bayar == 0) { ?>
                                            <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Bayar</a>
                                        <?php } else {  ?>
                                            <p>-</p>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <table class="table">
                            <tr>
                                <th>No. Order</th>
                                <th>Tanggal</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th></th>
                            </tr>
                            <?php foreach ($diproses as $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= date('d-m-Y', strtotime($value->tgl_order)) ?></td>
                                    <td>
                                        <b><?= $value->expedisi ?></b><br>
                                        Paket : <?= $value->paket ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir) ?>
                                    </td>
                                    <td>
                                        <b>Rp. <?= number_format($value->total_bayar) ?></b><br>
                                        <span class="badge badge-success">Terverifikasi</span><br>
                                        <span class="badge badge-primary">Proses/Dikemas</span>
                                    </td>
                                    <td>
                                        <!-- <?php if ($value->status_bayar == 1) { ?>
                                            <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-success"><i class="fa fa-paper-plane"></i> Kirim</a>
                                        <?php } else {  ?>
                                            <p>-</p>
                                        <?php } ?> -->
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                        <table class="table">
                            <tr>
                                <th>No. Order</th>
                                <th>Tanggal</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th>No Resi</th>
                            </tr>
                            <?php foreach ($dikirim as $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= date('d-m-Y', strtotime($value->tgl_order)) ?></td>
                                    <td>
                                        <b><?= $value->expedisi ?></b><br>
                                        Paket : <?= $value->paket ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir) ?>
                                    </td>
                                    <td>
                                        <b>Rp. <?= number_format($value->total_bayar) ?></b><br>
                                        <span class="badge badge-primary">Dikirim</span>
                                    </td>
                                    <td>
                                        <h5><?= $value->no_resi ?></h5>
                                        <button class="btn btn-success btn-xs btn-flat" data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>">Diterima</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                        <table class="table">
                            <tr>
                                <th>No. Order</th>
                                <th>Tanggal</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th>No Resi</th>
                            </tr>
                            <?php foreach ($selesai as $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= date('d-m-Y', strtotime($value->tgl_order)) ?></td>
                                    <td>
                                        <b><?= $value->expedisi ?></b><br>
                                        Paket : <?= $value->paket ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir) ?>
                                    </td>
                                    <td>
                                        <b>Rp. <?= number_format($value->total_bayar) ?></b><br>
                                        <span class="badge badge-success">Selesai</span>
                                    </td>
                                    <td>
                                        <h5><?= $value->no_resi ?></h5>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
</div>

<?php foreach ($dikirim as $value) { ?>
    <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesanan Diterima</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin pesanan sudah diterima ?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>" class="btn btn-success">Save</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>
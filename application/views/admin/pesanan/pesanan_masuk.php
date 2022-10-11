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
                <th></th>
              </tr>
              <?php foreach ($pesanan as $value) { ?>
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
                    <?php if ($value->status_bayar == 1) { ?>
                      <button class="btn btn-sm btn-success btn-flat" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Cek Bukti Bayar</button>
                      <a href=" <?= base_url('admin/pesanan_masuk/proses/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Proses</a>
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
              <?php foreach ($pesanan_diproses as $value) { ?>
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
                    <span class="badge badge-primary">Proses/Dikemas</span>
                  </td>
                  <td>
                    <?php if ($value->status_bayar == 1) { ?>
                      <a href=" <?= base_url('admin/pesanan_masuk/kirim/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>"><i class="fa fa-paper-plane"></i> Kirim</a>
                    <?php } else {  ?>
                      <p>-</p>
                    <?php } ?>
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
              <?php foreach ($pesanan_dikirim as $value) { ?>
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
              <?php foreach ($pesanan_selesai as $value) { ?>
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

  <?php foreach ($pesanan as $value) { ?>
    <div class="modal fade" id="cek<?= $value->id_transaksi ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><?= $value->no_order ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
              <tr>
                <th>Nama Bank</th>
                <th>:</th>
                <th><?= $value->nama_bank ?></th>
              </tr>
              <tr>
                <th>No. Rek</th>
                <th>:</th>
                <th><?= $value->no_rek ?></th>
              </tr>
              <tr>
                <th>Atas Nama</th>
                <th>:</th>
                <th><?= $value->atas_nama ?></th>
              </tr>
              <tr>
                <th>Total Bayar</th>
                <th>:</th>
                <th>Rp. <?= number_format($value->total_bayar) ?></th>
              </tr>
            </table>
            <img class="img-fluid pad" src="<?= base_url('assets/bukti_bayar/' . $value->bukti_bayar) ?>">
          </div>

        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  <?php } ?>

  <?php foreach ($pesanan_diproses as $value) { ?>
    <div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><?= $value->no_order ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?= form_open('admin/pesanan_masuk/kirim/' . $value->id_transaksi) ?>
            <table class="table">
              <tr>
                <th>Expedisi</th>
                <th>:</th>
                <th><?= $value->expedisi ?></th>
              </tr>
              <tr>
                <th>Paket</th>
                <th>:</th>
                <th><?= $value->paket ?></th>
              </tr>
              <tr>
                <th>Ongkir</th>
                <th>:</th>
                <th>Rp. <?= number_format($value->ongkir) ?></th>
              </tr>
              <tr>
                <th>No Resi</th>
                <th>:</th>
                <th><input type="text" name="no_resi" class="form-control" placeholder="No Resi" required></th>
              </tr>
            </table>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
          </div>
          <?=
          form_close();
          ?>

        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  <?php } ?>
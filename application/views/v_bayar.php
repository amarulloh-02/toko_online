<div class="row">
  <div class="col-sm-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">No. Rekening Toko</h3>
      </div>
      <div class="card-body">
        <p>Silahkan transfer uang ke No. Rekening Dibawah ini sebesar :
        <h1 class="text-primary">Rp. <?= number_format($pesanan->total_bayar) ?>.-</h1>
        </p>
        <table class="table">
          <tr>
            <th>Bank</th>
            <th>No. Rekening</th>
            <th>Atas Nama</th>
          </tr>
          <?php foreach ($rekening as $key => $value) { ?>
            <tr>
              <td><?= $value->nama_bank ?></td>
              <td><?= $value->no_rek ?></td>
              <td><?= $value->atas_nama ?></td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Upload Bukti Pembayaran</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php
      echo validation_errors('<div class="alert alert-danger alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       ', '</div>');
      echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi) ?>
      <div class="card-body">
        <div class="form-group">
          <label>Atas Nama</label>
          <input type="text" class="form-control" name="atas_nama" placeholder="Atas Nama" autofocus required>
        </div>
        <div class="form-group">
          <label>Nama Bank</label>
          <input type="text" class="form-control" name="nama_bank" placeholder="Nama Bank" required>
        </div>
        <div class="form-group">
          <label>No. Rekening</label>
          <input type="number" class="form-control" name="no_rek" placeholder="No. Rekening" required>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Bukti Bayar</label>
          <input type="file" class="form-control" name="bukti_bayar" required>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-primary">Back</a>
      </div>
      <?=
      form_close();
      ?>
    </div>
  </div>
</div>
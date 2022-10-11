      <!-- Main content -->
      <div class="invoice p-3 mb-4 pb-5">
          <!-- title row -->
          <div class="row">
              <div class="col-12">
                  <h4>
                      <i class="fas fa-shopping-cart"></i> Checkout
                      <small class="float-right">Date: <?= date('d/m/Y') ?></small>
                  </h4>
              </div>
              <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">

          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
              <div class="col-12 table-responsive">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>Qty</th>
                              <th>Barang</th>
                              <th>Harga</th>
                              <th>Total Harga</th>
                              <th>Berat</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $i = 1;
                            $tot_berat = 0;
                            foreach ($this->cart->contents() as $items) {
                                $barang = $this->m_home->detail_barang($items['id']);
                                $berat = $items['qty'] * $barang->berat;
                                $tot_berat = $tot_berat + $berat;
                            ?>
                              <tr>
                                  <td><?php echo $items['qty']; ?></td>
                                  <td><?php echo $items['name']; ?></td>
                                  <td>Rp. <?php echo number_format($items['price']); ?></td>
                                  <td>Rp. <?php echo number_format($items['subtotal']); ?></td>
                                  <td><?= $berat ?> gr</td>
                              </tr>

                          <?php } ?>
                      </tbody>
                  </table>
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->

          <?php
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  ', '</div>');
            ?>
          <?php
            echo form_open('belanja/checkout');
            $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
            echo $no_order;
            ?>
          <div class="row">
              <!-- accepted payments column -->
              <div class="col-sm-8 invoice-col">
                  Tujuan
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>Provinsi</label>
                              <select name="provinsi" class="form-control"></select>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>Kota/Kabupaten</label>
                              <select name="kota" class="form-control"></select>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>Expedisi</label>
                              <select name="expedisi" class="form-control"></select>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>Paket</label>
                              <select name="paket" class="form-control"></select>
                          </div>
                      </div>
                      <div class="col-sm-8">
                          <div class="form-group">
                              <label>Alamat</label>
                              <input type="text" name="alamat" class="form-control" required>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label>Kode Pos</label>
                              <input type="text" name="kode_pos" class="form-control" required>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>Nama Penerima</label>
                              <input type="text" name="nama_penerima" class="form-control" required></input>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>HP Penerima</label>
                              <input type="number" name="hp_penerima" class="form-control" required></input>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- /.col -->
              <div class="col-4">

                  <div class="table-responsive">
                      <table class="table">
                          <tr>
                              <th style="width:50%">Grand Total :</th>
                              <th>Rp. <?= number_format($this->cart->total()) ?></th>
                          </tr>
                          <tr>
                              <th>Berat :</th>
                              <th><?= $tot_berat ?> gr</th>
                          </tr>
                          <tr>
                              <th>Ongkir :</th>
                              <td><label id="ongkir"></label></td>
                          </tr>
                          <tr>
                              <th>Total Bayar :</th>
                              <td><label id="total_bayar"></label></td>
                          </tr>
                      </table>
                  </div>
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- simpan transaksi -->
          <input type="text" name="no_order" value="<?= $no_order ?>" hidden>
          <input type="text" name="estimasi" hidden>
          <input type="text" name="ongkir" hidden>
          <input type="text" name="berat" value="<?= $tot_berat ?>" hidden>
          <input type="text" name="subtotal" value="<?= $this->cart->total() ?>" hidden>
          <input type="text" name="total_bayar" hidden>
          <!-- end simpan transaksi -->

          <!-- SImpan rinci transaksi -->
          <?php
            $i = 1;
            foreach ($this->cart->contents() as $items) {
                echo form_hidden('qty' . $i++, $items['qty']);
            }
            ?>
          <!-- end simpan rinci transaksi -->
          <div class="row no-print">
              <div class="col-12">
                  <a href="<?= base_url('belanja') ?>" class="btn btn-primary"><i class="fas fa-backward"></i> Kembali</a>
                  <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Proses Checkout
                  </button>
              </div>
          </div>
          <?= form_close() ?>
      </div>
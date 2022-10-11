<div class="col-12">
  <!-- Main content -->
  <div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h4>
          <i class="fas fa-shopping-cart"></i> <?= $title ?>
          <small class="float-right">Bulan : <?= $bulan ?> Tahun : <?= $tahun ?></small>
        </h4>
      </div>
      <!-- /.col -->
    </div>
    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>No Order</th>
              <th>Tanggal</th>
              <th>Total Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            $total_bayar = 0;
            foreach ($laporan as $key => $value) {
              $total_bayar = $total_bayar + $value->total_bayar;
            ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $value->no_order ?></td>
                <td><?= $value->tgl_order ?></td>
                <td>Rp. <?= number_format($value->total_bayar) ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <h3>Grand Total : Rp. <?= number_format($total_bayar) ?></h3>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- this row will not appear when printing -->
    <div class="row no-print mt-2">
      <div class="col-12">
        <button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
      </div>
    </div>
  </div>
  <!-- /.invoice -->
</div><!-- /.col -->
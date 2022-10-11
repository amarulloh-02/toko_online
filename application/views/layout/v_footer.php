</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->




<!-- Main Footer -->
<footer class="main-footer fixed-bottom ">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Anything you want
    <?php
    $i = 1;
    $tot_berat = 0;
    foreach ($this->cart->contents() as $items) {
      $barang = $this->m_home->detail_barang($items['id']);
      $berat = $items['qty'] * $barang->berat;
      $tot_berat = $tot_berat + $berat;
    ?>
    <?php } ?>
  </div>

  <!-- Default to the left -->
  <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url('template') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('template') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('template') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('template') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('template') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('template') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('template') ?>/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('template') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        class: 'bg-success',
        icon: 'success',
        title: 'Barang berhasil ditambahkan ke keranjang'
      })
    });
  });
</script>
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
      $(this).remove();
    });
  }, 3000);
</script>

<script>
  $(document).ready(function() {
    // Provinsi
    $.ajax({
      type: "POST",
      url: "<?= base_url('admin/setting/provinsi') ?>",
      success: function(hasil_provinsi) {
        $("select[name=provinsi]").html(hasil_provinsi);
      }
    });
    // Kota
    $("select[name=provinsi]").on("change", function() {
      var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
      $.ajax({
        type: "POST",
        url: "<?= base_url('admin/setting/kota') ?>",
        data: 'id_provinsi=' + id_provinsi_terpilih,
        success: function(hasil_kota) {
          $("select[name=kota]").html(hasil_kota);
        }
      });
    });

    //Expedisi
    $("select[name=kota]").on("change", function() {
      $.ajax({
        type: "POST",
        url: "<?= base_url('admin/setting/expedisi') ?>",
        success: function(hasil_expedisi) {
          $("select[name=expedisi]").html(hasil_expedisi);
        }
      });
    });

    // Paket
    $("select[name=expedisi]").on("change", function() {
      // mendapatkan expedisi terpilih
      var expedisi_terpilih = $("select[name=expedisi]").val()
      // mendapatkan id kota tujuan terpilih
      var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
      // mengambil data ongkos kirim
      var total_berat = <?= $tot_berat ?>;

      $.ajax({
        type: "POST",
        url: "<?= base_url('admin/setting/paket') ?>",
        data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
        success: function(hasil_paket) {
          $("select[name=paket]").html(hasil_paket);
        }
      });
    });

    // ongkir
    $("select[name=paket]").on("change", function() {
      var data_ongkir = $("option:selected", this).attr('ongkir');

      var reverse = data_ongkir.toString().split('').reverse().join(''),
        ribuan_ongkir = reverse.match(/\d{1,3}/g);
      ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');

      $("#ongkir").html("Rp. " + ribuan_ongkir);

      var data_total_bayar = parseInt(data_ongkir) + parseInt(<?= $this->cart->total() ?>);

      var reverse2 = data_total_bayar.toString().split('').reverse().join(''),
        ribuan_data_total_bayar = reverse2.match(/\d{1,3}/g);
      ribuan_data_total_bayar = ribuan_data_total_bayar.join(',').split('').reverse().join('');

      $("#total_bayar").html("Rp. " + ribuan_data_total_bayar);

      var estimasi = $("option:selected", this).attr('estimasi');
      $("input[name=estimasi]").val(estimasi);
      $("input[name=ongkir]").val(data_ongkir);
      $("input[name=total_bayar]").val(data_total_bayar);
    });

  });
</script>

</body>

</html>
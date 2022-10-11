<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <?php
            if ($this->session->flashdata('sukses')) {
                echo '<div class="alert alert-success alert-dismissible col-12">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo '<i class="fas fa-check"></i> ' . $this->session->flashdata('sukses');
                echo '</div>';
            }
            ?>
            <div class="col-sm-12">

                <?php echo form_open('belanja/update'); ?>

                <table class="table" cellpadding="6" cellspacing="1" style="width:100%">
                    <tr>
                        <th width="100px">QTY</th>
                        <th>Barang</th>
                        <th style="text-align:right">Harga</th>
                        <th style="text-align:right">Berat</th>
                        <th style="text-align:right">Sub-Total</th>
                        <th style="text-align:right">Action</th>
                    </tr>

                    <?php $i = 1; ?>

                    <?php $tot_berat = 0;
                    foreach ($this->cart->contents() as $items) {
                        $barang = $this->m_home->detail_barang($items['id']);
                        $berat = $items['qty'] * $barang->berat;
                        $tot_berat = $tot_berat + $berat;

                    ?>

                        <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

                        <tr>
                            <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5', 'type' => 'number', 'class' => 'form-control', 'min' => '0')); ?></td>
                            <td><?php echo $items['name']; ?></td>
                            <td style="text-align:right">Rp. <?php echo number_format($items['price']); ?></td>
                            <td style="text-align:right"><?= $berat ?> gr</td>
                            <td style="text-align:right">Rp. <?php echo number_format($items['subtotal']); ?></td>
                            <td class="text-center"><a href="<?= base_url('belanja/delete/' . $items['rowid']) ?>" onclick="return confirm('Yakin ingin hapus data ini ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                        </tr>

                        <?php $i++; ?>

                    <?php } ?>

                    <tr>
                        <td class="right">
                            <h3>Total :</h3>
                        </td>
                        <td class="right">
                            <h3>Rp. <?php echo number_format($this->cart->total()); ?></h3>
                        </td>
                        <td class="right">
                            <h3>Total Berat : <?= $tot_berat ?> gr</h3>
                        </td>
                    </tr>

                </table>

                <button type="submit" class="btn btn-primary btn-flat mb-4"><i class="fa fa-save"></i> Update Cart</button>
                <a href="<?= base_url('belanja/checkout') ?>" class="btn btn-success btn-flat mb-4"><i class="fa fa-check-square"></i> Checkout</a>
                <a href="<?= base_url('belanja/clear') ?>" class="btn btn-warning btn-flat mb-4" onclick="return confirm('Yakin ingin menghapus semua data ?')"><i class="fa fa-recycle"></i> Clear Cart</a>
                <?= form_close() ?>

            </div>
        </div>
    </div>
</div>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img class="d-block w-100" src="<?php echo base_url('assets/slider/slider1.jpg') ?>" alt="First slide">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="<?php echo base_url('assets/slider/slider2.jpg') ?>" alt="Second slide">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="<?php echo base_url('assets/slider/slider3.jpg') ?>" alt="Third slide">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="<?php echo base_url('assets/slider/slider4.jpg') ?>" alt="Third slide">
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<div class="card card-solid">
	<div class="card-body">
		<div class="row">

			<?php foreach ($barang as $b) : ?>

				<div class="col-sm-4">
					<?php
					echo form_open(base_url('belanja/add'));
					echo form_hidden('id', $b->id_barang);
					echo form_hidden('qty', 1);
					echo form_hidden('price', $b->harga);
					echo form_hidden('name', $b->nama_barang);
					echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
					?>
					<div class="card bg-light">
						<div class="card-header text-muted border-bottom-0">
							<h2 class="lead"><b><?= character_limiter($b->nama_barang, 25) ?></b></h2>
							<p class="text-muted text-sm"><b>Kategori: </b> <?= $b->nama_kategori ?> </p>
						</div>
						<div class="card-body pt-0">
							<div class="row">
								<div class="col-12 text-center">
									<img src="<?php echo base_url('./assets/img/' . $b->foto) ?>" width="300px" height="300px">
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-sm-6">
									<div class="text-left">
										<h5><span class="badge bg-info">Rp: <?= number_format($b->harga) ?></span></h5>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="text-right">
										<a href="<?= base_url('home/detail_barang/' . $b->id_barang) ?>" class="btn btn-sm bg-primary">
											<i class="fas fa-eye"></i>
										</a>
										<button type="submit" class="btn btn-sm bg-teal swalDefaultSuccess">
											<i class="fas fa-cart-plus"></i> Add
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?= form_close() ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php
$page = 'rencana_produksi';
include 'header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">

		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">

				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">TOTAL</span>
							<span class="info-box-number"><?= $jumlah ?> pcs</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>

				<!-- /.col -->
			</div>
			<!-- /.row -->


			<!-- /.row -->
		</div>
		<!--/. container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-edit"></i>
								Data Rencana Produksi
							</h3>
						</div>
						<div class="card-body">

							<table id="example6" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="10%">No.</th>
										<th>Nama Produk</th>
										<th>Jumlah</th>
										<th>Status</th>

									</tr>
								</thead>
								<tbody>
									<?php
															$no = 1;

															foreach ($produksi as $rp) { ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $rp['nama_produk'] ?></td>
											<td><?= $rp['jumlah'] ?></td>
											<td><span class="badge bg-primary"><?= strtoupper($rp['status']); ?></span></td>
										</tr>
									<?php

																				$no++;
																			} ?>
								</tbody>
							</table>
						</div>
						<!-- /.card -->
					</div>
				</div>
				<!-- /.col -->
			</div>
			<!-- ./row -->
		</div><!-- /.container-fluid -->
		<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#bahanbaku" style="margin-right: 5px;"><i class="far fa-credit-product"></i>
			Mulai Produksi
		</button>
	</section>
</div>
<!-- /.content-wrapper -->
<!-- /.modal -->
<div class="modal fade" id="bahanbaku">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Bahan Baku</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<table id="example6" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">No.</th>
							<th width="40%">Nama Produk</th>
							<th width="25%">Stok</th>
							<th width="25%">Kebutuhan</th>

						</tr>
					</thead>
					<tbody>
						<?php
																			$no = 1;
																			foreach ($bahan as $bahan) { ?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $bahan['nama_bahan'] ?></td>
								<td><?= $bahan['stok'] ?></td>
								<td><input type="number" placeholder="0" class="form-control" min="0" max="<?= $bahan['stok'] ?>"></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>


		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.control-sidebar -->
<?php include 'footer.php'; ?>

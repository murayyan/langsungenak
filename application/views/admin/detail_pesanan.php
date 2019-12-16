<?php
$page = 'pesanan';
include 'header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Pesanan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Invoice</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					<!-- Main content -->
					<div class="invoice p-3 mb-3">
						<!-- title row -->
						<div class="row">
							<div class="col-12">
								<h4>
									<?= sprintf("#INV%05s", $pesanan['id']) ?>
									<small class="float-right">Date: 2/10/2014</small>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								<address>
									<b>Status Pesanan:</b>
									<?php if ($pesanan['status'] == 'Menunggu Konfirmasi') { ?><span class="badge bg-warning"><?= $pesanan['status'] ?></span><br>
									<?php } else if ($pesanan['status'] == 'Belum Diproduksi') { ?><span class="badge bg-primary"><?= $pesanan['status'] ?></span><br>
									<?php } else if ($pesanan['status'] == 'Produksi') { ?><span class="badge bg-info"><?= $pesanan['status'] ?></span><br>
									<?php } else if ($pesanan['status'] == 'Terkirim') { ?><span class="badge bg-success"><?= $pesanan['status'] ?></span><br>


									<?php } ?>
									<b>Nama:</b> <?= $pesanan['nama'] ?><br>
									<b>Alamat:</b> <?= $pesanan['alamat'] ?><br>
									<b>No. Hp:</b> <?= $pesanan['no_hp'] ?><br>
									<b>Email:</b> <?= $pesanan['email'] ?><br>

								</address>
							</div>

							<!-- /.col -->
							<div class="col-sm-4 invoice-col">

								<br>
								<b>Waktu Pesan:</b> 4F3S8J<br>
								<b>Waktu Kirim:</b> 2/22/2014<br>

							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- Table row -->
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>No.</th>
											<th>Produk</th>
											<th>Jumlah</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1;
										foreach ($detail as $detail) { ?>
											<tr>
												<td><?= $i ?></td>
												<td><?= $detail['nama_produk'] ?></td>
												<td><?= $detail['jumlah'] ?></td>
												<td>Rp <?= number_format($detail['total_harga'], 0, ',', '.') ?></td>

											</tr>
										<?php $i++;
										} ?>
									</tbody>
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<div class="row">
							<!-- accepted payments column -->
							<div class="col-6">

							</div>
							<!-- /.col -->
							<div class="col-6">
								<div class="table-responsive">
									<table class="table">
										<tr>
											<th style="width:50%">Subtotal:</th>
											<td>Rp <?= number_format($pesanan['total_harga'], 0, ',', '.') ?></td>
										</tr>

									</table>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<div class="row">
							<!-- accepted payments column -->

							<!-- /.col -->
							<div class="col-6">
								<div class="table-responsive">
									<table class="table">
										<tr>
											<th style="width:50%">Bukti Pembayaran:</th>
											<td>
												<div class="filter-container p-0 row">
													<div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
														<a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white">
															<img src="https://via.placeholder.com/300/FFFFFF?text=1" class="img-fluid mb-2" alt="white sample" />
														</a>
													</div>
												</div>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- this row will not appear when printing -->
						<div class="row no-print">
							<div class="col-12">
								<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
								<button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
									Payment
								</button>
								<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
									<i class="fas fa-download"></i> Generate PDF
								</button>
							</div>
						</div>
					</div>
					<!-- /.invoice -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<?php include 'footer.php'; ?>

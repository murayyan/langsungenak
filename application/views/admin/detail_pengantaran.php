<?php
$page = 'jadwal_antar';
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
									<?= sprintf("#INV%05s", $pesanan['id_pesanan']) ?>
									<small class="float-right"><?= $pesanan['waktu_pesan'] ?></small>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								<address>
									<b>Status Pesanan:</b>
									<?php if ($pesanan['status'] == 'Belum Dikirim') { ?><span class="badge bg-warning"><?= $pesanan['status'] ?></span><br>
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
								<b>Waktu Pesan:</b> <?= $pesanan['waktu_pesan'] ?><br>
								<b>Waktu Kirim:</b> <?= $pesanan['waktu_kirim'] ?><br>

							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->


						<!-- Table row -->
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped" width="100%">
									<thead>
										<?php if ($pesanan['status'] == 'Produksi') { ?>
											<tr>
												<th width="10%">No.</th>
												<th width="30%">Produk</th>
												<th width="20%">Jumlah</th>
												<th width="15%">Stok</th>
												<th width="25%">Subtotal</th>
											</tr>
										<?php } else { ?>
											<tr>
												<th width="10%">No.</th>
												<th width="40%">Produk</th>
												<th width="25%">Jumlah</th>
												<th width="25%">Subtotal</th>
											</tr>
										<?php } ?>
									</thead>
									<tbody>
										<?php $i = 1;
																																$ready = true;
																																foreach ($detail as $detail1) { ?>
											<tr>
												<td><?= $i ?></td>
												<td><?= $detail1['nama_produk'] ?></td>
												<td><?= $detail1['jumlah'] ?></td>
												<?php if ($pesanan['status'] == 'Produksi') { ?>
													<td><?php if ($detail1['stok'] >= $detail1['jumlah']) {
																																			$ready = true; ?>
															<span class="badge bg-success">READY</span>
														<?php } else {
																																			$ready = false; ?>
															<span class="badge bg-danger">NOT READY</span>
														<?php } ?>
													</td>
												<?php } ?>
												<td>Rp <?= number_format($detail1['total_harga'], 0, ',', '.') ?></td>

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
										</tr>
										<tr>
											<td style="width: 50%">
												<img src="<?= base_url('assets/images/bukti/' . $bayar['file']) ?>" class="img-fluid mb-2" alt="white sample" />
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
								
								<?php if ($pesanan['status'] == 'Belum Dikirim') {  ?>
                                    <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#sudahAntar" onclick="konfirmasi('<?= $pesanan['id_pesanan'] ?>', '<?= $pesanan['nama'] ?>')">
                                        Sudah diantar
                                    </button>
								<?php } ?>

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


<!-- modal -->
<div class="modal fade" id="sudahAntar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Konfirmasi antar</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>

			<form action="<?= base_url('admin/pengantaran/updateStatus') ?>" method="post">
				<div class="modal-body">
					<p id="kalimatAntar"></p>
					<input type="hidden" name="id" id="idPesan">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-success">Ya, Sudah diantar</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.control-sidebar -->
<script>
	function konfirmasi(id, nama) {
		document.getElementById('idPesan').value = id
		document.getElementById("kalimatAntar").innerHTML = "Apakah pesanan \"" + nama + "\" sudah diantar ?"
	}
</script>
<?php include 'footer.php'; ?>

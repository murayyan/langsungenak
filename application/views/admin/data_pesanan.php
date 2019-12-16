<?php
$page = 'pesanan';
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

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-edit"></i>
								Data Pesanan
							</h3>
						</div>
						<div class="card-body">
							<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Menunggu Konfirmasi Pembayaran</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Belum Diproduksi</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Sedang Diproduksi</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">Selesai</a>
								</li>
							</ul>
							<div class="tab-content" id="custom-content-below-tabContent">
								<div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Customer</th>
												<th>Waktu Pesan</th>
												<th>Waktu Kirim</th>
												<th>Jumlah</th>
												<th>Total Harga</th>
												<th>Status Pembayaran</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($pesanan1 as $pesanan1) { ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $pesanan1['nama'] ?></td>
													<td><?= tanggal($pesanan1['waktu_pesan']) ?></td>
													<td><?= tanggal($pesanan1['waktu_kirim']) ?></td>
													<td align="center"><?= $pesanan1['jumlah'] ?></td>
													<td>Rp <?= number_format($pesanan1['total_harga'], 0, ',', '.') ?></td>
													<td><span class="badge bg-warning"><?= $pesanan1['status'] ?></span></td>
													<td> <a href="<?= base_url('admin/pesanan/' . $pesanan1['id']) ?>" class="btn btn-sm btn-success">Detail</a></td>
												</tr>
											<?php $no++;
											} ?>
											</tfoot>
									</table>
								</div>
								<div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
									<table id="example2" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Customer</th>
												<th>Waktu Pesan</th>
												<th>Waktu Kirim</th>
												<th>Jumlah</th>
												<th>Total Harga</th>
												<th>Status Pembayaran</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($pesanan2 as $pesanan2) { ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $pesanan2['nama'] ?></td>
													<td><?= tanggal($pesanan2['waktu_pesan']) ?></td>
													<td><?= tanggal($pesanan2['waktu_kirim']) ?></td>
													<td align="center"><?= $pesanan2['jumlah'] ?></td>
													<td>Rp <?= number_format($pesanan2['total_harga'], 0, ',', '.') ?></td>
													<td><span class="badge bg-primary"><?= $pesanan2['status'] ?></span></td>
													<td> <a href="<?= base_url('admin/pesanan/' . $pesanan2['id']) ?>" class="btn btn-sm btn-success">Detail</a></td>
												</tr>
											<?php $no++;
											} ?>
											</tfoot>
									</table>
								</div>
								<div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
									<table id="example3" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Customer</th>
												<th>Waktu Pesan</th>
												<th>Waktu Kirim</th>
												<th>Jumlah</th>
												<th>Total Harga</th>
												<th>Status Pembayaran</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($pesanan3 as $pesanan3) { ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $pesanan3['nama'] ?></td>
													<td><?= tanggal($pesanan3['waktu_pesan']) ?></td>
													<td><?= tanggal($pesanan3['waktu_kirim']) ?></td>
													<td align="center"><?= $pesanan3['jumlah'] ?></td>
													<td>Rp <?= number_format($pesanan3['total_harga'], 0, ',', '.') ?></td>
													<td><span class="badge bg-info"><?= $pesanan3['status'] ?></span></td>
													<td> <a href="<?= base_url('admin/pesanan/' . $pesanan3['id']) ?>" class="btn btn-sm btn-success">Detail</a></td>
												</tr>
											<?php $no++;
											} ?>
											</tfoot>
									</table>
								</div>
								<div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
									<table id="example4" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Customer</th>
												<th>Waktu Pesan</th>
												<th>Waktu Kirim</th>
												<th>Jumlah</th>
												<th>Total Harga</th>
												<th>Status Pembayaran</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($pesanan4 as $pesanan4) { ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $pesanan4['nama'] ?></td>
													<td><?= tanggal($pesanan4['waktu_pesan']) ?></td>
													<td><?= tanggal($pesanan4['waktu_kirim']) ?></td>
													<td align="center"><?= $pesanan4['jumlah'] ?></td>
													<td>Rp <?= number_format($pesanan4['total_harga'], 0, ',', '.') ?></td>
													<td><span class="badge bg-success"><?= $pesanan4['status'] ?></span></td>
													<td> <a href="<?= base_url('admin/pesanan/' . $pesanan4['id']) ?>" class="btn btn-sm btn-success">Detail</a></td>
												</tr>
											<?php $no++;
											} ?>
											</tfoot>
									</table>
								</div>
							</div>
							<?= $this->session->flashdata('message') ?>

						</div>
						<!-- /.card -->
					</div>
				</div>
				<!-- /.col -->
			</div>
			<!-- ./row -->
		</div><!-- /.container-fluid -->
	</section>
</div>
<!-- /.content-wrapper -->

<!-- /.control-sidebar -->
<?php include 'footer.php'; ?>
<!-- <script>
	$(function() {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
		});
	});
</script> -->

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
											foreach ($order1 as $order1) { ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $order1['nama'] ?></td>
													<td><?= tanggal($order1['waktu_pesan']) ?></td>
													<td><?= tanggal($order1['waktu_kirim']) ?></td>
													<td align="center"><?= $order1['jumlah'] ?></td>
													<td>Rp <?= number_format($order1['total_harga'], 0, ',', '.') ?></td>
													<td><span class="badge bg-warning"><?= $order1['status'] ?></span></td>
													<td> <a href="<?= base_url('admin/pesanan/' . $order1['id']) ?>" class="btn btn-sm btn-success">Detail</a></td>
												</tr>
											<?php $no++;
											} ?>
											</tfoot>
									</table>
								</div>
								<div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
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
											foreach ($order2 as $order2) { ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $order2['nama'] ?></td>
													<td><?= tanggal($order2['waktu_pesan']) ?></td>
													<td><?= tanggal($order2['waktu_kirim']) ?></td>
													<td align="center"><?= $order2['jumlah'] ?></td>
													<td>Rp <?= number_format($order2['total_harga'], 0, ',', '.') ?></td>
													<td><span class="badge bg-primary"><?= $order2['status'] ?></span></td>
													<td> <a href="<?= base_url('admin/pesanan/' . $order2['id']) ?>" class="btn btn-sm btn-success">Detail</a></td>
												</tr>
											<?php $no++;
											} ?>
											</tfoot>
									</table>
								</div>
								<div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
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
											foreach ($order3 as $order3) { ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $order3['nama'] ?></td>
													<td><?= tanggal($order3['waktu_pesan']) ?></td>
													<td><?= tanggal($order3['waktu_kirim']) ?></td>
													<td align="center"><?= $order3['jumlah'] ?></td>
													<td>Rp <?= number_format($order3['total_harga'], 0, ',', '.') ?></td>
													<td><span class="badge bg-info"><?= $order3['status'] ?></span></td>
													<td> <a href="<?= base_url('admin/pesanan/' . $order3['id']) ?>" class="btn btn-sm btn-success">Detail</a></td>
												</tr>
											<?php $no++;
											} ?>
											</tfoot>
									</table>
								</div>
								<div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
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
											foreach ($order4 as $order4) { ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $order4['nama'] ?></td>
													<td><?= tanggal($order4['waktu_pesan']) ?></td>
													<td><?= tanggal($order4['waktu_kirim']) ?></td>
													<td align="center"><?= $order4['jumlah'] ?></td>
													<td>Rp <?= number_format($order4['total_harga'], 0, ',', '.') ?></td>
													<td><span class="badge bg-success"><?= $order4['status'] ?></span></td>
													<td> <a href="<?= base_url('admin/pesanan/' . $order4['id']) ?>" class="btn btn-sm btn-success">Detail</a></td>
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

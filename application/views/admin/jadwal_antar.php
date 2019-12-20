<?php
$page = 'jadwal_antar';
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
								Jadwal Pengantaran
							</h3>
						</div>
						<div class="card-body">
							<?= $this->session->flashdata('message') ?>
							<!-- <a href="<?= base_url('admin/produk') ?>" class="btn btn-success swalDefaultSuccess mb-3">
								<i class="fa fa-plus"></i> Tambah Produk
							</a> -->
							<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Menunggu Konfirmasi Pembayaran</a>
								</li>
							
								<li class="nav-item">
									<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Belum Diproduksi</a>
								</li>
							</ul>
							<div class="tab-content" id="custom-content-below-tabContent">
								<div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Pemesan</th>
												<th>Alamat</th>
												<th>No. Telepon</th>
												<th>Waktu Antar</th>
												<?php if ($this->session->userdata('level') == 'KURIR') { ?>
												<th></th>
												<?php } ?>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($jadwal as $jadwal) { ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $jadwal['nama'] ?></td>
													<td><?= $jadwal['alamat'] ?></td>
													<td><?= $jadwal['no_hp'] ?></td>
													<td><?= $jadwal['waktu_pengantaran'] ?></td>
													<?php if ($this->session->userdata('level') == 'KURIR') { ?>
													<td>
														<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#sudahAntar" onclick="konfirmasi(<?= $jadwal['id_pesanan'] ?>, '<?= $jadwal['nama'] ?>')">
															Sudah diantar
														</button>
													</td>
													<?php } ?>
												</tr>
											<?php $no++;
											} ?>
										</tbody>
									</table>
								</div>
								
								<div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
									<table id="example2" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Pemesan</th>
												<th>Alamat</th>
												<th>No. Telepon</th>
												<th>Waktu Antar</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($jadwalTerkirim as $jadwalTerkirim) { ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $jadwalTerkirim['nama'] ?></td>
													<td><?= $jadwalTerkirim['alamat'] ?></td>
													<td><?= $jadwalTerkirim['no_hp'] ?></td>
													<td><?= $jadwalTerkirim['waktu_pengantaran'] ?></td>
												</tr>
											<?php $no++;
											} ?>
										</tbody>
									</table>
								</div>
							</div>
							
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
<!-- modal -->
<div class="modal fade" id="sudahAntar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Sudah diantar</h4>
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

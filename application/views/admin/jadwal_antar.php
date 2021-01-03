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
									<a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Belum Diantar</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Sudah Diantar</a>
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
															<a href="<?= base_url('admin/jadwal_pengantaran/detail/' . $jadwal['id_pesanan']) ?>" class="btn btn-sm btn-primary">Detail</a>
															<!-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#sudahAntar" onclick="konfirmasi('<?= $jadwal['id_pesanan'] ?>', '<?= $jadwal['nama'] ?>')">
																Sudah diantar
															</button> -->
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

<?php include 'footer.php'; ?>

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
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Pemesan</th>
										<th>Alamat</th>
										<th>No. Telepon</th>
										<th>Waktu Antar</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($jadwal as $jadwal) { ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $jadwal['nama_produk'] ?></td>
											<td><?= $jadwal['kategori'] ?></td>
											<td><?= $jadwal['harga'] ?></td>
											<td><?= $jadwal['harga'] ?></td>
											<td>
												<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusProduk" onclick="konfirmasi(<?= $jadwal['id'] ?>, '<?= $jadwal['nama_produk'] ?>')">
													<i class="fa fa-trash"></i> Sudah diantar
												</button>
											</td>
										</tr>
									<?php $no++;
									} ?>
									</tfoot>
							</table>
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
					<input type="hidden" name="id" id="idAntar">
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
		document.getElementById('idAntar').value = id
		document.getElementById("kalimatAntar").innerHTML = "Apakah pesanan \"" + nama + "\" sudah diantar ?"
	}
</script>
<?php include 'footer.php'; ?>

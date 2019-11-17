<?php
$page = 'produk';
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
								Data Produk
							</h3>
						</div>
						<div class="card-body">
							<?= $this->session->flashdata('message') ?>
							<a href="<?= base_url('admin/produk') ?>" class="btn btn-success swalDefaultSuccess mb-3">
								<i class="fa fa-plus"></i> Tambah Produk
							</a>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Produk</th>
										<th>Kategori</th>
										<th>Harga</th>
										<th>Foto</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($produk as $produk) { ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $produk['nama_produk'] ?></td>
											<td><?= $produk['kategori'] ?></td>
											<td><?= $produk['harga'] ?></td>
											<td>
												<div class="popup-foto">
													<a href="<?= base_url('assets/images/gambar_produk/' . $produk['gambar']) ?>"><img height="50" src="<?= base_url('assets/images/gambar_produk/' . $produk['gambar']) ?>"></a>
												</div>
											</td>
											<td>
												<a href="<?= base_url('admin/produk/' . $produk['id']) ?>" class="btn btn-sm btn-success">Edit</a>
												<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusProduk" onclick="deleteData(<?= $produk['id'] ?>, '<?= $produk['nama_produk'] ?>')">
													<i class="fa fa-trash"></i> Delete
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
<div class="modal fade" id="hapusProduk">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Hapus Produk</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>

			<form action="<?= base_url('admin/produk/deleteProduk') ?>" method="post">
				<div class="modal-body">
					<p id="kalimatHapus"></p>
					<input type="hidden" name="id" id="idHapus">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-danger">Delete</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.control-sidebar -->
<?php include 'footer.php'; ?>

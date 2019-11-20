<?php
$page = 'bahan';
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
								Data Bahan Baku
							</h3>
						</div>
						<div class="card-body">
							<?= $this->session->flashdata('message') ?>
                            <button class="btn btn-success swalDefaultSuccess mb-3" data-toggle="modal" data-target="#tambahBahan">
                                <i class="fa fa-plus"></i> Tambah Bahan Baku
                            </button>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Bahan Baku</th>
										<th>Kategori</th>
										<th>Stok</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($bahan as $bahan) { ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $bahan['nama_bahan'] ?></td>
											<td><?= $bahan['kategori'] ?></td>
											<td><?= $bahan['stok'] ?></td>
											<td>
												<!-- <a href="<?= base_url('admin/bahanbaku/' . $bahan['id']) ?>" class="btn btn-sm btn-success">Edit</a> -->
												<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#editBahan" onclick="editData(<?= $bahan['id'] ?>, '<?= $bahan['nama_bahan'] ?>', '<?= $bahan['kategori'] ?>', '<?= $bahan['stok'] ?>')">
												Edit</button>
												<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusBahan" onclick="deleteData(<?= $bahan['id'] ?>, '<?= $bahan['nama_bahan'] ?>')">
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
<div class="modal fade" id="tambahBahan">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Bahan Baku</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>

			<form action="<?= base_url('admin/bahanbaku/tambahBahan') ?>" method="post">
				<div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                        <!-- text input -->
                            <div class="form-group">
                                <label for="namaProduk">Nama Bahan</label>
                                <input type="text" class="form-control" name="nama_bahan" placeholder="Nama Bahan Baku" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" class="form-control select2" style="width: 100%;" required>
                                    <option disabled selected value>--- Pilih Kategori ---</option>
                                    <option value="Roti Gal">Roti Gal</option>
                                    <option value="Roti Boy">Roti Boy</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="harga">Stok</label>
                                <input type="number" class="form-control" name="stok" min="0" placeholder="Stok" required>
                            </div>
                        </div>
                    </div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal -->
<div class="modal fade" id="editBahan">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Bahan Baku</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>

			<form action="<?= base_url('admin/bahanbaku/updateBahan') ?>" method="post">
				<input type="hidden" id="idEdit" name="id">
				<div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                        <!-- text input -->
                            <div class="form-group">
                                <label for="namaProduk">Nama Bahan</label>
                                <input type="text" class="form-control" id="namaEdit" name="nama_bahan" placeholder="Nama Bahan Baku" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" class="form-control select2" style="width: 100%;" id="kategoriEdit" required>
                                    <option disabled selected value>--- Pilih Kategori ---</option>
                                    <option value="Roti Gal">Roti Gal</option>
                                    <option value="Roti Boy">Roti Boy</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="harga">Stok</label>
                                <input type="number" class="form-control" id="stokEdit" name="stok" min="0" placeholder="Stok" required>
                            </div>
                        </div>
                    </div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal -->
<div class="modal fade" id="hapusBahan">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Hapus Bahan Baku</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>

			<form action="<?= base_url('admin/bahanbaku/deleteBahan') ?>" method="post">
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

<script>
	function editData(id, nama, kategori, stok) {
		document.getElementById('idEdit').value = id
		document.getElementById("namaEdit").value = nama
		document.getElementById("kategoriEdit").value = kategori
		document.getElementById("stokEdit").value = stok
	}
</script>

<?php include 'footer.php'; ?>
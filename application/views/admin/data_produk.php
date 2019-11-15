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
              <?= $this->session->flashdata('message')?>
              <a href="<?= base_url('admin/add_produk')?>" class="btn btn-success swalDefaultSuccess mb-3">
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
                  foreach ($produk as $produk) {?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $produk['nama_produk'] ?></td>
                    <td><?= $produk['kategori'] ?></td>
                    <td><?= $produk['harga'] ?></td>
                    <td>
                      <div class="popup-foto">
                        <a href="<?= base_url('assets/images/gambar_produk/'.$produk['gambar']) ?>"><img style="height: 250px" src="<?= base_url('assets/images/gambar_produk/'.$produk['gambar']) ?>" ></a>
                      </div>
                    </td>
                    <td>
                      <a href="<?= base_url('admin/edit_produk/'.$produk['id'])?>" class="btn btn-sm btn-success">Edit</a>
                      <a href="" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  <?php $no++; } ?>
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

  <!-- /.control-sidebar -->
  <?php include 'footer.php';?>


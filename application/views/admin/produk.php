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
                  Tambah Produk
                </h3>
              </div>
              <form action="<?= base_url('admin/add_produk')?>" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                        <!-- text input -->
                            <div class="form-group">
                                <label for="namaProduk">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk" value="<?= set_value('nama_produk')?>" placeholder="Nama Produk">
                                <?= form_error('nama_produk', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <select name="akses" class="form-control select2" style="width: 100%;">
                                    <option value="SPV">SPV</option>
                                    <option value="PRODUKSI">Admin Produksi</option>
                                    <option value="KURIR">Kurir</option>
                                </select>
                                <?= form_error('akses', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= set_value('email')?>" placeholder="Email">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No. Hp</label>
                                <input type="text" class="form-control" name="nohp" value="<?= set_value('nohp')?>" placeholder="No. HP">
                                <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        <!-- text input -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password">
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                    </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer pull-right">
                  <button type="submit" class="btn btn-primary float-right ml-2">Register</button>
              </form>
                </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->
      </div><!-- /.container-fluid -->
    </section>
 
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->
  <?php include 'footer.php';?>


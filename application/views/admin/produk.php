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
              <form action="<?= base_url('admin/add_produk')?>" method="post" enctype="multipart/form-data">
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
                                <label for="kategori">Kategori</label>
                                <select name="kategori" class="form-control select2" style="width: 100%;">
                                    <option disabled selected value>--- Pilih Kategori ---</option>
                                    <option value="Roti Gal" <?= (set_value('kategori') == 'Roti Gal') ? 'selected' : '' ?>>Roti Gal</option>
                                    <option value="Roti Boy" <?= (set_value('kategori') == 'Roti Boy') ? 'selected' : '' ?>>Roti Boy</option>
                                </select>
                                <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" placeholder="Deskripsi"><?= set_value('deskripsi')?></textarea>
                                <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" name="harga" value="<?= set_value('harga')?>" placeholder="Harga">
                                <?= form_error('harga', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        <!-- text input -->
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control" name="gambar" value="<?= set_value('gambar') ?>" required>
                                <?= $this->session->flashdata('gambar_error')?>
                            </div>
                        </div>
                    </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer pull-right">
                  <button type="submit" class="btn btn-primary float-right ml-2">Simpan Produk</button>
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


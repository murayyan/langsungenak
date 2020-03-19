<?php 
$page = 'input_retur';
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
                  <i class="fas fa-edit mr-1"></i> Input Roti Retur
                </h3>
              </div>
              <div class="card-body">
                <?= $this->session->flashdata('message') ?>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Customer</th>
                      <th>Alamat</th>
                      <th>No Telepon</th>
                      <th>Waktu Pengiriman</th>
                      <th>Jumlah Retur</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($retur as $retur) { ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $retur['nama'] ?></td>
                        <td><?= $retur['alamat'] ?></td>
                        <td><?= $retur['no_hp'] ?></td>
                        <td><?= $retur['waktu_kirim'] ?></td>
                        <td><?= $retur['jumlah_retur'] ?></td>
                        <td>
                          <!-- <a href="<?= base_url('admin/returbaku/' . $retur['id']) ?>" class="btn btn-sm btn-success">Edit</a> -->
                          <!-- <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#editretur" onclick="editData('<?= $retur['id'] ?>', '<?= $retur['nama_retur'] ?>', '<?= $retur['stok'] ?>')">
                            Edit</button> -->
                          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editretur" >
                            Input Retur</button>
                          <!-- <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusretur" onclick="deleteData('<?= $retur['id'] ?>', '<?= $retur['nama_retur'] ?>')">
                            <i class="fa fa-trash"></i> Delete
                          </button> -->
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
    <!-- End Main content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->
  <?php include 'footer.php';?>
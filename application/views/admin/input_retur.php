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
                        <td><?= ($retur['jumlah_retur'] == NULL) ? '-' : $retur['jumlah_retur']  ?></td>
                        <td>
                          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#inputRetur" onclick="inputRetur('<?= $retur['id'] ?>', '<?= $retur['customer'] ?>', '<?= $retur['jumlah'] ?>')">
                            Input Retur</button>
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

  <!-- modal -->
  <div class="modal fade" id="inputRetur">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Input Retur</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>

        <form action="<?= base_url('admin/pengantaran/updateRetur') ?>" method="post">
          <input type="hidden" id="idPesanan" name="idPesanan">
          <input type="hidden" id="idCust" name="idCust">
          <input type="hidden" id="jumlahPesan" name="jumlahPesan">
          <div class="modal-body">
            <div class="form-group">
              <div class="row">
                <label class="col-sm-4" for="harga">Jumlah Retur</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="jumlahRetur" name="jumlahRetur" min="0" value="0" required>
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

  <!-- /.control-sidebar -->
  <script>
    function inputRetur(idPesan, idCust, jumlah) {
      document.getElementById('idPesanan').value = idPesan
      document.getElementById('idCust').value = idCust
      document.getElementById("jumlahPesan").value = jumlah
    }
  </script>
  <?php include 'footer.php';?>
<?php 
$page = 'pesanan';
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
                  Data Pesanan
                </h3>
              </div>
              <div class="card-body">
              <?= $this->session->flashdata('message')?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Customer</th>
                    <th>Waktu Pesan</th>
                    <th>Waktu Kirim</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Status Pembayaran</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  foreach ($order as $order) {?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $order['customer'] ?></td>
                    <td><?= $order['waktu_pesan'] ?></td>
                    <td><?= $order['waktu_kirim'] ?></td>
                    <td><?= $order['jumlah'] ?></td>
                    <td><?= $order['total_harga'] ?></td>
                    <td><?= $order['status'] ?></td>
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


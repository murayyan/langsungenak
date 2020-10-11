<?php 
$page = 'dashboard';
include 'header.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard  |  Langsung Enak</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
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
                  <i class="fas fa-tachometer-alt mr-1"></i> Omset Perusahaan
                </h3>
              </div>
              <div class="card-body">
                <?= $this->session->flashdata('message') ?>
                <select name="year" id="year">
                  <?php 
                    for ($i = date('Y'); $i > date('Y')-5; $i--) { ?>
                      <option value="<?= $i ?>"><?= $i ?></option>
                  <?php } ?>
                </select>
                <canvas id="myChart"></canvas>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    let year = document.getElementById('year');

    let omset = (years) => {
      fetch("<?php echo base_url('admin/dashboard/omset/'); ?>", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          year: years
        })
      })
      .then(response => {
        return response.json();
      })
      .then(responseJson => {
        let data_omset = responseJson.omset
        setChart(data_omset);
      })
    }

    function setChart(omset) {  
      var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'line',

          // The data for our dataset
          data: {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
              datasets: [{
                  label: 'Omset',
                  backgroundColor: 'rgb(77,166,255)',
                  borderColor: 'rgb(77,166,255)',
                  lineTension: 0,
                  data: omset
              }]
          },

          // Configuration options go here
          options: {}
      });
    }

    omset(year.value)
    year.addEventListener("change", function () {
      omset(this.value)
    });
  </script>
  <?php include 'footer.php';?>
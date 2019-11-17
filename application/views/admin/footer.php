<!-- Main Footer -->
<footer class="main-footer">
	<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> 3.0.0-rc.1
	</div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url('assets/admin/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/admin/plugins/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/dist/js/adminlte.js') ?>"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url('assets/admin/dist/js/demo.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/select2/js/select2.full.min.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') ?>"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url('assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/raphael/raphael.min.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/jquery-mapael/jquery.mapael.min.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/jquery-mapael/maps/world_countries.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/admin/plugins/chart.js/Chart.min.js') ?>"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url('assets/admin/dist/js/pages/dashboard2.js') ?>"></script>
<script>
	function goBack() {
		window.history.back();
	}

	function deleteData(id, nama) {
		document.getElementById('idHapus').value = id
		document.getElementById("kalimatHapus").innerHTML = "Yakin ingin hapus produk \"" + nama + "\"  ?"
	}
</script>
</body>

</html>

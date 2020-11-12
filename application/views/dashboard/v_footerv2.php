<footer class="main-footer">
	<div class="float-right d-none d-sm-block">
		<b>Version</b> 3.0.5
	</div>
	<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
	reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
<script>
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	})
</script>
<script>
	$(document).ready(function() {
		$("#provinsi").change(function() {
			var url = "<?php echo site_url('dashboard/add_ajax_kab'); ?>/" + $(this).val();
			$('#kabupaten').load(url);
			return false;
		})

		$("#kabupaten").change(function() {
			var url = "<?php echo site_url('dashboard/add_ajax_kec'); ?>/" + $(this).val();
			$('#kecamatan').load(url);
			return false;
		})

		$("#kecamatan").change(function() {
			var url = "<?php echo site_url('dashboard/add_ajax_des'); ?>/" + $(this).val();
			$('#desa').load(url);
			return false;
		})
	});
</script>
<?php foreach ($get_basis as $b) { ?>
<script>
	$(document).ready(function() {
		$("#provinsi<?php echo $b->basisId?>").change(function() {
			var url = "<?php echo site_url('dashboard/add_ajax_kab'); ?>/" + $(this).val();
			$('#kabupaten<?php echo $b->basisId?>').load(url);
			return false;
		})

		$("#kabupaten<?php echo $b->basisId?>").change(function() {
			var url = "<?php echo site_url('dashboard/add_ajax_kec'); ?>/" + $(this).val();
			$('#kecamatan<?php echo $b->basisId?>').load(url);
			return false;
		})

		$("#kecamatan<?php echo $b->basisId?>").change(function() {
			var url = "<?php echo site_url('dashboard/add_ajax_des'); ?>/" + $(this).val();
			$('#desa<?php echo $b->basisId?>').load(url);
			return false;
		})
	});
</script>
<?php } ?>

<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$('#example2').DataTable({
			"paging": true,
			// "lengthChange": false,
			// "searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
<!-- Summernote -->
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
	$(function() {
		// Summernote
		$('#editor').summernote()
	})
</script>
</body>

</html>
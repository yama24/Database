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

<script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
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
			$("#provinsi<?php echo $b->basisId ?>").change(function() {
				var url = "<?php echo site_url('dashboard/add_ajax_kab'); ?>/" + $(this).val();
				$('#kabupaten<?php echo $b->basisId ?>').load(url);
				return false;
			})

			$("#kabupaten<?php echo $b->basisId ?>").change(function() {
				var url = "<?php echo site_url('dashboard/add_ajax_kec'); ?>/" + $(this).val();
				$('#kecamatan<?php echo $b->basisId ?>').load(url);
				return false;
			})

			$("#kecamatan<?php echo $b->basisId ?>").change(function() {
				var url = "<?php echo site_url('dashboard/add_ajax_des'); ?>/" + $(this).val();
				$('#desa<?php echo $b->basisId ?>').load(url);
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
<script>
	$(function() {
		'use strict'

		var ticksStyle = {
			fontColor: '#495057',
			fontStyle: 'bold'
		}

		var mode = 'index'
		var intersect = true

		var $salesChart = $('#sales-chart')
		var salesChart = new Chart($salesChart, {
			type: 'bar',
			data: {
				labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
				datasets: [{
						backgroundColor: '#007bff',
						borderColor: '#007bff',
						data: [<?= count($jan1)?>, <?= count($feb1)?>, <?= count($mar1)?>, <?= count($apr1)?>, <?= count($mei1)?>, <?= count($jun1)?>, <?= count($jul1)?>, <?= count($agu1)?>, <?= count($sep1)?>, <?= count($okt1)?>, <?= count($nov1)?>, <?= count($des1)?>]
					},
					{
						backgroundColor: '#FFC107',
						borderColor: '#FFC107',
						data: [<?= count($jan2)?>, <?= count($feb2)?>, <?= count($mar2)?>, <?= count($apr2)?>, <?= count($mei2)?>, <?= count($jun2)?>, <?= count($jul2)?>, <?= count($agu2)?>, <?= count($sep2)?>, <?= count($okt2)?>, <?= count($nov2)?>, <?= count($des2)?>]
					}
				]
			},
			options: {
				maintainAspectRatio: false,
				tooltips: {
					mode: mode,
					intersect: intersect
				},
				hover: {
					mode: mode,
					intersect: intersect
				},
				legend: {
					display: false
				},
				scales: {
					yAxes: [{
						// display: false,
						gridLines: {
							display: true,
							lineWidth: '4px',
							color: 'rgba(0, 0, 0, .2)',
							zeroLineColor: 'transparent'
						},
						ticks: $.extend({
							beginAtZero: true,

							// Include a dollar sign in the ticks
							callback: function(value, index, values) {
								if (value >= 1000) {
									value /= 1000
									value += 'k'
								}
								return value
							}
						}, ticksStyle)
					}],
					xAxes: [{
						display: true,
						gridLines: {
							display: false
						},
						ticks: ticksStyle
					}]
				}
			}
		})
	})
</script>
</body>

</html>
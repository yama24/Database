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
				labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
				datasets: [{
						backgroundColor: '#007bff',
						borderColor: '#007bff',
						data: [1000, 2000, 3000, 2500, 2700, 2500, 3000]
					},
					{
						backgroundColor: '#ced4da',
						borderColor: '#ced4da',
						data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
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
								return '$' + value
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

		var $visitorsChart = $('#visitors-chart')
		var visitorsChart = new Chart($visitorsChart, {
			data: {
				labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
				datasets: [{
						type: 'line',
						data: [100, 120, 170, 167, 180, 177, 160],
						backgroundColor: 'transparent',
						borderColor: '#007bff',
						pointBorderColor: '#007bff',
						pointBackgroundColor: '#007bff',
						fill: false
						// pointHoverBackgroundColor: '#007bff',
						// pointHoverBorderColor    : '#007bff'
					},
					{
						type: 'line',
						data: [60, 80, 70, 67, 80, 77, 100],
						backgroundColor: 'tansparent',
						borderColor: '#ced4da',
						pointBorderColor: '#ced4da',
						pointBackgroundColor: '#ced4da',
						fill: false
						// pointHoverBackgroundColor: '#ced4da',
						// pointHoverBorderColor    : '#ced4da'
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
							suggestedMax: 200
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
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Input Data | Terima Kasih</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminltes.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition lockscreen">
	<!-- Automatic element centering -->
	<div class="lockscreen-wrapper">
		<div class="lockscreen-logo">
			<a href="#"><b>Terima </b>Kasih</a>
		</div>
		<!-- User name -->
		<div class="lockscreen-name">Klik tombol dibawah ini untuk masuk ke grup</div><br>

		<!-- START LOCK SCREEN ITEM -->
		<?php
		foreach ($links as $l) {
		?>
			<div class="lockscreen-item">
				<!-- lockscreen image -->
				<div class="lockscreen-image">
					<img src="<?php echo base_url() ?>assets/dist/img/<?php echo $l->links_tipe ?>.png" alt="User Image">
				</div>
				<!-- /.lockscreen-image -->

				<!-- lockscreen credentials (contains the form) -->
				<div class="lockscreen-credentials">

					<div class="input-group">
						<!--<a href="<?php echo $l->links ?>" class="btn btn-block btn-lg" target="_blank"><?php echo $l->links_tipe ?> Grup <?php echo $l->links_nama ?></a>-->
						<a href="<?php echo $l->links ?>" class="btn btn-block btn-lg" target="_blank"><?php echo $l->links_tipe ?> <?php echo $l->links_nama ?></a>
					</div>

				</div>
				<!-- /.lockscreen credentials -->
			</div>
			<br>
		<?php } ?>
		<!-- /.lockscreen-item -->
		
		<div class="help-block text-center">
			Semoga berkah
		</div>
		<!-- <div class="text-center">
			<a href="login.html">Or sign in as a different user</a>
		</div>
		<div class="lockscreen-footer text-center">
			Copyright &copy; 2014-2019 <b><a href="http://adminlte.io" class="text-black">AdminLTE.io</a></b><br>
			All rights reserved
		</div> -->
	</div>
	<!-- /.center -->

	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
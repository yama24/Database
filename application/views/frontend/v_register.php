<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Input Data | Form</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/ionicons/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminltes.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<!--<b>Input </b>Data-->
		</div>
		<center><img src="<?php echo base_url() ?>assets/dist/img/internusa.png" alt="" width="50"></center>
		<div class="login-logo">
			<b>Input </b>Data
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-header" style="background-color: #007bff;">
				<center> <span class="login-box-msg" style="color: white;">Silahkan input data untuk melanjutkan</span> </center>
			</div>
			<div class="card-body login-card-body">

				<?php
				if (isset($_GET['alert'])) {
					if ($_GET['alert'] == "isiulang") {
						echo "<div class='alert alert-danger font-weight-bold text-center'>Maaf! Mohon gunakan email atau nomor handphone yang berbeda.</div>";
					} else if ($_GET['alert'] == "belum_isi") {
						echo "<div class='alert alert-danger font-weight-bold text-center'>Anda Harus Isi Data Terlebih Dulu!</div>";
					} else if ($_GET['alert'] == "logout") {
						echo "<div class='alert alert-success font-weight-bold text-center'>Anda Telah Logout!</div>";
					}
				}
				?>
				<form action="<?php echo base_url('welcome/form_submit2'); ?>" method="post">
				<!-- <?php echo $links['linksNama'] ?> -->
					<label>Nama</label>
					<div class="input-group mb-3">
					<input type="text" name="slug" value="<?php echo $links['linksSlug'] ?>" hidden>
						<input type="text" class="form-control" placeholder="Isi dengan nama lengkap" name="nama" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<label>Tanggal lahir</label>
					<div class="input-group mb-3">
						<input type="date" class="form-control" name="ttl" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-calendar-alt"></span>
							</div>
						</div>
					</div>
					<label>Gender</label>
					<div class="input-group mb-3">
						<select class="form-control select2bs4" name="gender" required>
							<option value="">- Pilih gender</option>
							<option value="Pria">Pria</option>
							<option value="Wanita">Wanita</option>
						</select>
					</div>
					<label>Pekerjaan</label>
					<div class="input-group mb-3">
						<select class="form-control select2bs4" name="pekerjaan" required>
							<option value="">- Pilih pekerjaan</option>
							<?php
							foreach ($pekerjaan as $p) {
							?>
								<option value="<?php echo $p->pekerjaan ?>"><?php echo $p->pekerjaan ?></option>
							<?php } ?>
							<option value="Lainnya">Lainnya</option>
						</select>
					</div>
					<label>Perusahaan/lembaga tempat bekerja</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Isi nama sekolah/kampus jika masih pelajar/mahasiswa" name="tempat_kerja" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-briefcase"></span>
							</div>
						</div>
					</div>
					<label>Provinsi</label>
					<div class="input-group mb-3">
						<select name="provinsi" class="form-control select2bs4" id="provinsi">
							<option>- Pilih provinsi</option>
							<?php foreach ($provinces as $prov) {
								echo '<option value="' . $prov->id . '">' . ucwords(strtolower($prov->name)) . '</option>';
							} ?>
						</select>
					</div>
					<label>Kota/Kabupaten</label>
					<div class="input-group mb-3">
						<select name="kabupaten" class="form-control select2bs4" id="kabupaten">
							<option value=''>Loading</option>
						</select>
					</div>
					<label>Kecamatan</label>
					<div class="input-group mb-3">
						<select name="kecamatan" class="form-control select2bs4" id="kecamatan">
							<option value=''>Loading</option>
						</select>
					</div>
					<label>Desa/Kelurahan</label>
					<div class="input-group mb-3">
						<select name="desa" class="form-control select2bs4" id="desa">
							<option value=''>Loading</option>
						</select>
					</div>
					<label>Nomor handphone</label>
					<div class="input-group mb-3">
						<input type="tel" class="form-control" placeholder="cth: 082161821282" name="phone" pattern="[0]{1}[8]{1}[0-9].{8,}" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-mobile-alt"></span>
							</div>
						</div>
					</div>
					<label>Email</label>
					<div class="input-group mb-3">
						<input type="email" class="form-control" placeholder="cth: email@gmail.com" name="email" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<button class="btn btn-block btn-primary" type="submit">Submit</button>
				</form>
				<!-- <div class="social-auth-links text-center mb-3">
					<p>- OR -</p>
					<a href="#" class="btn btn-block btn-primary">
						<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
					</a>
					<a href="#" class="btn btn-block btn-danger">
						<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
					</a>
				</div> -->
				<!-- /.social-auth-links -->

				<!-- <p class="mb-1">
					<a href="forgot-password.html">I forgot my password</a>
				</p>
				<p class="mb-0">
					<a href="register.html" class="text-center">Register a new membership</a>
				</p> -->
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
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
				var url = "<?php echo site_url('welcome/add_ajax_kab'); ?>/" + $(this).val();
				$('#kabupaten').load(url);
				return false;
			})

			$("#kabupaten").change(function() {
				var url = "<?php echo site_url('welcome/add_ajax_kec'); ?>/" + $(this).val();
				$('#kecamatan').load(url);
				return false;
			})

			$("#kecamatan").change(function() {
				var url = "<?php echo site_url('welcome/add_ajax_des'); ?>/" + $(this).val();
				$('#desa').load(url);
				return false;
			})
		});
	</script>
</body>
<footer>

</footer>

</html>
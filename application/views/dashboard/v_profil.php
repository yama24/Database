		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Profil <small>Update</small></h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Profil</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<?php foreach ($profil as $p) { ?>
						<form role="form" method="post" action="<?php echo base_url('dashboard/profil_update') ?>" enctype="multipart/form-data">
							<div class="row">
								<!-- left column -->
								<div class="col-md-6">
									<!-- general form elements -->
									<div class="card card-outline card-primary">
										<div class="card-header">
											<h3 class="card-title"></h3>
											<?php
											if (isset($_GET['alert'])) {
												if ($_GET['alert'] == "sukses") {
													echo "<div class='alert alert-success font-weight-bold text-center'>Profil telah diupdate!</div>";
												}
											}
											?>
										</div>
										<!-- /.card-header -->
										<!-- form start -->
										<div class="card-body">
											<div class="form-group">
												<label>Nama</label>
												<input type="text" class="form-control" name="nama" placeholder="Masukan nama" value="<?php echo $p->pengguna_nama; ?>" required>
											</div>
											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control" name="email" value="<?php echo $p->pengguna_email; ?>" required>
											</div>
										</div>
										<div class="card-footer">
											<button type="submit" class="btn btn-success" name="status" value="publish">Update</button>
										</div>
										<!-- /.card-body -->
									</div>
									<!-- /.card -->
								</div>
								<!--/.col (left) -->
								<!-- right column -->
								<!-- <div class="col-md-3">
								general form elements disabled
								<div class="card card-outline card-primary">
									<div class="card-header">
										<h3 class="card-title"> </h3>
									</div>
									/.card-header
									<div class="card-body">
										<div class="form-group">
											<label>Kategori</label>
											<select class="form-control" name="kategori" required>
												<option value="">- Pilih Kategori</option>
												<?php foreach ($kategori as $k) { ?>
													<option <?php if ($a->artikel_kategori == $k->kategori_id) {
																echo "selected='selected'";
															} ?> value="<?php echo $k->kategori_id ?>">
														<?php echo $k->kategori_nama; ?>
													</option>
												<?php } ?>
											</select>
										</div>
										<img width="100%" class="img-responsive" src="<?php echo base_url() . '/gambar/artikel/' . $a->artikel_sampul; ?>">
										<div class="form-group">
											<label>Gambar Sampul</label>
											<small><input type="file" name="sampul" accept="image/png, image/jpeg, image/gif"></small>
										</div>
									</div>
									<div class="card-footer">
										<button type="submit" class="btn btn-block btn-info" name="status" value="draft">Draft</button>
										<button type="submit" class="btn btn-block btn-success" name="status" value="publish">Publish</button>
									</div>
									/.card-body
								</div>
								/.card
							</div> -->
								<!--/.col (right) -->
							</div>
							<!-- /.row -->
						</form>
					<?php } ?>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
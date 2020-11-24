		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Link</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Link</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<?php
			if (isset($_GET['alert'])) {
				if ($_GET['alert'] == "fail") {
					echo "<div class='alert alert-danger font-weight-bold text-center'>Link gagal diinput! Masukan nama atau link yang berbeda</div>";
				} else if ($_GET['alert'] == "add") {
					echo "<div class='alert alert-success font-weight-bold text-center'>Link berhasil diinput!</div>";
				} else if ($_GET['alert'] == "update") {
					echo "<div class='alert alert-warning font-weight-bold text-center'>Link berhasil diupdate!</div>";
				} else if ($_GET['alert'] == "delete") {
					echo "<div class='alert alert-danger font-weight-bold text-center'>Link berhasil dihapus!</div>";
				}
			}
			?>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="card card-outline card-primary">
						<div class="card-header">
							<h3 class="card-title"></h3>
							<button style="float: right;" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-tambah-links">
								New Data
							</button>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th style="width: 1%;">No</th>
										<th>Keperluan</th>
										<th>Tipe</th>
										<th>Nama</th>
										<th>Link</th>
										<th>Slug</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($links as $l) {
									?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php if ($l->tipe == 1) {
												echo "Registrasi Event";
											} else {
												echo "Input Database";
											}?></td>
											<td><?php echo $l->links_tipe; ?></td>
											<td><?php echo $l->links_nama; ?></td>
											<td><a href="<?php echo $l->links; ?>" target="_blank"><?php echo $l->links; ?></a></td>
											<td><?php if ($l->tipe == 1) {
												echo '<a href="' . base_url() . 'register/' . $l->links_slug . '" target="_blank">' . base_url() . 'register/' . $l->links_slug . '</a>';
											} else {
												echo "Tidak diperlukan";
											}?></td>
											<td>
												<center>
													<button data-toggle="modal" data-target="#modal-edit-links<?php echo $l->links_id; ?>" class="btn btn-info btn-xs" style="width: 70px;"><i class="fas fa-edit"></i> Edit</button>
													<button data-toggle="modal" data-target="#modal-hapus-links<?php echo $l->links_id; ?>" class="btn btn-danger btn-xs" style="width: 70px;"><i class="fas fa-trash-alt"></i> Delete</button>
												</center>
											</td>
										</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Keperluan</th>
										<th>Tipe</th>
										<th>Nama</th>
										<th>Link</th>
										<th>Slug</th>
										<th>Aksi</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<div class="modal fade" id="modal-tambah-links">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Tambah link</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form role="form" method="post" action="<?php echo base_url('dashboard/links_tambah') ?>">
						<div class="modal-body">
							<div class="card-body">
								<div class="form-group">
									<select class="form-control select2bs4" name="keperluan" required>
										<option value="">- Pilih keperluan</option>
										<option value="0">Input Database</option>
										<option value="1">Registrasi Event</option>
									</select>
								</div>
								<div class="form-group">
									<label>Tipe</label>
									<select class="form-control select2bs4" name="tipe" required>
										<option value="">- Pilih tipe</option>
										<?php foreach ($linkstype as $lt) { ?>
											<option value="<?php echo $lt->tipe ?>"><?php echo $lt->tipe ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Nama Grup</label>
									<input type="text" class="form-control" name="nama" placeholder="Masukan nama grup" required>
								</div>
								<div class="form-group">
									<label>Link</label>
									<input type="text" class="form-control" name="link" placeholder="Masukan link" pattern="[https://]{1}[a-z, ., /, -, _].{1,}" required>
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.modal -->
		<?php foreach ($links as $l) { ?>
			<div class="modal fade" id="modal-edit-links<?php echo $l->links_id; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Link</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form role="form" method="post" action="<?php echo base_url('dashboard/links_update') ?>">
							<div class="modal-body">
								<div class="card-body">
									<div class="form-group">
										<select class="form-control select2bs4" name="keperluan" required>
											<option value="">- Pilih keperluan</option>
											<option <?php if ($l->tipe == 0) {
												echo 'selected';
											}?> value="0">Input Database</option>
											<option <?php if ($l->tipe == 1) {
												echo 'selected';
											}?>  value="1">Registrasi Event</option>
										</select>
									</div>
									<div class="form-group">
										<label>Tipe</label>
										<input type="hidden" name="id" value="<?php echo $l->links_id; ?>">
										<select class="form-control select2bs4" name="tipe" required>
											<option value="">- Pilih tipe</option>
											<?php foreach ($linkstype as $lt) { ?>
												<option <?php if ($l->links_tipe == $lt->tipe) {
															echo "selected='selected'";
														} ?> value="<?php echo $lt->tipe ?>">
													<?php echo $lt->tipe ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Nama Grup</label>
										<input type="text" class="form-control" name="nama" value="<?php echo $l->links_nama ?>" placeholder="Masukan nama grup" required>
									</div>
									<div class="form-group">
										<label>Link</label>
										<input type="text" class="form-control" name="link" value="<?php echo $l->links ?>" placeholder="Masukan link" pattern="[https://]{1}[a-z, ., /, -, _].{1,}" required>
									</div>
								</div>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-info">Update</button>
							</div>
						</form>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<div class="modal fade" id="modal-hapus-links<?php echo $l->links_id; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Hapus Link</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form role="form" method="post" action="<?php echo base_url('dashboard/links_hapus/' . $l->links_id) ?>">
							<div class="modal-body">
								<div class="card-body">
									<div class="form-group">
										<h5>Apakah anda ingin menghapus link :</h5>
										<h3><?php echo $l->links_tipe; ?> <?php echo $l->links_nama; ?></h3>
									</div>
								</div>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</form>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->

		<?php } ?>
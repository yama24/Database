		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1><?php echo $page?></h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active"><?php echo $page?></li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<?php
			if (isset($_GET['alert'])) {
				if ($_GET['alert'] == "fail") {
					echo "<div class='alert alert-danger font-weight-bold text-center'>Pekerjaan gagal diinput!</div>";
				} else if ($_GET['alert'] == "add") {
					echo "<div class='alert alert-success font-weight-bold text-center'>Pekerjaan berhasil diinput!</div>";
				} else if ($_GET['alert'] == "update") {
					echo "<div class='alert alert-warning font-weight-bold text-center'>Pekerjaan berhasil diupdate!</div>";
				} else if ($_GET['alert'] == "delete") {
					echo "<div class='alert alert-danger font-weight-bold text-center'>Pekerjaan berhasil dihapus!</div>";
				}
			}
			?>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="card card-outline card-primary">
						<div class="card-header">
							<h3 class="card-title"></h3>
							<button style="float: right;" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-tambah-pekerjaan">
								New Data
							</button>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th style="width: 1%;">No</th>
										<th>Pekerjaan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pekerjaan as $p) {
									?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $p->pekerjaan; ?></td>
											<td>
												<center>
													<button data-toggle="modal" data-target="#modal-edit-pekerjaan<?php echo $p->pekerjaan_id; ?>" class="btn btn-info btn-xs" style="width: 70px;"><i class="fas fa-edit"></i> Edit</button>
													<button data-toggle="modal" data-target="#modal-hapus-pekerjaan<?php echo $p->pekerjaan_id; ?>" class="btn btn-danger btn-xs" style="width: 70px;"><i class="fas fa-trash-alt"></i> Delete</button>
												</center>
											</td>
										</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Pekerjaan</th>
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
		<div class="modal fade" id="modal-tambah-pekerjaan">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Tambah Pekerjaan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form role="form" method="post" action="<?php echo base_url('dashboard/pekerjaan_tambah') ?>">
						<div class="modal-body">
							<div class="card-body">
								<div class="form-group">
									<label>Nama Pekerjaan</label>
									<input type="text" class="form-control" name="pekerjaan" placeholder="Masukan nama pekerjaan" required>
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
		<?php foreach ($pekerjaan as $p) { ?>
			<div class="modal fade" id="modal-edit-pekerjaan<?php echo $p->pekerjaan_id; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Pekerjaan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form role="form" method="post" action="<?php echo base_url('dashboard/pekerjaan_update') ?>">
							<div class="modal-body">
								<div class="card-body">
									<div class="form-group">
										<label>Nama Pekerjaan</label>
										<input type="hidden" name="id" value="<?php echo $p->pekerjaan_id; ?>">
										<input type="text" class="form-control" name="pekerjaan" placeholder="Masukan nama kategori" value="<?php echo $p->pekerjaan; ?>" required>
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
			<div class="modal fade" id="modal-hapus-pekerjaan<?php echo $p->pekerjaan_id; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Hapus Pekerjaan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form role="form" method="post" action="<?php echo base_url('dashboard/pekerjaan_hapus/' . $p->pekerjaan_id) ?>">
							<div class="modal-body">
								<div class="card-body">
									<div class="form-group">
										<h5>Apakah anda ingin menghapus pekerjaan :</h5>
										<h3><?php echo $p->pekerjaan; ?></h3>
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
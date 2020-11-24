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
					echo "<div class='alert alert-danger font-weight-bold text-center'>Maaf! Mohon gunakan email atau nomor handphone yang berbeda.</div>";
				} else if ($_GET['alert'] == "add") {
					echo "<div class='alert alert-success font-weight-bold text-center'>Data berhasil diinput!</div>";
				} else if ($_GET['alert'] == "update") {
					echo "<div class='alert alert-warning font-weight-bold text-center'>Data berhasil diupdate!</div>";
				} else if ($_GET['alert'] == "delete") {
					echo "<div class='alert alert-danger font-weight-bold text-center'>Data berhasil dihapus!</div>";
				}
			}
			?>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="card card-outline card-primary">
						<div class="card-header">
							<h3 class="card-title"></h3>
							<a href="<?php echo base_url() . 'dashboard/export' ?>" style="float: left;" target="_blank" class="btn btn-outline-secondary">
								Export Kontak
							</a>
							<button data-toggle="modal" data-target="#modal-tambah-basis" style="float: right;" class="btn btn-outline-success">
								New Data
							</button>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th style="width: 1%;">No</th>
										<th>Tanggal Input</th>
										<th>Nama</th>
										<th style="width: 20%;">Tanggal Lahir</th>
										<th>Pekerjaan</th>
										<th style="width: 20%;">Tempat Kerja</th>
										<th>Gender</th>
										<th>Provinsi</th>
										<th>Kota/Kabupaten</th>
										<th>Kecamatan</th>
										<th>Desa/Kelurahan</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Grup</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($get_basis as $b) {
									?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $b->basisDatainput; ?></td>
											<td><?php echo $b->basisNama; ?></td>
											<td><?php echo $b->basisTtl; ?></td>
											<td><?php echo $b->basisPekerjaan; ?></td>
											<td><?php echo $b->basisTempatkerja; ?></td>
											<td><?php echo $b->basisGender; ?></td>
											<td><?php echo ucwords(strtolower($b->provincesName)); ?></td>
											<td><?php echo ucwords(strtolower($b->regenciesName)); ?></td>
											<td><?php echo ucwords(strtolower($b->districtsName)); ?></td>
											<td><?php echo ucwords(strtolower($b->villagesName)); ?></td>
											<td><a href="https://wa.me/62<?php echo $b->basisPhone; ?>" target="_blank">0<?php echo $b->basisPhone; ?></a></td>
											<td><a href="mailto:<?php echo $b->basisEmail; ?>" target="_blank"><?php echo $b->basisEmail; ?></a></td>
											<td><?php echo ucwords(strtolower($b->basisGrup));?></td>
											<td>
												<center>
													<button data-toggle="modal" data-target="#modal-edit-basis<?php echo $b->basisId; ?>" class="btn btn-info btn-xs" style="width: 70px;"><i class="fas fa-edit"></i> Edit</button>
													<button data-toggle="modal" data-target="#modal-hapus-basis<?php echo $b->basisId; ?>" class="btn btn-danger btn-xs" style="width: 70px;"><i class="fas fa-trash-alt"></i> Delete</button>
												</center>
											</td>
										</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Tanggal Input</th>
										<th>Nama</th>
										<th>Tanggal Lahir</th>
										<th>Pekerjaan</th>
										<th>Tempat Kerja</th>
										<th>Gender</th>
										<th>Provinsi</th>
										<th>Kota/Kabupaten</th>
										<th>Kecamatan</th>
										<th>Desa/Kelurahan</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Grup</th>
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
		<div class="modal fade" id="modal-tambah-basis">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Tambah Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form role="form" method="post" action="<?php echo base_url('dashboard/basis_tambah') ?>">
						<div class="modal-body">
							<div class="card-body">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" class="form-control" placeholder="Isi dengan nama lengkap" name="nama" required>
								</div>
								<div class="form-group">
									<label>Tanggal lahir</label>
									<input type="date" class="form-control" name="ttl" required>
								</div>
								<div class="form-group">
									<label>Gender</label>
									<select class="form-control select2bs4" name="gender" required>
										<option value="">- Pilih gender</option>
										<option value="Pria">Pria</option>
										<option value="Wanita">Wanita</option>
									</select>
								</div>
								<div class="form-group">
									<label>Pekerjaan</label>
									<select class="form-control select2bs4" name="pekerjaan" required>
										<option value="">- Pilih pekerjaan</option>
										<?php
										foreach ($pekerjaan as $p) {
										?>
											<option value="<?php echo $p->pekerjaan ?>">
												<?php echo $p->pekerjaan ?>
											</option>
										<?php } ?>
										<option value="Lainnya">Lainnya</option>
									</select>
								</div>
								<div class="form-group">
									<label>Perusahaan/lembaga tempat bekerja</label>
									<input type="text" class="form-control" placeholder="Isi nama sekolah/kampus jika masih pelajar/mahasiswa" name="tempat_kerja" required>
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<select class="form-control select2bs4" id="provinsi" name="provinsi" required>
										<option value="">- Pilih provinsi</option>
										<?php foreach ($provinces as $prov) {
											echo '<option value="' . $prov->id . '">' . ucwords(strtolower($prov->name)) . '</option>';
										} ?>
									</select>
									<select class="form-control select2bs4" id="kabupaten" name="kabupaten" required>
										<option value="">Kota/Kabupaten</option>
									</select>
									<select class="form-control select2bs4" id="kecamatan" name="kecamatan" required>
										<option value="">Kecamatan</option>
									</select>
									<select class="form-control select2bs4" id="desa" name="desa" required>
										<option value="">Desa/Kelurahan</option>
									</select>
								</div>
								<div class="form-group">
									<label>Nomor handphone</label>
									<input type="tel" class="form-control" placeholder="cth: 082161821282" name="phone" pattern="[0]{1}[8]{1}[0-9].{8,}" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" placeholder="cth: email@gmail.com" name="email" required>
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
		<?php foreach ($get_basis as $b) { ?>
			<div class="modal fade" id="modal-edit-basis<?php echo $b->basisId; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Data</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form role="form" method="post" action="<?php echo base_url('dashboard/basis_update') ?>">
							<div class="modal-body">
								<div class="card-body">
									<div class="form-group">
										<label>Nama</label>
										<input type="hidden" name="id" value="<?php echo $b->basisId; ?>">
										<input type="text" class="form-control" name="nama" value="<?php echo $b->basisNama; ?>" required>
									</div>
									<div class="form-group">
										<label>Tanggal lahir</label>
										<input type="date" class="form-control" name="ttl" value="<?php echo $b->basisTtl; ?>" required>
									</div>
									<div class="form-group">
										<label>Gender</label>
										<select class="form-control select2bs4" name="gender" required>
											<option value="">- Pilih gender</option>
											<option <?php if ($b->basisGender == "Pria") {
														echo "selected='selected'";
													} ?> value="Pria">
												Pria
											</option>
											<option <?php if ($b->basisGender == "Wanita") {
														echo "selected='selected'";
													} ?> value="Wanita">
												Wanita
											</option>

										</select>
									</div>
									<div class="form-group">
										<label>Pekerjaan</label>
										<select class="form-control select2bs4" name="pekerjaan" required>
											<option value="">- Pilih pekerjaan</option>
											<?php
											foreach ($pekerjaan as $p) {
											?>
												<option <?php if ($b->basisPekerjaan == $p->pekerjaan) {
															echo "selected='selected'";
														} ?> value="<?php echo $p->pekerjaan ?>">
													<?php echo $p->pekerjaan ?>
												</option>
											<?php } ?>
											<option <?php if ($b->basisPekerjaan == "Lainnya") {
														echo "selected='selected'";
													} ?> value="Lainnya">Lainnya</option>
										</select>
									</div>
									<div class="form-group">
										<label>Perusahaan/lembaga tempat bekerja</label>
										<input type="text" class="form-control" name="tempat_kerja" value="<?php echo $b->basisTempatkerja; ?>" required>
									</div>
									<div class="form-group">
										<label>Alamat</label>
										<select class="form-control select2bs4" name="provinsi" id="provinsi<?php echo $b->basisId ?>" required>
											<option value="">- Pilih Provinsi</option>
											<?php
											foreach ($provinces as $prov) {
											?>
												<option <?php if ($b->provincesName == $prov->name) {
															echo "selected='selected'";
														} ?> value="<?php echo $prov->id ?>">
													<?php echo ucwords(strtolower($prov->name)) ?>
												</option>
											<?php } ?>
										</select>
										<select class="form-control select2bs4" name="kabupaten" id="kabupaten<?php echo $b->basisId ?>" required>
											<option value="">Kota/Kabupaten</option>
											<?php
											$regencies = $this->db->get_where('regencies', array('province_id' => $b->provincesId));
											foreach ($regencies->result() as $reg) {
											?>
												<option <?php if ($b->regenciesId == $reg->id) {
															echo "selected='selected'";
														} ?> value="<?php echo $reg->id ?>">
													<?php echo ucwords(strtolower($reg->name)) ?>
												</option>
											<?php } ?>
										</select>
										<select class="form-control select2bs4" name="kecamatan" id="kecamatan<?php echo $b->basisId ?>" required>
											<option value="">Kecamatan</option>
											<?php
											$districts = $this->db->get_where('districts', array('regency_id' => $b->regenciesId));
											foreach ($districts->result() as $dis) {
											?>
												<option <?php if ($b->districtsId == $dis->id) {
															echo "selected='selected'";
														} ?> value="<?php echo $dis->id ?>">
													<?php echo ucwords(strtolower($dis->name)) ?>
												</option>
											<?php } ?>
										</select>
										<select class="form-control select2bs4" name="desa" id="desa<?php echo $b->basisId ?>" required>
											<option value="">Desa/Kelurahan</option>
											<?php
											$villages = $this->db->get_where('villages', array('district_id' => $b->districtsId));
											foreach ($villages->result() as $vil) {
											?>
												<option <?php if ($b->villagesId == $vil->id) {
															echo "selected='selected'";
														} ?> value="<?php echo $vil->id ?>">
													<?php echo ucwords(strtolower($vil->name)) ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Nomor handphone</label>
										<input type="tel" class="form-control" name="phone" pattern="[0]{1}[8]{1}[0-9].{8,}" value="0<?php echo $b->basisPhone; ?>" required>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control" name="email" value="<?php echo $b->basisEmail; ?>" required>
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
			<div class="modal fade" id="modal-hapus-basis<?php echo $b->basisId; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Hapus Data</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form role="form" method="post" action="<?php echo base_url('dashboard/basis_hapus/' . $b->basisId) ?>">
							<div class="modal-body">
								<div class="card-body">
									<div class="form-group">
										<h5>Apakah anda ingin menghapus data :</h5>
										<h3><?php echo $b->basisNama; ?></h3>
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
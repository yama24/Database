		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1><?php echo $page ?></h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active"><?php echo $page ?></li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?php echo count($basis) ?></h3>
									<p>Data Klien</p>
								</div>
								<div class="icon">
									<i class="ion ion-stats-bars"></i>
								</div>
								<a href="<?php echo base_url() ?>dashboard/basis/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-success">
								<div class="inner">
									<h3><?php echo count($d_pekerjaan) ?></h3>
									<p>Data Pekerjaan</p>
								</div>
								<div class="icon">
									<i class="ion ion-briefcase"></i>
								</div>
								<a href="<?php echo base_url() ?>dashboard/pekerjaan/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-primary">
								<div class="inner">
									<h3><?php echo count($d_provinsi) ?></h3>

									<p>Data Provinsi</p>
								</div>
								<div class="icon">
									<i class="ion ion-earth"></i>
								</div>
								<a href="<?php echo base_url() ?>dashboard/basis/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-danger">
								<div class="inner">
									<h3><?php echo count($d_kabupaten) ?></h3>

									<p>Data Kota/Kabupaten</p>
								</div>
								<div class="icon">
									<i class="ion ion-location"></i>
								</div>
								<a href="<?php echo base_url() ?>dashboard/basis/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
					</div>
					<!-- /.row -->
					<div class="card">
						<div class="card-header border-0">
							<div class="d-flex justify-content-between">
								<h3 class="card-title">Data Masuk</h3>
								<!-- <a href="javascript:void(0);">View Report</a> -->
							</div>
						</div>
						<div class="card-body">
							<div class="d-flex">
								<p class="d-flex flex-column">
									<span class="text-bold text-lg">$18,230.00</span>
									<span>Sales Over Time</span>
								</p>
								<p class="ml-auto d-flex flex-column text-right">
									<!-- <span class="text-success">
										<i class="fas fa-arrow-up"></i> 33.1%
									</span>
									<span class="text-muted">Since last month</span> -->
								</p>
							</div>
							<!-- /.d-flex -->

							<div class="position-relative mb-4">
								<canvas id="sales-chart" height="200"></canvas>
							</div>

							<div class="d-flex flex-row justify-content-end">
								<span class="mr-2">
									<i class="fas fa-square text-primary"></i> This year
								</span>

								<span>
									<i class="fas fa-square text-gray"></i> Last year
								</span>
							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

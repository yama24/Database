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
									<h3><?php echo count($basis)?></h3>
									<p>Data Klien</p>
								</div>
								<div class="icon">
									<i class="ion ion-stats-bars"></i>
								</div>
								<a href="<?php echo base_url()?>dashboard/basis/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-success">
								<div class="inner">
									<h3><?php echo count($pekerjaan)?></h3>
									<p>Data Pekerjaan</p>
								</div>
								<div class="icon">
									<i class="ion ion-briefcase"></i>
								</div>
								<a href="<?php echo base_url()?>dashboard/pekerjaan/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-primary">
								<div class="inner">
									<h3><?php echo count($d_provinsi)?></h3>

									<p>Data Provinsi</p>
								</div>
								<div class="icon">
									<i class="ion ion-earth"></i>
								</div>
								<a href="<?php echo base_url()?>dashboard/basis/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-danger">
								<div class="inner">
									<h3><?php echo count($d_kabupaten)?></h3>

									<p>Data Kota/Kabupaten</p>
								</div>
								<div class="icon">
									<i class="ion ion-location"></i>
								</div>
								<a href="<?php echo base_url()?>dashboard/basis/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
					</div>
					<!-- /.row -->
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
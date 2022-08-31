<div class="">
	<div class="row top_tiles">
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-list"></i></div>
				<div class="count">1</div>
				<h3>Skala Preferensi</h3>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">

				<div class="icon"><i class="fa fa-list"></i></div>
				<div class="count">1</div>
				<h3>Alternatif</h3>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-list"></i></div>
				<div class="count">1</div>
				<h3>Kriteria</h3>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<?php
					$user = "SELECT * FROM user";
					$user = $this->db->query($user);
				?>
				<div class="icon"><i class="fa fa-users"></i></div>
				<div class="count"><?= $user->num_rows() ?></div>
				<h3>User</h3>
			</div>
		</div>
	</div>
	<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		<strong>SELAMAT DATANG DI APLIKASI GIS </strong>
	</div>
</div>
<!-- show logo -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel" style="height:60vh;text-align: center;">
			<div class="x_content">
				<img src="<?= base_url('assets/img/pasawahan-logo.png') ?>" alt="logo" width="70%" style="object-fit: contain;">
			</div>
		</div>
	</div>
</div>
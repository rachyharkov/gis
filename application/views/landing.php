<!DOCTYPE html>
<html dir="ltr" lang="en">


<!-- Mirrored from evdigi.my.id/sitarius/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Oct 2022 14:12:02 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="description" content="aplikasi daiklat" />
	<meta name="keywords" content="badiklat sulut" />
	<meta name="author" content="Inggit Gustiar - 085864849973" />
	<title>Kecamatan Pasawahan Kuningan</title>
	<link href="<?php echo base_url() ?>assets/frontend/assets/front/img/baner.png" rel="shortcut icon" type="image/png">
	<link href="<?php echo base_url() ?>assets/frontend/assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/frontend/assets/front/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/frontend/assets/front/css/animate.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/frontend/assets/front/css/css-plugin-collections.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/frontend/assets/front/css/menuzord-megamenu.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/frontend/assets/front/css/menuzord-skins/menuzord-boxed.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/frontend/assets/front/css/style-main.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/frontend/assets/front/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/frontend/assets/front/css/responsive.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/frontend/assets/front/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/frontend/assets/front/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/frontend/assets/front/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/frontend/assets/front/css/colors/theme-skin-color-set1.css" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url() ?>assets/frontend/assets/front/js/jquery-2.2.4.min.js"></script>
	<script src="<?php echo base_url() ?>assets/frontend/assets/front/js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url() ?>assets/frontend/assets/front/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/frontend/assets/front/js/jquery-plugin-collection.js"></script>
</head>


<body class="">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
	<?php if ($this->session->flashdata('message')) : ?>
	<?php endif; ?>
	<div id="wrapper" class="clearfix">
		<!-- Header -->
		<header id="header" class="header header-floating header-floating-text-dark">
			<div class="header-nav navbar-sticky navbar-sticky-animated">
				<div class="header-nav-wrapper">
					<div class="container">
						<nav id="menuzord-right" class="menuzord default no-bg">
							<a class="menuzord-brand switchable-logo pull-left flip mb-15" href="<?= base_url() ?>landing">
								<img class="logo-default" style="padding: 0px;" src="<?= base_url('assets/img/pasawahan-logo.png') ?>" alt="">
								<img class="logo-scrolled-to-fixed" style="padding: 0px;" src="<?= base_url('assets/img/pasawahan-logo.png') ?>" alt="">
							</a>

							<ul class="menuzord-menu onepage-nav">
								<li class=""><a href="<?= base_url() ?>landing">Home</a></li>
								<li><a href="<?= base_url() ?>landing/wisata">Objek Wisata</a></li>
								<li><a href="<?= base_url() ?>landing/lokasi">Lokasi Objek Wisata</a></li>
								<li><a href="<?= base_url() ?>landing/kontak">Kontak</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>

		<!-- content -->
		<?php echo $contents ?>


		<!-- Footer -->
		<footer id="footer" class="footer" data-bg-color="#212331" style="background: rgb(33, 35, 49) !important;">
			<div class="container pt-70 pb-40">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="widget dark">
							<img class="mt-5 mb-20" alt="" src="<?php echo base_url() ?>assets/img/pasawahan-logo.png">
							<p>Jalan Raya Pasawahan No.07
								Desa/Kecamatan Pasawahan
								Kabupaten Kuningan
								Kode POS 45559</p>
							<ul class="list-inline mt-5">
								<li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored2 mr-5"></i> <a class="text-gray" href="#">0852-XXXX-XXXX</a> </li>
								<li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored2 mr-5"></i> <a class="text-gray" href="#">Info@kec-pasawahan.com</a> </li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="widget dark">
							<h4 class="widget-title line-bottom-theme-colored-2">Link Terkait</h4>
							<ul class="angle-double-right list-border">
								<li><a href="<?= base_url() ?>landing" target="">Home</a></li>
								<li><a href="<?= base_url() ?>landing/wisata" target="">Objek Wisata</a></li>
								<li><a href="<?= base_url() ?>landing/lokasi" target="">Lokasi Objek Wisata</a></li>
								<li><a href="<?= base_url() ?>landing/kontak" target="">Kontak</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="widget dark">
							<h4 class="widget-title line-bottom-theme-colored-2">Daftar Objek Wisata</h4>
							<div class="latest-posts">
								<article class="post media-post clearfix pb-0 mb-10">
									<div class="post-right">
										<h5 class="post-title mt-0 mb-5"><a href="#">Telaga Biru Cicerem</a></h5>
									</div>
								</article>

								<article class="post media-post clearfix pb-0 mb-10">
									<div class="post-right">
										<h5 class="post-title mt-0 mb-5"><a href="#">Telaga Nilam</a></h5>
									</div>
								</article>
								<article class="post media-post clearfix pb-0 mb-10">
									<div class="post-right">
										<h5 class="post-title mt-0 mb-5"><a href="#">Telaga Remis</a></h5>
									</div>
								</article>
								<article class="post media-post clearfix pb-0 mb-10">
									<div class="post-right">
										<h5 class="post-title mt-0 mb-5"><a href="#">Side Land</a></h5>
									</div>
								</article>
								<article class="post media-post clearfix pb-0 mb-10">
									<div class="post-right">
										<h5 class="post-title mt-0 mb-5"><a href="<?= base_url() ?>landing/wisata">Lainnya...</a></h5>
									</div>
								</article>


							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-3">
						<div class="widget dark">
							<h4 class="widget-title line-bottom-theme-colored-2">Sosial Media</h4>
							<div class="opening-hours">
								<ul class="styled-icons icon-sm icon-bordered icon-circled clearfix mt-10">
									<li><a href="" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li><a href="" target="_blank"><i class="fa fa-youtube"></i></a></li>
									<li><a href="https://www.instagram.com/kecamatan_pasawahan/?igshid=YmMyMTA2M2Y%3D" target="_blank"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
	</div>
	<script src="<?php echo base_url() ?>assets/frontend/assets/front/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/assets/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/assets/js/sweetalert.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="<?php echo base_url() ?>assets/frontend/assets/js/dataflash.js"></script>

</body>


</html>

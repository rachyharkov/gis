<div class="main-content">
	<!-- Section: inner-header -->
	<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="https://kuningankab.go.id/home/wp-content/uploads/2022/06/banner2.png" style="background-image: url(&quot;https://kuningankab.go.id/home/wp-content/uploads/2022/06/banner2.png&quot;);">
		<div class="container pt-120 pb-60">
			<!-- Section Content -->
			<div class="section-content">
				<div class="row">

					<div class="col-md-6">
						<h2 class="text-theme-colored2 font-36">Kontak</h2>
						<ol class="breadcrumb text-left mt-10 white">
							<li><a href="#">Home</a></li>
							<li class="active">Kontak</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="divider">
		<div class="container pt-50 pb-70">
			<div class="row pt-10">
				<div class="col-md-5">
					<h4 class="mt-0 mb-30 line-bottom-theme-colored-2">Map Lokasi </h4>
					<!-- Google Map HTML Codes -->
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63382.94451425237!2d108.39611439711533!3d-6.838453234756621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f189ef252bfd3%3A0x78c2230740930976!2sKec.%20Pasawahan%2C%20Kabupaten%20Kuningan%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1674919783817!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
				<div class="col-md-7">
					<h4 class="mt-0 mb-30 line-bottom-theme-colored-2">Kontak Kami</h4>
					<p>Untuk pertanyaan seputar Objek Wisata Kecamatan Pasawahan Kab.Kuningan, Bisa hubungi kami dengan mengisi form dibawah ini.</p>
					<!-- Contact Form -->
					<form id="contact_form" name="contact_form" class="" action="<?= base_url() ?>landing/action_kontak" method="post">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group mb-30">
									<input id="form_name" name="nama" class="form-control" type="text" placeholder="Nama Lengkap" required="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group mb-30">
									<input id="form_email" name="email" class="form-control required" type="email" placeholder="Email">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group mb-30">
									<input id="form_subject" name="no_hp" class="form-control required" type="text" placeholder="No Hp">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group mb-30">
									<input id="form_phone" name="subjek" class="form-control required" type="text" placeholder="Subjek">
								</div>
							</div>
						</div>
						<div class="form-group mb-30">
							<textarea id="form_message" name="deskripsi" class="form-control required" rows="7" placeholder="Deskripsi"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-flat btn-primary bg-hover-theme-colored mr-5" data-loading-text="Please wait...">Send your message</button>
						</div>
					</form>
				</div>
			</div>
			<div class="row mt-60">
				<div class="col-sm-12 col-md-4">
					<div class="contact-info text-center bg-silver-light border-1px pt-60 pb-60">
						<i class="fa fa-phone font-36 mb-10 text-theme-colored2"></i>
						<h4>Telpon Kami</h4>
						<h6 class="text-gray">Telp. : 0852-XXXX-XXXX</h6>
					</div>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="contact-info text-center bg-silver-light border-1px pt-50 pb-50">
						<i class="fa fa-map-marker font-36 mb-10 text-theme-colored2"></i>
						<h4>Alamat</h4>
						<h6 class="text-gray">Jalan Raya Pasawahan No.07 Desa/Kecamatan Pasawahan Kabupaten Kuningan</h6>
					</div>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="contact-info text-center bg-silver-light border-1px pt-60 pb-60">
						<i class="fa fa-envelope font-36 mb-10 text-theme-colored2"></i>
						<h4>Email</h4>
						<h6 class="text-gray">Info@kec-pasawahan.com</h6>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

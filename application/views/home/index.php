<div class="">
	<center>

		<script type="text/javascript">
			//fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
			function tampilkanwaktu() {
				//buat object date berdasarkan waktu saat ini
				var waktu = new Date();
				//ambil nilai jam, 
				//tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
				var sh = waktu.getHours() + "";
				//ambil nilai menit
				var sm = waktu.getMinutes() + "";
				//ambil nilai detik
				var ss = waktu.getSeconds() + "";
				//tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
				document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
			}
		</script>

		<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
			<center>
				<h1>
					<span id="clock"></span>
				</h1>
			</center>
			<?php
			$hari = date('l');
			/*$new = date('l, F d, Y', strtotime($Today));*/
			if ($hari == "Sunday") {
				echo "Minggu";
			} elseif ($hari == "Monday") {
				echo "Senin";
			} elseif ($hari == "Tuesday") {
				echo "Selasa";
			} elseif ($hari == "Wednesday") {
				echo "Rabu";
			} elseif ($hari == "Thursday") {
				echo ("Kamis");
			} elseif ($hari == "Friday") {
				echo "Jum'at";
			} elseif ($hari == "Saturday") {
				echo "Sabtu";
			}
			?>,
			<?php
			$tgl = date('d');
			echo $tgl;
			$bulan = date('F');
			if ($bulan == "January") {
				echo " Januari ";
			} elseif ($bulan == "February") {
				echo " Februari ";
			} elseif ($bulan == "March") {
				echo " Maret ";
			} elseif ($bulan == "April") {
				echo " April ";
			} elseif ($bulan == "May") {
				echo " Mei ";
			} elseif ($bulan == "June") {
				echo " Juni ";
			} elseif ($bulan == "July") {
				echo " Juli ";
			} elseif ($bulan == "August") {
				echo " Agustus ";
			} elseif ($bulan == "September") {
				echo " September ";
			} elseif ($bulan == "October") {
				echo " Oktober ";
			} elseif ($bulan == "November") {
				echo " November ";
			} elseif ($bulan == "December") {
				echo " Desember ";
			}
			$tahun = date('Y');
			echo $tahun;
			?>
	</center>
	<br>
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

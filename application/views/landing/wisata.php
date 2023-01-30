<div class="main-content">
	<!-- Section: inner-header -->
	<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="https://kuningankab.go.id/home/wp-content/uploads/2022/06/banner2.png" style="background-image: url(&quot;https://kuningankab.go.id/home/wp-content/uploads/2022/06/banner2.png&quot;);">
		<div class="container pt-120 pb-60">
			<!-- Section Content -->
			<div class="section-content">
				<div class="row">

					<div class="col-md-6">
						<h2 class="text-theme-colored2 font-36">Objek Wisata</h2>
						<ol class="breadcrumb text-left mt-10 white">
							<li><a href="#">Home</a></li>
							<li class="active">Objek Wisata</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Section: About -->
	<section>

		<div class="container">
			<table class="table table-striped table-schedule">
				<thead>
					<tr class="bg-theme-colored">
						<th>Jam Buka</th>
						<th>Objek Wisata</th>
						<th>Alamat</th>
						<th>Deskripsi</th>
						<th>Fasilitas</th>
						<th>Harga Tiket</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($wisata as $row) { ?>
						<tr>
							<td><?php echo $row->jam_buka ?> - <?php echo $row->jam_tutup ?></td>
							<td><strong><?php echo $row->nama_objek_wisata ?></strong></td>
							<td><?php echo $row->alamat ?></td>
							<td><?php echo $row->deskripsi ?></td>
							<td><?php echo $row->fasilitas ?></td>
							<td><?php echo rupiah($row->harga_tiket)  ?> / Orang</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</section>
</div>

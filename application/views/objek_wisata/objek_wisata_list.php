<div class="modal fade" id="exampleModal2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Video Objek Wisata</h5>
			</div>
			<div class="modal-body">
				<iframe width="100%" src="" height="550" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeVideo">Close</button>
			</div>
		</div>
	</div>
</div>


<div class="page-title">
	<div class="title_left">
		<h3>KELOLA DATA OBJEK_WISATA</h3>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">

				<div class="box-body">
					<div class='row'>
						<div class='col-md-9'>
							<div style="padding-bottom: 10px;">
								<?php echo anchor(site_url('objek_wisata/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?></div>
						</div>
						<div class=' col-md-3'>
							<form action="<?php echo site_url('objek_wisata/index'); ?>" class="form-inline" method="get">
								<div class="input-group">
									<input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
									<span class="input-group-btn">
										<?php
										if ($q <> '') {
										?>
											<a href="<?php echo site_url('objek_wisata'); ?>" class="btn btn-default">Reset</a>
										<?php
										}
										?>
										<button class="btn btn-primary" type="submit">Search</button>
									</span>
								</div>
							</form>
						</div>
					</div>


					<div class="row" style="margin-bottom: 10px">
						<div class="col-md-4 text-center">
							<div style="margin-top: 8px" id="message">
								<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
							</div>
						</div>
						<div class="col-md-1 text-right">
						</div>
						<div class="col-md-3 text-right">

						</div>
					</div>
					<div class="box-body" style="overflow-x: scroll; ">
						<table class="table table-bordered" style="margin-bottom: 10px">
							<tr>
								<th>No</th>
								<th>Nama Objek Wisata</th>
								<th>Alamat</th>
								<th>Jam Buka</th>
								<th>Jam Tutup</th>
								<th>Telpon</th>
								<th>Fasilitas</th>
								<th>Harga Tiket</th>
								<th>Link Video</th>
								<th>Latitude</th>
								<th>Longitude</th>
								<th>Action</th>
							</tr><?php
									foreach ($objek_wisata_data as $objek_wisata) {
									?>
								<tr>
									<td width="10px"><?php echo ++$start ?></td>
									<td><?php echo $objek_wisata->nama_objek_wisata ?></td>
									<td><?php echo $objek_wisata->alamat ?></td>
									<td><?php echo $objek_wisata->jam_buka ?></td>
									<td><?php echo $objek_wisata->jam_tutup ?></td>
									<td><?php echo $objek_wisata->telpon ?></td>
									<td><?php echo $objek_wisata->fasilitas ?></td>
									<td><?php echo $objek_wisata->harga_tiket ?></td>
									<td>
										<button type="button" data-video_id="<?= $objek_wisata->objek_wisata_id ?>" data-video="<?= $objek_wisata->link_video ?>" class="btn btn-success btn-sm video" data-toggle="modal" data-target="#exampleModal2">
											<i class="ace-icon fa fa-eye"></i> View
										</button>
									</td>
									<td><?php echo $objek_wisata->latitude ?></td>
									<td><?php echo $objek_wisata->longitude ?></td>
									<td style="text-align:center" width="200px">
										<?php
										echo anchor(site_url('objek_wisata/update/' . $objek_wisata->objek_wisata_id), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm"');
										echo '  ';
										echo anchor(site_url('objek_wisata/delete/' . $objek_wisata->objek_wisata_id), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
										?>
									</td>
								</tr>
							<?php
									}
							?>
						</table>
						<div class="row">
							<div class="col-md-6">

							</div>
							<div class="col-md-6 text-right">
								<?php echo $pagination ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {
		$(".video").click(function() {
			var theModal = $(this).data("target")
			var video_id = $(this).data("video_id")
			videoSRC = $(this).attr("data-video")

			videoSRCauto = "https://www.youtube.com/embed/" + videoSRC + "?modestbranding=1&rel=1&controls=1&showinfo=1&html5=1&autoplay=0";
			$(theModal + ' iframe').attr('src', videoSRCauto);
			$(theModal + ' button.close').click(function() {
				$(theModal + ' iframe').attr('src', videoSRC);
			});
		});
	});
</script>
<script language="javascript" type="text/javascript">
	$(function() {
		$('#closeVideo').click(function() {
			$('iframe').attr('src', $('iframe').attr('src'));
		});
	});
</script>

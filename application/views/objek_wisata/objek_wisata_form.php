
<div class="modal fade" id="largeModal" id="modal-dialog tabindex=" -1" role="dialog" aria-labelledby="basicModal"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span id="modal_nama_produk"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center><img src="" id="photo_pro" width="100%" /></center>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<div class="page-title">
	<div class="title_left">
		<h3>KELOLA DATA OBJEK_WISATA</h3>
	</div>
	<div class="clearfix"></div>
	<form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="x_panel">
					<div class="box-body">
						<table class='table table-bordered'>
							<tr>
								<td width='200'>Nama Objek Wisata <?php echo form_error('nama_objek_wisata') ?></td>
								<td><input type="text" class="form-control" name="nama_objek_wisata" id="nama_objek_wisata" placeholder="Nama Objek Wisata" value="<?php echo $nama_objek_wisata; ?>" /></td>
							</tr>

							<tr>
								<td width='200'>Alamat <?php echo form_error('alamat') ?></td>
								<td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td>
							</tr>
							<tr>
								<td width='200'>Jam Buka <?php echo form_error('jam_buka') ?></td>
								<td><input type="text" class="form-control" name="jam_buka" id="jam_buka" placeholder="Jam Buka" value="<?php echo $jam_buka; ?>" /></td>
							</tr>
							<tr>
								<td width='200'>Jam Tutup <?php echo form_error('jam_tutup') ?></td>
								<td><input type="text" class="form-control" name="jam_tutup" id="jam_tutup" placeholder="Jam Tutup" value="<?php echo $jam_tutup; ?>" /></td>
							</tr>
							<tr>
								<td width='200'>Telpon <?php echo form_error('telpon') ?></td>
								<td><input type="text" class="form-control" name="telpon" id="telpon" placeholder="Telpon" value="<?php echo $telpon; ?>" /></td>
							</tr>

							<tr>
								<td width='200'>Fasilitas <?php echo form_error('fasilitas') ?></td>
								<td> <textarea class="form-control" rows="3" name="fasilitas" id="fasilitas" placeholder="Fasilitas"><?php echo $fasilitas; ?></textarea></td>
							</tr>
							<tr>
								<td width='200'>Harga Tiket <?php echo form_error('harga_tiket') ?></td>
								<td><input type="text" class="form-control" name="harga_tiket" id="harga_tiket" placeholder="Harga Tiket" value="<?php echo $harga_tiket; ?>" /></td>
							</tr>
							<tr>
								<td width='200'>Link Video <?php echo form_error('link_video') ?></td>
								<td><input type="text" class="form-control" name="link_video" id="link_video" placeholder="Link Video" value="<?php echo $link_video; ?>" /></td>
							</tr>
							<tr>
								<td width='200'>Latitude <?php echo form_error('latitude') ?></td>
								<td><input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="<?php echo $latitude; ?>" /></td>
							</tr>
							<tr>
								<td width='200'>Longitude <?php echo form_error('longitude') ?></td>
								<td><input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="<?php echo $longitude; ?>" /></td>
							</tr>

						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="x_panel">
					<div class="box-body">
						<table class="table table-bordered table-sm" id="dynamic_field">
							<thead>
								<tr>
									<th>Photo Objek Wisata</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php if ($this->uri->segment(2) == 'update' || $this->uri->segment(2) == 'update_action') {
								 $pic = $this->db->query("SELECT * from objek_wisata_pic where objek_wisata_id='$objek_wisata_id'")->result();
								
								?>
								<?php foreach ($pic as $rows) { ?>
									<tr id="detail_file<?= $rows->objek_wisata_id ?>">
										<td>
											<center><a href="#" class="btn btn-primary" data-toggle="modal" data-id="<?= $rows->objek_wisata_id ?>" id="view_gambar" data-photo="<?= $rows->photo?>" data-target="#largeModal" title="View Gambar"><i class="fa fa-eye"></i> Lihat Photo</a></center>
											<input type="hidden" name="id_asal[]" value="<?= $rows->objek_wisata_pic_id ?>" class="form-control  @error('id_asal') is-invalid @enderror" />
										</td>
										</td>

										<td>
											<button type="button" id="<?= $rows->objek_wisata_id ?>" class="btn btn-danger btn_remove_data">X</button>
										</td>
									</tr>
								<?php } ?>
							<?php }  ?>
							<tr>
								<td><input type="file" name="photo[]" class="form-control" value="" />
									<input type="hidden" name="jml_photo[]" class="form-control" value="" />

								</td>
								<td><button type="button" name="add_photo" id="add_photo" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
							</tr>
						</table>
					</div>
				</div>
				<input type="hidden" name="objek_wisata_id" value="<?php echo $objek_wisata_id; ?>" />
				<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
				<a href="<?php echo site_url('objek_wisata') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
			</div>
		</div>
	</form>
</div>
<script>
	$(document).ready(function() {
		var i = 1;
		$('#add_photo').click(function() {
			i++;
			$('#dynamic_field').append('<tr id="row' + i +
				'"><td><input type="file" name="photo[]" class="form-control" required="" /><input type="hidden" name="jml_photo[]" class="form-control" value="" /></td><td><button type="button" name="remove" id="' +
				i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
		});

		$(document).on('click', '.btn_remove', function() {
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});

		$(document).on('click', '.btn_remove_data', function() {
            var bid = this.id;
            console.log(bid)
            var trid = $(this).closest('tr').attr('id');
            $('#' + trid + '').remove();
        });

		$(document).on('click', '#view_gambar', function() {
            var photo = $(this).data('photo');
            $('#largeModal #photo_pro').attr("src", "../../assets/img/photo/" + photo);
            console.log(photo);
        })

	});
</script>

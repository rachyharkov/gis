
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

<style>
	.map-embed {
		width: 100%;
		height: 400px;
	}

	
	a.resultnya {
		color: #1e7ad3;
		text-decoration: none;
	}

	a.resultnya:hover { text-decoration: underline }
	.search-box {
		position: relative;
		margin: 0 auto;
		width: 300px;
	}

	.search-box input#search-loc {
		height: 26px;
		width: 100%;
		padding: 0 12px 0 25px;
		background: white url("https://cssdeck.com/uploads/media/items/5/5JuDgOa.png") 8px 6px no-repeat;
		border-width: 1px;
		border-style: solid;
		border-color: #a8acbc #babdcc #c0c3d2;
		border-radius: 13px;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		-ms-box-sizing: border-box;
		-o-box-sizing: border-box;
		box-sizing: border-box;
		-webkit-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
		-moz-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
		-ms-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
		-o-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
		box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
	}

	.search-box input#search-loc:focus {
		outline: none;
		border-color: #66b1ee;
		-webkit-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		-moz-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		-ms-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		-o-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
	}
	.search-box .results {
		display: none;
		position: absolute;
		top: 35px;
		left: 0;
		right: 0;
		z-index: 9999;
		padding: 0;
		margin: 0;
		border-width: 1px;
		border-style: solid;
		border-color: #cbcfe2 #c8cee7 #c4c7d7;
		border-radius: 3px;
		background-color: #fdfdfd;
		background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fdfdfd), color-stop(100%, #eceef4));
		background-image: -webkit-linear-gradient(top, #fdfdfd, #eceef4);
		background-image: -moz-linear-gradient(top, #fdfdfd, #eceef4);
		background-image: -ms-linear-gradient(top, #fdfdfd, #eceef4);
		background-image: -o-linear-gradient(top, #fdfdfd, #eceef4);
		background-image: linear-gradient(top, #fdfdfd, #eceef4);
		-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		-ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		-o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
	}

	.search-box .results li { display: block }

	.search-box .results li:first-child { margin-top: -1px }

	.search-box .results li:first-child:before, .search-box .results li:first-child:after {
		display: block;
		content: '';
		width: 0;
		height: 0;
		position: absolute;
		left: 50%;
		margin-left: -5px;
		border: 5px outset transparent;
	}

	.search-box .results li:first-child:before {
		border-bottom: 5px solid #c4c7d7;
		top: -11px;
	}

	.search-box .results li:first-child:after {
		border-bottom: 5px solid #fdfdfd;
		top: -10px;
	}

	.search-box .results li:first-child:hover:before, .search-box .results li:first-child:hover:after { display: none }

	.search-box .results li:last-child { margin-bottom: -1px }

	.search-box .results a {
		display: block;
		position: relative;
		margin: 0 -1px;
		padding: 6px 40px 6px 10px;
		color: #808394;
		font-weight: 500;
		text-shadow: 0 1px #fff;
		border: 1px solid transparent;
		border-radius: 3px;
	}

	.search-box .results a span { font-weight: 200 }

	.search-box .results a:before {
		content: '';
		width: 18px;
		height: 18px;
		position: absolute;
		top: 50%;
		right: 10px;
		margin-top: -9px;
		background: url("https://cssdeck.com/uploads/media/items/7/7BNkBjd.png") 0 0 no-repeat;
	}

	.search-box .results a:hover {
		text-decoration: none;
		color: #fff;
		text-shadow: 0 -1px rgba(0, 0, 0, 0.3);
		border-color: #2380dd #2179d5 #1a60aa;
		background-color: #338cdf;
		background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #59aaf4), color-stop(100%, #338cdf));
		background-image: -webkit-linear-gradient(top, #59aaf4, #338cdf);
		background-image: -moz-linear-gradient(top, #59aaf4, #338cdf);
		background-image: -ms-linear-gradient(top, #59aaf4, #338cdf);
		background-image: -o-linear-gradient(top, #59aaf4, #338cdf);
		background-image: linear-gradient(top, #59aaf4, #338cdf);
		-webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
		-moz-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
		-ms-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
		-o-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
		box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
	}

	.lt-ie9 .search input#search-loc { line-height: 26px }

</style>

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
					<div class="box-body">
						<table class="table table-bordered table-sm">
							<tr>
								<td>
									<label for="latitude">Latitude <?php echo form_error('latitude') ?></label>
									<input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="<?php echo $latitude; ?>" />
								</td>
								<td>
									<label for="longitude"> Longitude <?php echo form_error('longitude') ?></label>
									<input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="<?php echo $longitude; ?>" />
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<div class="search-box">
										<input type="text" class="div-control" name="search-loc" id="search-loc" placeholder="Cari Lokasi"/>
										<ul class="results" >
											
										</ul>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<section>
										<div class="map-embed" id="map-get-location"></div>
										<div class="alert alert-success alert-choose-loc" style="margin-top: 1rem;">
											<i class="fa fa-warning"></i> <strong>Silahkan pilih titik lokasi Objek Wisata</strong>
										</div>
									</section>
								</td>
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

		function checkKosongLatLong() {
			if($('#latitude').val() == '' || $('#longitude').val() == '') {
				$('.alert-choose-loc').show();
			} else {
				$('.alert-choose-loc').hide();
			}
		}

		// ref: https://switch2osm.org/using-tiles/getting-started-with-leaflet/


		// initialize map
		const getLocationMap = L.map('map-get-location');

		// initialize OSM
		const osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
		const osmAttrib='Sebangsa map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
		const osm = new L.TileLayer(osmUrl, {minZoom: 8, maxZoom: 50, attribution: osmAttrib});		
		// render map

		getLocationMap.scrollWheelZoom.disable()
		getLocationMap.setView(new L.LatLng('-6.2349858', '106.9945444'), 17)
		getLocationMap.addLayer(osm)
		// initial hidden marker, and update on click
		const getLocationMapMarker = L.marker([0, 0]).addTo(getLocationMap);								
			
		function getToLoc(lat, lng, displayname = null) {
			const zoom = 17;
			
			$.ajax({
				url: `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`,
				dataType: 'json',
				success: function(data) {
					$('#latitude').val(lat)
					$('#longitude').val(lng)
					if(displayname == null) {
						$('#search-loc').val(data.display_name)
					} else {
						$('#search-loc').val(displayname)
					}
				}
			});
			getLocationMap.setView(new L.LatLng(lat, lng), zoom);
			getLocationMapMarker.setLatLng([lat, lng])
			$('.results').hide();
			checkKosongLatLong()
			
		}

		<?php
			if($button == 'Update') {
				echo "getToLoc($latitude, $longitude)";
			}
		?>
		
		// listen click on map
		getLocationMap.on('click', function(e) {
			// set default lat and lng to 0,0
			const {lat = 0, lng = 0} = e.latlng;
			// update text DOM

			$('#latitude').val(lat)
			$('#longitude').val(lng)
			// update marker position
			getToLoc(lat, lng)
			checkKosongLatLong()

		});

		

		$(document).on('click', '.resultnya', function() {
			
			const {lat = 0, lng = 0, dispname = ''} = $(this).data();
			getToLoc(lat,lng, dispname)
		})

		$('#search-loc').keyup(function() {
			const search = $(this).val();

			if(search.length > 3) {
				$('.results').show();
				const url = 'https://nominatim.openstreetmap.org/search?format=json&q=' + search;
				$('.results').html('<li>Mencari...</li>');
				$.ajax({
					url: url,
					dataType: 'json',
					success: function(data) {
						$('.results').empty();

						$.each(data, function(i, item) {
							$('.results').append('<li><a class="resultnya" href="#" data-lat="' + item.lat + '" data-lng="' + item.lon + '" data-dispname="' + item.display_name + '">' + item.display_name + '<br/><span>Description...</span></a></li>');
						})
					}
				});
			} else {
				$('.results').html('<li>Masukan Pencarian</li>');
			}
		})
		
	});
</script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>


<style>
	.map-embed {
		width: 100%;
		height: 64rem;
	}

	.dataTables_wrapper .dataTables_paginate .paginate_button {
		padding: 0;
	}
	.search-box input#searchField {
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
		margin: 1rem 0;
	}

	.search-box input#searchField:focus {
		outline: none;
		border-color: #66b1ee;
		-webkit-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		-moz-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		-ms-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		-o-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
	}

	.lt-ie9 .search input#searchField { line-height: 26px }

	#table_dynamic_wrapper > div:nth-child(1) {
		display: none;
	}

	#table_dynamic_wrapper > div:nth-child(2) {
		height: 55rem;
	}
</style>

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
								<?php echo anchor(site_url('objek_wisata/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
							</div>
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
					<div class="box-body">
						<div class="row">
							<div class="col-md-5">
								<div class="search-box">
									<input type="text" class="div-control" name="search-loc" id="searchField" placeholder="Cari Nama Lokasi, Lat/Long, atau lainnya..." autocomplete="off"/>
								</div>
								<div class="indikator-lagi-nyari">

								</div>
								<table class="table-bordered" style="margin-bottom: 10px; width: 100%;" id="table_dynamic">
									<thead>
										<tr>
											<th hidden>No</th>
											<th>Nama Objek Wisata</th>
											<th hidden>ID</th>
											<th hidden>Alamat</th>
											<th hidden>Jam Buka</th>
											<th hidden>Jam Tutup</th>
											<th hidden>Telpon</th>
											<th hidden>Fasilitas</th>
											<th hidden>Harga Tiket</th>
											<th hidden>Latitude</th>
											<th hidden>Longitude</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
											foreach ($objek_wisata_data as $objek_wisata) {
											?>
										<tr>
											<td hidden><?php echo ++$start ?></td>
											<td hidden><?php echo $objek_wisata->objek_wisata_id?></td>
											<td><?php echo $objek_wisata->nama_objek_wisata ?></td>
											<td hidden><?php echo $objek_wisata->alamat ?></td>
											<td hidden><?php echo $objek_wisata->jam_buka ?></td>
											<td hidden><?php echo $objek_wisata->jam_tutup ?></td>
											<td hidden><?php echo $objek_wisata->telpon ?></td>
											<td hidden><?php echo $objek_wisata->fasilitas ?></td>
											<td hidden><?php echo $objek_wisata->harga_tiket ?></td>
											<td hidden><?php echo $objek_wisata->latitude ?></td>
											<td hidden><?php echo $objek_wisata->longitude ?></td>
											<td style="text-align:center">
											<div class="btn-group" role="group" aria-label="Basic example">
												<?php
												echo anchor(site_url('objek_wisata/update/' . $objek_wisata->objek_wisata_id), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm"');
												echo '  ';
												echo anchor(site_url('objek_wisata/delete/' . $objek_wisata->objek_wisata_id), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
												?>
												<button type="button" data-video_id="<?= $objek_wisata->objek_wisata_id ?>" data-video="<?= $objek_wisata->link_video ?>" class="btn btn-success btn-sm video" data-toggle="modal" data-target="#exampleModal2">
													<i class="ace-icon fa fa-play"></i>
												</button>
											</div>
											</td>
										</tr>
									<?php
											}
									?>
									</tbody>
								</table>
							</div>
							<div class="col-md-7">
								<section>
									<div class="map-embed" id="map-objek-wisata"></div>
								</section>
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

<script>
	$(document).ready(function() {
		
		var table = $('#table_dynamic').DataTable({
			"lengthChange": false
		});
		// ref: https://switch2osm.org/using-tiles/getting-started-with-leaflet/


		// initialize map
		const getLocationMap = L.map('map-objek-wisata');

		// initialize OSM
		const osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
		const osmAttrib='Map Objek Wisata © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
		const osm = new L.TileLayer(osmUrl, {minZoom: 8, maxZoom: 50, attribution: osmAttrib});		

		getLocationMap.scrollWheelZoom.disable()
		getLocationMap.setView(new L.LatLng('-6.8384545', '108.431134'), 10)
		getLocationMap.addLayer(osm)
		const getLocationMapMarker = L.marker([0, 0]).addTo(getLocationMap);								
		
		function refreshMarkers(data) {
			let list_of_location = data

				
			getLocationMap.eachLayer(function (layer) {
				if (layer.options.attribution !== osmAttrib) {
					getLocationMap.removeLayer(layer);
				}
			})
			
			let list_of_location_html = ''
			for(let i = 0; i < list_of_location.length; i++){

				list_of_location_html += `<li class="list-group-item" data-lat="${list_of_location[i].latitude}" data-lng="${list_of_location[i].longitude}">${list_of_location[i].nama_objek_wisata}</li>`
				let marker = L.marker([list_of_location[i].latitude, list_of_location[i].longitude]).addTo(getLocationMap);
				marker.bindPopup(`<b>${list_of_location[i].nama_objek_wisata}</b><br>${list_of_location[i].alamat}<br>
				<a href="<?php echo base_url('objek_wisata/update/') ?>${list_of_location[i].objek_wisata_id}" class="btn btn-primary" style="color: white; margin-top: 1rem;">Edit</a>
				`);

			}
			$('.results').html(list_of_location_html)
		}

		$("#searchField").on("keyup change", function() {
			var input = $(this);
			table.search(input.val()).draw();
			
			var array = table.rows({ search: 'applied' }).data();
			dataarray = []

			for(let i = 0; i < array.length; i++){
				dataarray.push({
					objek_wisata_id: array[i][1],
					latitude: array[i][9],
					longitude: array[i][10],
					nama_objek_wisata: array[i][2],
					alamat: array[i][3],
				})
			}
			if(input.val() != ''){
				$('.indikator-lagi-nyari').html('<b>Pencarian untuk : </b><i>' + input.val() + '</i> (' + dataarray.length + ' data ditemukan)')
				refreshMarkers(dataarray)
			} else {
				$('.indikator-lagi-nyari').empty()
			}
		});

		function GetListofLocation(){
			$.ajax({
				url: '<?= base_url('objek_wisata/get_list_location') ?>',
				type: 'GET',
				dataType: 'json',
				success: function(data){
					console.log(data)
					refreshMarkers(data)
				}
			})
		}

		GetListofLocation()

		function getToLoc(lat, lng, displayname = null) {
			const zoom = 17;
			
			getLocationMap.setView(new L.LatLng(lat, lng), zoom);
			getLocationMapMarker.setLatLng([lat, lng])
		
		}
	});
</script>
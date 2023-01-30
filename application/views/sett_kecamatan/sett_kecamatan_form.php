<div class="page-title">
	<div class="title_left">
		<h3>UPDATE DATA SETT KECAMATAN</h3>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">

				<div class="box-body">

					<form action="<?php echo $action; ?>" method="post">

						<table class='table table-bordered>' <tr>
							<td >Nama Kecamatan <?php echo form_error('nama_kecamatan') ?></td>
							<td><input type="text" class="form-control" name="nama_kecamatan" id="nama_kecamatan" placeholder="Nama Kecamatan" value="<?php echo $nama_kecamatan; ?>" /></td>
							</tr>

							<tr>
								<td >Alamat <?php echo form_error('alamat') ?></td>
								<td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td>
							</tr>
							<tr>
								<td >Email <?php echo form_error('email') ?></td>
								<td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td>
							</tr>

							<tr>
								<td >Deskripsi <?php echo form_error('deskripsi') ?></td>
								<td> <textarea class="form-control" rows="7" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="hidden" name="kecamatan_id" value="<?php echo $kecamatan_id; ?>" />
									<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
									
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>

<div class="page-title">
	<div class="title_left">
		<h3>EDIT PFORIL</h3>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">

				<div class="box-body">

					<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

						<table class='table table-bordered'>

							<tr>
								<td width='200'>Username <?php echo form_error('username') ?></td>
								<td><input type="text" readonly="" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" /></td>
								<input type="hidden" class="form-control" name="username_lama" id="username_lama" placeholder="username" value="<?php echo $username_lama; ?>" />
							</tr>
							<?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") { ?>
								<tr>
									<td>Password <?php echo form_error('password') ?></td>
									<td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td>
								</tr>
							<?php } else { ?>
								<tr>
									<td>Password <?php echo form_error('password') ?></td>
									<td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />
										<small style="color: red">(Biarkan kosong jika tidak diganti)</small>
									</td>
								</tr>
							<?php } ?>

							<tr>
								<td width='200'>Level <?php echo form_error('level') ?></td>
								<td>
									<?php if ($level == "ADMIN") { ?>
										<input readonly="" type="text" class="form-control" name="level" id="password" placeholder="" value="ADMIN" />
									<?php } else { ?>
										<input readonly="" type="text" class="form-control" name="level" id="password" placeholder="" value="USER" />
									<?php } ?>
								</td>
							</tr>
							<div class="form-group">
								<tr>
									<td>Photo <?php echo form_error('photo') ?></td>
									<td>
										<a href="#modal-dialog" data-bs-toggle="modal"><img src="<?php echo base_url(); ?>assets/img/user/<?= $photo ?>" style="width: 150px;height: 150px;border-radius: 5%;"></img></a>
										<input type="hidden" name="photo_lama" value="<?= $photo ?>">
										<p style="color: red">Note :Pilih photo Jika Ingin Merubah photo</p>
										<input type="file" class="form-control" name="photo" id="photo" placeholder="photo" value="" onchange="return validasiEkstensi()" />
									</td>
								</tr>
							</div>


							<tr>
								<td width='200'>Email <?php echo form_error('email') ?></td>
								<td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
									<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			function validasiEkstensi() {
				var inputFile = document.getElementById('photo');
				var pathFile = inputFile.value;
				var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
				if (!ekstensiOk.exec(pathFile)) {
					alert('Silakan upload file yang memiliki ekstensi .jpeg/.jpg/.png');
					inputFile.value = '';
					return false;
				} else {
					// Preview photo
					if (inputFile.files && inputFile.files[0]) {
						var reader = new FileReader();
						reader.onload = function(e) {
							document.getElementById('preview').innerHTML = '<iframe src="' + e.target.result + '" style="height:400px; width:600px"/>';
						};
						reader.readAsDataURL(inputFile.files[0]);
					}
				}
			}
		</script>

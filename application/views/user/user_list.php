<div class="">
	<div class="title_left">
		<h3>KELOLA DATA USER</h3>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">

				<div class="box-body">
					<div class='row'>
						<div class='col-md-9'>
							<div style="padding-bottom: 10px;">
								<?php echo anchor(site_url('user/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?></div>
						</div>
						<div class='col-md-3'>
							<form action="<?php echo site_url('user/index'); ?>" class="form-inline" method="get">
								<div class="input-group">
									<input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
									<span class="input-group-btn">
										<?php
										if ($q <> '') {
										?>
											<a href="<?php echo site_url('user'); ?>" class="btn btn-default">Reset</a>
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
						<div class="col-md-1 text-right">
						</div>
						<div class="col-md-3 text-right">

						</div>
					</div>
					<div class="box-body" style="overflow-x: scroll; ">
						<table class="table table-bordered" style="margin-bottom: 10px">
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Level</th>
								<th>Photo</th>
								<th>Email</th>
								<th>Action</th>
							</tr><?php
									foreach ($user_data as $user) {
									?>
								<tr>
									<td width="10px"><?php echo ++$start ?></td>
									<td><?php echo $user->username ?></td>
									<td><?php echo $user->level ?></td>
									<td><a href="<?= base_url() ?>user/download/<?php echo $user->photo ?>"><i class="fa fa-download"></i> Download Photo</a></td>
									<td><?php echo $user->email ?></td>
									<td style="text-align:center" width="200px">
										<?php
										echo anchor(site_url('user/update/' . $user->user_id), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm"');
										echo '  ';
										if ($user->user_id != $this->fungsi->user_login()->user_id) {
											echo anchor(site_url('user/delete/' . $user->user_id), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'onclick="javasciprt: return confirm(\'Apakah Data Akan DIhapus ?\')" class="btn btn-danger btn-sm"');
										}

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

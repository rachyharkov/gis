<div class="page-title">
	<div class="title_left">
		<h3>KELOLA DATA KONTAK</h3>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">

				<div class="box-body">
					<div class='row'>
						<div class='col-md-9'>
							<div style="padding-bottom: 10px;"></div>
						</div>
						<div class=' col-md-3'>
							<form action="<?php echo site_url('kontak/index'); ?>" class="form-inline" method="get">
								<div class="input-group">
									<input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
									<span class="input-group-btn">
										<?php
										if ($q <> '') {
										?>
											<a href="<?php echo site_url('kontak'); ?>" class="btn btn-default">Reset</a>
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
								<th>Nama</th>
								<th>Email</th>
								<th>No Hp</th>
								<th>Subjek</th>
								<th>Deskripsi</th>
								<th>Action</th>
							</tr><?php
									foreach ($kontak_data as $kontak) {
									?>
								<tr>
									<td width="10px"><?php echo ++$start ?></td>
									<td><?php echo $kontak->nama ?></td>
									<td><?php echo $kontak->email ?></td>
									<td><?php echo $kontak->no_hp ?></td>
									<td><?php echo $kontak->subjek ?></td>
									<td><?php echo $kontak->deskripsi ?></td>
									<td style="text-align:center" width="200px">
										<?php
										echo anchor(site_url('kontak/delete/' . $kontak->kontak_id), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'onclick="javasciprt: return confirm(\'Apakah Data Akan DIhapus ?\')" class="btn btn-danger btn-sm"');
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

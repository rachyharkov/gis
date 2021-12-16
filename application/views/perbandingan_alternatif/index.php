<div class="">
	<div class="title_left">
		<h3>PERBANDINGAN ALTERNATIF &rarr; <?php echo getKriteriaById($this->uri->segment(3)) ?></h3>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="box-body">
					<div class='row'>
						<div class="box-body">
							<form action="<?= base_url() ?>perbandingan_alternatif/proses" method="post">
								<table class="table table-bordered" style="margin-bottom: 10px">
									<thead>
										<tr>
											<th class="text-center">Alternatif 1</th>
											<th class="text-center">Nilai perbandingan</th>
											<th class="text-center">Alternatif 2</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$query = "SELECT nama_alternatif FROM alternatif ORDER BY alternatif_id";
										$data = $this->db->query($query);
										if ($data->num_rows() > 0) {
											foreach ($data->result() as $row) {
												// push data ke array
												$pilihan[] = $row->nama_alternatif;
											}
										} else {
											echo "Data tidak ditemukan";
											exit();
										}
										?>
										<?php
										//jumlah_data
										$query = $this->db->query('SELECT * FROM alternatif');
										$n = $query->num_rows();

										$urut = 0;
										for ($x = 0; $x <= ($n - 2); $x++) {
											for ($y = ($x + 1); $y <= ($n - 1); $y++) {
												$urut++;
										?>
												<tr>
													<td>
														<div class="radio">
															<label>
																<input name="pilih<?php echo $urut ?>" value="1" checked="" type="radio" class=""> <?php echo $pilihan[$x]; ?>
															</label>
														</div>
													</td>
													<td>
														<div class="radio">
															<label>
																<input name="pilih<?php echo $urut ?>" value="2" type="radio" class=""> <?php echo $pilihan[$y]; ?>
															</label>
														</div>
													</td>
													<td>
														<div class="field">
															<?php
															$nilai = getNilaiPerbandinganAlternatif($x, $y, $this->uri->segment(3));
															?>
															<input type="number" max="12" min="1" class="form-control" name="bobot<?php echo $urut ?>" value="<?php echo $nilai ?>" required>
														</div>
													</td>
												</tr>
										<?php
											}
										}
										?>
									</tbody>
								</table>
								<input type="text" name="jenis" value="<?= $this->uri->segment(3)?>" hidden>
								<br><br>
								<input class="btn btn-danger" type="submit" name="submit" value="SUBMIT">
							</form>




						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="box-body">
					<div class='row'>
						<div class="box-body">
							<div class="alert alert-info alert-dismissible " role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
								</button>
								Tabel Tingkat Kepentingan menurut Saaty (1980)
							</div>
							<table class="table table-bordered" style="margin-bottom: 10px">
								<thead>
									<tr>
										<th>Nilai</th>
										<th>Nama Skala</th>
									</tr>
									<?php
									$query = "SELECT * FROM skala ORDER BY nilai asc";
									$data = $this->db->query($query);
									?>

									<?php if ($data->num_rows() > 0) { ?>
										<?php foreach ($data->result() as $row) { ?>
											<tr>
												<td><?= $row->nilai ?></td>
												<td><?= $row->nama_skala ?></td>
											</tr>
										<?php } ?>
									<?php } else { ?>
										<h5>Data tidak ditemukan</h5>
									<?php } ?>

								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

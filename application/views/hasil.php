<?php

// menghitung perangkingan
$query = "SELECT * FROM kriteria";
$data = $this->db->query($query);

$query2 = "SELECT * FROM alternatif";
$data2 = $this->db->query($query2);

$jmlKriteria 	= $data->num_rows();
$jmlAlternatif	= $data2->num_rows();
$nilai			= array();

// mendapatkan nilai tiap alternatif
for ($x=0; $x <= ($jmlAlternatif-1); $x++) {
	// inisialisasi
	$nilai[$x] = 0;

	for ($y=0; $y <= ($jmlKriteria-1); $y++) {
		$alternatif_id 	= getAlternatifID($x);
		$kriteria_id	= getKriteriaID($y);

		$pv_alternatif	= getAlternatifPV($alternatif_id,$kriteria_id);
		$pv_kriteria	= getKriteriaPV($kriteria_id);

		$nilai[$x]	 	+= ($pv_alternatif * $pv_kriteria);
	}
}

// update nilai ranking
for ($i=0; $i <= ($jmlAlternatif-1); $i++) { 
	$alternatif_id = getAlternatifID($i);
	$query = "INSERT INTO ranking VALUES ($alternatif_id,$nilai[$i]) ON DUPLICATE KEY UPDATE nilai=$nilai[$i]";
	$result = $this->db->query($query);
	if (!$result) {
		echo "Gagal mengupdate ranking";
		exit();
	}
}

?>


<section class="content" id="content2" style="padding: 20px;">
	<h2 class="ui header">Hasil Perhitungan</h2>
	<table class="table table-bordered">
		<thead>
		<tr>
			<th>Overall Composite Height</th>
			<th>Priority Vector (rata-rata)</th>
			<?php
			for ($i=0; $i <= ($jmlAlternatif-1); $i++) { 
				echo "<th>".getAlternatifNama($i)."</th>\n";
			}
			?>
		</tr>
		</thead>
		<tbody>

		<?php
			for ($x=0; $x <= ($jmlKriteria-1) ; $x++) { 
				echo "<tr>";
				echo "<td>".getKriteriaNama($x)."</td>";
				echo "<td>".round(getKriteriaPV(getKriteriaID($x)),5)."</td>";

				for ($y=0; $y <= ($jmlAlternatif-1); $y++) { 
					echo "<td>".round(getAlternatifPV(getAlternatifID($y),getKriteriaID($x)),5)."</td>";
				}


				echo "</tr>";
			}
		?>
		</tbody>

		<tfoot>
		<tr>
			<th colspan="2">Total</th>
			<?php
			for ($i=0; $i <= ($jmlAlternatif-1); $i++) { 
				echo "<th>".round($nilai[$i],5)."</th>";
			}
			?>
		</tr>
		</tfoot>

	</table>

	<div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
				  <div class="col-md-6 col-sm-6 col-xs-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Peringkat</th>
									<th>Alternatif</th>
									<th>Nilai</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query_rangking  = "SELECT nama_alternatif,nilai FROM alternatif,ranking WHERE alternatif.alternatif_id = ranking.alternatif_id ORDER BY nilai DESC";
									$result = $this->db->query($query_rangking); ?>
									<?php 
									$i = 0;
									$labels = [];
									$nilai = [];
									foreach ($result->result() as $row) {
										$labels[] = $row->nama_alternatif;
										$nilai[] = $row->nilai;
										$i++; ?>
									<tr>
										<td><?= $i ?></td>
										<td><?php echo $row->nama_alternatif ?></td>
										<td><?php echo $row->nilai ?></td>
									</tr>
									<?php } ?>
									
									
							</tbody>
						</table>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <canvas id="myChart"></canvas>
                    </div>                   
                  </div>
                </div>
              </div>
            </div>
			
			
</section>
<button class="btn btn-info" id="downloadPDF" style="background: #0155a4; border-color: #0155a4;">Download</button>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($labels); ?>,
        datasets: [{
            label: 'Grafik Rangking',
            data: <?= json_encode($nilai); ?>,
            fill: true,
            backgroundColor: getRandomColor,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

function getRandomColor() {
            var letters = '0123456789ABCDEF'.split('');
            var color = '#';
            for (var i = 0; i < 6; i++ ) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
</script>

<script type="text/javascript">
$('#downloadPDF').click(function () {
    domtoimage.toPng(document.getElementById('content2'))
        .then(function (blob) {
            var pdf = new jsPDF('l', 'mm', [$('#content2').width(), $('#content2').height()]);

            pdf.addImage(blob, 'PNG', 0, 0, $('#content2').width(), $('#content2').height());
            pdf.save("export.pdf");

            that.options.api.optionsChanged();
        });
});

</script>

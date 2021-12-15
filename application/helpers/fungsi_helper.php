<?php
function check_already_login(){

    $ci =& get_instance();
    $user_session = $ci->session->userdata('userid');
    if ($user_session){
        redirect('home');
    }
}

//untuk semua ctrl cek seesion login dan session unit
function is_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userid');
    if (!$user_session){
        redirect('auth');        
    }
}

function check_admin()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->level != 'ADMIN') {
        redirect('home');
    }
}

function getNilaiPerbandinganKriteria($kriteria1,$kriteria2)
{
	$ci = &get_instance();
	$kriteria_id1 = getKriteriaID($kriteria1);
	$kriteria_id2 = getKriteriaID($kriteria2);
	$query  = "SELECT nilai FROM perbandingan_kriteria WHERE kriteria1 = $kriteria_id1 AND kriteria2 = $kriteria_id2";
	$result = $ci->db->query($query);
	// cek jml data
	$jml = $ci->db->query("SELECT nilai FROM perbandingan_kriteria WHERE kriteria1 = $kriteria_id1 AND kriteria2 = $kriteria_id2");

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	if ($jml->num_rows()==0) {
		$nilai = 1;
	} else {
		foreach ($result->result() as $row) {
			$nilai= $row->nilai;
		}
	}
	return $nilai;

}

function getKriteriaID($no_urut) {
	$ci = &get_instance();
	$query  = "SELECT kriteria_id FROM kriteria ORDER BY kriteria_id";
	$result = $ci->db->query($query);
	foreach ($result->result() as $row) {
		$listID[] = $row->kriteria_id;
	}
	return $listID[($no_urut)];
}

// memasukkan nilai priority vektor kriteria
function inputKriteriaPV ($kriteria_id,$pv) {
	$ci = &get_instance();
	$query = "SELECT * FROM pv_kriteria WHERE kriteria_id=$kriteria_id";
	$result = $ci->db->query($query);

	$jml = $ci->db->query("SELECT * FROM pv_kriteria WHERE kriteria_id=$kriteria_id");

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if ($jml->num_rows()==0) {
		$query2 = "INSERT INTO pv_kriteria (kriteria_id, nilai) VALUES ($kriteria_id, $pv)";
	} else {
		$query2 = "UPDATE pv_kriteria SET nilai=$pv WHERE kriteria_id=$kriteria_id";
	}
	$result2 = $ci->db->query($query2);
	if(!$result2) {
		echo "Gagal memasukkan / update nilai priority vector kriteria";
		exit();
	}

}

// mencari Principe Eigen Vector (λ maks)
function getEigenVector($matrik_a,$matrik_b,$n) {
	$eigenvektor = 0;
	for ($i=0; $i <= ($n-1) ; $i++) {
		$eigenvektor += ($matrik_a[$i] * (($matrik_b[$i]) / $n));
	}

	return $eigenvektor;
}

// mencari Cons Index
function getConsIndex($matrik_a,$matrik_b,$n) {
	$eigenvektor = getEigenVector($matrik_a,$matrik_b,$n);
	$consindex = ($eigenvektor - $n)/($n-1);
	return $consindex;
}

// Mencari Consistency Ratio
function getConsRatio($matrik_a,$matrik_b,$n) {
	$consindex = getConsIndex($matrik_a,$matrik_b,$n);
	$consratio = $consindex / getNilaiIR($n);
	return $consratio;
}

// menampilkan nilai IR
function getNilaiIR($jmlKriteria) {
	$ci = &get_instance();
	$query  = "SELECT nilai FROM ir WHERE jumlah=$jmlKriteria";
	$result = $ci->db->query($query);
	foreach ($result->result() as $row) {
		$nilaiIR = $row->nilai;
	}
	return $nilaiIR;
}
// mencari nama kriteria
function getKriteriaNama($no_urut) {
	$ci = &get_instance();
	$query  = "SELECT * FROM kriteria";
	$result = $ci->db->query($query);
	foreach ($result->result() as $row) {
		$nama[] = $row->nama_kriteria;
	}
	return $nama[($no_urut)];
}

function inputDataPerbandinganKriteria($kriteria1,$kriteria2,$nilai) {
	$ci = &get_instance();
	$kriteria_id1 = getKriteriaID($kriteria1);
	$kriteria_id2 = getKriteriaID($kriteria2);
	$query = $ci->db->query('SELECT * FROM kriteria');
	$n = $query->num_rows();

	$query  = "SELECT * FROM perbandingan_kriteria WHERE kriteria1 = $kriteria_id1 AND kriteria2 = $kriteria_id2";
	$result = $ci->db->query($query);
	if (!$result) {
		echo "Error !!!";
		exit();
	}
	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if ($result->num_rows() == 0) {
		$query_perbandingan_kriteria = "INSERT INTO perbandingan_kriteria (kriteria1,kriteria2,nilai) VALUES ($kriteria_id1,$kriteria_id2,$nilai)";
	}else{
		$query_perbandingan_kriteria = "UPDATE perbandingan_kriteria SET nilai=$nilai WHERE kriteria1=$kriteria_id1 AND kriteria2=$kriteria_id2";
	}
	$query_perbandingan_kriteria = $ci->db->query($query_perbandingan_kriteria);
	if (!$query_perbandingan_kriteria) {
		echo "Gagal memasukkan data perbandingan";
		exit();
	}
}

// mencari nilai bobot perbandingan alternatif
function getNilaiPerbandinganAlternatif($alternatif1,$alternatif2,$pembanding) {
	$ci = &get_instance();
	$alternatif_id1 = getKriteriaID($alternatif1);
	$alternatif_id2 = getKriteriaID($alternatif2);
	$id_pembanding  = getKriteriaID($pembanding);
	$query  = "SELECT nilai FROM perbandingan_alternatif WHERE alternatif1 = $alternatif_id1 AND alternatif2 = $alternatif_id2 AND pembanding = $id_pembanding";
	$result = $ci->db->query($query);
	// cek jml data
	$jml = $ci->db->query("SELECT nilai FROM perbandingan_alternatif WHERE alternatif1 = $alternatif_id1 AND alternatif2 = $alternatif_id2 AND pembanding = $id_pembanding");

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	if ($jml->num_rows()==0) {
		$nilai = 1;
	} else {
		foreach ($result->result() as $row) {
			$nilai= $row->nilai;
		}
	}
	return $nilai;
}

// mencari ID alternatif
// berdasarkan urutan ke berapa (A1, A2, A3)
function getAlternatifID($no_urut) {
	$ci = &get_instance();
	$query  = "SELECT alternatif_id FROM alternatif ORDER BY alternatif_id";
	$result = $ci->db->query($query);
	foreach ($result->result() as $row) {
		$listID[] = $row->alternatif_id;
	}
	return $listID[($no_urut)];
}

// memasukkan bobot nilai perbandingan alternatif
function inputDataPerbandinganAlternatif($alternatif1,$alternatif2,$pembanding,$nilai) {
	$ci = &get_instance();
	$alternatif_id1 = getAlternatifID($alternatif1);
	$alternatif_id2 = getAlternatifID($alternatif2);
	$id_pembanding  = getKriteriaID($pembanding);

	$query  = "SELECT * FROM perbandingan_alternatif WHERE alternatif1 = $alternatif_id1 AND alternatif2 = $alternatif_id2 AND pembanding = $id_pembanding";
	$result = $ci->db->query($query);

	// var_dump($result);
	// exit();

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	if ($result->num_rows() == 0) {
		$query = "INSERT INTO perbandingan_alternatif (alternatif1,alternatif2,pembanding,nilai) VALUES ($alternatif_id1,$alternatif_id2,$id_pembanding,$nilai)";
	}else{
		$query = "UPDATE perbandingan_alternatif SET nilai=$nilai WHERE alternatif1=$alternatif_id1 AND alternatif2=$alternatif_id2 AND pembanding=$id_pembanding";
	}
	$query = $ci->db->query($query);
	if (!$query) {
		echo "Gagal memasukkan data perbandingan";
		exit();
	}
}

// mencari nama alternatif
function getAlternatifNama($no_urut) {

	$ci = &get_instance();
	$query  = "SELECT * FROM alternatif";
	$result = $ci->db->query($query);
	foreach ($result->result() as $row) {
		$nama[] = $row->nama_alternatif;
	}
	return $nama[($no_urut)];
}

function inputAlternatifPV ($alternatif_id,$kriteria_id,$pv) {
	//batas
	$ci = &get_instance();
	$query  = "SELECT * FROM pv_alternatif WHERE alternatif_id = $alternatif_id AND kriteria_id = $kriteria_id";
	$result = $ci->db->query($query);
	$jml = $ci->db->query("SELECT * FROM pv_alternatif WHERE alternatif_id = $alternatif_id AND kriteria_id = $kriteria_id");

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	if ($jml->num_rows()==0) {
		$query2 = "INSERT INTO pv_alternatif (alternatif_id,kriteria_id,nilai) VALUES ($alternatif_id,$kriteria_id,$pv)";
	} else {
		$query2 = "UPDATE pv_alternatif SET nilai=$pv WHERE alternatif_id=$alternatif_id AND kriteria_id=$kriteria_id";
	}

	$result2 = $ci->db->query($query2);
	if (!$result2) {
		echo "Gagal memasukkan / update nilai priority vector alternatif";
		exit();
	}

}

function getAlternatifPV($alternatif_id,$kriteria_id) {
	$ci = &get_instance();
	$query = "SELECT nilai FROM pv_alternatif WHERE alternatif_id=$alternatif_id AND kriteria_id=$kriteria_id";
	$result = $ci->db->query($query);
	foreach ($result->result() as $row) {
		$pv = $row->nilai;
	}
	return $pv;
}

// mencari priority vector kriteria
function getKriteriaPV($kriteria_id) {
	$ci = &get_instance();
	$query = "SELECT nilai FROM pv_kriteria WHERE kriteria_id =$kriteria_id";
	$result = $ci->db->query($query);
	foreach ($result->result() as $row) {
		$pv = $row->nilai;
	}
	return $pv;
}




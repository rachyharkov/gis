<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
require 'vendor/autoload.php';

class Import extends CI_Controller {
public function __construct(){
	parent::__construct();
}

public function import(){
		if(isset($_POST['import'])){
			$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

			if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
			 
			    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
			    $extension = end($arr_file);
			 
			    if('csv' == $extension) {
			        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			    } else {
			        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			    }
			 
			    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
			     
			    $sheetData = $spreadsheet->getActiveSheet()->toArray();
			    $jml = 0;
			    for($i = 1;$i < count($sheetData);$i++)
			    {

			    	$kode_alternatif = $sheetData[$i]['1'];
			        $nama_alternatif     = $sheetData[$i]['2'];
			        $password = sha1($sheetData[$i]['1']);

					$query = "SELECT * FROM alternatif where kode_alternatif='$kode_alternatif'";
					$data = $this->db->query($query);

			        if ($data->num_rows() > 0) {
			        }else{
						$query = "INSERT INTO alternatif (alternatif_id,kode_alternatif,nama_alternatif,password) values ('','$kode_alternatif','$nama_alternatif','$password')";
						$result = $this->db->query($query);
			        }
			        
			    }
			    $data1 =$jml;
			    $data2 ='Data di Import';
			    $result = $data2;
			    $this->session->set_flashdata('message',$result);
           		redirect(site_url('Alternatif'));

			}
			 
			}
	}

	

}

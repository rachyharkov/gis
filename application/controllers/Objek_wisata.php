<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Objek_wisata extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Objek_wisata_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->uri->segment(3));

		if ($q <> '') {
			$config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'index.php/objek_wisata/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'index.php/objek_wisata/index/';
			$config['first_url'] = base_url() . 'index.php/objek_wisata/index/';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = FALSE;
		$config['total_rows'] = $this->Objek_wisata_model->total_rows($q);
		$objek_wisata = $this->Objek_wisata_model->get_limit_data($config['per_page'], $start, $q);
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul>';
		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'objek_wisata_data' => $objek_wisata,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
		);
		$this->template->load('template', 'objek_wisata/objek_wisata_list', $data);
	}

	public function read($id)
	{
		$row = $this->Objek_wisata_model->get_by_id($id);
		if ($row) {
			$data = array(
				'objek_wisata_id' => $row->objek_wisata_id,
				'nama_objek_wisata' => $row->nama_objek_wisata,
				'alamat' => $row->alamat,
				'deskripsi' => $row->deskripsi,
				'jam_buka' => $row->jam_buka,
				'jam_tutup' => $row->jam_tutup,
				'telepon' => $row->telepon,
				'fasilitas' => $row->fasilitas,
				'harga_tiket' => $row->harga_tiket,
				'link_video' => $row->link_video,
				'latitude' => $row->latitude,
				'longitude' => $row->longitude,
			);
			$this->template->load('template', 'objek_wisata/objek_wisata_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('objek_wisata'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('objek_wisata/create_action'),
			'objek_wisata_id' => set_value('objek_wisata_id'),
			'nama_objek_wisata' => set_value('nama_objek_wisata'),
			'alamat' => set_value('alamat'),
			'deskripsi' => set_value('deskripsi'),
			'jam_buka' => set_value('jam_buka'),
			'jam_tutup' => set_value('jam_tutup'),
			'telepon' => set_value('telepon'),
			'fasilitas' => set_value('fasilitas'),
			'harga_tiket' => set_value('harga_tiket'),
			'link_video' => set_value('link_video'),
			'latitude' => set_value('latitude'),
			'longitude' => set_value('longitude'),
		);
		$this->template->load('template', 'objek_wisata/objek_wisata_form', $data);
	}

	public function create_action()
	{
		$data = array(
			'nama_objek_wisata' => $this->input->post('nama_objek_wisata', TRUE),
			'alamat' => $this->input->post('alamat', TRUE),
			'deskripsi' => $this->input->post('deskripsi', TRUE),
			'jam_buka' => $this->input->post('jam_buka', TRUE),
			'jam_tutup' => $this->input->post('jam_tutup', TRUE),
			'telepon' => $this->input->post('telepon', TRUE),
			'fasilitas' => $this->input->post('fasilitas', TRUE),
			'harga_tiket' => $this->input->post('harga_tiket', TRUE),
			'link_video' => $this->input->post('link_video', TRUE),
			'latitude' => $this->input->post('latitude', TRUE),
			'longitude' => $this->input->post('longitude', TRUE),
			'haruskahsayabuatdatabaru' => $this->input->post('haruskahsayabuatdatabaru', TRUE) ?? false,
		);

		$response = array(
			"status" => "",
			"message" => ""
		);

		$cekApakahadanamasama = $this->cek_name($data['nama_objek_wisata']);

		if ($cekApakahadanamasama && $data['haruskahsayabuatdatabaru'] == false) {
			$response['status'] = "error-name-used";
			$response['message'] = "Nama objek wisata sudah ada";
			$response['id'] = $cekApakahadanamasama;
			return $this->output->set_content_type('application/json')->set_output(json_encode($response));
		}

		$response = array(
			"status" => "success",
			"message" => $data
		);

		$jml_photo       = $_POST['jml_photo'];

		unset($data['haruskahsayabuatdatabaru']); // udah ga kepake lagi, kalo ga dihapus bakal error

		$this->Objek_wisata_model->insert($data);
		$lastId = $this->db->insert_id();

		$jumlah_photo = count($jml_photo);
		if($jumlah_photo > 0) {
			$config['upload_path']          = './assets/img/photo';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 10048;
			$config['encrypt_name']         = true;
			$this->load->library('upload', $config);

			for ($i = 0; $i < $jumlah_photo; $i++) {
				// echo $_FILES['photo']['name'][$i];
				$_FILES['file']['name'] = $_FILES['photo']['name'][$i];
				$_FILES['file']['type'] = $_FILES['photo']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['photo']['error'][$i];
				$_FILES['file']['size'] = $_FILES['photo']['size'][$i];
				$this->upload->do_upload('file');
				$uploadData = $this->upload->data();
				$data2['objek_wisata_id'] = $lastId;
				$data2['photo'] = $uploadData['file_name'];
				$this->db->insert('objek_wisata_pic', $data2);
			}
		}



		$response = array(
			"status" => "success",
			"message" => "Data berhasil disimpan",
		);
		return $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function update($id)
	{
		$row = $this->Objek_wisata_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('objek_wisata/update_action'),
				'objek_wisata_id' => set_value('objek_wisata_id', $row->objek_wisata_id),
				'nama_objek_wisata' => set_value('nama_objek_wisata', $row->nama_objek_wisata),
				'alamat' => set_value('alamat', $row->alamat),
				'deskripsi' => set_value('deskripsi', $row->deskripsi),
				'jam_buka' => set_value('jam_buka', $row->jam_buka),
				'jam_tutup' => set_value('jam_tutup', $row->jam_tutup),
				'telepon' => set_value('telepon', $row->telepon),
				'fasilitas' => set_value('fasilitas', $row->fasilitas),
				'harga_tiket' => set_value('harga_tiket', $row->harga_tiket),
				'link_video' => set_value('link_video', $row->link_video),
				'latitude' => set_value('latitude', $row->latitude),
				'longitude' => set_value('longitude', $row->longitude),
			);
			$this->template->load('template', 'objek_wisata/objek_wisata_update', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('objek_wisata'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('objek_wisata_id', TRUE));
		} else {

			if ($this->input->post('id_asal') == null) {
				$tidak_terhapus = [];
			} else {
				$tidak_terhapus = $this->input->post('id_asal');
			}
			$new2 = "('" . implode("','", $tidak_terhapus) . "')";

			$objek_wisata_id = $this->input->post('objek_wisata_id');
			$query = "SELECT * from objek_wisata_pic where objek_wisata_id='$objek_wisata_id' and objek_wisata_pic_id NOT IN $new2";
			$unlink_db_gambar = $this->db->query($query)->result();
			foreach ($unlink_db_gambar as $value) {
				$target_file = './assets/img/photo/' . $value->photo;
				unlink($target_file);
				$this->db->query("DELETE FROM objek_wisata_pic WHERE photo = '$value->photo'");
			}

			$jml_photo       = $_POST['jml_photo'];
			$config['upload_path']          = './assets/img/photo';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 10048;
			$config['encrypt_name']         = true;
			$this->load->library('upload', $config);

			$jumlah_data = count($jml_photo);

			for ($i = 0; $i < $jumlah_data; $i++) {
				if (!empty($_FILES['photo']['name'][$i])) {
					$_FILES['file']['name'] = $_FILES['photo']['name'][$i];
					$_FILES['file']['type'] = $_FILES['photo']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['photo']['error'][$i];
					$_FILES['file']['size'] = $_FILES['photo']['size'][$i];

					if ($this->upload->do_upload('file')) {
						$uploadData = $this->upload->data();
						$data2['objek_wisata_id'] = $objek_wisata_id;
						$data2['photo'] = $uploadData['file_name'];
						$this->db->insert('objek_wisata_pic', $data2);
					}
				}
			}


			$data = array(
				'nama_objek_wisata' => $this->input->post('nama_objek_wisata', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
				'jam_buka' => $this->input->post('jam_buka', TRUE),
				'jam_tutup' => $this->input->post('jam_tutup', TRUE),
				'telepon' => $this->input->post('telepon', TRUE),
				'fasilitas' => $this->input->post('fasilitas', TRUE),
				'harga_tiket' => $this->input->post('harga_tiket', TRUE),
				'link_video' => $this->input->post('link_video', TRUE),
				'latitude' => $this->input->post('latitude', TRUE),
				'longitude' => $this->input->post('longitude', TRUE),
			);

			$this->Objek_wisata_model->update($this->input->post('objek_wisata_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('objek_wisata'));
		}
	}

	public function delete($id)
	{
		$row = $this->Objek_wisata_model->get_by_id($id);

		if ($row) {
			// $objek_wisata_id = $row->objek_wisata_id;
			// $pic = $this->db->query("SELECT * from objek_wisata_pic where objek_wisata_id='$objek_wisata_id'")->result();

			// foreach ($pic as $value) {
			// 	$target_file = './assets/img/photo/' . $value->photo;
			// 	unlink($target_file);
			// 	$this->db->query("DELETE FROM objek_wisata_pic WHERE photo = '$value->photo'");
			// }

			// $this->Objek_wisata_model->delete($id);
			$data = array(
				'deleted_at' => date('Y-m-d H:i:s'),
			);
			$this->Objek_wisata_model->update($id, $data);

			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('objek_wisata'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('objek_wisata'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_objek_wisata', 'nama objek wisata', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		$this->form_validation->set_rules('jam_buka', 'jam buka', 'trim|required');
		$this->form_validation->set_rules('jam_tutup', 'jam tutup', 'trim|required');
		$this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
		$this->form_validation->set_rules('fasilitas', 'fasilitas', 'trim|required');
		$this->form_validation->set_rules('harga_tiket', 'harga tiket', 'trim|required');
		$this->form_validation->set_rules('link_video', 'link video', 'trim|required');
		$this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'longitude', 'trim|required');

		$this->form_validation->set_rules('objek_wisata_id', 'objek_wisata_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function get_list_location()
	{
		// output this data as json
		$data = array();
		foreach ($this->Objek_wisata_model->get_all() as $row) {
			$data[] = array(
				'objek_wisata_id' => $row->objek_wisata_id,
				'nama_objek_wisata' => $row->nama_objek_wisata,
				'alamat' => $row->alamat,
				'deskripsi' => $row->deskripsi,
				'jam_buka' => $row->jam_buka,
				'jam_tutup' => $row->jam_tutup,
				'telepon' => $row->telepon,
				'fasilitas' => $row->fasilitas,
				'harga_tiket' => $row->harga_tiket,
				'link_video' => $row->link_video,
				'latitude' => $row->latitude,
				'longitude' => $row->longitude,
			);
		}
		echo json_encode($data);
	}

	public function location_get()
	{
		// get query params of q
		$q = $this->input->get('q');
		$data = $this->Objek_wisata_model->get_by_name($q);
		echo json_encode($data);
	}

	public function cek_name()
	{
		$nama = $this->input->post('nama_objek_wisata', TRUE);
		$cek = $this->db->query("SELECT * from objek_wisata where nama_objek_wisata ='$nama'");
		if ($cek->num_rows() > 0) {
			return $cek->row()->objek_wisata_id;
		}
	}
}

/* End of file Objek_wisata.php */
/* Location: ./application/controllers/Objek_wisata.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-28 03:01:54 */
/* http://harviacode.com */

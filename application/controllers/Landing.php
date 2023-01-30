<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Objek_wisata_model');
		$this->load->model('Kontak_model');
	}

	public function index()
	{
		$this->template->load('landing', 'landing/index');
	}

	public function wisata()
	{
		$wisata = $this->Objek_wisata_model->get_all();
		$data = array(
			'wisata' => $wisata,
		);

		$this->template->load('landing', 'landing/wisata', $data);
	}

	public function kontak()
	{
		$this->template->load('landing', 'landing/kontak');
	}

	public function action_kontak()
	{
		$data = array(
			'nama' => $this->input->post('nama', TRUE),
			'email' => $this->input->post('email', TRUE),
			'no_hp' => $this->input->post('no_hp', TRUE),
			'subjek' => $this->input->post('subjek', TRUE),
			'deskripsi' => $this->input->post('deskripsi', TRUE),
		);

		$this->Kontak_model->insert($data);
		$this->session->set_flashdata('message', 'Pesan Berhasil Dikirim');
		redirect(site_url('landing/kontak'));
	}

	public function lokasi()
	{

		$data = array(
			'list_objek_wisata' => $this->Objek_wisata_model->get_all(),
			'da_controller' => $this,
		);

		$this->load->view('landing/lokasi', $data);
	}

	public function ListPicture($id)
	{
		if ($id == null) {
			echo '404';
		} else {
			$data_pics = $this->Objek_wisata_model->get_objek_wisata_picture_by_id($id);

			$data = array();

			if ($data_pics != null) {
				foreach ($data_pics as $key => $value) {
					$data[] = $value->photo;
				}
			} else {
				$data[] = 'default.png';
			}

			return $data;
		}
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

	public function getDetail($id_objek_wisata)
	{

		$row = $this->Objek_wisata_model->get_by_id($id_objek_wisata);
		$pictures = $this->ListPicture($id_objek_wisata);

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
			'pictures' => $pictures,
		);
		$this->load->view('landing/detail_objek_wisata', $data, FALSE);
	}

	public function searchPlace()
	{
		$q = $this->input->get('q');
		$data = $this->Objek_wisata_model->searchPlace($q);
		echo json_encode($data);
	}
}

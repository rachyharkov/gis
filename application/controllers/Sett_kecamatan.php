<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Sett_kecamatan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Sett_kecamatan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->uri->segment(3));

		if ($q <> '') {
			$config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'index.php/sett_kecamatan/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'index.php/sett_kecamatan/index/';
			$config['first_url'] = base_url() . 'index.php/sett_kecamatan/index/';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = FALSE;
		$config['total_rows'] = $this->Sett_kecamatan_model->total_rows($q);
		$sett_kecamatan = $this->Sett_kecamatan_model->get_limit_data($config['per_page'], $start, $q);
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul>';
		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'sett_kecamatan_data' => $sett_kecamatan,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
		);
		$this->template->load('template', 'sett_kecamatan/sett_kecamatan_list', $data);
	}

	public function read($id)
	{
		$row = $this->Sett_kecamatan_model->get_by_id($id);
		if ($row) {
			$data = array(
				'kecamatan_id' => $row->kecamatan_id,
				'nama_kecamatan' => $row->nama_kecamatan,
				'alamat' => $row->alamat,
				'email' => $row->email,
				'deskripsi' => $row->deskripsi,
			);
			$this->template->load('template', 'sett_kecamatan/sett_kecamatan_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('sett_kecamatan'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('sett_kecamatan/create_action'),
			'kecamatan_id' => set_value('kecamatan_id'),
			'nama_kecamatan' => set_value('nama_kecamatan'),
			'alamat' => set_value('alamat'),
			'email' => set_value('email'),
			'deskripsi' => set_value('deskripsi'),
		);
		$this->template->load('template', 'sett_kecamatan/sett_kecamatan_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama_kecamatan' => $this->input->post('nama_kecamatan', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'email' => $this->input->post('email', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
			);

			$this->Sett_kecamatan_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('sett_kecamatan'));
		}
	}

	public function update($id)
	{
		$row = $this->Sett_kecamatan_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('sett_kecamatan/update_action'),
				'kecamatan_id' => set_value('kecamatan_id', $row->kecamatan_id),
				'nama_kecamatan' => set_value('nama_kecamatan', $row->nama_kecamatan),
				'alamat' => set_value('alamat', $row->alamat),
				'email' => set_value('email', $row->email),
				'deskripsi' => set_value('deskripsi', $row->deskripsi),
			);
			$this->template->load('template', 'sett_kecamatan/sett_kecamatan_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('sett_kecamatan'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('kecamatan_id', TRUE));
		} else {
			$data = array(
				'nama_kecamatan' => $this->input->post('nama_kecamatan', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'email' => $this->input->post('email', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
			);

			$this->Sett_kecamatan_model->update($this->input->post('kecamatan_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('sett_kecamatan/update/1'));
		}
	}

	public function delete($id)
	{
		$row = $this->Sett_kecamatan_model->get_by_id($id);

		if ($row) {
			$this->Sett_kecamatan_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('sett_kecamatan'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('sett_kecamatan'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_kecamatan', 'nama kecamatan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');

		$this->form_validation->set_rules('kecamatan_id', 'kecamatan_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Sett_kecamatan.php */
/* Location: ./application/controllers/Sett_kecamatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-28 02:50:16 */
/* http://harviacode.com */

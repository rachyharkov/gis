<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Kontak extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Kontak_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->uri->segment(3));

		if ($q <> '') {
			$config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'index.php/kontak/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'index.php/kontak/index/';
			$config['first_url'] = base_url() . 'index.php/kontak/index/';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = FALSE;
		$config['total_rows'] = $this->Kontak_model->total_rows($q);
		$kontak = $this->Kontak_model->get_limit_data($config['per_page'], $start, $q);
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul>';
		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'kontak_data' => $kontak,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
		);
		$this->template->load('template', 'kontak/kontak_list', $data);
	}

	public function read($id)
	{
		$row = $this->Kontak_model->get_by_id($id);
		if ($row) {
			$data = array(
				'kontak_id' => $row->kontak_id,
				'nama' => $row->nama,
				'email' => $row->email,
				'no_hp' => $row->no_hp,
				'subjek' => $row->subjek,
				'deskripsi' => $row->deskripsi,
			);
			$this->template->load('template', 'kontak/kontak_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kontak'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('kontak/create_action'),
			'kontak_id' => set_value('kontak_id'),
			'nama' => set_value('nama'),
			'email' => set_value('email'),
			'no_hp' => set_value('no_hp'),
			'subjek' => set_value('subjek'),
			'deskripsi' => set_value('deskripsi'),
		);
		$this->template->load('template', 'kontak/kontak_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama' => $this->input->post('nama', TRUE),
				'email' => $this->input->post('email', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'subjek' => $this->input->post('subjek', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
			);

			$this->Kontak_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('kontak'));
		}
	}

	public function update($id)
	{
		$row = $this->Kontak_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('kontak/update_action'),
				'kontak_id' => set_value('kontak_id', $row->kontak_id),
				'nama' => set_value('nama', $row->nama),
				'email' => set_value('email', $row->email),
				'no_hp' => set_value('no_hp', $row->no_hp),
				'subjek' => set_value('subjek', $row->subjek),
				'deskripsi' => set_value('deskripsi', $row->deskripsi),
			);
			$this->template->load('template', 'kontak/kontak_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kontak'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('kontak_id', TRUE));
		} else {
			$data = array(
				'nama' => $this->input->post('nama', TRUE),
				'email' => $this->input->post('email', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'subjek' => $this->input->post('subjek', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
			);

			$this->Kontak_model->update($this->input->post('kontak_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('kontak'));
		}
	}

	public function delete($id)
	{
		$row = $this->Kontak_model->get_by_id($id);

		if ($row) {
			$this->Kontak_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('kontak'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kontak'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
		$this->form_validation->set_rules('subjek', 'subjek', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');

		$this->form_validation->set_rules('kontak_id', 'kontak_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-01-28 15:27:57 */
/* http://harviacode.com */

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alternatif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Alternatif_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/alternatif/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/alternatif/index/';
            $config['first_url'] = base_url() . 'index.php/alternatif/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Alternatif_model->total_rows($q);
        $alternatif = $this->Alternatif_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'alternatif_data' => $alternatif,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','alternatif/alternatif_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Alternatif_model->get_by_id($id);
        if ($row) {
            $data = array(
		'alternatif_id' => $row->alternatif_id,
		'kode_alternatif' => $row->kode_alternatif,
		'nama_alternatif' => $row->nama_alternatif,
	    );
            $this->template->load('template','alternatif/alternatif_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('alternatif'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('alternatif/create_action'),
	    'alternatif_id' => set_value('alternatif_id'),
	    'kode_alternatif' => set_value('kode_alternatif'),
	    'nama_alternatif' => set_value('nama_alternatif'),
	);
        $this->template->load('template','alternatif/alternatif_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_alternatif' => $this->input->post('kode_alternatif',TRUE),
		'nama_alternatif' => $this->input->post('nama_alternatif',TRUE),
	    );

            $this->Alternatif_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('alternatif'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Alternatif_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('alternatif/update_action'),
		'alternatif_id' => set_value('alternatif_id', $row->alternatif_id),
		'kode_alternatif' => set_value('kode_alternatif', $row->kode_alternatif),
		'nama_alternatif' => set_value('nama_alternatif', $row->nama_alternatif),
	    );
            $this->template->load('template','alternatif/alternatif_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('alternatif'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('alternatif_id', TRUE));
        } else {
            $data = array(
		'kode_alternatif' => $this->input->post('kode_alternatif',TRUE),
		'nama_alternatif' => $this->input->post('nama_alternatif',TRUE),
	    );

            $this->Alternatif_model->update($this->input->post('alternatif_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('alternatif'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Alternatif_model->get_by_id($id);

        if ($row) {
            $this->Alternatif_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('alternatif'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('alternatif'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_alternatif', 'kode alternatif', 'trim|required');
	$this->form_validation->set_rules('nama_alternatif', 'nama alternatif', 'trim|required');

	$this->form_validation->set_rules('alternatif_id', 'alternatif_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Alternatif.php */
/* Location: ./application/controllers/Alternatif.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-03 19:01:08 */
/* http://harviacode.com */
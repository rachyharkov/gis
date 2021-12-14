<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Kriteria_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/kriteria/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/kriteria/index/';
            $config['first_url'] = base_url() . 'index.php/kriteria/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Kriteria_model->total_rows($q);
        $kriteria = $this->Kriteria_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kriteria_data' => $kriteria,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','kriteria/kriteria_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kriteria_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kriteria_id' => $row->kriteria_id,
		'kode_kriteria' => $row->kode_kriteria,
		'nama_kriteria' => $row->nama_kriteria,
	    );
            $this->template->load('template','kriteria/kriteria_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kriteria'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kriteria/create_action'),
	    'kriteria_id' => set_value('kriteria_id'),
	    'kode_kriteria' => set_value('kode_kriteria'),
	    'nama_kriteria' => set_value('nama_kriteria'),
	);
        $this->template->load('template','kriteria/kriteria_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_kriteria' => $this->input->post('kode_kriteria',TRUE),
		'nama_kriteria' => $this->input->post('nama_kriteria',TRUE),
	    );

            $this->Kriteria_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kriteria'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kriteria_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kriteria/update_action'),
		'kriteria_id' => set_value('kriteria_id', $row->kriteria_id),
		'kode_kriteria' => set_value('kode_kriteria', $row->kode_kriteria),
		'nama_kriteria' => set_value('nama_kriteria', $row->nama_kriteria),
	    );
            $this->template->load('template','kriteria/kriteria_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kriteria'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kriteria_id', TRUE));
        } else {
            $data = array(
		'kode_kriteria' => $this->input->post('kode_kriteria',TRUE),
		'nama_kriteria' => $this->input->post('nama_kriteria',TRUE),
	    );

            $this->Kriteria_model->update($this->input->post('kriteria_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kriteria'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kriteria_model->get_by_id($id);

        if ($row) {
            $this->Kriteria_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kriteria'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kriteria'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_kriteria', 'kode kriteria', 'trim|required');
	$this->form_validation->set_rules('nama_kriteria', 'nama kriteria', 'trim|required');

	$this->form_validation->set_rules('kriteria_id', 'kriteria_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-03 19:01:13 */
/* http://harviacode.com */
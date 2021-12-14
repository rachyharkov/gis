<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skala extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Skala_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/skala/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/skala/index/';
            $config['first_url'] = base_url() . 'index.php/skala/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Skala_model->total_rows($q);
        $skala = $this->Skala_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'skala_data' => $skala,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','skala/skala_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Skala_model->get_by_id($id);
        if ($row) {
            $data = array(
		'skala_id' => $row->skala_id,
		'nama_skala' => $row->nama_skala,
		'nilai' => $row->nilai,
	    );
            $this->template->load('template','skala/skala_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('skala'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('skala/create_action'),
	    'skala_id' => set_value('skala_id'),
	    'nama_skala' => set_value('nama_skala'),
	    'nilai' => set_value('nilai'),
	);
        $this->template->load('template','skala/skala_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_skala' => $this->input->post('nama_skala',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
	    );

            $this->Skala_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('skala'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Skala_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('skala/update_action'),
		'skala_id' => set_value('skala_id', $row->skala_id),
		'nama_skala' => set_value('nama_skala', $row->nama_skala),
		'nilai' => set_value('nilai', $row->nilai),
	    );
            $this->template->load('template','skala/skala_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('skala'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('skala_id', TRUE));
        } else {
            $data = array(
		'nama_skala' => $this->input->post('nama_skala',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
	    );

            $this->Skala_model->update($this->input->post('skala_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('skala'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Skala_model->get_by_id($id);

        if ($row) {
            $this->Skala_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('skala'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('skala'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_skala', 'nama skala', 'trim|required');
	$this->form_validation->set_rules('nilai', 'nilai', 'trim|required');

	$this->form_validation->set_rules('skala_id', 'skala_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Skala.php */
/* Location: ./application/controllers/Skala.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-03 19:29:33 */
/* http://harviacode.com */
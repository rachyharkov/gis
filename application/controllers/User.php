<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        check_admin();
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/user/index/';
            $config['first_url'] = base_url() . 'index.php/user/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','user/user_list', $data);
    }

    public function read($id) 
    {
        check_admin();
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'user_id' => $row->user_id,
		'username' => $row->username,
		'password' => $row->password,
		'level' => $row->level,
		'photo' => $row->photo,
		'email' => $row->email,
	    );
            $this->template->load('template','user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        check_admin();
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'user_id' => set_value('user_id'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'level' => set_value('level'),
	    'photo' => set_value('photo'),
	    'email' => set_value('email'),
	);
        $this->template->load('template','user/user_form', $data);
    }
    
    public function create_action() 
    {
        check_admin();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config['upload_path']      = './assets/img/user'; 
            $config['allowed_types']    = 'jpg|png|jpeg'; 
            $config['max_size']         = 10048; 
            $config['file_name']        = 'File-'.date('ymd').'-'.substr(sha1(rand()),0,10); 
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $this->upload->do_upload("photo");
            $data = $this->upload->data();
            $photo =$data['file_name'];
            $data = array(
		'username' => $this->input->post('username',TRUE),
        'password' => sha1($this->input->post('password',TRUE)),
		'level' => $this->input->post('level',TRUE),
		'photo' => $photo,
		'email' => $this->input->post('email',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('user'));
        }
    }

    public function profil() 
    {
        $id = $this->fungsi->user_login()->user_id;
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_profil'),
        'user_id' => set_value('user_id', $row->user_id),
        'username' => set_value('username', $row->username),
        'password' => set_value('password', $row->password),
        'level' => set_value('level', $row->level),
        'photo' => set_value('photo', $row->photo),
        'email' => set_value('email', $row->email),
        );
            $this->template->load('template','user/edit_profile', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user/profil'));
        }
    }
    
    public function update($id) 
    {
        check_admin();
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'user_id' => set_value('user_id', $row->user_id),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'level' => set_value('level', $row->level),
		'photo' => set_value('photo', $row->photo),
		'email' => set_value('email', $row->email),
	    );
            $this->template->load('template','user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function update_profil() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('user_id', TRUE));
        } else {

            $config['upload_path']      = './assets/img/user'; 
            $config['allowed_types']    = 'jpg|png|jpeg'; 
            $config['max_size']         = 10048; 
            $config['file_name']        = 'File-'.date('ymd').'-'.substr(sha1(rand()),0,10); 
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("photo")) {
            $id = $this->input->post('user_id');
            $row = $this->User_model->get_by_id($id);
            $data = $this->upload->data();
            $photo =$data['file_name'];
            if($row->photo==null || $row->photo==''){
            }else{
            $target_file = './assets/img/user/'.$row->photo;
            unlink($target_file);
            }
                }else{
                $photo = $this->input->post('photo_lama');
            }

            if ($this->input->post('password')==''||$this->input->post('password')==null) {            
                 $data = array(
                    'username' => $this->input->post('username',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'photo' => $photo,
                    'level' => $this->input->post('level',TRUE),
                );
            }else{
                $data = array(
                'username' => $this->input->post('username',TRUE),
                'password' => sha1($this->input->post('password',TRUE)),
                'email' => $this->input->post('email',TRUE),
                'photo' => $photo,
                'level' => $this->input->post('level',TRUE),
                );
            }
            $this->User_model->update($this->input->post('user_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user/profil'));
        }
    }

    
    public function update_action() 
    {
        check_admin();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('user_id', TRUE));
        } else {

            $config['upload_path']      = './assets/img/user'; 
            $config['allowed_types']    = 'jpg|png|jpeg'; 
            $config['max_size']         = 10048; 
            $config['file_name']        = 'File-'.date('ymd').'-'.substr(sha1(rand()),0,10); 
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("photo")) {
            $id = $this->input->post('user_id');
            $row = $this->User_model->get_by_id($id);
            $data = $this->upload->data();
            $photo =$data['file_name'];
            if($row->photo==null || $row->photo==''){
            }else{
            $target_file = './assets/img/user/'.$row->photo;
            unlink($target_file);
            }
                }else{
                $photo = $this->input->post('photo_lama');
            }

            if ($this->input->post('password')==''||$this->input->post('password')==null) {            
                 $data = array(
                    'username' => $this->input->post('username',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'photo' => $photo,
                    'level' => $this->input->post('level',TRUE),
                );
            }else{
                $data = array(
                'username' => $this->input->post('username',TRUE),
                'password' => sha1($this->input->post('password',TRUE)),
                'email' => $this->input->post('email',TRUE),
                'photo' => $photo,
                'level' => $this->input->post('level',TRUE),
                );
            }
            $this->User_model->update($this->input->post('user_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        check_admin();
        $row = $this->User_model->get_by_id($id);

        if ($row) {
             if($row->photo==null || $row->photo=='' ){
                }else{
                $target_file = './assets/img/user/'.$row->photo;
                unlink($target_file);
                }
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim');
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('photo', 'photo', 'trim');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function download($gambar){
        force_download('assets/img/user/'.$gambar,NULL);
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-03 11:55:43 */
/* http://harviacode.com */
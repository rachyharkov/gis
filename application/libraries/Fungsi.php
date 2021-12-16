<?php
Class Fungsi{
    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    public function user_login(){
        $this->ci->load->model('User_model');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->User_model->get($user_id)->row();
        return $user_data;
    }

	public function web_login(){
        $this->ci->load->model('Web_model');
        $alternatif_id = $this->ci->session->userdata('alternatif_id');
        $user_data = $this->ci->Web_model->get($alternatif_id)->row();
        return $user_data;
    }

}

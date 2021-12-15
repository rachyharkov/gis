<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perbandingan_alternatif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->library('form_validation');
    }

    public function alt($id)
    {
		$this->template->load('template','perbandingan_alternatif/index');
    }

	public function proses(){
		$this->template->load('template','perbandingan_alternatif/hasil');
	}
		

}


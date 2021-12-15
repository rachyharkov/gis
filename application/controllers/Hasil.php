<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->library('form_validation');
    }

    public function index()
    {
		$this->template->load('template','hasil');
    }

}


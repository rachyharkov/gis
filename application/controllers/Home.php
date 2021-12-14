<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        is_login();
    }

	public function index()
	{
		$this->template->load('template','home/index');
	}
}

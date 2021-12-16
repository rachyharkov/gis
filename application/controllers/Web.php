<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Web extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Web_model');
	}

	function index(){
		check_already_login_web();
		$this->load->view('web/auth');

	}

	public function auth()
  {
    $post =$this->input->post(null, TRUE);
    if (isset($post['login'])){

      $query =$this->Web_model->login($post);
      if($query->num_rows() >0){
        $row =$query->row();
        $params = array(
          'alternatif_id'=>$row->alternatif_id,
          'level' =>'masyarakat'
        );
        $this->session->set_userdata($params);
        echo "<script>window.location='".site_url('web/home')."'</script>";

      } else{
        echo "<script>
        alert('Login Gagal');
        window.location='".site_url('web')."'</script>";
      }
    }
  }

  public function logout()
  {
    $params = array('alternatif_id','level');
    $this->session->unset_userdata($params);
    redirect('web');
  }
	
	function home(){
		is_login_web();
		$this->template->load('web','web/index');

	}
}

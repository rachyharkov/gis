<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Auth extends CI_Controller {

  public function __construct()
    {
      parent::__construct();
      $this->load->model('User_model');
    }

  public function index()
  {
    check_already_login();
    $this->load->view('auth/index');
  }


  public function profile()
  {
    $this->template->load('template','profile');
  }

  public function process()
  {
    $post =$this->input->post(null, TRUE);
    if (isset($post['login'])){
      $this->load->model('User_model');
      $query =$this->User_model->login($post);
      if($query->num_rows() >0){
        $row =$query->row();
        $params = array(
          'userid'=>$row->user_id,
          'level' =>$row->level
        );
        $this->session->set_userdata($params);
        $this->User_model->addHistory($this->fungsi->user_login()->user_id, $this->fungsi->user_login()->username.' Telah melakukan login', date('d/m/Y H:i:s'), $_SERVER['HTTP_USER_AGENT']);
        echo "<script>window.location='".site_url('home')."'</script>";

      } else{
        echo "<script>
        alert('Login Gagal');
        window.location='".site_url('auth')."'</script>";
      }
    }
  }

  public function logout()
  {
    $params = array('userid','level');
    $this->session->unset_userdata($params);
    redirect('auth');

  }

  public function edit_profil($id){
        $data = array(
            'name'            =>$this->input->post('name',true),
            'address'         =>$this->input->post('address',true),
            'email'         =>$this->input->post('email',true),
        );
        $this->User_model->ubah_data($data,$id);
         echo "<script> alert('Data Berhasil diupdate')</script>";
         echo"<script>window.location='".site_url('auth/profile')."'</script>";
         
    }

    public function edit_password($id){
        if (sha1($this->input->post('lama'))==$this->fungsi->user_login()->password) {
            $data = array(
                'password'          => sha1($this->input->post('password',true)),
            );
            $this->User_model->ubah_data($data,$id);
            echo "<script> alert('Data Password Berhasil diupdate')</script>";
            echo"<script>window.location='".site_url('auth/logout')."'</script>";
        }else{
            echo "<script> alert('Password Lama Salah')</script>";
            echo"<script>window.location='".site_url('auth/profile')."'</script>";
        } 
    }


}


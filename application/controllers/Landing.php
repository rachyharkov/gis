<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Objek_wisata_model');
    }

	public function index()
	{

        $data = array(
            'list_objek_wisata' => $this->Objek_wisata_model->get_all(),
            'da_controller' => $this,
        );

		$this->load->view('landing/index', $data);
	}

    public function ListPicture($id)
    {
        if($id == null) {
            echo '404';
        } else {
            $data_pics = $this->Objek_wisata_model->get_objek_wisata_picture_by_id($id);

            $data = array();

            if($data_pics != null) {
                foreach ($data_pics as $key => $value) {
                    $data[] = $value->photo;
                }
            } else {
                $data[] = 'default.jpeg';
            }

            return $data;
        }
    }
}

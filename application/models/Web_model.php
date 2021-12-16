<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function login ($post)
    {
        $this->db->select('*');
        $this->db->from('alternatif');
        $this->db->where('kode_alternatif',$post['username']);
        $this->db->where('password',sha1($post['password']));
        $query=$this->db->get();
        return $query;
    }

	public function get($id = null)
    {
        $this->db->select('alternatif.*');
        $this->db->from('alternatif');
        if ($id !=null){
            $this->db->where('alternatif_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}

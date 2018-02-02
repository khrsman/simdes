<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get($id = NULL){
      if($id){
        $this->db->where('id_user', $id);
        $this->db->limit(1);
      }
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function auth($id,$password){

        $this->db->where('username', $id);
        $this->db->where('password', $password);

        $query = $this->db->get('user');
        // echo $this->db->last_query();
        return $query->result_array();
    }



}

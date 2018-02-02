<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ref_kelurahan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data($search,$from_page,$per_page){
      $where = " where id_kelurahan like '%".$search."%' or id_kecamatan like '%".$search."%' or nama like '%".$search."%' ";
      $where = ($search == '') ? '' : $where;
      $query = $this->db->query("SELECT id_kelurahan,id_kelurahan,id_kecamatan,nama FROM ref_kelurahan ".$where." LIMIT ".$from_page.",".$per_page);

      return array('total'=> $query->num_rows(),
                   'data' => $query->result_array());
    }

    public function get($id){
        $this->db->where('id_kelurahan', $id);
        $this->db->limit(1);
        $query = $this->db->get('ref_kelurahan');
        return $query->result_array();
    }


    public function insert($data){
        $query = $this->db->insert('ref_kelurahan',$data);
        return $query;
    }

    public function update_by_id($data, $id){
        $this->db->where('id_kelurahan',$id);
        $query = $this->db->update('ref_kelurahan',$data);
    }

    public function delete_by_id($id){
        $this->db->where('id_kelurahan',$id);
        $query = $this->db->delete('ref_kelurahan');
    }


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis_surat extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_data($search,$from_page,$per_page){
      $where = " where id_jenis_surat like '%".$search."%' or nama like '%".$search."%' or persyaratan like '%".$search."%' or field_isi like '%".$search."%' or template like '%".$search."%' ";
      $where = ($search == '') ? '' : $where;
      $query = $this->db->query("SELECT id_jenis_surat,nama,persyaratan,field_isi,template FROM jenis_surat ".$where." LIMIT ".$from_page.",".$per_page);

      return array('total'=> $query->num_rows(),
                   'data' => $query->result_array());
    }

    public function get($id){
        $this->db->where('id_jenis_surat', $id);
        $this->db->limit(1);
        $query = $this->db->get('jenis_surat');
        return $query->result_array();
    }


    public function insert($data){
        $query = $this->db->insert('jenis_surat',$data);
        return $query;
    }

    public function update_by_id($data, $id){
        $this->db->where('id_jenis_surat',$id);
        $query = $this->db->update('jenis_surat',$data);
    }

    public function delete_by_id($id){
        $this->db->where('id_jenis_surat',$id);
        $query = $this->db->delete('jenis_surat');
    }


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_config_desa extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_data($search,$from_page,$per_page){
      $where = " where id like '%".$search."%' or kode like '%".$search."%' or nama like '%".$search."%' ";
      $where = ($search == '') ? '' : $where;
      $query = $this->db->query("SELECT id,kode,nama,keterangan FROM config_desa $where LIMIT $from_page,$per_page");

      #tambahkan nomor
      $result = $query->result_array();
      $nomor = $from_page;
      foreach ($result as $key => $value) {
        $nomor++;
        $result[$key] = array('No' => $nomor) + $result[$key];
      }

      $total_data = $this->db->query("select count(*) total from config_desa $where")->result_array()[0]['total'];
      return array('total'=> $total_data,
                   'data' => $result);
    }

    public function get_config(){
        $query = $this->db->get('config_desa');
        return $query->result_array();
    }

    public function get($id){
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get('config_desa');
        return $query->result_array();
    }


    public function insert($data){
        $query = $this->db->insert('config_desa',$data);
        return $query;
    }

    public function update_by_id($data, $id){
        // $this->db->where('id',$id);
        $query = $this->db->update_batch('config_desa',$data,'id');
    }

    public function delete_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->delete('config_desa');
    }


}

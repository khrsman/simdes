<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_setting extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_data($search,$from_page,$per_page){
      $where = " where id_surat like '%".$search."%' or id_jenis_surat like '%".$search."%' or id_warga like '%".$search."%' or nomor like '%".$search."%' or isi like '%".$search."%' or persyaratan like '%".$search."%' or tanggal like '%".$search."%' ";
      $where = ($search == '') ? '' : $where;
      $query = $this->db->query("SELECT id_surat,
        nomor 'Nomor Surat',
        (select nama from jenis_surat where id_jenis_surat = surat.id_jenis_surat) 'Jenis Surat',
        (select nama from warga where id_warga = surat.id_warga) 'Nama Penduduk',
        Tanggal
         FROM surat $where LIMIT $from_page,$per_page");

      #tambahkan nomor
      $result = $query->result_array();
      $nomor = $from_page;
      foreach ($result as $key => $value) {
        $nomor++;
        $result[$key] = array('No' => $nomor) + $result[$key];
      }

      $total_data = $this->db->query("select count(*) total from surat $where")->result_array()[0]['total'];
      return array('total'=> $total_data,
                   'data' => $result);
    }

    public function get($id){
        $this->db->where('id_surat_keterangan', $id);
        $this->db->limit(1);
        $query = $this->db->get('surat_keterangan');
        return $query->result_array();
    }
    public function get_jenis_surat(){
      // $this->db->limit(10);
        $query = $this->db->get('jenis_surat');
        return $query->result_array();
    }
    public function get_detail_jenis_surat($id){
      $this->db->where('id_jenis_surat',$id);
        $query = $this->db->get('jenis_surat');

        return $query->result_array()[0];
    }

    public function insert($data){
        $query = $this->db->insert('surat',$data);
        return $query;
    }

    public function update_by_id($data, $id){
        $this->db->where('id_surat_keterangan',$id);
        $query = $this->db->update('surat_keterangan',$data);
    }

    public function delete_by_id($id){
        $this->db->where('id_surat_keterangan',$id);
        $query = $this->db->delete('surat_keterangan');
    }

    function  get_jenis_surat_by_id($id_jenis_surat){
      $this->db->where('id_jenis_surat',$id_jenis_surat);
      $query = $this->db->get('jenis_surat')->result_array();
      return $query[0];
    }

    function  get_config_desa(){
      $query = $this->db->get('config_desa')->result_array();
      return $query;
    }


}

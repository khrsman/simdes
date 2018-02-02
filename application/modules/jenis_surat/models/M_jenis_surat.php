<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis_surat extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_data($search,$from_page,$per_page){
      $where = " where id_jenis_surat like '%".$search."%' or nama like '%".$search."%' or persyaratan like '%".$search."%' or field_isi like '%".$search."%' or template_nomor like '%".$search."%' or file_surat like '%".$search."%' ";
      $where = ($search == '') ? '' : $where;
      $query = $this->db->query("SELECT id_jenis_surat,nama 'Jenis Surat',template_nomor 'Pola Penomoran' FROM jenis_surat $where LIMIT $from_page,$per_page");

      #tambahkan nomor
      $result = $query->result_array();
      $nomor = $from_page;
      foreach ($result as $key => $value) {
        $nomor++;
        $result[$key] = array('No' => $nomor) + $result[$key];
      }

      $total_data = $this->db->query("select count(*) total from jenis_surat $where")->result_array()[0]['total'];
      return array('total'=> $total_data,
                   'data' => $result);
    }

    public function get($id){
        $this->db->where('id_jenis_surat', $id);
        $this->db->limit(1);
        $data = $this->db->get('jenis_surat')->result_array();

        $field_isi_surat = $data[0]['field_isi'];
        $persyaratan_surat = $data[0]['persyaratan'];
        unset($data[0]['field_isi']);
        unset($data[0]['persyaratan']);


        if($field_isi_surat){
            $field_isi = $this->db->query("select id_field_isi, kode from ref_field_isi where id_field_isi in($field_isi_surat)")->result_array();
          foreach ($field_isi as $key => $value) {
            $data[0][$value['kode']] = $value['id_field_isi'];
          }
        }

        if($persyaratan_surat){
          $persyaratan = $this->db->query("select id_persyaratan, kode from ref_persyaratan where id_persyaratan in($persyaratan_surat)")->result_array();
          foreach ($persyaratan as $key => $value) {
            $data[0][$value['kode']] = $value['id_persyaratan'];
          }
        }





        return $data;
    }

    public function get_field_surat(){
        $query = $this->db->get('ref_field_isi');
        return $query->result_array();
    }
    public function get_persyaratan(){
        $query = $this->db->get('ref_persyaratan');
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

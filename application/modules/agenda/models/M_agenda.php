<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_agenda extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data($search,$from_page,$per_page){

      $query = $this->db->query("SELECT id, date_format(start,'%d/%m/%Y') Tanggal, title 'Nama Kegiatan' FROM agenda order by start desc LIMIT $from_page,$per_page ");

      #tambahkan nomor
      $result = $query->result_array();
      $nomor = $from_page;
      foreach ($result as $key => $value) {
        $nomor++;
        $result[$key] = array('No' => $nomor) + $result[$key];
      }

      $total_data = $this->db->query("select count(*) total from pamong")->result_array()[0]['total'];
      return array('total'=> $total_data,
                   'data' => $result);
    }

    public function get_jumlah_penduduk(){
      $query = $this->db->select('count(*) jumlah')->get('warga');
      return $query->result_array()[0]['jumlah'];
    }
    public function get_jumlah_surat(){
      $query = $this->db->select('count(*) jumlah')->get('surat');
      return $query->result_array()[0]['jumlah'];
    }
    public function get_pamong(){
      $query = $this->db->select('nama, (select nama from jabatan where id_jabatan = pamong.id_jabatan) jabatan')->get('pamong');
      return $query->result_array();
    }



}

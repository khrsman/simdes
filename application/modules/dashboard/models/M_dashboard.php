<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

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

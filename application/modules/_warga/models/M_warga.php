<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_warga extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_data($search,$from_page,$per_page){
      // $where = " where id_warga like '%".$search."%' or no_kk like '%".$search."%' or nik like '%".$search."%' or status_kk like '%".$search."%' or nama like '%".$search."%' or tempat_lahir like '%".$search."%' or tanggal_lahir like '%".$search."%' or jenis_kelamin like '%".$search."%' or golongan_darah like '%".$search."%' or agama like '%".$search."%' or status_kawin like '%".$search."%' or kewarganegaraan like '%".$search."%' or pekerjaan like '%".$search."%' or alamat like '%".$search."%' or rt like '%".$search."%' or rw like '%".$search."%' or desa_kelurahan like '%".$search."%' or telepon like '%".$search."%' or nama_ibu like '%".$search."%' or nama_ayah like '%".$search."%' or nik_ibu like '%".$search."%' or nik_ayah like '%".$search."%' ";
      // $where = ($search == '') ? '' : $where;
      $where = "";
      $query = $this->db->query("SELECT id_warga,nik NIK,nama Nama,no_kk 'No KK', ifnull((select nama from ref_jenis_kelamin where id_jenis_kelamin = warga.id_jenis_kelamin),'-') 'Jenis Kelamin', TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) Umur,alamat Alamat, ifnull((select nama from ref_pekerjaan where id_pekerjaan = warga.id_pekerjaan),'-') Pekerjaan, ifnull((select nama from ref_status_kawin where id_status_kawin = warga.id_status_kawin),'-') Kawin  FROM warga ".$where." LIMIT ".$from_page.",".$per_page);

      $total_data = $this->db->query("select count(*) total from warga $where")->result_array()[0]['total'];
      return array('total'=> $total_data,
                   'data' => $query->result_array());
    }

    public function get($id){
        $this->db->where('id_warga', $id);
        $this->db->limit(1);
        $query = $this->db->get('warga');
        return $query->result_array();
    }
    public function get_by_select($id){
         $this->db->like('nik', $id);
         $this->db->or_like('nama', $id);
         $this->db->select('nik id, concat(nik," - ",nama) text' );
        $query = $this->db->get('warga');
          return $query->result_array();
    }
    public function get_by_nik($nik){
         $this->db->where('nik', $nik);
         $this->db->select("id_warga,nik,nama,ifnull((select nama from ref_jenis_kelamin where id_jenis_kelamin = warga.id_jenis_kelamin),'-') jenis_kelamin,alamat" );
        $query = $this->db->get('warga');
          return $query->result_array()[0];
    }


    public function insert($data){
        $query = $this->db->insert('warga',$data);
        return $query;
    }

    public function update_by_id($data, $id){
        $this->db->where('id_warga',$id);
        $query = $this->db->update('warga',$data);
    }

    public function delete_by_id($id){
        $this->db->where('id_warga',$id);
        $query = $this->db->delete('warga');
    }


}

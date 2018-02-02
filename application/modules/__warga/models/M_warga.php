<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_warga extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_data($search,$from_page,$per_page){
      $where = " where id_warga like '%".$search."%' or no_kk like '%".$search."%' or nik like '%".$search."%' or status_kk like '%".$search."%' or nama like '%".$search."%' or tempat_lahir like '%".$search."%' or tanggal_lahir like '%".$search."%' or id_jenis_kelamin like '%".$search."%' or id_golongan_darah like '%".$search."%' or id_agama like '%".$search."%' or id_status_kawin like '%".$search."%' or id_kewarganegaraan like '%".$search."%' or id_pekerjaan like '%".$search."%' or alamat like '%".$search."%' or rt like '%".$search."%' or rw like '%".$search."%' or id_kelurahan like '%".$search."%' or telepon like '%".$search."%' or nama_ibu like '%".$search."%' or nama_ayah like '%".$search."%' or nik_ibu like '%".$search."%' or nik_ayah like '%".$search."%' or update_time like '%".$search."%' or id_pendidikan like '%".$search."%' or foto like '%".$search."%' ";
      $where = ($search == '') ? '' : $where;
      // $query = $this->db->query("SELECT id_warga,no_kk,nik,status_kk,nama,tempat_lahir,tanggal_lahir,id_jenis_kelamin,id_golongan_darah,id_agama,id_status_kawin,id_kewarganegaraan,id_pekerjaan,alamat,rt,rw,id_kelurahan,telepon,nama_ibu,nama_ayah,nik_ibu,nik_ayah,update_time,id_pendidikan,foto FROM warga $where LIMIT $from_page,$per_page");
        $query = $this->db->query("SELECT id_warga,nik NIK,nama Nama,no_kk 'No KK', ifnull((select nama from ref_jenis_kelamin where id_jenis_kelamin = warga.id_jenis_kelamin),'-') 'Jenis Kelamin', TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) Umur,alamat Alamat, ifnull((select nama from ref_pekerjaan where id_pekerjaan = warga.id_pekerjaan),'-') Pekerjaan, ifnull((select nama from ref_status_kawin where id_status_kawin = warga.id_status_kawin),'-') Kawin  FROM warga order by id_warga desc".$where." LIMIT ".$from_page.",".$per_page);

      #tambahkan nomor
      $result = $query->result_array();
      $nomor = $from_page;
      foreach ($result as $key => $value) {
        $nomor++;
        $result[$key] = array('No' => $nomor) + $result[$key];
      }

      $total_data = $this->db->query("select count(*) total from warga $where")->result_array()[0]['total'];
      return array('total'=> $total_data,
                   'data' => $result);
    }

    public function get($id){
        $this->db->where('id_warga', $id);
        $this->db->limit(1);
        $query = $this->db->get('warga');
        return $query->result_array();
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

    public function get_by_select2($id){
         $this->db->like('nik', $id);
         $this->db->or_like('nama', $id);
         $this->db->select('nik id, concat(nik," - ",nama) text' );
        $query = $this->db->get('warga');
          return $query->result_array();
    }
    public function get_by_nik($nik){
         $this->db->where('nik', $nik);
         $this->db->select("id_warga detail_id_warga ,nik detail_nik,nama detail_nama,tempat_lahir detail_tempat_lahir, tanggal_lahir detail_tanggal_lahir,ifnull((select nama from ref_jenis_kelamin where id_jenis_kelamin = warga.id_jenis_kelamin),'-') detail_jenis_kelamin,alamat detail_alamat" );
        $query = $this->db->get('warga');
          return $query->result_array()[0];
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_surat extends CI_Model
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
        $result[$key] = array('Download' => '', 'No' => $nomor) + $result[$key];
      }

      $total_data = $this->db->query("select count(*) total from surat $where")->result_array()[0]['total'];
      return array('total'=> $total_data,
                   'data' => $result);
    }

    public function get($id){
        $this->db->where('id_jenis_surat', $id);
        $this->db->limit(1);
        $query = $this->db->get('jenis_surat');
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
    public function get_persyaratan($detail){
        $query = $this->db->query("select * from  ref_persyaratan where id_persyaratan in($detail)");
        return $query->result_array();
    }
    public function get_field_isi($detail){
        $query = $this->db->query("select * from ref_field_isi where id_field_isi in($detail)");
        return $query->result_array();
    }
    public function get_data_warga($id){
        $this->db->where('id_warga', $id);
        $this->db->select("nama,
         concat(tempat_lahir,', ',date_format(tanggal_lahir, '%d-%M-%Y')) ttl, tempat_lahir, tanggal_lahir,
         TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) umur,
         (select nama from ref_kewarganegaraan where id_kewarganegaraan = warga.id_kewarganegaraan) warga_negara,
         (select nama from ref_agama where id_agama = warga.id_agama) agama,
         (select nama from ref_jenis_kelamin where id_jenis_kelamin = warga.id_jenis_kelamin) jenis_kelamin,
         (select nama from ref_pekerjaan where id_pekerjaan = warga.id_pekerjaan) pekerjaan,
         (select nama from ref_pendidikan where id_pendidikan = warga.id_pendidikan) pendidikan,
         nama_ibu,
         nama_ayah,
         nik_ibu,
         nik_ayah,
         alamat,
         ' ' kepala_kk,
         no_ktp,
         no_kk,
         nik,
         (select nama from ref_golongan_darah where id_golongan_darah = warga.id_golongan_darah) golongan_darah,
         (select nama from ref_status_kk where id_status_kk = warga.status_kk) status_kk
         ");
        $query = $this->db->get('warga');
        // echo $this->db->last_query();
        return $query->result_array();
    }

    public function insert($data){
        $query = $this->db->insert('surat',$data);
        return $query;
    }
    public function get_data_pamong($id){
        $query = $this->db->query("select * from pamong where id_pamong = $id");
        return $query->result_array()[0];
    }
    public function get_jabatan($id){
        $query = $this->db->query("select * from jabatan where id_jabatan = $id");
        return $query->result_array()[0];
    }

    public function update_by_id($data, $id){
        $this->db->where('id_surat_keterangan',$id);
        $query = $this->db->update('surat_keterangan',$data);
    }

    public function delete_by_id($id){
        $this->db->where('id_surat',$id);
        $query = $this->db->delete('surat');
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

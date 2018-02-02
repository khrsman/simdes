<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_statistik extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_kat_umur(){
     $query =   $this->db->query("select id,nama,
      (SELECT COUNT(id_warga) FROM warga
      WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) >=u.dari
      AND TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) <=u.sampai  ) AS jumlah,
      (SELECT COUNT(id_warga) FROM warga
      WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) >=u.dari
      AND TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) <=u.sampai and id_jenis_kelamin = '1' ) AS laki_laki,
      (SELECT COUNT(id_warga) FROM warga
      WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) >=u.dari
      AND TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) <=u.sampai  and id_jenis_kelamin = '2') AS perempuan
      from ref_umur u");
      return $query->result_array();
    }
    public function get_kat_pendidikan(){
     $query =   $this->db->query("select id_pendidikan,nama,
     (SELECT COUNT(id_warga) FROM warga
      WHERE  id_pendidikan =  p.id_pendidikan ) AS jumlah,
		 (SELECT COUNT(id_warga) FROM warga
      WHERE  id_pendidikan =  p.id_pendidikan and id_jenis_kelamin = '1' ) AS laki_laki,
		(SELECT COUNT(id_warga) FROM warga
      WHERE  id_pendidikan =  p.id_pendidikan and id_jenis_kelamin = '2' ) AS perempuan
      from ref_pendidikan p");
      return $query->result_array();
    }
    public function get_kat_pekerjaan(){
     $query =   $this->db->query("select id_pekerjaan,nama,
     (SELECT COUNT(id_warga) FROM warga
      WHERE  id_pekerjaan =  p.id_pekerjaan ) AS jumlah,
		 (SELECT COUNT(id_warga) FROM warga
      WHERE  id_pekerjaan =  p.id_pekerjaan and id_jenis_kelamin = '1' ) AS laki_laki,
		(SELECT COUNT(id_warga) FROM warga
      WHERE  id_pekerjaan =  p.id_pekerjaan and id_jenis_kelamin = '2' ) AS perempuan
      from ref_pekerjaan p");
      return $query->result_array();
    }
    public function get_kat_status_kawin(){
     $query =   $this->db->query("select id_status_kawin,nama,
     (SELECT COUNT(id_warga) FROM warga
      WHERE  id_status_kawin =  p.id_status_kawin ) AS jumlah,
     (SELECT COUNT(id_warga) FROM warga
      WHERE  id_status_kawin =  p.id_status_kawin and id_jenis_kelamin = '1' ) AS laki_laki,
    (SELECT COUNT(id_warga) FROM warga
      WHERE  id_status_kawin =  p.id_status_kawin and id_jenis_kelamin = '2' ) AS perempuan
      from ref_status_kawin p");
      return $query->result_array();
    }
    public function get_kat_agama(){
     $query =   $this->db->query("select id_agama,nama,
     (SELECT COUNT(id_warga) FROM warga
      WHERE  id_agama =  p.id_agama ) AS jumlah,
     (SELECT COUNT(id_warga) FROM warga
      WHERE  id_agama =  p.id_agama and id_jenis_kelamin = '1' ) AS laki_laki,
    (SELECT COUNT(id_warga) FROM warga
      WHERE  id_agama =  p.id_agama and id_jenis_kelamin = '2' ) AS perempuan
      from ref_agama p");
      return $query->result_array();
    }

    public function get_kat_jenis_kelamin(){
     $query =   $this->db->query("select id_jenis_kelamin,nama,
     (SELECT COUNT(id_warga) FROM warga
      WHERE  id_jenis_kelamin =  p.id_jenis_kelamin ) AS jumlah 
      from ref_jenis_kelamin p");
      return $query->result_array();
    }


}

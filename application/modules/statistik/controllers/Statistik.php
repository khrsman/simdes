<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistik extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_statistik');
          $this->load->library('cb_options');
    }

    // view
    function index(){
    $data['page'] = 'v_statistik';
    $this->load->view('v_main',$data);
    }

    function kat_umur(){
    $data['data'] = $this->M_statistik->get_kat_umur();
    $this->load->view('v_kat_umur',$data);
    }

    function kat_pendidikan(){
    $data['data'] = $this->M_statistik->get_kat_pendidikan();
    $this->load->view('v_kat_pendidikan',$data);
    }
    function kat_pekerjaan(){
    $data['data'] = $this->M_statistik->get_kat_pekerjaan();
    $this->load->view('v_kat_pekerjaan',$data);
    }
    function kat_status_kawin(){
    $data['data'] = $this->M_statistik->get_kat_status_kawin();
    $this->load->view('v_kat_status_kawin',$data);
    }
    function kat_agama(){
    $data['data'] = $this->M_statistik->get_kat_agama();
    $this->load->view('v_kat_agama',$data);
    }
    function kat_jenis_kelamin(){
    $data['data'] = $this->M_statistik->get_kat_jenis_kelamin();
    $this->load->view('v_kat_jenis_kelamin',$data);
    }







}
?>

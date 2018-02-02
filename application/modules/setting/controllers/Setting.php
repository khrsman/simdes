<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_setting');        
    }

    // view
    function index(){
    $data['page'] = 'v_setting';
    $this->load->view('v_main',$data);
    }

    public function page()
    {
      #--------------------------------------------------------------------------------------------------->
      #------------------------------------- Konfigurasi  ------------------------------------------------>
      #--------------------------------------------------------------------------------------------------->
      $per_page = 10; // jumlah data per halaman
      $from_page = $this->input->get('from') ?  $this->input->get('from'): 0; //data dimulai dari ...
      $search = $this->input->get("query") ? $this->input->get("query") : ''; // query pencarian

      #--------------------------------------------------------------------------------------------------->
      #------------------------------------- Ambil data  ------------------------------------------------->
      #--------------------------------------------------------------------------------------------------->

      $data = $this->M_surat->get_data($search,$from_page,$per_page); // ambil data
      $data_table = $data['data']; // data
      $total_rows = $data['total']; // jumlah data
      $total_page = $total_rows/$per_page; //jumlah halaman

      #--------------------------------------------------------------------------------------------------->
      #-------------------------------- Pagination button ------------------------------------------------>
      #--------------------------------------------------------------------------------------------------->
        $link = array();
        $from = 0;
        $count = 0;
        $awal_page = $from_page/$per_page >= 0 ? $from_page/$per_page : 1;
        $awal_page = ($awal_page - 5) > 0? $awal_page-5: 0;

        // looping untuk halaman
        for ($i=$awal_page; $i < $total_page; $i++) {
            if ($count >= 10 || $i >= $total_page) {
                break;
            }
            $from = $i * $per_page;
            $link[$i] = array("page" => $i+1, "from" => $from );
            $count++;
        }
        $first = array("page" => "<<", "from" => 0 );
        $last = array("page" => ">>", "from" => (ceil($total_page)-1) * $per_page );
        $next =   (ceil($total_page)-1) == 0? array("page" => ">", "from" => 0 ): array("page" => ">", "from" => $from_page+$per_page );
        $prev =   array("page" => "<", "from" => $from_page-$per_page );

        if(($awal_page > 2)){
        $link = array( 0 => $first) + array( 1 => $prev) + $link;
        }
        $link = $link + array( "next" => $next) + array( "last" => $last);

        #--------------------------------------------------------------------------------------------------->
        #------------------------------------- Return JSON  ------------------------------------------------>
        #--------------------------------------------------------------------------------------------------->
        $data['value'] = $data_table;
        $data['page'] = $link;

         echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function jenis_surat(){
    $data['jenis_surat'] = $this->M_surat->get_jenis_surat();
    $this->load->view('v_jenis_surat',$data);
    }

    function surat_data(){

    $this->load->view('v_surat_data');
    }

    function create(){
    $jenis_surat = $this->input->get('jenis_surat');

    $detail_jenis_surat = $this->M_surat->get_detail_jenis_surat($jenis_surat);

    $data['persyaratan'] = json_decode($detail_jenis_surat['persyaratan']);
    $data['field_isi'] = json_decode($detail_jenis_surat['field_isi']);
    $data['nama_surat'] = $detail_jenis_surat['nama'];
    $data['id_jenis_surat'] = $jenis_surat;
    $this->load->view('v_buat_surat',$data);
    }


function buat_surat(){
  sleep(2);

  parse_str($this->input->post('data_surat'), $data_surat);
  parse_str($this->input->post('data_warga'), $data_warga);
  parse_str($this->input->post('data_persyaratan'), $data_persyaratan);
  // $file = $this->generate_surat($data_surat,$data_warga,$data_persyaratan);
  // $data['link_file'] = '';//$file;
  echo $file;

  // $this->load->view('v_success',$data);
}

    function generate_surat($data_surat,$data_warga,$data_persyaratan){
      $id_jenis_surat = $data_surat['id_jenis_surat'];
      $file_surat = $this->M_surat->get_jenis_surat_by_id($id_jenis_surat)['file_surat'];
      $nama_surat = $this->M_surat->get_jenis_surat_by_id($id_jenis_surat)['nama'];

      $config_desa= $this->M_surat->get_config_desa();
      foreach ($data_surat as $key => $value) {
        $new_key = "[".$key."]";
       $data_surat_replace[$new_key] = $value;
      }

      foreach ($config_desa as $key => $value) {
          $new_key = "[".$value['kode']."]";
         $data_config_replace[$new_key] = $value['nama'];
      }


      $file = fopen($file_surat,'r');
      $content = stream_get_contents($file);

      $new_content = str_replace(array_keys($data_surat_replace), array_values($data_surat_replace), $content);
      $new_content = str_replace(array_keys($data_config_replace), array_values($data_config_replace), $new_content);
      $new_content = str_replace('[judul_surat]',$nama_surat, $new_content);

      $path_generated = realpath(APPPATH.'../file_surat/generated')."/";
      $rtf_file = $path_generated.$nama_surat.".rtf";
      $generated_file = base_url('file_surat/generated')."/".$nama_surat.".rtf";

      $handle = fopen($rtf_file,'w+');
      fwrite($handle,$new_content);
      fclose($handle);

      return $generated_file;
  }

}
?>

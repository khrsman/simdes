<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class agenda extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_agenda');
    }

    // view
    function index(){
    $data['page'] = 'v_agenda';
    $this->load->view('v_main',$data);
    }

    public function page()
    {
      #--------------------------------------------------------------------------------------------------->
      #------------------------------------- Konfigurasi  ------------------------------------------------>
      #--------------------------------------------------------------------------------------------------->
      $per_page = 20; // jumlah data per halaman
      $from_page = $this->input->get('from') ?  $this->input->get('from'): 0; //data dimulai dari ...
      $search = $this->input->get("query") ? $this->input->get("query") : ''; // query pencarian

      #--------------------------------------------------------------------------------------------------->
      #------------------------------------- Ambil data  ------------------------------------------------->
      #--------------------------------------------------------------------------------------------------->

      $data = $this->M_agenda->get_data($search,$from_page,$per_page); // ambil data
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

    function events(){
      $json = array();
      $data = $this->db->get('agenda');
      echo json_encode($data->result_array());
    }

    function add(){
      $json = array();
      parse_str($this->input->post('data') , $data);
      $data['start'] = DateTime::createFromFormat('d/m/Y', $data['start'])->format('Y-m-d');
      $data['end'] = DateTime::createFromFormat('d/m/Y', $data['end'])->format('Y-m-d');
      $data = $this->db->insert('agenda',$data);
    }

    function get(){
    $id =  $this->input->get('id');
      $data = $this->db->where('id',$id)->get('agenda')->result_array()[0];
      echo json_encode($data);
    }
    function delete(){
    $id =  $this->input->get('id');
    $data = $this->db->where('id',$id)->delete('agenda');
    }


}
?>

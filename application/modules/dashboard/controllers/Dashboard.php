<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_dashboard');
          $this->load->library('cb_options');
    }

    // view
    function index(){
    $data['page'] = 'v_dashboard';
    $data['jumlah_warga'] = $this->M_dashboard->get_jumlah_penduduk();
    $data['jumlah_surat'] = $this->M_dashboard->get_jumlah_surat();
    $data['pamong'] = $this->M_dashboard->get_pamong();
    $data['tanggal_hari_ini'] = $this->tanggal_indo (strftime( "%Y-%m-%d", time()), true);
    $this->load->view('v_main',$data);
    }

    function tanggal_indo($tanggal, $cetak_hari = false)
    {
      $hari = array ( 1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
          );

      $bulan = array (1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
          );
      $split 	  = explode('-', $tanggal);
      $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

      if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
      }
      return $tgl_indo;
    }

}
?>

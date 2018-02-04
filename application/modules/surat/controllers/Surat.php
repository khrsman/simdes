<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Surat extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_surat');
		$this->load->library('cb_options');
	}

	// view

	function index()
	{
		$data['page'] = 'v_surat';
		$data['jenis_surat'] = $this->M_surat->get_jenis_surat();
		$this->load->view('v_main', $data);
	}

	public	function page()
	{

		// --------------------------------------------------------------------------------------------------->
		// ------------------------------------- Konfigurasi  ------------------------------------------------>
		// --------------------------------------------------------------------------------------------------->

		$per_page = 10; // jumlah data per halaman
		$from_page = $this->input->get('from') ? $this->input->get('from') : 0; //data dimulai dari ...
		$search = $this->input->get("query") ? $this->input->get("query") : ''; // query pencarian

		// --------------------------------------------------------------------------------------------------->
		// ------------------------------------- Ambil data  ------------------------------------------------->
		// --------------------------------------------------------------------------------------------------->

		$data = $this->M_surat->get_data($search, $from_page, $per_page); // ambil data
		$data_table = $data['data']; // data
		$total_rows = $data['total']; // jumlah data
		$total_page = $total_rows / $per_page; //jumlah halaman

		// --------------------------------------------------------------------------------------------------->
		// -------------------------------- Pagination button ------------------------------------------------>
		// --------------------------------------------------------------------------------------------------->

		$link = array();
		$from = 0;
		$count = 0;
		$awal_page = $from_page / $per_page >= 0 ? $from_page / $per_page : 1;
		$awal_page = ($awal_page - 5) > 0 ? $awal_page - 5 : 0;

		// looping untuk halaman

		for ($i = $awal_page; $i < $total_page; $i++) {
			if ($count >= 10 || $i >= $total_page) {
				break;
			}

			$from = $i * $per_page;
			$link[$i] = array(
				"page" => $i + 1,
				"from" => $from
			);
			$count++;
		}

		$first = array(
			"page" => "<<",
			"from" => 0
		);
		$last = array(
			"page" => ">>",
			"from" => (ceil($total_page) - 1) * $per_page
		);
		$next = (ceil($total_page) - 1) == 0 ? array(
			"page" => ">",
			"from" => 0
		) : array(
			"page" => ">",
			"from" => $from_page + $per_page
		);
		$prev = array(
			"page" => "<",
			"from" => $from_page - $per_page
		);
		if (($awal_page > 2)) {
			$link = array(
				0 => $first
			) + array(
				1 => $prev
			) + $link;
		}

		$link = $link + array(
			"next" => $next
		) + array(
			"last" => $last
		);

		// --------------------------------------------------------------------------------------------------->
		// ------------------------------------- Return JSON  ------------------------------------------------>
		// --------------------------------------------------------------------------------------------------->

		$data['value'] = $data_table;
		$data['page'] = $link;
		echo json_encode($data, JSON_PRETTY_PRINT);
	}
  function delete(){
    $id = $this->input->post('id');
    $delete = $this->M_surat->delete_by_id($id);
  }

	function buat_surat_page()
	{
		$data['jenis_surat'] = $this->M_surat->get_jenis_surat();
		$this->load->view('v_buat_surat_page', $data);
	}

	function data_surat()
	{
		$this->load->view('v_surat_data');
	}

	function jabatan_pamong(){
		$id = $this->input->get('id');
		$jabatan = $this->db->select('id_jabatan')->where('id_pamong',$id)->get('pamong')->result_array()[0];
		echo json_encode($jabatan);
	}


	function buat_surat_form()
	{
		$jenis_surat = $this->input->get('jenis_surat');
		$detail_jenis_surat = $this->M_surat->get_detail_jenis_surat($jenis_surat);
		$detail_persyaratan = ($detail_jenis_surat['persyaratan'] !== "") ? $detail_jenis_surat['persyaratan'] : 0;
		$detail_field_isi = ($detail_jenis_surat['field_isi'] !== "") ? $detail_jenis_surat['field_isi'] : 0;
		$data['persyaratan'] = $this->M_surat->get_persyaratan($detail_persyaratan);
		$data['field_isi'] = $this->M_surat->get_field_isi($detail_field_isi);
		$data['nama_surat'] = $detail_jenis_surat['nama'];
		$data['id_jenis_surat'] = $jenis_surat;
		$this->load->view('v_buat_surat_form', $data);
	}

	function proses_buat_surat()
	{
		// ambil inputan dari post
		parse_str($this->input->post('data_surat') , $data_surat);
		parse_str($this->input->post('data_warga') , $data_warga_input);
		parse_str($this->input->post('data_persyaratan') , $data_persyaratan);
		parse_str($this->input->post('data_pamong') , $data_pamong);
		$id_jenis_surat = $data_surat['id_jenis_surat'];
		$id_warga = $data_warga_input['detail_id_warga'];
    $id_pamong = $data_pamong['id_pamong'];
    $id_jabatan = $data_pamong['id_jabatan'];

		// ambil data jenis surat
		$data_jenis_surat = $this->M_surat->get_jenis_surat_by_id($id_jenis_surat);
		$nama_file_surat = $data_jenis_surat['file_surat'];
		$nama_surat = $data_jenis_surat['nama'];

		// ambil data warga
		$data_warga = $this->M_surat->get_data_warga($id_warga);

		// ambil data pamong / pejabat desa nya
    $pamong = $this->M_surat->get_data_pamong($id_pamong);
    $jabatan = $this->M_surat->get_jabatan($id_jabatan);

		// ambil data desa
		$config_desa = $this->M_surat->get_config_desa();

		// masukan data pamong kedalam array untuk diproses pada tbs
		$pmg = array();
		$pmg[0]['jabatan'] = $jabatan['nama'];
		$pmg[0]['nip_pamong'] = $pamong['nip'];
		$pmg[0]['nama_pamong'] = $pamong['nama'];

		// masukan data desa kedalam array untuk diproses pada tbs
		foreach($config_desa as $key => $value) {
			$des[0][$value['kode']] = $value['nama'];
		}

		// masukan data warga kedalam array untuk diproses pada tbs
		$srt[0] = array_merge($data_warga[0], $data_surat, array(
			'nama_surat' => $nama_surat
		));

		// data untuk insert kedalam databasee
		$data_insert['id_jenis_surat'] = $id_jenis_surat;
		$data_insert['id_warga'] = $id_warga;
		$data_insert['nomor'] = $data_surat['nomor_surat'];
		$data_insert['isi'] = json_encode($data_surat);
		$data_insert['persyaratan'] = json_encode($data_persyaratan);
		$data_insert['tanggal'] = DateTime::createFromFormat('d/m/Y', $data_surat['tgl_surat'])->format('Y-m-d');
		$data_insert['id_pamong'] = $data_pamong['id_pamong'];
		$data_insert['id_jabatan'] = $data_pamong['id_jabatan'];

    //proses insert dan generate suratnya
		$generate = $this->generate_surat($nama_file_surat, $des, $pmg, $srt);
		$insert = $this->M_surat->insert($data_insert);

	}

	function generate_surat($nama_file_surat, $des, $pmg, $srt)
	{
		$file_template = realpath(APPPATH . '../file_surat/template') . '/' . $nama_file_surat;

		// inisialisasi tbs
		require_once (APPPATH . 'libraries/tbs/tbs_class.php');
		require_once (APPPATH . 'libraries/tbs/tbs_plugin_opentbs.php');
		$TBS = new clsTinyButStrong; // new instance of TBS
		$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin
		$img[] = array(
			'logo' => realpath(APPPATH . '../img') . '/logo_kota.png'
		);

		$TBS->LoadTemplate($file_template, OPENTBS_ALREADY_UTF8);

		$TBS->MergeBlock('des', $des);
		$TBS->MergeBlock('pmg', $pmg);
		$TBS->MergeBlock('srt', $srt);
		$TBS->MergeBlock('img', $img);
		$output_dir = realpath(APPPATH . '../file_surat/generated') . '/';
		$output_web = base_url('file_surat/generated') . '/';
		$output_doc_name = $nama_file_surat;
		$output_pdf_name = '*.pdf';
		$output_pdf = $output_dir . '*.pdf';
		$output_doc = $output_dir . $output_doc_name;

		$TBS->Show(OPENTBS_FILE, $output_doc); // Also merges all [onshow] automatic fields.

		//  $x = shell_exec("libreoffice --headless --convert-to pdf $output_doc --outdir $output_dir");
		$file_email = array(
			'link_doc' => $output_web . $output_doc_name,
			'link_pdf' => $output_web . $output_pdf_name,
			'doc' => $output_doc,
			'pdf' => $output_pdf,
			'name' => $output_doc_name
		);
		echo json_encode($file_email);
	}

  function download_surat()
  {
    $id = $this->input->get('id');
    // ambil data surat dari database
    $surat = $this->db->where('id_surat', $id)->get('surat')->result_array() [0];
    $id_jenis_surat = $surat['id_jenis_surat'];
    $id_warga = $surat['id_warga'];
    $id_pamong = $surat['id_pamong'];
    $id_jabatan = $surat['id_jabatan'];

    // ambil data jenis surat
    $data_jenis_surat = $this->M_surat->get_jenis_surat_by_id($id_jenis_surat);
    $nama_file_surat = $data_jenis_surat['file_surat'];
    $nama_surat = $data_jenis_surat['nama'];

    // ambil data warga
    $data_warga = $this->M_surat->get_data_warga($id_warga);

    //ambil data surat
    $data_surat = json_decode($surat['isi'],true);

    //ambil data pamong
    $pamong = $this->M_surat->get_data_pamong($id_pamong);
    $jabatan = $this->M_surat->get_jabatan($id_jabatan);

    // ambil data desa
    $config_desa = $this->M_surat->get_config_desa();

    // masukan data pamong kedalam array untuk diproses pada tbs
    $pmg = array();
    $pmg[0]['jabatan'] = $jabatan['nama'];
    $pmg[0]['nip_pamong'] = $pamong['nip'];
    $pmg[0]['nama_pamong'] = $pamong['nama'];


    // masukan data desa kedalam array untuk diproses pada tbs
    foreach($config_desa as $key => $value) {
      $des[0][$value['kode']] = $value['nama'];
    }

    // masukan data warga kedalam array untuk diproses pada tbs
    $srt[0] = array_merge($data_warga[0], $data_surat, array(
      'nama_surat' => $nama_surat
    ));

    $this->generate_surat($nama_file_surat, $des, $pmg, $srt);
  }

}

?>

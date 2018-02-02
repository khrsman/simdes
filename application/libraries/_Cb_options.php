
 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Cb_options {
   public function __construct()
       {
               // Assign the CodeIgniter super-object
               $this->CI =& get_instance();
       }


         public function agama()
         {
           $header = '<select class="form-control" name="id_agama" id="id_agama">
             <option value="" selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';

           $data = $this->CI->db->get('ref_agama')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_agama'].'">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_unit = $header.$select_item.$footer;
           echo $cb_unit;
         }

         public function pekerjaan()
         {
           $header = '<select class="form-control" name="id_pekerjaan" id="id_pekerjaan">
             <option selected=""  disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';

           $data = $this->CI->db->get('ref_pekerjaan')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_pekerjaan'].'">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_unit = $header.$select_item.$footer;
           echo $cb_unit;
         }
         public function pamong()
         {
           $header = '<select class="form-control input_validation" name="id_pamong" id="id_pamong">
             <option value="" selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';

           $data = $this->CI->db->get('pamong')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_pamong'].'">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_unit = $header.$select_item.$footer;
           echo $cb_unit;
         }
         public function jabatan()
         {
           $header = '<select class="form-control input_validation" name="id_jabatan" id="id_jabatan">
             <option value="" selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';

           $data = $this->CI->db->get('jabatan')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_jabatan'].'">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_unit = $header.$select_item.$footer;
           echo $cb_unit;
         }



         public function golongan_darah()
         {
           $header = '<select class="form-control" name="id_golongan_darah" id="id_golongan_darah">
             <option selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';

           $data = $this->CI->db->get('ref_golongan_darah')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_golongan_darah'].'">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_unit = $header.$select_item.$footer;
           echo $cb_unit;
         }
         public function pendidikan()
         {
           $header = '<select class="form-control" name="id_pendidikan" id="id_pendidikan">
             <option selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';

           $data = $this->CI->db->get('ref_pendidikan')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_pendidikan'].'">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_unit = $header.$select_item.$footer;
           echo $cb_unit;
         }
         public function status_kawin()
         {
           $header = '<select class="form-control" name="id_status_kawin" id="id_status_kawin">
             <option selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';

           $data = $this->CI->db->get('ref_status_kawin')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_status_kawin'].'">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_unit = $header.$select_item.$footer;
           echo $cb_unit;
         }
         public function kewarganegaraan()
         {
           $header = '<select class="form-control" name="id_kewarganegaraan" id="id_kewarganegaraan">
             <option selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';

           $data = $this->CI->db->get('ref_kewarganegaraan')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_kewarganegaraan'].'">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_unit = $header.$select_item.$footer;
           echo $cb_unit;
         }
         public function kelurahan()
         {
           $header = '<select class="form-control" name="id_kelurahan" id="id_kelurahan">
             <option selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';

           $data = $this->CI->db->get('ref_kelurahan')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_kelurahan'].'">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_unit = $header.$select_item.$footer;
           echo $cb_unit;
         }

         public function jenis_kelamin()
         {
           $header = '<select class="form-control" name="id_jenis_kelamin" id="id_jenis_kelamin">
             <option selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';

           $data = $this->CI->db->get('ref_jenis_kelamin')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_jenis_kelamin'].'">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_unit = $header.$select_item.$footer;
           echo $cb_unit;
         }





         public function bulan()
         {
           $bulan = '<select class="form-control" name="bulan">
             <option selected="">--- PILIH ---</option>
             <option value="1">1 - Januari</option>
             <option value="2">2 - Februari</option>
             <option value="3">3 - Maret</option>
             <option value="4">4 - April</option>
             <option value="5">5 - Mei</option>
             <option value="6">6 - Juni</option>
             <option value="7">7 - Juli</option>
             <option value="8">8 - Agustus</option>
             <option value="9">9 - September</option>
             <option value="10">10 - Oktober</option>
             <option value="11">11 - November</option>
             <option value="12">12 - Desember</option>
             </select>
             ';

           echo $bulan;
         }
 }

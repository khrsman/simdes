<link rel="stylesheet" href="<?php echo base_url() ?>css/khrsman-pagination.css" />

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>jenis_surat</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">jenis_surat</li>
            </ol>
        </section>
        <section class="content">
            <div class="row" style="display:none" id="form_view">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title add_page">Tambah</h3>
                            <h3 class="box-title edit_page">Edit</h3>
                        </div>
                        <div class="box-body">
                            <form role="form" class="form-horizontal xform">
                                <input type="hidden" id="id_jenis_surat" name="id_jenis_surat" >
																<div class="form-group">
                                  <label class="col-sm-4 control-label">Nama</label>
                                  <div class="col-sm-8">
                                      <input type = "text" name="nama" id="nama" class="form-control"  >
                                  </div>
                            </div>
													<div class="form-group">
                                  <label class="col-sm-4 control-label">Persyaratan</label>
                                  <div class="col-sm-8">
                                    <div class="checkbox">
                                      <label for=""><input type="checkbox" name="persyaratan[]" value="fotokopi_ktp"  id="fotokopi_ktp" >Fotokopi KTP</label>
                                    </div>
                                    <div class="checkbox">
                                      <label for=""><input type="checkbox" name="persyaratan[]" value="fotokopi_kk" id="fotokopi_kk">Fotokopi KK</label>
                                    </div>
                                    <div class="checkbox">
                                      <label for=""><input type="checkbox" name="persyaratan[]" value="surat_keterangan" id="surat_keterangan">Surat keterangan</label>
                                    </div>
                                    <div class="checkbox">
                                      <label for=""><input type="checkbox" name="persyaratan[]" value="formulir_kk" id="formulir_kk">Formulir KK</label>
                                    </div>
                                  </div>
                            </div>

													<div class="form-group">
                                  <label class="col-sm-4 control-label">Field isi</label>
                                  <div class="col-sm-8">
                                    <div class="checkbox">
                                      <label for=""><input type="checkbox" name="field_isi[]" value="nomor_surat" id="nomor_surat">Nomor Surat</label>
                                    </div>
                                    <div class="checkbox">
                                      <label for=""><input type="checkbox" name="field_isi[]" value="keperluan" id="keperluan">Keperluan</label>
                                    </div>
                                    <div class="checkbox">
                                      <label for=""><input type="checkbox" name="field_isi[]" value="keterangan" id="keterangan">Keterangan</label>
                                    </div>
                                    <div class="checkbox">
                                      <label for=""><input type="checkbox" name="field_isi[]" value="masa_berlaku" id="masa_berlaku">Masa Berlaku</label>
                                    </div>
                                  </div>
                            </div>
													<div class="form-group">
                                  <label class="col-sm-4 control-label">Template</label>
                                  <div class="col-sm-8">
                                      <input type = "text" name="template" id="template" class="form-control"  >
                                  </div>
                            </div>
                            </form>
                        </div>
                        <div class="box-footer">
                            <a class="btn btn-danger" id="btn_cancel_page"><span class="fa fa-remove "></span> Cancel</a>
                            <a class="btn btn-primary add_page" id="btn_save"><span class="fa fa-check "></span> Simpan</a>
                            <a class="btn btn-primary edit_page" id="btn_update"><span class="fa fa-check "></span> update</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="data_view">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <button class="btn btn-primary" id="btn_add_page"><span class="fa fa-plus"></span> Tambah</button>
                        </div>
                        <div class="box-body">                          
                            <table id="table" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</section>
<script src="<?php echo base_url() ?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url() ?>js/khrsman-pagination.js"></script>
<script type="text/javascript">
$(document).ready(function () {
pagination = $('#table').pagination({
    href:"<?php echo site_url() ?>/jenis_surat/page",
    // plus_column: ,
    hide: "id_jenis_surat",
    edit: "id_jenis_surat",
    edit_custom: true,
    delete: "id_jenis_surat",
    search: true,
  });
  pagination.init();
      });
</script>
<script src="<?php echo base_url() ?>js/khrsman-process.js"></script>
<script type="text/javascript">
var page = window.location.href;
var url_edit =  page+'/get_for_edit';

$('body').on('click', '.btn_edit_custom', function() {
  var id = $(this).val();
  $.ajax({
      type: "GET",
      url: url_edit,
      data: {id: id},
      success: function (resdata) {
        $('.edit_page').show();
        $('.edit_protection').prop('readonly', true);
        $('.add_page').hide();
      $('#data_view').hide();
      $('#form_view').show();

      var arr = JSON.parse(resdata);
      $.each(arr[0], function(key, value){
        var id_val = key;
        $("#"+id_val).val(value);
        jso = tryParseJSON(value);
        if(jso){
        $.each(jso, function(key1,value1){
          $("#"+value1).prop('checked', true);
        })
      }

      });
      },
      error: function (jqXHR, exception) {
        // pesan error menggunakan notify.js
        $.notify({
          title: "Error :",
          message: "Telah terjadi kesalahan!",
          icon: 'fa fa-check'
        },{
          type: "danger"
        });
      }
  });
});


var allInputs = $(":input");
var allCheckboxes=$('[type=checkbox]');

var my_var = '{"nomor_surat":"1","keperluan":"keperluan","keterangan":"keterangan","masa_berlaku":"april"}';
var my_var2 = '["fotokopi_ktp","fotokopi_kk","surat_keterangan","formulir_kk"]';

jso = tryParseJSON(my_var2);
console.log(jso);
function tryParseJSON (jsonString){
    try {
        var o = JSON.parse(jsonString);
        if (o && typeof o === "object") {
            return o;
        }
    }
    catch (e) { }
    return false;
};
</script>

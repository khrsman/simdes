<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-danger box-solid ">
                <div class="box-header">
                    <h4 class="box-title">
                        Buat <?php echo $nama_surat ?>
                    </h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <input type="hidden" name="data_jenis_surat" id="data_jenis_surat" value="4">
                        <div class="col-md-3">
                            <div class="box box-default box-solid">
                                <div class="box-header with-border">
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title">Data warga</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <style media="screen">
                                        .table {
                                            font-size: 12px;
                                            border: 5px;
                                        }
                                        input {
                                            outline: none;
                                            border: none;
                                            background-color: transparent;
                                        }
                                    </style>
                                      <form class="form_data_warga">
                                        <div class="form-group">
                                            <div class="" style="padding:5px">
                                                <select class="form-control input_validation" id="input_warga"></select>
                                            </div>
                                        </div>
                                    <table class="table">
                                        <input type="hidden" name="detail_id_warga" id="detail_id_warga">
                                        <tr>
                                            <td>NIK</td>
                                            <td> <input type="text" name="detail_nik" id="detail_nik" value=""> </td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td> <input type="text" name="detail_nama" id="detail_nama" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat tanggal lahir</td>
                                            <td> <input type="text" name="detail_tempat_lahir" id="detail_tempat_lahir" value="">
                                                <input type="text" name="detail_tanggal_lahir" id="detail_tanggal_lahir" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td> <input type="text" name="detail_jenis_kelamin" id="detail_jenis_kelamin" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td> <input type="text" name="detail_alamat" id="detail_alamat" value=""></td>
                                        </tr>
                                    </table>
                                  </form>
                                </div>
                            </div>

                            <div class="box box-default box-solid">
                                <div class="box-header">
                                    <h4 class="box-title">Persyaratan</h4>
                                </div>
                                <div class="box-body">
                                    <!-- ceklist persyaratan -->
                                    <form class="form_persyaratan">
                                        <div class="form-group">
                                            <?php foreach ($persyaratan as $key => $value) { ?>
                                            <div class="checkbox">
                                                <label for=""><input type="checkbox" name="persyaratan[]" value="<?php echo $value['kode']; ?>">  <?php echo $value['nama']; ?></label>
                                            </div>
                                            <?php            } ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="box box-default box-solid">
                                <div class="box-header">
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title">Data Surat </h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body ">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <form class="form_surat" id="form_data_surat">
                                        <input type="hidden" name="id_jenis_surat" value="<?php echo $id_jenis_surat ?>">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input class="form-control input_validation datepicker" value="<?php echo date('d/m/Y') ?>" name="tgl_surat" id="tgl_surat" type="text">
                                            </div>
                                        </div>
                                          <?php foreach ($field_isi as $key => $value) {
                                            if(strpos($value['kode'], 'sampai') || strpos($value['kode'], 'dari')){
                                              ?>
                                              <div class="form-group">
                                                  <label><?php echo $value['nama']; ?></label>

                                                  <div class="input-group">
                                                      <div class="input-group-addon">
                                                          <i class="fa fa-calendar"></i>
                                                      </div>
                                                      <input class="form-control datepicker" name="<?php echo $value['kode']; ?>" type="text">
                                                  </div>
                                              </div>
                                              <?php
                                            } else{
                                              ?>

                                              <div class="form-group">
                                                  <label><?php echo $value['nama']; ?></label>
                                                  <input type="text" name="<?php echo $value['kode']; ?>"class="form-control" placeholder="">
                                              </div>
                                              <?php
                                            }
                                          } ?>
                                      </form>
                                    </div>
                                    <div class="col-md-6">
                                      <form class="form_pamong" id="form_pamong">
                                      <div class="form-group">
                                          <label>Nama Penandatangan</label>
                                          <?php echo $this->cb_options->pamong(); ?>
                                      </div>
                                      <div class="form-group">
                                          <label>Jabatan Penandatangan</label>
                                        <?php echo $this->cb_options->jabatan(); ?>
                                      </div>
                                    </form>

                                    </div>
                                  </div>

                                </div>
                                <div class="box-footer clearfix no-border">
                                    <btn type="button" id="buat_surat" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Buat surat</btn>
                                </div>
                            </div>
                        </div>
                    </div>
                    <btn type="button"  class="btn btn-primary pull-left btn_back"><i class="fa fa-arrow-left"></i> Selesai</btn>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<!-- <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false"> -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <h4 class="modal-title">Notifikasi</h4>
            </div>
            <div class="modal-body" style="padding:20">
               <center><img id="loading_process" src="<?php echo base_url('css/images')?>/Loading_icon.gif" width="100px" height="100px"></center>
                <span id="keterangan_proses"></span>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button> -->
              <button type="button" class="btn btn-primary pull-left btn_back">Kembali</button>
              <a type="button" id="download_link" class="btn btn-success" target="_blank" style="display:none">Download</a>
            </div>

        </div>

    </div>
</div>
<!-- /Modal -->

<script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/locales/bootstrap-datepicker.id.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>js/datepicker/css/bootstrap-datepicker.css">

<script type="text/javascript">
    $(".btn_back").click(function() {
        location.reload();
    })

    $("#id_pamong").change(function(){
            id = $(this).val();
            $.get("<?php echo base_url('surat/jabatan_pamong') ?>",{id: id}).done(function(data) {
              arr = JSON.parse(data);
              $("#id_jabatan").val(arr.id_jabatan);


            })
    })

    $("#buat_surat").click(function() {
      if(!validate()){
        return;
      console.log('gagal validasi');
    }
        data_surat = $('.form_surat').serialize();
        data_warga = $('.form_data_warga').serialize();
        data_persyaratan = $('.form_persyaratan').serialize();
        data_pamong = $('.form_pamong').serialize();

         $("#myModal").modal();
        request = $.post("<?php echo base_url('surat/proses_buat_surat') ?>",{data_surat: data_surat, data_warga: data_warga, data_persyaratan:data_persyaratan, data_pamong:data_pamong});
        request.done(function(data) {
          try {
       JSON.parse(data);
               } catch (e) {              
                 $("#loading_process").hide();
                 $("#keterangan_proses").text("Surat belum tersedia");
                   return false;
               }

          arr = JSON.parse(data);

            $("a#download_link").attr("href", arr.link_doc);
            $("#download_link").show();
            $("#loading_process").hide();
            $("#keterangan_proses").text("Surat berhasil dibuat");

        });
    })

    eventSelect = $('#input_warga').select2({
        placeholder: "masukan nik atau nama",
        dropdownCss: { 'max-width': '500px' },
        ajax: {
            url: "<?php echo base_url('warga/get_warga_select2')?>",
            data: function(params) {
                return {
                    id: params.term
                };
            },
            dataType: 'json'
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        }
    });
    eventSelect.on("select2:select", function(e) {
        data = $.get("<?php echo base_url('warga/get_warga_by_nik')?>", {
            nik: e.currentTarget.value
        });
        data.done(function(data) {
            var obj = JSON.parse(data);
            arr = JSON.parse(data);
            $.each(arr, function(key, value) {
                var id_val = key;
                $("#" + id_val).val(value);
            });
        })

    });

    $('.datepicker').datepicker({
          format: 'dd/mm/yyyy',
          todayBtn: "linked",
          language: "id",
          calendarWeeks: true,
          autoclose: true
     });

</script>

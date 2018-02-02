<div class="row">
    <div class="col-md-12">
  <div class="box">
    <div class="box box-success box-solid">
      <div class="box-header">
        <h4 class="box-title"><h3>Surat Keterangan Kelakuan Baik</h2></h4>
      </div>
      <div class="box-body">
    <input type = "hidden" name="data_jenis_surat" id="data_jenis_surat" value="4"  >
  <div class="col-md-3">
  <div class="box box-success box-solid">
  <div class="box-header with-border">
  <i class="ion ion-clipboard"></i>
  <h3 class="box-title">Data warga</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <div class="form-group">
            <!-- <label >NIK / Nama</label> -->
            <div class="" style="padding:5px">
              <select class="form-control" id="input_warga">
              </select>
            </div>
                </div>
                <style media="screen">
                  table{
                    font-size: 12px
                  }
                input{
    outline: none;
    border:none;
    background-color: transparent;}
                </style>
                <table class="table">
                    <input type = "hidden" name="warga_id_warga" id="warga_id_warga" >
                  <tr>
                    <td>NIK</td>
                    <td> <input type="text" name="warga_nik" id="warga_nik" value=""> </td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td> <input type="text" name="warga_nama" id="warga_nama" value=""></td>
                  </tr>
                  <tr>
                    <td>Tempat tanggal lahir</td>
                    <td> <input type="text" name="warga_ttl"  id="warga_ttl" value=""></td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td> <input type="text" name="warga_jk" id="warga_jk" value=""></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td> <input type="text" name="warga_alamat" id="warga_alamat" value=""></td>
                  </tr>
                </table>
  </div>

  <!-- /.box-body -->
  <!-- <div class="box-footer clearfix no-border">
  <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Buat surat</button>
  </div> -->
  </div>
  </div>
    <div class="col-md-8">
      <div class="box box-success box-solid">
        <div class="box-header">
          <h4 class="box-title">Persyaratan</h4>
        </div>
        <div class="box-body">
          <form class="" id="form_persyaratan">
          <div class="form-group">
            <?php foreach ($persyaratan as $key => $value) { ?>
              <div class="checkbox-inline">
                <label for=""><input type="checkbox" name="persyaratan[]" value="<?php echo $value; ?>"><?php echo $value; ?></label>
              </div>
          <?php
             } ?>

          </div>
        </form>
        </div>


  </div>
<div class="box box-primary box-solid">
  <div class="box-header">
    <i class="ion ion-clipboard"></i>
    <h3 class="box-title">Data Surat</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body ">
<form class="" id="form_data_surat">
      <!-- See dist/js/pages/surat_keterangan.js to activate the todoList plugin -->
      <?php foreach ($field_isi as $key => $value) { ?>
        <div class="form-group">
                <label ><?php echo $value; ?></label>
                    <input type = "text" name="<?php echo $value; ?>" id="nomor_surat" class="form-control" placeholder=""  >
          </div>
    <?php
       } ?>
          </form>
  </div>
  <div class="box-footer clearfix no-border">
  <btn type="button" id="buat_surat" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Buat surat</btn>
  </div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>


<script type="text/javascript" src="<?php echo base_url('js') ?>/select2.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
    eventSelect =  $('#input_warga').select2({
        placeholder: "masukan nik atau nama",
        minimumInputLength: 2,
       ajax: {
    url: "<?php echo base_url('warga/get_warga_by_select')?>",
    data: function (params) {
              return {
                  id: params.term
              };
          },
    dataType: 'json'
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
     });
eventSelect.on("select2:select", function (e) {
  data = $.get( "<?php echo base_url('warga/get_warga_by_nik')?>", { nik: e.currentTarget.value} );
  data.done(function(data){
    var obj = JSON.parse(data);
    $("#warga_id_warga").val(obj.id_warga);
    $("#warga_nik").val(obj.nik);
    $("#warga_nama").val(obj.nama);
    $("#warga_jk").val(obj.jenis_kelamin);
    $("#warga_alamat").val(obj.alamat);
  })

 });

 $("#buat_surat").click(function(){
   data_surat = $("#form_data_surat").serialize();
   data_persyaratan = $("#form_persyaratan").serialize();
   id_warga = $('#warga_id_warga').val();
   jenis_surat = $('#data_jenis_surat').val();

   $.post( "<?php echo base_url('surat/buat_surat2')?>", { data_surat: data_surat,
                                                          data_persyaratan: data_persyaratan,
                                                          id_warga: id_warga,
                                                          jenis_surat:jenis_surat
     } );

 })


  $('#id_warga').keyup(function() {

getdata = $.post( "<?php echo base_url('warga/get_warga_by_id')?>", { id: this.value} );
getdata.done(function(data){
  // console.log(data);
  var toAppend = '';
           $.each(data,function(i,o){
           toAppend += '<option>'+o.id+'</option>';
          });
         $('#input_warga').append(toAppend);
})

});

});




</script>

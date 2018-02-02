
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <table id="table" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                </table>
            </div>
        </div>
    </div>
</div>

<style>
tr {
  font-size: 12px;
}
tr:hover{
  /*background-color: red;*/
  cursor: pointer;;
}
</style>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Biodata warga</h4>
      </div>
      <div class="modal-body" style="padding:20">
        <div class="row">
                <div class="col-md-12">
                    <!-- <div class="well"> -->
                    <table>
                      <tr>
                        <td>Nama</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>No KK </td>
                        <td>:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>Status dalam keluarga</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>Tempat dan tanggal lahir</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>Agama</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>Pendidikan</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>Golongan darah</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>Status Kawin</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>Pekerjaan</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>kewarganegaraan</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>Nama ibu</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>Nik ibu</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>Nama ayah</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td>NIK ayah</td>
                        <td>: </td>
                        <td> </td>
                      </tr>
                    </table>
                <!-- </div> -->
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- /Modal -->


<script type="text/javascript">
$(document).ready(function () {

  pagination = $('#table').pagination({
    href:"<?php echo site_url() ?>/warga/page",
    // plus_column: ,
    hide: "id_warga",
    edit: "id_warga",
    delete: "id_warga",
    search: true,
  });
  pagination.init();
      });

</script>
<script>
$(document).ready(function(){
    $(document).on( "click", "tr.data_detail",function(e){
      if($(e.target).hasClass('btn_delete') || $(e.target).hasClass('btn_edit') ){
            // e.preventDefault();
            return;
        }
    //  id =   $(this).find(".btn_edit").val();
    //  $.get("<?php echo site_url() ?>/anggota/detail?id="+id, function(data, status){
    //      console.log(data);
    //    var arr = JSON.parse(data);
    //    biodata = arr['biodata'][0];
    //    simpanan = arr['simpanan'][0];
     //
      //  alamat = biodata['alamat'];
      //  no_telepon = biodata['no_telepon'];
      //  ttl = tempat_lahir+', '+ tanggal_lahir;
       //
      //  simpanan_total = simpanan['total'];
      //  simpanan_pokok = simpanan['pokok'];
      //  simpanan_wajib = simpanan['wajib'];
      //  simpanan_sukarela = simpanan['sukarela'];
      //  //
      //   $('#detail_nama').text(nama);
      //   $('#detail_jk').text(jenis_kelamin);
      //   $('#detail_ttl').text(ttl);
      //   $('#detail_alamat').text(alamat);
      //    $('#detail_telepon').text(no_telepon);
       //
      //   $('#detail_simpanan_total').text('Rp. '+simpanan_total);
      //   $('#detail_simpanan_pokok').text('Rp. '+simpanan_pokok);
      //   $('#detail_simpanan_wajib').text('Rp. '+simpanan_wajib);
      //   $('#detail_simpanan_sukarela').text('Rp. '+simpanan_sukarela);
    // });
      //  $("#myModal").modal();
      $.notify({
        title: "Error :",
        message: " harus diisi!",
        icon: 'fa fa-check'
      },{
        type: "danger",
        animate: {
		enter: 'animated shake',
		exit: 'animated rotateOutUpLeft'
	}
      });
    });
});
</script>

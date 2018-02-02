    <div class="content-wrapper">

        <section class="content">
          <div class="row">
            <div class="col-md-6">
              <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title ">Kalender Agenda</h3>
                </div>
                    <div class="box-body">
                      <div id="calendar"></div>
                      <span style="font-size:10px;font-weight:lighter ">Keterangan:</span><br>
                      <span style="font-size:10px;font-weight:lighter ">*klik pada tanggal untuk menambah</span><br>
                        <span style="font-size:10px;font-weight:lighter">*klik pada kegiatan untuk menghapus</span>
                    </div>
                    <div class="box-footer" style="text-align:right">
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="box box-danger box-solid">
                  <div class="box-header with-border">
                      <h3 class="box-title ">Daftar Agenda </h3>
                  </div>
                      <div class="box-body">
                          <table id="table" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                          </table>
                      </div>
                  </div>

              </div>
              </div>
</section>

<!-- Modal -->
<!-- <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false"> -->
<div class="modal fade bd-example-modal-sm modal-danger" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm ">
        <!-- Modal content-->
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h4 class="modal-title">Tambah agenda</h4>
            </div> -->
            <div class="modal-body" style="padding:20">
              <input type = "hidden" name="id_agenda" id="id_agenda">
              <form role="form" class="form-horizontal form_agenda">
                  <div class="form-group">
                    <label class="control-label">Nama Kegiatan</label>
                    <input type="text" name="title" id="title" class="form-control"  >
              </div>
              <div class="form-group tanggal_agenda">
                      <label >Tanggal</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                          <input type = "text" name="start" id="start" class="form-control datepicker input_validation"  >
                    </div>
                </div>
                <div class="form-group tanggal_agenda">
                        <label >Sampai</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                            <input type = "text" name="end" id="end" class="form-control datepicker input_validation"  >
                      </div>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button> -->
              <button type="button" class="btn bg-orange pull-left" data-dismiss="modal">Cancel</button>
                <a type="button" id="simpan_agenda" class="btn btn-success" >Simpan</a>
                <a type="button" id="hapus_agenda" class="btn btn-danger" style="display:none">Hapus</a>
            </div>

        </div>

    </div>
</div>
<!-- /Modal -->

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/fullcalendar/fullcalendar.print.css">
<script src="<?php echo base_url() ?>js/fullcalendar/fullcalendar.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.2/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.2/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.2/locale/id.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/locales/bootstrap-datepicker.id.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>js/datepicker/css/bootstrap-datepicker.css">

<script type="text/javascript">

 $(document).ready(function() {

   pagination = $('#table').pagination({
       href:"<?php echo site_url() ?>/agenda/page",
       // plus_column: ,
       hide: "id",
      //  edit: "id",
      //  delete: "id",
      //  search: true,
     });
     pagination.init();

   $('.datepicker').datepicker({
         format: 'dd/mm/yyyy',
         todayBtn: "linked",
         language: "id",
        calendarWeeks: true,
         autoclose: true
    });

    $("#simpan_agenda").click(function(){
      data = $('.form_agenda').serialize();
       $("#myModal").modal();
      request = $.post("<?php echo base_url('agenda/add') ?>",{data: data});
      request.done(function(){
        $('#calendar').fullCalendar( 'refetchEvents' );
        $('.form_agenda')[0].reset();
        $("#hapus_agenda").hide();
        $("#myModal").modal('hide');
        })
    })

    $("#hapus_agenda").click(function(){
      id = $("#id_agenda").val();
      request = $.get("<?php echo base_url('agenda/delete') ?>",{id: id});
      request.done(function(data){
        $('#calendar').fullCalendar( 'refetchEvents' );
        $("#myModal").modal('hide');
        });
    })

  var calendar = $('#calendar').fullCalendar({
   events: "<?php echo base_url('agenda/events') ?>",
   eventRender: function(event, element, view) {
    event.allDay = true;
   },
   displayEventTime: false,
   eventColor: '#378006',
   selectable: true,
   selectHelper: true,
   dayClick: function(date, jsEvent, view) {
    //  console.log(jsEvent);
     tanggal = moment(date).format('DD/MM/YYYY');
     $("#start").val(tanggal);
     $("#end").val(tanggal);
     $("#myModal").modal();
      },


   eventClick: function(event) {
     id = event.id;
     request = $.get("<?php echo base_url('agenda/get') ?>",{id: id});
     request.done(function(data){
         arr = JSON.parse(data);
        //  console.log(arr.id);
         $("#title").val(arr.title);
         $("#id_agenda").val(arr.id);
         $(".tanggal_agenda").hide();
         $("#simpan_agenda").hide();
         $("#hapus_agenda").show();
         $("#myModal").modal();
       });
  	}

  });



 });

</script>

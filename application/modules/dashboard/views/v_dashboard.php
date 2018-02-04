    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
            <h1>Dashboard</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section> -->
        <section class="content" id="page_content">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="info-box">
                  <table  width="100%">
                    <tr>
                      <td style="padding-right:20px"><img src="<?php echo base_url('img/logo_kota.png')?>" alt="" width="100px" height="100px"></td>
                      <td style="text-align:center">
                        <h2>Desa Rancabolang</h2>
                        <h4>Kecamatan Gedebage</h4>
                        <h4>Kota Bandung</h4>
                      </td>
                      <td>
                        <div class="col-md-4 col-md-offset-8 text-right">
                          <div class="small-box bg-maroon " style="padding:5px">
                            <center>
                            <div class="inner">
                              <h4><div id="time"></div></h4>
                              <?php echo $tanggal_hari_ini ?>
                                  </div>
                                </center>
                            <div class="icon">
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
            <div class="row">
              <div class="col-md-6">
                <!-- <div class="col-md-12">
                    <div class="info-box">
                      <div class="inner">
                        <br>
                        <ul>
                          <?php
                          foreach ($pamong as $key => $value) {
                            $nama = $value['nama'];
                            $jabatan = $value['jabatan'];
                          echo "<li>$jabatan :  $nama </li> ";
                          }
                           ?>
                        </ul>
                      </div>
                      <div class="icon">
                      </div>
                    </div>
                </div> -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="small-box bg-teal">
                    <div class="inner">
                      <h3><?php echo $jumlah_warga ?></h3>
                      <p>Jumlah Penduduk</p>
                    </div>
                    <div class="icon">
                      <!-- <i class="ion ion-bag"></i> -->
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3><h3><?php echo $jumlah_surat ?></h3></h3>
                      <p>Jumlah Surat</p>
                    </div>
                    <div class="icon">
                      <!-- <i class="ion ion-bag"></i> -->
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="box box-success box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">Grafik pembuatan surat per hari</h3>
                    </div>
                    <div class="box-body chart-responsive">
                      <div class="chart" id="revenue-chart" style="height: 300px;"></div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <!-- <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="small-box bg-red">
                    <center>
                    <div class="inner">
                      <h3><div id="time"></div></h3>
                      <?php echo $tanggal_hari_ini ?>
                          </div>
                        </center>
                    <div class="icon">
                    </div>
                  </div>
                </div> -->
                <div class="col-md-12">
                  <div class="box box-warning box-solid">
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
              </div>


</div>

</section>

<!-- Calendar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.2/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.2/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.2/locale/id.js"></script>

<!-- chart -->
<link rel="stylesheet" href="<?php echo base_url() ?>/AdminLTE/bower_components/morris.js/morris.css">
<script src="<?php echo base_url() ?>/AdminLTE/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>/AdminLTE/bower_components/morris.js/morris.min.js"></script>

<script type="text/javascript">
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('time').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

  $(document).ready(function () {
    startTime();

    var calendar = $('#calendar').fullCalendar({
     events: "<?php echo base_url('agenda/events') ?>",
     eventRender: function(event, element, view) {
      event.allDay = true;
     },
     displayEventTime: false,
     eventColor: '#378006',
    });

  });

  $(function () {
    "use strict";
    // AREA CHART
    var area = new Morris.Area({
      element: 'revenue-chart',
      resize: true,
      data: [
        {y: '2012-02-20', item1: 10},
        {y: '2012-02-21', item1: 25},
        {y: '2012-02-22', item1: 11},
        {y: '2012-02-23', item1: 23},
        {y: '2012-02-24', item1: 14},
        {y: '2012-02-25', item1: 7},
        {y: '2012-02-26', item1: 15},
        {y: '2012-02-27', item1: 14},
        {y: '2012-02-28', item1: 34}

      ],
      xkey: 'y',
      ykeys: ['item1'],
      labels: ['Item 1'],
      lineColors: ['#a0d0e0', '#3c8dbc'],
      hideHover: 'auto'
    });


  });
</script>

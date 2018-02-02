    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
            <h1>Statistik Data</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Statistik</li>
            </ol>
        </section> -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                  <div class="box box-danger box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title ">Statistik berdasarkan kategori</h3>
                    </div>
                        <div class="box-body" id="jenis_surat">
                        <div class="row">
                          <div class="col-md-2">
                            <div class="style_prevu_kit bg-primary" id="kat_umur">
                                   <center>Umur</center>
                                   </div>
                        </div>
                        <div class="col-md-2">
                          <div class="style_prevu_kit bg-aqua" id="kat_pekerjaan" >
                                 <center>Pekerjaan</center>
                                 </div>
                      </div>
                      <div class="col-md-2">
                        <div class="style_prevu_kit bg-blue" id='kat_pendidikan'>

                               <center>Pendidikan </center>
                               </div>
                    </div>
                      <div class="col-md-2">
                        <div class="style_prevu_kit bg-green" id="kat_status_kawin" >

                               <center>Status Perkawinan </center>
                               </div>
                    </div>
                    <div class="col-md-2">
                      <div class="style_prevu_kit bg-aqua" id='kat_agama'>

                             <center>Agama</center>
                             </div>
                  </div>
                  <div class="col-md-2">
                    <div class="style_prevu_kit bg-blue" id='kat_jenis_kelamin'>
                           <center>Jenis Kelamin</center>
                           </div>
                </div>

                </div>
                </div>
            </div>
    </div>
</div>
<div class="" id="page_content">
</div>
</div>
</div>

</div>
</section>

<script type="text/javascript">

  $(document).ready(function(){
    console.log('kaharisman');
  })
  $('#kat_umur').click(function(){
        var request = $.ajax({
            url: "<?php echo base_url(); ?>statistik/kat_umur",
            type: "POST",
            dataType: "html"
        });
        request.done(function(msg) {
            $("#page_content").html(msg);
        });
  })

  $('#kat_pendidikan').click(function(){
        var request = $.ajax({
            url: "<?php echo base_url(); ?>statistik/kat_pendidikan",
            type: "POST",
            dataType: "html"
        });
        request.done(function(msg) {
            $("#page_content").html(msg);
        });
  })
  $('#kat_pekerjaan').click(function(){
        var request = $.ajax({
            url: "<?php echo base_url(); ?>statistik/kat_pekerjaan",
            type: "POST",
            dataType: "html"
        });
        request.done(function(msg) {
            $("#page_content").html(msg);
        });
  })
  $('#kat_status_kawin').click(function(){
        var request = $.ajax({
            url: "<?php echo base_url(); ?>statistik/kat_status_kawin",
            type: "POST",
            dataType: "html"
        });
        request.done(function(msg) {
            $("#page_content").html(msg);
        });
  })
  $('#kat_agama').click(function(){
        var request = $.ajax({
            url: "<?php echo base_url(); ?>statistik/kat_agama",
            type: "POST",
            dataType: "html"
        });
        request.done(function(msg) {
            $("#page_content").html(msg);
        });
  })
  $('#kat_jenis_kelamin').click(function(){
        var request = $.ajax({
            url: "<?php echo base_url(); ?>statistik/kat_jenis_kelamin",
            type: "POST",
            dataType: "html"
        });
        request.done(function(msg) {
            $("#page_content").html(msg);
        });
  })

</script>



<style media="screen">
.fond{position:absolute;padding-top:85px;top:0;left:0; right:0;bottom:0;
background-color:#00506b;}

.style_prevu_kit
{
  /*font-size: 10px;*/
  cursor:pointer;
  display:inline-block;
  border-radius: 10px;
  border:0;
  width:100%;
  height:30px;
  padding: 1px;
  /*margin: 10px;*/
  color:white;
  position: relative;
  -webkit-transition: all 200ms ease-in;
  -webkit-transform: scale(1);
  -ms-transition: all 200ms ease-in;
  -ms-transform: scale(1);
  -moz-transition: all 200ms ease-in;
  -moz-transform: scale(1);
  transition: all 200ms ease-in;
  transform: scale(1);

}
.style_prevu_kit:hover
{
  font-size: 13px;
  box-shadow: 0px 0px 150px #000000;
  z-index: 2;
  -webkit-transition: all 200ms ease-in;
  -webkit-transform: scale(1.2);
  -ms-transition: all 200ms ease-in;
  -ms-transform: scale(1.2);
  -moz-transition: all 200ms ease-in;
  -moz-transform: scale(1.2);
  transition: all 200ms ease-in;
  transform: scale(1.2);
}
</style>

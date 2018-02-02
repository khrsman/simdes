<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-danger box-solid ">
                <div class="box-header">
                    <h4 class="box-title">
                      Buat Surat
                    </h4>
                </div>
                <div class="box-body">

                  <?php
                  foreach ($jenis_surat as $key => $value) {
                    ?>
                    <div class="icon_jenis_surat"  id="<?php echo $value['id_jenis_surat'] ?>">
                      <center> <img class = "img_jenis_surat" src="<?php echo base_url('img/surat2.png') ?>"> </center>
                      <center> <span class="nama_jenis_surat"><?php echo $value["nama"] ?></span>  </center>
                   </div>
                <?php  }
                  ?>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="<?php echo base_url('js') ?>/select2.js"></script>

<script type="text/javascript">
  $(document).ready(function () {

  $('.icon_jenis_surat').click(function(){
    id = this.id;
    // $('#content_buat_surat').show();
    $.ajax({
       url: "<?php echo base_url(); ?>surat/create",
       data: {jenis_surat: id},
       type: "GET",
       dataType: "html"
   }).done(function(data) {
       $("#page_content").html(data);
   });
  });
  function toogle_jenis_surat(){
    $('#jenis_surat').slideToggle();
    $('#show_jenis_surat').toggle();
    $('#hide_jenis_surat').toggle();
  }

  $('.toggle_jenis_surat').click(function(){
      toogle_jenis_surat();
  });

});

</script>


<style media="screen">
.nama_jenis_surat{
  font-size: 12px;
  font-weight: normal;
   color: #000

}
.img_jenis_surat{
  width: 100%;
  height: 100%;
}

.toggle_jenis_surat{
    cursor:pointer;
}
.icon_jenis_surat
{
  vertical-align: top;
  margin-top: 2px;
  cursor:pointer;
  display:inline-block;
  border-radius: 10px;
  border:0;
  width:70px;
  height:70px;
  padding: 2px;
  /*margin: 10px;*/
  /*background-color:blue;*/
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
.icon_jenis_surat:hover
{
  /*box-shadow: 0px 0px 150px #000000;
  z-index: 2;*/
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

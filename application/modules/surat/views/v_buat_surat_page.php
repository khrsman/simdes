<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-danger box-solid ">
                <div class="box-header">
                    <h4 class="box-title">
                      Pilih jenis surat
                    </h4>
                </div>
                <div class="box-body">
                  <?php
                  foreach ($jenis_surat as $key => $value) {
                    ?>
                    <div class="icon_jenis_surat" id="<?php echo $value['id_jenis_surat'] ?>">
                        <img src="<?php echo base_url('img/surat2.png') ?>" alt="" width="300" height="200">
                      <div class="desc"><?php echo $value["nama"] ?></div>
                    </div>
                <?php  }
                  ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <script type="text/javascript" src="<?php echo base_url('js') ?>/select2.js"></script> -->
<script type="text/javascript">
  $(document).ready(function () {

  $('.icon_jenis_surat').click(function(){
    id = this.id;
    // $('#content_buat_surat').show();
    $.ajax({
       url: "<?php echo base_url(); ?>surat/buat_surat_form",
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


<style>
div.icon_jenis_surat {
    margin: 5px;
    /*border: 1px solid #ccc;*/
    float: left;
    width: 100px;
    vertical-align:middle;
     text-align:center;

}

div.icon_jenis_surat:hover {
  cursor: pointer;
  background-color: #E0F7FA;
  /*border: 1px solid #ccc;*/
  /*box-shadow: 10px 10px 5px grey;*/
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  -webkit-transform: scale(1.2);
        -ms-transform: scale(1.2);
        transform: scale(1.2);
        border-radius:10%;

    /*border: 1px solid #777;*/
    /*-webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(1.2);
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(1.1);
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(1.2);
    transition: all 200ms ease-in;
    transform: scale(1.2);*/
}

div.icon_jenis_surat img {
    width: 50px;
    height: auto;
    text-align: center;
}

div.desc {
  font-size: 10;
/*font-weight: bold;*/
    /*padding: 5px;*/
    text-align: center;
}
</style>

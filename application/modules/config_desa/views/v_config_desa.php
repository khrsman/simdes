
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
            <h1>Setting Desa</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">config_desa</li>
            </ol>
        </section> -->
        <section class="content">
          <!-- <button class="btn bg-purple" id="btn_add" style="margin-bottom:10px"><span class="fa fa-plus"></span> Tambah config_desa</button> -->
          <div class="" id="page_content">
        </div>
</section>

<script type="text/javascript">

$(document).ready(function(){
  var request = $.get("<?php echo base_url(); ?>config_desa/editor");
  request.done(function(data) {
      $("#page_content").html(data);
  });
})
</script>



<link rel="stylesheet" href="<?php echo base_url() ?>css/khrsman-pagination.css" />

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Warga</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">warga</li>
            </ol>
        </section>
        <div class="box-header">
            <button class="btn bg-purple btn-flat" id="btn_data_warga"><span class="fa fa-file"></span> Data Warga</button>
            <button class="btn bg-purple btn-flat" id="btn_tambah_warga"><span class="fa fa-plus"></span> Tambah Warga</button>
        </div>
        <section class="content" id="page_content">
    </div>
</div>
</section>
<script src="<?php echo base_url() ?>js/jquery-2.1.4.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {

  $.ajax({
     url: "<?php echo base_url(); ?>warga/data_warga",
     type: "POST",
     dataType: "html"
 }).done(function(data) {
     $("#page_content").html(data);
 });


  $('#btn_tambah_warga').click(function(){
        var request = $.ajax({
            url: "<?php echo base_url(); ?>warga/add_warga_page",
            type: "POST",
            dataType: "html"
        });
        request.done(function(data) {
            $("#page_content").html(data);
        });
  })
  $('#btn_data_warga').click(function(){
        var request = $.ajax({
            url: "<?php echo base_url(); ?>warga/data_warga",
            type: "POST",
            dataType: "html"
        });
        request.done(function(data) {
            $("#page_content").html(data);
        });
  })

      });

</script>

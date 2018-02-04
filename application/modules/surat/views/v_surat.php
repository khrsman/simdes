    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
            <h1>Surat</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Surat</li>
            </ol>
        </section> -->
        <section class="content">
          <button class="btn bg-orange" id="page_data" style="margin-bottom:10px"><span class="fa fa-bars"></span> Data Surat</button>
          <button class="btn bg-orange" id="page_tambah" style="margin-bottom:10px"><span class="fa fa-plus"></span> Buat Surat Baru</button>
          <div class="" id="page_content">
        </div>
</section>
</section>

<script type="text/javascript">
$(document).ready(function(){
  //   page = "<?php echo $this->input->get('p'); ?>";
  // $.get("<?php echo base_url('surat/') ?>"+page).done(function(data){
  //        $("#page_content").html(data);
  // })
})

</script>

<script type="text/javascript">

$(document).ready(function(){
    // page = "<?php echo $this->input->get('p'); ?>";
  $.get("<?php echo base_url('surat/buat_surat_page') ?>").done(function(data){
         $("#page_content").html(data);
  })
})

$("#page_tambah").click(function(){
  $.get("<?php echo base_url('surat/buat_surat_page') ?>").done(function(data){
         $("#page_content").html(data);
  })
})

$("#page_data").click(function(){
  $.get("<?php echo base_url('surat/data_surat') ?>").done(function(data){
         $("#page_content").html(data);
  })
})
</script>

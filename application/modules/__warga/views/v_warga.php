    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
            <h1>warga</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">warga</li>
            </ol>
        </section> -->
        <section class="content">

          <div class="" id="page_content">
        </div>
</section>

<script type="text/javascript">
$(document).ready(function(){
  var request = $.get("<?php echo base_url(); ?>warga/data");
  request.done(function(data) {
      $("#page_content").html(data);
  });
})
</script>

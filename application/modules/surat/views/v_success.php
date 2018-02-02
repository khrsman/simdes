<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-success box-solid ">
                <div class="box-header">
                    <h4 class="box-title">
                      Notifikasi
                    </h4>
                </div>
                <div class="box-body">
                  Surat telah berhasi dibuat
  <btn type="button" id="download" class="btn btn-primary"><i class="fa fa-plus"></i> Download</btn>

<div class="box-footer clearfix no-border">
    <btn type="button" id="btn_back" class="btn btn-primary pull-left"><i class="fa fa-arrow-left"></i> Kembali</btn>
</div>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="<?php echo base_url('js') ?>/select2.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
    $("#btn_back").click(function() {
        $.get("<?php echo base_url('surat/jenis_surat') ?>").done(function(data) {
             $("#page_content").html(data);
        })
    })

});

</script>

            <div class="row" id="data_view">
                <div class="col-md-12">
                    <div class="box box-danger box-solid">
                       <div class="box-header">
                          <h4 class="box-title">
                            Daftar Surat
                          </h4>
                      </div>

                        <div class="box-body">
                            <table id="table" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                            </table>
                        </div>
                    </div>
                </div>
            </div>

<script type="text/javascript">
$(document).ready(function () {

  $('body').on('click', '.download_surat', function() {
      id = $(this).attr('value');
      $.get("<?php echo base_url('surat/download_surat') ?>",{id: id}).done(function(data) {
          arr = JSON.parse(data);
          window.location.href = arr.link_doc;
      })
  })

pagination = $('#table').pagination({
    href:"<?php echo site_url() ?>/surat/page",
    plus_column: [1,{'class':'download_surat','id':'id_surat','text':'Download'}],
    hide: "id_surat",
    // edit: "id_surat",
    delete: "id_surat",
    search: true,
  });
  pagination.init();
      });

</script>

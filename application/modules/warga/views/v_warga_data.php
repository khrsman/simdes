            <div class="row" id="data_view">
                <div class="col-md-12">
                    <div class="box box-danger box-solid">
                      <div class="box-header with-border">
                          <h3 class="box-title ">Data Penduduk</h3>
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
pagination = $('#table').pagination({
    href:"<?php echo site_url() ?>/warga/page",
    // plus_column: ,
    hide: "id_warga",
    edit: "id_warga",
    delete: "id_warga",
    search: true,
  });
  pagination.init();
      });

</script>

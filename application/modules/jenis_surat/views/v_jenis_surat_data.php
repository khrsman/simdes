            <div class="row" id="data_view">
                <div class="col-md-6">
                    <div class="box box-danger box-solid">
                      <div class="box-header with-border">
                          <h3 class="box-title ">Data Jenis Surat</h3>
                      </div>

                        <div class="box-body">
                          <button class="btn bg-green" id="btn_add" style="margin-bottom:10px"><span class="fa fa-plus"></span> Tambah jenis_surat</button>
                            <table id="table" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                            </table>
                        </div>
                    </div>
                </div>
            </div>

<script type="text/javascript">
$(document).ready(function () {
pagination = $('#table').pagination({
    href:"<?php echo site_url() ?>/jenis_surat/page",
    // plus_column: ,
    hide: "id_jenis_surat",
    edit: "id_jenis_surat",
    // delete: "id_jenis_surat",
    search: true,
  });
  pagination.init();
      });

</script>

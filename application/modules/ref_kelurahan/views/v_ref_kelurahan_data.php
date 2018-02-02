            <div class="row" id="data_view">
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header">
                            <!-- <button class="btn btn-primary" id="btn_add_page"><span class="fa fa-plus"></span> Tambah</button> -->
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
    href:"<?php echo site_url() ?>/ref_kelurahan/page",
    // plus_column: ,
    hide: "id_kelurahan",
    edit: "id_kelurahan",
    delete: "id_kelurahan",
    search: true,
  });
  pagination.init();
      });

</script>

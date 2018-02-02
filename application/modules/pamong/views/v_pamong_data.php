            <div class="row" id="data_view">
                <div class="col-md-8">
                  <div class="box box-danger box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title ">Data Pamong</h3>
                    </div>

                        <div class="box-body">
                          <button class="btn bg-green" id="btn_add" style="margin-bottom:10px"><span class="fa fa-plus"></span> Tambah pamong</button>
                            <table id="table" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                            </table>
                        </div>
                    </div>
                </div>
            </div>

<script type="text/javascript">
$(document).ready(function () {
pagination = $('#table').pagination({
    href:"<?php echo site_url() ?>/pamong/page",
    // plus_column: ,
    hide: "id_pamong",
    edit: "id_pamong",
    delete: "id_pamong",
    search: true,
  });
  pagination.init();
      });

</script>

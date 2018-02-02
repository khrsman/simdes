              <div class="row" id="form_view">
                <div class="col-md-12">
                    <div class="box box-danger box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title ">Data Penduduk</h3>
                        </div>
                        <div class="box-body">
                            <form role="form" class="xform">
                                <input type="hidden" id="id_warga" name="id_warga" >
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label >No kk</label>
                                          <input type = "text" name="no_kk" id="no_kk" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label>Nik</label>
                                                <input type = "text" name="nik" id="nik" class="form-control input_validation"  >
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Status kk</label>
                                                <input type = "text" name="status_kk" id="status_kk" class="form-control"  >
                                      </div>
                                  </div>


                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Nama</label>
                                                <input type = "text" name="nama" id="nama" class="form-control input_validation"  >
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Tempat lahir</label>
                                                <input type = "text" name="tempat_lahir" id="tempat_lahir" class="form-control"  >
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Tanggal lahir</label>
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                                <input type = "text" name="tanggal_lahir" id="tanggal_lahir" class="form-control datepicker input_validation"  >
                                          </div>
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Jenis kelamin</label>
                                            <?php
                                            $this->cb_options->jenis_kelamin();
                                            ?>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Golongan darah</label>
                                            <?php
                                            $this->cb_options->golongan_darah();
                                            ?>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Agama</label>
                                                <?php
                                                $this->cb_options->agama();
                                                ?>
                                      </div>
                                  </div>


                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Pendidikan</label>
                                                <?php
                                                $this->cb_options->pendidikan();
                                                ?>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Status perkawinan</label>
                                            <?php
                                            $this->cb_options->status_kawin();
                                            ?>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Kewarganegaraan</label>
                                            <?php
                                            $this->cb_options->kewarganegaraan();
                                            ?>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Pekerjaan</label>
                                            <?php
                                              $this->cb_options->pekerjaan();
                                              ?>
                                      </div>
                                  </div>


                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Alamat</label>
                                                <input type = "text" name="alamat" id="alamat" class="form-control"  >
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >RT</label>
                                            <?php
                                            $this->cb_options->rt();
                                            ?>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >RW</label>
                                                <input type = "text" readonly value="01" name="rw" id="rw" class="form-control input_number"  >
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Desa kelurahan</label>
                                            <?php
                                              $this->cb_options->kelurahan();
                                              ?>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Telepon</label>
                                                <input type = "text" name="telepon" id="telepon" class="form-control"  >
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Nama ibu</label>
                                                <input type = "text" name="nama_ibu" id="nama_ibu" class="form-control"  >
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Nama ayah</label>
                                                <input type = "text" name="nama_ayah" id="nama_ayah" class="form-control"  >
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Nik ibu</label>
                                                <input type = "text" name="nik_ibu" id="nik_ibu" class="form-control"  >
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label >Nik ayah</label>
                                                <input type = "text" name="nik_ayah" id="nik_ayah" class="form-control"  >
                                      </div>
                                  </div>
                                </div>
                            </form>
                        </div>
                        <div class="box-footer" style="text-align:right">
                            <a class="btn btn-danger" id="btn_cancel"><span class="fa fa-remove "></span> Cancel</a>
                            <a class="btn btn-primary add_page" id="btn_save"><span class="fa fa-check "></span> Simpan</a>
                            <a class="btn btn-primary edit_page" id="btn_update"><span class="fa fa-check "></span> update</a>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/js/bootstrap-datepicker.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>js/datepicker/locales/bootstrap-datepicker.id.min.js"></script>
            <link rel="stylesheet" href="<?php echo base_url() ?>js/datepicker/css/bootstrap-datepicker.css">

            <script type="text/javascript">
            $(document).ready(function () {
              $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    todayBtn: "linked",
                    language: "id",
                   calendarWeeks: true,
                    autoclose: true
               });
                  });
            </script>

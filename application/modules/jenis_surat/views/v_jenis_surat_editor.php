              <div class="row" id="form_view">
                <div class="col-md-4">
                    <div class="box box-danger box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title ">Data Jenis Surat</h3>
                        </div>
                        <div class="box-body">
                            <form role="form" class="form-horizontal xform">
                                <input type="hidden" id="id_jenis_surat" name="id_jenis_surat" >
																<div class="form-group">
                                  <label class="col-sm-4 control-label">Nama</label>
                                  <div class="col-sm-8">
                                      <input type = "text" name="nama" id="nama" class="form-control"  >
                                  </div>
                            </div>

													<div class="form-group">
                                  <label class="col-sm-4 control-label">Template nomor</label>
                                  <div class="col-sm-8">
                                      <input type = "text" name="template_nomor" id="template_nomor" class="form-control"  >
                                  </div>
                            </div>
													<div class="form-group">
                                  <label class="col-sm-4 control-label">File surat</label>
                                  <div class="col-sm-8">
                                    <button type="button" name="button">Download</button>
                                    <button type="button" name="button">Upload</button>
                                      <!-- <input type = "text" name="file_surat" id="file_surat" class="form-control"  > -->
                                  </div>
                            </div>

                            </form>
                        </div>
                    </div>
                    <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title ">Persyaratan Surat</h3>
                        </div>
                        <div class="box-body">
                          <form role="form" class="form-horizontal xform">
													<!-- <div class="form-group">
                                  <label class="col-sm-4 control-label">Persyaratan</label>
                                  <div class="col-sm-8">
                                      <input type = "text" name="persyaratan" id="persyaratan" class="form-control"  >
                                  </div>
                            </div> -->
                            <div class="form-group">
                              <div class="col-sm-4">
                                <?php
                                foreach ($persyaratan as $key => $value) {
                                  // if (strpos($value['kode'], 'form') !== false) {
                                  ?>
                                  <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name='persyaratan[]' id="<?php echo $value['kode'] ?>" value="<?php echo $value['id_persyaratan'] ?>">
                                      <?php echo $value['nama'] ?>
                                    </label>
                                  </div>
                            <?php
                                // }
                                }
                                 ?>
                            </div>
                            </form>
                        </div>
                            </form>
                        </div>
                    </div>
                </div>
                  <!-- <div class="col-md-4">
                  </div> -->
                  <div class="col-md-6">
                    <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title ">Field Isi</h3>
                        </div>
                        <div class="box-body">
                            <form role="form" class="form-horizontal xform">
                            <div class="form-group">
                              <div class="col-sm-4">
                                <?php
                                foreach ($field_isi as $key => $value) {
                                  ?>
                                  <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="field_isi[]" id="<?php echo $value['kode'] ?>" value="<?php echo $value['id_field_isi'] ?>">
                                      <?php echo $value['nama'] ?>
                                    </label>
                                  </div>
                            <?php
                                }
                                 ?>
                            </div>
                            </form>
                        </div>
                        <div class="box-footer" style="text-align:right">
                            <a class="btn btn-danger" id="btn_cancel"><span class="fa fa-remove "></span> Cancel</a>
                            <a class="btn btn-primary add_page" id="btn_save"><span class="fa fa-check "></span> Simpan</a>
                            <a class="btn btn-primary edit_page" id="btn_update"><span class="fa fa-check "></span> Update</a>
                        </div>
                    </div>
                  </div>
            </div>

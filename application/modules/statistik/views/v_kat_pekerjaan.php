<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title add_page">Tabel statistik warga berdasarkan pekerjaan</h3>
            </div>
            <div class="box-body">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Laki-laki</th>
                    <th>Perempuan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($data as $key => $value) {
                    $no++;
                  ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $value['nama'] ?></td>
                    <td><?php echo $value['jumlah'] ?></td>
                    <td><?php echo $value['laki_laki'] ?></td>
                    <td><?php echo $value['perempuan'] ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>

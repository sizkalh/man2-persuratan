<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Wali Kelas
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-success">
      <div class="box-body">
        <?php
        $id = $_GET['id'];
        $query_guru = mysqli_query($koneksi, 'SELECT
                                              A.id_wali_kelas,
                                              B.*,
                                              C.id_detail_kelas,
                                              C.rombel,
                                              D.nama AS kelas,
                                              D.nama_kelas,
                                              E.nama AS jurusan
                                              FROM
                                              tbl_wali_kelas A
                                              INNER JOIN tbl_guru B
                                                  ON A.id_guru = B.id
                                              INNER JOIN tbl_detail_kelas C
                                                  ON C.id_detail_kelas = A.id_detail_kelas
                                              INNER JOIN tbl_kelas D
                                                  ON D.id_kelas = C.id_kelas
                                              INNER JOIN tbl_jurusan E
                                                  ON E.id_jurusan = C.id_jurusan
                                              WHERE A.id_wali_kelas = "' . $id . '"');
        $data = mysqli_fetch_array($query_guru);
        ?>
        <form action="<?= base_url() ?>process/wali-kelas/update.php" enctype="multipart/form-data" method="post" id="form_data_wali_kelas">
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Nama Guru & Tendik</label>
              <div class="col-sm-10">
                <input type="hidden" name="id" value="<?= $data['id_wali_kelas'] ?>">
                <select name="id_guru" id="id_guru" class="form-control select-nama">
                  <option value="">-- Pilih Guru</option>
                  <?php
                  $no = 1;
                  $query_guru = mysqli_query($koneksi, 'SELECT * FROM tbl_guru');
                  while ($data_guru = mysqli_fetch_array($query_guru)) {
                  ?>
                    <option value="<?= $data_guru['id'] ?>" <?= $data_guru['id'] == $data['id'] ? "selected" : "" ?>><?= $data_guru['nama'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Kelas</label>
              <div class="col-sm-10">
                <select name="id_detail_kelas" id="role" class="form-control select-kelas">
                  <option value="">-- Pilih Kelas</option>
                  <?php
                  $query_kelas = mysqli_query($koneksi, 'SELECT
                                                                    A.id_detail_kelas,
                                                                    A.rombel,
                                                                    B.nama AS kelas,
                                                                    B.nama_kelas,
                                                                    C.nama AS jurusan
                                                                FROM
                                                                    tbl_detail_kelas A
                                                                    INNER JOIN tbl_kelas B
                                                                    ON A.id_kelas = B.id_kelas
                                                                    INNER JOIN tbl_jurusan C
                                                                    ON C.id_jurusan = A.id_jurusan
                                                                ORDER BY B.id_kelas ASC,
                                                                    C.id_jurusan ASC,
                                                                    A.rombel ASC');
                  while ($data_kelas = mysqli_fetch_array($query_kelas)) {
                  ?>
                    <option value="<?= $data_kelas['id_detail_kelas'] ?>" <?= $data_kelas['id_detail_kelas'] == $data['id_detail_kelas'] ? "selected" : "" ?>><?= $data_kelas['rombel'] != '0' ? $data_kelas['kelas'] . '  ' . $data_kelas['jurusan'] . '  ' . $data_kelas['rombel'] : $data_kelas['kelas'] . '  ' . $data_kelas['jurusan']  ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group" style="margin-top: 3em;">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <button type="button" onclick="goBack()" class="btn btn-default"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.box -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
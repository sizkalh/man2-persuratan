<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Prestasi Siswa
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php
    if (isset($_GET['pesan'])) {
      if ($_GET['pesan'] == "gagal") {
        echo '
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-ban"></i> Data gagal disimpan !
                    </div>
                ';
      } else if ($_GET['pesan'] == "berhasil") {
        echo '
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fa fa-check"></i> Data berhasil disimpan
                        </div>
                    ';
      }
    }
    ?>
    <!-- Default box -->
    <div class="box box-success">
      <div class="box-body">
        <?php
        $id = $_GET['id'];
        $query_mysql = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE id='" . $id . "'");
        $data = mysqli_fetch_array($query_mysql);
        ?>
        <p class="lead text-green">Data Siswa</p>
        <div class="form-group">
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Satuan Pendidikan</label>
            <div class="col-sm-10">
              <input type="hidden" name="id" value="<?= $data['id'] ?>">
              <input type="text" name="satdik" id="satdik" class="form-control" value="SMA" placeholder="Masukkan Satuan Pendidikan" readonly>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
              <select name="id_detail_kelas" id="id_detail_kelas" class="form-control" disabled>
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
                  <option value="<?= $data_kelas['id_detail_kelas'] ?>" <?= $data_kelas['id_detail_kelas'] ==  $data['id_detail_kelas'] ? "selected" : "" ?>><?= $data_kelas['rombel'] != '0' ? $data_kelas['kelas'] . '  ' . $data_kelas['jurusan'] . '  ' . $data_kelas['rombel'] : $data_kelas['kelas'] . '  ' . $data_kelas['jurusan']  ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">NIS</label>
            <div class="col-sm-10">
              <input type="text" name="nis" id="nis" class="form-control" value="<?= $data['nis'] ?>" placeholder="Masukkan NIS" readonly>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">NISN</label>
            <div class="col-sm-10">
              <input type="text" name="nisn" id="nisn" class="form-control" value="<?= $data['nisn'] ?>" placeholder="Masukkan NISN" readonly>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nama Siwa</label>
            <div class="col-sm-10">
              <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama'] ?>" placeholder="Masukkan Nama" readonly>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
              <input type="radio" name="jk" id="laki-laki" value="L" <?= $data['jk'] == "L" ? "checked" : "" ?> readonly>
              <label for="laki-laki">Laki - Laki</label>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" name="jk" id="perempuan" value="P" <?= $data['jk'] == "P" ? "checked" : "" ?> readonly>
              <label for="perempuan">Perempuan</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" readonly><?= $data['alamat'] ?></textarea>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">No. HP</label>
            <div class="col-sm-10">
              <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?= $data['no_hp'] ?>" placeholder="Masukkan No. HP" readonly>
            </div>
          </div>
        </div>
        <p class="lead text-green">Data Prestasi</p>
        <div class="form-group">
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <table class="table table-bordered table-hover">
                <thead class="bg-primary">
                  <tr>
                    <th class="text-center">No</th>
                    <th>Prestasi</th>
                    <th>Bidang</th>
                    <th class="text-center">Tahun</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody id="prestasi">
                  <form action="<?= base_url() ?>process/prestasi-siswa/tambah.php" method="post">
                    <tr>
                      <td class="text-center">~</td>
                      <td>
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <input type="text" name="prestasi" class="form-control">
                      </td>
                      <td>
                        <input type="text" name="bidang" class="form-control">
                      </td>
                      <td>
                        <input type="text" name="tahun" class="form-control">
                      </td>
                      <td>
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambahkan</button>
                      </td>
                    </tr>
                  </form>
                  <?php
                  $no = 1;
                  $query_prestasi = mysqli_query($koneksi, 'SELECT
                                                              *
                                                              FROM
                                                              tbl_prestasi
                                                              WHERE id_siswa = ' . $_GET['id']);
                  while ($prestasi = mysqli_fetch_array($query_prestasi)) {
                  ?>
                    <tr>
                      <td class="text-center"><?= $no++ ?></td>
                      <td><?= $prestasi['prestasi'] ?></td>
                      <td><?= $prestasi['bidang'] ?></td>
                      <td class="text-center"><?= $prestasi['tahun'] ?></td>
                      <td class="text-center">
                        <a href="<?= base_url() ?>process/prestasi-siswa/hapus.php?id=<?= $prestasi['id'] ?>&id_siswa=<?= $_GET['id'] ?>" class="btn btn-sm btn-danger">
                          <i class="fa fa-times"></i>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="form-group" style="margin-top: 3em;">
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <a href="<?= base_url() ?>prestasi-siswa/index" class="btn btn-default"><i class="fa fa-times"></i> Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.box -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
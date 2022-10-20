<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Siswa
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-success">
      <div class="box-body">
        <form action="<?= base_url() ?>process/data-siswa/tambah.php" enctype="multipart/form-data" method="post" id="form_data_siswa">
          <p class="lead text-green">Data Diri</p>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Satuan Pendidikan</label>
              <div class="col-sm-10">
                <input type="text" name="satdik" id="satdik" class="form-control" value="SMA" placeholder="Masukkan Satuan Pendidikan" readonly>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Kelas</label>
              <div class="col-sm-10">
                <select name="id_detail_kelas" id="id_detail_kelas" class="form-control">
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
                    <option value="<?= $data_kelas['id_detail_kelas'] ?>"><?= $data_kelas['rombel'] != '0' ? $data_kelas['kelas'] . '  ' . $data_kelas['jurusan'] . '  ' . $data_kelas['rombel'] : $data_kelas['kelas'] . '  ' . $data_kelas['jurusan']  ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">NIS</label>
              <div class="col-sm-10">
                <input type="text" name="nis" id="nis" class="form-control" placeholder="Masukkan NIS">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">NISN</label>
              <div class="col-sm-10">
                <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukkan NISN">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Nama Siwa</label>
              <div class="col-sm-10">
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <input type="radio" name="jk" id="laki-laki" value="L">
                <label for="laki-laki">Laki - Laki</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="jk" id="perempuan" value="P">
                <label for="perempuan">Perempuan</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Tempat Lahir</label>
              <div class="col-sm-10">
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control" id="tanggalan" name="tgl_lahir" autocomplete="off" placeholder="Masukkan Tanggal Lahir" />
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Jml. Saudara</label>
              <div class="col-sm-10">
                <input type="text" name="jml_saudara" id="jml_saudara" class="form-control" placeholder="Masukkan Jml. Saudara">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">No. HP</label>
              <div class="col-sm-10">
                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan No. HP">
              </div>
            </div>
          </div>
          <p class="lead text-green">Data Orang Tuda / Wali</p>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Nama Wali</label>
              <div class="col-sm-10">
                <input type="text" name="nama_wali" id="nama_wali" class="form-control" placeholder="Masukkan Nama Wali">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">No. HP Wali</label>
              <div class="col-sm-10">
                <input type="text" name="no_hp_wali" id="no_hp_wali" class="form-control" placeholder="Masukkan No. HP Wali">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Pekerjaan Wali</label>
              <div class="col-sm-10">
                <input type="text" name="pekerjaan_wali" id="pekerjaan_wali" class="form-control" placeholder="Masukkan Pekerjaan Wali">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Nama Ibu</label>
              <div class="col-sm-10">
                <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" placeholder="Masukkan Nama Ibu">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">No. HP Ibu</label>
              <div class="col-sm-10">
                <input type="text" name="no_hp_ibu" id="no_hp_ibu" class="form-control" placeholder="Masukkan No. HP Ibu">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
              <div class="col-sm-10">
                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" placeholder="Masukkan Pekerjaan Ibu">
              </div>
            </div>
          </div>
          <p class="lead text-green">Akun</p>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Role</label>
              <div class="col-sm-10">
                <input type="text" name="role" id="role" class="form-control" value="siswa" placeholder="Masukkan Username" readonly>
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
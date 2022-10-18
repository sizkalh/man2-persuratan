<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Guru & Tendik
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-success">
      <div class="box-body">
        <?php
        $id = $_GET['id'];
        $query_mysql = mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE id='" . $id . "'");
        $data = mysqli_fetch_array($query_mysql);
        ?>
        <form action="<?= base_url() ?>process/data-guru/update.php" enctype="multipart/form-data" method="post" id="form_data_guru">
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Nama Guru & Tendik</label>
              <div class="col-sm-10">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" value="<?= $data['nama'] ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">NIP</label>
              <div class="col-sm-10">
                <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan NIP" value="<?= $data['nip'] ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <input type="radio" name="jk" id="laki-laki" value="L" <?= $data['jk'] == "L" ? "checked" : "" ?>>
                <label for="laki-laki">Laki - Laki</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="jk" id="perempuan" value="P" <?= $data['jk'] == "P" ? "checked" : "" ?>>
                <label for="perempuan">Perempuan</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">No. HP</label>
              <div class="col-sm-10">
                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan No. HP" value="<?= $data['no_hp'] ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan Email" value="<?= $data['email'] ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Tempat Lahir</label>
              <div class="col-sm-10">
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="<?= $data['tempat_lahir'] ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control" id="tanggalan" name="tgl_lahir" autocomplete="off" placeholder="Masukkan Tanggal Lahir" value="<?= $data['tgl_lahir'] ?>" />
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat"><?= $data['alamat'] ?></textarea>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Pangkat</label>
              <div class="col-sm-10">
                <input type="text" name="pangkat" id="pangkat" class="form-control" placeholder="Masukkan Pangkat" value="<?= $data['pangkat'] ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Golongan</label>
              <div class="col-sm-10">
                <input type="text" name="golongan" id="golongan" class="form-control" placeholder="Masukkan Golongan" value="<?= $data['golongan'] ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Jabatan</label>
              <div class="col-sm-10">
                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukkan Jabatan" value="<?= $data['jabatan'] ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Lama Pengabdian</label>
              <div class="col-sm-10">
                <input type="text" name="lama_pengabdian" id="lama_pengabdian" class="form-control" placeholder="Masukkan Lama Pengabdian" value="<?= $data['lama_pengabdian'] ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" value="<?= $data['username'] ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Role</label>
              <div class="col-sm-10">
                <select name="role" id="role" class="form-control">
                  <option value="">-- Pilih Role User</option>
                  <option value="superuser" <?= $data['role'] == "superuser" ? "selected" : "" ?>>Super User</option>
                  <option value="kamad" <?= $data['role'] == "kamad" ? "selected" : "" ?>>Kepala Madrasah</option>
                  <option value="katu" <?= $data['role'] == "katu" ? "selected" : "" ?>>Kepala TU</option>
                  <option value="operator" <?= $data['role'] == "operator" ? "selected" : "" ?>>Operator Sekolah</option>
                  <option value="guru" <?= $data['role'] == "guru" ? "selected" : "" ?>>Guru</option>
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
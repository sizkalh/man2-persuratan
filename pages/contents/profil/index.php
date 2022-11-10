<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Profil
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
                <i class="icon fa fa-check"></i> Data berhasil disimpan, silahkan logout untuk memperbaharui data !
            </div>
        ';
      }
    }
    ?>
    <!-- Default box -->
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Data Diri</h3>
      </div>
      <div class="box-body">
        <?php
        $id = $_SESSION['id_user'];
        if($_SESSION['pangkat_user'] != 'siswa'){
          $query_mysql = mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE id='" . $id . "'");
        }else{
          $query_mysql = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE id='" . $id . "'");
        }
        
        $data = mysqli_fetch_array($query_mysql);
        if ($_SESSION['pangkat_user'] != 'siswa') {
        ?>
        <form action="<?= base_url() ?>process/profil/update.php" enctype="multipart/form-data" method="post" id="form_data_profil">
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
                <input type="text" name="pangkat" id="pangkat" class="form-control" placeholder="Masukkan Pangkat" value="<?= $data['pangkat_guru'] ?>" readonly>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Golongan</label>
              <div class="col-sm-10">
                <input type="text" name="golongan" id="golongan" class="form-control" placeholder="Masukkan Golongan" value="<?= $data['golongan'] ?>" readonly>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Jabatan</label>
              <div class="col-sm-10">
                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukkan Jabatan" value="<?= $data['jabatan'] ?>" readonly>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Lama Pengabdian</label>
              <div class="col-sm-10">
                <input type="text" name="lama_pengabdian" id="lama_pengabdian" class="form-control" placeholder="Masukkan Lama Pengabdian" value="<?= $data['lama_pengabdian'] ?>" readonly>
              </div>
            </div>
          </div>
          <h3>
            Login Akun
          </h3>
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
              <label class="col-sm-2 col-form-label">Password Baru</label>
              <div class="col-sm-10">
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password Baru">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Ulangi Password Baru</label>
              <div class="col-sm-10">
                <input type="password" name="repassword" id="repassword" onkeyup="cekPassword()" class="form-control" placeholder="Ulangi Password Baru">
                <div id="cek" style="margin-top: 1em;"></div>
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
        <?php 
          } else {
            include("profil-siswa.php");
          }
        ?>
      </div>
    </div><!-- /.box -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
  function cekPassword() {
    var password = $("#password").val()
    var repass = $("#repassword").val()

    // console.log(repass)
    if (password != repass) {
      $("#cek").html('<div class="callout callout-danger"> <p> <i class="fa fa-times"></i> Password tidak sama. </p> </div>')
    } else {
      $("#cek").html('<div class="callout callout-success"> <p> <i class="fa fa-check"></i> Password sudah sesuai. </p> </div>')
    }
  }
</script>
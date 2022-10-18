<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Kelas
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-success">
      <div class="box-body">
        <form action="<?= base_url() ?>process/data-kelas/tambah.php" enctype="multipart/form-data" method="post" id="form_data_kelas">
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Tingkat Kelas</label>
              <div class="col-sm-10">
                <div class="input-group">
                  <div class="input-group-btn">
                    <button type="button" class="btn bg-olive btn-flat" data-toggle="modal" id="tambah-kelas" data-target="#modal-kelas">
                      <i class="fa fa-plus"></i>
                    </button>
                  </div>
                  <select name="id_kelas" id="id_kelas" class="form-control">
                    <option value="">-- Pilih Tingkat Kelas</option>
                    <?php
                    $query_kelas = mysqli_query($koneksi, 'SELECT * FROM tbl_kelas');
                    while ($data_kelas = mysqli_fetch_array($query_kelas)) {
                    ?>
                      <option value="<?= $data_kelas['id_kelas'] ?>"><?= $data_kelas['nama'] ?> (<?= $data_kelas['nama_kelas'] ?>)</option>
                    <?php } ?>
                  </select>
                </div>
                <div style="padding-top: .3em;">
                  <small class="text-warning"><i class="fa fa-info-circle"></i> Tekan tombol plus (+) untuk menambah data kelas.</small>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Jurusan</label>
              <div class="col-sm-10">
                <div class="input-group">
                  <div class="input-group-btn">
                    <button type="button" class="btn bg-olive btn-flat" data-toggle="modal" id="tambah-jurusan" data-target="#modal-jurusan">
                      <i class="fa fa-plus"></i>
                    </button>
                  </div>
                  <select name="id_jurusan" id="id_jurusan" class="form-control">
                    <option value="">-- Pilih Jurusan</option>
                    <?php
                    $query_jurusan = mysqli_query($koneksi, 'SELECT * FROM tbl_jurusan');
                    while ($data_jurusan = mysqli_fetch_array($query_jurusan)) {
                    ?>
                      <option value="<?= $data_jurusan['id_jurusan'] ?>"><?= $data_jurusan['nama'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div style="padding-top: .3em;">
                  <small class="text-warning"><i class="fa fa-info-circle"></i> Tekan tombol plus (+) untuk menambah data jurusan.</small>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Rombel</label>
              <div class="col-sm-10">
                <input type="number" name="rombel" min="0" id="rombel" class="form-control" placeholder="Masukkan rombel kelas">
                <div style="padding-top: .3em;">
                  <small class="text-warning"><i class="fa fa-info-circle"></i> Masukkan angka <b>0</b> (nol) apabila jurusan kelas hanya 1 rombel.</small>
                </div>
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

<div class="modal fade" id="modal-kelas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah data tingkat kelas</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>process/tingkat-kelas/tambah.php" method="post" id="data_kelas">
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Kelas</label>
              <div class="col-sm-9">
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Kelas" />
                <div style="padding-top: .3em;">
                  <small class="text-warning"><i class="fa fa-info-circle"></i> Ex. : XII</small>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Nama Kelas</label>
              <div class="col-sm-9">
                <input type="text" id="nama_kelas" name="nama_kelas" class="form-control" placeholder="Masukkan Nama Kelas" />
                <div style="padding-top: .3em;">
                  <small class="text-warning"><i class="fa fa-info-circle"></i> Masukkan keterangan nama kelas. <b>Ex. : dua belas</b></small>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label"></label>
              <div class="col-sm-9">
                <button type="submit" id="simpan_kelas" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="form-group">
          <div class="mb-3 row">
            <div class="col-md-12">
              <table class="table table-condensed table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="text-center">Tingkat Kelas</th>
                    <th class="text-center">Nama Kelas</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query_kelas = mysqli_query($koneksi, 'SELECT * FROM tbl_kelas');
                    while ($data_kelas = mysqli_fetch_array($query_kelas)) {
                  ?>
                    <tr>
                      <td class="text-center"><?= $data_kelas['nama'] ?></td>
                      <td class="text-center"><?= $data_kelas['nama_kelas'] ?></td>
                      <td class="text-center">
                        <a href="<?= base_url() ?>process/tingkat-kelas/hapus.php?id=<?= $data_kelas['id_kelas'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-jurusan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah data jurusan</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>process/data-jurusan/tambah.php" method="post" id="data_kelas">
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Jurusan</label>
              <div class="col-sm-9">
                <input type="text" id="jurusan" name="nama" class="form-control" placeholder="Masukkan Jurusan" />
                <div style="padding-top: .3em;">
                  <small class="text-warning"><i class="fa fa-info-circle"></i> Ex. : IPA</small>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label"></label>
              <div class="col-sm-9">
                <button type="submit" id="simpan_kelas" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="form-group">
          <div class="mb-3 row">
            <div class="col-md-12">
              <table class="table table-condensed table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="text-center">Nama Jurusan</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query_jurusan = mysqli_query($koneksi, 'SELECT * FROM tbl_jurusan');
                    while ($data_jurusan = mysqli_fetch_array($query_jurusan)) {
                  ?>
                    <tr>
                      <td class="text-center"><?= $data_jurusan['nama'] ?></td>
                      <td class="text-center">
                        <a href="<?= base_url() ?>process/data-jurusan/hapus.php?id=<?= $data_jurusan['id_jurusan'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    $("#preview").click(function() {
      var base_url = window.location.origin;
      var data = $("#form_data_kelas").serialize();

      window.open(
        base_url + '/process/data-kelas/preview.php?' + data,
        '_blank' // <- This is what makes it open in a new window.
      );

      // console.log(base_url);
    });

  });
</script>
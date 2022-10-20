<?php 
function tgl_indo_garing($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return  $pecahkan[2] . '/' . $pecahkan[1] . '/' . $pecahkan[0];
}
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Surat Pengantar
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-success">
      <div class="box-body">
        <?php
        $id = $_GET['id'];
        $query_mysql = mysqli_query($koneksi, "SELECT surat.*, lamp.id_surat, lamp.lampiran, lamp.file FROM tbl_surat AS surat LEFT JOIN tbl_lampiran AS lamp ON lamp.id_surat = surat.id WHERE surat.id='" . $id . "'");
        while ($data = mysqli_fetch_array($query_mysql)) {
        ?>
          <form action="<?= base_url() ?>process/surat-pengantar/update.php" enctype="multipart/form-data" method="post" id="surat-pengantar">
            <div class="form-group">
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Perihal</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="perihal" rows="3" placeholder="Masukkan Perihal" readonly>Permohonan Narasumber</textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Kepada</label>
                <div class="col-sm-10">
                  <input type="hidden" name="id" value="<?= $data['id'] ?>">
                  <input type="text" class="form-control" name="kepada" value="<?= $data['kepada'] ?>" placeholder="Masukkan Nama" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Alamat Tujuan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>" placeholder="Masukkan Alamat Tujuan" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Tanggal Pembuatan</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" class="form-control" name="tanggal_pembuatan" value="<?= tgl_indo_garing($data['tgl_pembuatan']) ?>" readonly />
                  </div>
                </div>
              </div>
            </div>
            <!--
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Lampiran</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="lampiran" placeholder="Masukkan Lampiran" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">File Lampiran</label>
              <div class="col-sm-10">
                <input type="file" name="file_lampiran" class="form-control" />
              </div>
            </div>
          </div>
          -->
            <div class="form-group">
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Kalimat Tujuan</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="keterangan" rows="3" placeholder="Masukkan Kalimat Tujuan"><?= $data['keterangan'] ?></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Hari</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="hari" value="<?= $data['hari'] ?>" placeholder="Masukkan Hari" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Tanggal Pelaksanaan</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" class="form-control" id="datepicker" name="tanggal_pelaksanaan" value="<?= tgl_indo_garing($data['tgl_pelaksanaan']) ?>" autocomplete="off" placeholder="Masukkan Tanggal Pelaksanaan" />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Waktu</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <input type="text" class="form-control" name="waktu" value="<?= $data['waktu'] ?>" placeholder="Masukkan Waktu" />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Materi</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="catatan" rows="3" placeholder="Masukkan Materi"><?= $data['catatan'] ?></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Tempat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tempat" value="<?= $data['tempat'] ?>" placeholder="Masukkan Tempat" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="button" onclick="goBack()" class="btn btn-default"><i class="fa fa-times"></i> Batal</button>
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                  <button type="button" id="preview" class="btn btn-primary"><i class="fa fa-eye"></i> Preview</button>
                </div>
              </div>
            </div>
          </form>
        <?php } ?>
      </div>
    </div><!-- /.box -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
  $(document).ready(function() {

    $("#preview").click(function() {
      var base_url = window.location.origin;
      var data = $("#surat-pengantar").serialize();

      window.open(
        base_url + '/process/surat-pengantar/preview.php?' + data,
        '_blank' // <- This is what makes it open in a new window.
      );

      // console.log(base_url);
    });

  });
</script>
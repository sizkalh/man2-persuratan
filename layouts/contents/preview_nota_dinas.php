<?php include_once("../page/header.php") ?>
<?php include_once("../page/navbar.php") ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include_once("../page/sidebar.php") ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Nota Dinas
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-success">
      <div class="box-header">
        <a href="nota_dinas.php" class="btn btn-default"><i class="fa fa-arrow-circle-left "></i> Kembali</a>
      </div>
      <?php
        $id = $_GET['id'];
        $data = mysqli_query($koneksi,"select * from tbl_surat where id='$id'");
        while($myData = mysqli_fetch_array($data)){
      ?>
      <div class="box-body">
        <form method="post">
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Kepada</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?= $myData['kepada'] ?>" name="kepada" placeholder="Masukkan Nama" readonly/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Perihal</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="perihal" rows="3" placeholder="Masukkan Perihal" readonly><?= $myData['perihal'] ?></textarea>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Tanggal Pembuatan</label>
              <div class="col-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control" value="<?= $myData['tgl_pembuatan'] ?>" name="tanggal_pembuatan" readonly />
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Lampiran</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="lampiran" placeholder="Masukkan Lampiran" readonly/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">File Lampiran</label>
              <div class="col-sm-10">
                <input type="file" name="file_lampiran" class="form-control" readonly/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Dalam Rangka</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="dalam_rangka" rows="3" placeholder="Masukkan Dalam Rangka" readonly><?= $myData['keterangan'] ?></textarea>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Hari</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?= $myData['hari'] ?>" name="hari" placeholder="Masukkan Hari" readonly/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Tanggal Pelaksanaan</label>
              <div class="col-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control" value="<?= $myData['tgl_pelaksanaan'] ?>" name="tanggal_pelaksanaan" id="datepicker" placeholder="Masukkan Tanggal Pelaksanaan" readonly/>
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
                  <input type="text" class="form-control" value="<?= $myData['waktu'] ?>" name="waktu" placeholder="Masukkan Waktu" readonly/>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Tempat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?= $myData['tempat'] ?>" name="tempat" placeholder="Masukkan Tempat" readonly/>
              </div>
            </div>
          </div>
        </form>
      </div>
      <?php 
        }
      ?>
    </div><!-- /.box -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include_once("../page/footer.php") ?>
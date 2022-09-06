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
      <div class="box-body">
        <form action="../../proses/nota_dinas/tambah.php" enctype="multipart/form-data" method="post" id="form_nota_dinas">
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Kepada</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="kepada" placeholder="Masukkan Nama" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Perihal</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="perihal" rows="3" placeholder="Masukkan Perihal"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Tanggal Pembuatan</label>
              <div class="col-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control" name="tanggal_pembuatan" value="<?= date('d/m/Y') ?>" readonly />
                </div>
              </div>
            </div>
          </div>
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
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Dalam Rangka</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="dalam_rangka" rows="3" placeholder="Masukkan Dalam Rangka"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Hari</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="hari" placeholder="Masukkan Hari" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Tanggal Pelaksanaan</label>
              <div class="col-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control" id="datepicker" name="tanggal_pelaksanaan" placeholder="Masukkan Tanggal Pelaksanaan" />
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
                  <input type="text" class="form-control" name="waktu" placeholder="Masukkan Waktu" />
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Tempat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="tempat" placeholder="Masukkan Tempat" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <a href="nota_dinas.php" class="btn btn-default"><i class="fa fa-times"></i> Batal</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" id="preview" class="btn btn-primary"><i class="fa fa-eye"></i> Preview</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.box -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
  $(document).ready(function(){

    $("#preview").click(function(){
      var base_url = window.location.origin;
      var data = $("#form_nota_dinas").serialize();

      window.open(
        base_url+'/layouts/contents/preview_nota_dinas.php?'+data,
        '_blank' // <- This is what makes it open in a new window.
      );
      
      // console.log(base_url);
    });

  });
</script>
<?php include_once("../page/footer.php") ?>
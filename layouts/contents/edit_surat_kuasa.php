<?php include_once("../page/header.php") ?>
<?php include_once("../page/navbar.php") ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include_once("../page/sidebar.php") ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat Kuasa
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Yang Memberi Kuasa</h3>
            </div>
            <?php 
                $id = $_GET['id'];
                $query_mysql = mysqli_query($koneksi, "SELECT * FROM tbl_surat JOIN tbl_surat_kuasa ON tbl_surat_kuasa.id_surat = tbl_surat.id WHERE tbl_surat.id='".$id."'");
                while($data = mysqli_fetch_array($query_mysql)){
            ?>
            <form action="../../proses/surat_kuasa/update.php" enctype="multipart/form-data" method="post" id="form_surat_kuasa">
                <div class="box-body">
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">                                
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <input type="text" class="form-control" name="pemberi_kuasa" value="<?= $data['pemberi_kuasa'] ?>" placeholder="Masukkan Nama" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nip" value="<?= $data['nip'] ?>" placeholder="Masukkan NIP" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Pangkat / Gol.Ruang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pangkat" value="<?= $data['pangkat'] ?>" placeholder="Masukkan Pangkat / Gol.Ruang" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jabatan_pemberi_kuasa" value="<?= $data['jabatan_pemberi_kuasa'] ?>" placeholder="Masukkan Jabatan" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Instansi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="instansi" value="<?= $data['instansi'] ?>" placeholder="Masukkan Instansi" readonly />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-header with-border">
                    <h3 class="box-title">Yang Diberi Kuasa</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="penerima_kuasa" value="<?= $data['penerima_kuasa'] ?>" placeholder="Masukkan Nama" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" placeholder="Masukkan Tempat" />
                            </div>
                            <div class="col-sm-5">
                            <?php
                                $tanggal_lahir = str_replace('-', '/', $data['tanggal_lahir'] );
                                $new_tanggal_lahir = date('d/m/Y', strtotime($tanggal_lahir));
                            ?>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" name="tanggal_lahir" value="<?= $new_tanggal_lahir ?>" placeholder="Masukkan Tanggal Lahir" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jabatan_penerima_kuasa" value="<?= $data['jabatan_penerima_kuasa'] ?>" placeholder="Masukkan Jabatan" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tanggung Jawab Yang Diberikan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="ket" placeholder="Masukkan Tanggung Jawab Yang Diberikan"><?= $data['ket'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <a href="surat_kuasa.php" class="btn btn-default"><i class="fa fa-times"></i> Batal</a>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                <button type="button" id="preview" class="btn btn-primary"><i class="fa fa-eye"></i> Preview</button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </form>
            <?php } ?>
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
  $(document).ready(function(){

    $("#preview").click(function(){
      var base_url = window.location.origin;
      var data = $("#form_surat_kuasa").serialize();

      window.open(
        base_url+'/layouts/contents/preview_surat_kuasa.php?'+data,
        '_blank' // <- This is what makes it open in a new window.
      );
      
      // console.log(base_url);
    });

  });
</script>
<?php include_once("../page/footer.php") ?>
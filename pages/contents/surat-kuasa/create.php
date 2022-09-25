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
            <form action="<?= base_url() ?>process/surat-kuasa/tambah.php" enctype="multipart/form-data" method="post" id="form_surat_kuasa">
                <div class="box-body">
                    <?php
                        $id_user = $_SESSION['id_user'];
                        $query = mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE id='".$id_user."'");
                        while($data = mysqli_fetch_array($query)){
                    ?>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">                                
                                <input type="hidden" name="id_guru" value="<?= $id_user ?>">
                                <input type="text" class="form-control" name="pemberi_kuasa" value="<?= $data['nama'] ?>" placeholder="Masukkan Nama" readonly />
                                <input type="hidden" class="form-control" name="tgl_pembuatan" value="<?= date('d/m/Y') ?>" />
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
                                <input type="text" class="form-control" name="pangkat" value="<?= $data['golongan'] ?>" placeholder="Masukkan Pangkat / Gol.Ruang" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jabatan_pemberi_kuasa" value="<?= $data['jabatan'] ?>" placeholder="Masukkan Jabatan" readonly />
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
                    <?php } ?>
                </div>
                <div class="box-header with-border">
                    <h3 class="box-title">Yang Diberi Kuasa</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="penerima_kuasa" placeholder="Masukkan Nama" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat" />
                            </div>
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jabatan_penerima_kuasa" placeholder="Masukkan Jabatan" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tanggung Jawab Yang Diberikan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="ket" placeholder="Masukkan Tanggung Jawab Yang Diberikan"></textarea>
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
                </div><!-- /.box-body -->
            </form>
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
  $(document).ready(function(){

    $("#preview").click(function(){
      var base_url = window.location.origin;
      var data = $("#form_surat_kuasa").serialize();

      window.open(
        base_url+'/process/surat-kuasa/preview.php?'+data,
        '_blank' // <- This is what makes it open in a new window.
      );
      
      // console.log(base_url);
    });

  });
</script>
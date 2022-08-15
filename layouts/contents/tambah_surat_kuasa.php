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
            <div class="box-body">
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Nama" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan NIP" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Pangkat / Gol.Ruang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Pangkat / Gol.Ruang" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Jabatan" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Instansi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Instansi" />
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
                            <input type="text" class="form-control" placeholder="Masukkan Nama" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" placeholder="Masukkan Tempat" />
                        </div>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control datepicker" placeholder="Masukkan Tanggal Lahir" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Jabatan" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tanggung Jawab Yang Diberikan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Masukkan Tanggung Jawab Yang Diberikan"></textarea>
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
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include_once("../page/footer.php") ?>
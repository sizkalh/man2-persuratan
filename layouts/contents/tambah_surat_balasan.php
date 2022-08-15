<?php include_once("../page/header.php") ?>
<?php include_once("../page/navbar.php") ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include_once("../page/sidebar.php") ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat Balasan
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-success">
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
                        <label class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Jabatan" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tugas Yang Diterima</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Masukkan Tugas Yang Diterima"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Bulan</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Masukkan Bulan" />
                                <span class="input-group-addon">s.d.</span>
                                <input type="text" class="form-control" placeholder="Masukkan Bulan" />
                              </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <a href="surat_balasan.php" class="btn btn-default"><i class="fa fa-times"></i> Batal</a>
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
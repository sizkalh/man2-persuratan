<?php include_once("../page/header.php") ?>
<?php include_once("../page/navbar.php") ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include_once("../page/sidebar.php") ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat Izin Kegiatan
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-success">
            <div class="box-body">
                <p class="lead text-green">Yang Bertanda Tangan</p>
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
                        <label class="col-sm-2 col-form-label">Unit Kerja</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Unit Kerja" />
                        </div>
                    </div>
                </div>
                <p class="lead text-green">Kegiatan Yang Diajukan</p>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Surat Dari</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Surat Dari" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Nomor Surat" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tanggal Surat</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control datepicker" placeholder="Masukkan Tanggal Surat" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Perihal</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Masukkan Perihal"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Hari Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Hari Kegiatan" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control datepicker" placeholder="Masukkan Tanggal" />
                            </div>
                        </div>
                        <label class="col-sm-2 col-form-label">Pukul</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                <input type="text" class="form-control timepicker" placeholder="Masukkan Pukul" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tempat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Tempat" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Masukkan Nama Kegiatan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <a href="surat_izin_kegiatan.php" class="btn btn-default"><i class="fa fa-times"></i> Batal</a>
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
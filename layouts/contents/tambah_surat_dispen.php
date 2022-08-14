<?php include_once("../page/header.php") ?>
<?php include_once("../page/navbar.php") ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include_once("../page/sidebar.php") ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat Dispen
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
                        <label class="col-sm-2 col-form-label">Hari</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Hari" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control datepicker" placeholder="Masukkan Tanggal" />
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
                                <input type="text" class="form-control" placeholder="Masukkan Hari" />
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
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Kelas</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">-</td>
                                        <td><input type="text" class="form-control input-sm" placeholder="Masukkan Nama" /></td>
                                        <td><input type="text" class="form-control input-sm" placeholder="Masukkan Kelas" /></td>
                                        <td><input type="text" class="form-control input-sm" placeholder="Masukkan Keterangan" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <a href="surat_dispen.php" class="btn btn-default"><i class="fa fa-times"></i> Batal</a>
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
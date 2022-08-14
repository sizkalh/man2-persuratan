<?php include_once("../page/header.php") ?>
<?php include_once("../page/navbar.php") ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include_once("../page/sidebar.php") ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Permohonan Studi Kampus
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
                        <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Nama Sekolah" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">NPSN Sekolah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan NPSN Sekolah" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Masukkan Alamat"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tanggal Pembuatan</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control" placeholder="Masukkan Tanggal Permbuatan" value="<?= date('d/m/Y') ?>" readonly />
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
                                        <th class="text-center">Kelas</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">-</td>
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
                            <a href="permohonan_studi_kampus.php" class="btn btn-default"><i class="fa fa-times"></i> Batal</a>
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
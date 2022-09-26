<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat SKKB
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
                    <form action="<?= base_url() ?>process/surat-permohonan-narasumber/update.php" enctype="multipart/form-data" method="post" id="form_surat_permohonan_narasumber">
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
                                <label class="col-sm-2 col-form-label">Perihal</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="perihal" rows="3" placeholder="Masukkan Perihal"><?= $data['perihal'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tanggal Pembuatan</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" name="tanggal_pembuatan" value="<?= $data['tgl_pembuatan'] ?>" readonly />
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
                                    <textarea class="form-control" name="dalam_rangka" rows="3" placeholder="Masukkan Dalam Rangka"><?= $data['keterangan'] ?></textarea>
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
                                        <input type="text" class="form-control" id="datepicker" value="<?= $data['tgl_pelaksanaan'] ?>" name="tanggal_pelaksanaan" autocomplete="off" placeholder="Masukkan Tanggal Pelaksanaan" />
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
                                <label class="col-sm-2 col-form-label">Tempat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tempat" value="<?= $data['tempat'] ?>" placeholder="Masukkan Tempat" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Materi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="materi" placeholder="Masukkan Materi"><?= $data['catatan'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="button" onclick="goBack()" class="btn btn-default"><i class="fa fa-times"></i> Batal</button>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                    <!-- Button preview surat -->
                                    <button type="button" id="preview" class="btn btn-primary"><i class="fa fa-eye"></i> Preview</button>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function() {

        $("#preview").click(function() {
            var base_url = window.location.origin;
            var data = $("#form_surat_permohonan_narasumber").serialize();

            window.open(
                base_url + '/process/surat-permohonan-narasumber/preview.php?' + data,
                '_blank' // <- This is what makes it open in a new window.
            );

            // console.log(base_url);
        });

    });
</script>
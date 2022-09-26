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
                <form action="<?= base_url() ?>process/surat-balasan/tambah.php" method="post" id="form_surat_balasan">
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" name="jabatan" class="form-control" placeholder="Masukkan Jabatan" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tugas Yang Diterima</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="tugas_diterima" placeholder="Masukkan Tugas Yang Diterima"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Kegiatan / Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="keterangan" placeholder="Masukkan Kegiatan / Keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Bulan</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="bulan_awal" placeholder="Masukkan Bulan" />
                                    <span class="input-group-addon">s.d.</span>
                                    <input type="text" class="form-control" name="bulan_akhir" placeholder="Masukkan Bulan" />
                                </div>
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
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function() {

        $("#preview").click(function() {
            var base_url = window.location.origin;
            var data = $("#form_surat_balasan").serialize();

            window.open(
                base_url + '/process/surat-balasan/preview.php?' + data,
                '_blank' // <- This is what makes it open in a new window.
            );

            // console.log(base_url);
        });

    });
</script>
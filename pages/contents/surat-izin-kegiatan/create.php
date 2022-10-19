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
                <form action="<?= base_url() ?>process/surat-izin-kegiatan/tambah.php" method="post" id="form_surat_izin_kegiatan">
                    <p class="lead text-green">Yang Bertanda Tangan</p>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="nama_guru" id="nama_guru">
                                <select name="id_guru" id="id_guru" class="form-control select-nama">
                                    <option value="">-- Pilih Nama</option>
                                    <?php
                                    $query_guru = mysqli_query($koneksi, "SELECT * FROM tbl_guru");
                                    while ($data_guru = mysqli_fetch_array($query_guru)) {
                                    ?>
                                        <option value="<?= $data_guru['id'] ?>"><?= $data_guru['nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan NIP" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukkan Jabatan" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Unit Kerja</label>
                            <div class="col-sm-10">
                                <input type="text" name="unit_kerja" id="unit_kerja" class="form-control" placeholder="Masukkan Unit Kerja" readonly />
                            </div>
                        </div>
                    </div>
                    <p class="lead text-green">Dasar pembuatan surat</p>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Berdasarkan surat dari</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="surat_dari" placeholder="Masukkan Surat Dari" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nomor Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_surat_dari" placeholder="Masukkan Nomor Surat" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tanggal Surat</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" name="tgl_surat_dari" placeholder="Masukkan Tanggal Surat" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Perihal</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="perihal_surat_dari" placeholder="Masukkan Perihal"></textarea>
                            </div>
                        </div>
                    </div>
                    <p class="lead text-green">Maka dengan ini memberikan izin untuk mengadakan kegiatan, pada :</p>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Hari Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="hari" placeholder="Masukkan Hari Kegiatan" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" name="tanggal_pelaksanaan" placeholder="Masukkan Tanggal" />
                                </div>
                            </div>
                            <label class="col-sm-2 col-form-label">Pukul</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    <input type="text" class="form-control timepicker" name="waktu" placeholder="Masukkan Pukul" />
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
                            <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="keterangan" placeholder="Masukkan Nama Kegiatan"></textarea>
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
            var data = $("#form_surat_izin_kegiatan").serialize();

            window.open(
                base_url + '/process/surat-izin-kegiatan/preview.php?' + data,
                '_blank' // <- This is what makes it open in a new window.
            );

            // console.log(base_url);
        });

        $("#id_guru").on("change", function() {
            var id = $(this).val()
            getDataGuru(id)
        });

        function getDataGuru(id) {
            $.ajax({
                method: "POST",
                url: base_url + "/process/surat-izin-penelitian/getDataGuru.php",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    $("#nama_guru").val(data.nama)
                    $("#nip").val(data.nip)
                    $("#golongan").val(data.golongan)
                    $("#jabatan").val(data.jabatan)
                    $("#unit_kerja").val(data.instansi)
                }
            });
        }

    });
</script>
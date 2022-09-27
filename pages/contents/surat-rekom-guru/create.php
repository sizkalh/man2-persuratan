<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat Rekomendasi Guru
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Yang bertanda tangan dibawah ini</h3>
            </div>
            <form action="<?= base_url() ?>process/surat-rekom-guru/tambah.php" method="post" id="form_surat_rekomendasi">
                <div class="box-body">
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
                            <label class="col-sm-2 col-form-label">Pangkat / Golongan</label>
                            <div class="col-sm-10">
                                <input type="text" name="golongan" id="golongan" class="form-control" placeholder="Masukkan Pangkat / Golongan" readonly />
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
                            <label class="col-sm-2 col-form-label">Asal Instansi</label>
                            <div class="col-sm-10">
                                <input type="text" name="instansi" id="instansi" class="form-control" placeholder="Masukkan Unit Kerja" readonly />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-header with-border">
                    <h3 class="box-title">Memberikan rekomendasi kepada</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="nama_karyawan" id="nama_karyawan">
                                <select name="id_karyawan" id="id_karyawan" class="form-control select-nama">
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
                                <input type="text" class="form-control" id="nip_karyawan" name="nip_karyawan" placeholder="Masukkan NIP" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat" readonly />
                            </div>
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Pangkat / Golongan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="golongan_karyawan" name="golongan_karyawan" placeholder="Masukkan Golongan" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Masukkan Alamat" readonly></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" name="jabatan_karyawan" id="jabatan_karyawan" class="form-control" placeholder="Masukkan Jabatan" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Perihal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Masukkan Perihal" />
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
    $(document).ready(function() {

        $("#preview").click(function() {
            var base_url = window.location.origin;
            var data = $("#form_surat_rekomendasi").serialize();

            window.open(
                base_url + '/process/surat-rekom-guru/preview.php?' + data,
                '_blank' // <- This is what makes it open in a new window.
            );

            // console.log(base_url);
        });

        $("#id_guru").on("change", function() {
            var id = $(this).val()
            getDataKepsek(id)
        });

        $("#id_karyawan").on("change", function() {
            var id = $(this).val()
            getDataGuru(id)
        });

        function getDataKepsek(id) {
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
                    $("#jabatan").val(data.jabatan)
                    $("#golongan").val(data.golongan)
                    $("#instansi").val(data.instansi)
                }
            });
        }

        function getDataGuru(id) {
            $.ajax({
                method: "POST",
                url: base_url + "/process/surat-izin-penelitian/getDataGuru.php",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    $("#nama_karyawan").val(data.nama)
                    $("#nip_karyawan").val(data.nip)
                    $("#tempat_lahir").val(data.tempat_lahir)
                    $("#tgl_lahir").val(data.tgl_lahir)
                    $("#golongan_karyawan").val(data.golongan)
                    $("#alamat").val(data.alamat)
                    $("#jabatan_karyawan").val(data.jabatan)
                }
            });
        }

    });
</script>
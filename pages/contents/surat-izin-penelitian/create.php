<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat Izin Penelitian
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Yang Memberi Izin Penelitian</h3>
            </div>
            <form action="<?= base_url() ?>process/surat-izin-penelitian/tambah.php" method="post" id="form_surat_izin_penelitian">
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
                            <label class="col-sm-2 col-form-label">Pangkat / Gol.Ruang</label>
                            <div class="col-sm-10">
                                <input type="text" name="golongan" id="golongan" class="form-control" placeholder="Masukkan Pangkat / Gol.Ruang" readonly />
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
                </div>
                <div class="box-header with-border">
                    <h3 class="box-title">Yang Diberi Izin Penelitian</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_mhs" class="form-control" placeholder="Masukkan Nama" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Fakultas / Jurusan</label>
                            <div class="col-sm-10">
                                <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Fakultas / Jurusan" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-10">
                                <input type="text" name="semester" class="form-control" placeholder="Masukkan Semester" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Perguruan Tinggi</label>
                            <div class="col-sm-10">
                                <input type="text" name="kampus" class="form-control" placeholder="Masukkan Perguruan Tinggi" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Judul Penelitian</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="judul" placeholder="Masukkan Judul Penelitian"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tanggal Penelitian</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" name="tanggal_mulai" placeholder="Masukkan Tanggal Awal Penelitian" />
                                    <span class="input-group-addon">s.d.</span>
                                    <input type="text" class="form-control datepicker" name="tanggal_selesai" placeholder="Masukkan Tanggal Akhir Penelitian" />
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
                </div><!-- /.box-body -->
            </form>
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function() {

        $("#preview").click(function() {
            var base_url = window.location.origin;
            var data = $("#form_surat_izin_penelitian").serialize();

            window.open(
                base_url + '/process/surat-izin-penelitian/preview.php?' + data,
                '_blank' // <- This is what makes it open in a new window.
            );

            // console.log(base_url);
        });

        $("#id_guru").on("change", function() {
            var id = $(this).val()
            getDataSiswa(id)
        });

        function getDataSiswa(id) {
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
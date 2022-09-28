<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat Rekomendasi Siswa
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Yang bertanda tangan dibawah ini</h3>
            </div>
            <form action="<?= base_url() ?>process/surat-rekom-siswa/tambah.php" method="post" id="form_rekom_siswa">
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
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukkan Jabatan" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Instansi</label>
                            <div class="col-sm-10">
                                <input type="text" name="unit_kerja" id="unit_kerja" class="form-control" placeholder="Masukkan Instansi" readonly />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-header with-border">
                    <h3 class="box-title">Dengan ini memberikan rekomendasi kepada siswa tersebut dibawah ini</h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="hidden" id="nama_siswa" name="nama_siswa">
                                    <select name="id_siswa" id="id_siswa" class="form-control select-nama">
                                        <option value="">-- Pilih Nama Siswa</option>
                                        <?php
                                        $query_siswa = mysqli_query($koneksi, "SELECT
                                                                                tbl_siswa.*,
                                                                                tbl_kelas.nama AS nama_kel,
                                                                                tbl_kelas.nama_kelas,
                                                                                tbl_jurusan.nama AS nama_jurusan,
                                                                                tbl_detail_kelas.rombel
                                                                                FROM
                                                                                tbl_siswa
                                                                                LEFT JOIN tbl_detail_kelas
                                                                                    ON tbl_detail_kelas.id_detail_kelas = tbl_siswa.id_detail_kelas
                                                                                INNER JOIN tbl_kelas
                                                                                    ON tbl_kelas.id_kelas = tbl_detail_kelas.id_kelas
                                                                                INNER JOIN tbl_jurusan
                                                                                    ON tbl_jurusan.id_jurusan = tbl_detail_kelas.id_jurusan");
                                        while ($data_siswa = mysqli_fetch_array($query_siswa)) {
                                        ?>
                                            <option value="<?= $data_siswa['id'] ?>"><?= $data_siswa['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Tempat, Tanggal Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat" readonly />
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control datepicker" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Kelas</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">NIS</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">NISN</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Masukkan Alamat" readonly></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Perihal</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="perihal" name="perihal" placeholder="Masukkan Perihal"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Tahun Akademik</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Masukkan Tahun Akademik" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="button" onclick="goBack()" class="btn btn-default"><i class="fa fa-times"></i> Batal</button>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                    <button type="button" id="preview" class="btn btn-primary"><i class="fa fa-eye"></i> Preview</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <h4 style="margin-top: 0;">Prestasi Siswa</h4>
                        <table class="table table-condensed table-bordered table-hover">
                            <thead class="bg-success">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Prestasi</th>
                                    <th>Bidang</th>
                                    <th class="text-center">Tahun</th>
                                </tr>
                            </thead>
                            <tbody id="prestasi">
                            </tbody>
                        </table>
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
            var data = $("#form_rekom_siswa").serialize();

            window.open(
                base_url + '/process/surat-rekom-siswa/preview.php?' + data,
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
                    $("#jabatan").val(data.jabatan)
                    $("#unit_kerja").val(data.instansi)
                }
            });
        }

        $("#id_siswa").on("change", function() {
            var id = $(this).val()
            getDataSiswa(id)
            getDataPrestasi(id)
        });

        function getDataSiswa(id) {
            $.ajax({
                method: "POST",
                url: base_url + "/process/surat-skkb/getDataSiswa.php",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    $("#nama_siswa").val(data.nama)

                    var kelas = data.nama_kel + ' ' + data.nama_jurusan + ' ' + data.rombel
                    $("#kelas").val(kelas)

                    $("#tempat_lahir").val(data.tempat_lahir)
                    $("#tgl_lahir").val(data.tgl_lahir)
                    $("#nis").val(data.nis)
                    $("#nisn").val(data.nisn)
                    $("#alamat").val(data.alamat)
                }
            });
        }

        function getDataPrestasi(id) {
            $.ajax({
                method: "POST",
                url: base_url + "/process/surat-rekom-siswa/getPrestasi.php",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    var nomor = 1
                    for (i = 0; i < data.length; i++) {
                        // alert(nomor)
                        $('#prestasi').append('<tr><td class="text-center">' + nomor++ + '</td><td>' + data[i].prestasi + '</td><td>' + data[i].bidang + '</td><td class="text-center">' + data[i].tahun + '</td></tr>');
                    }
                }
            });
        }

    });
</script>
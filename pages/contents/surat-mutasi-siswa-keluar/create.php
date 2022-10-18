<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat Mutasi Siswa Keluar
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-success">
            <div class="box-body">
                <form action="<?= base_url() ?>process/surat-mutasi-siswa-keluar/tambah.php" method="post" id="form_surat_mutasi_siswa_keluar">
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
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

                                <input type="hidden" class="form-control" name="nama" id="nama" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nis" id="nis" placeholder="Masukkan NIS" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">NISN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Masukkan NISN" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Masukkan Kelas" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jk" id="jk" placeholder="Masukkan Kelas" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat" readonly />
                            </div>
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" name="tgl_lahir" id="tgl_lahir" placeholder="Masukkan Tanggal Lahir" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama Orang Tua / Wali</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_ortu" id="nama_ortu" placeholder="Masukkan Kelas" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Pekerjaan Orang Tua / Wali</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pekerjaan_ortu" id="pekerjaan_ortu" placeholder="Masukkan Kelas" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Alamat Rumah</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Masukkan Alamat" readonly></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Pindah Ke</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pindah_ke" id="pindah_ke" placeholder="Pindah ke" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Diterima di kelas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="diterima_di" id="diterima_di" placeholder="Diterima di kelas" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Pindah / Keluar Karena</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alasan_pindah" id="alasan_pindah" placeholder="Pindah / keluar karena" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Catatan</label>
                            <div class="col-sm-10">
                                <strong>
                                    Setelah keluar yang bersangkutan tidak dapat
                                    diterima kembali di MAN 2 Tulungagung.
                                </strong>
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
            var data = $("#form_surat_mutasi_siswa_keluar").serialize();

            window.open(
                base_url + '/process/surat-mutasi-siswa-keluar/preview.php?' + data,
                '_blank' // <- This is what makes it open in a new window.
            );

            // console.log(base_url);
        });

        $("#id_siswa").on("change", function() {
            var id = $(this).val()
            getDataSiswa(id)
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
                    $("#nama").val(data.nama)
                    $("#nis").val(data.nis)
                    $("#nisn").val(data.nisn)

                    var kelas = data.nama_kel + ' ' + data.nama_jurusan + ' ' + data.rombel
                    $("#kelas").val(kelas)

                    $("#tempat_lahir").val(data.tempat_lahir)
                    $("#tgl_lahir").val(data.tgl_lahir)
                    $("#alamat").val(data.alamat)

                    if (data.jk == "L") {
                        var kelamin = "Laki - Laki"
                    } else {
                        var kelamin = "Perempuan"
                    }

                    $("#jk").val(kelamin)
                    $("#nama_ortu").val(data.nama_wali)
                    $("#pekerjaan_ortu").val(data.pekerjaan_wali)

                }
            });
        }

    });
</script>
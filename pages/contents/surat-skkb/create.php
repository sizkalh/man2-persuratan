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
                <form action="<?= base_url() ?>process/surat-skkb/tambah.php" method="post" id="form_surat_skkb">
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-10">
                                <select name="id_detail_kelas" id="id_detail_kelas" class="form-control select-kelas">
                                    <option value="">-- Pilih Kelas</option>
                                    <?php
                                    $query_kelas = mysqli_query($koneksi, 'SELECT
                                                                    A.id_detail_kelas,
                                                                    A.rombel,
                                                                    B.nama AS kelas,
                                                                    B.nama_kelas,
                                                                    C.nama AS jurusan
                                                                FROM
                                                                    tbl_detail_kelas A
                                                                    INNER JOIN tbl_kelas B
                                                                    ON A.id_kelas = B.id_kelas
                                                                    INNER JOIN tbl_jurusan C
                                                                    ON C.id_jurusan = A.id_jurusan
                                                                ORDER BY B.id_kelas ASC,
                                                                    C.id_jurusan ASC,
                                                                    A.rombel ASC');
                                    while ($data_kelas = mysqli_fetch_array($query_kelas)) {
                                    ?>
                                        <option value="<?= $data_kelas['id_detail_kelas'] ?>"><?= $data_kelas['rombel'] != '0' ? $data_kelas['kelas'] . '  ' . $data_kelas['jurusan'] . '  ' . $data_kelas['rombel'] : $data_kelas['kelas'] . '  ' . $data_kelas['jurusan']  ?></option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" class="form-control" id="kelas" name="kelas" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <select name="id_siswa" id="id_siswa" class="form-control select-nama">
                                </select>

                                <input type="hidden" class="form-control" id="nama" name="nama" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">NISN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" readonly />
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
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Masukkan Alamat" readonly></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Masukkan Tahun Ajaran" />
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
            var data = $("#form_surat_skkb").serialize();

            window.open(
                base_url + '/process/surat-skkb/preview.php?' + data,
                '_blank' // <- This is what makes it open in a new window.
            );

            // console.log(base_url);
        });

        $("#id_siswa").prop("disabled", true)

        $("#id_detail_kelas").on("change", function() {
            var id = $(this).val()
            $("#id_siswa").prop("disabled", false)
            getDataSiswaByKelas(id)
        })

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
                }
            });
        }

        function getDataSiswaByKelas(id) {
            $.ajax({
                method: "POST",
                url: base_url + "/process/surat-skkb/getDataSiswaByKelas.php",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    var content = '';
                    content += '<option value =""> -- Pilih Nama Siswa</option>';
                    for (i = 0; i < data.length; i++) {
                        content += '<option value ="' + data[i].id + '"> ' + data[i].nama + '</option>';
                    }
                    $('#id_siswa').html(content)
                }
            });
        }

    });
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat Keterangan Siswa
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Kepala Sekolah / Madrasah</h3>
            </div>
            <?php
            $id = $_GET['id'];
            $query_mysql = mysqli_query($koneksi, "SELECT surat.*, lamp.id_surat, lamp.lampiran, lamp.file FROM tbl_surat AS surat LEFT JOIN tbl_lampiran AS lamp ON lamp.id_surat = surat.id WHERE surat.id='" . $id . "'");
            while ($data = mysqli_fetch_array($query_mysql)) {

                $query_siswa = mysqli_query($koneksi, 'SELECT
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
                                                                ON tbl_jurusan.id_jurusan = tbl_detail_kelas.id_jurusan 
                                                            WHERE tbl_siswa.id = ' . $data['kepada']);
                $data_siswa = mysqli_fetch_array($query_siswa);

                $query_guru = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE id = ' . $data['keterangan']);
                $data_guru = mysqli_fetch_array($query_guru);
            ?>
                <form action="<?= base_url() ?>process/suket-siswa/update.php" method="post" id="form_suket_siswa">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                    <input type="hidden" name="nama_guru" value="<?= $data_guru['nama'] ?>" id="nama_guru">
                                    <select name="id_guru" id="id_guru" class="form-control select-nama">
                                        <option value="">-- Pilih Nama</option>
                                        <?php
                                        $query_guru_opt = mysqli_query($koneksi, "SELECT * FROM tbl_guru");
                                        while ($data_guru_opt = mysqli_fetch_array($query_guru_opt)) {
                                        ?>
                                            <option value="<?= $data_guru_opt['id'] ?>" <?= $data_guru_opt['id'] == $data_guru['id'] ? 'selected' : '' ?>><?= $data_guru_opt['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nip" id="nip" value="<?= $data_guru['nip'] ?>" class="form-control" placeholder="Masukkan NIP" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="jabatan" id="jabatan" value="<?= $data_guru['jabatan'] ?>" class="form-control" placeholder="Masukkan Jabatan" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Unit Kerja</label>
                                <div class="col-sm-10">
                                    <input type="text" name="unit_kerja" id="unit_kerja" value="<?= $data_guru['instansi'] ?>" class="form-control" placeholder="Masukkan Unit Kerja" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">Menerangkan Siswa Bersangkutan</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <select name="id_detail_kelas" id="id_detail_kelas" class="form-control">
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
                                            <option value="<?= $data_kelas['id_detail_kelas'] ?>" <?= $data_kelas['id_detail_kelas'] == $data_siswa['id_detail_kelas'] ? 'selected' : '' ?>><?= $data_kelas['rombel'] != '0' ? $data_kelas['kelas'] . '  ' . $data_kelas['jurusan'] . '  ' . $data_kelas['rombel'] : $data_kelas['kelas'] . '  ' . $data_kelas['jurusan']  ?></option>
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
                                    <input type="hidden" id="nama_siswa" name="nama_siswa" value="<?= $data_siswa['nama'] ?>">
                                    <select name="id_siswa" id="id_siswa" class="form-control select-nama">
                                        <option value="">-- Pilih Nama Siswa</option>
                                        <?php
                                        $query_siswa_opt = mysqli_query($koneksi, "SELECT
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
                                        while ($data_siswa_opt = mysqli_fetch_array($query_siswa_opt)) {
                                        ?>
                                            <option value="<?= $data_siswa_opt['id'] ?>" <?= $data_siswa_opt['id'] == $data_siswa['id'] ? 'selected' : '' ?>><?= $data_siswa_opt['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="tempat_lahir" value="<?= $data_siswa['tempat_lahir'] ?>" id="tempat_lahir" placeholder="Masukkan Tempat" readonly />
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control datepicker" name="tgl_lahir" value="<?= $data_siswa['tgl_lahir'] ?>" id="tgl_lahir" placeholder="Masukkan Tanggal Lahir" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kelas" id="kelas" value="<?= $data_siswa['nama_kel'] . ' ' . $data_siswa['nama_jurusan'] . ' ' . $data_siswa['rombel'] ?>" placeholder="Masukkan Kelas" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Satdik</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="satdik" name="satdik" value="<?= $data_siswa['satdik'] ?>" placeholder="Masukkan Satdik" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nama Ayah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?= $data_siswa['nama_wali'] ?>" placeholder="Masukkan Nama Ayah" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nama Ibu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?= $data_siswa['nama_ibu'] ?>" placeholder="Masukkan Nama Ibu" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Jumlah Saudara</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="jml_saudara" name="jml_saudara" value="<?= $data_siswa['jml_saudara'] ?>" placeholder="Masukkan Jumlah Saudara" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Masukkan Alamat" readonly><?= $data_siswa['alamat'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?= $data['catatan'] ?>" placeholder="Masukkan Tahun Ajaran" />
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
            <?php } ?>
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function() {

        $("#preview").click(function() {
            var base_url = window.location.origin;
            var data = $("#form_suket_siswa").serialize();

            window.open(
                base_url + '/process/suket-siswa/preview.php?' + data,
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
                    $("#nama_siswa").val(data.nama)

                    var kelas = data.nama_kel + ' ' + data.nama_jurusan + ' ' + data.rombel
                    $("#kelas").val(kelas)

                    $("#tempat_lahir").val(data.tempat_lahir)
                    $("#tgl_lahir").val(data.tgl_lahir)
                    $("#satdik").val(data.satdik)
                    $("#nama_ayah").val(data.nama_wali)
                    $("#nama_ibu").val(data.nama_ibu)
                    $("#jml_saudara").val(data.jml_saudara)
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
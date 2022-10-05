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
                <form action="<?= base_url() ?>process/surat-rekom-siswa/update.php" method="post" id="form_surat_rekom_siswa">
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
                                <label class="col-sm-2 col-form-label">Instansi</label>
                                <div class="col-sm-10">
                                    <input type="text" name="unit_kerja" id="unit_kerja" value="<?= $data_guru['instansi'] ?>" class="form-control" placeholder="Masukkan Instansi" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">Menerangkan Siswa Bersangkutan</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
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
                                    <label class="col-sm-3 col-form-label">Tempat, Tanggal Lahir</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $data_siswa['tempat_lahir'] ?>" id="tempat_lahir" placeholder="Masukkan Tempat" readonly />
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control datepicker" name="tgl_lahir" value="<?= $data_siswa['tgl_lahir'] ?>" id="tgl_lahir" placeholder="Masukkan Tanggal Lahir" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Kelas</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="kelas" id="kelas" value="<?= $data_siswa['nama_kel'] . ' ' . $data_siswa['nama_jurusan'] . ' ' . $data_siswa['rombel'] ?>" placeholder="Masukkan Kelas" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">NIS</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nis" name="nis" value="<?= $data_siswa['nis'] ?>" placeholder="Masukkan NIS" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">NISN</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $data_siswa['nisn'] ?>" placeholder="Masukkan NISN" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Masukkan Alamat" readonly><?= $data_siswa['alamat'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Perihal</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="perihal" name="perihal" placeholder="Masukkan Perihal"><?= $data['perihal'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Tahun Akademik</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?= $data['catatan'] ?>" placeholder="Masukkan Tahun Akademik" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-10">
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
                                    <?php
                                    $no = 1;
                                    $query_prestasi = mysqli_query($koneksi, 'SELECT
                                                                                    *
                                                                                    FROM
                                                                                    tbl_prestasi
                                                                                    WHERE id_siswa = ' . $data_siswa['id']);
                                    while ($prestasi = mysqli_fetch_array($query_prestasi)) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $prestasi['prestasi'] ?></td>
                                            <td><?= $prestasi['bidang'] ?></td>
                                            <td><?= $prestasi['tahun'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
            var data = $("#form_surat_rekom_siswa").serialize();

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
                    num = 1;
                    var html = "";
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html +=
                            "<tr>" +
                            "<td class='text-center'>" +
                            num++ +
                            "</td>" +
                            "<td>" +
                            data[i].prestasi +
                            "</td>" +
                            "<td>" +
                            data[i].bidang +
                            "</td>" +
                            "<td>" +
                            data[i].tahun +
                            "</td>" +
                            "</tr>";
                    }
                    $("#prestasi").html(html);
                }
            });
        }

    });
</script>
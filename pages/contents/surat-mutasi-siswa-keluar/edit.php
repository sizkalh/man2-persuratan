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
                ?>
                    <form action="<?= base_url() ?>process/surat-mutasi-siswa-keluar/update.php" method="post" id="form_surat_mutasi_siswa_keluar">
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
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                    <input type="hidden" name="id_siswa" value="<?= $data_siswa['id'] ?>">
                                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $data_siswa['nama'] ?>" placeholder="Masukkan NIS" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">NIS</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nis" id="nis" value="<?= $data_siswa['nis'] ?>" placeholder="Masukkan NIS" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">NISN</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nisn" id="nisn" value="<?= $data_siswa['nisn'] ?>" placeholder="Masukkan NISN" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jk" id="jk" value="<?= $data_siswa['jk'] == "L" ? "Laki - Laki" : "Perempuan" ?>" placeholder="Masukkan Kelas" readonly />
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
                                <label class="col-sm-2 col-form-label">Nama Orang Tua / Wali</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_ortu" id="nama_ortu" value="<?= $data_siswa['nama_wali'] ?>" placeholder="Masukkan Kelas" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Pekerjaan Orang Tua / Wali</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pekerjaan_ortu" id="pekerjaan_ortu" value="<?= $data_siswa['pekerjaan_wali'] ?>" placeholder="Masukkan Kelas" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Alamat Rumah</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Masukkan Alamat" readonly><?= $data_siswa['alamat'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Pindah Ke</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pindah_ke" id="pindah_ke" value="<?= $data['perihal'] ?>" placeholder="Pindah ke" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Diterima di kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="diterima_di" id="diterima_di" value="<?= $data['keterangan'] ?>" placeholder="Diterima di kelas" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Pindah / Keluar Karena</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alasan_pindah" id="alasan_pindah" value="<?= $data['catatan'] ?>" placeholder="Pindah / keluar karena" />
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
                <?php } ?>
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

    });
</script>
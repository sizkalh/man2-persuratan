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

                $query_kepsek = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE id = ' . $data['kepada']);
                $data_kepsek = mysqli_fetch_array($query_kepsek);

                $query_guru = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE id = ' . $data['keterangan']);
                $data_guru = mysqli_fetch_array($query_guru);
            ?>
                <form action="<?= base_url() ?>process/suket-guru/update.php" method="post" id="form_suket_guru">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                    <input type="hidden" name="nama_guru" value="<?= $data_kepsek['nama'] ?>" id="nama_guru">
                                    <select name="id_guru" id="id_guru" class="form-control select-nama">
                                        <option value="">-- Pilih Nama</option>
                                        <?php
                                        $query_kepsek_opt = mysqli_query($koneksi, "SELECT * FROM tbl_guru");
                                        while ($data_kepsek_opt = mysqli_fetch_array($query_kepsek_opt)) {
                                        ?>
                                            <option value="<?= $data_kepsek_opt['id'] ?>" <?= $data_kepsek_opt['id'] == $data_kepsek['id'] ? 'selected' : '' ?>><?= $data_kepsek_opt['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nip" id="nip" value="<?= $data_kepsek['nip'] ?>" class="form-control" placeholder="Masukkan NIP" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="jabatan" id="jabatan" value="<?= $data_kepsek['jabatan'] ?>" class="form-control" placeholder="Masukkan Jabatan" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Unit Kerja</label>
                                <div class="col-sm-10">
                                    <input type="text" name="unit_kerja" id="unit_kerja" value="<?= $data_kepsek['instansi'] ?>" class="form-control" placeholder="Masukkan Unit Kerja" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">Menerangkan Guru Bersangkutan</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="nama_karyawan" id="nama_karyawan" value="<?= $data_guru['nama'] ?>">
                                    <select name="id_karyawan" id="id_karyawan" class="form-control select-nama">
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
                                    <input type="text" class="form-control" id="nip_karyawan" value="<?= $data_guru['nip'] ?>" name="nip_karyawan" placeholder="Masukkan NIP" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="tempat_lahir" value="<?= $data_guru['tempat_lahir'] ?>" name="tempat_lahir" placeholder="Masukkan Tempat" readonly />
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control datepicker" id="tgl_lahir" value="<?= $data_guru['tgl_lahir'] ?>" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Pangkat / Golongan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="golongan_karyawan" value="<?= $data_guru['golongan'] ?>" name="golongan_karyawan" placeholder="Masukkan Golongan" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Masukkan Alamat" readonly><?= $data_guru['alamat'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="jabatan_karyawan" id="jabatan_karyawan" value="<?= $data_guru['jabatan'] ?>" class="form-control" placeholder="Masukkan Jabatan" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Masa Kerja</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="masa_kerja" name="masa_kerja" value="<?= $data['catatan'] ?>" placeholder="Masukkan Masa Kerja" />
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
            var data = $("#form_suket_guru").serialize();

            window.open(
                base_url + '/process/suket-guru/preview.php?' + data,
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

    });
</script>
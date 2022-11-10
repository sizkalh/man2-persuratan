<?php
function tgl_indo_garing($tanggal)
{
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return  $pecahkan[2] . '/' . $pecahkan[1] . '/' . $pecahkan[0];
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat Dispensasi
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo '
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-ban"></i> Data gagal disimpan !
                    </div>
                ';
            } else if ($_GET['pesan'] == "berhasil") {
                echo '
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fa fa-check"></i> Data berhasil disimpan
                        </div>
                    ';
            }
        }
        ?>
        <!-- Default box -->
        <div class="box box-success">
            <div class="box-body">
                <?php
                $id = $_GET['id'];
                $query_mysql = mysqli_query($koneksi, "SELECT surat.*, lamp.id_surat, lamp.lampiran, lamp.file FROM tbl_surat AS surat LEFT JOIN tbl_lampiran AS lamp ON lamp.id_surat = surat.id WHERE surat.id='" . $id . "'");
                while ($data = mysqli_fetch_array($query_mysql)) {

                    if ($data['kepada'] != null || $data['kepada'] != '') {
                        $query_kepsek = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE id = ' . $data['kepada']);
                        $data_kepsek = mysqli_fetch_array($query_kepsek);
                    }
                ?>
                    <form action="<?= base_url() ?>process/surat-dispen/update.php" method="post" id="form_surat_tugas">
                        <p class="lead text-green">Yang bertanda tangan dibawah ini :</p>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                    <input type="hidden" name="nama_guru" id="nama_guru">
                                    <select name="id_guru" id="id_guru" class="form-control select-nama">
                                        <option value="">-- Pilih Nama</option>
                                        <?php
                                        $query_guru = mysqli_query($koneksi, "SELECT * FROM tbl_guru");
                                        if ($data['kepada'] != null || $data['kepada'] != '') {
                                            while ($data_guru = mysqli_fetch_array($query_guru)) {
                                        ?>
                                                <option value="<?= $data_guru['id'] ?>" <?= $data_guru['id'] == $data['kepada'] ? 'selected' : '' ?>><?= $data_guru['nama'] ?></option>
                                            <?php }
                                        } else {
                                            while ($data_guru = mysqli_fetch_array($query_guru)) {
                                            ?>
                                                <option value="<?= $data_guru['id'] ?>"><?= $data_guru['nama'] ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nip" id="nip" class="form-control" value="<?= $data['kepada'] != null || $data['kepada'] != '' ? $data_kepsek['nip'] : '' ?>" placeholder="Masukkan NIP" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="jabatan" id="jabatan" class="form-control" value="<?= $data['kepada'] != null || $data['kepada'] != '' ? $data_kepsek['jabatan'] : '' ?>" placeholder="Masukkan Jabatan" readonly />
                                </div>
                            </div>
                        </div>
                        <p class="lead text-green">Untuk tidak mengikuti KBM dikarenakan :</p>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Kegiatan</label>
                                <div class="col-sm-10">
                                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan kegiatan"><?= $data['alamat'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Hari Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="hari" id="hari" value="<?= $data['hari'] ?>" placeholder="Masukkan Hari Kegiatan" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control datepicker" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" value="<?= $data['tgl_pelaksanaan'] != null || $data['tgl_pelaksanaan'] != '' ? tgl_indo_garing($data['tgl_pelaksanaan']) : '' ?>" placeholder="Masukkan Tanggal" />
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label" style="text-align: right;">Waktu</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                        <input type="text" class="form-control timepicker" id="waktu" name="waktu" value="<?= $data['waktu'] ?>" placeholder="Masukkan Waktu" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tempat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tempat" id="tempat" value="<?= $data['tempat'] ?>" placeholder="Masukkan Tempat" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="<?= base_url() ?>process/surat-dispen/input-petugas.php" method="post">
                        <p class="lead text-green">Daftar siswa dispensasi</p>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <table class="table table-condensed table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="50" class="text-center">No</th>
                                                <th class="text-center" width="250">Kelas</th>
                                                <th>Nama</th>
                                                <th>Keterangan</th>
                                                <th width="150" class="text-center">Aksi</th>
                                            </tr>
                                            <tr>
                                                <td class="text-center">~</td>
                                                <td>
                                                    <select name="id_detail_kelas" id="id_detail_kelas" class="form-control" style="width: 100%;">
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
                                                </td>
                                                <td>
                                                    <input type="hidden" name="id_surat" value="<?= $_GET['id'] ?>">
                                                    <input type="hidden" name="id_detail_kelas" id="id_detail_kelas">
                                                    <select name="id_siswa" id="id_siswa" class="form-control select-nama" style="width: 100%;">
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea name="keterangan" class="form-control"></textarea>
                                                </td>
                                                <td class="text-center">
                                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> tambah</button>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query_petugas = mysqli_query($koneksi, "SELECT
                                                                                    A.*,
                                                                                    B.id_detail_kelas,
                                                                                    B.rombel,
                                                                                    C.nama AS kelas,
                                                                                    C.nama_kelas,
                                                                                    D.nama AS jurusan,
                                                                                    E.id AS id_surat_dispen,
                                                                                    E.keterangan
                                                                                    FROM
                                                                                    tbl_siswa A
                                                                                    INNER JOIN tbl_detail_kelas B
                                                                                        ON B.id_detail_kelas = A.id_detail_kelas
                                                                                    INNER JOIN tbl_kelas C
                                                                                        ON C.id_kelas = B.id_kelas
                                                                                    INNER JOIN tbl_jurusan D
                                                                                        ON D.id_jurusan = B.id_jurusan
                                                                                        INNER JOIN tbl_surat_dispen E
                                                                                        ON E.id_siswa = A.id
                                                                                    WHERE E.id_surat = '" . $data['id'] . "'
                                                                                    ");
                                            while ($data_petugas = mysqli_fetch_array($query_petugas)) {
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?></td>
                                                    <td class="text-center"><?= $data_petugas['rombel'] != '0' ? $data_petugas['kelas'] . '  ' . $data_petugas['jurusan'] . '  ' . $data_petugas['rombel'] : $data_petugas['kelas'] . '  ' . $data_petugas['jurusan']  ?></td>
                                                    <td><?= $data_petugas['nama'] ?></td>
                                                    <td><?= $data_petugas['keterangan'] ?></td>
                                                    <td class="text-center">
                                                        <a href="<?= base_url() ?>process/surat-dispen/hapus-petugas.php?id=<?= $data_petugas['id_surat_dispen'] ?>&id_surat=<?= $data['id'] ?>" class="btn btn-sm btn-danger">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="pull-right">
                                        <a href="<?= base_url() ?>surat-dispen/index" class="btn btn-default"><i class="fa fa-folder-open"></i> Kembalai dan simpan</a>
                                        <button type="button" id="preview" class="btn btn-primary"><i class="fa fa-eye"></i> Preview</button>
                                    </div>
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
            var data = $("#form_surat_tugas").serialize();

            window.open(
                base_url + '/process/surat-dispen/preview_d.php?' + data,
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
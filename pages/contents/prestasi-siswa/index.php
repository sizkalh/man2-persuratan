<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Prestasi Siswa
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
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
        <div class="box box-success">
            <div class="box-body">
                <table class="table table-condensed table-bordered table-hover" id="data-table">
                    <thead>
                        <tr>
                            <th width="30" class="text-center">No</th>
                            <th>Data Diri</th>
                            <th>Prestasi</th>
                            <th class="text-center" width="100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query_siswa = mysqli_query($koneksi, 'SELECT
                                                                tbl_siswa.*,
                                                                tbl_kelas.nama AS kelas,
                                                                tbl_kelas.nama_kelas,
                                                                tbl_jurusan.nama AS jurusan,
                                                                tbl_detail_kelas.rombel
                                                                FROM
                                                                tbl_siswa
                                                                LEFT JOIN tbl_detail_kelas
                                                                    ON tbl_detail_kelas.id_detail_kelas = tbl_siswa.id_detail_kelas
                                                                INNER JOIN tbl_kelas
                                                                    ON tbl_kelas.id_kelas = tbl_detail_kelas.id_kelas
                                                                INNER JOIN tbl_jurusan
                                                                    ON tbl_jurusan.id_jurusan = tbl_detail_kelas.id_jurusan');
                        while ($data_siswa = mysqli_fetch_array($query_siswa)) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td>
                                    Nama : <?= $data_siswa['nama'] ?> <br>
                                    NIS : <?= $data_siswa['nis'] ?> <br>
                                    NISN : <?= $data_siswa['nis'] ?> <br>
                                    Jenis Kelamin : <?= $data_siswa['jk'] ?> <br>
                                    <span class="label bg-green" style="font-size: .9em;">Kelas : <?= $data_siswa['rombel'] != '0' ? $data_siswa['kelas'] . '  ' . $data_siswa['jurusan'] . '  ' . $data_siswa['rombel'] : $data_siswa['kelas'] . '  ' . $data_siswa['jurusan']  ?></span>
                                </td>
                                <td>
                                    <?php
                                    $no = 1;
                                    $query_prestasi = mysqli_query($koneksi, 'SELECT
                                                                                *
                                                                                FROM
                                                                                tbl_prestasi
                                                                                WHERE id_siswa = ' . $data_siswa['id']);
                                    while ($prestasi = mysqli_fetch_array($query_prestasi)) {
                                    ?>
                                        <?= $no++ ?>. <?= $prestasi['prestasi'] ?> (<?= $prestasi['tahun'] ?>) <br>
                                    <?php } ?>
                                
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>prestasi-siswa/edit?id=<?= $data_siswa['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Tambah Prestasi</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Wali Kelas
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
            <?php
            if ($_SESSION['pangkat_user'] == 'guru' || 'superuser') {
            ?>
                <div class="box-header">
                    <a href="<?= base_url() ?>wali-kelas/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Wali Kelas</a>
                </div>
            <?php } ?>
            <div class="box-body">
                <table class="table table-condensed table-bordered table-hover" id="data-table">
                    <thead>
                        <tr>
                            <th width="30" class="text-center">No</th>
                            <th>Nama</th>
                            <th>Wali Kelas</th>
                            <th width="100" class="text-center">Tingkat</th>
                            <th class="text-center" width="100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query_guru = mysqli_query($koneksi, 'SELECT
                                                                A.id_wali_kelas,
                                                                B.*,
                                                                C.id_detail_kelas,
                                                                C.rombel,
                                                                D.nama AS kelas,
                                                                D.nama_kelas,
                                                                E.nama AS jurusan
                                                                FROM
                                                                tbl_wali_kelas A
                                                                INNER JOIN tbl_guru B
                                                                    ON A.id_guru = B.id
                                                                INNER JOIN tbl_detail_kelas C
                                                                    ON C.id_detail_kelas = A.id_detail_kelas
                                                                INNER JOIN tbl_kelas D
                                                                    ON D.id_kelas = C.id_kelas
                                                                INNER JOIN tbl_jurusan E
                                                                    ON E.id_jurusan = C.id_jurusan');
                        while ($data_guru = mysqli_fetch_array($query_guru)) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $data_guru['nama'] ?></td>
                                <td><?= $data_guru['rombel'] != '0' ? $data_guru['kelas'] . '  ' . $data_guru['jurusan'] . '  ' . $data_guru['rombel'] : $data_guru['kelas'] . '  ' . $data_guru['jurusan']  ?></td>
                                <td class="text-center"><?= $data_guru['nama_kelas'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>wali-kelas/edit?id=<?= $data_guru['id_wali_kelas'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                    <a href="<?= base_url() ?>process/wali-kelas/hapus.php?id=<?= $data_guru['id_wali_kelas'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
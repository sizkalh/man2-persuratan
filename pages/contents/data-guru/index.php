<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Guru & Tendik
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
                    <a href="<?= base_url() ?>data-kelas/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kels</a>
                </div>
            <?php } ?>
            <div class="box-body">
                <table class="table table-condensed table-bordered table-hover" id="data-table">
                    <thead>
                        <tr>
                            <th width="30" class="text-center">No</th>
                            <th>Kelas</th>
                            <th width="100" class="text-center">Tingkat</th>
                            <th class="text-center" width="100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
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
                        <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $data_kelas['rombel'] != '0' ? $data_kelas['kelas'].'  '.$data_kelas['jurusan'].'  '.$data_kelas['rombel'] : $data_kelas['kelas'].'  '.$data_kelas['jurusan']  ?></td>
                        <td class="text-center"><?= $data_kelas['nama_kelas'] ?></td>
                        <td class="text-center">
                            <a href="<?= base_url() ?>process/data-kelas/hapus.php?id=<?= $data_kelas['id_detail_kelas'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
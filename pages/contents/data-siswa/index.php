<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Siswa
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
            if ($_SESSION['pangkat_user'] == 'operator' || $_SESSION['pangkat_user'] == 'superuser') {
            ?>
                <div class="box-header">
                    <a href="<?= base_url() ?>data-siswa/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Siswa</a>
                    <button type="button" class="btn btn-success" data-toggle="modal" id="modal-otor" data-target="#modal-default"><i class=" fa fa-file-excel-o"></i> Import Data Siswa</button>
                </div>
            <?php } ?>
            <div class="box-body">
                <table class="table table-condensed table-bordered table-hover" id="data-table">
                    <thead>
                        <tr>
                            <th width="30" class="text-center">No</th>
                            <th>Data Diri</th>
                            <th>Info Kontak</th>
                            <th class="text-center">Kelas</th>
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
                                    Tempat Lahir : <?= $data_siswa['tempat_lahir'] ?> <br>
                                    Tgl. Lahir : <?= $data_siswa['tgl_lahir'] ?> <br>
                                    <span class="label bg-green" style="font-size: .9em;">USERNAME : <?= $data_siswa['username'] ?></span>
                                </td>
                                <td>
                                    No. HP : <?= $data_siswa['no_hp'] ?> <br>
                                    Nama Wali : <?= $data_siswa['nama_wali'] ?> <br>
                                    No. HP Wali : <?= $data_siswa['no_hp_wali'] ?> <br>
                                    Nama Ibu : <?= $data_siswa['nama_ibu'] ?> <br>
                                    No. HP Ibu : <?= $data_siswa['no_hp_ibu'] ?> <br>
                                    Alamat : <?= $data_siswa['alamat'] ?>
                                </td>
                                <td class="text-center">
                                    <?= $data_siswa['rombel'] != '0' ? $data_siswa['kelas'] . '  ' . $data_siswa['jurusan'] . '  ' . $data_siswa['rombel'] : $data_siswa['kelas'] . '  ' . $data_siswa['jurusan']  ?>
                                </td>
                                <td class="text-center">
                                    <button type="button" id="reset" data-id="<?= $data_siswa['id'] ?>" onclick="reset(<?= $data_siswa['id'] ?>)" class="btn btn-sm btn-default"><i class="fa fa-refresh"></i></button>
                                    <a href="<?= base_url() ?>data-siswa/edit?id=<?= $data_siswa['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                    <a href="<?= base_url() ?>process/data-siswa/hapus.php?id=<?= $data_siswa['id'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.box -->

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>process/data-siswa/upload.php">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Import data siswa dengan file excel</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Upload file excel</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="file_e" name="file_e" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <br>
                                        <p>
                                            Untuk format file yang akan diupload bisa didownload dengan klik tombol download dibawah ini.
                                        </p>
                                        <a href="<?= base_url() ?>dist/format-data-siswa.xls" class="btn btn-success"><i class="fa fa-download"></i> Download format file</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Upload file</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    function reset(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Apakah data sudah benar ?',
            text: "Silahkan cek kembali apabila data dirasa kurang benar !.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, benar dan ajukan.',
            cancelButtonText: 'Tidak, batal ajukan.',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "GET",
                    url: base_url + "/process/data-siswa/reset.php",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.status == "sukses") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Data berhasil disimipan.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            swalWithBootstrapButtons.fire(
                                'Gagal',
                                'Data gagal disimpan',
                                'error'
                            )
                        }
                    }
                })
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Dibatalkan',
                    'Berhasil di batalkan',
                    'error'
                )
            }
        })
    }
</script>
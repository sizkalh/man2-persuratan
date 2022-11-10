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
            if ($_SESSION['pangkat_user'] == 'operator' || $_SESSION['pangkat_user'] == 'superuser') {
            ?>
                <div class="box-header">
                    <a href="<?= base_url() ?>data-guru/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Guru & Tendik</a>
                    <button type="button" class="btn btn-success" data-toggle="modal" id="modal-otor" data-target="#modal-default"><i class=" fa fa-file-excel-o"></i> Import Data Guru & Tendik</button>
                </div>
            <?php } ?>
            <div class="box-body">
                <table class="table table-condensed table-bordered table-hover" id="data-table">
                    <thead>
                        <tr>
                            <th width="30" class="text-center">No</th>
                            <th>Data Diri</th>
                            <th>Info Kontak</th>
                            <th>Jabatan</th>
                            <th class="text-center" width="100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query_guru = mysqli_query($koneksi, 'SELECT * FROM tbl_guru');
                        while ($data_guru = mysqli_fetch_array($query_guru)) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td>
                                    Nama : <?= $data_guru['nama'] ?> <br>
                                    NIP : <?= $data_guru['nip'] ?> <br>
                                    Jenis Kelamin : <?= $data_guru['jk'] ?> <br>
                                    Tempat Lahir : <?= $data_guru['tempat_lahir'] ?> <br>
                                    Tgl. Lahir : <?= $data_guru['tgl_lahir'] ?> <br>
                                    <span class="label bg-green" style="font-size: .9em;">USERNAME : <?= $data_guru['username'] ?></span>
                                </td>
                                <td>
                                    No. HP : <?= $data_guru['no_hp'] ?> <br>
                                    Email : <?= $data_guru['email'] ?> <br>
                                    Alamat : <?= $data_guru['alamat'] ?>
                                </td>
                                <td>
                                    Pangkat : <?= $data_guru['pangkat_guru'] ?> <br>
                                    Golongan : <?= $data_guru['golongan'] ?> <br>
                                    Alamat : <?= $data_guru['alamat'] ?>
                                </td>
                                <td class="text-center">
                                    <button type="button" id="reset" data-id="<?= $data_guru['id'] ?>" onclick="reset(<?= $data_guru['id'] ?>)" class="btn btn-sm btn-default"><i class="fa fa-refresh"></i></button>
                                    <a href="<?= base_url() ?>data-guru/edit?id=<?= $data_guru['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                    <a href="<?= base_url() ?>process/data-guru/hapus.php?id=<?= $data_guru['id'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
                    <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>process/data-guru/upload.php">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Import data guru & tendik dengan file excel</h4>
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
                                        <a href="<?= base_url() ?>dist/format-data-guru.xls" class="btn btn-success"><i class="fa fa-download"></i> Download format file</a>
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
                    url: base_url + "/process/data-guru/reset.php",
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
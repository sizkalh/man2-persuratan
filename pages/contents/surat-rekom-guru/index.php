<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat Rekomendasi Guru
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
                    <a href="<?= base_url() ?>surat-rekom-guru/create" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Surat Rekomendasi Guru</a>
                </div>
            <?php } ?>
            <div class="box-body">
                <table class="table table-condensed table-hover" id="data-table">
                    <thead>
                        <tr>
                            <th width="20" class="text-center">~</th>
                            <th width="30" class="text-center">No</th>
                            <th>No. Surat</th>
                            <th class="text-center" width="110">Tgl. Pembuatan</th>
                            <th>Nama Guru</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Perihal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>


                        <!-- Mengeluarkan Data dari database -->
                        <?php
                        $no = 1;
                        $id_user = mysqli_query($koneksi, "select * from tbl_guru where id = '" . $_SESSION['id_user'] . "'");
                        while ($cek_jabatan = mysqli_fetch_array($id_user)) {
                            if ($cek_jabatan['pangkat'] == 'guru') {
                                $data = mysqli_query($koneksi, "SELECT * FROM tbl_surat WHERE jenis='surat_rekom_guru' AND id_pemohon = '" . $_SESSION['id_user'] . "' ORDER BY id DESC");
                            } else {
                                $data = mysqli_query($koneksi, "SELECT * FROM tbl_surat WHERE jenis='surat_rekom_guru' ORDER BY id DESC");
                            }
                        }

                        // icon ditolak, diterima dan menunggu
                        while ($myData = mysqli_fetch_array($data)) {
                            $query_guru = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE id = ' . $myData['keterangan']);
                            $data_guru = mysqli_fetch_array($query_guru);
                        ?>
                            <?php
                            if ($myData['hapus'] == 'n') {
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        $data_ttd = mysqli_query($koneksi, "SELECT * FROM tbl_tanda_tangan WHERE id_surat = " . $myData['id']);
                                        if (mysqli_num_rows($data_ttd) > 0) {
                                            $cek_ttd_kamad = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, tbl_tanda_tangan.* FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_guru.pangkat = "kamad" AND tbl_tanda_tangan.id_surat = ' . $myData["id"] . ' AND tbl_tanda_tangan.status = "diterima"');
                                            if (mysqli_num_rows($cek_ttd_kamad) > 0) {
                                                echo '<i class="fa fa-check text-success"></i>';
                                            } else {
                                                if ($_SESSION['pangkat_user'] == "guru") {
                                                    $cek_ttd_operator = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, tbl_tanda_tangan.* FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_guru.pangkat = "operator" AND tbl_tanda_tangan.id_surat = ' . $myData["id"] . ' AND tbl_tanda_tangan.status = "ditolak"');
                                                    if (mysqli_num_rows($cek_ttd_operator) > 0) {
                                                        echo '<i class="fa fa-warning text-warning"></i>';
                                                    } else {
                                                        echo '<i class="fa fa-refresh fa-spin"></i>';
                                                    }
                                                } else if ($_SESSION['pangkat_user'] == "operator") {
                                                    $cek_ttd_katu = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, tbl_tanda_tangan.* FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_guru.pangkat = "katu" AND tbl_tanda_tangan.id_surat = ' . $myData["id"] . ' AND tbl_tanda_tangan.status = "ditolak"');
                                                    if (mysqli_num_rows($cek_ttd_katu) > 0) {
                                                        echo '<i class="fa fa-warning text-warning"></i>';
                                                    } else {
                                                        echo '<i class="fa fa-refresh fa-spin"></i>';
                                                    }
                                                } else if ($_SESSION['pangkat_user'] == "katu") {
                                                    $cek_ttd_kamad = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, tbl_tanda_tangan.* FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_guru.pangkat = "kamad" AND tbl_tanda_tangan.id_surat = ' . $myData["id"] . ' AND tbl_tanda_tangan.status = "ditolak"');
                                                    if (mysqli_num_rows($cek_ttd_kamad) > 0) {
                                                        echo '<i class="fa fa-warning text-warning"></i>';
                                                    } else {
                                                        echo '<i class="fa fa-refresh fa-spin"></i>';
                                                    }
                                                } else if ($_SESSION['pangkat_user'] == "kamad") {
                                                    $cek_ttd_final = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, tbl_tanda_tangan.* FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_guru.pangkat = "superuser" AND tbl_tanda_tangan.id_surat = ' . $myData["id"] . ' AND tbl_tanda_tangan.status = "ditolak"');
                                                    if (mysqli_num_rows($cek_ttd_final) > 0) {
                                                        echo '<i class="fa fa-warning text-warning"></i>';
                                                    } else {
                                                        echo '<i class="fa fa-refresh fa-spin"></i>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>

                                    </td>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $myData['no_surat'] ?></td>
                                    <td class="text-center"><?= date('d-m-Y', strtotime($myData['tgl_pembuatan'])) ?></td>
                                    <td><?= $data_guru['nama'] ?></td>
                                    <td class="text-center"><?= $data_guru['jabatan'] ?></td>
                                    <td class="text-center"><?= $myData['catatan'] ?></td>

                                    <!-- Button aksi -->

                                    <td class="text-center">
                                        <!-- Button Lampiran -->
                                        <?php
                                        $cek_lampiran = mysqli_query($koneksi, 'select * from tbl_lampiran where id_surat = "' . $myData['id'] . '"');
                                        if (mysqli_num_rows($cek_lampiran) > 0) {
                                            while ($data_lampiran = mysqli_fetch_array($cek_lampiran)) { ?>

                                                <a href="../../../upload/<?= $data_lampiran['file'] ?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-paperclip"></i></a>
                                        <?php }
                                        } ?>

                                        <!-- Button Pop Up -->
                                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" id="modal-otor" data-id="<?= $myData['id']; ?>" data-target="#modal-default">
                                            <i class="fa fa-file-text-o"></i>
                                        </button>

                                        <!-- Button Edit -->
                                        <?php
                                        if ($_SESSION['pangkat_user'] == 'guru') {
                                            $cek_edit = mysqli_query($koneksi, 'SELECT * FROM tbl_tanda_tangan WHERE id_surat = "' . $myData['id'] . '" AND id_user = "' . $_SESSION['id_user'] . '" AND status = "diterima"');
                                            if (mysqli_num_rows($cek_edit) > 0) {
                                        ?>
                                                <a href="#" id="edit_surat" class="btn btn-primary btn-sm" disabled><i class="fa fa-pencil"></i></a>
                                            <?php } else { ?>
                                                <a href="<?= base_url() ?>surat-rekom-guru/edit?id=<?= $myData['id']; ?>" id="edit_surat" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                        <?php }
                                        } ?>

                                        <!-- Button Hapus -->
                                        <?php
                                        if ($_SESSION['pangkat_user'] == 'operator') {
                                        ?>
                                            <a href="../../../process/surat-rekom-guru/hapus.php?id=<?= $myData['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        <?php } ?>

                                        <!-- Button Print -->
                                        <?php
                                        if ($_SESSION['pangkat_user'] == "guru" || $_SESSION['pangkat_user'] == "operator") {
                                            $cek_ttd = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, tbl_tanda_tangan.status FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_tanda_tangan.id_surat = "' . $myData['id'] . '" AND tbl_guru.pangkat = "kamad" AND tbl_tanda_tangan.status = "diterima"');
                                            if (mysqli_num_rows($cek_ttd) > 0) {
                                                while ($ttd = mysqli_fetch_array($cek_ttd)) { ?>
                                                    <a href="<?= base_url() ?>process/surat-rekom-guru/print.php?id=<?= $myData['id'] ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                                <?php }
                                            } else { ?>
                                                <a href="#" target="_blank" class="btn btn-primary btn-sm" disabled><i class="fa fa-print"></i></a>
                                        <?php }
                                        } ?>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.box -->

        <!-- pop up -->

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Berkas Pengajuan Surat Rekomendasi Guru</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-header with-border">
                            <h3 class="box-title">Yang bertanda tangan dibawah ini</h3>
                        </div>
                        <form action="<?= base_url() ?>process/surat-rekom-guru/tambah.php" method="post" id="form_surat_rekom_guru">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Masukkan Nama Guru" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">NIP</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan NIP" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Pangkat / Golongan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="golongan" id="golongan" class="form-control" placeholder="Masukkan Pangkat / Golongan" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukkan Jabatan" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Asal Instansi</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="instansi" id="instansi" class="form-control" placeholder="Masukkan Unit Kerja" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-header with-border">
                                <h3 class="box-title">Memberikan rekomendasi kepada</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Masukkan Nama Siswa" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">NIP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nip_karyawan" name="nip_karyawan" placeholder="Masukkan NIP" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat" readonly />
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" class="form-control datepicker" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Pangkat / Golongan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="golongan_karyawan" name="golongan_karyawan" placeholder="Masukkan Golongan" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Masukkan Alamat" readonly></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="jabatan_karyawan" id="jabatan_karyawan" class="form-control" placeholder="Masukkan Jabatan" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Perihal</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Masukkan Perihal" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                        </form>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <table class="table table-condensed" id="otor">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function() {
        var base_url = window.location.origin;

        $(document).on('click', '#modal-otor', function() {
            var id_surat = $(this).attr("data-id");
            getDataSurat(id_surat);
            // console.log(id_surat);
        })

        $(document).on('click', '#otorisasi', function() {
            var id_surat = $(this).attr("data-id");
            var pangkat = $(this).attr("pangkat");
            var no_surat = $("#no_surat").val();

            if (pangkat == "guru") {
                var komentar = null
            } else {
                var komentar = $("#komentar" + pangkat).val()
            }

            if (no_surat == '' || no_surat == null) {
                no_surat = null;
            } else {
                no_surat = $("#no_surat").val();
            }

            // Swal.fire(id_surat + ' ' + id_user);
            tandaTangan(id_surat, pangkat, komentar, no_surat);
        })

        $(document).on('click', '#back', function() {
            var id_surat = $(this).attr("data-id")
            var pangkat = $(this).attr("pangkat")

            var komentar = $("#komentar" + pangkat).val()

            tolakTandaTangan(id_surat, pangkat, komentar)
        })

        function getDataSurat(id_surat) {
            $.ajax({
                method: "POST",
                url: base_url + "/process/surat-rekom-guru/getDataSurat.php",
                data: {
                    id_surat: id_surat
                },
                dataType: "json",
                success: function(data) {
                    if (data.no_surat != "") {
                        $('#no_surat').val(data.no_surat);
                    } else {
                        $('#no_surat').attr("placeholder", "Belum Memiliki No. Surat");
                    }

                    // Yang perlu disesuaikan menurut inputan
                    $('#nama_guru').val(data.nama);
                    $('#nip').val(data.nip);
                    $('#golongan').val(data.golongan);
                    $('#jabatan').val(data.jabatan);
                    $('#instansi').val(data.instansi);

                    getDataGuru(id_surat)
                    $('#perihal').val(data.catatan);
                    // sampai sini

                    $.ajax({
                        method: "POST",
                        url: base_url + "/process/nota-dinas/getDataTtd.php",
                        data: {
                            id_surat: id_surat
                        },
                        dataType: "json",
                        success: function(data) {
                            var content = '';

                            for (i = 0; i < data.length; i++) {
                                var id_surat = data[i].id_surat;
                                var pangkat = data[i].pangkat;
                                var id_user = data[i].id_user;

                                if (data[i].catatan != null) {
                                    var catatan = data[i].catatan
                                } else {
                                    var catatan = ''
                                }

                                if ("<?= $_SESSION['pangkat_user'] ?>" != "operator") {
                                    $('#no_surat').prop("disabled", true);
                                } else {
                                    // if (data[i].status == "cek") {
                                    //     $('#no_surat').prop("disabled", false);
                                    // } else {
                                    //     $('#no_surat').prop("disabled", true);
                                    // }
                                    $('#no_surat').prop("disabled", false);
                                }

                                if (pangkat != "guru") {
                                    if (pangkat != "<?= $_SESSION['pangkat_user'] ?>") {
                                        if (data[i].status != "diterima") {
                                            var back = '<button class="btn btn-sm btn-default" id="back" disabled><i class="fa fa-arrow-left"></i></button>'
                                        } else {
                                            var back = '<button class="btn btn-sm btn-default" id="back" disabled><i class="fa fa-arrow-left"></i></button>'
                                        }
                                        var komen = '<textarea name="" class="form-control" id="komentar' + pangkat + '" disabled>' + catatan + '</textarea>'
                                    } else {
                                        if (data[i].status != "cek") {
                                            if (data[i].status != "diterima") {
                                                var back = '<button class="btn btn-sm btn-default" id="back" disabled><i class="fa fa-arrow-left"></i></button>'
                                            } else {
                                                var back = '<button class="btn btn-sm btn-default" id="back" disabled><i class="fa fa-arrow-left"></i></button>'
                                            }
                                            var komen = '<textarea name="" class="form-control" id="komentar' + pangkat + '" disabled>' + catatan + '</textarea>'
                                        } else {
                                            var back = '<button class="btn btn-sm btn-warning" id="back" data-id="' + id_surat + '" pangkat="' + pangkat + '"><i class="fa fa-arrow-left"></i></button>'
                                            var komen = '<textarea name="" class="form-control" id="komentar' + pangkat + '">' + catatan + '</textarea>'
                                        }
                                    }
                                } else {
                                    var back = ''
                                    var komen = ''
                                }

                                if (data[i].tgl_proses != null) {
                                    var tgl_proses = '(' + data[i].tgl_proses + ')'
                                } else {
                                    var tgl_proses = "( ----/--/-- --:--:-- )"
                                }

                                content += '<tr>';
                                content += '<td><b>' + data[i].jabatan + '</b> (' + pangkat + ')</td>';
                                if (pangkat != "<?= $_SESSION['pangkat_user'] ?>") {
                                    if (data[i].status != "diterima") {
                                        content += '<td><button class="btn btn-sm btn-default" id="otorisasi" pangkat="' + pangkat + '" disabled><i class="fa fa-check"></i></button></td>';
                                    } else {
                                        content += '<td><button class="btn btn-sm btn-success" id="otorisasi" pangkat="' + pangkat + '" disabled><i class="fa fa-check"></i></button></td>';
                                    }
                                } else {
                                    if (data[i].status != "cek") {
                                        if (data[i].status != "diterima") {
                                            content += '<td><button class="btn btn-sm btn-default" id="otorisasi" pangkat="' + pangkat + '" disabled><i class="fa fa-check"></i></button></td>';
                                        } else {
                                            content += '<td><button class="btn btn-sm btn-success" id="otorisasi" pangkat="' + pangkat + '" disabled><i class="fa fa-check"></i></button></td>';
                                            $('#edit_surat').attr("disabled");
                                        }
                                    } else {
                                        content += '<td><button class="btn btn-sm btn-success" id="otorisasi" data-id="' + id_surat + '" pangkat="' + pangkat + '" ><i class="fa fa-check"></i></button></td>';
                                    }
                                }
                                content += '<td>' + data[i].nama + '</td>';
                                content += '<td>' + back + '</td>';
                                content += '<td style="vertical-align: middle; color: #868e96;"><small>' + tgl_proses + '</small></td>';
                                content += '<td>' + komen + '</td>';
                                content += '</tr>';

                            }

                            $('#otor').html(content)
                        }
                    });
                }
            });
        }

        function getDataGuru(id_surat) {
            $.ajax({
                method: "POST",
                url: base_url + "/process/surat-rekom-guru/getDataGuru.php",
                data: {
                    id_surat: id_surat
                },
                dataType: "json",
                success: function(data) {
                    // Yang perlu disesuaikan menurut inputan
                    $('#nama_karyawan').val(data.nama);
                    $('#nip_karyawan').val(data.nip);
                    $('#tempat_lahir').val(data.tempat_lahir);
                    $('#tgl_lahir').val(data.tgl_lahir);
                    $('#golongan_karyawan').val(data.golongan);
                    $('#alamat').val(data.alamat);
                    $('#jabatan_karyawan').val(data.jabatan);
                }
            })
        }

        function tandaTangan(id_surat, pangkat, komentar, no_surat) {
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
                        method: "POST",
                        url: base_url + "/process/nota-dinas/tandaTangan.php",
                        data: {
                            id_surat: id_surat,
                            pangkat: pangkat,
                            catatan: komentar,
                            no_surat: no_surat
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
                                setInterval(function() {
                                    window.location.href = base_url + "/surat-rekom-guru/index";
                                }, 1700);
                            } else {
                                swalWithBootstrapButtons.fire(
                                    'Gagal',
                                    'Data gagal disimpan',
                                    'error'
                                )
                            }
                        }
                    });
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

        function tolakTandaTangan(id_surat, pangkat, komentar) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Kembalikan data ?',
                text: "Silahkan cek kembali apabila data dirasa ragu !.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, kembalikan.',
                cancelButtonText: 'Tidak, batal kembalikan.',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url: base_url + "/process/nota-dinas/tolakTandaTangan.php",
                        data: {
                            id_surat: id_surat,
                            pangkat: pangkat,
                            catatan: komentar
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
                                setInterval(function() {
                                    window.location.href = base_url + "/surat-rekom-guru/index";
                                }, 1700);
                            } else {
                                swalWithBootstrapButtons.fire(
                                    'Gagal',
                                    'Data gagal disimpan',
                                    'error'
                                )
                            }
                        }
                    });
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
    });
</script>
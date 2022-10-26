<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat Izin Penelitian
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
            if ($_SESSION['pangkat_user'] == 'guru') {
            ?>
                <div class="box-header">
                    <a href="<?= base_url() ?>surat-izin-penelitian/create" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Izin Penelitian</a>
                </div>
            <?php } ?>
            <div class="box-body">
                <table class="table table-condensed table-hover compact nowrap" id="data-table">
                    <thead>
                        <tr>
                            <th width="20" class="text-center">~</th>
                            <th width="30" class="text-center">No</th>
                            <th>No. Surat</th>
                            <th class="text-center" width="110">Tgl. Pembuatan</th>
                            <th>Guru</th>
                            <th>Mahasiswa</th>
                            <th>Kampus / Jurusan</th>
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
                                $data = mysqli_query($koneksi, "SELECT * FROM tbl_surat WHERE jenis='surat_izin_penelitian' AND id_pemohon = '" . $_SESSION['id_user'] . "' ORDER BY id DESC");
                            } else {
                                $data = mysqli_query($koneksi, "SELECT * FROM tbl_surat WHERE jenis='surat_izin_penelitian' ORDER BY id DESC");
                            }
                        }

                        // icon ditolak, diterima dan menunggu
                        while ($myData = mysqli_fetch_array($data)) {
                            $query_guru = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE id = ' . $myData['kepada']);
                            $data_guru = mysqli_fetch_array($query_guru);

                            $query_mhs = mysqli_query($koneksi, 'SELECT * FROM tbl_surat_izin_penelitian WHERE id_surat = ' . $myData['id']);
                            $data_mhs = mysqli_fetch_array($query_mhs);
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
                                    <td><?= $data_mhs['nama_mhs'] ?></td>
                                    <td><?= $data_mhs['kampus'] ?> (<?= $data_mhs['jurusan'] ?>)</td>

                                    <!-- Button aksi -->

                                    <td class="text-center">
                                        <!-- Button Pop Up -->
                                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" id="modal-otor" data-id="<?= $myData['id']; ?>" data-target="#modal-default">
                                            <i class="fa fa-file-text-o"></i>
                                        </button>

                                        <a href="<?= base_url() ?>process/surat-izin-penelitian/preview_d.php?id=<?= $myData['id'] ?>" target="_blank" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Surat">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <!-- Button Print -->
                                        <?php
                                        $cek_ttd = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, tbl_tanda_tangan.status FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_tanda_tangan.id_surat = "' . $myData['id'] . '" AND tbl_guru.pangkat = "kamad" AND tbl_tanda_tangan.status = "diterima"');
                                        if (mysqli_num_rows($cek_ttd) > 0) {
                                            while ($ttd = mysqli_fetch_array($cek_ttd)) { ?>
                                                <a href="<?= base_url() ?>process/surat-izin-penelitian/print.php?id=<?= $myData['id'] ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                            <?php }
                                        } else { ?>
                                            <a href="#" target="_blank" class="btn btn-primary btn-sm" disabled><i class="fa fa-print"></i></a>
                                        <?php } ?>

                                        <!-- Button Edit -->
                                        <?php
                                        if ($_SESSION['pangkat_user'] == 'guru') {
                                            $cek_edit = mysqli_query($koneksi, 'SELECT * FROM tbl_tanda_tangan WHERE id_surat = "' . $myData['id'] . '" AND id_user = "' . $_SESSION['id_user'] . '" AND status = "diterima"');
                                            if (mysqli_num_rows($cek_edit) > 0) {
                                        ?>
                                                <a href="#" id="edit_surat" class="btn btn-primary btn-sm" disabled><i class="fa fa-pencil"></i></a>
                                            <?php } else { ?>
                                                <a href="<?= base_url() ?>surat-izin-penelitian/edit?id=<?= $myData['id']; ?>" id="edit_surat" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                        <?php }
                                        } ?>

                                        <!-- Button Hapus -->
                                        <?php
                                        if ($_SESSION['pangkat_user'] == 'operator') {
                                        ?>
                                            <a href="../../../process/surat-izin-penelitian/hapus.php?id=<?= $myData['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        <?php } ?>
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
                        <h4 class="modal-title">Berkas Pengajuan Surat izin-penelitian</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nomor Surat</label>
                                <div class="col-sm-10">
                                    <input type="text" id="no_surat" class="form-control" <?= $_SESSION['pangkat_user'] == 'operator' ? '' : 'disabled'  ?> />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" readonly />
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
                                <label class="col-sm-2 col-form-label">Pangkat / Gol.Ruang</label>
                                <div class="col-sm-10">
                                    <input type="text" name="golongan" id="golongan" class="form-control" placeholder="Masukkan Pangkat / Gol.Ruang" readonly />
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
                        <div class="form-group" style="margin-bottom: 2em;">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Unit Kerja</label>
                                <div class="col-sm-10">
                                    <input type="text" name="unit_kerja" id="unit_kerja" class="form-control" placeholder="Masukkan Unit Kerja" readonly />
                                </div>
                            </div>
                        </div>
                        <h4 class="box-title">Yang Diberi Izin Penelitian</h4>
                        <div class="form-group" style="margin-top: 2em;">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama_mhs" id="nama_mhs" class="form-control" placeholder="Masukkan Nama" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan NIM" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Fakultas / Jurusan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Masukkan Fakultas / Jurusan" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Semester</label>
                                <div class="col-sm-10">
                                    <input type="text" name="semester" id="semester" class="form-control" placeholder="Masukkan Semester" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Perguruan Tinggi</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kampus" id="kampus" class="form-control" placeholder="Masukkan Perguruan Tinggi" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Judul Penelitian</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" name="judul" id="judul" placeholder="Masukkan Judul Penelitian" readonly></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tanggal Penelitian</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control datepicker" name="tanggal_mulai" id="tanggal_mulai" placeholder="Masukkan Tanggal Awal Penelitian" readonly />
                                        <span class="input-group-addon">s.d.</span>
                                        <input type="text" class="form-control datepicker" name="tanggal_selesai" id="tanggal_selesai" placeholder="Masukkan Tanggal Akhir Penelitian" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
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
                url: base_url + "/process/surat-izin-penelitian/getDataSurat.php",
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
                    $('#nama').val(data.nama);
                    $('#nip').val(data.nip);
                    $('#golongan').val(data.golongan);
                    $('#jabatan').val(data.jabatan);
                    $('#unit_kerja').val(data.instansi);

                    $('#nama_mhs').val(data.nama_mhs);
                    $('#nim').val(data.nim);
                    $('#jurusan').val(data.jurusan);
                    $('#semester').val(data.semester);
                    $('#kampus').val(data.kampus);
                    $('#judul').val(data.judul);
                    $('#tanggal_mulai').val(data.tanggal_mulai);
                    $('#tanggal_selesai').val(data.tanggal_selesai);
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
                                        content += '<td><button class="btn btn-sm bg-purple" id="otorisasi" pangkat="' + pangkat + '" disabled><i class="fa fa-check"></i></button></td>';
                                    }
                                } else {
                                    if (data[i].status != "cek") {
                                        if (data[i].status != "diterima") {
                                            content += '<td><button class="btn btn-sm btn-default" id="otorisasi" pangkat="' + pangkat + '" disabled><i class="fa fa-check"></i></button></td>';
                                        } else {
                                            content += '<td><button class="btn btn-sm bg-purple" id="otorisasi" pangkat="' + pangkat + '" disabled><i class="fa fa-check"></i></button></td>';
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
                                    window.location.href = base_url + "/surat-izin-penelitian/index";
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
                                    window.location.href = base_url + "/surat-izin-penelitian/index";
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
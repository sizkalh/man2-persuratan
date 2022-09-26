<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat Keterangan Pengganti Ijazah
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
                    <!-- <a href="<?= base_url() ?>nota-dinas/create" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Nota Dinas</a> -->
                </div>
            <?php } ?>
            <div class="box-body">
                
            </div>
        </div><!-- /.box -->

        <!-- pop up -->

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Berkas Pengajuan Nota Dinas</h4>
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
                                <label class="col-sm-2 col-form-label">Kepada</label>
                                <div class="col-sm-10">
                                    <input type="text" id="kepada" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Perihal</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="perihal" rows="3" disabled></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tanggal Pembuatan</label>
                                <div class="col-sm-10">
                                    <input type="text" id="tgl_pembuatan" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Lampiran</label>
                                <div class="col-sm-10">
                                    <input type="text" id="lampiran" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Dalam Rangka</label>
                                <div class="col-sm-10">
                                    <textarea id="keterangan" class="form-control" rows="3" disabled></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Hari</label>
                                <div class="col-sm-10">
                                    <input type="text" id="hari" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tanggal Pelaksanaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tgl_pelaksanaan" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Waktu</label>
                                <div class="col-sm-10">
                                    <input type="text" id="waktu" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tempat</label>
                                <div class="col-sm-10">
                                    <input type="text" id="tempat" class="form-control" disabled />
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
                url: base_url + "/process/nota-dinas/getDataSurat.php",
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
                    $('#kepada').val(data.kepada);
                    $('#perihal').val(data.perihal);
                    $('#tgl_pembuatan').val(data.tgl_pembuatan);
                    if (data.lampiran != null) {
                        $('#lampiran').val(data.lampiran);
                    } else {
                        $('#lampiran').val("-");
                    }

                    $('#keterangan').val(data.keterangan);
                    $('#hari').val(data.hari);
                    $('#tgl_pelaksanaan').val(data.tgl_pelaksanaan);
                    $('#waktu').val(data.waktu);
                    $('#tempat').val(data.tempat);
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
                                    window.location.href = base_url + "/nota-dinas/index";
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
                                    window.location.href = base_url + "/nota-dinas/index";
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
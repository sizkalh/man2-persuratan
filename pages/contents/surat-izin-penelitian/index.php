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
            if ($_SESSION['pangkat_user'] == 'guru' || 'superuser') {
            ?>
                <div class="box-header">
                    <a href="<?= base_url() ?>surat-izin-penelitian/create" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Surat Izin Penelitian</a>
                </div>
            <?php } ?>
            <div class="box-body">
                <table class="table table-condensed table-hover" id="nota_dinas">
                    <thead>
                        <tr>
                            <th width="20" class="text-center">~</th>
                            <th width="30" class="text-center">No</th>
                            <th class="text-center">NIP</th>
                            <th>Nama</th>
                            <th>Yang Diberi Izin Penelitian</th>
                            <th>Perguruan Tinggi</th>
                            <th>Jurusan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <i class="fa fa-refresh"></i>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">660099</td>
                            <td>Drs. Lorem ipsum</td>
                            <td>Lorem ipsum</td>
                            <td>IAIN Tulungagung</td>
                            <td>Ekonomi</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-default btn-sm"><i class="fa fa-paperclip"></i></a>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-file-text-o"></i>
                                </button>
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- /.box -->

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Berkas Pengajuan Surat Izin Penelitian</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nomor Surat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan Nomor Surat" />
                                </div>
                            </div>
                        </div>
                        <p class="lead text-green">Yang Memberi Izin Penelitian</p>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Pangkat / Gol.Ruang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Unit Kerja</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <p class="lead text-green">Yang Diberi Izin Penelitian</p>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Fakultas / Jurusan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Semester</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Perguruan Tinggi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Judul Penelitian</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" disabled></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tanggal Penelitian</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" disabled />
                                        <span class="input-group-addon">s.d.</span>
                                        <input type="text" class="form-control" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <table class="table table-condensed">
                                        <tr>
                                            <td width="20" style="vertical-align: middle;"></td>
                                            <td style="vertical-align: middle;">Admin</td>
                                            <td style="vertical-align: middle;">
                                                <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i></button>
                                            </td>
                                            <td style="vertical-align: middle; color: #868e96;"><small>(--/--/---- --:--)</small></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="20" style="vertical-align: middle;">
                                                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                                            </td>
                                            <td style="vertical-align: middle;">Kamad</td>
                                            <td style="vertical-align: middle;">
                                                <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i></button>
                                            </td>
                                            <td style="vertical-align: middle; color: #868e96;"><small>(--/--/---- --:--)</small></td>
                                            <td>
                                                <textarea name="" class="form-control" disabled></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20" style="vertical-align: middle;">
                                                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                                            </td>
                                            <td style="vertical-align: middle;">Katu</td>
                                            <td style="vertical-align: middle;">
                                                <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i></button>
                                            </td>
                                            <td style="vertical-align: middle; color: #868e96;"><small>(--/--/---- --:--)</small></td>
                                            <td>
                                                <textarea name="" class="form-control" disabled></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20" style="vertical-align: middle;">
                                                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                                            </td>
                                            <td style="vertical-align: middle;">Operator</td>
                                            <td style="vertical-align: middle;">
                                                <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i></button>
                                            </td>
                                            <td style="vertical-align: middle; color: #868e96;"><small>(25/12/2022 23:30)</small></td>
                                            <td>
                                                <textarea name="" class="form-control"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20">
                                                <button type="button" class="btn btn-default btn-sm" disabled><i class="fa fa-check"></i></button>
                                            </td>
                                            <td style="vertical-align: middle;">Nama Guru</td>
                                            <td></td>
                                            <td style="vertical-align: middle; color: #868e96;"><small>(25/12/2022 23:30)</small></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
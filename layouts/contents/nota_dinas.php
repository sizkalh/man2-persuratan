<?php include_once("../page/header.php") ?>
<?php include_once("../page/navbar.php") ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include_once("../page/sidebar.php") ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Nota Dinas
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-success">
            <div class="box-header">
                <a href="tambah_nota_dinas.php" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Nota Dinas</a>
            </div>
            <div class="box-body">
                <table class="table table-condensed table-hover" id="nota_dinas">
                    <thead>
                        <tr>
                            <th width="20" class="text-center">~</th>
                            <th width="30" class="text-center">No</th>
                            <th>No. Surat</th>
                            <th>Kepada</th>
                            <th>Perihal</th>
                            <th class="text-center">Tanggal Pembuatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $id_user = mysqli_query($koneksi, "select * from tbl_guru where id = '".$_SESSION['id_user']."'");
                            while($cek_jabatan = mysqli_fetch_array($id_user)){
                                if($cek_jabatan['pangkat'] == 'guru'){
                                    $data = mysqli_query($koneksi,"SELECT * FROM tbl_surat WHERE id_pemohon = '".$_SESSION['id_user']."' ORDER BY id DESC");
                                }else{
                                    $data = mysqli_query($koneksi,"SELECT * FROM tbl_surat ORDER BY id DESC");
                                }
                            }
                            
                            
                            while($myData = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td class="text-center">
                                <i class="fa fa-refresh fa-spin"></i>
                            </td>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $myData['no_surat'] ?></td>
                            <td><?= $myData['kepada'] ?></td>
                            <td><?= $myData['perihal'] ?></td>
                            <td class="text-center"><?= date('d-m-Y', strtotime($myData['tgl_pembuatan'])) ?></td>
                            <td class="text-center">
                                <?php 
                                    $cek_lampiran = mysqli_query($koneksi, 'select * from tbl_lampiran where id_surat = "'.$myData['id'].'"');
                                    if(mysqli_num_rows($cek_lampiran) > 0){
                                        while($data_lampiran = mysqli_fetch_array($cek_lampiran)){ ?>

                                    <a href="../../upload/<?= $data_lampiran['file'] ?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-paperclip"></i></a>
                                <?php }} ?>
                                
                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-file-text-o"></i>
                                </button>
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                        <!-- <tr>
                            <td class="text-center">
                                <i class="fa fa-warning text-warning"></i>
                            </td>
                            <td class="text-center">2</td>
                            <td>Drs. Lorem ipsum</td>
                            <td>Undangan rapat dinas</td>
                            <td class="text-center">12 Desember 2022</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-default btn-sm"><i class="fa fa-paperclip"></i></a>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-file-text-o"></i>
                                </button>
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <i class="fa fa-check text-success"></i>
                            </td>
                            <td class="text-center">3</td>
                            <td>Drs. Lorem ipsum</td>
                            <td>Undangan rapat dinas</td>
                            <td class="text-center">12 Desember 2022</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-default btn-sm"><i class="fa fa-paperclip"></i></a>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-file-text-o"></i>
                                </button>
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr> -->
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
                        <h4 class="modal-title">Berkas Pengajuan Nota Dinas</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nomor Surat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nomor Surat Belum Ada" <?= $_SESSION['pangkat_user'] == 'operator' ? '' : 'disabled'  ?> />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Kepada</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Perihal</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" disabled></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="27-07-2022" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Lampiran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Dalam Rangka</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" disabled></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Hari</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="datepicker" disabled/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Waktu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tempat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <table class="table table-condensed">
                                        <tr>
                                            <td style="font-weight: bold; vertical-align: middle;">Admin</td>
                                            <td width="20" style="vertical-align: middle;"></td>
                                            <td style="vertical-align: middle;">Admin</td>
                                            <td style="vertical-align: middle;">
                                                <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i></button>
                                            </td>
                                            <td style="vertical-align: middle; color: #868e96;"><small>(--/--/---- --:--)</small></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; vertical-align: middle;">Kepala Madrasah</td>
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
                                            <td style="font-weight: bold; vertical-align: middle;">Kepala TU</td>
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
                                            <td style="font-weight: bold; vertical-align: middle;">Operator</td>
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
                                            <td style="font-weight: bold; vertical-align: middle;">Pemohon</td>
                                            <td width="20">
                                                <button type="button" class="btn btn-default btn-sm" disabled><i class="fa fa-check"></i></button>
                                            </td>
                                            <td style="vertical-align: middle;"><?= $_SESSION['nama_user'] ?></td>
                                            <td></td>
                                            <td style="vertical-align: middle; color: #868e96;"><small>(25/12/2022 23:30)</small></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Surat</button>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php include_once("../page/footer.php") ?>
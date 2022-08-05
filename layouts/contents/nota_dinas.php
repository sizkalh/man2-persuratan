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
        <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "Data gagal disimpan";
                } else if ($_GET['pesan'] == "berhasil") {
                    echo "Data berhasil disimpan";
                }
            }
        ?>
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
                            <th class="text-center">Tanggal Pembuatan</th>
                            <th>Kepada</th>
                            <th>Perihal</th>
                            <th class="text-center">Tanggal Pelaksanaan</th>
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
                            <td class="text-center"><?= date('d-m-Y', strtotime($myData['tgl_pembuatan'])) ?></td>
                            <td><?= $myData['kepada'] ?></td>
                            <td><?= $myData['perihal'] ?></td>
                            <td class="text-center"><?= date('d-m-Y', strtotime($myData['tgl_pelaksanaan'])) ?></td>
                            <td class="text-center">
                                <?php 
                                    $cek_lampiran = mysqli_query($koneksi, 'select * from tbl_lampiran where id_surat = "'.$myData['id'].'"');
                                    if(mysqli_num_rows($cek_lampiran) > 0){
                                        while($data_lampiran = mysqli_fetch_array($cek_lampiran)){ ?>

                                    <a href="../../upload/<?= $data_lampiran['file'] ?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-paperclip"></i></a>
                                <?php }} ?>
                                
                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" id="modal-otor" data-id="<?= $myData['id']; ?>" data-target="#modal-default">
                                    <i class="fa fa-file-text-o"></i>
                                </button>
                                <a href="edit_nota_dinas.php?id=<?= $myData['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
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
                                    <input type="text" id="lampiran" class="form-control" disabled/>
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
                                    <input type="text" class="form-control" id="tgl_pelaksanaan" disabled/>
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
                    <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Surat</button>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function(){
        var base_url = window.location.origin;

        $(document).on('click', '#modal-otor', function(){
            var id_surat = $(this).attr("data-id");
            getDataSurat(id_surat);
            // console.log(id_surat);
        })
        
        function getDataSurat(id_surat){
            $.ajax({
                method: "POST",
                url: base_url + "/layouts/contents/proses/nota_dinas/getDataSurat.php",
                data: {
                    id_surat : id_surat
                },
                dataType: "json",
                success: function(data){
                    if(data.no_surat != ""){
                        $('#no_surat').val(data.no_surat);
                    }else{
                        $('#no_surat').val("Belum Memiliki No. Surat");
                    }
                    $('#kepada').val(data.kepada);
                    $('#perihal').val(data.perihal);
                    $('#tgl_pembuatan').val(data.tgl_pembuatan);
                    if(data.lampiran != null){
                        $('#lampiran').val(data.lampiran);
                    }else{
                        $('#lampiran').val("-");
                    }
                    
                    $('#keterangan').val(data.keterangan);
                    $('#hari').val(data.hari);
                    $('#tgl_pelaksanaan').val(data.tgl_pelaksanaan);
                    $('#waktu').val(data.waktu);
                    $('#tempat').val(data.tempat);

                    $.ajax({
                        method: "POST",
                        url: base_url + "/layouts/contents/proses/nota_dinas/getDataTtd.php",
                        data: {
                            id_surat : id_surat
                        },
                        dataType: "json",
                        success: function(data){
                            var content = '';

                            for(i=0; i<data.length; i++){
                                if(data[i].tgl_proses != null){
                                    var tgl_proses = data[i].tgl_proses
                                }else{
                                    var tgl_proses = "--/--/---- --:--"
                                }

                                if(data[i].pangkat != "guru"){
                                    var back = '<button class="btn btn-sm btn-warning" id="back"><i class="fa fa-arrow-left"></i></button>'
                                    var komen = '<textarea name="" class="form-control" disabled></textarea>'
                                }else{
                                    var back = ''
                                    var komen = ''
                                    var tgl_proses = ''
                                }

                                if(data[i].tgl_proses != null){
                                    var tgl_proses = '(' + data[i].tgl_proses + ')'

                                    var pangkat = $("#otorisasi").attr("pangkat")

                                    if(pangkat == "operator"){
                                        $("#otorisasi").prop('disabled', true)
                                    }else if(pangkat == "katu"){
                                        $("#otorisasi").prop('disabled', true)
                                    }else if(pangkat == "kamad"){
                                        $("#otorisasi").prop('disabled', true)
                                    }else if(pangkat == "superuser"){
                                        $("#otorisasi").prop('disabled', true)
                                    }
                                }else{
                                    var tgl_proses = "( --/--/---- --:-- )"
                                    
                                    var pangkat = $("#otorisasi").attr("pangkat")
                                    if(pangkat == "operator"){
                                        $("#back").prop('disabled', true)
                                    }else if(pangkat == "katu"){
                                        $("#back").prop('disabled', true)
                                    }else if(pangkat == "kamad"){
                                        $("#back").prop('disabled', true)
                                    }else if(pangkat == "superuser"){
                                        $("#back").prop('disabled', true)
                                    }
                                }
                                
                                content += '<tr>';
                                content += '<td><b>'+data[i].jabatan+'</b> ('+data[i].pangkat+')</td>';
                                content += '<td><button class="btn btn-sm btn-success" id="otorisasi" pangkat="'+data[i].pangkat+'"><i class="fa fa-check"></i></button></td>';
                                content += '<td>'+data[i].nama+'</td>';
                                content += '<td>'+back+'</td>';
                                content += '<td style="vertical-align: middle; color: #868e96;"><small>'+ tgl_proses +'</small></td>';
                                content += '<td>'+komen+'</td>';
                                content += '</tr>';
                            }

                            $('#otor').html(content)
                        }
                    });
                }
            });
        }
    });
</script>


<?php include_once("../page/footer.php") ?>
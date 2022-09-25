<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Surat Dispen
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-success">
            <div class="box-body">
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Nama" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan NIP" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Jabatan" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Perihal / Acara</label>
                        <div class="col-sm-10">
                            <textarea name="perihal" class="form-control" placeholder="Masukkan perihal acara"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Hari</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Hari" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control datepicker" placeholder="Masukkan Tanggal" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Waktu</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                <input type="text" class="form-control" placeholder="Masukkan Hari" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tempat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukkan Tempat" />
                        </div>
                    </div>
                </div>
                <h2>
                    Daftar siswa
                </h2>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Kelas</th>
                                        <th>Keterangan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <tr>
                                        <td class="text-center">-</td>
                                        <td><input type="text" id="nama_siswa" class="form-control input-sm" placeholder="Masukkan Nama" /></td>
                                        <td><input type="text" id="kelas" class="form-control input-sm" placeholder="Masukkan Kelas" /></td>
                                        <td><input type="text" id="keterangan" class="form-control input-sm" placeholder="Masukkan Keterangan" /></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-success" id="tambah_data"><i class="fa fa-plus"></i> Tambah</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="button" onclick="goBack()" class="btn btn-default"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" id="preview" class="btn btn-primary"><i class="fa fa-eye"></i> Preview</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function() {
        // $("#tambah_data").click(function() {
        //     var nama_siswa = $("#nama_siswa").val();
        //     var kelas = $("#kelas").val();
        //     var keterangan = $("#keterangan").val();
        //     var row = "<tr><td class='text-center'> - </td><td>" + nama_siswa + "</td><td>" + kelas + "</td><td>" + keterangan + "</td><td class='text-center'><button class='btn btn-sm btn-danger' id='tambah_data'><i class='fa fa-trash'></i></button></td></tr>";
        //     $("table tbody").append(row);
        // });

        // Denotes total number of rows
        var rowIdx = 0;

        // jQuery button click event to add a row
        $('#tambah_data').on('click', function() {

            var nama_siswa = $("#nama_siswa").val();
            var kelas = $("#kelas").val();
            var keterangan = $("#keterangan").val();

            // console.log('data')
            // Adding a row inside the tbody.
            if (nama_siswa == '' || kelas == '' || keterangan == '') {
                Swal.fire(
                    'Peringatan !',
                    'Data yang dimasukkan tidak boleh kosong!',
                    'error'
                )
            } else {
                $('#tbody').append(`<tr id="R${++rowIdx}">
                <td class="row-index text-center">
                    <p>${rowIdx}</p>
                </td>
                <td class="row-index">
                    <p>${nama_siswa}</p>
                </td>
                <td class="row-index">
                    <p>${kelas}</p>
                </td>
                <td class="row-index">
                    <p>${keterangan}</p>
                </td>
                <td class="text-center">
                    <button class="btn btn-danger remove"
                    type="button">Remove</button>
                    </td>
                </tr>`);
            }
        });

        // jQuery button click event to remove a row.
        $('#tbody').on('click', '.remove', function() {

            // Getting all the rows next to the row
            // containing the clicked button
            var child = $(this).closest('tr').nextAll();

            // Iterating across all the rows 
            // obtained to change the index
            child.each(function() {

                // Getting <tr> id.
                var id = $(this).attr('id');

                // Getting the <p> inside the .row-index class.
                var idx = $(this).children('.row-index').children('p');

                // Gets the row number from <tr> id.
                var dig = parseInt(id.substring(1));

                // Modifying row index.
                idx.html(`Row ${dig - 1}`);

                // Modifying row id.
                $(this).attr('id', `R${dig - 1}`);
            });

            // Removing the current row.
            $(this).closest('tr').remove();

            // Decreasing total number of rows by 1.
            rowIdx--;
        });
    });
</script>
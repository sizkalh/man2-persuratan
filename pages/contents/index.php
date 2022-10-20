<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Selemat Datang di aplikasi Persuratan MAN 2 Tulungagung
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?php
                            $sql_terbit = mysqli_query($koneksi, 'SELECT
                                                                        COUNT(*) AS tot_terbit
                                                                        FROM
                                                                        tbl_surat
                                                                        INNER JOIN tbl_tanda_tangan
                                                                            ON tbl_tanda_tangan.id_surat = tbl_surat.id
                                                                        INNER JOIN tbl_guru
                                                                            ON tbl_guru.id = tbl_tanda_tangan.id_user
                                                                        WHERE tbl_guru.pangkat = "kamad"
                                                                        AND tbl_tanda_tangan.status = "diterima"');
                            while ($data_terbit = mysqli_fetch_array($sql_terbit)) {
                                echo $data_terbit['tot_terbit'];
                            }
                            ?>
                        </h3>
                        <p>Surat diterbitkan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <a href="#surat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            <?php
                            $sql_terbit = mysqli_query($koneksi, 'SELECT
                                                                        COUNT(*) AS tot_proses
                                                                        FROM
                                                                        tbl_surat
                                                                        INNER JOIN tbl_tanda_tangan
                                                                            ON tbl_tanda_tangan.id_surat = tbl_surat.id
                                                                        INNER JOIN tbl_guru
                                                                            ON tbl_guru.id = tbl_tanda_tangan.id_user
                                                                        WHERE tbl_guru.pangkat = "kamad"
                                                                        AND tbl_tanda_tangan.status != "diterima"');
                            while ($data_terbit = mysqli_fetch_array($sql_terbit)) {
                                echo $data_terbit['tot_proses'];
                            }
                            ?>
                        </h3>
                        <p>Surat diproses</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-refresh"></i>
                    </div>
                    <a href="#surat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            <?php
                            $sql_terbit = mysqli_query($koneksi, 'SELECT
                                                                        COUNT(*) AS tot_proses
                                                                        FROM
                                                                        tbl_guru');
                            while ($data_terbit = mysqli_fetch_array($sql_terbit)) {
                                echo $data_terbit['tot_proses'];
                            }
                            ?>
                        </h3>
                        <p>Guru / Tendik aktif</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="#guru" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
                            <?php
                            $sql_terbit = mysqli_query($koneksi, 'SELECT
                                                                        COUNT(*) AS tot_proses
                                                                        FROM
                                                                        tbl_siswa');
                            while ($data_terbit = mysqli_fetch_array($sql_terbit)) {
                                echo $data_terbit['tot_proses'];
                            }
                            ?>
                        </h3>
                        <p>Siswa Aktif</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <a href="#siswa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>

        <!-- Default box -->
        <div class="box box-success">
            <div class="box-body">
                <?php
                $query_sekolah = mysqli_query($koneksi, 'SELECT * FROM tbl_sekolah');
                $data = mysqli_fetch_array($query_sekolah);
                ?>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nama Sekolah / Instansi</label>
                        <div class="col-sm-10">
                            <?= $data['nama_sekolah'] ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Alamat Sekolah / Instansi</label>
                        <div class="col-sm-10">
                            <?= $data['alamat'] ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">No. Telp</label>
                        <div class="col-sm-10">
                            <?= $data['telp'] ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <?= $data['email'] ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Website</label>
                        <div class="col-sm-10">
                            <a href="https://<?= $data['website'] ?>" target="_blank"><?= $data['website'] ?></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Kode POS</label>
                        <div class="col-sm-10">
                            <?= $data['kode_pos'] ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">NPSN</label>
                        <div class="col-sm-10">
                            <span><?= $data['npsn'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="surat">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <i class="fa fa-envelope-open-o"></i>
                        <h3 class="box-title">Surat Diterbitkan</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-condensed table-bordered table-hover" id="data-table">
                            <thead>
                                <tr>
                                    <th width="30" class="text-center">No</th>
                                    <th>Jenis Surat</th>
                                    <th>No. Surat</th>
                                    <th>Waktu Pembuatan</th>
                                    <th>Waktu Terbit <?= $_SESSION['id_user'] ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if ($_SESSION['pangkat_user'] == "guru") {
                                    $query_surat_terbit = mysqli_query($koneksi, 'SELECT
                                                                        *
                                                                        FROM
                                                                        tbl_tanda_tangan A
                                                                        INNER JOIN tbl_surat B
                                                                            ON A.id_surat = B.id
                                                                        INNER JOIN tbl_guru C
                                                                            ON A.id_user = C.id
                                                                        WHERE C.pangkat = "kamad"
                                                                        AND A.status = "diterima"
                                                                        AND B.id_pemohon = "' . $_SESSION['id_user'] . '"
                                                                        ');
                                } else {
                                    $query_surat_terbit = mysqli_query($koneksi, 'SELECT
                                                                        *
                                                                        FROM
                                                                        tbl_tanda_tangan A
                                                                        INNER JOIN tbl_surat B
                                                                            ON A.id_surat = B.id
                                                                        INNER JOIN tbl_guru C
                                                                            ON A.id_user = C.id
                                                                        WHERE C.pangkat = "kamad"
                                                                        AND A.status = "diterima"
                                                                        ');
                                }
                                while ($data_surat_terbit = mysqli_fetch_array($query_surat_terbit)) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $data_surat_terbit['jenis'] ?></td>
                                        <td><?= $data_surat_terbit['no_surat'] ?></td>
                                        <td><?= $data_surat_terbit['tgl_pembuatan'] ?></td>
                                        <td><?= $data_surat_terbit['tgl_proses'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <i class="fa fa-refresh fa-spin"></i>
                        <h3 class="box-title">Surat Diproses</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-condensed table-bordered table-hover" id="data-table2">
                            <thead>
                                <tr>
                                    <th width="30" class="text-center">No</th>
                                    <th>Jenis Surat</th>
                                    <th>No. Surat</th>
                                    <th>Waktu Pembuatan</th>
                                    <th>Waktu Terbit <?= $_SESSION['id_user'] ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if ($_SESSION['pangkat_user'] == "guru") {
                                    $query_surat_terbit = mysqli_query($koneksi, 'SELECT
                                                                        *
                                                                        FROM
                                                                        tbl_tanda_tangan A
                                                                        INNER JOIN tbl_surat B
                                                                            ON A.id_surat = B.id
                                                                        INNER JOIN tbl_guru C
                                                                            ON A.id_user = C.id
                                                                        WHERE C.pangkat = "kamad"
                                                                        AND A.status = "belum"
                                                                        AND B.id_pemohon = "' . $_SESSION['id_user'] . '"
                                                                        ');
                                } else {
                                    $query_surat_terbit = mysqli_query($koneksi, 'SELECT
                                                                        *
                                                                        FROM
                                                                        tbl_tanda_tangan A
                                                                        INNER JOIN tbl_surat B
                                                                            ON A.id_surat = B.id
                                                                        INNER JOIN tbl_guru C
                                                                            ON A.id_user = C.id
                                                                        WHERE C.pangkat = "kamad"
                                                                        AND A.status = "belum"
                                                                        ');
                                }
                                while ($data_surat_terbit = mysqli_fetch_array($query_surat_terbit)) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $data_surat_terbit['jenis'] ?></td>
                                        <td><?= $data_surat_terbit['no_surat'] ?></td>
                                        <td><?= $data_surat_terbit['tgl_pembuatan'] ?></td>
                                        <td><?= $data_surat_terbit['tgl_proses'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="guru">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <i class="fa fa-users"></i>
                        <h3 class="box-title">Guru / Tendik Aktif</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-condensed table-bordered table-hover" id="data-table3">
                            <thead>
                                <tr>
                                    <th width="30" class="text-center">No</th>
                                    <th>Data Diri</th>
                                    <th>Info Kontak</th>
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
                                        </td>
                                        <td>
                                            No. HP : <a href="https://wa.me/<?= $data_guru['no_hp'] ?>" target="_blank"><?= $data_guru['no_hp'] ?></a> <br>
                                            Email : <?= $data_guru['email'] ?> <br>
                                            Alamat : <?= $data_guru['alamat'] ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="siswa">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <i class="fa fa-graduation-cap"></i>
                        <h3 class="box-title">Siswa Aktif</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-condensed table-bordered table-hover" id="data-table4">
                            <thead>
                                <tr>
                                    <th width="30" class="text-center">No</th>
                                    <th>Data Diri</th>
                                    <th>Info Kontak</th>
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
                                            <span class="label bg-green" style="font-size: .9em;">KELAS : <?= $data_siswa['rombel'] != '0' ? $data_siswa['kelas'] . '  ' . $data_siswa['jurusan'] . '  ' . $data_siswa['rombel'] : $data_siswa['kelas'] . '  ' . $data_siswa['jurusan']  ?></span>
                                        </td>
                                        <td>
                                            No. HP : <a href="https://wa.me/<?= $data_siswa['no_hp'] ?>" target="_blank"><?= $data_siswa['no_hp'] ?></a> <br>
                                            Nama Wali : <?= $data_siswa['nama_wali'] ?> <br>
                                            No. HP Wali : <a href="https://wa.me/<?= $data_siswa['no_hp_wali'] ?>" target="_blank"><?= $data_siswa['no_hp_wali'] ?></a> <br>
                                            Nama Ibu : <?= $data_siswa['nama_ibu'] ?> <br>
                                            No. HP Ibu : <a href="https://wa.me/<?= $data_siswa['no_hp_ibu'] ?>" target="_blank"><?= $data_siswa['no_hp_ibu'] ?></a> <br>
                                            Alamat : <?= $data_siswa['alamat'] ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
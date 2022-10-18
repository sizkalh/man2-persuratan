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
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
    </section>
    <!-- /.content -->
</div>
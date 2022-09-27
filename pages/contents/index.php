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
                </div>
            </div>

        </div>

        <!-- Default box -->
        <div class="box box-success">
            <div class="box-body">
                <label for="">Nama Sekolah / Instansi</label> : MAN 2 Tulungagung
                <p></p>
                <label for="">Alamat Sekolah / Instansi</label> : Jl. Ki Mangun Sarkoro, Dusun Krajan, Beji, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66233
                <p></p>
                <label for="">No. Telp</label> : (0355) 321817
                <p></p>
                <label for="">Email</label> : manduatulungagung@gmail.com
                <p></p>
                <label for="">NPSN</label> : 20584790
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php
$query_sekolah = mysqli_query($koneksi, 'SELECT * FROM tbl_sekolah');
$data = mysqli_fetch_array($query_sekolah);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Selemat Datang Di Aplikasi Persuratan <?= $data['nama_sekolah'] ?>
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
                        <i class="fa fa-envelope-open-o"></i>
                    </div>
                    <a href="#surat-terbit" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                    <a href="#surat-proses" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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

        <div class="row">
            <div class="col-sm-3">
                <div class="box box-solid bg-green-gradient">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Calendar</h3>

                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="box-body no-padding">
                        <div id="calendar" style="width: 100%"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="box box-success" id="surat-terbit">
                    <div class="box-header">
                        <i class="fa fa-envelope-open-o"></i>
                        <h3 class="box-title">Surat Diterbitkan</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-condensed table-bordered table-hover compact nowrap" id="data-table">
                            <thead>
                                <tr>
                                    <th width="30" class="text-center">No</th>
                                    <th>Jenis Surat</th>
                                    <th>No. Surat</th>
                                    <th>Waktu Pembuatan</th>
                                    <th>Waktu Terbit</th>
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
                                                                        ORDER BY B.id DESC
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
                                                                        ORDER BY B.id DESC
                                                                        ');
                                }
                                while ($data_surat_terbit = mysqli_fetch_array($query_surat_terbit)) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td>
                                            <?php
                                            if ($data_surat_terbit['jenis'] == 'berita_acara') {
                                                echo '<a href="' . base_url() . 'berita-acara/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'cuti_tahunan') {
                                                echo '<a href="' . base_url() . 'cuti-tahunan/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'nota_dinas') {
                                                echo '<a href="' . base_url() . 'nota-dinas/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'permohonan_study') {
                                                echo '<a href="' . base_url() . 'permohonan-study/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_kuasa') {
                                                echo '<a href="' . base_url() . 'surat-kuasa/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'sppd') {
                                                echo '<a href="' . base_url() . 'sppd/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_dispen') {
                                                echo '<a href="' . base_url() . 'surat-dispen/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_kuasa') {
                                                echo '<a href="' . base_url() . 'surat-kuasa/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_skkb') {
                                                echo '<a href="' . base_url() . 'surat-skkb/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_tugas') {
                                                echo '<a href="' . base_url() . 'surat-tugas/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_balasan') {
                                                echo '<a href="' . base_url() . 'surat-balasan/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_izin_kegiatan') {
                                                echo '<a href="' . base_url() . 'surat-izin-kegiatan/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_izin_penelitian') {
                                                echo '<a href="' . base_url() . 'surat-izin-penelitian/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'suket_pengganti_ijazah') {
                                                echo '<a href="' . base_url() . 'suket-pengganti-ijazah/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'suket_siswa') {
                                                echo '<a href="' . base_url() . 'suket-siswa/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_mutasi_siswa_keluar') {
                                                echo '<a href="' . base_url() . 'surat-mutasi-siswa-keluar/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_mutasi_siswa_masuk') {
                                                echo '<a href="' . base_url() . 'surat-mutasi-siswa-masuk/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_panggilan') {
                                                echo '<a href="' . base_url() . 'surat-panggilan/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_pemberitahuan') {
                                                echo '<a href="' . base_url() . 'surat-pemberitahuan/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_pengantar') {
                                                echo '<a href="' . base_url() . 'surat-pengantar/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_permohonan_narasumber') {
                                                echo '<a href="' . base_url() . 'surat-permohonan-narasumber/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_pernyataan') {
                                                echo '<a href="' . base_url() . 'surat-pernyataan/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_pesanan') {
                                                echo '<a href="' . base_url() . 'surat-pesanan/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_rekom_guru') {
                                                echo '<a href="' . base_url() . 'surat-rekom-guru/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_rekom_siswa') {
                                                echo '<a href="' . base_url() . 'surat-rekom-siswa/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_undangan') {
                                                echo '<a href="' . base_url() . 'surat-undangan/index">';
                                            }
                                            ?>
                                            <?= $data_surat_terbit['jenis'] ?>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="text-primary">
                                                <b><?= $data_surat_terbit['no_surat'] == null || $data_surat_terbit['no_surat'] == '' ? '<i>surat belum diajukan</i>' : $data_surat_terbit['no_surat'] ?></b>
                                            </span>
                                        </td>
                                        <td><?= $data_surat_terbit['tgl_pembuatan'] ?></td>
                                        <td><?= $data_surat_terbit['tgl_proses'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box box-warning" id="surat-proses">
                    <div class="box-header">
                        <i class="fa fa-refresh"></i>
                        <h3 class="box-title">Surat Diproses</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-condensed table-bordered table-hover compact nowrap" id="data-table2">
                            <thead>
                                <tr>
                                    <th width="30" class="text-center">No</th>
                                    <th>Jenis Surat</th>
                                    <th>No. Surat</th>
                                    <th>Waktu</th>
                                    <th width="150">Status</th>
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
                                                                        AND A.status != "diterima"
                                                                        AND B.id_pemohon = "' . $_SESSION['id_user'] . '"
                                                                        ORDER BY B.id DESC
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
                                                                        AND A.status != "diterima"
                                                                        ORDER BY B.id DESC
                                                                        ');
                                }
                                while ($data_surat_terbit = mysqli_fetch_array($query_surat_terbit)) {
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php
                                            $data_ttd = mysqli_query($koneksi, "SELECT * FROM tbl_tanda_tangan WHERE id_surat = " . $data_surat_terbit['id_surat']);
                                            if (mysqli_num_rows($data_ttd) > 0) {
                                                $cek_ttd_kamad = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, tbl_tanda_tangan.* FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_guru.pangkat = "kamad" AND tbl_tanda_tangan.id_surat = ' . $data_surat_terbit['id_surat'] . ' AND tbl_tanda_tangan.status = "diterima"');
                                                if (mysqli_num_rows($cek_ttd_kamad) > 0) {
                                                    echo '<i class="fa fa-check text-success"></i>';
                                                } else {
                                                    if ($_SESSION['pangkat_user'] == "guru") {
                                                        $cek_ttd_operator = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, 
                                                                                                    tbl_tanda_tangan.* 
                                                                                                    FROM tbl_tanda_tangan 
                                                                                                    INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user 
                                                                                                    WHERE tbl_guru.pangkat = "operator" 
                                                                                                    AND tbl_tanda_tangan.id_surat = ' . $data_surat_terbit['id_surat'] . ' 
                                                                                                    AND tbl_tanda_tangan.status = "ditolak"
                                                                                                    ');
                                                        if (mysqli_num_rows($cek_ttd_operator) > 0) {
                                                            echo '<i class="fa fa-warning text-danger"></i>';
                                                        } else {
                                                            echo '<i class="fa fa-refresh fa-spin"></i>';
                                                        }
                                                    } else if ($_SESSION['pangkat_user'] == "operator") {
                                                        $cek_ttd_katu = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, 
                                                                                                tbl_tanda_tangan.* 
                                                                                                FROM tbl_tanda_tangan 
                                                                                                INNER JOIN tbl_guru ON 
                                                                                                tbl_guru.id=tbl_tanda_tangan.id_user 
                                                                                                WHERE tbl_guru.pangkat = "katu" 
                                                                                                AND tbl_tanda_tangan.id_surat = ' . $data_surat_terbit['id_surat'] . ' 
                                                                                                AND tbl_tanda_tangan.status = "ditolak"
                                                                                                ');
                                                        if (mysqli_num_rows($cek_ttd_katu) > 0) {
                                                            echo '<i class="fa fa-warning text-danger"></i>';
                                                        } else {
                                                            echo '<i class="fa fa-refresh fa-spin"></i>';
                                                        }
                                                    } else if ($_SESSION['pangkat_user'] == "katu") {
                                                        $cek_ttd_kamad = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, 
                                                                                                tbl_tanda_tangan.* 
                                                                                                FROM tbl_tanda_tangan 
                                                                                                INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user 
                                                                                                WHERE tbl_guru.pangkat = "kamad" 
                                                                                                AND tbl_tanda_tangan.id_surat = ' . $data_surat_terbit['id_surat'] . ' 
                                                                                                AND tbl_tanda_tangan.status = "ditolak"
                                                                                                ');
                                                        if (mysqli_num_rows($cek_ttd_kamad) > 0) {
                                                            echo '<i class="fa fa-warning text-danger"></i>';
                                                        } else {
                                                            echo '<i class="fa fa-refresh fa-spin"></i>';
                                                        }
                                                    } else if ($_SESSION['pangkat_user'] == "kamad") {
                                                        $cek_ttd_final = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, 
                                                                                                tbl_tanda_tangan.* 
                                                                                                FROM tbl_tanda_tangan 
                                                                                                INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user 
                                                                                                WHERE tbl_guru.pangkat = "superuser" 
                                                                                                AND tbl_tanda_tangan.id_surat = ' . $data_surat_terbit['id_surat'] . ' 
                                                                                                AND tbl_tanda_tangan.status = "ditolak"
                                                                                                ');
                                                        if (mysqli_num_rows($cek_ttd_final) > 0) {
                                                            echo '<i class="fa fa-warning text-danger"></i>';
                                                        } else {
                                                            echo '<i class="fa fa-refresh fa-spin"></i>';
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($data_surat_terbit['jenis'] == 'berita_acara') {
                                                echo '<a href="' . base_url() . 'berita-acara/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'cuti_tahunan') {
                                                echo '<a href="' . base_url() . 'cuti-tahunan/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'nota_dinas') {
                                                echo '<a href="' . base_url() . 'nota-dinas/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'permohonan_study') {
                                                echo '<a href="' . base_url() . 'permohonan-study/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_kuasa') {
                                                echo '<a href="' . base_url() . 'surat-kuasa/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'sppd') {
                                                echo '<a href="' . base_url() . 'sppd/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_dispen') {
                                                echo '<a href="' . base_url() . 'surat-dispen/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_kuasa') {
                                                echo '<a href="' . base_url() . 'surat-kuasa/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_skkb') {
                                                echo '<a href="' . base_url() . 'surat-skkb/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_tugas') {
                                                echo '<a href="' . base_url() . 'surat-tugas/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_balasan') {
                                                echo '<a href="' . base_url() . 'surat-balasan/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_izin_kegiatan') {
                                                echo '<a href="' . base_url() . 'surat-izin-kegiatan/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_izin_penelitian') {
                                                echo '<a href="' . base_url() . 'surat-izin-penelitian/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'suket_pengganti_ijazah') {
                                                echo '<a href="' . base_url() . 'suket-pengganti-ijazah/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'suket_siswa') {
                                                echo '<a href="' . base_url() . 'suket-siswa/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_mutasi_siswa_keluar') {
                                                echo '<a href="' . base_url() . 'surat-mutasi-siswa-keluar/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_mutasi_siswa_masuk') {
                                                echo '<a href="' . base_url() . 'surat-mutasi-siswa-masuk/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_panggilan') {
                                                echo '<a href="' . base_url() . 'surat-panggilan/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_pemberitahuan') {
                                                echo '<a href="' . base_url() . 'surat-pemberitahuan/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_pengantar') {
                                                echo '<a href="' . base_url() . 'surat-pengantar/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_permohonan_narasumber') {
                                                echo '<a href="' . base_url() . 'surat-permohonan-narasumber/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_pernyataan') {
                                                echo '<a href="' . base_url() . 'surat-pernyataan/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_pesanan') {
                                                echo '<a href="' . base_url() . 'surat-pesanan/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_rekom_guru') {
                                                echo '<a href="' . base_url() . 'surat-rekom-guru/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_rekom_siswa') {
                                                echo '<a href="' . base_url() . 'surat-rekom-siswa/index">';
                                            } else if ($data_surat_terbit['jenis'] == 'surat_undangan') {
                                                echo '<a href="' . base_url() . 'surat-undangan/index">';
                                            }
                                            ?>
                                            <?= $data_surat_terbit['jenis'] ?>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="text-primary">
                                                <b><?= $data_surat_terbit['no_surat'] == null || $data_surat_terbit['no_surat'] == '' ? '<i>surat belum diajukan</i>' : $data_surat_terbit['no_surat'] ?></b>
                                            </span>
                                        </td>
                                        <td>
                                            Surat dibuat : <span class="text-success"><?= $data_surat_terbit['tgl_pembuatan'] ?></span> <br>
                                            Surat diproses : <span class="text-primary"><?= $data_surat_terbit['tgl_proses'] == null || $data_surat_terbit['tgl_proses'] == '' ? 'surat belum diajukan' : $data_surat_terbit['tgl_proses']  ?></span>
                                        </td>
                                        <td>
                                            <?php
                                            $query_cek = mysqli_query($koneksi, 'SELECT
                                                                                    A.*,
                                                                                    B.pangkat
                                                                                    FROM
                                                                                    tbl_tanda_tangan A
                                                                                    INNER JOIN tbl_guru B
                                                                                        ON A.id_user = B.id
                                                                                    WHERE A.id_surat = "' . $data_surat_terbit['id_surat'] . '"
                                                                                    AND A.status = "diterima"
                                                                                    ORDER BY A.id DESC
                                                                                    ');

                                            $query_cek_operator = mysqli_query($koneksi, 'SELECT
                                                                                    A.*,
                                                                                    B.pangkat
                                                                                    FROM
                                                                                    tbl_tanda_tangan A
                                                                                    INNER JOIN tbl_guru B
                                                                                        ON A.id_user = B.id
                                                                                    WHERE A.id_surat = "' . $data_surat_terbit['id_surat'] . '"
                                                                                    AND B.pangkat = "operator"
                                                                                    ');
                                            $data_operator = mysqli_fetch_array($query_cek_operator);

                                            if (mysqli_num_rows($query_cek) > 0) {
                                                while ($data_cek = mysqli_fetch_array($query_cek)) {
                                            ?>
                                                    <i class="fa fa-check <?php
                                                                            if ($data_cek['pangkat'] == 'guru') {
                                                                                echo 'text-default';
                                                                            } else if ($data_cek['pangkat'] == 'operator') {
                                                                                echo 'text-warning';
                                                                            } else if ($data_cek['pangkat'] == 'katu') {
                                                                                echo 'text-success';
                                                                            }
                                                                            ?>"></i>
                                                    <?php
                                                    if ($data_cek['pangkat'] == 'guru') {
                                                        echo 'Guru';
                                                    } else if ($data_cek['pangkat'] == 'operator') {
                                                        echo 'OPS';
                                                    } else if ($data_cek['pangkat'] == 'katu') {
                                                        echo 'KATU';
                                                    }
                                                    ?>
                                            <?php }
                                            } else {
                                                if ($data_operator['status'] == 'ditolak') {
                                                    echo "<i class='text-danger'>surat ditolak operator</i>";
                                                } else {
                                                    echo "<i class='text-info'>surat belum diajukan</i>";
                                                }
                                            }
                                            echo '<br>';

                                            if (mysqli_num_rows($data_ttd) > 0) {
                                                $cek_ttd_kamad = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, tbl_tanda_tangan.* FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_guru.pangkat = "kamad" AND tbl_tanda_tangan.id_surat = ' . $data_surat_terbit['id_surat'] . ' AND tbl_tanda_tangan.status = "diterima"');
                                                if (mysqli_num_rows($cek_ttd_kamad) > 0) {
                                                    echo '<i class="fa fa-check text-success"></i>';
                                                } else {
                                                    if ($_SESSION['pangkat_user'] == "guru") {
                                                        $cek_ttd_operator = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, 
                                                                                                    tbl_tanda_tangan.* 
                                                                                                    FROM tbl_tanda_tangan 
                                                                                                    INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user 
                                                                                                    WHERE tbl_guru.pangkat = "operator" 
                                                                                                    AND tbl_tanda_tangan.id_surat = ' . $data_surat_terbit['id_surat'] . ' 
                                                                                                    AND tbl_tanda_tangan.status = "ditolak"
                                                                                                    ');
                                                        $data_cek_ttd_operator = mysqli_fetch_array($cek_ttd_operator);
                                                        if (mysqli_num_rows($cek_ttd_operator) > 0) {
                                                            echo "<small><i class='fa fa-commenting-o'></i> ditolak : " . $data_cek_ttd_operator['catatan'] . "</small>";
                                                        }
                                                    } else if ($_SESSION['pangkat_user'] == "operator") {
                                                        $cek_ttd_katu = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, 
                                                                                                tbl_tanda_tangan.* 
                                                                                                FROM tbl_tanda_tangan 
                                                                                                INNER JOIN tbl_guru ON 
                                                                                                tbl_guru.id=tbl_tanda_tangan.id_user 
                                                                                                WHERE tbl_guru.pangkat = "katu" 
                                                                                                AND tbl_tanda_tangan.id_surat = ' . $data_surat_terbit['id_surat'] . ' 
                                                                                                AND tbl_tanda_tangan.status = "ditolak"
                                                                                                ');
                                                        $data_cek_ttd_katu = mysqli_fetch_array($cek_ttd_katu);
                                                        if (mysqli_num_rows($cek_ttd_katu) > 0) {
                                                            echo "<small><i class='fa fa-commenting-o'></i> ditolak : " . $data_cek_ttd_katu['catatan'] . "</small>";
                                                        }
                                                    } else if ($_SESSION['pangkat_user'] == "katu") {
                                                        $cek_ttd_kamad = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, 
                                                                                                tbl_tanda_tangan.* 
                                                                                                FROM tbl_tanda_tangan 
                                                                                                INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user 
                                                                                                WHERE tbl_guru.pangkat = "kamad" 
                                                                                                AND tbl_tanda_tangan.id_surat = ' . $data_surat_terbit['id_surat'] . ' 
                                                                                                AND tbl_tanda_tangan.status = "ditolak"
                                                                                                ');
                                                        $data_cek_ttd_kamad = mysqli_fetch_array($cek_ttd_kamad);
                                                        if (mysqli_num_rows($cek_ttd_kamad) > 0) {
                                                            echo "<small><i class='fa fa-commenting-o'></i> ditolak : " . $data_cek_ttd_kamad['catatan'] . "</small>";
                                                        }
                                                    } else if ($_SESSION['pangkat_user'] == "kamad") {
                                                        $cek_ttd_final = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, 
                                                                                                tbl_tanda_tangan.* 
                                                                                                FROM tbl_tanda_tangan 
                                                                                                INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user 
                                                                                                WHERE tbl_guru.pangkat = "superuser" 
                                                                                                AND tbl_tanda_tangan.id_surat = ' . $data_surat_terbit['id_surat'] . ' 
                                                                                                AND tbl_tanda_tangan.status = "ditolak"
                                                                                                ');
                                                        $data_cek_ttd_final = mysqli_fetch_array($cek_ttd_final);
                                                        if (mysqli_num_rows($cek_ttd_final) > 0) {
                                                            echo "<small><i class='fa fa-commenting-o'></i> ditolak : " . $data_cek_ttd_final['catatan'] . "</small>";
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                            <!-- <i class="fa fa-exclamation-triangle text-danger"></i> ditolak operator -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6" id="guru">
                <div class="box">
                    <div class="box-header">
                        <i class="fa fa-users"></i>
                        <h3 class="box-title">Guru / Tendik Aktif</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-condensed table-bordered table-hover compact nowrap" id="data-table3">
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
            <div class="col-md-6" id="siswa">
                <div class="box">
                    <div class="box-header">
                        <i class="fa fa-graduation-cap"></i>
                        <h3 class="box-title">Siswa Aktif</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-condensed table-bordered table-hover compact nowrap" id="data-table4">
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
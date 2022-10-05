<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url() ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">MAN2</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>MAN 2 </b>Tulungagung</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell"></i> Notifikasi

                <!-- script untuk angka kecil dinotifikasi -->
                <span class="label label-info">
                  <?php
                  $query_count = mysqli_query($koneksi, 'SELECT COUNT(*) AS notif FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user INNER JOIN tbl_surat ON tbl_surat.id=tbl_tanda_tangan.id_surat WHERE tbl_guru.pangkat = "' .  $_SESSION['pangkat_user'] . '" AND tbl_tanda_tangan.status = "cek"');
                  while ($count = mysqli_fetch_array($query_count)) {
                    echo $count['notif'];
                  }
                  ?>
                </span>

              </a>
              <ul class="dropdown-menu">
                <!--<li class="header">You have 4 messages</li>-->
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <?php 
                      $query_notif = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, tbl_guru.nama, tbl_surat.jenis, tbl_surat.tgl_pembuatan, tbl_tanda_tangan.* FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user INNER JOIN tbl_surat ON tbl_surat.id=tbl_tanda_tangan.id_surat WHERE tbl_guru.pangkat = "' .  $_SESSION['pangkat_user'] . '" AND tbl_tanda_tangan.status = "cek"');
                      while($data = mysqli_fetch_array($query_notif)){
                    ?>
                    <li>

                      <!-- menu href yang harus diganti di menu notif -->

                      <?php 
                        if ($data['jenis'] == 'berita_acara'){
                          echo '<a href="' . base_url() . 'berita-acara/index">';
                        } else if ($data['jenis'] == 'cuti_tahunan') {
                          echo '<a href="' . base_url() . 'cuti-tahunan/index">';
                        } else if ($data['jenis'] == 'nota_dinas') {
                          echo '<a href="' . base_url() . 'nota-dinas/index">';
                        } else if ($data['jenis'] == 'permohonan_study') {
                          echo '<a href="' . base_url() . 'permohonan-study/index">';
                        } else if ($data['jenis'] == 'surat_kuasa') {
                          echo '<a href="' . base_url() . 'surat-kuasa/index">';
                        } else if ($data['jenis'] == 'sppd') {
                          echo '<a href="' . base_url() . 'sppd/index">';
                        } else if ($data['jenis'] == 'surat_dispen') {
                          echo '<a href="' . base_url() . 'surat-dispen/index">';
                        } else if ($data['jenis'] == 'surat_kuasa') {
                          echo '<a href="' . base_url() . 'surat-kuasa/index">';
                        } else if ($data['jenis'] == 'surat_skkb') {
                          echo '<a href="' . base_url() . 'surat-skkb/index">';
                        } else if ($data['jenis'] == 'surat_tugas') {
                          echo '<a href="' . base_url() . 'surat-tugas/index">';
                        } else if ($data['jenis'] == 'surat_balasan') {
                          echo '<a href="' . base_url() . 'surat-balasan/index">';
                        } else if ($data['jenis'] == 'surat_izin_kegiatan') {
                          echo '<a href="' . base_url() . 'surat-izin-kegiatan/index">';
                        } else if ($data['jenis'] == 'surat_izin_penelitian') {
                          echo '<a href="' . base_url() . 'surat-izin-penelitian/index">';
                        } else if ($data['jenis'] == 'suket_pengganti_ijazah') {
                          echo '<a href="' . base_url() . 'suket-pengganti-ijazah/index">';
                        } else if ($data['jenis'] == 'suket_siswa') {
                          echo '<a href="' . base_url() . 'suket-siswa/index">';
                        } else if ($data['jenis'] == 'surat_mutasi_siswa_keluar') {
                          echo '<a href="' . base_url() . 'surat-mutasi-siswa-keluar/index">';
                        } else if ($data['jenis'] == 'surat_mutasi_siswa_masuk') {
                          echo '<a href="' . base_url() . 'surat-mutasi-siswa-masuk/index">';
                        } else if ($data['jenis'] == 'surat_panggilan') {
                          echo '<a href="' . base_url() . 'surat-panggilan/index">';
                        } else if ($data['jenis'] == 'surat_pemberitahuan') {
                          echo '<a href="' . base_url() . 'surat-pemberitahuan/index">';
                        } else if ($data['jenis'] == 'surat_pengantar') {
                          echo '<a href="' . base_url() . 'surat-pengantar/index">';
                        } else if ($data['jenis'] == 'surat_permohonan_narasumber') {
                          echo '<a href="' . base_url() . 'surat-permohonan-narasumber/index">';
                        } else if ($data['jenis'] == 'surat_pernyataan') {
                          echo '<a href="' . base_url() . 'surat-pernyataan/index">';
                        } else if ($data['jenis'] == 'surat_pesanan') {
                          echo '<a href="' . base_url() . 'surat-pesanan/index">';
                        } else if ($data['jenis'] == 'surat_rekom_guru') {
                          echo '<a href="' . base_url() . 'surat-rekom-guru/index">';
                        } else if ($data['jenis'] == 'surat_rekom_siswa') {
                          echo '<a href="' . base_url() . 'surat-rekom-siswa/index">';
                        } else if ($data['jenis'] == 'surat_undangan') {
                          echo '<a href="' . base_url() . 'surat-undangan/index">';
                        }
                      ?>


                      <!-- NOTIFIKASI TRACKING -->
                        <h4>
                          <?php
                            $query_pemohon = mysqli_query($koneksi, 'SELECT tbl_guru.nama FROM tbl_guru INNER JOIN tbl_surat ON tbl_surat.id_pemohon = tbl_guru.id WHERE tbl_surat.id = "' . $data['id_surat'] . '"');
                            while($pemohon = mysqli_fetch_array($query_pemohon)){
                          ?>
                          <?= $pemohon['nama'] ?>
                          <?php } ?>
                          <?php 
                            if ($_SESSION['pangkat_user'] == 'operator'){
                              $query_tgl_notif = mysqli_query($koneksi, 'SELECT tgl_proses FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_tanda_tangan.id_surat = "' . $data['id_surat'] . '" AND tbl_guru.pangkat = "guru"');
                            } else if($_SESSION['pangkat_user'] == 'katu'){
                              $query_tgl_notif = mysqli_query($koneksi, 'SELECT tgl_proses FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_tanda_tangan.id_surat = "' . $data['id_surat'] . '" AND tbl_guru.pangkat = "operator"');
                            } else if ($_SESSION['pangkat_user'] == 'kamad') {
                              $query_tgl_notif = mysqli_query($koneksi, 'SELECT tgl_proses FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_tanda_tangan.id_surat = "' . $data['id_surat'] . '" AND tbl_guru.pangkat = "katu"');
                            } else if ($_SESSION['pangkat_user'] == 'guru' || $_SESSION['pangkat_user'] == 'superuser') {
                              $query_tgl_notif = mysqli_query($koneksi, 'SELECT tgl_proses FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_tanda_tangan.id_surat = "' . $data['id_surat'] . '" AND tbl_guru.pangkat = "kamad"');
                            } 
                            while($tgl = mysqli_fetch_array($query_tgl_notif)){
                          ?>
                          <small><i class="fa fa-clock-o"></i> <?= $tgl['tgl_proses'] ?></small>
                          <?php } ?>
                        </h4>
                        <!-- MENAMBAHKAN JENIS SURAT -->
                        <p>
                          <?php 
                            if ($data['jenis'] == 'berita_acara'){
                              echo 'Berita Acara';
                            } else if ($data['jenis'] == 'cuti_tahunan') {
                              echo 'Cuti Tahunan';
                            } else if ($data['jenis'] == 'nota_dinas') {
                              echo 'Nota Dinas';
                            } else if ($data['jenis'] == 'permohonan_studi') {
                              echo 'Permohonan Study';
                            } else if ($data['jenis'] == 'sppd') {
                              echo 'SPPD';
                            } else if ($data['jenis'] == 'surat_dispen') {
                              echo 'Surat Dispen';
                            } else if ($data['jenis'] == 'surat_kuasa') {
                              echo 'Surat Kuasa';
                            } else if ($data['jenis'] == 'surat_skkb') {
                              echo 'Surat SKKB';
                            } else if ($data['jenis'] == 'surat_tugas') {
                              echo 'Surat Tugas';
                            } else if ($data['jenis'] == 'surat_balasan') {
                              echo 'Surat Balasan';
                            } else if ($data['jenis'] == 'surat_izin_kegiatan') {
                              echo 'Surat Izin Kegiatan';
                            } else if ($data['jenis'] == 'surat_izin_penelitian') {
                              echo 'Surat Izin Penelitian';
                            } else if ($data['jenis'] == 'suket_pengganti_ijazah') {
                              echo 'Surat Ket. Pengganti Ijazah';
                            } else if ($data['jenis'] == 'suket_siswa') {
                              echo 'Surat Keterangan Siswa';
                            } else if ($data['jenis'] == 'surat_mutasi_siswa_keluar') {
                              echo 'Surat Mutasi Siswa Keluar';
                            } else if ($data['jenis'] == 'surat_mutasi_siswa_masuk') {
                              echo 'Surat Mutasi Siswa Masuk';
                            } else if ($data['jenis'] == 'surat_panggilan') {
                              echo 'Surat Panggilan';
                            } else if ($data['jenis'] == 'surat_pemberitahuan') {
                              echo 'Surat Pemeberitahuan';
                            } else if ($data['jenis'] == 'surat_pengantar') {
                              echo 'Surat Pengantar';
                            } else if ($data['jenis'] == 'surat_permohonan_narasumber') {
                              echo 'Surat Permohonan Narasumber';
                            } else if ($data['jenis'] == 'surat_pernyataan') {
                              echo 'Surat Pernyataan';
                            } else if ($data['jenis'] == 'surat_pesanan') {
                              echo 'Surat Pesanan';
                            } else if ($data['jenis'] == 'surat_rekom_guru') {
                              echo 'Surat Rekomendasi Guru';
                            } else if ($data['jenis'] == 'surat_rekom_siswa') {
                              echo 'Surat Rekomendasi Siswa';
                            } else if ($data['jenis'] == 'surat_undangan') {
                              echo 'Surat Undangan';
                            }
                          ?>
                        </p>
                      </a>
                    </li>
                    <?php } ?>
                  </ul>
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
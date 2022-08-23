<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>MAN</b>2</span>
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
                      <a href="#">
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
                            } else if ($_SESSION['pangkat_user'] == 'guru') {
                              $query_tgl_notif = mysqli_query($koneksi, 'SELECT tgl_proses FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_tanda_tangan.id_surat = "' . $data['id_surat'] . '" AND tbl_guru.pangkat = "kamad"');
                            }
                            while($tgl = mysqli_fetch_array($query_tgl_notif)){
                          ?>
                          <small><i class="fa fa-clock-o"></i> <?= $tgl['tgl_proses'] ?></small>
                          <?php } ?>
                        </h4>
                        <p>
                          <?php 
                            if ($data['jenis'] == 'berita_acara'){
                              echo 'Berita Acara';
                            } else if ($data['jenis'] == 'cuti_tahunan') {
                              echo 'Cuti Tahunan';
                            } else if ($data['jenis'] == 'nota_dinas') {
                              echo 'Nota Dinas';
                            } else if ($data['jenis'] == 'permohonan_study') {
                              echo 'Permohonan Study';
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
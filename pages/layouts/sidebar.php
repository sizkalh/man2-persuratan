<?php
$page_uri = $_SERVER['REQUEST_URI'];
$uri2 = explode('/', trim($uri[0], '/'));

// $data_url = $uri2[0];
// print_r($uri2);
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>
          <small>
            <?= $_SESSION['nama_user'] ?>
          </small> 
          <br>
          <small>
            <?= $_SESSION['pangkat_user'] != 'siswa'? $_SESSION['jabatan_user'] : 'siswa' ?>
          </small>
        </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <br />

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      <li <?= $page_uri == "/" ? "class = 'active'" : "" ?>>
        <a href="<?= base_url() ?>">
          <i class="fa fa-home"></i> <span>Beranda</span>
        </a>
      </li>
      <?php 
          if($_SESSION['pangkat_user'] != 'siswa') {
      ?>
      <li class="treeview <?= $uri2[0] == 'berita-acara' ||
                            $uri2[0] == 'nota-dinas' ||
                            $uri2[0] == 'cuti-tahunan' ||
                            $uri2[0] == 'permohonan-studi-kampus' ||
                            $uri2[0] == 'sppd' ||
                            $uri2[0] == 'surat-dispen' ||
                            $uri2[0] == 'surat-kuasa' ||
                            $uri2[0] == 'surat-skkb' ||
                            $uri2[0] == 'surat-tugas' ||
                            $uri2[0] == 'surat-balasan' ||
                            $uri2[0] == 'surat-izin-kegiatan' ||
                            $uri2[0] == 'surat-izin-penelitian' ||
                            $uri2[0] == 'suket-pengganti-ijazah' ||
                            $uri2[0] == 'suket-siswa' ||
                            $uri2[0] == 'suket-guru' ||
                            $uri2[0] == 'surat-mutasi-siswa-keluar' ||
                            $uri2[0] == 'surat-mutasi-siswa-masuk' ||
                            $uri2[0] == 'surat-panggilan' ||
                            $uri2[0] == 'surat-pemberitahuan' ||
                            $uri2[0] == 'surat-pengantar' ||
                            $uri2[0] == 'surat-permohonan-narasumber' ||
                            $uri2[0] == 'surat-pernyataan' ||
                            $uri2[0] == 'surat-pesanan' ||
                            $uri2[0] == 'surat-rekom-guru' ||
                            $uri2[0] == 'surat-rekom-siswa' ||
                            $uri2[0] == 'surat-undangan' ? 'active' : '' ?>">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Persuratan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?= $uri2[0] == "nota-dinas" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>nota-dinas/index">
              <i class="fa fa-circle-o"></i>Nota Dinas
            </a>
          </li>
          <li <?= $uri2[0] == "surat-kuasa" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>surat-kuasa/index">
              <i class="fa fa-circle-o"></i>Surat Kuasa
            </a>
          </li>
          <li <?= $uri2[0] == "surat-undangan" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>surat-undangan/index">
              <i class="fa fa-circle-o"></i>Surat Undangan
            </a>
          </li>
          <li <?= $uri2[0] == "surat-balasan" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>surat-balasan/index">
              <i class="fa fa-circle-o"></i>Surat Balasan
            </a>
          </li>
          <li <?= $uri2[0] == "surat-skkb" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>surat-skkb/index">
              <i class="fa fa-circle-o"></i>Surat SKKB
            </a>
          </li>
          <li <?= $uri2[0] == "surat-izin-penelitian" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>surat-izin-penelitian/index">
              <i class="fa fa-circle-o"></i>Surat Izin Penelitian
            </a>
          </li>
          <li <?= $uri2[0] == "surat-permohonan-narasumber" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>surat-permohonan-narasumber/index">
              <i class="fa fa-circle-o"></i>Surat Permohonan Narasumber
            </a>
          </li>
          <li <?= $uri2[0] == "surat-pemberitahuan" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>surat-pemberitahuan/index">
              <i class="fa fa-circle-o"></i>Surat Pemberitahuan
            </a>
          </li>
          <li <?= $uri2[0] == "surat-mutasi-siswa-keluar" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>surat-mutasi-siswa-keluar/index">
              <i class="fa fa-circle-o"></i>Surat Mutasi Siswa Keluar
            </a>
          </li>
          <li <?= $uri2[0] == "suket-siswa" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>suket-siswa/index">
              <i class="fa fa-circle-o"></i>Surat Keterangan Siswa
            </a>
          </li>
          <li <?= $uri2[0] == "suket-guru" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>suket-guru/index">
              <i class="fa fa-circle-o"></i>Surat Keterangan Guru
            </a>
          </li>
          <li <?= $uri2[0] == "surat-rekom-guru" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>surat-rekom-guru/index">
              <i class="fa fa-circle-o"></i>Surat Rekomendasi Guru
            </a>
          </li>
          <li <?= $uri2[0] == "surat-rekom-siswa" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>surat-rekom-siswa/index">
              <i class="fa fa-circle-o"></i>Surat Rekomendasi Siswa
            </a>
          </li>
          <li <?= $uri2[0] == "surat-izin-kegiatan" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>surat-izin-kegiatan/index">
              <i class="fa fa-circle-o"></i>Surat Izin Kegiatan
            </a>
          </li>
          <li <?= $uri2[0] == "surat-tugas" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>surat-tugas/index">
              <i class="fa fa-circle-o"></i>Surat Tugas
            </a>
          </li>
          <li <?= $uri2[0] == "surat-dispen" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>surat-dispen/index">
              <i class="fa fa-circle-o"></i>Surat Dispen
            </a>
          </li>
          <li <?= $uri2[0] == "surat-pengantar" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>surat-pengantar/index">
              <i class="fa fa-circle-o"></i>Surat Pengantar
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i> <span>Proposal</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index"><i class="fa fa-circle-o"></i>Proposal</a></li>
        </ul>
      </li> -->
      <li class="treeview <?= $uri2[0] == 'data-sekolah' ||
                            $uri2[0] == 'data-guru' ||
                            $uri2[0] == 'wali-kelas' ||
                            $uri2[0] == 'data-kelas' ||
                            $uri2[0] == 'prestasi-siswa' ||
                            $uri2[0] == 'profil' ||
                            $uri2[0] == 'data-siswa' ? 'active' : '' ?>">
        <a href="#">
          <i class="fa fa-gears"></i> <span>Pengaturan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php if ($_SESSION['pangkat_user'] == 'operator' || $_SESSION['pangkat_user'] == "superuser") { ?>
            <li <?= $uri2[0] == "data-sekolah" ? "class = 'active'" : "" ?>>
              <a href="<?= base_url() ?>data-sekolah/index">
                <i class="fa fa-circle-o"></i>Data Sekolah
              </a>
            </li>
            <li <?= $uri2[0] == "data-kelas" ? "class = 'active'" : "" ?>>
              <a href="<?= base_url() ?>data-kelas/index">
                <i class="fa fa-circle-o"></i>Data Kelas
              </a>
            </li>
            <li <?= $uri2[0] == "data-guru" ? "class = 'active'" : "" ?>>
              <a href="<?= base_url() ?>data-guru/index">
                <i class="fa fa-circle-o"></i>Data Guru & Tendik
              </a>
            </li>
            <li <?= $uri2[0] == "wali-kelas" ? "class = 'active'" : "" ?>>
              <a href="<?= base_url() ?>wali-kelas/index">
                <i class="fa fa-circle-o"></i>Data Wali Kelas
              </a>
            </li>
            <li <?= $uri2[0] == "data-siswa" ? "class = 'active'" : "" ?>>
              <a href="<?= base_url() ?>data-siswa/index">
                <i class="fa fa-circle-o"></i>Data Siswa
              </a>
            </li>
            <li <?= $uri2[0] == "prestasi-siswa" ? "class = 'active'" : "" ?>>
              <a href="<?= base_url() ?>prestasi-siswa/index">
                <i class="fa fa-circle-o"></i>Data Prestasi Siswa
              </a>
            </li>
          <?php } ?>
          <li <?= $uri2[0] == "profil" ? "class = 'active'" : "" ?>>
            <a href="<?= base_url() ?>profil/index">
              <i class="fa fa-circle-o"></i>Profil
            </a>
          </li>
        </ul>
      </li>
      <li class="btn-danger">
        <a href="<?= base_url() ?>process/auth/logout.php">
          <i class="fa fa-power-off"></i> <span>Logout</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
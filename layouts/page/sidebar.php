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
          <?= $_SESSION['nama_user'] ?> <br>
          <small><?= $_SESSION['jabatan_user'] ?></small>
        </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Persuratan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="berita_acara.php"><i class="fa fa-circle-o"></i>Berita Acara</a></li>
          <li><a href="nota_dinas.php"><i class="fa fa-circle-o"></i>Nota Dinas</a></li>
          <li><a href="cuti_tahunan.php"><i class="fa fa-circle-o"></i>Cuti Tahunan</a></li>
          <li><a href="study_kampus.php"><i class="fa fa-circle-o"></i>Permohonan Study Kampus</a></li>
          <li><a href="sspd.php"><i class="fa fa-circle-o"></i>SPPD</a></li>
          <li><a href="surat_dispen.php"><i class="fa fa-circle-o"></i>Surat Dispen</a></li>
          <li><a href="surat_kuasa.php"><i class="fa fa-circle-o"></i>Surat Kuasa</a></li>
          <li><a href="surat_skkb.php"><i class="fa fa-circle-o"></i>Surat SKKB</a></li>
          <li><a href="surat_tugas.php"><i class="fa fa-circle-o"></i>Surat Tugas</a></li>
          <li><a href="surat_balasan.php"><i class="fa fa-circle-o"></i>Surat Balasan</a></li>
          <li><a href="izin_kegiatan.php"><i class="fa fa-circle-o"></i>Surat Izin Kegiatan</a></li>
          <li><a href="surat_penelitian.php"><i class="fa fa-circle-o"></i>Surat Izin Penelitian</a></li>
          <li><a href="sk_pengganti_ijazah.php"><i class="fa fa-circle-o"></i>Surat Ket. Pengganti Ijazah</a></li>
          <li><a href="sk_siswa.php"><i class="fa fa-circle-o"></i>Surat Keterangan Siswa</a></li>
          <li><a href="mutsi_siswa_keluar.php"><i class="fa fa-circle-o"></i>Surat Mutasi Siswa Keluar</a></li>
          <li><a href="mutsi_siswa_masuk"><i class="fa fa-circle-o"></i>Surat Mutasi Siswa Masuk</a></li>
          <li><a href="surat_panggilan.php"><i class="fa fa-circle-o"></i>Surat Panggilan</a></li>
          <li><a href="surat_pemberitahuan.php"><i class="fa fa-circle-o"></i>Surat Pemberitahuan</a></li>
          <li><a href="surat_pengantar.php"><i class="fa fa-circle-o"></i>Surat Pengantar</a></li>
          <li><a href="surat_permohonan_narasumber.php"><i class="fa fa-circle-o"></i>Surat Permohonan Narasumber</a></li>
          <li><a href="surat_pernyataan.php"><i class="fa fa-circle-o"></i>Surat Pernyataan</a></li>
          <li><a href="surat_pesanan.php"><i class="fa fa-circle-o"></i>Surat Pesanan</a></li>
          <li><a href="surat_rekomendasi_guru.php"><i class="fa fa-circle-o"></i>Surat Rekomendasi Guru</a></li>
          <li><a href="surat_rekomendasi_guru.php"><i class="fa fa-circle-o"></i>Surat Rekomendasi Siswa</a></li>
          <li><a href="surat_undangan.php"><i class="fa fa-circle-o"></i>Surat Undangan</a></li>
        </ul>
      </li>
    </ul>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i> <span>Proposal</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index"><i class="fa fa-circle-o"></i>Proposal</a></li>
        </ul>
      </li>
    </ul>
    <a href="../../config/logout.php" class="btn btn-danger btn-block btn-flat white"><i class="fa fa-sign-out"></i> Logout</a>
  </section>
  <!-- /.sidebar -->
</aside>
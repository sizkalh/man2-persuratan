/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.2.40-MariaDB-log : Database - man2_tulungagung
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`man2_tulungagung` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `man2_tulungagung`;

/*Table structure for table `tbl_berita_acara` */

DROP TABLE IF EXISTS `tbl_berita_acara`;

CREATE TABLE `tbl_berita_acara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `nama_pertama` varchar(100) DEFAULT NULL,
  `nip_pertama` varchar(100) DEFAULT NULL,
  `jabatan_pertama` varchar(150) DEFAULT NULL,
  `nama_kedua` varchar(100) DEFAULT NULL,
  `nip_kedua` varchar(100) DEFAULT NULL,
  `jabatan_kedua` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_berita_acara` */

insert  into `tbl_berita_acara`(`id`,`id_surat`,`nama_pertama`,`nip_pertama`,`jabatan_pertama`,`nama_kedua`,`nip_kedua`,`jabatan_kedua`) values 
(1,20,'Edo','155','Guru','setian','0999','guru masak');

/*Table structure for table `tbl_detail_kelas` */

DROP TABLE IF EXISTS `tbl_detail_kelas`;

CREATE TABLE `tbl_detail_kelas` (
  `id_detail_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `rombel` int(1) NOT NULL,
  PRIMARY KEY (`id_detail_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_detail_kelas` */

insert  into `tbl_detail_kelas`(`id_detail_kelas`,`id_kelas`,`id_jurusan`,`rombel`) values 
(1,1,1,1),
(2,1,2,1),
(3,2,1,1),
(4,2,2,1),
(5,3,1,1),
(6,3,2,1);

/*Table structure for table `tbl_detail_pesanan` */

DROP TABLE IF EXISTS `tbl_detail_pesanan`;

CREATE TABLE `tbl_detail_pesanan` (
  `id` int(10) unsigned zerofill NOT NULL,
  `id_surat` int(11) DEFAULT NULL,
  `nama_barang` text DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_detail_pesanan` */

/*Table structure for table `tbl_detail_surat` */

DROP TABLE IF EXISTS `tbl_detail_surat`;

CREATE TABLE `tbl_detail_surat` (
  `id` int(10) NOT NULL,
  `id_surat` int(10) NOT NULL,
  `pengirim` varchar(65) NOT NULL,
  `ttd_pengirim` text NOT NULL,
  `penerima` varchar(65) NOT NULL,
  `kegiatan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_detail_surat` */

/*Table structure for table `tbl_guru` */

DROP TABLE IF EXISTS `tbl_guru`;

CREATE TABLE `tbl_guru` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nip` varchar(15) NOT NULL,
  `nama` varchar(65) NOT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `password2` text DEFAULT NULL,
  `pangkat` varchar(65) DEFAULT NULL,
  `golongan` varchar(65) DEFAULT NULL,
  `jabatan` varchar(65) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `lama_pengabdian` varchar(10) DEFAULT NULL,
  `instansi` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_guru` */

insert  into `tbl_guru`(`id`,`nip`,`nama`,`jk`,`no_hp`,`alamat`,`email`,`username`,`password`,`password2`,`pangkat`,`golongan`,`jabatan`,`tgl_lahir`,`lama_pengabdian`,`instansi`) values 
(1,'151','Shieldy','L','085678999000','Podorejo','shieldy@gmail.com','finggar','202cb962ac59075b964b07152d234b70','123','superuser','III A','Guru','1999-08-17','1 Tahun','MAN 2 Tulungagung'),
(2,'152','Vita','P','089888999000','Ngunut','vita@gmail.com','vita','202cb962ac59075b964b07152d234b70','123','operator','III A','Staf TU','1998-08-18','2 Tahun','MAN 2 Tulungagung'),
(3,'153','Agus','L','087777888666','Ngantru','agus@gmail.com','agus','202cb962ac59075b964b07152d234b70','123','katu','III A','Kepala TU','1809-08-22','5 Tahun','MAN 2 Tulungagung'),
(4,'154','Pak Dopir','L','086777555666','Pucanglaban','dopir@gmail.com','dopir','202cb962ac59075b964b07152d234b70','123','kamad','III A','Kepala Madrasah','1790-08-13','5 Tahun','MAN 2 Tulungagung'),
(5,'155','Edo','L','086777555666','Gondang','edo@gmail.com','edo','202cb962ac59075b964b07152d234b70','123','guru','III A','Guru','1990-08-11','3 Tahun','MAN 2 Tulungagung'),
(6,'156','Pak Patoni','L','086777555666','Tulungagung','patoni@gmail.com','patoni','202cb962ac59075b964b07152d234b70','123','guru','III A','Pejabat Pembuat Komitmen','1968-12-17','5 Tahun','MAN 2 Tulungagung');

/*Table structure for table `tbl_jurusan` */

DROP TABLE IF EXISTS `tbl_jurusan`;

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_jurusan` */

insert  into `tbl_jurusan`(`id_jurusan`,`nama`) values 
(1,'IPA'),
(2,'IPS');

/*Table structure for table `tbl_kelas` */

DROP TABLE IF EXISTS `tbl_kelas`;

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kelas` */

insert  into `tbl_kelas`(`id_kelas`,`nama`,`nama_kelas`) values 
(1,'X','spuluh'),
(2,'XI','sebelas'),
(3,'XII','dua belas');

/*Table structure for table `tbl_lampiran` */

DROP TABLE IF EXISTS `tbl_lampiran`;

CREATE TABLE `tbl_lampiran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `file` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_lampiran` */

insert  into `tbl_lampiran`(`id`,`id_surat`,`lampiran`,`file`) values 
(1,1,'1 lampiran','228254470_nota_dinas_MODUL_MATERI_COREL_DRAW_X7.pdf'),
(2,10,'1 lampiran','660777717_nota_dinas_1.PNG');

/*Table structure for table `tbl_prestasi` */

DROP TABLE IF EXISTS `tbl_prestasi`;

CREATE TABLE `tbl_prestasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) DEFAULT NULL,
  `prestasi` text DEFAULT NULL,
  `bidang` text DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_prestasi` */

/*Table structure for table `tbl_sekolah` */

DROP TABLE IF EXISTS `tbl_sekolah`;

CREATE TABLE `tbl_sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` text DEFAULT NULL,
  `npsn` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `kode_pos` int(5) DEFAULT NULL,
  `website` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_sekolah` */

insert  into `tbl_sekolah`(`id`,`nama_sekolah`,`npsn`,`alamat`,`telp`,`kode_pos`,`website`,`email`) values 
(1,'nama_sekolah','MA Negeri 2 Tulungag',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tbl_siswa` */

DROP TABLE IF EXISTS `tbl_siswa`;

CREATE TABLE `tbl_siswa` (
  `id` varchar(10) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `nama` varchar(65) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `nis` varchar(15) NOT NULL,
  `nama_wali` varchar(65) NOT NULL,
  `no_hp_wali` varchar(15) NOT NULL,
  `pekerjaan_wali` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_siswa` */

insert  into `tbl_siswa`(`id`,`nisn`,`nama`,`jk`,`tgl_lahir`,`no_hp`,`alamat`,`nis`,`nama_wali`,`no_hp_wali`,`pekerjaan_wali`,`username`,`password`) values 
('1','111222','Rika','P','2005-08-19','088999000999','Kampungdalem','123','Saipul','089999000999','Gali lobang','rika','');

/*Table structure for table `tbl_surat` */

DROP TABLE IF EXISTS `tbl_surat`;

CREATE TABLE `tbl_surat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `jenis` enum('berita_acara','nota_dinas','cuti_tahunan','permohonan_studi','surat_kuasa','sppd','surat_dispen','surat_skkb','surat_tugas','surat_balasan','surat_izin_kegiatan','surat_izin_penelitian','suket_pengganti_ijazah','suket_siswa','surat_mutasi_siswa_keluar','surat_mutasi_siswa_masuk','surat_panggilan','surat_pemberitahuan','surat_pengantar','surat_permohonan_narasumber','surat_pernyataan','surat_pesanan','surat_rekom_guru','surat_rekom_siswa','surat_undangan') DEFAULT NULL,
  `no_surat` varchar(65) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `tgl_pelaksanaan` date DEFAULT NULL,
  `tgl_pelaksanaan2` date DEFAULT NULL,
  `waktu` varchar(30) DEFAULT NULL,
  `tempat` text DEFAULT NULL,
  `kepada` varchar(100) DEFAULT NULL,
  `perihal` text DEFAULT NULL,
  `ttd_kamad` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tgl_pembuatan` date DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  `hapus` enum('y','n') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat` */

insert  into `tbl_surat`(`id`,`jenis`,`no_surat`,`hari`,`tgl_pelaksanaan`,`tgl_pelaksanaan2`,`waktu`,`tempat`,`kepada`,`perihal`,`ttd_kamad`,`keterangan`,`catatan`,`tgl_pembuatan`,`id_pemohon`,`hapus`) values 
(1,'nota_dinas','0188/00G10','senin','2022-09-05',NULL,'08:00 WIB','Aula','guru','upacara dinas','','upacara',NULL,'2022-09-06',5,'n'),
(2,'surat_kuasa','','',NULL,NULL,'','',NULL,'','','',NULL,NULL,5,'n'),
(3,'surat_kuasa','','',NULL,NULL,'','',NULL,'','','',NULL,'2022-09-07',5,'n'),
(4,'surat_kuasa','','',NULL,NULL,'','',NULL,'','','',NULL,'2022-09-07',5,'n'),
(5,'surat_kuasa','','',NULL,NULL,'','',NULL,'','','',NULL,'2022-09-07',5,'y'),
(6,'surat_kuasa','','',NULL,NULL,'','',NULL,'','','',NULL,'2022-09-07',5,'y'),
(7,'surat_kuasa','','',NULL,NULL,'','',NULL,'','','',NULL,'2022-09-09',1,'y'),
(8,'surat_kuasa','','',NULL,NULL,'','',NULL,'','','',NULL,'2022-09-09',5,'y'),
(9,'surat_kuasa','0199/00G30','',NULL,NULL,'','',NULL,'','','',NULL,'2022-09-09',5,'n'),
(10,'nota_dinas','','Senin','2022-09-21',NULL,'07:00 WIB','Lapangans','Malikss','Upacara','','Upacara bendera',NULL,'2022-09-09',5,'n'),
(11,'surat_kuasa','','',NULL,NULL,'','',NULL,'','','',NULL,'2022-09-09',5,'n'),
(14,'nota_dinas',NULL,'senin','2022-09-11',NULL,'08.00','Lapangan','Sef','-',NULL,'-',NULL,'2022-09-25',5,'n'),
(20,'berita_acara','d0112','rabu','2022-09-12',NULL,NULL,NULL,NULL,'<ol>\r\n	<li>masuk</li>\r\n	<li>masak</li>\r\n</ol>\r\n',NULL,NULL,NULL,'2022-09-25',5,'n'),
(21,'surat_kuasa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-26',5,'n'),
(22,'surat_kuasa','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-26',5,'n');

/*Table structure for table `tbl_surat_dispen` */

DROP TABLE IF EXISTS `tbl_surat_dispen`;

CREATE TABLE `tbl_surat_dispen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_detail_kelas` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_dispen` */

/*Table structure for table `tbl_surat_kuasa` */

DROP TABLE IF EXISTS `tbl_surat_kuasa`;

CREATE TABLE `tbl_surat_kuasa` (
  `id_surat_kuasa` int(10) NOT NULL AUTO_INCREMENT,
  `id_surat` int(10) DEFAULT NULL,
  `id_guru` int(10) DEFAULT NULL,
  `nip` varchar(60) DEFAULT NULL,
  `pemberi_kuasa` varchar(60) DEFAULT NULL,
  `pangkat` varchar(60) DEFAULT NULL,
  `jabatan_pemberi_kuasa` varchar(40) DEFAULT NULL,
  `instansi` varchar(60) DEFAULT NULL,
  `penerima_kuasa` varchar(60) DEFAULT NULL,
  `tempat_lahir` varchar(60) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jabatan_penerima_kuasa` varchar(60) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  PRIMARY KEY (`id_surat_kuasa`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_kuasa` */

insert  into `tbl_surat_kuasa`(`id_surat_kuasa`,`id_surat`,`id_guru`,`nip`,`pemberi_kuasa`,`pangkat`,`jabatan_pemberi_kuasa`,`instansi`,`penerima_kuasa`,`tempat_lahir`,`tanggal_lahir`,`jabatan_penerima_kuasa`,`ket`) values 
(1,NULL,NULL,'','finggar','','','','','','0000-00-00','',''),
(2,5,NULL,'011102010101010','finggar','guru','guru','man 2 tulungagung','dar','tulungagung','2000-10-31','guru','ospek siswa'),
(3,6,NULL,'132','agus','guru','guru','man','lila','tulungagung','2022-09-13','guru','upacara'),
(4,7,1,'151','Shieldy','III A','Guru','MAN 2 Tulungagung','Lita','Tulungagung','2022-09-15','Guru','Pelatih upacara'),
(5,8,5,'','','','','','Mika','Tulungagung','2022-09-08','Guru','Pelatih upacara'),
(6,9,5,'155','Edo','III A','Guru','MAN 2 Tulungagung','Mila Karmila','Tulungagung','2022-09-14','Guru','Pelatih Tari'),
(7,11,5,'155','Edo','III A','Guru','MAN 2 Tulungagung','Bunga','Kediri','2022-11-01','Katu','Petugas Tari'),
(8,21,5,'155','Edo','III A','Guru','MAN 2 Tulungagung','aku','tulu','2022-08-29','guru','-'),
(9,22,5,'155','Edo','III A','Guru','MAN 2 Tulungagung','akus','tulu','2022-09-13','guru','-');

/*Table structure for table `tbl_surat_kurikulum` */

DROP TABLE IF EXISTS `tbl_surat_kurikulum`;

CREATE TABLE `tbl_surat_kurikulum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_detail_kelas` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_kurikulum` */

/*Table structure for table `tbl_surat_pengantar` */

DROP TABLE IF EXISTS `tbl_surat_pengantar`;

CREATE TABLE `tbl_surat_pengantar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `naskah_dinas` text DEFAULT NULL,
  `banyak` varchar(15) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `id_penerima` int(11) DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `asal_kirim` text DEFAULT NULL,
  `nama_pengirim` text DEFAULT NULL,
  `nip_pengirim` text DEFAULT NULL,
  `no_tlp` varchar(50) DEFAULT NULL,
  `no_fax` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_pengantar` */

/*Table structure for table `tbl_surat_pernyataan` */

DROP TABLE IF EXISTS `tbl_surat_pernyataan`;

CREATE TABLE `tbl_surat_pernyataan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `nomor_surat` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tgl_terbit` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_pernyataan` */

/*Table structure for table `tbl_surat_rekom` */

DROP TABLE IF EXISTS `tbl_surat_rekom`;

CREATE TABLE `tbl_surat_rekom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_guru` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `nama_kampus` text DEFAULT NULL,
  `th_akademik` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_rekom` */

/*Table structure for table `tbl_surat_tugas` */

DROP TABLE IF EXISTS `tbl_surat_tugas`;

CREATE TABLE `tbl_surat_tugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_tugas` */

/*Table structure for table `tbl_tanda_tangan` */

DROP TABLE IF EXISTS `tbl_tanda_tangan`;

CREATE TABLE `tbl_tanda_tangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` enum('diterima','ditolak','belum','cek') DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tgl_proses` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_tanda_tangan` */

insert  into `tbl_tanda_tangan`(`id`,`id_surat`,`id_user`,`status`,`catatan`,`tgl_proses`) values 
(1,1,1,'cek',NULL,NULL),
(2,1,4,'diterima','','2022-09-09 20:52:54'),
(3,1,3,'diterima','','2022-09-09 20:52:23'),
(4,1,2,'diterima','','2022-09-09 20:51:58'),
(5,1,5,'diterima','','2022-09-06 21:59:54'),
(6,2,1,'belum',NULL,NULL),
(7,2,4,'belum',NULL,NULL),
(8,2,3,'belum',NULL,NULL),
(9,2,2,'belum',NULL,NULL),
(10,2,5,'cek',NULL,NULL),
(11,3,1,'belum',NULL,NULL),
(12,3,4,'belum',NULL,NULL),
(13,3,3,'belum',NULL,NULL),
(14,3,2,'belum',NULL,NULL),
(15,3,5,'cek',NULL,NULL),
(16,4,1,'belum',NULL,NULL),
(17,4,4,'belum',NULL,NULL),
(18,4,3,'belum',NULL,NULL),
(19,4,2,'belum',NULL,NULL),
(20,4,5,'cek',NULL,NULL),
(21,5,1,'belum',NULL,NULL),
(22,5,4,'belum',NULL,NULL),
(23,5,3,'belum',NULL,NULL),
(24,5,2,'belum',NULL,NULL),
(25,5,5,'cek',NULL,NULL),
(26,6,1,'belum',NULL,NULL),
(27,6,4,'belum',NULL,NULL),
(28,6,3,'belum',NULL,NULL),
(29,6,2,'belum',NULL,NULL),
(30,6,5,'cek',NULL,NULL),
(31,7,1,'belum',NULL,NULL),
(32,7,4,'belum',NULL,NULL),
(33,7,3,'belum',NULL,NULL),
(34,7,2,'belum',NULL,NULL),
(35,7,1,'cek',NULL,NULL),
(36,8,1,'belum',NULL,NULL),
(37,8,4,'belum',NULL,NULL),
(38,8,3,'belum',NULL,NULL),
(39,8,2,'belum',NULL,NULL),
(40,8,5,'cek',NULL,NULL),
(41,9,1,'cek',NULL,NULL),
(42,9,4,'diterima','Acc','2022-09-09 20:50:47'),
(43,9,3,'diterima','Betul','2022-09-09 20:16:01'),
(44,9,2,'diterima','Betul','2022-09-09 20:14:53'),
(45,9,5,'diterima','','2022-09-09 20:13:30'),
(46,10,1,'belum',NULL,NULL),
(47,10,4,'belum',NULL,NULL),
(48,10,3,'ditolak','kembali','2022-09-25 20:19:02'),
(49,10,2,'ditolak','salahh','2022-09-25 20:47:11'),
(50,10,5,'cek','','2022-09-25 20:46:12'),
(51,11,1,'belum',NULL,NULL),
(52,11,4,'belum',NULL,NULL),
(53,11,3,'belum',NULL,NULL),
(54,11,2,'belum',NULL,NULL),
(55,11,5,'cek',NULL,NULL),
(56,11,1,'belum',NULL,NULL),
(57,11,4,'belum',NULL,NULL),
(58,11,3,'belum',NULL,NULL),
(59,11,2,'belum',NULL,NULL),
(60,11,5,'cek',NULL,NULL),
(61,11,1,'belum',NULL,NULL),
(62,11,4,'belum',NULL,NULL),
(63,11,3,'belum',NULL,NULL),
(64,11,2,'belum',NULL,NULL),
(65,11,5,'cek',NULL,NULL),
(66,11,1,'belum',NULL,NULL),
(67,11,4,'belum',NULL,NULL),
(68,11,3,'belum',NULL,NULL),
(69,11,2,'belum',NULL,NULL),
(70,11,5,'cek',NULL,NULL),
(71,11,1,'belum',NULL,NULL),
(72,11,4,'belum',NULL,NULL),
(73,11,3,'belum',NULL,NULL),
(74,11,2,'belum',NULL,NULL),
(75,11,5,'cek',NULL,NULL),
(76,13,1,'belum',NULL,NULL),
(77,13,4,'belum',NULL,NULL),
(78,13,3,'belum',NULL,NULL),
(79,13,2,'belum',NULL,NULL),
(80,13,5,'cek',NULL,NULL),
(81,14,1,'belum',NULL,NULL),
(82,14,4,'belum',NULL,NULL),
(83,14,3,'belum',NULL,NULL),
(84,14,2,'belum',NULL,NULL),
(85,14,5,'cek',NULL,NULL),
(86,14,1,'belum',NULL,NULL),
(87,14,4,'belum',NULL,NULL),
(88,14,3,'belum',NULL,NULL),
(89,14,2,'belum',NULL,NULL),
(90,14,5,'cek',NULL,NULL),
(106,18,1,'belum',NULL,NULL),
(107,18,4,'belum',NULL,NULL),
(108,18,3,'belum',NULL,NULL),
(109,18,2,'belum',NULL,NULL),
(110,18,5,'cek',NULL,NULL),
(111,19,1,'belum',NULL,NULL),
(112,19,4,'belum',NULL,NULL),
(113,19,3,'belum',NULL,NULL),
(114,19,2,'belum',NULL,NULL),
(115,19,5,'cek',NULL,NULL),
(116,20,1,'belum',NULL,NULL),
(117,20,4,'belum',NULL,NULL),
(118,20,3,'cek',NULL,NULL),
(119,20,2,'diterima','sudha benar','2022-09-26 01:20:07'),
(120,20,5,'diterima','','2022-09-26 01:18:13'),
(121,21,1,'belum',NULL,NULL),
(122,21,4,'belum',NULL,NULL),
(123,21,3,'belum',NULL,NULL),
(124,21,2,'belum',NULL,NULL),
(125,21,5,'cek',NULL,NULL),
(126,22,1,'belum',NULL,NULL),
(127,22,4,'belum',NULL,NULL),
(128,22,3,'belum',NULL,NULL),
(129,22,2,'cek',NULL,NULL),
(130,22,5,'diterima','','2022-09-26 02:54:13');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

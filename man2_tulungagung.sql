/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.10-MariaDB-log : Database - man2_tulungagung
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
  `jk` varchar(1) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `pangkat` varchar(65) NOT NULL,
  `jabatan` varchar(65) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `lama_pengabdian` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_guru` */

insert  into `tbl_guru`(`id`,`nip`,`nama`,`jk`,`no_hp`,`alamat`,`email`,`username`,`password`,`pangkat`,`jabatan`,`tgl_lahir`,`lama_pengabdian`) values 
(1,'151','Shieldy','L','085678999000','Podorejo','shieldy@gmail.com','finggar','202cb962ac59075b964b07152d234b70','superuser','Guru','1999-08-17','1 Tahun'),
(2,'152','Vita','P','089888999000','Ngunut','vita@gmail.com','vita','202cb962ac59075b964b07152d234b70','operator','Staf TU','1998-08-18','2 Tahun'),
(3,'153','Agus','L','087777888666','Ngantru','agus@gmail.com','agus','202cb962ac59075b964b07152d234b70','katu','Kepala TU','1809-08-22','5 Tahun'),
(4,'154','Pak Dopir','L','086777555666','Pucanglaban','dopir@gmail.com','dopir','202cb962ac59075b964b07152d234b70','kamad','Kepala Madrasah','1790-08-13','5 Tahun'),
(5,'155','Edo','L','086666999777','Gondang','edo@gmail.com','edo','202cb962ac59075b964b07152d234b70','guru','Guru','1990-08-11','3 Tahun');

/*Table structure for table `tbl_lampiran` */

DROP TABLE IF EXISTS `tbl_lampiran`;

CREATE TABLE `tbl_lampiran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `file` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_lampiran` */

insert  into `tbl_lampiran`(`id`,`id_surat`,`lampiran`,`file`) values 
(1,14,'1 lampiran',''),
(2,15,'lampiran 1 halaman',''),
(3,16,'1 lampiran','');

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
  `jenis` enum('berita_acara','nota_dinas','cuti_tahunan','permohonan_study') NOT NULL,
  `no_surat` varchar(65) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `tgl_pelaksanaan` date DEFAULT NULL,
  `waktu` varchar(30) NOT NULL,
  `tempat` text NOT NULL,
  `kepada` varchar(100) DEFAULT NULL,
  `perihal` text NOT NULL,
  `ttd_kamad` text NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_pembuatan` date DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat` */

insert  into `tbl_surat`(`id`,`jenis`,`no_surat`,`hari`,`tgl_pelaksanaan`,`waktu`,`tempat`,`kepada`,`perihal`,`ttd_kamad`,`keterangan`,`tgl_pembuatan`,`id_pemohon`) values 
(1,'','','seninnnnn','2022-08-08','08:00 WIB','aulaaaaaaa','Pak Dopirrrrrrrr','Motorannnnnnn','','Balap motorrrrrrrrrr','2022-08-04',1),
(2,'','','seninnnnn','2022-08-08','08:00 WIB','aulaaaaaaa','Pak Dopirrrrrrrr','Motorannnnnnn','','Balap motorrrrrrrrrr','2022-08-04',1),
(3,'','','Selasa','2022-08-09','08:00 WIB','Aula Man','Bu Lina','Izin','','Meminjam Printer','2022-08-04',1),
(4,'','','Rabu','2022-08-10','08:00 WIB','Lapangan','Pak Dahlan','Izin keluar','','Peringatan','2022-08-04',1),
(5,'','','Selasa','2022-08-10','08:00 WIB','Aula','Bu Kalimah','Izin','','Izinnnnn','2022-08-04',1),
(6,'','','senin','2022-08-03','08:00 WIB','toko','Pak Mifta','Mobil','','Beli mobil','2022-08-04',1),
(14,'','','Rabu','2022-07-26','08:00 WIB','aula','Pak Ali','Izin','','Keluar','2022-08-04',1),
(15,'','','senin','2022-08-09','08:00 WIB','aula','Pak Dopir','Motoran','','Balap motor','2022-08-04',1),
(16,'','','Selasa','2022-08-08','08:00 WIB','MAN 2','Pak Finggar','Izin','','Izin','2022-08-04',1);

/*Table structure for table `tbl_tanda_tangan` */

DROP TABLE IF EXISTS `tbl_tanda_tangan`;

CREATE TABLE `tbl_tanda_tangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` enum('diterima','ditolak') DEFAULT NULL,
  `catatan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_tanda_tangan` */

insert  into `tbl_tanda_tangan`(`id`,`id_surat`,`id_user`,`status`,`catatan`) values 
(1,14,1,NULL,NULL),
(2,14,2,NULL,NULL),
(3,14,4,NULL,NULL),
(4,14,3,NULL,NULL),
(5,15,1,NULL,NULL),
(6,15,4,NULL,NULL),
(7,15,3,NULL,NULL),
(8,15,2,NULL,NULL),
(9,15,0,NULL,NULL),
(10,16,1,NULL,NULL),
(11,16,4,NULL,NULL),
(12,16,3,NULL,NULL),
(13,16,2,NULL,NULL),
(14,16,5,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

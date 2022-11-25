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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_berita_acara` */

/*Table structure for table `tbl_detail_kelas` */

DROP TABLE IF EXISTS `tbl_detail_kelas`;

CREATE TABLE `tbl_detail_kelas` (
  `id_detail_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `rombel` int(1) NOT NULL,
  PRIMARY KEY (`id_detail_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_detail_kelas` */

insert  into `tbl_detail_kelas`(`id_detail_kelas`,`id_kelas`,`id_jurusan`,`rombel`) values 
(1,1,7,1),
(2,1,7,2),
(3,1,7,3),
(4,1,7,4),
(5,1,7,5),
(6,1,7,6),
(7,1,7,7),
(8,1,7,8),
(9,1,7,9),
(10,1,7,10),
(11,1,7,11),
(12,1,8,0),
(13,2,4,1),
(14,2,4,2),
(15,2,4,3),
(16,2,4,4),
(17,2,4,5),
(18,2,5,1),
(19,2,5,2),
(20,2,5,3),
(21,2,5,5),
(22,2,6,1),
(23,2,8,0),
(24,3,4,1),
(25,3,4,2),
(26,3,4,3),
(27,3,4,4),
(28,3,4,5),
(29,3,5,1),
(30,3,5,2),
(31,3,5,3),
(32,3,5,4),
(33,3,6,0),
(34,3,9,0);

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
  `nip` varchar(20) NOT NULL,
  `nama` varchar(65) NOT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `password2` text DEFAULT NULL,
  `role` enum('superuser','kamad','katu','operator','guru','siswa') DEFAULT NULL,
  `pangkat` varchar(65) DEFAULT NULL,
  `pangkat_guru` varchar(65) DEFAULT NULL,
  `golongan` varchar(65) DEFAULT NULL,
  `jabatan` varchar(65) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `lama_pengabdian` varchar(10) DEFAULT NULL,
  `instansi` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_guru` */

insert  into `tbl_guru`(`id`,`nip`,`nama`,`jk`,`no_hp`,`alamat`,`email`,`username`,`password`,`password2`,`role`,`pangkat`,`pangkat_guru`,`golongan`,`jabatan`,`tempat_lahir`,`tgl_lahir`,`lama_pengabdian`,`instansi`) values 
(1,'196708011996031001','Shieldy','L','085678999000','Podorejo','shieldy@gmail.com','finggar','202cb962ac59075b964b07152d234b70','123','superuser','superuser','superuser','III A','Guru','Tulungagung','1999-08-17','1 Tahun','MAN 2 Tulungagung'),
(2,'152','NURVITA WULANDARI, S.Pd.','P','085736385938','Dsn. Ngampel, Ds. Joho, Kec. Kalidawir, Kab. Tulungagung','tavitanw19@gmail.com','nurvita','202cb962ac59075b964b07152d234b70','123','operator','operator','Operator Sekolah','III A','Staf TU','Tulungagung','1990-10-19','2 Tahun','MAN 2 Tulungagung'),
(3,'196812171998031001','MOH. PATONI, M.Pd.I','L','082301802624','RT. 02, RW. 01 , Sukoanyar.    Pakel.  Tulungagung','patoni_moh@yahoo.com','patoni','202cb962ac59075b964b07152d234b70','123','katu','katu','Kepala TU','III A','Kepala TU','Tulungagung','1968-12-17','5 Tahun','MAN 2 Tulungagung'),
(4,'196708011996031001','Drs. MUHAMAD DOPIR, M.Pd.I','L','081553737590','Dsm. Talapan RT/RW 01/05 Ds. Waung, Kec. Boyolangu, Kab. Tulungagung\r\n','muhamaddopir@gmail.com','dopir','202cb962ac59075b964b07152d234b70','123','kamad','kamad','Penata Tk.I','IV/b','Kepala Madrasah','Tulungagung','1967-08-01','-','MAN 2 Tulungagung'),
(5,'155','Edo','L','086777555666','Gondang','edo@gmail.com','edo','202cb962ac59075b964b07152d234b70','123','guru','guru','Guru','III A','Guru','Tulungagung','1990-08-11','3 Tahun','MAN 2 Tulungagung'),
(65,'196509131993031003','Drs. HADI MULYONO','L','-','RT 06 RW 01 , Ds. Wates, Kec. Campurdarat, Kab. Tulungagung','-','196509131993031003','202cb962ac59075b964b07152d234b70','123','guru','guru','Pembina Tk. I','IV/b','GURU','TULUNGAGUNG','1965-09-14','-','MAN 2 Tulungagung'),
(66,'196610211994121002','Drs. NANANG ASHARI','L','-','Mawar No 3 Perum Bolo Asri, Ds. Bolorejo, Kec. Kauman, Kab. Tulungagung','-','196610211994121002','202cb962ac59075b964b07152d234b70','123','guru','guru','Pembina Tk. I','IV/b','GURU','BLITAR','1966-10-22','-','MAN 2 Tulungagung'),
(67,'196706141995032002','Dra. YUNI LESTARI','P','081335641408','Jl Ki Mangunsarkoro IV / 7B, Ds. Beji, Kec. Boyolangu, Kab. Tulungagung','lestarimanduta@gmail.com','196706141995032002','202cb962ac59075b964b07152d234b70','123','guru','guru','Pembina Tk. I','IV/b','GURU','TRENGGALEK','1967-06-14','-','MAN 2 Tulungagung'),
(68,'196512191992031001','Drs. DARUNO ARIFIN','L','-','Jln. Sultan Agung, Ds. Ketanon, Kec. Kedungwaru, Kab. Tulungagung','-','196512191992031001','202cb962ac59075b964b07152d234b70','123','guru','guru','Pembina Tk. I','IV/b','GURU','TULUNGAGUNG','1965-12-20','-','MAN 2 Tulungagung'),
(69,'197005111996032001','ENDANG MINAWATI, S.Pd.','P','08125947921','Ds. Campurdarat, Kec. Campurdarat, Kab. Tulungagung','minawatiendang70@gmail.com','197005111996032001','202cb962ac59075b964b07152d234b70','123','guru','guru','Pembina Tk. I','IV/b','GURU','TULUNGAGUNG','1970-05-12','-','MAN 2 Tulungagung'),
(70,'196907231996032001','Dra. NUR TSALITS HAMIDAH','P','-',' Jl WR. SUPRATMAN 73  , Ds. Kenayan, Kec. Tulungagung, Kab. Tulungagung','-','196907231996032001','202cb962ac59075b964b07152d234b70','123','guru','guru','Pembina Tk. I','IV/b','GURU','TRENGGALEK','1969-07-24','-','MAN 2 Tulungagung'),
(71,'196606241997031001','Drs. MASKUR','L','-','RT 05 RW 02 Dusun Sumbersari,Ds. Tunggulsari Kec. Kedungwaru, Kab. Tulungagung','-','196606241997031001','202cb962ac59075b964b07152d234b70','123','guru','guru','Pembina ','IV/a','GURU','TULUNGAGUNG','1966-06-25','-','MAN 2 Tulungagung'),
(72,'196705071995032002','Dra. WINARNI','P','-','Patimura No. 72 RT. 02 RW. 07, Ds. Bendo, Kec. Gondang, Kab. Tulungagung','-','196705071995032002','202cb962ac59075b964b07152d234b70','123','guru','guru','Pembina','IV/a','GURU','TULUNGAGUNG','1967-07-06','-','MAN 2 Tulungagung'),
(73,'197709282003122003','NANIK NURAINI, S.Pd. , M.Pd.','P','-','Ds.Bangoan, Kec. Kedungwaru, Kab. Tulungagung','-','197709282003122003','202cb962ac59075b964b07152d234b70','123','guru','guru','Pembina','IV/a','GURU','TULUNGAGUNG','1977-07-29','-','MAN 2 Tulungagung'),
(74,'197309082005012002','YAYUK WINARTI, S.Pd. M.Pd.','P','087555555555','Jln. Pahlawan, Ds. Ketanon, Kec. Kedungwaru, Kab. Tulungagung','buyayukaksel@gmail.co.id','197309082005012002','202cb962ac59075b964b07152d234b70','123','guru','guru','Pembina','IV/a','GURU','TULUNGAGUNG','1973-09-08','-','MAN 2 Tulungagung'),
(75,'196907052005012003','TUMINAH, S.Pd.','P','-','Mastrip II/22 RT. 02 RW. 06, Ds. Jepun, Kec. Tulungagung, Kab. Tulungagung','-','196907052005012003','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Tk. I','III/d','GURU','TULUNGAGUNG','1969-05-08','-','MAN 2 Tulungagung'),
(76,'197107212005011007','TRI HANDOKO, S.Pd.','L','-','RT. 11 RW. 01, Ds. Sobontoro, Kec. Boyolangu, Kab. Tulungagung','-','197107212005011007','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Tk. I','III/d','GURU','TULUNGAGUNG','1971-07-22','-','MAN 2 Tulungagung'),
(77,'197207152006041027','NURYATIM HADI SAPUTRA, S.Pd.,M.Pd.','L','-','-','-','197207152006041027','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Tk. I','III/d','GURU','TULUNGAGUNG','1972-07-16','-','MAN 2 Tulungagung'),
(78,'197207182005012002','SITI NURHAYATI, S.Ag.','P','-','Ds. Bago, Kec. Tulungagung, Kab. Tulungagung','-','197207182005012002','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Tk. I','III/d','GURU','TULUNGAGUNG','1972-07-19','-','MAN 2 Tulungagung'),
(79,'197504072005011004','WILDAN DIYAUDDIN, S.Pd.','L','-','No. RT. 02 RW. 03, Ds. Tanen, Kec. Rejotangan, Kab. Tulungagung','-','197504072005011004','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Tk. I','III/d','GURU','TULUNGAGUNG','1975-07-05','-','MAN 2 Tulungagung'),
(80,'197310232005011002','ARIADI EKO SUSANTO, S.Pd.','L','-','Jl. Semeru 34 RT 003 RW 001, Ds. Kauman, Kec. Kauman, Kab. Tulungagung','-','197310232005011002','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Tk. I','III/d','GURU','TULUNGAGUNG','1973-10-24','-','MAN 2 Tulungagung'),
(81,'197805042006042037','ERNA DWI ANJARWATI, S.Pd.','P','-','Ds. Karangsono, Kec. Ngunut, Kab. Tulungagung','-','197805042006042037','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Tk. I','III/d','GURU','TULUNGAGUNG','1978-04-06','-','MAN 2 Tulungagung'),
(82,'198011262005012006','ERNI SRI SETIYANINGSIH, S.Pd.I.','P','-','Dusun Srigading RT 03 RW 01, Dsn. Plosokandang, Ds. Kedungwaru, Kab. Tulungagung','-','198011262005012006','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Tk. I','III/d','GURU','TULUNGAGUNG','1980-11-27','-','MAN 2 Tulungagung'),
(83,'198009032005012005','SUSTIANA RAHAYU, S.Pd.','P','-','Jl. Mangga, Ds. Kepuh, Kec. Boyolangu, Kab. Tulungagung','-','198009032005012005','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Tk. I','III/d','GURU','TULUNGAGUNG','1980-03-10','-','MAN 2 Tulungagung'),
(84,'198003132006042013','ENDAH WIDARTIN, S.Pd.','P','-','RT. 04 RW. 03, Ds. Ngebong, Kec. Pakel, Kab. Tulungagung','-','198003132006042013','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Tk. I','III/d','GURU','TULUNGAGUNG','1980-03-14','-','MAN 2 Tulungagung'),
(85,'197007152005012007','NURHIDAYAH, S.Pd., M.Si.','P','-','Dsn. Bakah RT/RW : 001/003, Ds. Mergayu, Kec. Bandung, Kab. Tulungagung','-','197007152005012007','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Tk. I','III/d','GURU','TULUNGAGUNG','1970-07-16','-','MAN 2 Tulungagung'),
(86,'197102012005011003','FEBRIYANTO, S.Pd.','L','-','Ikan Kerapu 4 No. 9 RT.002 RW. 003, Ds. Perak Barat, Kec. Krembangan, Kota Surabaya','-','197102012005011003','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Tk. I','III/d','GURU','PALEMBANG','1971-02-02','-','MAN 2 Tulungagung'),
(87,'196804132005011001','Drs. CUK HARI PURNAMA','L','-','Sanggrahan No. RT. 2 RW. 1, Ds. Sanggrahan, Kec. Boyolangu, Kab. Tulungagung','-','196804132005011001','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Tk. I','III/d','GURU','TULUNGAGUNG','1968-04-14','-','MAN 2 Tulungagung'),
(88,'196802102005011003','AKH. KHAERUL ULUM, S.Pd.','L','-','Ds. Plosokandang, Kec. Kedungwaru, Kab. Tulungagung','-','196802102005011003','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata','III/c','GURU','JEMBER','1968-02-11','-','MAN 2 Tulungagung'),
(89,'197811052007102001','DWI ASIH MUNDIROTUL LAILI, S.Ag','P','081357783451','Dusun  RT/RW : 01/01, Ds. Plosokandang, Kec. Kedungwaru, Kab. Tulungagung','lailiacy35@gmail.com','197811052007102001','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata','III/c','GURU','TULUNGAGUNG','1978-11-05','-','MAN 2 Tulungagung'),
(90,'197711042007102003','LUTHVI TRI HANDAYANI, S.Pd.','P','-','Nakeran, Ds. Pakisrejo, Kec. Rejotangan, Kab. Tulungagung','-','197711042007102003','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata','III/c','GURU','TULUNGAGUNG','1977-04-12','-','MAN 2 Tulungagung'),
(91,'197206022007102001','YUNIS HIDAYATI, M.Ag.','P','-','Ds. Wonorejo, Kec. Sumbergempol, Kab. Tulungagung','-','197206022007102001','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata','III/c','GURU','NGANJUK','1972-02-07','-','MAN 2 Tulungagung'),
(92,'197709032007102001','NUR ALIFAH, S.Pd.','P','085791462410','RT/TW ; 04/01 Krajan, Ds. Ngrendeng, Kec. Gondang, Kab. Tulungagung','nuralifahalsyaif@gmail.com','197709032007102001','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata','III/c','GURU','TULUNGAGUNG','1977-09-03','-','MAN 2 Tulungagung'),
(93,'196507092007011022','BIBIT PRAYOGA, S.Ag., M.Pd.','L','-','Dsn. Krajan, Ds. Bulus, Kec. Bandung, Kab. Tulungagung','-','196507092007011022','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata','III/c','GURU','TULUNGAGUNG','1965-09-08','-','MAN 2 Tulungagung'),
(94,'197503202007012017','SRI HANDAYANI, S.Pd.','P','-','Jl Dr Sutomo 3/34, Ds. Tertek, Kec. Tulungagung, Kab. Tulungagung','-','197503202007012017','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata','III/c','GURU','TULUNGAGUNG','1975-03-21','-','MAN 2 Tulungagung'),
(95,'196906162007012039','NURUL EKAWATI, S.Pd.','P','-','RT. 02 RW. 01, Ds. Wonoanti, Kec. Gandusari, Kab. Trenggalek','-','196906162007012039','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata','III/c','GURU','TULUNGAGUNG','1969-07-17','-','MAN 2 Tulungagung'),
(96,'197209212007012019','YANTI YUNIARTI, S.Pd.','P','-','Ds. Jabalsari, Kec. Sumbergempol, Kab. Tulungagung','-','197209212007012019','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata','III/c','GURU','CIANJUR','1972-09-22','-','MAN 2 Tulungagung'),
(97,'197107122007012028','YULI ERNAWATI, S.Pd.','P','-','Ds. Jabalsari, Kec. Sumbergempol, Kab. Tulungagung','-','197107122007012028','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata','III/c','GURU','TULUNGAGUNG','1971-07-13','-','MAN 2 Tulungagung'),
(98,'197503132007102004','DIYAH ISTIANTI, S.Pd.','P','-','Dsn. Jambu Rt. 03 Rw. 02, Ds. Pelem, Kec. Campurdarat, Kab. Tulungagung','-','197503132007102004','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata','III/c','GURU','SEMARANG','1975-03-14','-','MAN 2 Tulungagung'),
(99,'198011112007102005','ELOK KURNIA SARI, S.Pd.','P','-','Ds. Birowo, Kec. Binangun, Kab. Blitar','-','198011112007102005','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata','III/c','GURU','BLITAR','1980-11-12','-','MAN 2 Tulungagung'),
(100,'196908222007011031','INDRO SEMBODO, S.S.','L','-','Ds. Tiudan,Kec. Gondang, Kab. Tulungagung','-','196908222007011031','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata','III/c','GURU','TULUNGAGUNG','1969-08-23','-','MAN 2 Tulungagung'),
(101,'198010052007101004','MASROHUDDAROINI, S.Pd.I  ','L','-','I Gusti Ngurah Rai IV/5, Ds. Bago, Kec. Tulungagung, Kab. Tulungagung','-','198010052007101004','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata','III/c','GURU','TULUNGAGUNG','1980-05-11','-','MAN 2 Tulungagung'),
(102,'196503062014111001','MOHAMMAD, S.Pd.','L','-','Dsn Bayanan RT/RW : 01/02, Ds. Wajak Lor, Kec. Boyolangu, Kab. Tulungagung','-','196503062014111001','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Muda','III/a','GURU','TULUNGAGUNG','1965-06-04','-','MAN 2 Tulungagung'),
(103,'198609152019031012','NANANG SETYAWAN, S.Pd','L','-','Dusun Sidomulyo, RT.02 / RW.02, , Ds. Sepanjang, Kec. Glenmore, Kab. Banyuwangi','-','198609152019031012','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Muda','III/a','GURU','BANYUWANGI','1986-09-16','-','MAN 2 Tulungagung'),
(104,'199301232019032020','NANDA CHOLISTIANA, S.Pd.I','P','-','Dsn. Sekardangan, RT 001/ RW 008, Ds. Papungan, Kec. Kanigoro, Kba. Blitar','-','199301232019032020','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Muda','III/a','GURU','BLITAR','1993-01-24','-','MAN 2 Tulungagung'),
(105,'199103272019031010','ADI BUDI WIRANATA, S.Pd','L','-','Dusun Al Fatah RT 1 RW 1, Ds. Ngendingan, Kec. Kedungwaru, Kab. Tulungagung','-','199103272019031010','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Muda','III/a','GURU','MAGETAN','1991-03-28','-','MAN 2 Tulungagung'),
(106,'199106222019032018','VIVI NUR AINIYAH, S.Pd','P','-','Jl. Santren Dusun Ngampel, RT 13 RW02 No.28 , Ds. Tanjungsari, Kec. Taman, Kab. Sidoarjo','-','199106222019032018','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Muda','III/a','GURU','SIDOARJO','1991-06-23','-','MAN 2 Tulungagung'),
(107,'199505202019032026','AYUNINGRUM MEI NUSANTARI, S.Pd','P','081336216630','Jl Gelora, Dsn. Jurangawan, RT/RW 10/02, Ds. Duwet, Kec. Bendo, Kab. Magetan','ayunusantary20@gmail.com','199505202019032026','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Muda','III/a','GURU','MAGETAN','1995-05-21','-','MAN 2 Tulungagung'),
(108,'199102172019032012','MEGA KUSUMANINGTIAS, S.Pd','P','-','Perum.Villa Gajah Mada Blok G.16 RT/RW: 005/003, Ds. Singonegaraan, Kec. Banyuwangi, Kab. Banyuwangi','-','199102172019032012','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Muda','III/a','GURU','BANYUWANGI','1991-02-18','-','MAN 2 Tulungagung'),
(109,'196305222022212001','MUSLIMAH, S.Pd','P','-','-','-','196305222022212001','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Muda','III/a','GURU','TULUNGAGUNG','1963-05-23','-','MAN 2 Tulungagung'),
(110,'197002102022211007','KHUDORI, S.Ag','L','-','-','-','197002102022211007','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Muda','III/a','GURU','TULUNGAGUNG','1970-02-11','-','MAN 2 Tulungagung'),
(111,'198007052007012024','MASIYAH, S.Pd.I., M.M','P','-','Dsn Doro payung RT/RW ; 003/001 , Ds. Doroampel, Kec. Sumbergempol, Kab. Tulungagung','-','198007052007012024','202cb962ac59075b964b07152d234b70','123','guru','guru','Penata Tk. I','III/d','PEGAWAI TATA USAHA','TULUNGAGUNG','1980-05-08','-','MAN 2 Tulungagung'),
(112,'197106072007102002','TITIK MUNDIAYATIN','P','-','Dsn Gambrengan RT/RW ; 004/002, Ds. Sidomulyo, Kec. Gondang, Kab. Tulungagung ','-','197106072007102002','202cb962ac59075b964b07152d234b70','123','guru','guru','Pengatur Tk. I','II/d','PEGAWAI TATA USAHA','TULUNGAGUNG','1971-07-07','-','MAN 2 Tulungagung'),
(113,'197905082009011006','KHOIRUL ANAM','L','-','Dusun Putuk RT/RW : 001/001, Ds. Kepuh, Kec. Boylangu, Kab. Tulungagung','-','197905082009011006','202cb962ac59075b964b07152d234b70','123','guru','guru','Pengatur Tk. I','II/d','PEGAWAI TATA USAHA','KEDIRI','1979-05-09','-','MAN 2 Tulungagung');

/*Table structure for table `tbl_jurusan` */

DROP TABLE IF EXISTS `tbl_jurusan`;

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_jurusan` */

insert  into `tbl_jurusan`(`id_jurusan`,`nama`) values 
(4,'MIPA'),
(5,'IPS'),
(6,'BAHASA'),
(7,'-'),
(8,'PK'),
(9,'AGAMA');

/*Table structure for table `tbl_kelas` */

DROP TABLE IF EXISTS `tbl_kelas`;

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kelas` */

insert  into `tbl_kelas`(`id_kelas`,`nama`,`nama_kelas`) values 
(1,'X','sepuluh'),
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
(1,2,'1 Lembar','1780287125_nota_dinas_INFORMATIKA-BS-KLS X (1).pdf'),
(2,4,'1 lembar','626081658_nota_dinas_IMG-20221102-WA0049.jpg');

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
(1,'MA Negeri 2 Tulungagung','20584790','Jl. Ki Mangun Sarkoro, Dusun Krajan, Beji, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66233\r\n','(0355) 321817',66233,'man2-tulungagung.sch.id','manduatulungagung@gmail.com');

/*Table structure for table `tbl_siswa` */

DROP TABLE IF EXISTS `tbl_siswa`;

CREATE TABLE `tbl_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nisn` varchar(15) DEFAULT NULL,
  `nis` varchar(15) DEFAULT NULL,
  `id_detail_kelas` int(11) DEFAULT NULL,
  `nama` varchar(65) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nama_wali` varchar(65) DEFAULT NULL,
  `no_hp_wali` varchar(15) DEFAULT NULL,
  `pekerjaan_wali` varchar(25) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `no_hp_ibu` varchar(15) DEFAULT NULL,
  `pekerjaan_ibu` varchar(25) DEFAULT NULL,
  `satdik` varchar(10) DEFAULT NULL,
  `jml_saudara` int(2) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `role` enum('siswa') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=317 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_siswa` */

insert  into `tbl_siswa`(`id`,`nisn`,`nis`,`id_detail_kelas`,`nama`,`jk`,`tempat_lahir`,`tgl_lahir`,`no_hp`,`alamat`,`nama_wali`,`no_hp_wali`,`pekerjaan_wali`,`nama_ibu`,`no_hp_ibu`,`pekerjaan_ibu`,`satdik`,`jml_saudara`,`username`,`password`,`role`) values 
(1,'0066562595','-',1,'Khoiruz Zuhriah','P','Tulungagung','2006-05-31','0','TENGGONG TENGGONG, REJOTANGAN, TULUNGAGUNG, JAWA TIMUR, 66293, 66293','MUHAMMAD RO\'I','-','-','SITI FATIMAH','-','-','SMA',0,'0066562595','202cb962ac59075b964b07152d234b70','siswa'),
(2,'0065000068','-',1,'Salsabilla Gusnita Nur Wahidiyati','P','Tulungagung','2006-08-08','6282244115859','JL. RAYA PAGERWOJO RT.04 RW.02 SAMAR, PAGERWOJO, TULUNGAGUNG, JAWA TIMUR, 66262, 66262','ADI SUPENO','-','-','ERWIN LILA ANJARI','-','-','SMA',0,'0065000068','202cb962ac59075b964b07152d234b70','siswa'),
(3,'0064985089','-',1,'Much Akbar Andhika Putra','L','Tangerang','2006-12-26','6281914802697','DSN GEMPOLAN RT 04 RW 02 KETANON, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66226, 66226','SITI MUNAWAROH','-','-','SITI MUNAWAROH','-','-','SMA',0,'0064985089','202cb962ac59075b964b07152d234b70','siswa'),
(4,'0071046205','-',1,'Akmal Zaim Yafi\' Artanto','L','Tulungagung','2007-04-06','6285785051840','DSN. BAKALAN RT/RW. 004/001 JARAKAN, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','WARSITO','-','-','TANTRI ASMIATIN','-','-','SMA',0,'0071046205','202cb962ac59075b964b07152d234b70','siswa'),
(5,'0068536852','-',1,'Abdul Aziz Al Hakim','L','Tulungagung','2006-11-26','6281234724220','DSN. BLIMBING RT 001 RW 001 NGRANTI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66271, 66271','MUNAWAR','-','-','LULUK INDRAWATI','-','-','SMA',0,'0068536852','202cb962ac59075b964b07152d234b70','siswa'),
(6,'0073233960','-',1,'Elok Tri Wulandari','P','Tulungagung','2007-03-03','6285855272537','DSN. SRIGADING , RT003/RW002 PLOSOKANDANG, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66221, 66221','TRI WULAN SANTOSA','-','-','SRI UTAMI','-','-','SMA',0,'0073233960','202cb962ac59075b964b07152d234b70','siswa'),
(7,'0079099776','-',1,'Janita Syafa Famela','P','Tulugagung','2007-01-05','628993995012','JL. DR SUTOMO RT.03 RW.04 KARANGWARU, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66217, 66217','MUSIJAN','-','-','INDRA NOVIATI','-','-','SMA',0,'0079099776','202cb962ac59075b964b07152d234b70','siswa'),
(8,'0061881483','-',1,'Jasnita Sheila Ardani','P','Tulungagung','2006-11-21','6289505839151','DESA GESIKAN, DUSUN KEDUNGDOWO RT 01/RW01, KEC.PAKEL, KAB.TULUNGAGUNG GESIKAN, PAKEL, TULUNGAGUNG, JAWA TIMUR, 66273, 66273','KARSUN','-','-','SUSIANI EKO WIDARWATI','-','-','SMA',0,'0061881483','202cb962ac59075b964b07152d234b70','siswa'),
(9,'0077753435','-',1,'Muhammad Akbar Nazwar','L','Balikpapan','2007-03-08','6287861541253','RT 03 RW 08, BATANGSAREN KAUMAN, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66261, 66261','Basni Asfian','-','-','NURLAILA','-','-','SMA',0,'0077753435','202cb962ac59075b964b07152d234b70','siswa'),
(10,'0066371313','-',1,'Muhammad Naufal Idlaal Yassar','L','Tulungagung','2006-11-21','6289654537807','PERUM GRIYA RINGIN AGUNG B1 RINGINPITU, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66229, 66229','SUBUR','-','-','FARIDA YULIANTI','-','-','SMA',0,'0066371313','202cb962ac59075b964b07152d234b70','siswa'),
(11,'0073473080','-',1,'Muhammad Shelgi Brilliant Yanuarta','L','Blitar','2007-01-09','6282229907070','JL.RAYA GANDEKAN RT/RW 01/04 GANDEKAN, WONODADI, BLITAR, JAWA TIMUR, 66155, 66155','Naim Sugeng Mardiono','-','-','SULASTRI PURBORINI','-','-','SMA',0,'0073473080','202cb962ac59075b964b07152d234b70','siswa'),
(12,'0064276014','-',1,'Rahma Syifa\'un Nisak','P','Tulungagung','2006-11-03','6285790210155','DSN. KRAJAN, RT/RW. 001/002 SUKOANYAR, PAKEL, TULUNGAGUNG, JAWA TIMUR, 66273, 66273','AHMAT SAEFULLAH','-','-','SUNIFAH','-','-','SMA',0,'0064276014','202cb962ac59075b964b07152d234b70','siswa'),
(13,'0064296107','-',1,'Tahta Narendrawati Firdausi','P','Tulungagung','2006-05-29','6285749955829','DSN. PEKEL RT/RW. 001/001 PAKEL, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66252, 66252','M. MAFRUHAN CH','-','-','ARI SETIANI','-','-','SMA',0,'0064296107','202cb962ac59075b964b07152d234b70','siswa'),
(14,'0073787118','-',1,'Yasmine Qusnu Adelia','P','Tulungagung','2007-04-05','6281217051177','JL.ADE IRMA SURYANI (RT.03/RW.04) SEMBUNG, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66219, 66219','MEI YUSIANTO','-','-','NOVI HESTINAWATI','-','-','SMA',0,'0073787118','202cb962ac59075b964b07152d234b70','siswa'),
(15,'0075185319','-',1,'Aisyah Shinta Balqis','P','Tulungagung','2007-04-06','6282331760955','DSN. KRAJAN, RT 004 RW 002, DS. GONDOSULI, KEC. GONDANG, KAB. TULUNGAGUNG GONDOSULI, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','AGUS SUPRAPTO','-','-','NURUL KOIRIYAH','-','-','SMA',0,'0075185319','202cb962ac59075b964b07152d234b70','siswa'),
(16,'0072069024','-',1,'Fidya Qonita Rosyida','P','Tulungagung','2007-08-15','6283194356170','RT 06 RW 02, DS. SAWO KEC. CAMPURDARAT KAB. TULUNGAGUNG SAWO, CAMPURDARAT, TULUNGAGUNG, JAWA TIMUR, 66272, 66272','SUKARJI','-','-','KARTINI','-','-','SMA',0,'0072069024','202cb962ac59075b964b07152d234b70','siswa'),
(17,'0062463557','-',1,'Hasna Nabila Zahra','P','Tulungagung','2006-07-22','6289509848798','RT 2 RW 7 DUSUN KARANGREJO, DESA KARANGREJO, KECAMATAN BOYOLANGU, KABUPATEN TULUNGAGUNG KARANGREJO, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66271, 66271','WAJIR','-','-','HENI RAHMAWATI','-','-','SMA',0,'0062463557','202cb962ac59075b964b07152d234b70','siswa'),
(18,'0075964076','-',1,'Ikhsania Syifa Aulia','P','Tulungagung','2007-03-30','6285850193848','DUSUN TAMBAK DUWET, RT 03/RW 02, DESA TAMBAKREJO, KEC. SUMBERGEMPOL, KAB. TULUNGAGUNG TAMBAKREJO, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','MARYUDI','-','-','SITI MU\'ALIMAH','-','-','SMA',0,'0075964076','202cb962ac59075b964b07152d234b70','siswa'),
(19,'0075383199','-',1,'Khosyi\' Naifah Asmawati','P','Tulungagung','2007-03-21','6281931618562','DS. WAJAK LOR RT/03 RW/02 KEC. BOYOLANGU KAB. TULUNGAGUNG WAJAK LOR, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66235, 66235','ENDANG PURWATI','-','-','ENDANG PURWATI','-','-','SMA',0,'0075383199','202cb962ac59075b964b07152d234b70','siswa'),
(20,'0061253227','-',1,'Muhammad Faiqul Umam','L','Tulungagung','2006-11-06','6285763700207','DESA GONDOSULI, GONDANG, TULUNGAGUNG GONDOSULI, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','MUALIM','-','-','TUTIK WIDARSIH','-','-','SMA',0,'0061253227','202cb962ac59075b964b07152d234b70','siswa'),
(21,'0061863692','-',1,'Rusyda Nur\'aini','P','Tulungagung','2006-05-18','6282334977967','JABALSARI, SUMBERGEMPOL, TULUNGAGUNG JABALSARI, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','TAUFIKU ROHMAN','-','-','NITA MARDIANA PRIHATIN','-','-','SMA',0,'0061863692','202cb962ac59075b964b07152d234b70','siswa'),
(22,'0068182410','-',1,'Dzaky Ahmad Ramadhan','L','Trenggalek','2006-10-11','6285204285940','RT2 RW 1 DESA KARANGAN KEC  KARANGAN KARANGAN, KARANGAN, TRENGGALEK, JAWA TIMUR, 66361, 66361','ADI PURWANTO','-','-','RISTINA ANGGARASIWI','-','-','SMA',0,'0068182410','202cb962ac59075b964b07152d234b70','siswa'),
(23,'0064995308','-',1,'Elok Rahma Ramadhani Cellomita','P','Tulungagung','2006-06-10','6285730261035','DSN. KARANGGAYAM RT/RW. 001/002 WAJAK LOR, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66271, 66271','ANDRI KRISTANTO','-','-','SITI KOMSIYAH','-','-','SMA',0,'0064995308','202cb962ac59075b964b07152d234b70','siswa'),
(24,'0077632949','-',1,'Farel Biyke Firansyah','L','Tulungagung','2007-05-14','6281805544598','DSN TAMANAN, RT.03 RW. 01 DS. SUKOWIYONO, KEC. KARANGREJO SUKOWIYONO, KARANGREJO, TULUNGAGUNG, JAWA TIMUR, 66253, 66253','ELI ERMAWATI','-','-','ELI ERMAWATI','-','-','SMA',0,'0077632949','202cb962ac59075b964b07152d234b70','siswa'),
(25,'0064023331','-',1,'Kimwi Baihaqi Harkansas','L','Tulungagung','2006-09-20','6285790272421','DUSUN JATIREJO RT 02 RW 01 DESA TENGGUR TENGGUR, REJOTANGAN, TULUNGAGUNG, JAWA TIMUR, 66293, 66293','ARMADA HARKANSAS','-','-','RATNA PRILIYANTI','-','-','SMA',0,'0064023331','202cb962ac59075b964b07152d234b70','siswa'),
(26,'0065738247','-',1,'Nilna Ainnatasya Nur Azizah','P','Tulungagung','2006-08-09','6285655803191','RT/RW : 002/009, DSN. BANGUNSARI, DS. SUKOREJO WETAN, REJOTANGAN,TULUNGAGUNG SUKOREJO WETAN, REJOTANGAN, TULUNGAGUNG, JAWA TIMUR, 66293, 66293','WARIS SUSILO','-','-','BIBIT YUSNIA','-','-','SMA',0,'0065738247','202cb962ac59075b964b07152d234b70','siswa'),
(27,'0068087194','-',1,'Lailatul Maghfiroh','P','Tulungagung','2006-06-25','6281515462128','DSN. SADAR RT 2/RW 2, DS. BENDILJATI KUNON, KEC. SUMBERGEMPOL, KAB. TULUNGAGUNG. BENDILJATI KULON, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','SUTIKNO','-','-','NURUL \'AINI','-','-','SMA',0,'0068087194','202cb962ac59075b964b07152d234b70','siswa'),
(28,'0066417705','-',1,'Mohamad Fari\' Nur Fikri','L','Tulungagung','2006-04-26','6285856954037','DSN. KRAJAN 3 RT.01/RW.05 BETAK KALIDAWIR BETAK, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','SLAMET DAROINI','-','-','KUSNUL KHOTIMAH','-','-','SMA',0,'0066417705','202cb962ac59075b964b07152d234b70','siswa'),
(29,'0062344797','-',1,'Zahra Nurrokhimatus Sholikah','P','Tulungagung','2006-02-02','6285731392658','RT 01 RW 10 DS. TUNGGANGRI KEC. KALIDAWIR TUNGGANGRI, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','NUR ROKHIM','-','-','ISTIKAROH','-','-','SMA',0,'0062344797','202cb962ac59075b964b07152d234b70','siswa'),
(30,'0063886737','-',1,'Muhamad Maulana Jupantoro','L','Blitar','2006-11-28','6281358845253','PUCUNG PUCUNG LOR, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66252, 66252','MOH BUCHORI','-','-','MAWADDATUS SHOLEKAH','-','-','SMA',0,'0063886737','202cb962ac59075b964b07152d234b70','siswa'),
(31,'0055741795','-',1,'Muhammad Aziz Syukron','L','Trenggalek','2006-07-27','6285642060441','DUSUN KARANGTUWO, RT/RW : 001/001 GEMAHARJO, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','SUTARJI','-','-','SUPINAH','-','-','SMA',0,'0055741795','202cb962ac59075b964b07152d234b70','siswa'),
(32,'0072634005','-',1,'Muhammad Hafizh Faiqunnabil','L','Trenggalek','2007-04-11','6282132377147','RT 2 RW 1 SEMARUM, DURENAN SEMARUM, DURENAN, TRENGGALEK, JAWA TIMUR, 66381, 66381','IMAM TOWALI','-','-','SITI JUWARIYAH','-','-','SMA',0,'0072634005','202cb962ac59075b964b07152d234b70','siswa'),
(33,'0073853783','-',1,'Nazahra Auerella Gafandi','P','Tulungagung','2006-09-26','6285780172657','NGEPOH NGEPOH, TANGGUNGGUNUNG, TULUNGAGUNG, JAWA TIMUR, 66283, 66283','AFENDI','-','-','RIRIN DWI GAYANTI','-','-','SMA',0,'0073853783','202cb962ac59075b964b07152d234b70','siswa'),
(34,'0065459024','-',1,'Rachma Aprilia Nur\'aini','P','Trenggalek','2006-04-02','6287887253778','DSN SEMARUM RT 006 RW 002 SEMARUM, DURENAN, TRENGGALEK, JAWA TIMUR, 66381, 66381','SUPRIYANTO','-','-','YUNIATUN','-','-','SMA',0,'0065459024','202cb962ac59075b964b07152d234b70','siswa'),
(35,'0071126455','-',1,'Nabila Safiatul Khusniah','P','Tulungagung','2007-03-10','6281358967487','RT 03 RW 03 DUSUN KUDUSAN PLOSOKANDANG, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66221, 66221','KHUSNI ARIF MUSTOFA','-','-','SITI KHUSNIAH','-','-','SMA',0,'0071126455','202cb962ac59075b964b07152d234b70','siswa'),
(36,'0074128551','-',1,'Fa\'iq Fahlewvy Rafa Wicaksa','L','Tulungagung','2007-06-14','628819848066','JL. RAYA DOROPAYUNG RT3 RW2 DOROAMPEL, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','SULISTYO BUDI','-','-','SITI ROSYIDAH','-','-','SMA',0,'0074128551','202cb962ac59075b964b07152d234b70','siswa'),
(37,'0074194553','-',2,'Khusniyaturrobithoh','P','Tulungagung','2007-06-18','6285737420586','DESA BANTENGAN BANTENGAN, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','SURURI','-','-','SOFIATUROHMI','-','-','',0,'0074194553','202cb962ac59075b964b07152d234b70','siswa'),
(38,'0072790909','-',2,'Intan Puji Astuti','P','Kediri','2007-05-07','6285693446811','JALAN RAYA  DESA JATI RT/RW. 04/02 JATI, UDANAWU, BLITAR, JAWA TIMUR, 66154, 66154','EFENDI ROHMAD HARI SUBAGYO','-','-','SITI CHUSZAIMAH','-','-','',0,'0072790909','202cb962ac59075b964b07152d234b70','siswa'),
(39,'0074058022','-',2,'Zahratul Amalia Fadhilah','P','Tulungagung','2007-03-22','6285736576797','DSN. DONOREJO, JAYENG KUSUMA RT 003/RW 004 TAPAN, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66251, 66251','DIDIK SUTIKNO','-','-','SITI MASLAMAH','-','-','',0,'0074058022','202cb962ac59075b964b07152d234b70','siswa'),
(40,'0072020517','-',2,'Adistya Putri Algareta','P','Tulungagung','2007-03-27','628993525478','DSN. DADAPAN RT/RW. 001/001, BOYOLANGU BOYOLANGU, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66271, 66271','GAGAT SETIAWAN','-','-','NUR ALIMAH','-','-','',0,'0072020517','202cb962ac59075b964b07152d234b70','siswa'),
(41,'0067732803','-',2,'Afinda Jannatul Makwa','P','Tulungagung','2006-09-17','62895330199732','DSN. SODO, RT/RW. 001/001 SODO, PAKEL, TULUNGAGUNG, JAWA TIMUR, 66273, 66273','MAMAT','-','-','YUNI','-','-','',0,'0067732803','202cb962ac59075b964b07152d234b70','siswa'),
(42,'0063854868','-',2,'Anindya Pramesti Caya Regita','P','Tulungagung','2006-08-03','6281556508982','PURI JEPUN PERMAI 1 NO. 39, JL. MASTRIP, RT. 04/RW. 05 JEPUN, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66218, 66218','DWIKO PRIYO UTOMO','-','-','WARDANI','-','-','',0,'0063854868','202cb962ac59075b964b07152d234b70','siswa'),
(43,'0062445425','-',2,'Difa Aulia Nurzahra','P','Tulungagung','2006-05-03','6281231084353','DUSUN SRIGADING, DESA PLOSOKANDANG RT/RW. 001/001 PLOSOKANDANG, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66221, 66221','MOH. ARFAN WURYANDITO','-','-','SUGIASTUTIK','-','-','',0,'0062445425','202cb962ac59075b964b07152d234b70','siswa'),
(44,'0071717609','-',2,'Maulida Nur Hamidah','P','Tulungagung','2007-04-18','6281338814716','DSN. GEMPOLAN, RT/RW. 003/001, JLN.SULTAN AGUNG KETANON, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66226, 66226','DARUNO ARIFIN','-','-','ISROATUL MU\'ADAH','-','-','',0,'0071717609','202cb962ac59075b964b07152d234b70','siswa'),
(45,'0066497307','-',2,'Dina Ramadhani','P','Tulungagung','2006-10-02','6283846844331','PRINGGODANI, RT. 02/RW.01 KARANGREJO, KARANGREJO, TULUNGAGUNG, JAWA TIMUR, 66253, 66253','NURHADI','-','-','HAMIMAH','-','-','',0,'0066497307','202cb962ac59075b964b07152d234b70','siswa'),
(46,'0071388443','-',2,'Filzah Nayla Prastiti','P','Tulungagung','2007-07-09','6287751952524','JL. KI MANGUN SARKORO, BEJI, BOYOLANGU, KABUPATEN TULUNGAGUNG, JAWA TIMUR 66233 BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','ARIF SUJATMIKO','-','-','LUSIANA HIDAYAH','-','-','',0,'0071388443','202cb962ac59075b964b07152d234b70','siswa'),
(47,'0062059546','-',2,'Muhamad Bachtiar Aryo Nugroho','L','Tulungagung','2006-05-03','6285607907384','DSN. DENOK RT/RW. 014/003, KARANGREJO JELI, KARANGREJO, TULUNGAGUNG, JAWA TIMUR, 66253, 66253','WARDOYO','-','-','ANIS RAHMAWATI','-','-','',0,'0062059546','202cb962ac59075b964b07152d234b70','siswa'),
(48,'0078302727','-',2,'Genia Nadia Pratiwi','P','Tulungagung','2007-11-12','6285646440588','PERUM SOBONTORO INDAH, BLK. G NO.2, RT 01/RW 005, KEDUNGINDAH, RINGINPITU, KEC. KEDUNGWARU SOBONTORO, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66232, 66232','NIKEN WULANDARI','-','-','NIKEN WULANDARI','-','-','',0,'0078302727','202cb962ac59075b964b07152d234b70','siswa'),
(49,'0067117462','-',2,'Pranowo Adi Supomo','L','Tulungagung','2006-07-13','6281232857750','TULUNGAGUNG PERMAI I/13 SOBONTORO, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66232, 66232','SUPOMO','-','-','TRI NARLIS','-','-','',0,'0067117462','202cb962ac59075b964b07152d234b70','siswa'),
(50,'003070173454','-',2,'Anggun Aulia Kirani','P','Tulungagung','2007-03-26','6283851291422','DSN. TLUSUNG RT. 021 RW. 004, DS. JELI, KEC. KARANGREJO, KAB. TULUNGAGUNG JELI, KARANGREJO, TULUNGAGUNG, JAWA TIMUR, 66253, 66253','HARSONO','-','-','ISANAH','-','-','',0,'003070173454','202cb962ac59075b964b07152d234b70','siswa'),
(51,'003066762839','-',2,'Nadin Devianur','P','Kediri','2006-09-20','6287842106568','DSN. NGADI RT.001 RW. 003, DS. NGADI, KEC. MOJO, KAB. KEDIRI NGADI, MOJO, KEDIRI, JAWA TIMUR, 64162, 64162','SULIANI NINGSIH','-','-','SULIANI NINGSIH','-','-','',0,'003066762839','202cb962ac59075b964b07152d234b70','siswa'),
(52,'0057242114','-',2,'Devi Anggun Puspita Sari','P','Tulungagung','2005-11-16','6281455023662','DUSUN BAKULAN, RT/02 RW/02, DESA KROMASAN KROMASAN, NGUNUT, TULUNGAGUNG, JAWA TIMUR, 66292, 66292','ANJAR KUSWANTORO','-','-','SITI HERMIN','-','-','',0,'0057242114','202cb962ac59075b964b07152d234b70','siswa'),
(53,'0076489102','-',2,'Bahruddin Gusti Cavan Rijal','L','Tulungagung','2007-07-20','6287704423091','DSN WELAHAN RT 005 RW 001 TANGGULWELAHAN, BESUKI, TULUNGAGUNG, JAWA TIMUR, 66275, 66275','AGUS DARWITO','-','-','PRAPTI','-','-','',0,'0076489102','202cb962ac59075b964b07152d234b70','siswa'),
(54,'0077784193','-',2,'Angger Prasetyo Bayuadjie','L','Trenggalek','2007-06-27','6281217487912','DSN. KETAWANG, RT 12, RW. 02 TASIKMADU, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','FENNIS WALANGGAREI','-','-','FERRY NURJANNAH','-','-','',0,'0077784193','202cb962ac59075b964b07152d234b70','siswa'),
(55,'0061177706','-',2,'Muhammad Fadhil Bintang Hanafi','L','Tulungagung','2006-07-03','6285856954037','DUSUN GAMBAR RT 02  RW 01  DESA MIRIGAMBAR MIRIGAMBAR, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','IMAM HANAFI','-','-','BINTINAIMAH','-','-','',0,'0061177706','202cb962ac59075b964b07152d234b70','siswa'),
(56,'0062066697','-',2,'Muhammad Faiz Putra Pradana','L','Tulungagung','2006-05-24','6285235805663','JL.PAHLAWAN GG.1  (RT 01/RW 01) REJOAGUNG, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66225, 66225','PANJI PUTRANTO','-','-','ARI SIS SANDAYATI','-','-','',0,'0062066697','202cb962ac59075b964b07152d234b70','siswa'),
(57,'0063942756','-',2,'Rona Dwi Afifah','P','Tulungagung','2006-11-11','6283856451552','DSN. KRAJAN, DESA. BENDO, RT/RW. 003/002, KEC. GONDANG, KAB. TULUNGAGUNG BENDO, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','SRI SUHARTI','-','-','SRI SUHARTI','-','-','',0,'0063942756','202cb962ac59075b964b07152d234b70','siswa'),
(58,'0077554452','-',2,'Ahmad Hafidh Fauzi','L','Tulungagung','2007-01-18','6281220168797','JL. KIMANGUN SARKORO, RT/RW. 001/002 BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','KHOTIBUL UMAM','-','-','RAHARDIAN WIJAYANTI','-','-','',0,'0077554452','202cb962ac59075b964b07152d234b70','siswa'),
(59,'0062967169','-',2,'Lintang Nur Amalia','P','Tulungagung','2006-06-01','6282145148557','DSN. JAMBU, RT. 04/RW. 01, PELEM PELEM, CAMPURDARAT, TULUNGAGUNG, JAWA TIMUR, 66272, 66272','ARSO PRAYOGO','-','-','SITI ERNAWATI','-','-','',0,'0062967169','202cb962ac59075b964b07152d234b70','siswa'),
(60,'0069706659','-',2,'Rahma Nur Fadila','P','Tulungagung','2006-12-17','6287707366121','RT 31/ RW 12, DSN. PASIR, DS. JUNJUNGRT 31/ RW 12, DSN. PASIR, DS. JUNJUNG JUNJUNG, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','ADI KUSWANTORO','-','-','ISMI LATIFAH','-','-','',0,'0069706659','202cb962ac59075b964b07152d234b70','siswa'),
(61,'0062939324','-',2,'Ahdimas Zakky Amri','L','Trenggalek','2006-05-16','6282316357863','RT 12 RW 04 KARANGANYAR KARANGANYAR, GANDUSARI, TRENGGALEK, JAWA TIMUR, 66372, 66372','IMAM SAFI\'I','-','-','ANY AHDIAH MUNAWAROH','-','-','',0,'0062939324','202cb962ac59075b964b07152d234b70','siswa'),
(62,'0067081457','-',2,'Elvina Hanum Salsabila','P','Trenggalek','2006-09-14','6287884323114','JL. NGADIREJO RT/RW. 35/ 10, NGADISUKO NGADISUKO, DURENAN, TRENGGALEK, JAWA TIMUR, 66381, 66381','IMAM AFANDI','-','-','SRI HANDAYANI','-','-','',0,'0067081457','202cb962ac59075b964b07152d234b70','siswa'),
(63,'0062543723','-',2,'Khadijah Sukma Prawira','P','Trenggalek','2006-11-01','6281358402162','RT.12 RW.02 DS.TASIKMADU  KEC WATULIMO TASIKMADU, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','ANANG WAHYUDI','-','-','LASTRI DARMIASIH','-','-','',0,'0062543723','202cb962ac59075b964b07152d234b70','siswa'),
(64,'0065213980','-',2,'Muhammad Dha\'i Gizar Habisani','L','Trenggalek','2006-11-07','6281331989913','RT 45 RW 09 DS PRIGI KEC WATULIMO PRIGI, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','HARI SUKARYANTO','-','-','ANI NURHIDAYAH','-','-','',0,'0065213980','202cb962ac59075b964b07152d234b70','siswa'),
(65,'0065440254','-',2,'Nafisatuz Zahra Zain','P','Tulungagung','2006-07-18','6281336550723','JL. I GUSTI NGURAH RAI I/3 TULUNGAGUNG, RT.01 / RW.02 BAGO, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66218, 66218','JAENODIN','-','-','ENDAH MINARSIH','-','-','',0,'0065440254','202cb962ac59075b964b07152d234b70','siswa'),
(66,'0069444711','-',2,'Indah Ma\'rifatul Latifah','P','Tulungagung','2006-11-24','6282140834778','DSN. TLUSUNG RT.022 RW. 004 JELI, KARANGREJO, TULUNGAGUNG JELI, KARANGREJO, TULUNGAGUNG, JAWA TIMUR, 66253, 66253','SUWARDI','-','-','JULIKAH','-','-','',0,'0069444711','202cb962ac59075b964b07152d234b70','siswa'),
(67,'0065257498','-',2,'Mohammad Naufal Rohmatan Lil Walidaini','L','Tulungagung','2006-12-21','6285791352427','DSN. KARANGTENGAH, RT/RW. 004/004, TULUNGAGUNG NOTOREJO, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','ACHMAT SAIFUDIN','-','-','SITI ANISZAH','-','-','',0,'0065257498','202cb962ac59075b964b07152d234b70','siswa'),
(68,'0078197817','-',2,'Arsya Sahira','P','Tulungagung','2007-01-24','6285731086765','DSN. BAYANAN, WAJAK LOR, RT/RW. 003/002 WAJAK LOR, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66235, 66235','MASKUR','-','-','UMI KULSUM','-','-','',0,'0078197817','202cb962ac59075b964b07152d234b70','siswa'),
(69,'0076252923','-',2,'Salsabila Aurelya Muavivah','P','Tulungagung','2007-03-22','6285648833739','DSN.KRANDEKAN RT/RW. 002/001, DS.WONOREJO,KEC.SUMBERGEMPOL WONOREJO, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','MOHAMMAD SLAMET DAROINI','-','-','NUR CHAMIDAH','-','-','',0,'0076252923','202cb962ac59075b964b07152d234b70','siswa'),
(70,'0068205129','-',2,'Zacky Pratama','L','Kediri','2006-11-04','6283115493604','DSN. KRAJAN RT/RW. 005/002 JUNJUNG, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','KUDORI','-','-','TRIYA RIYADI NINGSIH','-','-','',0,'0068205129','202cb962ac59075b964b07152d234b70','siswa'),
(71,'0065952835','-',2,'Audry Dayana Rinastiti','P','Tulungagung','2006-06-20','6281298709560','DSN. WARINGIN, 002/003 SAMBIJAJAR, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','WINARTO','-','-','SRI WIYATI','-','-','',0,'0065952835','202cb962ac59075b964b07152d234b70','siswa'),
(72,'0064995763','-',3,'Alvina Widya Basuki','P','Tulungagung','2006-11-11','6289682394998','JL.ABDUL FATAH NO 35 RT/RW 001/009 BATANGSAREN, KAUMAN, TULUNGAGUNG, JAWA TIMUR, 66261, 66261','Widodo Basuki','-','-','Fadilah','-','-','SMA',0,'0064995763','202cb962ac59075b964b07152d234b70','siswa'),
(73,'0075297586','-',3,'Intan Fitria Itsnaini','P','Tulungagung','2007-02-14','6281217051799','RT/RW 01/03, DSN. KANDENAN, DS. KARANGREJO, KEC. BOYOLANGU, KAB. TULUNGAGUNG KARANGREJO, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66235, 66235','Imam Mahfud','-','-','Masyrifah','-','-','SMA',0,'0075297586','202cb962ac59075b964b07152d234b70','siswa'),
(74,'0066822848','-',3,'Rihhadatul Asyikin Mardhiyyah','P','Tulungagung','2006-05-02','6282228682272','DSN. PULOSARI, RT/RW. 003/009 PULOSARI, NGUNUT, TULUNGAGUNG, JAWA TIMUR, 66292, 66292','Imam Fauji','-','-','Ana Umiyaroh','-','-','SMA',0,'0066822848','202cb962ac59075b964b07152d234b70','siswa'),
(75,'0065321890','-',3,'Hilmi Shakira Wicaksono','P','Tulungagung','2006-08-07','6281803430848','DSN. JELI, RT/RW 003/001, DS. JELI, KEC. KARANGREJO, KAB. TULUNGAGUNG JELI, KARANGREJO, TULUNGAGUNG, JAWA TIMUR, 66253, 66253','Arifin Wicaksono ','-','-','Pujiati','-','-','SMA',0,'0065321890','202cb962ac59075b964b07152d234b70','siswa'),
(76,'0062786735','-',3,'Zenita Lailatil Isthima\'iyah','P','Tulungagung','2006-05-08','6287784328123','RT 3/RW 2, JL. TANJUNG WONOREJO, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Sobirin','-','-','Karomin','-','-','SMA',0,'0062786735','202cb962ac59075b964b07152d234b70','siswa'),
(77,'0077983834','-',3,'Dhavina Indah Hera Saputri','P','Tulungagung','2007-03-09','6289602587315','DSN. KARANG TENGAH, 025/011 SRIKATON, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66212, 66212','Heru Prayitno','-','-','Dibora Suwita Ningsih','-','-','SMA',0,'0077983834','202cb962ac59075b964b07152d234b70','siswa'),
(78,'0063322460','-',3,'Muhamad Rajib Taufiqur Rohman','L','Tulungagung','2006-08-31','62895383309602','DUSUN. KLEPONAN DESA. TIUDAN RT 002 RW 006 TIUDAN, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Abdur Rohman','-','-','Naimatul Azizah','-','-','SMA',0,'0063322460','202cb962ac59075b964b07152d234b70','siswa'),
(79,'0066611408','-',3,'Safira Putri Prasetyo','P','Trenggalek','2006-10-27','6287863946465','RT 15 RW 03 JLN NASIONAL 3 KABUPATEN TRENGGALEK PANDEAN, DURENAN, TRENGGALEK, JAWA TIMUR, 66381, 66381','Eko Adi Prasetyo','-','-','Aning Prasetyowati','-','-','SMA',0,'0066611408','202cb962ac59075b964b07152d234b70','siswa'),
(80,'0063942209','-',3,'Keyla Rafida Luthfi','P','Tulungagung','2006-12-06','6281515890398','RT 01 RW 01 DSN. KARANGTUWO GEMAHARJO, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','Luthfi Widodo','-','-','Suci Rahayu','-','-','SMA',0,'0063942209','202cb962ac59075b964b07152d234b70','siswa'),
(81,'0064822378','-',3,'Rastra Daffa Aryasatya','L','Trenggalek','2006-11-08','6282140272594','JL. DR. WAHIDIN SH 39, RT/RW. 002/001 RINGINPITU, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66223, 66223','Kusnadi','-','-','Asih Dwi Utami','-','-','SMA',0,'0064822378','202cb962ac59075b964b07152d234b70','siswa'),
(82,'0069239798','-',3,'Hammam Al-Ihsan Dzaky Ardian','L','Tulungagung','2006-11-18','6281357029707','DSN. DADAPAN RT/RW. 003/001 BOYOLANGU, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66231, 66231','Achmad Ardianto','-','-','Rosdiyana','-','-','SMA',0,'0069239798','202cb962ac59075b964b07152d234b70','siswa'),
(83,'0074054181','-',3,'Nasya Almira Anindya','P','Tulungagung','2007-04-23','6285780632377','JL. SEMERU  NO. 93 SIDOREJO, KAUMAN, TULUNGAGUNG, JAWA TIMUR, 66261, 66261','Puguh Prasetiawan','-','-','Suci Yanuarti','-','-','SMA',0,'0074054181','202cb962ac59075b964b07152d234b70','siswa'),
(84,'0069604465','-',3,'Dini Amelia Putri','P','Tulungagung','2006-10-30','6289506332290','DUSUN PADANGAN RT. 002 RW. 002 PADANGAN, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66252, 66252','Mujianto','-','-','Istipadah','-','-','SMA',0,'0069604465','202cb962ac59075b964b07152d234b70','siswa'),
(85,'0068988461','-',3,'Fatimatuz Zahroh Fadhla','P','Tulungagung','2006-09-26','6285707127696','DUSUN. DONO RT/RW001/011 DESA, DONO, KECAMATAN SENDANG KABUPATEN TULUNGAGUNG DONO, SENDANG, TULUNGAGUNG, JAWA TIMUR, 66254, 66254','Asa`Ad','-','-','Jumiati Ningsih Rahayu','-','-','SMA',0,'0068988461','202cb962ac59075b964b07152d234b70','siswa'),
(86,'0063053158','-',3,'Muhammad Afifudin Zain','L','Tulungagung','2006-11-10','6282233800499','DSN. BUJET RT 02 RW 02 DS. SUKOWIYONO KARANGREJO SUKOWIYONO, KARANGREJO, TULUNGAGUNG, JAWA TIMUR, 66253, 66253','Sunaryo','-','-','Faridatun Nikmah','-','-','SMA',0,'0063053158','202cb962ac59075b964b07152d234b70','siswa'),
(87,'0068812455','-',3,'Mohammad Diandra Sakhi Firmansyah','L','Tulungagung','2006-06-25','6282131309071','DUSUN GONDANGSARI RT 001 RW 002 DESA JABALSARI JABALSARI, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Nurhadi','-','-','Candra Dwiana Dewi','-','-','SMA',0,'0068812455','202cb962ac59075b964b07152d234b70','siswa'),
(88,'0074244557','-',3,'Alika Hanun Fairuz Nabilah','P','Trenggalek','2007-12-08','6285607784778','DUSUN SEMARUM RT.009 RW.003 SEMARUM, DURENAN, TRENGGALEK, JAWA TIMUR, 66381, 66381','Zaenal Arifin','-','-','Nurul Farida','-','-','SMA',0,'0074244557','202cb962ac59075b964b07152d234b70','siswa'),
(89,'0076607862','-',3,'Ayodya Krisna Cahya Kusuma','L','Tulungagung','2007-02-15','6282140028729','DSN JATI RT02 RW03 MERGAYU, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Nurohmat','-','-','Wikan Sukesti','-','-','SMA',0,'0076607862','202cb962ac59075b964b07152d234b70','siswa'),
(90,'0063938868','-',3,'Yuditya Reyhan Ardiansyah','L','Trenggalek','2006-10-27','6285257604793','RT.06 RW.01 TASIKMADU, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','Mulyadi','-','-','Fatimah Komzahro','-','-','SMA',0,'0063938868','202cb962ac59075b964b07152d234b70','siswa'),
(91,'0067555950','-',3,'Ichwanu Fauzan Musthofa','L','Trenggalek','2006-12-18','6281231631912','RT 06 RW 02 DESA SAWAHAN KEC. WATULIMO SAWAHAN, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','Suseno','-','-','Siti Rukoyah','-','-','SMA',0,'0067555950','202cb962ac59075b964b07152d234b70','siswa'),
(92,'0066058136','-',3,'Nadia Chalimatuz Zahro\'','P','Tulungagung','2006-02-23','6283856082840','DSN. KRAJAN 3 003/006, DESA BETAK BETAK, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Bastomi','-','-','Eka Suryati','-','-','SMA',0,'0066058136','202cb962ac59075b964b07152d234b70','siswa'),
(93,'0067278384','-',3,'Fitria Azzahrawani Zein','P','Tulungagung','2006-11-16','6285735929146','DSN. POJOK RT/RW. 015/005 POJOK, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66252, 66252','Mochamad Machi','-','-','Siti Sulthoniyah','-','-','SMA',0,'0067278384','202cb962ac59075b964b07152d234b70','siswa'),
(94,'0067991803','-',3,'Najwa Misbah','P','Tulungagung','2006-01-17','6285784203419','DSN. JERUK, RT.04/RW.02 KENDAL, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Misbakhul Khoiri','-','-','Lia Dwi Listianingsih','-','-','SMA',0,'0067991803','202cb962ac59075b964b07152d234b70','siswa'),
(95,'0065038034','-',3,'Revameivia Nur Fadhillah','P','Tulungagung','2006-05-01','6285692531973','JL. KI MANGUN SARKORO GG 3D (RT 05 / RW 04) BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','Munajid','-','-','Sri Winarti','-','-','SMA',0,'0065038034','202cb962ac59075b964b07152d234b70','siswa'),
(96,'0068739130','-',3,'Farah Safira','P','Tulungagung','2006-07-28','62881026330587','TAWANGSARI RT/RW. 001/002 MANGUNSARI, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66227, 66227','Nurhadi','-','-','Rida Ridowati','-','-','SMA',0,'0068739130','202cb962ac59075b964b07152d234b70','siswa'),
(97,'0079368646','-',3,'Nadya Khoiruz Zahra','P','Tulungagung','2007-06-21','6287753483378','DSN. SELOJENENG RT 02 RW 02 DS. SUMBERDADI SUMBERDADI, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Khoirul Mu`Anam','-','-','Siti Susanti','-','-','SMA',0,'0079368646','202cb962ac59075b964b07152d234b70','siswa'),
(98,'3066984040','-',3,'Difa Nur Azizah','P','Tulungagung','2006-07-19','6285790418429','DSN. TIYANG, RT/RW 001/001, DS. TANJUNGSARI, KEC. KARANGREJO TANJUNGSARI, KARANGREJO, TULUNGAGUNG, JAWA TIMUR, 66253, 66253','Didik Ariyanto','-','-','Nurfatmawati','-','-','SMA',0,'3066984040','202cb962ac59075b964b07152d234b70','siswa'),
(99,'0062925971','-',3,'Louis Figo Anshori Putra','L','Tulungagung','2006-11-01','628989505596409','DUSUN NGUKEM RT 001 RW 002 DESA PULOTONDO PULOTONDO, NGUNUT, TULUNGAGUNG, JAWA TIMUR, 66292, 66292','Muhammad Ashar Takim Anshori','-','-','Siti Fatimah','-','-','SMA',0,'0062925971','202cb962ac59075b964b07152d234b70','siswa'),
(100,'0073084730','-',3,'Farah Adibah Nisrina Azizah','P','Tulungagung','2007-08-02','6281265459300','DSN KRAJAN RT 06 RW 06 NGRENDENG, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Risdiyanto','-','-','Masruroh','-','-','SMA',0,'0073084730','202cb962ac59075b964b07152d234b70','siswa'),
(101,'0076050828','-',3,'Ale Galih Nugraha','L','Bali','2007-07-26','6285730215919','DSN. DUNGMANTEN RT/RW. 001/003 ARIYOJEDING, REJOTANGAN, TULUNGAGUNG, JAWA TIMUR, 66293, 66293','Heru Waloyo','-','-','Estuningtyas','-','-','SMA',0,'0076050828','202cb962ac59075b964b07152d234b70','siswa'),
(102,'0066977513','-',3,'Hafid Abitama Cahyana','L','Tulungagung','2006-08-08','62895807765090','JL.MT.HARYONO RT.003 / RW.003 BAGO, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66229, 66229','Muhammad Rokim','-','-','Hanim Mu\'alimah','-','-','SMA',0,'0066977513','202cb962ac59075b964b07152d234b70','siswa'),
(103,'0074621180','-',3,'Keyshafira Prasetyo','P','Tulungagung','2007-04-25','6285733147114','JL PURIMAS BLOK C NO 4 BOTORAN, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66213, 66213','Dedy Prasetyo','-','-','Endang Sri Wahyuni','-','-','SMA',0,'0074621180','202cb962ac59075b964b07152d234b70','siswa'),
(104,'0079050517','-',3,'Natasha Nur Awalia Yasir','P','Tulungagung','2007-06-30','6289503792428','DSN. KUDUSAN, RT.001 / RW.002 PLOSOKANDANG, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66229, 66229','Abu Yasir','-','-','Yayuk Rahayu','-','-','SMA',0,'0079050517','202cb962ac59075b964b07152d234b70','siswa'),
(105,'0068169880','-',3,'Rifdah Nasywa','P','Tulungagung','2006-05-23','6281617041259','JL RAYA WAJAKLOR RT 5 RW 1 WAJAK LOR, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66235, 66235','Abdul Ghopur','-','-','Sunarti','-','-','SMA',0,'0068169880','202cb962ac59075b964b07152d234b70','siswa'),
(106,'0065356559','-',3,'Rangga Daffa Syahputra','L','Palopo','2006-11-01','6285330662812','DAN. BENDIL RT/RW. 002/003 PANGGUNGREJO, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66214, 66214','Rubiono','-','-','Rahmawati','-','-','SMA',0,'0065356559','202cb962ac59075b964b07152d234b70','siswa'),
(107,'0065709402','-',3,'Khuurun Alya Kamila','P','Tulungagung','2006-10-30','6281256834330','JL. DR. SUTOMO RT03/RW04 TERTEK, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66212, 66212','Mashur Bachtiar','-','-','Nurul Ekawati','-','-','SMA',0,'0065709402','202cb962ac59075b964b07152d234b70','siswa'),
(108,'0068059068','-',4,'Siti Syifaul Masruroh','P','Tulungagung','2006-06-05','6285708894531','DSN. PELEM, 005/004 SERUT, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66235, 66235','Abdul Sukur','-','-','Siti Fatimah','-','-','SMA',0,'0068059068','202cb962ac59075b964b07152d234b70','siswa'),
(109,'0075534509','-',4,'Alvin Nu\'man Nashr','L','Tulungagung','2007-02-01','6281221682610','DS PAKEL KEC NGANTRU KAB TULUNGAGUNG RT/RW. 01/02 PAKEL, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66252, 66252','Budiono','-','-','Sudarti','-','-','SMA',0,'0075534509','202cb962ac59075b964b07152d234b70','siswa'),
(110,'0062129554','-',4,'Fa\'iza Zahra Ramadani','P','Tulungagung','2006-10-06','6282142776623','DSN GAMBIRAN RT 001 RW 005  BESOLE, BESUKI, TULUNGAGUNG, JAWA TIMUR, 66275, 66275','Edi Subagiyo','-','-','Titin Liyanawati','-','-','SMA',0,'0062129554','202cb962ac59075b964b07152d234b70','siswa'),
(111,'0066170718','-',4,'Muhammad Syahrin Zulfiansyah','L','Tulungagung','2006-10-11','6283830215012','JL STADION 7 RT 01 RW 01 KEDUNGWARU, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66226, 66226','Sugeng Supriadi','-','-','Istifadah','-','-','SMA',0,'0066170718','202cb962ac59075b964b07152d234b70','siswa'),
(112,'0066619555','-',4,'Alvina Nur Aziizah','P','Tulungagung','2006-08-23','6282232509378','DSN. KARANGARUM RT/RW. 002/001 BANGOAN, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66251, 66251','Marji','-','-','Ria Haryanti','-','-','SMA',0,'0066619555','202cb962ac59075b964b07152d234b70','siswa'),
(113,'0062744340','-',4,'May Fatihan Ni\'ami','P','Tulungagung','2006-05-03','6281353682308','DSN. MANGU RT/RW. 003/004 SODO, PAKEL, TULUNGAGUNG, JAWA TIMUR, 66273, 66273','Nur Wakhid','-','-','Siti Nurendah','-','-','SMA',0,'0062744340','202cb962ac59075b964b07152d234b70','siswa'),
(114,'0072773560','-',4,'Mutiara Naziha Huurun\'iin','P','Tulungagung','2007-01-13','6285707121499','JL RAYA POPOH (03/03) CAMPURDARAT, CAMPURDARAT, TULUNGAGUNG, JAWA TIMUR, 66272, 66272','Candra Wildanul Qoyyum','-','-','Ninik Ispriyani','-','-','SMA',0,'0072773560','202cb962ac59075b964b07152d234b70','siswa'),
(115,'0062171313','-',4,'Resrillia Nayla Destiani','P','Tulungagung','2006-12-12','6285707007923','JALAN RAYA POPOH RT. 04/ RW. 01, DESA GAMPING, DSN. GAMPING, KEC. CAMPURDARAT, KAB. TULUNGAGUNG CAMPURDARAT, CAMPURDARAT, TULUNGAGUNG, JAWA TIMUR, 66272, 66272','Winarto','-','-','Yayuk','-','-','SMA',0,'0062171313','202cb962ac59075b964b07152d234b70','siswa'),
(116,'0064150705','-',4,'Siti Nuranisa\'','P','Tulungagung','2006-11-02','6285668973831','DSN. BESOLE RT/RW. 002/003 BESOLE, BESUKI, TULUNGAGUNG, JAWA TIMUR, 66275, 66275','Supani','-','-','Muntamah','-','-','SMA',0,'0064150705','202cb962ac59075b964b07152d234b70','siswa'),
(117,'0061148414','-',4,'Kania Yulsifa Evrillia','P','Tulungagung','2006-07-29','62895385324973','DSN. MORANGAN RT/RW. 012/005, DS. BOLOREJO BOLOREJO, KAUMAN, TULUNGAGUNG, JAWA TIMUR, 66261, 66261','Lusianto','-','-','Farida Mardiani','-','-','SMA',0,'0061148414','202cb962ac59075b964b07152d234b70','siswa'),
(118,'0064844624','-',4,'Alvin Fajar Satrio Aji','L','Tulungagung','2006-05-11','6285736605686','DSN. BLIMBING RT/RW. 001/002, DS. NGRANTI NGRANTI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66271, 66271','Darmadi','-','-','Suparmi','-','-','SMA',0,'0064844624','202cb962ac59075b964b07152d234b70','siswa'),
(119,'0062021582','-',4,'Fanny Fahma Ramadani','P','Tulungagung','2006-10-13','6282244016666','JALAN SURONOTO, RT/RW 01/05 BATANGSAREN, KAUMAN, TULUNGAGUNG, JAWA TIMUR, 66261, 66261','Edi Junaedi','-','-','Siti Kasmirah','-','-','SMA',0,'0062021582','202cb962ac59075b964b07152d234b70','siswa'),
(120,'0072283719','-',4,'Balqis Silmi Febriani','P','Tulungagung','2007-02-14','6282142449002','DSN. KEBONSARI RT/RW. 004/001 NGUNGGAHAN, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Suminto','-','-','Mudjiyah','-','-','SMA',0,'0072283719','202cb962ac59075b964b07152d234b70','siswa'),
(121,'0063698223','-',4,'Muhammad Galih Zida Al Rozaq','L','Tulungagung','2006-04-11','6285785467328','DUSUN PAKEL RT. 001 RW. 002 PAKEL, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66252, 66252','Muqoddim Al Khoirudda`I','-','-','Nur Hidayah','-','-','SMA',0,'0063698223','202cb962ac59075b964b07152d234b70','siswa'),
(122,'0079168742','-',4,'Abidah Nuraini Azzahro','P','Tulungagung','2007-07-07','6289524068717','DSN. SAMBIREJO, RT 02 RW 01 , DS. SAMBIROBYONG SAMBIROBYONG, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Kasiono','-','-','Pujiasih','-','-','SMA',0,'0079168742','202cb962ac59075b964b07152d234b70','siswa'),
(123,'0068243880','-',4,'Anindia Shofa Hariana','P','Tulungagung','2006-07-13','6285706818520','DUSUN TALUN RT 002/RW 002 GOMBANG, PAKEL, TULUNGAGUNG, JAWA TIMUR, 66273, 66273','Imam Tohari','-','-','Siti Masrotin','-','-','SMA',0,'0068243880','202cb962ac59075b964b07152d234b70','siswa'),
(124,'0061956368','-',4,'Shalfa Aszahra Ramadani','P','Tulungagung','2006-11-16','6282132768433','DSN KUNDUNG RT.005 RW.001 TANGGULKUNDUNG, BESUKI, TULUNGAGUNG, JAWA TIMUR, 66275, 66275','Amin Tohari','-','-','Lilis Saudah','-','-','SMA',0,'0061956368','202cb962ac59075b964b07152d234b70','siswa'),
(125,'0077388497','-',4,'Syahda Wira Nugraha','L','Tulungagung','2007-05-14','6282228084134','DSN. BULU RT.04 RW.03 DS.TANGGULWELAHAN, KEC. BESUKI, KAB.TULUNGAGUNG TANGGULWELAHAN, BESUKI, TULUNGAGUNG, JAWA TIMUR, 66275, 66275','Dasuki','-','-','Sulati','-','-','SMA',0,'0077388497','202cb962ac59075b964b07152d234b70','siswa'),
(126,'0066004214','-',4,'Faticha Kusumawati','P','Trenggalek','2006-01-28','6285745300724','DSN KRAJAN, RT 004, RW 002 WATULIMO, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','Musani','-','-','Eny Astutik','-','-','SMA',0,'0066004214','202cb962ac59075b964b07152d234b70','siswa'),
(127,'0075570496','-',4,'Salsabela Amalina','P','Tulungagung','2007-02-12','6281234587723','DUSUN TANGGUL RT/RW. 002/001 TANGGULTURUS, BESUKI, TULUNGAGUNG, JAWA TIMUR, 66275, 66275','Eksan','-','-','Iis Winarti','-','-','SMA',0,'0075570496','202cb962ac59075b964b07152d234b70','siswa'),
(128,'0066224071','-',4,'Ilham Fatih Zamani','L','Trenggalek','2006-09-12','6281945557988','JL. KETOK RT/RW : 06/04 MARGOMULYO, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','Nanang Musafa`','-','-','Siti Khoiriyah','-','-','SMA',0,'0066224071','202cb962ac59075b964b07152d234b70','siswa'),
(129,'0062030155','-',4,'Alya Shadatul Nadia Azzahra','P','Tulungagung','2006-07-17','6285704559000','RT 04 RW 03 DESA NGUBALAN NGUBALAN, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Marsum','-','-','Siti Mahmudah','-','-','SMA',0,'0062030155','202cb962ac59075b964b07152d234b70','siswa'),
(130,'0135469581','-',4,'Amelda Deavira Novita Putri','P','Tulungagung','2006-08-14','6285748377249','RT/RW.02/04  DSN.KRAJAN  DS.KARANGSONO  KEC.NGUNUT   KAB.TULUNGAGUNG KARANGSONO, NGUNUT, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Sudarto','-','-','Novi Alifatul Zulfa','-','-','SMA',0,'0135469581','202cb962ac59075b964b07152d234b70','siswa'),
(131,'0077387003','-',4,'Zahra Zahyardia','P','Trenggalek','2007-04-18','6285930251464','RT 21 RW 06 DUSUN NGLANDEAN MALASAN, DURENAN, TRENGGALEK, JAWA TIMUR, 66381, 66381','Agung Darmawan','-','-','Oka Ludianita','-','-','SMA',0,'0077387003','202cb962ac59075b964b07152d234b70','siswa'),
(132,'0068783438','-',4,'Adenium Quantina Salsabila','P','Tulungagung','2006-12-30','6281515187355','RT/RW 03/02 DS.MACANBANG KEC.GONDANG KAB.TULUNGAGUNG MACANBANG, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Willy Radityo','-','-','Rachmawati Dyah Ayu','-','-','SMA',0,'0068783438','202cb962ac59075b964b07152d234b70','siswa'),
(133,'0064648990','-',4,'Ravita Nisa Rahmawati','P','Trenggalek','2006-06-08','6282228560877','RT 4 RW 2 SALAMREJO, KARANGAN SALAMREJO, KARANGAN, TRENGGALEK, JAWA TIMUR, 66361, 66361','Agung Santoso','-','-','Atik Susilawati','-','-','SMA',0,'0064648990','202cb962ac59075b964b07152d234b70','siswa'),
(134,'0068823126','-',4,'Moh Lutfi Almuktafi','L','Tulungagung','2006-08-14','6285706595848','JABON JABON, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Kudori','-','-','Nihayatun Nasikah','-','-','SMA',0,'0068823126','202cb962ac59075b964b07152d234b70','siswa'),
(135,'0067099862','-',4,'Pasya Hayyudinal Haqq','P','Tulungagung','2006-09-26','85697809368','DUSUN SALAMREJO RT 001 RW 017 DESA PULOSARI PULOSARI, NGUNUT, TULUNGAGUNG, JAWA TIMUR, 66292, 66292','Fahrur Rozi','-','-','Siti Mualimah','-','-','SMA',0,'0067099862','202cb962ac59075b964b07152d234b70','siswa'),
(136,'0079548962','-',4,'Muhammad Khoid Syaifulloh','L','Bontang','2007-02-14','6281359779647','JL MENTAWAI BLOK 00-04 BTN KCY API-API, BONTANG UTARA, KOTA BONTANG, KALIMANTAN TIMUR, 75311, 75311','Sundowo','-','-','Siti Rohmah','-','-','SMA',0,'0079548962','202cb962ac59075b964b07152d234b70','siswa'),
(137,'0074813296','-',4,'Arina Sabila \'Ulya','P','Tulungagung','2007-01-05','6285707299324','DSN. PULOSARI 001/011 NGUNUT- TULUNGAGUNG PULOSARI, NGUNUT, TULUNGAGUNG, JAWA TIMUR, 66292, 66292','Zainal Arifin','-','-','Siti Qomariyah','-','-','SMA',0,'0074813296','202cb962ac59075b964b07152d234b70','siswa'),
(138,'0066361110','-',4,'Nafisatul Lathifah','P','Tulungagung','2006-02-09','6285850256106','RT 4/4 DSN NGUMBO DS. PAGERSARI PAGERSARI, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Adam Subilal','-','-','Usriwati','-','-','SMA',0,'0066361110','202cb962ac59075b964b07152d234b70','siswa'),
(139,'0074515054','-',4,'Mochammad Daniel Faza','L','Tulungagung','2007-01-16','6287715098411','TAWANGSARI, RT 02 RW 01 TAWANGSARI, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66212, 66212','Iwan Setiyono','-','-','Binti Mahmudah','-','-','SMA',0,'0074515054','202cb962ac59075b964b07152d234b70','siswa'),
(140,'0079097324','-',4,'Sinta Diah Larita','P','Tulungagung','2007-12-21','6285733134640','ALAMAT : DSN.KALIANYAR RT/RW : 001/003 NGUNGGAHAN, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Sayuti','-','-','Alpiyatun','-','-','SMA',0,'0079097324','202cb962ac59075b964b07152d234b70','siswa'),
(141,'0068759567','-',4,'Aulia Rizka Dewi','P','Batam','2006-08-11','6281233342530','KARANGREJO RT/RW. 001/002 KARANGREJO, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66271, 66271','Sentot Hartono ','-','-','Neni Sri Widiyanti','-','-','SMA',0,'0068759567','202cb962ac59075b964b07152d234b70','siswa'),
(142,'0072535287','-',5,'Talitha Salsabila','P','Tulungagung','2007-03-19','6281239486585','DSN. SAMBIDOPLANG RT/RW. 002/005 SAMBIDOPLANG, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Agus Sularto','-','-','Sri Pujiati','-','-','SMA',0,'0072535287','202cb962ac59075b964b07152d234b70','siswa'),
(143,'0067323268','-',5,'Kennia Dwi Pramesthi','P','Tulungagung','2006-03-06','6285816618780','DSN. POJOK, RT 05 / RW 02, CAMPURDARAT POJOK, CAMPURDARAT, TULUNGAGUNG, JAWA TIMUR, 66272, 66272','Slamet Pramuji','-','-','Mujiati','-','-','SMA',0,'0067323268','202cb962ac59075b964b07152d234b70','siswa'),
(144,'0073420686','-',5,'Naisya Zakka Wahyu Shinta Devi','P','Tulungagung','2007-01-12','6287885326364','JL NGEBONG-NGRANCE RT.04 RW.01 NGEBONG, PAKEL, TULUNGAGUNG, JAWA TIMUR, 66273, 66273','Wahyudi','-','-','Istiati','-','-','SMA',0,'0073420686','202cb962ac59075b964b07152d234b70','siswa'),
(145,'0069264241','-',5,'Syifa Rahma Nur Syafika','P','Tulungagung','2006-02-05','6282142436730','DSN. KRAJAN RT/RW. 001/002, SUWARU SUWARU, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Muhamad Sujai','-','-','Lu\'lu\'il Maknun','-','-','SMA',0,'0069264241','202cb962ac59075b964b07152d234b70','siswa'),
(146,'0076978753','-',5,'Zulfa Ayu Trisna Khoirun Nisa\'','P','Tulungagung','2007-03-19','6285755331978','JL. PATIMURA RT/RW. 004/003 , BENDOSARI BENDOSARI, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66252, 66252','Sutrisno','-','-','Jumrotul Khoiroh','-','-','SMA',0,'0076978753','202cb962ac59075b964b07152d234b70','siswa'),
(147,'0061282296','-',5,'Nadira Tsuraya','P','Trenggalek','2006-06-22','6281339398790','JL. JAYENG KUSUMA, DSN. MELIKAN RT/RW. 002/010, DS. TAPAN TAPAN, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66251, 66251','Rudi Hartanto','-','-','Siti Sulikah','-','-','SMA',0,'0061282296','202cb962ac59075b964b07152d234b70','siswa'),
(148,'0072873882','-',5,'Tazkia Fitria Khasanah','P','Tulungagung','2007-01-12','6283156409595','JL. ADE IRMA SURYANI, NO. 283, RT 1 RW 4, SEMBUNG, TULUNGAGUNG SEMBUNG, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66213, 66213','Agus Triyono','-','-','Evi Lestari','-','-','SMA',0,'0072873882','202cb962ac59075b964b07152d234b70','siswa'),
(149,'0072089517','-',5,'Anna Dwi Nurazijah','P','Tulungagung','2007-06-07','6287856326185','DUSUN POJOK RT. 013 RW. 004 POJOK, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66252, 66252','Abu Soleh','-','-','Badriyah','-','-','SMA',0,'0072089517','202cb962ac59075b964b07152d234b70','siswa'),
(150,'0079608145','-',5,'Ilma Aulia Agustin','P','Tulungagung','2007-08-02','6285856581996','DSN. POJOK RT/RW 10/03 KEC. NGANTRU KAB. TULUNGAGUNG POJOK, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66252, 66252','Agus Basuni','-','-','Titin Murtini','-','-','SMA',0,'0079608145','202cb962ac59075b964b07152d234b70','siswa'),
(151,'3069267985','-',5,'Ahmad Hafidz Al Qodri','L','Tulungagung','2006-10-21','6285707491236','DSN TAMANAN RT.04 RW. 01 DS. SUKOWIYONO KEC. KARANGREJO SUKOWIYONO, KARANGREJO, TULUNGAGUNG, JAWA TIMUR, 66253, 66253','Misbahul Munir','-','-','Sri Harwiyati','-','-','SMA',0,'3069267985','202cb962ac59075b964b07152d234b70','siswa'),
(152,'3071261110','-',5,'Moch Ichromu Nuril Fajri','L','Tulungagung','2007-05-22','6285707367637','DSN. BLIMBING RT.006 RW. 002, DS. JELI, KEC. KARANGREJO, KAB. TULUNGAGUNG JELI, KARANGREJO, TULUNGAGUNG, JAWA TIMUR, 66253, 66253','Misbah','-','-','Yatingah','-','-','SMA',0,'3071261110','202cb962ac59075b964b07152d234b70','siswa'),
(153,'0068490509','-',5,'Indah Halimatus Sa\'diyah','P','Tulungagung','2006-04-03','6281230307470','JLN. PARIT AGUNG 04/12, DSN CAMPURJANGGRANG RT:004 RW:012 CAMPURDARAT, CAMPURDARAT, TULUNGAGUNG, JAWA TIMUR, 66272, 66272','Supandi','-','-','Enik Tri Wahyuni','-','-','SMA',0,'0068490509','202cb962ac59075b964b07152d234b70','siswa'),
(154,'0065333568','-',5,'Nabila Oktavia Jonafitriani','P','Trenggalek','2006-10-25','6281231259153','DSN SAMBI, RT/RW 001/001  WATUAGUNG, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','Sujoko','-','-','Deni Linasih','-','-','SMA',0,'0065333568','202cb962ac59075b964b07152d234b70','siswa'),
(155,'0062797618','-',5,'Ghita Naysa Callista','P','Tulungagung','2006-12-04','6281252594149','DSN TANGGUNG RT.002 RW.001 SURUHAN LOR, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Suminto','-','-','Nurul Ayati','-','-','SMA',0,'0062797618','202cb962ac59075b964b07152d234b70','siswa'),
(156,'0061895535','-',5,'Faula Qurotul Desma Nada','P','Trenggalek','2006-12-10','6282244115831','JL. PANTAI DAMAS, RT.04 RW.02 DSN.TIRTO DS.KARANGGANDU KEC.WATULIMO KAB.TRENGGALEK KARANGGANDU, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','Mu`Asir','-','-','Sulaswiji','-','-','SMA',0,'0061895535','202cb962ac59075b964b07152d234b70','siswa'),
(157,'0072117623','-',5,'\'Azza Aufa Annaja','P','Tulungagung','2007-06-19','6282142297529','JLN. RAYA NGANTRU RT/RW. 003/002 BENDOSARI, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66252, 66252','Abdul Ghofur','-','-','Yayun Retnosari','-','-','SMA',0,'0072117623','202cb962ac59075b964b07152d234b70','siswa'),
(158,'0067785176','-',5,'Moh Hafidz Taqiyuddin Fadhli','L','Tulungagung','2006-04-15','628976465758','DSN. SUMBER RT/RW. 03/03 WONOKROMO WONOKROMO, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Masjhudi Nurul Huda','-','-','Istini','-','-','SMA',0,'0067785176','202cb962ac59075b964b07152d234b70','siswa'),
(159,'0066638251','-',5,'Nayla Wafa Nurroisi','P','Tulungagung','2006-11-24','6281233050408','DUSUN LEKSONO 001/002 BENDILJATI WETAN, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Yudi Roisi ','-','-','Eny Astutik','-','-','SMA',0,'0066638251','202cb962ac59075b964b07152d234b70','siswa'),
(160,'0068862500','-',5,'Nisma Fadilah Azzakiyah','P','Surabaya','2006-07-07','6282330218331','JL. WR SUPRATMAN RT. 03 RW 03 RINGINPITU, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66229, 66229','Yulianto Insan Kurniwan','-','-','Deni Apriliawati','-','-','SMA',0,'0068862500','202cb962ac59075b964b07152d234b70','siswa'),
(161,'0068071303','-',5,'Rossintha Naura Auwallia','P','Tulungagung','2006-07-11','6285755256811','JALAN ARJUNA NO.75 RT/RW 01/01 SAWAHAN,SIDOREJO KEC.KAUMAN KAB.TULUNGAGUNG KAUMAN, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66261, 66261','Mochamad Ali Sutanto','-','-','Siti Nurasiyah','-','-','SMA',0,'0068071303','202cb962ac59075b964b07152d234b70','siswa'),
(162,'0072003507','-',5,'Lintang Bagus Pribekti Rodhyansah','L','Trenggalek','2007-06-11','6281325293230','JL RAYA DURENAN RT 001 RW 001, DURENAN DURENAN, DURENAN, TRENGGALEK, JAWA TIMUR, 66381, 66381','Muchrodin','-','-','Dyah Suharmin','-','-','SMA',0,'0072003507','202cb962ac59075b964b07152d234b70','siswa'),
(163,'0066606659','-',5,'Namira Anjani Ryadina','P','Tulungagung','2006-10-24','6281775127040','DSN. BANTENGAN 002/003 BANTENGAN, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 88274, 88274','Adi Muanam','-','-','Sri Astutik','-','-','SMA',0,'0066606659','202cb962ac59075b964b07152d234b70','siswa'),
(164,'0077347294','-',5,'Moh. Yanuar Ubaidillah','L','Tulungagung','2007-01-03','6281334642109','TLOGO, RT 1 / RW1, NGLUTUNG NGLUTUNG, SENDANG, TULUNGAGUNG, JAWA TIMUR, 66254, 66254','Misbahul Karim','-','-','Lulu Ul Hasanah','-','-','SMA',0,'0077347294','202cb962ac59075b964b07152d234b70','siswa'),
(165,'3076348539','-',5,'Muhammad Raihan Nur Yanuar','L','Tulungagung','2007-01-05','6285855143635','DSN. KALANGAN, RT/RW 01/02 KALANGAN, NGUNUT, TULUNGAGUNG, JAWA TIMUR, 66292, 66292','Suparji','-','-','Sutriani','-','-','SMA',0,'3076348539','202cb962ac59075b964b07152d234b70','siswa'),
(166,'0062861571','-',5,'Aisyah Rahma Sari','P','Tulungagung','2006-03-13','6285692532709','JALAN BASUKI RAHMAT GG.2 NO.31 RT.02 RW.01 KAMPUNGDALEM, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66212, 66212','Juwaeni','-','-','Siti Anisah','-','-','SMA',0,'0062861571','202cb962ac59075b964b07152d234b70','siswa'),
(167,'0075045873','-',5,'Ananda Aulia Rahma','P','Tulungagung','2007-01-09','6287895773432','DSN GONDANGSARI, DANGSARI JABALSARI RT 04 RW 01 JABALSARI, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Mujib Nur Arif','-','-','Hartatik','-','-','SMA',0,'0075045873','202cb962ac59075b964b07152d234b70','siswa'),
(168,'0064112370','-',5,'Ardina Fitri Ridhani','P','Tulungagung','2006-10-23','6285606237797','DUSUN TUBAN RT/RW: 004/001 DOMASAN, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Juminto','-','-','Subatin','-','-','SMA',0,'0064112370','202cb962ac59075b964b07152d234b70','siswa'),
(169,'0074700965','-',5,'Cintya Tri Yulianti','P','Tulungagung','2007-07-16','6281515178831','DS. TAMBAKREJO, RT 001/ RW 001, KEC. SUMBERGEMPOL, KAB. TULUNGAGUNG TAMBAKREJO, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Sugeng Widodo','-','-','Mistiani','-','-','SMA',0,'0074700965','202cb962ac59075b964b07152d234b70','siswa'),
(170,'0066996085','-',5,'Cleoza Alzena Masayu Billah','P','Tulungagung','2006-09-23','6285732953094','JL TTRUNOJOYO RT1 RW2, DESA BORO DUSUN BARON KEC KEDUNGWARU KAB TULUNGAGUNG BORO, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66229, 66229','Mashudi','-','-','Niswati Sholihah','-','-','SMA',0,'0066996085','202cb962ac59075b964b07152d234b70','siswa'),
(171,'0073592087','-',5,'Izza Afkarina Yahya','P','Tulungagung','2007-05-16','6285730267556','DSN. PULOSARI, NGUNUT, TULUNGAGUNG, RT 3 RW 15 PULOSARI, NGUNUT, TULUNGAGUNG, JAWA TIMUR, 66292, 66292','Yahya Husna','-','-','Novita Andriani','-','-','SMA',0,'0073592087','202cb962ac59075b964b07152d234b70','siswa'),
(172,'0064419148','-',5,'Ilma Navi\'a Munawaroh','P','Tulungagung','2006-06-28','6285850717280','DUSUN SUMBER RT. 026 RW. 008 POJOK, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66252, 66252','Burhanudin','-','-','Musaropah','-','-','SMA',0,'0064419148','202cb962ac59075b964b07152d234b70','siswa'),
(173,'0062993546','-',5,'Wahyu Dwi Abdillah','P','Tulungagung','2006-03-08','6285748530390','DUSUN BAKALAN, DESA SURUHAN KIDUL SURUHAN KIDUL, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Miftahrudin','-','-','Saniatik','-','-','SMA',0,'0062993546','202cb962ac59075b964b07152d234b70','siswa'),
(174,'0069014505','-',5,'Jessica Fitria Astadewi','P','Tulungagung','2006-10-24','6282245899752','RT.01 RW.04 JALAN RAYA PANTAI SANGGAR JENGGLUNGHARJO, TANGGUNGGUNUNG, TULUNGAGUNG, JAWA TIMUR, 66283, 66283','Sutaji','-','-','Suyati','-','-','SMA',0,'0069014505','202cb962ac59075b964b07152d234b70','siswa'),
(175,'0066114598','-',5,'Shiella Falelya','P','Tulungagung','2006-06-16','6285725650700','JLN. PAHLAWAN GANG 3,  RT/RW 03/02 REJOAGUNG, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66225, 66225','Anang Efendi','-','-','Sri Uminingsih','-','-','SMA',0,'0066114598','202cb962ac59075b964b07152d234b70','siswa'),
(176,'0054873580','-',13,'Kinanti Annisa Hasim','P','Tulungagung','2005-07-12','','DUSUN GOMBANG, RT.001, RW. 001 GOMBANG, PAKEL, TULUNGAGUNG, JAWA TIMUR, 66273, 66273','Nurhasim','-','-','Renny Retno Widyastuti','-','-','SMA',0,'0054873580','202cb962ac59075b964b07152d234b70','siswa'),
(177,'0063832652','-',13,'Bahrul Ulum Azhari','L','Tulungagung','2006-01-25','6282139630624','Dsn.Jambe RT 01 RW 03 KESAMBI, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Suhar','-','-','Partiyah','-','-','SMA',0,'0063832652','202cb962ac59075b964b07152d234b70','siswa'),
(178,'3055802656','-',13,'Muhamad Iqbal Nur Khanafi','L','Tulungagung','2005-07-06','6282336682819','Dsn. Bonsari Ds. Betak Rt 02/ rw 12 BETAK, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Nur Aimin ','-','-','Yulikah','-','-','SMA',0,'3055802656','202cb962ac59075b964b07152d234b70','siswa'),
(179,'0052121585','-',13,'Dina Zuniati','P','Tulungagung','2005-06-10','6282338097107','DSN. PUCANGSONGO, RT 02 RW 02 GENDINGAN, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66229, 66229','Sulikah','-','-','Sulikah','-','-','SMA',0,'0052121585','202cb962ac59075b964b07152d234b70','siswa'),
(180,'0054324983','-',13,'Reni Lianasari','P','Tulungagung','2005-06-03','6281906390065','Jl. Raya Doroamopel DOROAMPEL, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Titik Saropah','-','-','Titik Saropah','-','-','SMA',0,'0054324983','202cb962ac59075b964b07152d234b70','siswa'),
(181,'0068815561','-',13,'Dhevira Azrin Natasya','P','Tulungagung','2006-01-22','6281334206922','DUSUN TAWANG RT 003 RW 001 PAGERSARI, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Sahuri','-','-','Nurmala Mahmudah','-','-','SMA',0,'0068815561','202cb962ac59075b964b07152d234b70','siswa'),
(182,'0057571250','-',13,'Eka Dima Agustrisna','P','Tulungagung','2005-08-03','6283122843120','Jl. Raya Junjung, Junjung,RT/RW:010/004,Kec. Sumbergempol, Kabupaten Tulungagung JUNJUNG, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Sasmito Utomo','-','-','Nurul Widayati','-','-','SMA',0,'0057571250','202cb962ac59075b964b07152d234b70','siswa'),
(183,'0057839918','-',13,'Isti Karimatannisa','P','Tulungagung','2005-07-02','6281450190028','JALAN KHR ABDUL FATTAH (RT01/RW02) MANGUNSARI, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66228, 66228','Zaet','-','-','Rofiah','-','-','SMA',0,'0057839918','202cb962ac59075b964b07152d234b70','siswa'),
(184,'0053185812','-',13,'Natasya Arnelita Hasan','P','Tulungagung','2005-05-05','6282335293819','Jl. Sedayugunung - Besuki (001/001) SEDAYUGUNUNG, BESUKI, TULUNGAGUNG, JAWA TIMUR, 66275, 66275','Wiji Suprapti','-','-','Wiji Suprapti','-','-','SMA',0,'0053185812','202cb962ac59075b964b07152d234b70','siswa'),
(185,'3054748059','-',13,'Satrio Bima Cahyo Putra','L','Tulungagung','2005-09-09','6285161311446','Tanjung, Rt2 RW2 NGUNUT, NGUNUT, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Iwan Nurcahyono','-','-','Yayuk Dwi Puspitarini','-','-','SMA',0,'3054748059','202cb962ac59075b964b07152d234b70','siswa'),
(186,'0062443756','-',13,'Cantika Ruli Ramadani','P','Trenggalek','2005-10-10','6285234409142','Dusun Gares RT. 027 RW. 004 TASIKMADU, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','Yuli Purwono','-','-','Nurul Hidayati','-','-','SMA',0,'0062443756','202cb962ac59075b964b07152d234b70','siswa'),
(187,'0057559453','-',13,'Muhammad Alif Ihsanun Na\'im','L','Tulungagung','2005-11-09','6285852099327','Notorejo, Gondang, T.Agung NOTOREJO, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Tatar Eko Setiawan','-','-','Lathifatur Rohmah','-','-','SMA',0,'0057559453','202cb962ac59075b964b07152d234b70','siswa'),
(188,'0069572725','-',13,'Salma Chaula Adilla','P','Tulungagung','2006-01-21','6281227748315','Dsn. Kemiri RT.002/RW.001, Ds. Kresikan KRESIKAN, TANGGUNGGUNUNG, TULUNGAGUNG, JAWA TIMUR, 66283, 66283','Eko Wahyudiono','-','-','Purwanti','-','-','SMA',0,'0069572725','202cb962ac59075b964b07152d234b70','siswa'),
(189,'0053022051','-',13,'Zaim Nur Amalia','P','Trenggalek','2005-10-16','6285816136070','JL. KI MANGUN SARKORO, BEJI, BOYOLANGU, KABUPATEN TULUNGAGUNG, JAWA TIMUR 66233 BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','Gunanto','-','-','Kartinah','-','-','SMA',0,'0053022051','202cb962ac59075b964b07152d234b70','siswa'),
(190,'0055524190','-',13,'Amalia Ghina Nafsi','P','Tulungagung','2005-10-23','','Jl.sentulan raya PANGGUNGREJO, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66214, 66214','Ahmad Ghozi','-','-','Istiqomah','-','-','SMA',0,'0055524190','202cb962ac59075b964b07152d234b70','siswa'),
(191,'0051074924','-',13,'Azizah Nahar Romadhoni','P','Tulungagung','2005-10-13','6281280015116','ade irma suryani SEMBUNG, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66312, 66312','Dewi Astutik Rahayu Ningrum S.Sos','-','-','Mutiyah','-','-','SMA',0,'0051074924','202cb962ac59075b964b07152d234b70','siswa'),
(192,'0053628451','-',13,'Diva Ayu Sevira','P','Tulungagung','2005-08-24','6281216035735','RT01/RW01 SITOYOBAGUS, BESUKI, TULUNGAGUNG, JAWA TIMUR, 66275, 66275','Muslan','-','-','Jinab','-','-','SMA',0,'0053628451','202cb962ac59075b964b07152d234b70','siswa'),
(193,'0061578115','-',13,'Gesang Dianisa Rahayu','P','Tulungagung','2006-01-24','6281231497827','JL.RAYA TANGGUNG, DSN KEMBANGAN RT 001/RW 002 KRESIKAN, TANGGUNGGUNUNG, TULUNGAGUNG, JAWA TIMUR, 66283, 66283','Fahrodim','-','-','Antin','-','-','SMA',0,'0061578115','202cb962ac59075b964b07152d234b70','siswa'),
(194,'0053830104','-',13,'Jovan Naufal Nur Faiz','L','Tulungagung','2005-03-04','6285648547425','Jalan Mastrip JEPUN, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66218, 66218','Nurhadi','-','-','Nova Kristiana','-','-','SMA',0,'0053830104','202cb962ac59075b964b07152d234b70','siswa'),
(195,'0058811155','-',13,'Muhammad Duta Prabu Alam','L','Tulungagung','2005-01-04','6282228165391','Jl.kapten kasihin/RT.002 RW.002 PLANDAAN, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66229, 66229','Abdul Malik','-','-','Istiawati','-','-','SMA',0,'0058811155','202cb962ac59075b964b07152d234b70','siswa'),
(196,'0068451017','-',13,'Niki Rizqi Putri Silvia Nadziroh','P','Tulungagung','2006-02-03','6285736276709','GURDOWIJOYO (RT/04 RW/06) GESIKAN, PAKEL, TULUNGAGUNG, JAWA TIMUR, 66273, 66273','Ahmad Damiri','-','-','Anis Fuadiyah','-','-','SMA',0,'0068451017','202cb962ac59075b964b07152d234b70','siswa'),
(197,'0055167417','-',13,'Rania Hanifatul Fitriyah','P','Tulungagung','2005-11-19','6285334814820','RT 001 RW 001 No 15 KARANGREJO, KARANGREJO, TULUNGAGUNG, JAWA TIMUR, 66253, 66253','Rabono','-','-','Rini Mufarokhah','-','-','SMA',0,'0055167417','202cb962ac59075b964b07152d234b70','siswa'),
(198,'0058812872','-',13,'Yosi Ema Rustiawan','L','Tulungagung','2005-07-26','6285806570925','DUSUN BENDILJET, RT 006 RW 005 KARANGTALUN, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Makrus','-','-','Siti Asropah','-','-','SMA',0,'0058812872','202cb962ac59075b964b07152d234b70','siswa'),
(199,'0053721961','-',13,'M. Rafif Aqiilah Bisri','L','Lamongan','2005-04-11','','Soukarno Hatta (04/02) KELUTAN, TRENGGALEK, TRENGGALEK, JAWA TIMUR, 66313, 66313','Ahmad Bisri','-','-','Nuri Anjarwati','-','-','SMA',0,'0053721961','202cb962ac59075b964b07152d234b70','siswa'),
(200,'0069908666','-',13,'Rizkya Agung Setyowicaksono','L','Tulungagung','2006-07-19','6285853067324','Darungan KEPUHREJO, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66252, 66252','Rokip','-','-','Nima Haryanti','-','-','SMA',0,'0069908666','202cb962ac59075b964b07152d234b70','siswa'),
(201,'0053869603','-',13,'Qurrotul A\'yunizzahro','P','Tulungagung','2005-04-05','6285932255728','HOS Cokroaminoto GEDANGSEWU, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66231, 66231','Im Mursid','-','-','Nurul Hidayati','-','-','SMA',0,'0053869603','202cb962ac59075b964b07152d234b70','siswa'),
(202,'0059398059','-',13,'Bangkit Tauladan Nasukha','L','Tulungagung','2005-05-20','6281358988005','Jl.mayor Sujadi timur RT03/RW 02 PLOSOKANDANG, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66221, 66221','Nikmaturohmah','-','-','Nikmaturohmah','-','-','SMA',0,'0059398059','202cb962ac59075b964b07152d234b70','siswa'),
(203,'0057496259','-',13,'Falia Rahma Mufidah','P','Tulungagung','2005-06-30','','NGUBALAN RT/RW 02/04 NGUBALAN, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Imam Masduki','-','-','Afif Khula Dawila','-','-','SMA',0,'0057496259','202cb962ac59075b964b07152d234b70','siswa'),
(204,'0056695710','-',13,'Arsalna Sulthon Fadilla','P','Tulungagung','2005-10-28','6285210326475','RT2/RW03 KALANGAN, NGUNUT, TULUNGAGUNG, JAWA TIMUR, 66292, 66292','Thoifur','-','-','Sutin','-','-','SMA',0,'0056695710','202cb962ac59075b964b07152d234b70','siswa'),
(205,'3058325959','-',13,'Fandyo Bariq Ramadhani Johan Purwanto','L','Tulungagung','2005-10-27','6281249091651','Jl.Bandung Campur Darat SURUHAN KIDUL, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Endi Purwanto','-','-','Tri Hermintari','-','-','SMA',0,'3058325959','202cb962ac59075b964b07152d234b70','siswa'),
(206,'0068573811','-',13,'Khoirul Mustofa','L','Trenggalek','2006-03-05','','J.l patimura MOYOKETEN, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66321, 66321','Setu','-','-','Sujiyah','-','-','SMA',0,'0068573811','202cb962ac59075b964b07152d234b70','siswa'),
(207,'0053721845','-',13,'Nabila Ainur Mahya','P','Tulungagung','2005-06-29','6285852833044','Jl. Ironggono Rt.2 Rw.2 no.23 desa panggungrejo kec. kauman kab. Tulungagung PANGGUNGREJO, KAUMAN, TULUNGAGUNG, JAWA TIMUR, 66261, 66261','Nur Susilo','-','-','Ratna Sari Kisworo','-','-','SMA',0,'0053721845','202cb962ac59075b964b07152d234b70','siswa'),
(208,'0062857207','-',13,'Amelia Iva Zohara','P','Tulungagung','2006-02-17','6285784175419','RT 002, RW 002, JALAN DESA KIPING KIPING, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Mudjito','-','-','Marsinah','-','-','SMA',0,'0062857207','202cb962ac59075b964b07152d234b70','siswa'),
(209,'0079072054','-',14,'Joyce Trista Nathaniela','P','Trenggalek','2006-07-19','6282244377750','RT. 22 RW. 07 GANDUSARI, GANDUSARI, TRENGGALEK, JAWA TIMUR, 66372, 66372','Bambang Cahyono','-','-','Titut Tri Rahayu','-','-','SMA',0,'0079072054','202cb962ac59075b964b07152d234b70','siswa'),
(210,'3056558468','-',14,'Hikmatul Izzah','P','Tulungagung','2005-08-11','6285755255305','ALAMAT : DUSUN SEDAYU RT/RW : 001/002 SUWARU, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Mohamad Saiful Hadi','-','-','Sunarti','-','-','SMA',0,'3056558468','202cb962ac59075b964b07152d234b70','siswa'),
(211,'3058071649','-',14,'Famila Nuri Najmi','P','Sidoarjo','2005-06-17','6285784291056','RT 015/RW 004 NGLAMPIR, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Isa Suryowanto','-','-','Tri Lestari Kartikawati','-','-','SMA',0,'3058071649','202cb962ac59075b964b07152d234b70','siswa'),
(212,'0062074753','-',14,'Rafly Al Fahrezi','L','Tulungagung','2006-06-26','6287723873537','DSN. BANTENGAN RT. 3 / RW. 3 BANTENGAN, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Muhsin','-','-','Suryati','-','-','SMA',0,'0062074753','202cb962ac59075b964b07152d234b70','siswa'),
(213,'0059986718','-',14,'Pramesti Regita Rahmadhani','P','Trenggalek','2005-10-05','6285232062575','RT 07 RW 02 TAWING, MUNJUNGAN, TRENGGALEK, JAWA TIMUR, 66365, 66365','Anwarudin','-','-','Suharti','-','-','SMA',0,'0059986718','202cb962ac59075b964b07152d234b70','siswa'),
(214,'0053930715','-',14,'Helfani Rahma Anggraeni','P','Tulungagung','2005-04-27','6285648098082','rt/001 rw/012 PULOSARI, NGUNUT, TULUNGAGUNG, JAWA TIMUR, 66292, 66292','Anton Rahmat Subagyo','-','-','Lilik Suryani','-','-','SMA',0,'0053930715','202cb962ac59075b964b07152d234b70','siswa'),
(215,'0063313671','-',14,'Nesza Fibriana Putri','P','Tulungagung','2006-02-28','6285648891804','RT/RW.002/002 SAMBIROBYONG, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Maryono','-','-','Ida Kristiana','-','-','SMA',0,'0063313671','202cb962ac59075b964b07152d234b70','siswa'),
(216,'0055993018','-',14,'Ridha Fitriana Mulyadewi','P','Tulungagung','2005-11-08','6281235119844','JL. MASTRIP GG 2 NO.22 RT 002, RW 006 JEPUN, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66218, 66218','Mulyono','-','-','Dewi Raditeni','-','-','SMA',0,'0055993018','202cb962ac59075b964b07152d234b70','siswa'),
(217,'0063006477','-',14,'Faltuma Rivi Mazania','P','Tulungagung','2006-01-26','6283845913550','jalan raya desa kiping KIPING, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Supar','-','-','Miftahul Faida','-','-','SMA',0,'0063006477','202cb962ac59075b964b07152d234b70','siswa'),
(218,'0052420239','-',14,'Dewi Pusaka Bhakti Ardiana','P','Tulungagung','2005-08-25','6281217979805','Jl. ASTANA GEDONG SUKODONO, KARANGREJO, TULUNGAGUNG, JAWA TIMUR, 66253, 66253','Puguh Harjono','-','-','Diyah Ariyanti','-','-','SMA',0,'0052420239','202cb962ac59075b964b07152d234b70','siswa'),
(219,'0052629333','-',14,'Fitri Safiatul Islamiyah','P','Tulungagung','2005-11-05','6285856177800','Jalan Wijaya Kusuma TUNGGULSARI, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66227, 66227','Yusi Mahluvi','-','-','Yusi Mahluvi','-','-','SMA',0,'0052629333','202cb962ac59075b964b07152d234b70','siswa'),
(220,'0063565054','-',14,'Etna Iyyana Bilqiya','P','Tulungagung','2006-03-24','6283193913487','JL. IGUSTI NGURAH RAI BAGO, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66218, 66218','Wahyu Sugeng Riyadi','-','-','Anik Sriyani','-','-','SMA',0,'0063565054','202cb962ac59075b964b07152d234b70','siswa'),
(221,'0053941568','-',14,'Bagus Ardiansyah Deka Asdinata','L','Tulungagung','2005-08-17','6281528463637','Karangtalun RT 01 RW 14 JABON, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Masngudin','-','-','Asih Sunarmi','-','-','SMA',0,'0053941568','202cb962ac59075b964b07152d234b70','siswa'),
(222,'0055351933','-',14,'Anisah Yunistya Arifin','P','Tulungagung','2005-06-10','6281358818266','dusun demangan rt/rw : 04/02 MOJOARUM, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Yuni Hartatik','-','-','Yuni Hartatik','-','-','SMA',0,'0055351933','202cb962ac59075b964b07152d234b70','siswa'),
(223,'0059897071','-',14,'Muhammad Azrul Romansyah','L','Tulungagung','2005-10-20','6285546648293','RT 03 RW 03 KEDUNGSOKO, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66215, 66215','Rudi Haryanto','-','-','Lilik Nurkhanifah','-','-','SMA',0,'0059897071','202cb962ac59075b964b07152d234b70','siswa'),
(224,'0058501783','-',14,'Shabilla Rohmadillah Putri','P','Trenggalek','2005-04-26','6282134015701','Dusun Krajan RT 02 RW 01 SAWAHAN, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','Rohmad','-','-','Paryatun','-','-','SMA',0,'0058501783','202cb962ac59075b964b07152d234b70','siswa'),
(225,'0057612594','-',14,'Khoirun Nadhiroh','P','Tulungagung','2005-07-21','6285711067235','RT. 02/RW. 01 WATES, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Dawud','-','-','Siti Nur Alifah','-','-','SMA',0,'0057612594','202cb962ac59075b964b07152d234b70','siswa'),
(226,'0052110600','-',14,'Alvin Aditya Nugroho','L','Tulungagung','2005-04-06','6283845913276','RT 5 RW 6 BOTORAN, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66213, 66213','Muhammad Zainul Mubin','-','-','Etik Purwati','-','-','SMA',0,'0052110600','202cb962ac59075b964b07152d234b70','siswa'),
(227,'3050322062','-',14,'Krisna Bagus Prabowo','L','Tulungagung','2005-04-21','6281331842982','Jalan Gajah Mada No.54F BANGOAN, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66229, 66229','Sapari','-','-','Kolipah','-','-','SMA',0,'3050322062','202cb962ac59075b964b07152d234b70','siswa'),
(228,'0068996237','-',14,'Ardi Ronnaan Pratama','L','Banjarmasin','2006-09-15','6288996931369','RT 3 RW 4 GILANG, NGUNUT, TULUNGAGUNG, JAWA TIMUR, 66292, 66292','Ineke Trisnawati','-','-','Ineke Trisnawati','-','-','SMA',0,'0068996237','202cb962ac59075b964b07152d234b70','siswa'),
(229,'0054202932','-',14,'Muhammad Kamaluddin Zaki','L','Tulungagung','2005-09-09','6285702711496','JL. KI MANGUN SARKORO, BEJI, BOYOLANGU, KABUPATEN TULUNGAGUNG, JAWA TIMUR 66233 BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','Masrodin','-','-','Ninik Subekti','-','-','SMA',0,'0054202932','202cb962ac59075b964b07152d234b70','siswa'),
(230,'0051281223','-',14,'Muhammad \'Abid Al Mahbub','L','Trenggalek','2005-10-13','6282114868129','RT. 30  RW. 05, Dusun Duren, Desa Tasikmadu TASIKMADU, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','Mahfud','-','-','Anis Masfiah','-','-','SMA',0,'0051281223','202cb962ac59075b964b07152d234b70','siswa'),
(231,'0061584082','-',14,'Hylmi Tri Widiastoro','L','Tulungagung','2006-05-07','6281249327962','Jl. Wijaya Kusuma RT 1 RW 1 TUNGGULSARI, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66222, 66222','Eko Prabowo','-','-','Dra.Wiwik Sri Lestari Mm','-','-','SMA',0,'0061584082','202cb962ac59075b964b07152d234b70','siswa'),
(232,'0068297776','-',14,'Muhammad Fikri Hamizan Halim','L','Tulungagung','2006-03-03','6289697078509','Jl. Ki Mangunsarkoro BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','Imran Halim','-','-','Dyah Kurniasari Basyir','-','-','SMA',0,'0068297776','202cb962ac59075b964b07152d234b70','siswa'),
(233,'0049147185','-',14,'Mochammad Fiqi Kurniawan','L','Tulungagung','2005-04-25','628993580659','RT 02 RW 01 PANGGUNGREJO, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66213, 66213','Maruf','-','-','Siti Dhurrohmah','-','-','SMA',0,'0049147185','202cb962ac59075b964b07152d234b70','siswa'),
(234,'0056480870','-',14,'Cesilia Indriasari','P','Magelang','2005-08-26','6285964330383','jl.sultan agung no.16 RT 001 RW 001 GENDINGAN, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66228, 66228','Murdianto','-','-','Solekah','-','-','SMA',0,'0056480870','202cb962ac59075b964b07152d234b70','siswa'),
(235,'0059189059','-',14,'Chandra Hafidz Wicaksono','L','Tulungagung','2005-03-20','','SULTAN AGUNG KETANON, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66226, 66226','Badrul Munir','-','-','Sukrismawati','-','-','SMA',0,'0059189059','202cb962ac59075b964b07152d234b70','siswa'),
(236,'0066596572','-',14,'Ellen Alexsa Andriyani','P','Semarang','2006-02-03','','RT 02 RW 03 BORO, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66221, 66221','Andre Sasongko','-','-','Kholifah','-','-','SMA',0,'0066596572','202cb962ac59075b964b07152d234b70','siswa'),
(237,'0067630906','-',14,'Endina Putri Shavyra','P','Tulungagung','2006-08-08','','RT.02/RW.01 Jl.Raya Sambijajar MIRIGAMBAR, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Budiono','-','-','Endang Kristin Firmandari','-','-','SMA',0,'0067630906','202cb962ac59075b964b07152d234b70','siswa'),
(238,'0066481180','-',14,'Galuh Saprilia Putri','P','Tulungagung','2006-04-08','','RT 01 RW 01 PINGGIRSARI, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66252, 66252','Warsi','-','-','Nurwiyati','-','-','SMA',0,'0066481180','202cb962ac59075b964b07152d234b70','siswa'),
(239,'0057702361','-',14,'Irvan Maulana','L','Trenggalek','2005-02-03','','JL. KI MANGUN SARKORO, BEJI, BOYOLANGU, KABUPATEN TULUNGAGUNG, JAWA TIMUR 66233 BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','Ichsanudin','-','-','Supiyah','-','-','SMA',0,'0057702361','202cb962ac59075b964b07152d234b70','siswa'),
(240,'0057167413','-',14,'Jahroo\' Khoirunnisaa\'','P','Tulungagung','2005-12-28','','JL. KI MANGUN SARKORO, BEJI, BOYOLANGU, KABUPATEN TULUNGAGUNG, JAWA TIMUR 66233 BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','Mujianto','-','-','Pindah Hartatik','-','-','SMA',0,'0057167413','202cb962ac59075b964b07152d234b70','siswa'),
(241,'0054079430','-',14,'Nada Husayna','P','Kuwait','2005-07-03','','JL. MT HARYONO NO. 51 JEPUN, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66218, 66218','Budi Setiyono','-','-','Etik Triana','-','-','SMA',0,'0054079430','202cb962ac59075b964b07152d234b70','siswa'),
(242,'0056809796','-',14,'Regista Agustin','P','Tulungagung','2005-08-01','','Jl. Raya Pelem (03/01) PELEM, CAMPURDARAT, TULUNGAGUNG, JAWA TIMUR, 66272, 66272','Turiman','-','-','Saodah','-','-','SMA',0,'0056809796','202cb962ac59075b964b07152d234b70','siswa'),
(243,'0068290225','-',14,'Yanuarta Caesar Abror','L','Tulungagung','2006-01-25','','Rt.005 Rw.003 KETANON, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66229, 66229','Irwan Prima Hartawan','-','-','Juwita Ratna Sari','-','-','SMA',0,'0068290225','202cb962ac59075b964b07152d234b70','siswa'),
(244,'0053339463','-',14,'Nasywa Imtiyaaz Firli','P','Tulungagung','2005-06-18','','RT 002/ RW 001 BLIMBING, REJOTANGAN, TULUNGAGUNG, JAWA TIMUR, 66293, 66293','Eko Suwito','-','-','Umi Mahmudah','-','-','SMA',0,'0053339463','202cb962ac59075b964b07152d234b70','siswa'),
(245,'0047310373','-',24,'Along Cahyono Putro','L','Tulungagung','2004-11-16','6282245953813','DUSUN WELAHAN RT 007 RW 002 TANGGULWELAHAN, BESUKI, TULUNGAGUNG, JAWA TIMUR, 66275, 66275','Nyono','-','-','Minarti','-','-','SMA',0,'0047310373','202cb962ac59075b964b07152d234b70','siswa'),
(246,'0056744197','-',24,'Firda Dyah Larasati','P','Tulungagung','2005-01-05','6285730712939','DSN. KRAJAN RT.01 RW.01 DS. TALUN KULON TALUN KULON, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Sutikno','-','-','Suriyah','-','-','SMA',0,'0056744197','202cb962ac59075b964b07152d234b70','siswa'),
(247,'0046654507','-',24,'Alfa Aditia Tama','L','Trenggalek','2004-12-18','6282245457161','DUSUN KRAJAN RT 004 RW 002 CRAKEN, MUNJUNGAN, TRENGGALEK, JAWA TIMUR, 66365, 66365','Ah. Jauhari','-','-','Sudarsih','-','-','SMA',0,'0046654507','202cb962ac59075b964b07152d234b70','siswa'),
(248,'0045214729','-',24,'Bathari Nafira Husna','P','Tulungagung','2004-12-30','6285156120103','JL. SUPRIYADI NO 66 TAMANAN, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66217, 66217','Halis Ridho Sanjoyo','-','-','Dina Wahyuningsih','-','-','SMA',0,'0045214729','202cb962ac59075b964b07152d234b70','siswa'),
(249,'0053658921','-',24,'Silvya Putri Handayani','P','Tulungagung','2005-02-15','6289662438138','Jalan raya Kendal Dusun Krajan RT 08 RW 04 KENDAL, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Tamaji','-','-','Endang Susanti','-','-','SMA',0,'0053658921','202cb962ac59075b964b07152d234b70','siswa'),
(250,'0043662862','-',24,'Deva Ayu Aristina','P','Tulungagung','2004-06-18','6285648857560','Jalan raya Sodo Dsn. Krenggan RT 03 RW 04 NGEBONG, PAKEL, TULUNGAGUNG, JAWA TIMUR, 66273, 66273','Erna Dwi Hayati','-','-','Erna Dwi Hayati','-','-','SMA',0,'0043662862','202cb962ac59075b964b07152d234b70','siswa'),
(251,'0043367639','-',24,'Ahmad Fatichul Ihsan','L','Blitar','2004-04-18','6281353455755','DSN. SALAM RT 02 RW 01 SALAM, WONODADI, BLITAR, JAWA TIMUR, 66155, 66155','H.Moh. Rofi`','-','-','Siti Mardiyah','-','-','SMA',0,'0043367639','202cb962ac59075b964b07152d234b70','siswa'),
(252,'3055211660','-',24,'Muhammad Roichan Hanafi','L','Tulungagung','2005-08-04','6281231632453','Jl. Raya Bandung-Prigi Dsn. Contong RT 06 RW 02 BANDUNG, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Ruhana','-','-','Ruhana','-','-','SMA',0,'3055211660','202cb962ac59075b964b07152d234b70','siswa'),
(253,'3053056653','-',24,'Moh Irsyad Naufal Apta Aqila','L','Tulungagung','2005-02-28','6285792743517','Dsn Banjaran RT 01 RW 01 Ds Domasan DOMASAN, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Moh Badarudin Ehsan','-','-','Yuni Priyanti','-','-','SMA',0,'3053056653','202cb962ac59075b964b07152d234b70','siswa'),
(254,'0047075211','-',24,'Elva Hesti Ninda Riyani','P','Trenggalek','2004-09-22','6285215509796','Dusun Payaman RT.11 RW.05 Desa. Durenan Kec.Durenan Trenggalek DURENAN, DURENAN, TRENGGALEK, JAWA TIMUR, 66381, 66381','Suparji','-','-','Muntamah','-','-','SMA',0,'0047075211','202cb962ac59075b964b07152d234b70','siswa'),
(255,'0046577909','-',24,'Wisam Ahmada Tuqo Wahdana','L','Tulungagung','2004-12-07','6289503597731','Perumahan Sobontoro Indah RT 01 RW 05 SOBONTORO, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66232, 66232','Wiwik Sudarwati','-','-','Wiwik Sudarwati','-','-','SMA',0,'0046577909','202cb962ac59075b964b07152d234b70','siswa'),
(256,'3054107924','-',24,'Elsa Yunna Salsabila','P','Tulungagung','2005-02-21','6285749905855','JL. KI MANGUN SARKORO, BEJI, BOYOLANGU, KABUPATEN TULUNGAGUNG, JAWA TIMUR 66233 BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','Malik','-','-','Siti Mahmudah','-','-','SMA',0,'3054107924','202cb962ac59075b964b07152d234b70','siswa'),
(257,'0042842503','-',24,'Mohammad Isyhar \'Aziz Azzaki','L','Trenggalek','2004-08-29','6282334784412','JL. KI MANGUN SARKORO, BEJI, BOYOLANGU, KABUPATEN TULUNGAGUNG, JAWA TIMUR 66233 BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','Safrudin','-','-','Siti Malikah','-','-','SMA',0,'0042842503','202cb962ac59075b964b07152d234b70','siswa'),
(258,'0056221787','-',24,'Sifana Sofia Imani','P','Tulungagung','2005-07-19','6285648880963','Dsn. Sumberjo RT  03 RW 02 PELEM, CAMPURDARAT, TULUNGAGUNG, JAWA TIMUR, 66272, 66272','Iksannudin','-','-','Musri\'in','-','-','SMA',0,'0056221787','202cb962ac59075b964b07152d234b70','siswa'),
(259,'0058789189','-',24,'Nathania Alifatus Salsabila','P','Trenggalek','2005-08-06','6285784245461','DUSUN KRAJAN RT 20 RW 06 DESA WATUAGUNG, KECAMATAN WATULIMO, KABUPATEN TRENGGALEK WATUAGUNG, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','Eko Budi Cahyono','-','-','Ida Royati','-','-','SMA',0,'0058789189','202cb962ac59075b964b07152d234b70','siswa'),
(260,'0043323124','-',24,'Aulia Septyana Muchika','P','Blitar','2004-09-24','6285230545739','JL. KI MANGUN SARKORO, BEJI, BOYOLANGU, KABUPATEN TULUNGAGUNG, JAWA TIMUR 66233 BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','Muchsan Alim','-','-','Ika Wahyuni','-','-','SMA',0,'0043323124','202cb962ac59075b964b07152d234b70','siswa'),
(261,'0046997951','-',24,'Salsabila Aghnia Nazzala','P','Tulungagung','2004-06-15','6285704040859','DSN. TANJUNG RT 003 RW 002 SAMBIJAJAR, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Robingi','-','-','Siti Zulfana Farida','-','-','SMA',0,'0046997951','202cb962ac59075b964b07152d234b70','siswa'),
(262,'0046971880','-',24,'Atika Nur Laila','P','Tulungagung','2004-12-23','6285736927010','DS JUNJUNG DUSUN KRAJAN RT 06 RW 03 JUNJUNG, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Bambang Efendi','-','-','Siti Anisah','-','-','SMA',0,'0046971880','202cb962ac59075b964b07152d234b70','siswa'),
(263,'0055442214','-',24,'Moh Akbar Jujur Luqmana','L','Tulungagung','2005-02-06','6285806971440','Dsn. Banaran RT 02 RW 01 SUKOREJO, KARANGREJO, TULUNGAGUNG, JAWA TIMUR, 66253, 66253','Lu Lu Ul Khisbiyah','-','-','Lu Lu Ul Khisbiyah','-','-','SMA',0,'0055442214','202cb962ac59075b964b07152d234b70','siswa'),
(264,'0046574670','-',24,'Afrina Alivia Inatsa','P','Tulungagung','2004-09-12','6285704535999','DUSUN KLATEN RT 002 RW 001 KARANGSONO, NGUNUT, TULUNGAGUNG, JAWA TIMUR, 66292, 66292','Eva Nasrul Ghozi','-','-','Erna Dwi Anjarwati','-','-','SMA',0,'0046574670','202cb962ac59075b964b07152d234b70','siswa'),
(265,'0053192836','-',24,'Muhammad Nizam Fakhri','L','Tulungagung','2005-03-23','6281328113282','Jl. Papandayan Gang 3 RT 02 RW 02 KAUMAN, KAUMAN, TULUNGAGUNG, JAWA TIMUR, 66261, 66261','Wasis Bintoro','-','-','Faridha Kusumaningtyas','-','-','SMA',0,'0053192836','202cb962ac59075b964b07152d234b70','siswa'),
(266,'0047096090','-',24,'Elysia Qotrunnada','P','Tulungagung','2004-09-02','6285731801860','dusun pelem rt/rw 001/003 SERUT, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66235, 66235','Asngari','-','-','Hartin Maisaroh','-','-','SMA',0,'0047096090','202cb962ac59075b964b07152d234b70','siswa'),
(267,'0059848501','-',24,'Luthfiyya Ayu Noor Chandra','P','Karanganyar','2005-02-15','6281334301620','JL. KI MANGUN SARKORO, BEJI, BOYOLANGU, KABUPATEN TULUNGAGUNG, JAWA TIMUR 66233 BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','Wardoyo, St','-','-','Tri Rahayu, S.E','-','-','SMA',0,'0059848501','202cb962ac59075b964b07152d234b70','siswa'),
(268,'0046919624','-',24,'Clara Vidyawati Suyono','P','Tulungagung','2004-12-14','6281343361467','DUSUN CERME RT 03 RW 03 GAMPING, CAMPURDARAT, TULUNGAGUNG, JAWA TIMUR, 66272, 66272','Suyono','-','-','Andjarwati','-','-','SMA',0,'0046919624','202cb962ac59075b964b07152d234b70','siswa'),
(269,'0045526712','-',24,'Nur Putri Oktavianda','P','Tulungagung','2004-10-30','6285258316530','DSN. KENDAL RT.001 RW .001 SOKO, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Wiwik Suratmini','-','-','Wiwik Suratmini','-','-','SMA',0,'0045526712','202cb962ac59075b964b07152d234b70','siswa'),
(270,'3041202684','-',24,'Luluk Il Fitria','P','Tulungagung','2004-11-19','6285748250620','DESA KALIDAWIR RT.04 RW.07 KALIDAWIR, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Muntamah','-','-','Muntamah','-','-','SMA',0,'3041202684','202cb962ac59075b964b07152d234b70','siswa'),
(271,'0054704297','-',24,'Putri Lailatun Nafiah','P','Tulungagung','2005-01-14','6285815133646','DUSUN KARANGSARI RT 23 RW 06 DESA SIDOMULYO SIDOMULYO, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Munar','-','-','Rois Patoyah','-','-','SMA',0,'0054704297','202cb962ac59075b964b07152d234b70','siswa'),
(272,'0056589463','-',24,'Ovy Fika Anjeli Febriani','P','Tulungagung','2005-02-09','6281335555106','JL. KI MANGUN SARKORO, BEJI, BOYOLANGU, KABUPATEN TULUNGAGUNG, JAWA TIMUR 66233 BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','Djaino','-','-','Nartiyah','-','-','SMA',0,'0056589463','202cb962ac59075b964b07152d234b70','siswa'),
(273,'0052169670','-',24,'Adenda Khairunisa','P','Trenggalek','2005-01-25','6281357254072','DUSUN PRIGI RT 024 RW 005 PRIGI, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','Wowo Tribawa','-','-','Erna Wahyuni','-','-','SMA',0,'0052169670','202cb962ac59075b964b07152d234b70','siswa'),
(274,'0044515242','-',24,'Kanaya Nugita','P','Trenggalek','2004-07-17','6281450191075','JL. KI MANGUN SARKORO, BEJI, BOYOLANGU, KABUPATEN TULUNGAGUNG, JAWA TIMUR 66233 BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','Sugito','-','-','Nurjanah','-','-','SMA',0,'0044515242','202cb962ac59075b964b07152d234b70','siswa'),
(275,'0045651780','-',24,'Daris Salamah','P','Blitar','2004-08-31','6283846900712','JL. SUROJOYO RT 03 RW 03 JATINOM, KANIGORO, BLITAR, JAWA TIMUR, 66171, 66171','Sumaji','-','-','Kholis Setiani','-','-','SMA',0,'0045651780','202cb962ac59075b964b07152d234b70','siswa'),
(276,'0045757600','-',24,'Devita Mahardika Salsabila','P','Tulungagung','2004-08-17','6281332137492','DUSUN KRAJAN RT 03 RW 01 BANGUNMULYO, PAKEL, TULUNGAGUNG, JAWA TIMUR, 66273, 66273','Mujito','-','-','Winarsih','-','-','SMA',0,'0045757600','202cb962ac59075b964b07152d234b70','siswa'),
(277,'0043220910','-',24,'Alyzia Dwi Nafadilla','P','Tulungagung','2004-05-30','6289619557733','Dsn. NGRENGIT RT 002 RW 001 NGRANTI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66271, 66271','Ali Imron','-','-','Siti Nafiah','-','-','SMA',0,'0043220910','202cb962ac59075b964b07152d234b70','siswa'),
(278,'0049684240','-',24,'Elyana Nur\'aini','P','Tulungagung','2004-07-11','6281231040603','Dsn. Solam RT 01 RW 08 Notorejo, Gondang NOTOREJO, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Aly Muchsin','-','-','Miftahul Jannah','-','-','SMA',0,'0049684240','202cb962ac59075b964b07152d234b70','siswa'),
(279,'0047118167','-',24,'Ilyas Editya Pranata Putra','L','Tulungagung','2004-09-29','6281235275617','DUSUN KRAJAN RT 01 RW 04 DUKUH, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Dwi Andy Cahyono','-','-','Titik Catur Riwayanti','-','-','SMA',0,'0047118167','202cb962ac59075b964b07152d234b70','siswa'),
(280,'0046971633','-',24,'Nikmal Maula Hikmah Nadhir','P','Tulungagung','2004-09-02','6282330098785','Dsn. Ngelo, RT 05 RW 01 Ds. Jabalsari JABALSARI, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 66291, 66291','Muksim','-','-','Supiantin','-','-','SMA',0,'0046971633','202cb962ac59075b964b07152d234b70','siswa'),
(281,'0046286918','-',25,'Salma Hamidah','P','Trenggalek','2004-08-08','6281249309874','Jln Ade Irma Suryani 10B Sembung SEMBUNG, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66213, 66213','Zainal Arifin','-','-','Nurul Hidayah','-','-','SMA',0,'0046286918','202cb962ac59075b964b07152d234b70','siswa'),
(282,'0063845837','-',25,'Maulana Joesoef Ocke Satrianie','L','Tulungagung','2006-04-10','6281259056623','JL. P. J. SUDIRMAN 6 NO 42 RT 01 RW 02 KEPATIHAN, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 64394, 64394','Agus Setiyoko','-','-','Mahmudah','-','-','SMA',0,'0063845837','202cb962ac59075b964b07152d234b70','siswa'),
(283,'0046668085','-',25,'Zidan Ahmad Nuril A\'raaf','L','Tulungagung','2004-08-20','628589579149','Dsn. Pundensari RT 03 RW 03 REJOTANGAN, REJOTANGAN, TULUNGAGUNG, JAWA TIMUR, 66293, 66293','Agus Aman Wahyudi','-','-','Diyas Suciati','-','-','SMA',0,'0046668085','202cb962ac59075b964b07152d234b70','siswa'),
(284,'0047079698','-',25,'Zahra Cahya Kamila','P','Tulungagung','2004-08-27','6282132190521','JL. KI HAJAR DEWANTARA RT 003 RW 002 BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','Mochamad Mochson','-','-','Mistin','-','-','SMA',0,'0047079698','202cb962ac59075b964b07152d234b70','siswa'),
(285,'3042752519','-',25,'Ilyasa Ainu Adzim','L','Trenggalek','2004-11-15','6281456129665','DUSUN TAWING RT 21 RW 07 NGADISUKO, DURENAN, TRENGGALEK, JAWA TIMUR, 66381, 66381','Mukosim','-','-','Winaryati','-','-','SMA',0,'3042752519','202cb962ac59075b964b07152d234b70','siswa'),
(286,'0046996123','-',25,'Akmalia Fauziyah','P','Tulungagung','2004-11-07','6285706406030','Dsn. Pulosari RT 003 RW 009 PULOSARI, NGUNUT, TULUNGAGUNG, JAWA TIMUR, 66292, 66292','Imam Fauji','-','-','Ana Umiyaroh','-','-','SMA',0,'0046996123','202cb962ac59075b964b07152d234b70','siswa'),
(287,'0051382683','-',25,'Aprilia Ika Prisanti','P','Trenggalek','2005-04-17','6282228311761','Dusun Gunungkembar RT. 39 RW. 09 Desa Tawing TAWING, MUNJUNGAN, TRENGGALEK, JAWA TIMUR, 66365, 66365','Sarto','-','-','Kayatin','-','-','SMA',0,'0051382683','202cb962ac59075b964b07152d234b70','siswa'),
(288,'0046469457','-',25,'Sheila Fahru Nisa','P','Blitar','2004-05-09','6281654919476','Jl. Raya Pikatan Wonodadi Blitar Rt/Rw 002/002 PIKATAN, WONODADI, BLITAR, JAWA TIMUR, 66155, 66155','Mohammad Saiful Khalim','-','-','Laelatus Sholekah','-','-','SMA',0,'0046469457','202cb962ac59075b964b07152d234b70','siswa'),
(289,'0053719312','-',25,'Hafizh Zaky Handoko','L','Tulungagung','2005-07-03','6289506033953','JALAN RAYA GONDANG DUSUN KRAJAN RT 01 RW 05 GONDANG, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Nunung Tri Handoko','-','-','Elysa Yuli Nur\'aini','-','-','SMA',0,'0053719312','202cb962ac59075b964b07152d234b70','siswa'),
(290,'0043961016','-',25,'Siti Anisaur Rohman','P','Tulungagung','2004-05-24','6281575275242','RT/RW : 003/004 Ds. Padangan Kec. Ngantru Kab. Tulungagung PADANGAN, NGANTRU, TULUNGAGUNG, JAWA TIMUR, 66252, 66252','Suwarji','-','-','Wiwik Nurwahyuni','-','-','SMA',0,'0043961016','202cb962ac59075b964b07152d234b70','siswa'),
(291,'0058946766','-',25,'A. Arinal Haq','L','Trenggalek','2005-01-20','628563537979','DUSUN PUCANGAN RT 001 RW 001 PANGGUNGSARI, DURENAN, TRENGGALEK, JAWA TIMUR, 66381, 66381','Zaenal Arifin','-','-','Siti Roisah','-','-','SMA',0,'0058946766','202cb962ac59075b964b07152d234b70','siswa'),
(292,'0049524285','-',25,'Ilyasa Edit Prasetya Putra','L','Tulungagung','2004-09-29','6281235275618','Dsn. Krajan RT 01 RW 04 DUKUH, GONDANG, TULUNGAGUNG, JAWA TIMUR, 66263, 66263','Dwi Andy Cahyono','-','-','Titik Catur Riwayanti','-','-','SMA',0,'0049524285','202cb962ac59075b964b07152d234b70','siswa'),
(293,'0053671210','-',25,'Fadia Apriliani','P','Tulungagung','2005-04-04','6285328266568','JL. KI MANGUN SARKORO, BEJI, BOYOLANGU, KABUPATEN TULUNGAGUNG, JAWA TIMUR 66233 BEJI, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66233, 66233','Mujiat','-','-','Umi Musya\'adah','-','-','SMA',0,'0053671210','202cb962ac59075b964b07152d234b70','siswa'),
(294,'0059827205','-',25,'Adinda Dwista Prilensiahadi','P','Tulungagung','2005-04-24','6289634415419','JL. Langsep Dusun Kedung Bendo RT 3 RW 1 KEPUH, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66234, 66234','Samsul Hadi','-','-','Endang Tri Wahjoeni','-','-','SMA',0,'0059827205','202cb962ac59075b964b07152d234b70','siswa'),
(295,'0047053228','-',25,'Via Tri Nadia','P','Tulungagung','2004-04-06','62859189674713','RT 01/RW 01 Ds.Kates, Kec.Kauman, Kab.Tulungagung KATES, KAUMAN, TULUNGAGUNG, JAWA TIMUR, 66261, 66261','Supriyono','-','-','Martun','-','-','SMA',0,'0047053228','202cb962ac59075b964b07152d234b70','siswa'),
(296,'3052222503','-',25,'Salma Nur Azizah','P','Tulungagung','2005-01-26','6285232696528','Dsn. Krajan RT 01 RW 02 Ds. Bangoan, Kec . Kedungwaru, Kab. Tulungagung BANGOAN, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66251, 66251','Asrori Mustofa','-','-','Nanik Nuraini','-','-','SMA',0,'3052222503','202cb962ac59075b964b07152d234b70','siswa'),
(297,'3049476400','-',25,'Arni Septia Kurnia Sari','P','Tulungagung','2004-09-08','6285755045313','JLN. GENTUNGAN DSN. KRAJAN RT 004 RW 001 BETAK, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Muhlasim','-','-','Yeni Astutik','-','-','SMA',0,'3049476400','202cb962ac59075b964b07152d234b70','siswa'),
(298,'0047071389','-',25,'Lisna Putri Agustin','P','Rembang','2007-08-16','6285733515725','Dusun Sanggrahan RT 01 RW 03 Lor Desa Sanggrahan Kecamatan Boyolangu SANGGRAHAN, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66271, 66271','Karyo Utomo','-','-','Maesaroh','-','-','SMA',0,'0047071389','202cb962ac59075b964b07152d234b70','siswa'),
(299,'0053734890','-',25,'Alifa Shofia Bilqis','P','Trenggalek','2005-04-15','6282257500519','Dusun Ngelo RT 16 RW 08 SUKORAME, GANDUSARI, TRENGGALEK, JAWA TIMUR, 66372, 66372','Atina Shofawati','-','-','Atina Shofawati','-','-','SMA',0,'0053734890','202cb962ac59075b964b07152d234b70','siswa'),
(300,'0053713118','-',25,'Nadjwa Putri Qomariyah','P','Tulungagung','2005-01-12','6285536727430','JL. KARTODINOLO DSN. NGRAWAN RT 01 RW 08 TUNGGANGRI, KALIDAWIR, TULUNGAGUNG, JAWA TIMUR, 66281, 66281','Qomari','-','-','Umi Sholikhah','-','-','SMA',0,'0053713118','202cb962ac59075b964b07152d234b70','siswa'),
(301,'0045187693','-',25,'Fina Nadhirotur Risyda','P','Tulungagung','2004-07-28','6281450191807','Dusun Tugu Bancang RT 024 RW 009 DURENAN, DURENAN, TRENGGALEK, JAWA TIMUR, 66381, 66381','Maulawarman','-','-','Siti Mudrikah','-','-','SMA',0,'0045187693','202cb962ac59075b964b07152d234b70','siswa'),
(302,'0049711555','-',25,'Muhammad Roif Balighoturrosyidin','L','Tulungagung','2004-04-30','6289612135941','DSN. DONOREJO RT 03 RW 04 TAPAN, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66251, 66251','Kariadi','-','-','Dwi Susiana','-','-','SMA',0,'0049711555','202cb962ac59075b964b07152d234b70','siswa'),
(303,'3044541857','-',25,'Oktavia Lisa Nurhalizah','P','Tulungagung','2004-10-05','628814965070','JL. P. DIPONEGORO V/95 RT 003 RW 002 TAMANAN, TULUNGAGUNG, TULUNGAGUNG, JAWA TIMUR, 66217, 66217','Muhammad Mukhlis','-','-','Ida Nurhidayati','-','-','SMA',0,'3044541857','202cb962ac59075b964b07152d234b70','siswa'),
(304,'0046270436','-',25,'Ayensa Tia Awalyna','P','Tulungagung','2004-09-13','62895397047072','Dsn.Gedangsewu selatan Ds.Gedangsewu 001/002 Boyolangu Tulungagung GEDANGSEWU, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66231, 66231','Endik Kuswanto','-','-','Aida Mei Tri Nur Aini','-','-','SMA',0,'0046270436','202cb962ac59075b964b07152d234b70','siswa'),
(305,'0053671211','-',25,'Yetta Fredella Ailsa','P','Tulungagung','2005-05-02','6285608190366','Dsn. Campurjanggrang RT.002 RW.014 Ds. Campurdarat CAMPURDARAT, CAMPURDARAT, TULUNGAGUNG, JAWA TIMUR, 66272, 66272','Edi Waluyo','-','-','Lina Indrawati','-','-','SMA',0,'0053671211','202cb962ac59075b964b07152d234b70','siswa'),
(306,'0047071145','-',25,'Helena Reka Yulianda','P','Tulungagung','2004-07-27','6285745679964','RT 04 RW 02 BOYOLANGU, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66271, 66271','Rony Febrianto','-','-','Yuni Rusmaidah','-','-','SMA',0,'0047071145','202cb962ac59075b964b07152d234b70','siswa'),
(307,'0032781136','-',25,'Ahmad Rizqi Hidayat','L','Kediri','2003-12-08','62895413356936','DUSUN TAWANGREJO RT 004 RW 002 TAWANGREJO, WONODADI, BLITAR, JAWA TIMUR, 66155, 66155','Suhadi','-','-','Mulyati','-','-','SMA',0,'0032781136','202cb962ac59075b964b07152d234b70','siswa'),
(308,'0044603409','-',25,'Mochammad Ananta Ardiansyah','L','Tulungagung','2004-10-13','6281358943837','DSN. KAUMAN RT 03 RW 01 CAMPURDARAT, CAMPURDARAT, TULUNGAGUNG, JAWA TIMUR, 66272, 66272','Mochamad Soleh','-','-','Yuni Anjar Wati','-','-','SMA',0,'0044603409','202cb962ac59075b964b07152d234b70','siswa'),
(309,'0056805641','-',25,'Zulmasula Azfiruh Rizfah','P','Tulungagung','2005-01-19','6281233569493','DSN. TUGU RT 02 RW 01  DS. SOKO SOKO, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Munib Ashari','-','-','Ida Rahmawati','-','-','SMA',0,'0056805641','202cb962ac59075b964b07152d234b70','siswa'),
(310,'0046577870','-',25,'Muhamad Nu\'ma Addiin Setiaji','L','Tulungagung','2004-06-17','6281386266184','Dsn. Krajan RT 09 RW 03 JUNJUNG, SUMBERGEMPOL, TULUNGAGUNG, JAWA TIMUR, 65291, 65291','Setiaji','-','-','Siti Masruroh','-','-','SMA',0,'0046577870','202cb962ac59075b964b07152d234b70','siswa'),
(311,'0047090092','-',25,'Indar Kholidah','P','Tulungagung','2004-04-08','6285748593764','Jalan Raya Pucung Kidul RT 01 RW 01 PUCUNG KIDUL, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66271, 66271','Rofingan','-','-','Astutik','-','-','SMA',0,'0047090092','202cb962ac59075b964b07152d234b70','siswa'),
(312,'0042264425','-',25,'Sofia Putri Nur Ramadhani','P','Tulungagung','2004-10-14','6287849768226','DUSUN PELEM RT 001 RW 001 DESA SERUT KECAMATAN BOYOLANGU, KABUPATEN TULUNGAGUNG SERUT, BOYOLANGU, TULUNGAGUNG, JAWA TIMUR, 66235, 66235','Sujepri','-','-','Dwi Anjarwati','-','-','SMA',0,'0042264425','202cb962ac59075b964b07152d234b70','siswa'),
(313,'0046472992','-',25,'Hanum Nur Habibah','P','Tulungagung','2004-12-28','6281334708148','Dsn. Gempolan RT 03 RW 01 KETANON, KEDUNGWARU, TULUNGAGUNG, JAWA TIMUR, 66226, 66226','Daruno Arifin','-','-','Isroatul Mu\'adah','-','-','SMA',0,'0046472992','202cb962ac59075b964b07152d234b70','siswa'),
(314,'0047053270','-',25,'Muhammad Ziyan El Haq','L','Tulungagung','2004-05-06','6285231344655','Dusun Sendung RT 003 RW003 KATES, KAUMAN, TULUNGAGUNG, JAWA TIMUR, 66261, 66261','Mahmudun','-','-','Sriyatun','-','-','SMA',0,'0047053270','202cb962ac59075b964b07152d234b70','siswa'),
(315,'0049195370','-',25,'Ahsana Isma Widy Nurhamda','L','Trenggalek','2004-04-29','6285746500380','Dusun Waru RT 08 RW 03 Desa Slawe SLAWE, WATULIMO, TRENGGALEK, JAWA TIMUR, 66382, 66382','Anik Widyawati','-','-','Anik Widyawati','-','-','SMA',0,'0049195370','202cb962ac59075b964b07152d234b70','siswa'),
(316,'0053798491','-',25,'Agnes Aqidatul Azizah','P','Tulungagung','2005-03-05','6285648609319','DS.NGUNGGAHAN, DSN.KALIANYAR, RT 4, RW 1 ,KEC.BANDUNG, KAB.TULUNGAGUNG NGUNGGAHAN, BANDUNG, TULUNGAGUNG, JAWA TIMUR, 66274, 66274','Suradi','-','-','Nurul Khoiriyah','-','-','SMA',0,'0053798491','202cb962ac59075b964b07152d234b70','siswa');

/*Table structure for table `tbl_surat` */

DROP TABLE IF EXISTS `tbl_surat`;

CREATE TABLE `tbl_surat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `jenis` enum('berita_acara','nota_dinas','cuti_tahunan','permohonan_studi','surat_kuasa','sppd','surat_dispen','surat_skkb','surat_tugas','surat_balasan','surat_izin_kegiatan','surat_izin_penelitian','suket_pengganti_ijazah','suket_siswa','suket_guru','surat_mutasi_siswa_keluar','surat_mutasi_siswa_masuk','surat_panggilan','surat_pemberitahuan','surat_pengantar','surat_permohonan_narasumber','surat_pernyataan','surat_pesanan','surat_rekom_guru','surat_rekom_siswa','surat_undangan') DEFAULT NULL,
  `no_surat` varchar(65) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `tgl_pelaksanaan` date DEFAULT NULL,
  `tgl_pelaksanaan2` date DEFAULT NULL,
  `waktu` varchar(30) DEFAULT NULL,
  `tempat` text DEFAULT NULL,
  `kepada` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `perihal` text DEFAULT NULL,
  `ttd_kamad` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tgl_pembuatan` date DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  `pangkat` varchar(50) DEFAULT 'guru',
  `id_detail_kelas` int(11) DEFAULT 0,
  `hapus` enum('y','n') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat` */

insert  into `tbl_surat`(`id`,`jenis`,`no_surat`,`hari`,`tgl_pelaksanaan`,`tgl_pelaksanaan2`,`waktu`,`tempat`,`kepada`,`alamat`,`perihal`,`ttd_kamad`,`keterangan`,`catatan`,`tgl_pembuatan`,`id_pemohon`,`pangkat`,`id_detail_kelas`,`hapus`) values 
(1,'nota_dinas','2345/Ma.13.04.02/HM.01/11/2022','Hari Senin','2022-11-16',NULL,'13.00','Aulan MAN 2 Tulungagung','Bapak ibu guru Man 2 Tulungagung',NULL,'Rapat Dinas',NULL,'Hari guru',NULL,'2022-11-11',107,'guru',0,'n'),
(2,'nota_dinas','2021/Ma.13.04.02/HM.01/11/2022','Sabtu','2022-11-19',NULL,'08:00 WIB','Aula MAN 2 TULUNGAGUNG','Bapak/Ibu Guru Man 2 Tulungagung',NULL,'Undangan',NULL,'Rapat Sosialisasi Aplikasi Persuratan MAN 2 Tulungagung',NULL,'2022-11-11',5,'guru',0,'n'),
(3,'nota_dinas','','Sabtu','2022-11-11',NULL,'13.00 wib','Ruang meeting','Bapak / Ibu Guru MAN  2 Tulungagung',NULL,'Undangan',NULL,'Rapat Sosialisasi Aplikasi Persuratan MAN 2 Tulungagung',NULL,'2022-11-11',69,'guru',0,'n'),
(4,'nota_dinas','','Jumat','2022-11-25',NULL,'06.45 - Selesai','Halaman Manduta','Bapak Ibu guru',NULL,'Undangan',NULL,'Upacara Hari Guru Nasional',NULL,'2022-11-11',89,'guru',0,'n'),
(5,'nota_dinas','','Sabtu','2022-11-22',NULL,'','Man 2 Tulungagung','Bapak/guru Man 2 Tulungagung',NULL,'Undangan',NULL,'Rapat sosialisasi aplikasi persuratan Man 2 Tulungagung',NULL,'2022-11-11',86,'guru',0,'n'),
(6,'nota_dinas','','Senin','2022-11-14',NULL,'10.00','Lab biologi','Bpk ibu guru MAN 2 Tulungagung',NULL,'Undangan',NULL,'Rapat Dinas',NULL,'2022-11-11',74,'guru',0,'n'),
(7,'nota_dinas','','Senin','2022-11-14',NULL,'8.00 - 10.00','Meeting Room','Bapak/ Ibu Guru MAN 2 Tulungagung',NULL,'Surat Tugas Raker EDM',NULL,'Raker PDM',NULL,'2022-11-11',85,'guru',0,'n'),
(8,'nota_dinas','','Sabtu','2022-11-12',NULL,'15.00','Ruang guru','Guru',NULL,'Undangan',NULL,'Rapat koordinasi',NULL,'2022-11-11',67,'guru',0,'n'),
(9,'surat_dispen',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-11',5,'guru',0,'n'),
(10,'nota_dinas','','Sabtu','2022-11-12',NULL,'13.00-14.00','Ruang Guru','Bapak Ibu Guru',NULL,'Rapat Dinas',NULL,'Sosialisasi PAS',NULL,'2022-11-11',74,'guru',0,'n'),
(11,'surat_kuasa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-20',5,'guru',0,'n');

/*Table structure for table `tbl_surat_balasan` */

DROP TABLE IF EXISTS `tbl_surat_balasan`;

CREATE TABLE `tbl_surat_balasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `tugas_diterima` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `bulan_awal` varchar(100) DEFAULT NULL,
  `bulan_akhir` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_balasan` */

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

/*Table structure for table `tbl_surat_izin_penelitian` */

DROP TABLE IF EXISTS `tbl_surat_izin_penelitian`;

CREATE TABLE `tbl_surat_izin_penelitian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `nama_mhs` varchar(100) DEFAULT NULL,
  `nim` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `kampus` text DEFAULT NULL,
  `judul` text DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_izin_penelitian` */

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_kuasa` */

insert  into `tbl_surat_kuasa`(`id_surat_kuasa`,`id_surat`,`id_guru`,`nip`,`pemberi_kuasa`,`pangkat`,`jabatan_pemberi_kuasa`,`instansi`,`penerima_kuasa`,`tempat_lahir`,`tanggal_lahir`,`jabatan_penerima_kuasa`,`ket`) values 
(1,11,5,'155','Edo','III A','Guru','MAN 2 Tulungagung','aku','Tulungagung','2022-11-16','guru','guru');

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
  `status_notif` enum('belum','ditolak','diterima','diajukan') DEFAULT 'belum',
  `notif` enum('belum','dilihat') DEFAULT 'belum',
  `catatan` text DEFAULT NULL,
  `tgl_proses` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_tanda_tangan` */

insert  into `tbl_tanda_tangan`(`id`,`id_surat`,`id_user`,`status`,`status_notif`,`notif`,`catatan`,`tgl_proses`) values 
(1,1,1,'cek','diajukan','belum',NULL,NULL),
(2,1,4,'diterima','diterima','belum','benar','2022-11-11 14:46:53'),
(3,1,3,'diterima','diterima','belum','acc','2022-11-11 14:46:18'),
(4,1,2,'diterima','diterima','belum','acc','2022-11-11 14:45:59'),
(5,1,107,'diterima','diterima','belum','','2022-11-11 14:43:54'),
(6,2,1,'cek','diajukan','belum',NULL,NULL),
(7,2,4,'diterima','diterima','dilihat','betul','2022-11-11 14:37:36'),
(8,2,3,'diterima','diterima','belum','acc','2022-11-11 14:36:55'),
(9,2,2,'diterima','diterima','belum','acc','2022-11-11 14:35:38'),
(10,2,5,'diterima','diterima','belum','','2022-11-11 14:31:45'),
(11,3,1,'belum','belum','belum',NULL,NULL),
(12,3,4,'ditolak','ditolak','belum','','2022-11-11 14:53:22'),
(13,3,3,'ditolak','ditolak','belum','salah','2022-11-11 14:54:14'),
(14,3,2,'cek','ditolak','belum','acc','2022-11-11 14:33:49'),
(15,3,69,'diterima','diterima','belum','','2022-11-11 14:30:17'),
(16,4,1,'belum','belum','belum',NULL,NULL),
(17,4,4,'belum','belum','belum',NULL,NULL),
(18,4,3,'belum','belum','belum',NULL,NULL),
(19,4,2,'ditolak','ditolak','belum','tanggal salah','2022-11-11 14:21:20'),
(20,4,89,'cek','ditolak','belum','','2022-11-11 14:13:10'),
(21,5,1,'belum','belum','belum',NULL,NULL),
(22,5,4,'belum','belum','belum',NULL,NULL),
(23,5,3,'belum','belum','belum',NULL,NULL),
(24,5,2,'cek','diajukan','belum','tanggal salah','2022-11-11 14:18:16'),
(25,5,86,'diterima','diterima','belum','','2022-11-11 14:42:22'),
(26,6,1,'belum','belum','belum',NULL,NULL),
(27,6,4,'belum','belum','belum',NULL,NULL),
(28,6,3,'cek','diajukan','belum',NULL,NULL),
(29,6,2,'diterima','diterima','belum','acc','2022-11-11 14:33:24'),
(30,6,74,'diterima','diterima','belum','','2022-11-11 14:30:40'),
(31,7,1,'belum','belum','belum',NULL,NULL),
(32,7,4,'belum','belum','belum',NULL,NULL),
(33,7,3,'belum','belum','belum',NULL,NULL),
(34,7,2,'cek','diajukan','belum','tanggal salah','2022-11-11 14:17:48'),
(35,7,85,'diterima','diterima','belum','','2022-11-11 14:33:07'),
(36,8,1,'belum','belum','belum',NULL,NULL),
(37,8,4,'belum','belum','belum',NULL,NULL),
(38,8,3,'belum','belum','belum',NULL,NULL),
(39,8,2,'ditolak','ditolak','belum','tanggal salah','2022-11-11 14:25:04'),
(40,8,67,'cek','ditolak','belum','','2022-11-11 14:22:00'),
(41,9,1,'belum','belum','belum',NULL,NULL),
(42,9,4,'belum','belum','belum',NULL,NULL),
(43,9,3,'belum','belum','belum',NULL,NULL),
(44,9,2,'belum','belum','belum',NULL,NULL),
(45,9,5,'cek','belum','belum',NULL,NULL),
(46,10,1,'belum','belum','belum',NULL,NULL),
(47,10,4,'belum','belum','belum',NULL,NULL),
(48,10,3,'belum','belum','belum',NULL,NULL),
(49,10,2,'cek','diajukan','belum',NULL,NULL),
(50,10,74,'diterima','diterima','belum','','2022-11-11 15:21:20'),
(51,11,1,'belum','belum','belum',NULL,NULL),
(52,11,4,'belum','belum','belum',NULL,NULL),
(53,11,3,'belum','belum','belum',NULL,NULL),
(54,11,2,'belum','belum','belum',NULL,NULL),
(55,11,5,'cek','belum','belum',NULL,NULL);

/*Table structure for table `tbl_wali_kelas` */

DROP TABLE IF EXISTS `tbl_wali_kelas`;

CREATE TABLE `tbl_wali_kelas` (
  `id_wali_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_guru` varchar(11) DEFAULT NULL,
  `id_detail_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_wali_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_wali_kelas` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

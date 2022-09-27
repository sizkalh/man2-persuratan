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
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `lama_pengabdian` varchar(10) DEFAULT NULL,
  `instansi` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_guru` */

insert  into `tbl_guru`(`id`,`nip`,`nama`,`jk`,`no_hp`,`alamat`,`email`,`username`,`password`,`password2`,`pangkat`,`golongan`,`jabatan`,`tempat_lahir`,`tgl_lahir`,`lama_pengabdian`,`instansi`) values 
(1,'151','Shieldy','L','085678999000','Podorejo','shieldy@gmail.com','finggar','202cb962ac59075b964b07152d234b70','123','superuser','III A','Guru','Tulungagung','1999-08-17','1 Tahun','MAN 2 Tulungagung'),
(2,'152','Vita','P','089888999000','Ngunut','vita@gmail.com','vita','202cb962ac59075b964b07152d234b70','123','operator','III A','Staf TU','Tulungagung','1998-08-18','2 Tahun','MAN 2 Tulungagung'),
(3,'153','Agus','L','087777888666','Ngantru','agus@gmail.com','agus','202cb962ac59075b964b07152d234b70','123','katu','III A','Kepala TU','Tulungagung','1809-08-22','5 Tahun','MAN 2 Tulungagung'),
(4,'154','Pak Dopir','L','086777555666','Pucanglaban','dopir@gmail.com','dopir','202cb962ac59075b964b07152d234b70','123','kamad','III A','Kepala Madrasah','Tulungagung','1790-08-13','5 Tahun','MAN 2 Tulungagung'),
(5,'155','Edo','L','086777555666','Gondang','edo@gmail.com','edo','202cb962ac59075b964b07152d234b70','123','guru','III A','Guru','Tulungagung','1990-08-11','3 Tahun','MAN 2 Tulungagung'),
(6,'156','Pak Patoni','L','086777555666','Tulungagung','patoni@gmail.com','patoni','202cb962ac59075b964b07152d234b70','123','guru','III A','Pejabat Pembuat Komitmen','Tulungagung','1968-12-17','5 Tahun','MAN 2 Tulungagung'),
(7,'196708011996031','Drs. MUHAMAD DOPIR, M.Pd.I','L','','Dsm. Talapan RT/RW 01/03 Ds. Waung, Kec. Boyolangu, Kab. Tulungagung','','dumi 1','202cb962ac59075b964b07152d234b70','123','Pembina ','IV/a','KEPALA MADRASAH','Tulungagung','1967-08-01','','MAN 2 TULUNGAGUNG'),
(8,'196509131993031','Drs. HADI MULYONO','L','','RT 06 RW 01 , Ds. Wates, Kec. Campurdarat, Kab. Tulungagung','','dumi 2','202cb962ac59075b964b07152d234b71','123','Pembina Tk. I','IV/b','GURU','Tulungagung','1965-09-13','','MAN 2 TULUNGAGUNG'),
(9,'196610211994121','Drs. NANANG ASHARI','L','','Mawar No 3 Perum Bolo Asri, Ds. Bolorejo, Kec. Kauman, Kab. Tulungagung','','dumi 3','202cb962ac59075b964b07152d234b72','123','Pembina Tk. I','IV/b','GURU','Tulungagung','1966-10-21','','MAN 2 TULUNGAGUNG'),
(10,'196706141995032','Dra. YUNI LESTARI','P','','Jl Ki Mangunsarkoro IV / 7B, Ds. Beji, Kec. Boyolangu, Kab. Tulungagung  ','','dumi 4','202cb962ac59075b964b07152d234b73','123','Pembina Tk. I','IV/b','GURU','Tulungagung','1967-06-14','','MAN 2 TULUNGAGUNG'),
(11,'196512191992031','Drs. DARUNO ARIFIN','L','','Jln. Sultan Agung, Ds. Ketanon, Kec. Kedungwaru, Kab. Tulungagung','','dumi 5','202cb962ac59075b964b07152d234b74','123','Pembina Tk. I','IV/b','GURU','Tulungagung','1965-12-19','','MAN 2 TULUNGAGUNG'),
(12,'197005111996032','ENDANG MINAWATI, S.Pd.','P','','Ds. Campurdarat, Kec. Campurdarat, Kab. Tulungagung','','dumi 6','202cb962ac59075b964b07152d234b75','123','Pembina Tk. I','IV/b','GURU','Tulungagung','1970-05-11','','MAN 2 TULUNGAGUNG'),
(13,'196907231996032','Dra. NUR TSALITS HAMIDAH','P','','Jl WR. SUPRATMAN 73 , Ds. Kenayan, Kec. Tulungagung, Kab. Tulungagung','','dumi 7','202cb962ac59075b964b07152d234b76','123','Pembina Tk. I','IV/b','GURU','Tulungagung','1969-07-23','','MAN 2 TULUNGAGUNG'),
(14,'196606241997031','Drs. MASKUR','L','','RT 05 RW 02 Dusun Sumbersari,Ds. Tunggulsari Kec. Kedungwaru, Kab. Tulungagung','','dumi 8','202cb962ac59075b964b07152d234b77','123','Pembina ','IV/a','GURU','Tulungagung','1966-06-24','','MAN 2 TULUNGAGUNG'),
(15,'196705071995032','Dra. WINARNI','P','','Patimura No. 72 RT. 02 RW. 07, Ds. Bendo, Kec. Gondang, Kab. Tulungagung','','dumi 9','202cb962ac59075b964b07152d234b78','123','Pembina','IV/a','GURU','Tulungagung','1967-05-07','','MAN 2 TULUNGAGUNG'),
(16,'197709282003122','NANIK NURAINI, S.Pd. , M.Pd.','P','','Ds.Bangoan, Kec. Kedungwaru, Kab. Tulungagung','','dumi 10','202cb962ac59075b964b07152d234b79','123','Pembina','IV/a','GURU','Tulungagung','1977-07-28','','MAN 2 TULUNGAGUNG'),
(17,'197309082005012','YAYUK WINARTI, S.Pd. M.Pd.','P','','Jln. Pahlawan, Ds. Ketanon, Kec. Kedungwaru, Kab. Tulungagung','','dumi 11','202cb962ac59075b964b07152d234b80','123','Pembina','IV/a','GURU','Tulungagung','1973-09-08','','MAN 2 TULUNGAGUNG'),
(18,'196907052005012','TUMINAH, S.Pd.','P','','Mastrip II/22 RT. 02 RW. 06, Ds. Jepun, Kec. Tulungagung, Kab. Tulungagung','','dumi 12','202cb962ac59075b964b07152d234b81','123','Penata Tk. I','III/d','GURU','Tulungagung','1969-07-05','','MAN 2 TULUNGAGUNG'),
(19,'197107212005011','TRI HANDOKO, S.Pd.','L','','RT. 11 RW. 01, Ds. Sobontoro, Kec. Boyolangu, Kab. Tulungagung','','dumi 13','202cb962ac59075b964b07152d234b82','123','Penata Tk. I','III/d','GURU','Tulungagung','1971-07-21','','MAN 2 TULUNGAGUNG'),
(20,'197207152006041','NURYATIM HADI SAOPUTRA, S.Pd.,M.Pd.','L','','','','dumi 14','202cb962ac59075b964b07152d234b83','123','Penata Tk. I','III/d','GURU','Tulungagung','1972-07-15','','MAN 2 TULUNGAGUNG'),
(21,'197207182005012','SITI NURHAYATI, S.Ag.','P','','Ds. Bago, Kec. Tulungagung, Kab. Tulungagung','','dumi 15','202cb962ac59075b964b07152d234b84','123','Penata Tk. I','III/d','GURU','Tulungagung','1972-07-18','','MAN 2 TULUNGAGUNG'),
(22,'197504072005011','WILDAN DIYAUDDIN, S.Pd.','L','','No. RT. 02 RW. 03, Ds. Tanen, Kec. Rejotangan, Kab. Tulungagung','','dumi 16','202cb962ac59075b964b07152d234b85','123','Penata Tk. I','III/d','GURU','Tulungagung','1975-04-07','','MAN 2 TULUNGAGUNG'),
(23,'197310232005011','ARIADI EKO SUSANTO, S.Pd.','L','','Jl. Semeru 34 RT 003 RW 001, Ds. Kauman, Kec. Kauman, Kab. Tulungagung','','dumi 17','202cb962ac59075b964b07152d234b86','123','Penata Tk. I','III/d','GURU','Tulungagung','1973-10-23','','MAN 2 TULUNGAGUNG'),
(24,'197805042006042','ERNA DWI ANJARWATI, S.Pd.','P','','Ds. Karangsono, Kec. Ngunut, Kab. Tulungagung','','dumi 18','202cb962ac59075b964b07152d234b87','123','Penata Tk. I','III/d','GURU','Tulungagung','1978-05-04','','MAN 2 TULUNGAGUNG'),
(25,'198011262005012','ERNI SRI SETIYANINGSIH, S.Pd.I.','P','','Dusun Srigading RT 03 RW 01, Dsn. Plosokandang, Ds. Kedungwaru, Kab. Tulungagung','','dumi 19','202cb962ac59075b964b07152d234b88','123','Penata Tk. I','III/d','GURU','Tulungagung','1980-11-26','','MAN 2 TULUNGAGUNG'),
(26,'198009032005012','SUSTIANA RAHAYU, S.Pd.','P','','Jl. Mangga, Ds. Kepuh, Kec. Boyolangu, Kab. Tulungagung','','dumi 20','202cb962ac59075b964b07152d234b89','123','Penata Tk. I','III/d','GURU','Tulungagung','1980-09-03','','MAN 2 TULUNGAGUNG'),
(27,'198003132006042','ENDAH WIDARTIN, S.Pd.','P','','RT. 04 RW. 03, Ds. Ngebong, Kec. Pakel, Kab. Tulungagung','','dumi 21','202cb962ac59075b964b07152d234b90','123','Penata Tk. I','III/d','GURU','Tulungagung','1980-03-13','','MAN 2 TULUNGAGUNG'),
(28,'197007152005012','NURHIDAYAH, S.Pd., M.Si.','P','','Dsn. Bakah RT/RW : 001/003, Ds. Mergayu, Kec. Bandung, Kab. Tulungagung','','dumi 22','202cb962ac59075b964b07152d234b91','123','Penata Tk. I','III/d','GURU','Tulungagung','1970-07-15','','MAN 2 TULUNGAGUNG'),
(29,'197102012005011','FEBRIYANTO, S.Pd.','L','','Ikan Kerapu 4 No. 9 RT.002 RW. 003, Ds. Perak Barat, Kec. Krembangan, Kota Surabaya','','dumi 23','202cb962ac59075b964b07152d234b92','123','Penata Tk. I','III/d','GURU','Tulungagung','1971-02-01','','MAN 2 TULUNGAGUNG'),
(30,'196804132005011','Drs. CUK HARI PURNAMA','L','','Sanggrahan No. RT. 2 RW. 1, Ds. Sanggrahan, Kec. Boyolangu, Kab. Tulungagung','','dumi 24','202cb962ac59075b964b07152d234b93','123','Penata Tk. I','III/d','GURU','Tulungagung','1968-04-13','','MAN 2 TULUNGAGUNG'),
(31,'196802102005011','AKH. KHAERUL ULUM, S.Pd.','L','','Ds. Plosokandang, Kec. Kedungwaru, Kab. Tulungagung','','dumi 25','202cb962ac59075b964b07152d234b94','123','Penata','III/c','GURU','Tulungagung','1968-02-10','','MAN 2 TULUNGAGUNG'),
(32,'197811052007102','DWI ASIH MUNDIROTUL LAILI, S.Ag','P','','Dusun Senden RT/RW : 05/02, Ds. Sepatan, Kec. Gondang, Kab. Tulungagung','','dumi 26','202cb962ac59075b964b07152d234b95','123','Penata','III/c','GURU','Tulungagung','1978-11-05','','MAN 2 TULUNGAGUNG'),
(33,'197711042007102','LUTHVI TRI HANDAYANI, S.Pd.','P','','Nakeran, Ds. Pakisrejo, Kec. Rejotangan, Kab. Tulungagung','','dumi 27','202cb962ac59075b964b07152d234b96','123','Penata','III/c','GURU','Tulungagung','1977-11-04','','MAN 2 TULUNGAGUNG'),
(34,'197710232007102','KHOLIS ZUNAIDAH, S.Ag.','P','','Ds. Kutoanyar, Kec. Tulungagung, Kab. Tulungagung','','dumi 28','202cb962ac59075b964b07152d234b97','123','Penata','III/c','GURU','Tulungagung','1977-10-23','','MAN 2 TULUNGAGUNG'),
(35,'197206022007102','YUNIS HIDAYATI, M.Ag.','P','','Ds. Wonorejo, Kec. Sumbergempol, Kab. Tulungagung','','dumi 29','202cb962ac59075b964b07152d234b98','123','Penata','III/c','GURU','Tulungagung','1972-06-02','','MAN 2 TULUNGAGUNG'),
(36,'197709032007102','NUR ALIFAH, S.Pd.','P','','RT/TW ; 04/01 Krajan, Ds. Ngrendeng, Kec. Gondang, Kab. Tulungagung','','dumi 30','202cb962ac59075b964b07152d234b99','123','Penata','III/c','GURU','Tulungagung','1977-09-03','','MAN 2 TULUNGAGUNG'),
(37,'196507092007011','BIBIT PRAYOGA, S.Ag., M.Pd.','L','','Dsn. Krajan, Ds. Bulus, Kec. Bandung, Kab. Tulungagung','','dumi 31','202cb962ac59075b964b07152d234b100','123','Penata','III/c','GURU','Tulungagung','1965-07-09','','MAN 2 TULUNGAGUNG'),
(38,'197503202007012','SRI HANDAYANI, S.Pd.','P','','Jl Dr Sutomo 3/34, Ds. Tertek, Kec. Tulungagung, Kab. Tulungagung','','dumi 32','202cb962ac59075b964b07152d234b101','123','Penata','III/c','GURU','Tulungagung','1975-03-20','','MAN 2 TULUNGAGUNG'),
(39,'196906162007012','NURUL EKAWATI, S.Pd.','P','','RT. 02 RW. 01, Ds. Wonoanti, Kec. Gandusari, Kab. Trenggalek','','dumi 33','202cb962ac59075b964b07152d234b102','123','Penata','III/c','GURU','Tulungagung','1969-07-16','','MAN 2 TULUNGAGUNG'),
(40,'197209212007012','YANTI YUNIARTI, S.Pd.','P','','Ds. Jabalsari, Kec. Sumbergempol, Kab. Tulungagung','','dumi 34','202cb962ac59075b964b07152d234b103','123','Penata','III/c','GURU','Tulungagung','1972-09-21','','MAN 2 TULUNGAGUNG'),
(41,'197107122007012','YULI ERNAWATI, S.Pd.','P','','Ds. Jabalsari, Kec. Sumbergempol, Kab. Tulungagung','','dumi 35','202cb962ac59075b964b07152d234b104','123','Penata','III/c','GURU','Tulungagung','1971-07-12','','MAN 2 TULUNGAGUNG'),
(42,'197503132007102','DIYAH ISTIANTI, S.Pd.','P','','Dsn. Jambu Rt. 03 Rw. 02, Ds. Pelem, Kec. Campurdarat, Kab. Tulungagung','','dumi 36','202cb962ac59075b964b07152d234b105','123','Penata','III/c','GURU','Tulungagung','1975-03-13','','MAN 2 TULUNGAGUNG'),
(43,'196402152007011','SUWITO, S.Pd','L','','Dsn. Deres RT/RW 01/02, Ds. Kiping, Kec. Gondang, Kab. Tulungagung','','dumi 37','202cb962ac59075b964b07152d234b106','123','Penata','III/c','GURU','Tulungagung','1964-02-15','','MAN 2 TULUNGAGUNG'),
(44,'198011112007102','ELOK KURNIA SARI, S.Pd.','P','','Ds. Birowo, Kec. Binangun, Kab. Blitar','','dumi 38','202cb962ac59075b964b07152d234b107','123','Penata','III/c','GURU','Tulungagung','1980-11-11','','MAN 2 TULUNGAGUNG'),
(45,'196908222007011','INDRO SEMBODO, S.S.','L','','Ds. Tiudan,Kec. Gondang, Kab. Tulungagung','','dumi 39','202cb962ac59075b964b07152d234b108','123','Penata','III/c','GURU','Tulungagung','1969-08-22','','MAN 2 TULUNGAGUNG'),
(46,'198010052007101','MASROHUDDAROINI, S.Pd.I  ','L','','I Gusti Ngurah Rai IV/5, Ds. Bago, Kec. Tulungagung, Kab. Tulungagung','','dumi 40','202cb962ac59075b964b07152d234b109','123','Penata','III/c','GURU','Tulungagung','1980-10-05','','MAN 2 TULUNGAGUNG'),
(47,'198102262009012','CHOIRUL CHALIYAH, M.Pd','P','','Dusun BONO RT/RW ;003/004 , Ds. Bono, Kec. Boyolangu, Kab. Tulungagung','','dumi 41','202cb962ac59075b964b07152d234b110','123','Penata','III/c','GURU','Tulungagung','1981-02-26','','MAN 2 TULUNGAGUNG'),
(48,'196212072007011','Drs. RAHMAT WIUMPOMO','L','','Dsn TALUN RT/RW ; 003/001, Ds. Gombang, Kec. Pakel, Kab. Tulungagung','','dumi 42','202cb962ac59075b964b07152d234b111','123','Penata Muda Tk.I ','III/b','GURU','Tulungagung','0000-00-00','','MAN 2 TULUNGAGUNG'),
(49,'198603202011011','FAIZAL AMRI, S.Pd.I.','L','','RT/ RW ; 002/001, Ds. Padangan, Kec. Ngantru, Kab. Tulungagung','','dumi 43','202cb962ac59075b964b07152d234b112','123','Penata Muda Tk. I','III/b','GURU','Tulungagung','1986-03-20','','MAN 2 TULUNGAGUNG'),
(50,'196503062014111','MOHAMMAD, S.Pd.','L','','Dsn Bayanan RT/RW : 01/02, Ds. Wajak Lor, Kec. Boyolangu, Kab. Tulungagung','','dumi 44','202cb962ac59075b964b07152d234b113','123','Penata Muda','III/a','GURU','Tulungagung','1965-03-06','','MAN 2 TULUNGAGUNG'),
(51,'198609152019031','NANANG SETYAWAN, S.Pd','L','','Dusun Sidomulyo, RT.02 / RW.02, , Ds. Sepanjang, Kec. Glenmore, Kab. Banyuwangi','','dumi 45','202cb962ac59075b964b07152d234b114','123','Penata Muda','III/a','GURU','Tulungagung','1986-09-15','','MAN 2 TULUNGAGUNG'),
(52,'199301232019032','NANDA CHOLISTIANA, S.Pd.I','P','','Dsn. Sekardangan, RT 001/ RW 008, Ds. Papungan, Kec. Kanigoro, Kba. Blitar','','dumi 46','202cb962ac59075b964b07152d234b115','123','Penata Muda','III/a','GURU','Tulungagung','1993-01-23','','MAN 2 TULUNGAGUNG'),
(53,'199103272019031','ADI BUDI WIRANATA, S.Pd','L','','Dusun Al Fatah RT 1 RW 1, Ds. Ngendingan, Kec. Kedungwaru, Kab. Tulungagung','','dumi 47','202cb962ac59075b964b07152d234b116','123','Penata Muda','III/a','GURU','Tulungagung','1991-03-27','','MAN 2 TULUNGAGUNG'),
(54,'199106222019032','VIVI NUR AINIYAH, S.Pd','P','','Jl. Santren Dusun Ngampel, RT 13 RW02 No.28 , Ds. Tanjungsari, Kec. Taman, Kab. Sidoarjo','','dumi 48','202cb962ac59075b964b07152d234b117','123','Penata Muda','III/a','GURU','Tulungagung','1991-06-22','','MAN 2 TULUNGAGUNG'),
(55,'199505202019032','AYUNINGRUM MEI NUSANTARI, S.Pd','P','','Dsn. Jurangawan, RT/RW 10/02, Ds. Duwet, Kec. Bendo, Kab. Magetan','','dumi 49','202cb962ac59075b964b07152d234b118','123','Penata Muda','III/a','GURU','Tulungagung','1995-05-20','','MAN 2 TULUNGAGUNG'),
(56,'199102172019032','MEGA KUSUMANINGTIAS, S.Pd','P','','Perum.Villa Gajah Mada Blok G.16 RT/RW: 005/003, Ds. Singonegaraan, Kec. Banyuwangi, Kab. Banyuwangi','','dumi 50','202cb962ac59075b964b07152d234b119','123','Penata Muda','III/a','GURU','Tulungagung','1991-02-17','','MAN 2 TULUNGAGUNG'),
(57,'198910272019032','KHOIRUL MUDAWINUN NISA\', S.Pd.I','P','','Dsn. Bener, Ds. Betek RT/RW 09/02, Kec. Madiun, Kab. Madiun 63151','','dumi 51','202cb962ac59075b964b07152d234b120','123','Penata Muda','III/a','GURU','Tulungagung','1989-10-27','','MAN 2 TULUNGAGUNG'),
(58,'198702212019032','ARROCHMA LAILA HAJAR MAULANA, S.Pd','P','','Jl. Satria No.04 RT/RW 02/05, Ds. Walikukun, Kec. Widodaren, Prov. Jawa Timur.','','dumi 52','202cb962ac59075b964b07152d234b121','123','Penata Muda','III/a','GURU','Tulungagung','1987-02-21','','MAN 2 TULUNGAGUNG'),
(59,'196305222022212','MUSLIMAH, S.Pd','P','','','','dumi 53','202cb962ac59075b964b07152d234b122','123','Penata Muda','III/a','GURU','Tulungagung','1963-05-22','','MAN 2 TULUNGAGUNG'),
(60,'197002102022211','KHUDORI, S.Ag','L','','','','dumi 54','202cb962ac59075b964b07152d234b123','123','Penata Muda','III/a','GURU','Tulungagung','1970-02-10','','MAN 2 TULUNGAGUNG'),
(61,'196812171998031','MOH. PATONI, M.Pd.I','L','','Rt.02 / Rw. 01, Ds. Sukoanyar, Kec. Pakel, Kab. Tulungagung','','dumi 55','202cb962ac59075b964b07152d234b124','123','Pembina ','IV/a','KAUR. TATA USAHA','Tulungagung','1968-12-17','','MAN 2 TULUNGAGUNG'),
(62,'198007052007012','MASIYAH, S.Pd.I., M.M','P','','Dsn Doro payung RT/RW ; 003/001 , Ds. Doroampel, Kec. Sumbergempol, Kab. Tulungagung','','dumi 56','202cb962ac59075b964b07152d234b125','123','Penata Tk. I','III/d','PEGAWAI TATA USAHA','Tulungagung','1980-07-05','','MAN 2 TULUNGAGUNG'),
(63,'197106072007102','TITIK MUNDIAYATIN','P','','Dsn Gambrengan RT/RW ; 004/002, Ds. Sidomulyo, Kec. Gondang, Kab. Tulungagung ','','dumi 57','202cb962ac59075b964b07152d234b126','123','Pengatur Tk. I','II/d','PEGAWAI TATA USAHA','Tulungagung','1971-06-07','','MAN 2 TULUNGAGUNG'),
(64,'197905082009011','KHOIRUL ANAM','L','','Dusun Putuk RT/RW : 001/001, Ds. Kepuh, Kec. Boylangu, Kab. Tulungagung','','dumi 58','202cb962ac59075b964b07152d234b127','123','Pengatur Tk. I','II/d','PEGAWAI TATA USAHA','Tulungagung','1979-05-08','','MAN 2 TULUNGAGUNG');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_siswa` */

insert  into `tbl_siswa`(`id`,`nisn`,`nis`,`id_detail_kelas`,`nama`,`jk`,`tempat_lahir`,`tgl_lahir`,`no_hp`,`alamat`,`nama_wali`,`no_hp_wali`,`pekerjaan_wali`,`nama_ibu`,`no_hp_ibu`,`pekerjaan_ibu`,`satdik`,`jml_saudara`,`username`,`password`) values 
('1','111222','123',1,'Rika','P','Tulungagung','2005-08-19','088999000999','Kampungdalem','Saipul','089999000999','Gali lobang','SITI','089999000999','wiraswasta','SMA',1,'rika',''),
('10','9878','1261',2,'luki','L','Tulungagung','2005-09-23','0812345678978','kedungwaru','dulah','0812345678978','wiraswasta','SITI','089999000999','wiraswasta','SMA',2,'luki',''),
('11','9880','1265',1,'wawan','L','Tulungagung','2005-09-24','0812345678979','kedungwaru','abdul','0812345678979','pegawai swasta','SITI','089999000999','wiraswasta','SMA',3,'wawan',''),
('12','9882','1269',1,'dadang','L','Tulungagung','2005-09-25','0812345678970','kedungwaru','manab','0812345678970','wiraswasta','SITI','089999000999','wiraswasta','SMA',1,'dadang',''),
('13','9884','1273',1,'vino','L','Tulungagung','2005-09-26','0812345678982','kedungwaru','mur','0812345678982','wiraswasta','SITI','089999000999','wiraswasta','SMA',2,'vino',''),
('2','111223','123',1,'deny','L','Tulungagung','2005-08-19','089999898889','Kedungwaru','dessy','089997878788','wiraswasta','SITI','089999000999','wiraswasta','SMA',3,'deny',''),
('3','1234','1233',2,'adit','L','Tulungagung','2005-09-16','0812345678972','kedungwaru','narto','0812345678972','wiraswasta','SITI','089999000999','wiraswasta','SMA',1,'adit',''),
('4','2468','1237',3,'ali','L','Tulungagung','2005-09-17','0812345678973','kedungwaru','darto','0812345678973','wiraswasta','SITI','089999000999','wiraswasta','SMA',2,'ali',''),
('5','4936','1241',3,'didin','L','Tulungagung','2005-09-18','0812345678974','kedungwaru','parto','0812345678974','wiraswasta','SITI','089999000999','wiraswasta','SMA',3,'didin',''),
('6','2468','1245',4,'kiko','L','Tulungagung','2005-09-19','0812345678975','kedungwaru','yudi','0812345678975','pns','SITI','089999000999','wiraswasta','SMA',1,'kiko',''),
('7','4936','1249',4,'wahyu','L','Tulungagung','2005-09-20','0812345678976','kedungwaru','gilang','0812345678976','wiraswasta','SITI','089999000999','wiraswasta','SMA',2,'wahyu',''),
('8','9874','1253',2,'bayu','L','Tulungagung','2005-09-21','0812345678977','kedungwaru','dirga','0812345678977','wiraswasta','SITI','089999000999','wiraswasta','SMA',3,'bayu',''),
('9','9876','1257',1,'andri','L','Tulungagung','2005-09-22','0812345678972','kedungwaru','patih','0812345678972','pns','SITI','089999000999','wiraswasta','SMA',1,'andri','');

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
  `hapus` enum('y','n') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat` */

insert  into `tbl_surat`(`id`,`jenis`,`no_surat`,`hari`,`tgl_pelaksanaan`,`tgl_pelaksanaan2`,`waktu`,`tempat`,`kepada`,`alamat`,`perihal`,`ttd_kamad`,`keterangan`,`catatan`,`tgl_pembuatan`,`id_pemohon`,`hapus`) values 
(1,'nota_dinas','0188/00G10','senin','2022-09-05',NULL,'08:00 WIB','Aula','guru',NULL,'upacara dinas','','upacara',NULL,'2022-09-06',5,'n'),
(2,'surat_kuasa','','',NULL,NULL,'','',NULL,NULL,'','','',NULL,NULL,5,'n'),
(3,'surat_kuasa','','',NULL,NULL,'','',NULL,NULL,'','','',NULL,'2022-09-07',5,'n'),
(4,'surat_kuasa','','',NULL,NULL,'','',NULL,NULL,'','','',NULL,'2022-09-07',5,'n'),
(5,'surat_kuasa','','',NULL,NULL,'','',NULL,NULL,'','','',NULL,'2022-09-07',5,'y'),
(6,'surat_kuasa','','',NULL,NULL,'','',NULL,NULL,'','','',NULL,'2022-09-07',5,'y'),
(7,'surat_kuasa','','',NULL,NULL,'','',NULL,NULL,'','','',NULL,'2022-09-09',1,'y'),
(8,'surat_kuasa','','',NULL,NULL,'','',NULL,NULL,'','','',NULL,'2022-09-09',5,'y'),
(9,'surat_kuasa','0199/00G30','',NULL,NULL,'','',NULL,NULL,'','','',NULL,'2022-09-09',5,'n'),
(10,'nota_dinas','','Senin','2022-09-21',NULL,'07:00 WIB','Lapangans','Malikss',NULL,'Upacara','','Upacara bendera',NULL,'2022-09-09',5,'n'),
(11,'surat_kuasa','','',NULL,NULL,'','',NULL,NULL,'','','',NULL,'2022-09-09',5,'n'),
(14,'nota_dinas',NULL,'senin','2022-09-11',NULL,'08.00','Lapangan','Sef',NULL,'-',NULL,'-',NULL,'2022-09-25',5,'n'),
(20,'berita_acara','d0112','rabu','2022-09-12',NULL,NULL,NULL,NULL,NULL,'<ol>\r\n	<li>masuk</li>\r\n	<li>masak</li>\r\n</ol>\r\n',NULL,NULL,NULL,'2022-09-25',5,'n'),
(21,'surat_kuasa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-26',5,'n'),
(22,'surat_kuasa','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-26',5,'n'),
(23,'nota_dinas',NULL,'senin','2022-09-02',NULL,'08.00','Lapangan','Sef',NULL,'surat undangan',NULL,'tes',NULL,'2022-09-26',5,'n'),
(24,'surat_undangan','','Selasa','1970-01-01',NULL,'08.00','Lapangan depan','sef','Jl. Ki Mangunsarkoro, Beji, Boyolangu, Tulungagung 99','undangan',NULL,'tes',NULL,'2022-09-26',5,'n'),
(25,'surat_balasan','',NULL,NULL,NULL,NULL,NULL,'',NULL,'tugas mengampu kelas',NULL,NULL,NULL,'2022-09-26',5,'n'),
(26,'surat_skkb','',NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,'2021/2022',NULL,'2022-09-26',5,'n'),
(27,'surat_izin_penelitian','',NULL,NULL,NULL,NULL,NULL,'3',NULL,NULL,NULL,NULL,NULL,'2022-09-26',5,'n'),
(28,'surat_permohonan_narasumber','','senin','2022-09-18',NULL,'08.00','Lapangan','andys','Jl. Ki Mangunsarkoro, Beji, Boyolangu, Tulungagung','tes b',NULL,'pengecekan','memm','2022-09-26',5,'n'),
(29,'surat_pemberitahuan','','senin','2022-09-21',NULL,'08.00','Lapangan depan','Malikis','Tempat','-',NULL,'surat pemebri',NULL,'2022-09-27',5,'n'),
(30,'surat_mutasi_siswa_keluar','',NULL,NULL,NULL,NULL,NULL,'1',NULL,'smak',NULL,'k','pp','1970-01-01',5,'n'),
(32,'suket_siswa',NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,'4','2021/2022','1970-01-01',5,'n'),
(33,'suket_siswa',NULL,NULL,NULL,NULL,NULL,NULL,'12',NULL,NULL,NULL,'4','2021/2022','1970-01-01',5,'n'),
(34,'suket_siswa',NULL,NULL,NULL,NULL,NULL,NULL,'10',NULL,NULL,NULL,'4','2021/2022','2022-09-27',5,'n'),
(35,'suket_guru','',NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,NULL,'2','2 Tahun','2022-09-27',5,'n'),
(36,'surat_rekom_guru','',NULL,NULL,NULL,NULL,NULL,'2',NULL,NULL,NULL,'1','melakukan perjalanan dinas','2022-09-27',5,'n');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_balasan` */

insert  into `tbl_surat_balasan`(`id`,`id_surat`,`nama`,`nip`,`jabatan`,`tugas_diterima`,`keterangan`,`bulan_awal`,`bulan_akhir`) values 
(1,25,'seftian','123','guru tik','tugas mengampu kelas','mengampu kelas','Januari 2022','Desember 2022');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_izin_penelitian` */

insert  into `tbl_surat_izin_penelitian`(`id`,`id_surat`,`nama_mhs`,`nim`,`jurusan`,`semester`,`kampus`,`judul`,`tanggal_mulai`,`tanggal_selesai`) values 
(1,27,'seftianss','0090909','teknik','1','kampusku','mau ya','2022-08-31','2022-09-24');

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
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=latin1;

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
(130,22,5,'diterima','','2022-09-26 02:54:13'),
(131,23,1,'belum',NULL,NULL),
(132,23,4,'belum',NULL,NULL),
(133,23,3,'belum',NULL,NULL),
(134,23,2,'belum',NULL,NULL),
(135,23,5,'cek',NULL,NULL),
(136,23,1,'belum',NULL,NULL),
(137,23,4,'belum',NULL,NULL),
(138,23,3,'belum',NULL,NULL),
(139,23,2,'belum',NULL,NULL),
(140,23,5,'cek',NULL,NULL),
(141,23,1,'belum',NULL,NULL),
(142,23,4,'belum',NULL,NULL),
(143,23,3,'belum',NULL,NULL),
(144,23,2,'belum',NULL,NULL),
(145,23,5,'cek',NULL,NULL),
(146,23,1,'belum',NULL,NULL),
(147,23,4,'belum',NULL,NULL),
(148,23,3,'belum',NULL,NULL),
(149,23,2,'belum',NULL,NULL),
(150,23,5,'cek',NULL,NULL),
(151,24,1,'belum',NULL,NULL),
(152,24,4,'belum',NULL,NULL),
(153,24,3,'belum',NULL,NULL),
(154,24,2,'ditolak','salah','2022-09-26 12:54:08'),
(155,24,5,'cek','','2022-09-26 12:53:36'),
(156,25,1,'belum',NULL,NULL),
(157,25,4,'belum',NULL,NULL),
(158,25,3,'cek',NULL,NULL),
(159,25,2,'diterima','betul','2022-09-26 14:56:00'),
(160,25,5,'diterima','','2022-09-26 14:55:39'),
(161,26,1,'belum',NULL,NULL),
(162,26,4,'belum',NULL,NULL),
(163,26,3,'belum',NULL,NULL),
(164,26,2,'cek',NULL,NULL),
(165,26,5,'diterima','','2022-09-26 21:15:29'),
(166,27,1,'belum',NULL,NULL),
(167,27,4,'belum',NULL,NULL),
(168,27,3,'belum',NULL,NULL),
(169,27,2,'cek',NULL,NULL),
(170,27,5,'diterima','','2022-09-27 02:55:49'),
(171,28,1,'belum',NULL,NULL),
(172,28,4,'belum',NULL,NULL),
(173,28,3,'belum',NULL,NULL),
(174,28,2,'cek',NULL,NULL),
(175,28,5,'diterima','','2022-09-26 23:58:45'),
(176,29,1,'belum',NULL,NULL),
(177,29,4,'belum',NULL,NULL),
(178,29,3,'belum',NULL,NULL),
(179,29,2,'cek',NULL,NULL),
(180,29,5,'diterima','','2022-09-27 00:30:50'),
(181,30,1,'belum',NULL,NULL),
(182,30,4,'belum',NULL,NULL),
(183,30,3,'belum',NULL,NULL),
(184,30,2,'cek',NULL,NULL),
(185,30,5,'diterima','','2022-09-27 02:29:03'),
(191,32,1,'belum',NULL,NULL),
(192,32,4,'belum',NULL,NULL),
(193,32,3,'belum',NULL,NULL),
(194,32,2,'belum',NULL,NULL),
(195,32,5,'cek',NULL,NULL),
(196,33,1,'belum',NULL,NULL),
(197,33,4,'belum',NULL,NULL),
(198,33,3,'belum',NULL,NULL),
(199,33,2,'belum',NULL,NULL),
(200,33,5,'cek',NULL,NULL),
(201,33,1,'belum',NULL,NULL),
(202,33,4,'belum',NULL,NULL),
(203,33,3,'belum',NULL,NULL),
(204,33,2,'belum',NULL,NULL),
(205,33,5,'cek',NULL,NULL),
(206,33,1,'belum',NULL,NULL),
(207,33,4,'belum',NULL,NULL),
(208,33,3,'belum',NULL,NULL),
(209,33,2,'belum',NULL,NULL),
(210,33,5,'cek',NULL,NULL),
(211,33,1,'belum',NULL,NULL),
(212,33,4,'belum',NULL,NULL),
(213,33,3,'belum',NULL,NULL),
(214,33,2,'belum',NULL,NULL),
(215,33,5,'cek',NULL,NULL),
(216,34,1,'belum',NULL,NULL),
(217,34,4,'belum',NULL,NULL),
(218,34,3,'belum',NULL,NULL),
(219,34,2,'belum',NULL,NULL),
(220,34,5,'cek',NULL,NULL),
(221,35,1,'belum',NULL,NULL),
(222,35,4,'belum',NULL,NULL),
(223,35,3,'belum',NULL,NULL),
(224,35,2,'cek',NULL,NULL),
(225,35,5,'diterima','','2022-09-28 00:24:15'),
(226,36,1,'belum',NULL,NULL),
(227,36,4,'belum',NULL,NULL),
(228,36,3,'belum',NULL,NULL),
(229,36,2,'cek',NULL,NULL),
(230,36,5,'diterima','','2022-09-27 23:58:18');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

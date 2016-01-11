/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : spkbeasiswa

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-01-10 22:43:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for master_beasiswa
-- ----------------------------
DROP TABLE IF EXISTS `master_beasiswa`;
CREATE TABLE `master_beasiswa` (
  `id_beasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_beasiswa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_beasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_beasiswa
-- ----------------------------
INSERT INTO `master_beasiswa` VALUES ('1', 'Supersemar');

-- ----------------------------
-- Table structure for master_detail_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `master_detail_kriteria`;
CREATE TABLE `master_detail_kriteria` (
  `id_detail_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) DEFAULT NULL,
  `nama_detail_kriteria` varchar(255) DEFAULT NULL,
  `bobot_detail_kriteria` double DEFAULT NULL,
  PRIMARY KEY (`id_detail_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_detail_kriteria
-- ----------------------------
INSERT INTO `master_detail_kriteria` VALUES ('1', '1', '<= 1.5', '1');
INSERT INTO `master_detail_kriteria` VALUES ('2', '2', '<= 1.000.000', '5');
INSERT INTO `master_detail_kriteria` VALUES ('4', '1', '>1.5 dan <= 2.0', '2');
INSERT INTO `master_detail_kriteria` VALUES ('5', '1', '> 2.0 dan <= 3.0', '3');
INSERT INTO `master_detail_kriteria` VALUES ('6', '1', '> 3.0 dan <= 3.5', '4');
INSERT INTO `master_detail_kriteria` VALUES ('7', '1', '> 3.5', '5');
INSERT INTO `master_detail_kriteria` VALUES ('8', '2', '> 1.000.000 dan <= 2.000.000', '4');
INSERT INTO `master_detail_kriteria` VALUES ('9', '2', '>2.000.000 dan <= 3.000.000', '3');
INSERT INTO `master_detail_kriteria` VALUES ('10', '2', '> 3.000.000 dan <= 4.000.000', '2');
INSERT INTO `master_detail_kriteria` VALUES ('11', '2', '> 4.000.000', '1');
INSERT INTO `master_detail_kriteria` VALUES ('12', '3', '1 anak', '1');
INSERT INTO `master_detail_kriteria` VALUES ('14', '3', '2 anak', '2');
INSERT INTO `master_detail_kriteria` VALUES ('15', '3', '3 anak', '3');
INSERT INTO `master_detail_kriteria` VALUES ('16', '3', '4 anak', '4');
INSERT INTO `master_detail_kriteria` VALUES ('17', '3', '> 4 anak', '5');
INSERT INTO `master_detail_kriteria` VALUES ('18', '4', 'Semester 1', '1');
INSERT INTO `master_detail_kriteria` VALUES ('19', '4', 'Semester 2', '2');
INSERT INTO `master_detail_kriteria` VALUES ('20', '4', 'Semester 3', '3');
INSERT INTO `master_detail_kriteria` VALUES ('21', '4', 'Semester 4', '4');
INSERT INTO `master_detail_kriteria` VALUES ('22', '4', '> Semester 4', '5');
INSERT INTO `master_detail_kriteria` VALUES ('23', '5', 'Tanpa Prestasi', '1');
INSERT INTO `master_detail_kriteria` VALUES ('24', '5', '1 prestasi', '2');
INSERT INTO `master_detail_kriteria` VALUES ('25', '5', '3 prestasi', '3');
INSERT INTO `master_detail_kriteria` VALUES ('26', '5', '4 prestasi', '4');
INSERT INTO `master_detail_kriteria` VALUES ('27', '5', '> 4 prestasi', '5');

-- ----------------------------
-- Table structure for master_jurusan
-- ----------------------------
DROP TABLE IF EXISTS `master_jurusan`;
CREATE TABLE `master_jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_jurusan
-- ----------------------------
INSERT INTO `master_jurusan` VALUES ('1', 'TEKNIK INFORMATIKA');
INSERT INTO `master_jurusan` VALUES ('2', 'TEKNIK ELEKTRO');
INSERT INTO `master_jurusan` VALUES ('3', 'TEKNIK SIPIL');
INSERT INTO `master_jurusan` VALUES ('4', 'TEKNIK MESIN');
INSERT INTO `master_jurusan` VALUES ('5', 'PKK');

-- ----------------------------
-- Table structure for master_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `master_kriteria`;
CREATE TABLE `master_kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(255) DEFAULT NULL,
  `bobot_kriteria` double DEFAULT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_kriteria
-- ----------------------------
INSERT INTO `master_kriteria` VALUES ('1', 'IPK', null);
INSERT INTO `master_kriteria` VALUES ('2', 'Penghasil Orang Tua', null);
INSERT INTO `master_kriteria` VALUES ('3', 'Jumlah Tanggungan Orang Tua', null);
INSERT INTO `master_kriteria` VALUES ('4', 'Semester', '1.2');
INSERT INTO `master_kriteria` VALUES ('5', 'Prestasi Akademik / Non Akademik', null);

-- ----------------------------
-- Table structure for master_mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `master_mahasiswa`;
CREATE TABLE `master_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mahasiswa` varchar(255) DEFAULT NULL,
  `alamat_mahasiswa` varchar(255) DEFAULT NULL,
  `telpon_mahasiswa` varchar(255) DEFAULT NULL,
  `foto_mahasiswa` varchar(255) DEFAULT NULL,
  `prodi_mahasiswa` int(11) DEFAULT NULL COMMENT 'relasi ke master prodi',
  `jurusan_mahasiswa` int(11) DEFAULT NULL COMMENT 'relasi ke master jurusan',
  `nim_mahasiswa` varchar(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT 'L',
  `aktif_mahasiswa` enum('T','Y') DEFAULT 'Y',
  PRIMARY KEY (`id_mahasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_mahasiswa
-- ----------------------------
INSERT INTO `master_mahasiswa` VALUES ('6', 'ACHMAD FIRDAUS HERMAWAN', 'JALAN WONOSARI 22', '', 'PAs_Photo.jpg', '5', '1', '14050974066', '15', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('7', 'ALDIO PRADANA', 'KEMBANG KUNING MULYO 2/1', '', 'Pas_Photo.jpg', '5', '1', '14050974086', '16', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('8', 'ANDI RIAWAN', 'DUSUN JOHO, KECAMATAN KALIDAWIR', '', null, '2', '2', '14050514021', '17', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('9', 'ANGGA KURNIAWAN', 'DESA BANJARSARI RT2, RW1  - BUDURAN - SIDOARJO', '', 'FOTO.jpg', '2', '2', '12050514216', '18', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('10', 'ARIFIAN FARICH', 'JL. Mastrip 10 no 46', '', null, '3', '2', '13050874074', '19', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('11', 'ATOK URROHMAN', 'SALAMROJO - BERBEK', '', null, '4', '2', '14050413004', '20', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('12', 'CHRISTA PUTRA', 'DUSUN BANARAN KECAMATAN KERTOSONO', '', 'FOTO.jpg', '4', '2', '14050413006', '21', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('13', 'CHURIN\'IN', 'JL. SUNAN GIRI 135 KEBOMAS GRESIK', '', null, '5', '1', '14050974002', '22', 'P', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('14', 'DIAN WIDHOASIH', 'BUKIT BAMBE XIV', '', null, '5', '1', '125974251', '23', 'P', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('15', 'FAIZAL HANIF', 'JL. DK.JERAWAT NO 3A', '', null, '5', '1', '14050974080', '24', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('16', 'GALUH DHATUNINGTYAS', 'SIDOSERMO 4 GANG 8A', '', null, '3', '2', '125874201', '25', 'P', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('17', 'ISNI WIDAYANTI', 'DESA NGERAMBE', '', 'Pas_Photo.jpg', '5', '1', '12050974247', '26', 'P', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('18', 'M ANAM ARIF N', 'JL. PACAR KEMBANG BUNTU 7 SURABAYA', '', null, '2', '2', '125514036', '27', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('19', 'M HARIS SYARIFUDDIN', 'JL. RONGGOLAWE NO 8 DUSUN SAWO BABAT', '', null, '5', '1', '12050974219', '28', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('20', 'Muhammad Syafi\'i', 'JL. RAYA LAMAER KECAMATAN BLEGA', '', 'Foto.jpg', '2', '2', '12050514223', '29', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('21', 'OKTAVIAN BIMA', 'JL. MAWAR MERAH SIDOMULYO', '', 'Pas_Photo.jpg', '1', '1', '14050623010', '30', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('22', 'RANDY ADE ANGGARA', 'DUSUN KENDAL 3', '', null, '2', '2', '12050514219', '31', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('23', 'SYAQIA AZIZAH', 'DUSUN GUNUNG REMUK RT 3 RW 1 KETAPANG - KALIDURO', '', 'Pas_Photo.jpg', '1', '1', '14050623014', '32', 'P', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('24', 'WAHYU AGUS SETYAWAN', 'TENGGULUNAN MAJU RT 8 RW 3 CANDI', '', 'Foto.jpg', '2', '2', '12050514226', '33', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('25', 'ZAIMA FAIZA', 'JAGALAN 2 RT 15 RW 3 KRIAN', '', 'Pas_Photo.jpg', '5', '1', '125974242', '34', 'P', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('26', 'AJI KRISNA ADRIANSAH', 'ENTAL SEWU RT 7 RW 2 BUDURAN', '', 'FOTO.jpeg', '2', '2', '135874026', '35', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('27', 'ANDRIS KURNIAWAN', 'DESA BELAHANREJO', '', 'FOTO.jpeg', '2', '2', '14050874061', '36', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('28', 'ARYA DIMAS PRIYAMBODO', 'PERUM BUMI CANDI ASRI', '', 'FOTO.jpeg', '3', '2', '135874027', '37', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('29', 'BUDI SANTOSO', 'DUSUN SANGGRAHAN KECAMATAN GONDANG', '', 'FOTO.jpeg', '2', '2', '125514209', '38', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('30', 'DIMAS YOGA APRIAWAN', 'JL. SIDOLUHUR RT 2 RW 3 BABADAN', '', 'FOTO.jpeg', '3', '2', '135874013', '39', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('31', 'DYAH AYU NOVANI', 'JL. SALAK RT 9 RW 2 KEC. MAOSPATI', '', 'FOTO.jpeg', '5', '1', '125974203', '40', 'P', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('32', 'FAISAL ASHARI', 'DUSUN GAJAH KECAMATAN BAURENO, BOJONEGORO', '', 'FOTO.jpeg', '2', '2', '12050514225', '41', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('33', 'HANIF WIGUNG NUGROHO', 'DUSUN JATI BLIMBING RT 16 RW 3 DANDER', '', 'FOTO.jpeg', '3', '2', '13050874047', '42', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('34', 'INTAN WAHYU SAPUTRI', 'GANG KELUD NO 31 DESA KUDU KECAMATAN KERTOSONO', '', 'FOTO.jpeg', '5', '1', '125974272', '43', 'P', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('35', 'SEPTIAN EKO SASMITO', 'JL. TANJUNG NO 64 RT 3 RW 1 DUSUN SUMBERAN', '', 'FOTO.jpeg', '2', '2', '11050514250', '44', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('36', 'ADE BAGUS', 'SIDOMULYO SEDAYU', '', 'FOTO.jpeg', '5', '1', '14050924076', '45', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('37', 'AMELIA ROSITA', 'SIDOSERMO 4 GANG 1 A NOMOR 7', '', 'FOTO.jpeg', '5', '1', '14050974003', '46', 'P', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('38', 'ANDI FERIANTO', 'DUSUN SETROHADI', '', 'FOTO.jpeg', '13', '4', '125754225', '47', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('39', 'BERNA RISWA ALIF PERDANA', 'GRIYA KENCANA 2 P/26, MOJOSARIREJO - DRIYOREJO', '', 'FOTO.jpeg', '12', '4', '135524034', '48', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('40', 'DIMAS HARDIASYAH', 'KARANGREJO SAWAH 14 NO 18 WONOKROMO', '', 'FOTO.jpeg', '5', '1', '125974201', '49', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('41', 'DIONISIUS ENANTA SAMASTABUANA', 'WIGUNA TENGAH 8/8', '', 'FOTO.jpeg', '1', '1', '12050623268', '50', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('42', 'FARADINA TRESINDA', 'DUSUN TENARU RT 4 RW 2 DRIYOREJO', '', 'FOTO.jpeg', '5', '1', '14050974020', '51', 'P', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('43', 'HANANTA AGUSTIAR ZHELMICO', 'DESA SIDOBANDUNG', '', 'FOTO.jpeg', '5', '1', '14050974024', '52', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('44', 'MUHAMMAD ARDIAN DWI SUKMA', 'PONDOK BENOWO INDAH BLOK D NO 6', '', 'FOTO.jpeg', '13', '4', '13050524066', '53', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('45', 'NURIL LATHIF SYAYIDAH', 'ASEM BAGUS 3 SURABAYA', '', 'FOTO.jpeg', '5', '1', '14050974062', '54', 'P', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('46', 'ACHMAD FAISAL ROMADHONI', 'BULAK RUKEM TIMUR 1 / 57', '', null, '13', '4', '125754230', '55', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('47', 'ALBERTUS HARI AFANDI', 'PAKIS GUNUNG 1 D NO 10', '', null, '5', '1', '12050974208', '56', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('48', 'ARISTA INDRAJAYA', 'JL. JAMBANGAN GG 9 NO 1', '', null, '5', '1', '12050974244', '57', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('49', 'DODI FEBRIYANTO', 'JL. RINJADI NO 22 PARE - KEDIRI', '', null, '14', '4', '125423212', '58', 'L', 'Y');
INSERT INTO `master_mahasiswa` VALUES ('50', 'HAJAR NOPIN ARTIKA', 'KANDANGAN JAYA 3 NO 15', '', null, '5', '1', '14050974018', '59', 'P', 'Y');

-- ----------------------------
-- Table structure for master_pengumuman
-- ----------------------------
DROP TABLE IF EXISTS `master_pengumuman`;
CREATE TABLE `master_pengumuman` (
  `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT,
  `judul_pengumuman` varchar(255) DEFAULT NULL,
  `desc_pengumuman` mediumtext,
  `aktif_pengumuman` enum('','T','Y') DEFAULT 'Y',
  `tgl_pengumuman` date DEFAULT NULL,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_pengumuman
-- ----------------------------
INSERT INTO `master_pengumuman` VALUES ('1', 'ttetete', '<p style=\"text-align: center;\"><img alt=\"\" src=\"/Pictures/220px_Bung_Tomo.jpg\" style=\"height:301px; width:220px\" /></p>\r\n\r\n<p>jhkjk</p>\r\n\r\n<p>kjkjhkj</p>\r\n', 'Y', null);

-- ----------------------------
-- Table structure for master_prodi
-- ----------------------------
DROP TABLE IF EXISTS `master_prodi`;
CREATE TABLE `master_prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(255) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_prodi
-- ----------------------------
INSERT INTO `master_prodi` VALUES ('1', 'D3 MANAJEMEN INFORMATIKA', '1');
INSERT INTO `master_prodi` VALUES ('2', 'S1 PENDIDIKAN ELEKTRO', '2');
INSERT INTO `master_prodi` VALUES ('3', 'S1 TEKNIK ELEKTRO', '2');
INSERT INTO `master_prodi` VALUES ('4', 'D3 TEKNIK LISTRIK', '2');
INSERT INTO `master_prodi` VALUES ('5', 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', '1');
INSERT INTO `master_prodi` VALUES ('6', 'S1 TEKNIK INFORMATIKA', '1');
INSERT INTO `master_prodi` VALUES ('7', 'S1 TEKNIK SISTEM INFORMASI', '1');
INSERT INTO `master_prodi` VALUES ('8', 'S1 TEKNIK BANGUNAN', '3');
INSERT INTO `master_prodi` VALUES ('9', 'S1 TEKNIK SIPIL', '3');
INSERT INTO `master_prodi` VALUES ('10', 'D3 TRANSPORTASI', '3');
INSERT INTO `master_prodi` VALUES ('11', 'D3 TEKNIK SIPIL', '3');
INSERT INTO `master_prodi` VALUES ('12', 'S1 PENDIDIKAN TEKNIK MESIN', '4');
INSERT INTO `master_prodi` VALUES ('13', 'S1 TEKNIK MESIN', '4');
INSERT INTO `master_prodi` VALUES ('14', 'D3 TEKNIK MESIN', '4');
INSERT INTO `master_prodi` VALUES ('15', 'S1 PENDIDIKAN TATA BOGA', '5');
INSERT INTO `master_prodi` VALUES ('16', 'S1 PENDIDIKAN TATA BUSANA', '5');
INSERT INTO `master_prodi` VALUES ('17', 'S1 PENDIDIKAN TATA RIAS', '5');
INSERT INTO `master_prodi` VALUES ('18', 'D3 TATA BOGA', '5');
INSERT INTO `master_prodi` VALUES ('19', 'D3 TATA BUSANA', '5');

-- ----------------------------
-- Table structure for master_syarat_beasiswa
-- ----------------------------
DROP TABLE IF EXISTS `master_syarat_beasiswa`;
CREATE TABLE `master_syarat_beasiswa` (
  `id_syarat_beasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_syarat_beasiswa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_syarat_beasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_syarat_beasiswa
-- ----------------------------
INSERT INTO `master_syarat_beasiswa` VALUES ('3', 'Upload KK');
INSERT INTO `master_syarat_beasiswa` VALUES ('4', 'Surat permohonan');
INSERT INTO `master_syarat_beasiswa` VALUES ('5', 'Transkrip Nilai');
INSERT INTO `master_syarat_beasiswa` VALUES ('6', 'Surat Surat keterangan penghasilan');
INSERT INTO `master_syarat_beasiswa` VALUES ('7', 'Sertifikat penunjang');

-- ----------------------------
-- Table structure for master_user
-- ----------------------------
DROP TABLE IF EXISTS `master_user`;
CREATE TABLE `master_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `tipe_user` int(255) DEFAULT NULL COMMENT '1 kepala, 2 petugas spk, 3 mahasiswa',
  `aktif_user` enum('T','Y') DEFAULT 'Y',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_user
-- ----------------------------
INSERT INTO `master_user` VALUES ('2', 'petugas', 'e10adc3949ba59abbe56e057f20f883e', 'petugas1', '2', 'Y');
INSERT INTO `master_user` VALUES ('3', 'kepala', 'e10adc3949ba59abbe56e057f20f883e', 'kepala', '1', 'Y');
INSERT INTO `master_user` VALUES ('15', 'achmadfirdaus', 'e10adc3949ba59abbe56e057f20f883e', 'ACHMAD FIRDAUS HERMAWAN', '3', 'Y');
INSERT INTO `master_user` VALUES ('16', 'aldio', 'e10adc3949ba59abbe56e057f20f883e', 'ALDIO PRADANA', '3', 'Y');
INSERT INTO `master_user` VALUES ('17', 'andiriawan', 'e10adc3949ba59abbe56e057f20f883e', 'ANDI RIAWAN', '3', 'Y');
INSERT INTO `master_user` VALUES ('18', 'anggakurniawan', 'e10adc3949ba59abbe56e057f20f883e', 'ANGGA KURNIAWAN', '3', 'Y');
INSERT INTO `master_user` VALUES ('19', 'arifian', 'e10adc3949ba59abbe56e057f20f883e', 'ARIFIAN FARICH', '3', 'Y');
INSERT INTO `master_user` VALUES ('20', 'atok', 'e10adc3949ba59abbe56e057f20f883e', 'ATOK URROHMAN', '3', 'Y');
INSERT INTO `master_user` VALUES ('21', 'christa', 'e10adc3949ba59abbe56e057f20f883e', 'CHRISTA PUTRA', '3', 'Y');
INSERT INTO `master_user` VALUES ('22', 'churin', 'e10adc3949ba59abbe56e057f20f883e', 'CHURIN\'IN', '3', 'Y');
INSERT INTO `master_user` VALUES ('23', 'dian', 'e10adc3949ba59abbe56e057f20f883e', 'DIAN WIDHOASIH', '3', 'Y');
INSERT INTO `master_user` VALUES ('24', 'faizal', 'e10adc3949ba59abbe56e057f20f883e', 'FAIZAL HANIF', '3', 'Y');
INSERT INTO `master_user` VALUES ('25', 'galuh', 'e10adc3949ba59abbe56e057f20f883e', 'GALUH DHATUNINGTYAS', '3', 'Y');
INSERT INTO `master_user` VALUES ('26', 'isni', 'e10adc3949ba59abbe56e057f20f883e', 'ISNI WIDAYANTI', '3', 'Y');
INSERT INTO `master_user` VALUES ('27', 'm_anam', 'e10adc3949ba59abbe56e057f20f883e', 'M Anam', '3', 'Y');
INSERT INTO `master_user` VALUES ('28', 'm_haris', 'e10adc3949ba59abbe56e057f20f883e', 'M Haris', '3', 'Y');
INSERT INTO `master_user` VALUES ('29', 'm_syafii', 'e10adc3949ba59abbe56e057f20f883e', 'M Syafi\'i', '3', 'Y');
INSERT INTO `master_user` VALUES ('30', 'oktavian', 'e10adc3949ba59abbe56e057f20f883e', 'Oktavian', '3', 'Y');
INSERT INTO `master_user` VALUES ('31', 'randy', 'e10adc3949ba59abbe56e057f20f883e', 'Randy Ade', '3', 'Y');
INSERT INTO `master_user` VALUES ('32', 'syaqia', 'e10adc3949ba59abbe56e057f20f883e', 'Syaqia Azizah', '3', 'Y');
INSERT INTO `master_user` VALUES ('33', 'wahyu', 'e10adc3949ba59abbe56e057f20f883e', 'Wahyu Agus', '3', 'Y');
INSERT INTO `master_user` VALUES ('34', 'zaima', 'e10adc3949ba59abbe56e057f20f883e', 'Zaima', '3', 'Y');
INSERT INTO `master_user` VALUES ('35', 'aji', 'e10adc3949ba59abbe56e057f20f883e', 'Aji Krisna', '3', 'Y');
INSERT INTO `master_user` VALUES ('36', 'andris', 'e10adc3949ba59abbe56e057f20f883e', 'Andris Kurniawan', '3', 'Y');
INSERT INTO `master_user` VALUES ('37', 'arya', 'e10adc3949ba59abbe56e057f20f883e', 'Arya Dimas', '3', 'Y');
INSERT INTO `master_user` VALUES ('38', 'budi', 'e10adc3949ba59abbe56e057f20f883e', 'Budi Santoso', '3', 'Y');
INSERT INTO `master_user` VALUES ('39', 'dimas', 'e10adc3949ba59abbe56e057f20f883e', 'Dimas Yoga', '3', 'Y');
INSERT INTO `master_user` VALUES ('40', 'dyah', 'e10adc3949ba59abbe56e057f20f883e', 'Dyah Ayu', '3', 'Y');
INSERT INTO `master_user` VALUES ('41', 'faisal', 'e10adc3949ba59abbe56e057f20f883e', 'Faisal Ashari', '3', 'Y');
INSERT INTO `master_user` VALUES ('42', 'hanif', 'e10adc3949ba59abbe56e057f20f883e', 'Hanif Wigung', '3', 'Y');
INSERT INTO `master_user` VALUES ('43', 'intan', 'e10adc3949ba59abbe56e057f20f883e', 'Intan Wahyu', '3', 'Y');
INSERT INTO `master_user` VALUES ('44', 'septian', 'e10adc3949ba59abbe56e057f20f883e', 'Septian Eko', '3', 'Y');
INSERT INTO `master_user` VALUES ('45', 'ade', 'e10adc3949ba59abbe56e057f20f883e', 'Ade Bagus', '3', 'Y');
INSERT INTO `master_user` VALUES ('46', 'amelia', 'e10adc3949ba59abbe56e057f20f883e', 'Amelia Rosita', '3', 'Y');
INSERT INTO `master_user` VALUES ('47', 'andi', 'e10adc3949ba59abbe56e057f20f883e', 'Andi Ferianto', '3', 'Y');
INSERT INTO `master_user` VALUES ('48', 'berna', 'e10adc3949ba59abbe56e057f20f883e', 'Berna Riswa', '3', 'Y');
INSERT INTO `master_user` VALUES ('49', 'dimas_h', 'e10adc3949ba59abbe56e057f20f883e', 'Dimas Hardiansyah', '3', 'Y');
INSERT INTO `master_user` VALUES ('50', 'dionisius', 'e10adc3949ba59abbe56e057f20f883e', 'Dionisius', '3', 'Y');
INSERT INTO `master_user` VALUES ('51', 'faradina', 'e10adc3949ba59abbe56e057f20f883e', 'Faradina', '3', 'Y');
INSERT INTO `master_user` VALUES ('52', 'hananta', 'e10adc3949ba59abbe56e057f20f883e', 'Hananta Agustiar', '3', 'Y');
INSERT INTO `master_user` VALUES ('53', 'ardian', 'e10adc3949ba59abbe56e057f20f883e', 'M Ardian', '3', 'Y');
INSERT INTO `master_user` VALUES ('54', 'nuril', 'e10adc3949ba59abbe56e057f20f883e', 'Nuril', '3', 'Y');
INSERT INTO `master_user` VALUES ('55', 'a_faisal', 'e10adc3949ba59abbe56e057f20f883e', 'Achmad Faisal', '3', 'Y');
INSERT INTO `master_user` VALUES ('56', 'albertus', 'e10adc3949ba59abbe56e057f20f883e', 'Albertus Hari', '3', 'Y');
INSERT INTO `master_user` VALUES ('57', 'arista', 'e10adc3949ba59abbe56e057f20f883e', 'Arista Indrajaya', '3', 'Y');
INSERT INTO `master_user` VALUES ('58', 'dodi', 'e10adc3949ba59abbe56e057f20f883e', 'Dodi', '3', 'Y');
INSERT INTO `master_user` VALUES ('59', 'hajar', 'e10adc3949ba59abbe56e057f20f883e', 'Hajar', '3', 'Y');

-- ----------------------------
-- Table structure for ranking
-- ----------------------------
DROP TABLE IF EXISTS `ranking`;
CREATE TABLE `ranking` (
  `id_transaksi_beasiswa` int(11) DEFAULT NULL,
  `id_transaksi_pendaftaran` int(11) DEFAULT NULL,
  `nilai_akhir` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ranking
-- ----------------------------
INSERT INTO `ranking` VALUES ('1', '1', '-0.3');
INSERT INTO `ranking` VALUES ('1', '2', '0.15');
INSERT INTO `ranking` VALUES ('1', '3', '-0.15');
INSERT INTO `ranking` VALUES ('1', '4', '0.4');
INSERT INTO `ranking` VALUES ('1', '5', '-0.1');

-- ----------------------------
-- Table structure for transaksi_beasiswa
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_beasiswa`;
CREATE TABLE `transaksi_beasiswa` (
  `id_transaksi_beasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_master_beasiswa` int(11) DEFAULT NULL COMMENT 'relasi ke master beasiswa',
  `tgl_awal_beasiswa` date DEFAULT NULL,
  `tgl_akhir_beasiswa` date DEFAULT NULL,
  `tgl_pengesahan_beasiswa` date DEFAULT NULL,
  `no_surat_pengesahan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_beasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi_beasiswa
-- ----------------------------
INSERT INTO `transaksi_beasiswa` VALUES ('1', '1', '2015-12-01', '2016-02-29', null, '2015-12-30');

-- ----------------------------
-- Table structure for transaksi_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_kriteria`;
CREATE TABLE `transaksi_kriteria` (
  `id_transaksi_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `id_detail_kriteria` int(11) DEFAULT NULL,
  `id_transaksi_pendaftaran` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi_kriteria
-- ----------------------------
INSERT INTO `transaksi_kriteria` VALUES ('1', '6', '1', '1');
INSERT INTO `transaksi_kriteria` VALUES ('2', '10', '1', '2');
INSERT INTO `transaksi_kriteria` VALUES ('3', '14', '1', '3');
INSERT INTO `transaksi_kriteria` VALUES ('4', '19', '1', '4');
INSERT INTO `transaksi_kriteria` VALUES ('5', '23', '1', '5');
INSERT INTO `transaksi_kriteria` VALUES ('6', '7', '2', '1');
INSERT INTO `transaksi_kriteria` VALUES ('7', '10', '2', '2');
INSERT INTO `transaksi_kriteria` VALUES ('8', '15', '2', '3');
INSERT INTO `transaksi_kriteria` VALUES ('9', '19', '2', '4');
INSERT INTO `transaksi_kriteria` VALUES ('10', '23', '2', '5');
INSERT INTO `transaksi_kriteria` VALUES ('11', '6', '3', '1');
INSERT INTO `transaksi_kriteria` VALUES ('12', '2', '3', '2');
INSERT INTO `transaksi_kriteria` VALUES ('13', '12', '3', '3');
INSERT INTO `transaksi_kriteria` VALUES ('14', '19', '3', '4');
INSERT INTO `transaksi_kriteria` VALUES ('15', '23', '3', '5');
INSERT INTO `transaksi_kriteria` VALUES ('16', '6', '4', '1');
INSERT INTO `transaksi_kriteria` VALUES ('17', '9', '4', '2');
INSERT INTO `transaksi_kriteria` VALUES ('18', '15', '4', '3');
INSERT INTO `transaksi_kriteria` VALUES ('19', '22', '4', '4');
INSERT INTO `transaksi_kriteria` VALUES ('20', '23', '4', '5');
INSERT INTO `transaksi_kriteria` VALUES ('21', '6', '5', '1');
INSERT INTO `transaksi_kriteria` VALUES ('22', '10', '5', '2');
INSERT INTO `transaksi_kriteria` VALUES ('23', '14', '5', '3');
INSERT INTO `transaksi_kriteria` VALUES ('24', '21', '5', '4');
INSERT INTO `transaksi_kriteria` VALUES ('25', '23', '5', '5');
INSERT INTO `transaksi_kriteria` VALUES ('26', '6', '6', '1');
INSERT INTO `transaksi_kriteria` VALUES ('27', '2', '6', '2');
INSERT INTO `transaksi_kriteria` VALUES ('28', '14', '6', '3');
INSERT INTO `transaksi_kriteria` VALUES ('29', '19', '6', '4');
INSERT INTO `transaksi_kriteria` VALUES ('30', '23', '6', '5');
INSERT INTO `transaksi_kriteria` VALUES ('31', '6', '7', '1');
INSERT INTO `transaksi_kriteria` VALUES ('32', '11', '7', '2');
INSERT INTO `transaksi_kriteria` VALUES ('33', '14', '7', '3');
INSERT INTO `transaksi_kriteria` VALUES ('34', '19', '7', '4');
INSERT INTO `transaksi_kriteria` VALUES ('35', '23', '7', '5');
INSERT INTO `transaksi_kriteria` VALUES ('36', '7', '8', '1');
INSERT INTO `transaksi_kriteria` VALUES ('37', '2', '8', '2');
INSERT INTO `transaksi_kriteria` VALUES ('38', '15', '8', '3');
INSERT INTO `transaksi_kriteria` VALUES ('39', '19', '8', '4');
INSERT INTO `transaksi_kriteria` VALUES ('40', '23', '8', '5');
INSERT INTO `transaksi_kriteria` VALUES ('41', '7', '9', '1');
INSERT INTO `transaksi_kriteria` VALUES ('42', '10', '9', '2');
INSERT INTO `transaksi_kriteria` VALUES ('43', '14', '9', '3');
INSERT INTO `transaksi_kriteria` VALUES ('44', '22', '9', '4');
INSERT INTO `transaksi_kriteria` VALUES ('45', '23', '9', '5');
INSERT INTO `transaksi_kriteria` VALUES ('46', '6', '10', '1');
INSERT INTO `transaksi_kriteria` VALUES ('47', '9', '10', '2');
INSERT INTO `transaksi_kriteria` VALUES ('48', '15', '10', '3');
INSERT INTO `transaksi_kriteria` VALUES ('49', '19', '10', '4');
INSERT INTO `transaksi_kriteria` VALUES ('50', '23', '10', '5');
INSERT INTO `transaksi_kriteria` VALUES ('51', '6', '11', '1');
INSERT INTO `transaksi_kriteria` VALUES ('52', '0', '11', '2');
INSERT INTO `transaksi_kriteria` VALUES ('53', '14', '11', '3');
INSERT INTO `transaksi_kriteria` VALUES ('54', '22', '11', '4');
INSERT INTO `transaksi_kriteria` VALUES ('55', '23', '11', '5');
INSERT INTO `transaksi_kriteria` VALUES ('56', '6', '12', '1');
INSERT INTO `transaksi_kriteria` VALUES ('57', '8', '12', '2');
INSERT INTO `transaksi_kriteria` VALUES ('58', '14', '12', '3');
INSERT INTO `transaksi_kriteria` VALUES ('59', '22', '12', '4');
INSERT INTO `transaksi_kriteria` VALUES ('60', '23', '12', '5');
INSERT INTO `transaksi_kriteria` VALUES ('61', '6', '13', '1');
INSERT INTO `transaksi_kriteria` VALUES ('62', '9', '13', '2');
INSERT INTO `transaksi_kriteria` VALUES ('63', '15', '13', '3');
INSERT INTO `transaksi_kriteria` VALUES ('64', '22', '13', '4');
INSERT INTO `transaksi_kriteria` VALUES ('65', '23', '13', '5');
INSERT INTO `transaksi_kriteria` VALUES ('66', '7', '14', '1');
INSERT INTO `transaksi_kriteria` VALUES ('67', '8', '14', '2');
INSERT INTO `transaksi_kriteria` VALUES ('68', '14', '14', '3');
INSERT INTO `transaksi_kriteria` VALUES ('69', '22', '14', '4');
INSERT INTO `transaksi_kriteria` VALUES ('70', '23', '14', '5');
INSERT INTO `transaksi_kriteria` VALUES ('71', '6', '15', '1');
INSERT INTO `transaksi_kriteria` VALUES ('72', '2', '15', '2');
INSERT INTO `transaksi_kriteria` VALUES ('73', '14', '15', '3');
INSERT INTO `transaksi_kriteria` VALUES ('74', '22', '15', '4');
INSERT INTO `transaksi_kriteria` VALUES ('75', '23', '15', '5');
INSERT INTO `transaksi_kriteria` VALUES ('76', '6', '16', '1');
INSERT INTO `transaksi_kriteria` VALUES ('77', '8', '16', '2');
INSERT INTO `transaksi_kriteria` VALUES ('78', '12', '16', '3');
INSERT INTO `transaksi_kriteria` VALUES ('79', '19', '16', '4');
INSERT INTO `transaksi_kriteria` VALUES ('80', '23', '16', '5');
INSERT INTO `transaksi_kriteria` VALUES ('81', '6', '17', '1');
INSERT INTO `transaksi_kriteria` VALUES ('82', '8', '17', '2');
INSERT INTO `transaksi_kriteria` VALUES ('83', '15', '17', '3');
INSERT INTO `transaksi_kriteria` VALUES ('84', '22', '17', '4');
INSERT INTO `transaksi_kriteria` VALUES ('85', '23', '17', '5');
INSERT INTO `transaksi_kriteria` VALUES ('86', '7', '18', '1');
INSERT INTO `transaksi_kriteria` VALUES ('87', '11', '18', '2');
INSERT INTO `transaksi_kriteria` VALUES ('88', '15', '18', '3');
INSERT INTO `transaksi_kriteria` VALUES ('89', '19', '18', '4');
INSERT INTO `transaksi_kriteria` VALUES ('90', '23', '18', '5');
INSERT INTO `transaksi_kriteria` VALUES ('91', '6', '19', '1');
INSERT INTO `transaksi_kriteria` VALUES ('92', '9', '19', '2');
INSERT INTO `transaksi_kriteria` VALUES ('93', '14', '19', '3');
INSERT INTO `transaksi_kriteria` VALUES ('94', '22', '19', '4');
INSERT INTO `transaksi_kriteria` VALUES ('95', '23', '19', '5');
INSERT INTO `transaksi_kriteria` VALUES ('96', '7', '20', '1');
INSERT INTO `transaksi_kriteria` VALUES ('97', '11', '20', '2');
INSERT INTO `transaksi_kriteria` VALUES ('98', '12', '20', '3');
INSERT INTO `transaksi_kriteria` VALUES ('99', '22', '20', '4');
INSERT INTO `transaksi_kriteria` VALUES ('100', '23', '20', '5');
INSERT INTO `transaksi_kriteria` VALUES ('101', '5', '21', '1');
INSERT INTO `transaksi_kriteria` VALUES ('102', '10', '21', '2');
INSERT INTO `transaksi_kriteria` VALUES ('103', '14', '21', '3');
INSERT INTO `transaksi_kriteria` VALUES ('104', '21', '21', '4');
INSERT INTO `transaksi_kriteria` VALUES ('105', '23', '21', '5');
INSERT INTO `transaksi_kriteria` VALUES ('106', '6', '22', '1');
INSERT INTO `transaksi_kriteria` VALUES ('107', '2', '22', '2');
INSERT INTO `transaksi_kriteria` VALUES ('108', '14', '22', '3');
INSERT INTO `transaksi_kriteria` VALUES ('109', '19', '22', '4');
INSERT INTO `transaksi_kriteria` VALUES ('110', '23', '22', '5');
INSERT INTO `transaksi_kriteria` VALUES ('111', '5', '23', '1');
INSERT INTO `transaksi_kriteria` VALUES ('112', '11', '23', '2');
INSERT INTO `transaksi_kriteria` VALUES ('113', '14', '23', '3');
INSERT INTO `transaksi_kriteria` VALUES ('114', '21', '23', '4');
INSERT INTO `transaksi_kriteria` VALUES ('115', '23', '23', '5');
INSERT INTO `transaksi_kriteria` VALUES ('116', '6', '24', '1');
INSERT INTO `transaksi_kriteria` VALUES ('117', '9', '24', '2');
INSERT INTO `transaksi_kriteria` VALUES ('118', '16', '24', '3');
INSERT INTO `transaksi_kriteria` VALUES ('119', '22', '24', '4');
INSERT INTO `transaksi_kriteria` VALUES ('120', '23', '24', '5');
INSERT INTO `transaksi_kriteria` VALUES ('121', '5', '25', '1');
INSERT INTO `transaksi_kriteria` VALUES ('122', '11', '25', '2');
INSERT INTO `transaksi_kriteria` VALUES ('123', '12', '25', '3');
INSERT INTO `transaksi_kriteria` VALUES ('124', '21', '25', '4');
INSERT INTO `transaksi_kriteria` VALUES ('125', '23', '25', '5');
INSERT INTO `transaksi_kriteria` VALUES ('126', '6', '26', '1');
INSERT INTO `transaksi_kriteria` VALUES ('127', '2', '26', '2');
INSERT INTO `transaksi_kriteria` VALUES ('128', '15', '26', '3');
INSERT INTO `transaksi_kriteria` VALUES ('129', '22', '26', '4');
INSERT INTO `transaksi_kriteria` VALUES ('130', '23', '26', '5');
INSERT INTO `transaksi_kriteria` VALUES ('131', '6', '27', '1');
INSERT INTO `transaksi_kriteria` VALUES ('132', '10', '27', '2');
INSERT INTO `transaksi_kriteria` VALUES ('133', '14', '27', '3');
INSERT INTO `transaksi_kriteria` VALUES ('134', '22', '27', '4');
INSERT INTO `transaksi_kriteria` VALUES ('135', '24', '27', '5');
INSERT INTO `transaksi_kriteria` VALUES ('136', '6', '28', '1');
INSERT INTO `transaksi_kriteria` VALUES ('137', '11', '28', '2');
INSERT INTO `transaksi_kriteria` VALUES ('138', '14', '28', '3');
INSERT INTO `transaksi_kriteria` VALUES ('139', '21', '28', '4');
INSERT INTO `transaksi_kriteria` VALUES ('140', '23', '28', '5');
INSERT INTO `transaksi_kriteria` VALUES ('141', '6', '29', '1');
INSERT INTO `transaksi_kriteria` VALUES ('142', '2', '29', '2');
INSERT INTO `transaksi_kriteria` VALUES ('143', '14', '29', '3');
INSERT INTO `transaksi_kriteria` VALUES ('144', '22', '29', '4');
INSERT INTO `transaksi_kriteria` VALUES ('145', '23', '29', '5');
INSERT INTO `transaksi_kriteria` VALUES ('146', '6', '30', '1');
INSERT INTO `transaksi_kriteria` VALUES ('147', '8', '30', '2');
INSERT INTO `transaksi_kriteria` VALUES ('148', '15', '30', '3');
INSERT INTO `transaksi_kriteria` VALUES ('149', '22', '30', '4');
INSERT INTO `transaksi_kriteria` VALUES ('150', '24', '30', '5');
INSERT INTO `transaksi_kriteria` VALUES ('151', '6', '31', '1');
INSERT INTO `transaksi_kriteria` VALUES ('152', '11', '31', '2');
INSERT INTO `transaksi_kriteria` VALUES ('153', '16', '31', '3');
INSERT INTO `transaksi_kriteria` VALUES ('154', '19', '31', '4');
INSERT INTO `transaksi_kriteria` VALUES ('155', '23', '31', '5');
INSERT INTO `transaksi_kriteria` VALUES ('156', '6', '32', '1');
INSERT INTO `transaksi_kriteria` VALUES ('157', '9', '32', '2');
INSERT INTO `transaksi_kriteria` VALUES ('158', '14', '32', '3');
INSERT INTO `transaksi_kriteria` VALUES ('159', '19', '32', '4');
INSERT INTO `transaksi_kriteria` VALUES ('160', '25', '32', '5');
INSERT INTO `transaksi_kriteria` VALUES ('161', '5', '33', '1');
INSERT INTO `transaksi_kriteria` VALUES ('162', '11', '33', '2');
INSERT INTO `transaksi_kriteria` VALUES ('163', '14', '33', '3');
INSERT INTO `transaksi_kriteria` VALUES ('164', '22', '33', '4');
INSERT INTO `transaksi_kriteria` VALUES ('165', '25', '33', '5');
INSERT INTO `transaksi_kriteria` VALUES ('166', '5', '34', '1');
INSERT INTO `transaksi_kriteria` VALUES ('167', '10', '34', '2');
INSERT INTO `transaksi_kriteria` VALUES ('168', '14', '34', '3');
INSERT INTO `transaksi_kriteria` VALUES ('169', '21', '34', '4');
INSERT INTO `transaksi_kriteria` VALUES ('170', '23', '34', '5');
INSERT INTO `transaksi_kriteria` VALUES ('171', '6', '35', '1');
INSERT INTO `transaksi_kriteria` VALUES ('172', '11', '35', '2');
INSERT INTO `transaksi_kriteria` VALUES ('173', '12', '35', '3');
INSERT INTO `transaksi_kriteria` VALUES ('174', '22', '35', '4');
INSERT INTO `transaksi_kriteria` VALUES ('175', '27', '35', '5');
INSERT INTO `transaksi_kriteria` VALUES ('176', '6', '36', '1');
INSERT INTO `transaksi_kriteria` VALUES ('177', '11', '36', '2');
INSERT INTO `transaksi_kriteria` VALUES ('178', '14', '36', '3');
INSERT INTO `transaksi_kriteria` VALUES ('179', '22', '36', '4');
INSERT INTO `transaksi_kriteria` VALUES ('180', '23', '36', '5');
INSERT INTO `transaksi_kriteria` VALUES ('181', '6', '37', '1');
INSERT INTO `transaksi_kriteria` VALUES ('182', '9', '37', '2');
INSERT INTO `transaksi_kriteria` VALUES ('183', '14', '37', '3');
INSERT INTO `transaksi_kriteria` VALUES ('184', '19', '37', '4');
INSERT INTO `transaksi_kriteria` VALUES ('185', '23', '37', '5');
INSERT INTO `transaksi_kriteria` VALUES ('186', '6', '38', '1');
INSERT INTO `transaksi_kriteria` VALUES ('187', '9', '38', '2');
INSERT INTO `transaksi_kriteria` VALUES ('188', '15', '38', '3');
INSERT INTO `transaksi_kriteria` VALUES ('189', '19', '38', '4');
INSERT INTO `transaksi_kriteria` VALUES ('190', '25', '38', '5');
INSERT INTO `transaksi_kriteria` VALUES ('191', '5', '39', '1');
INSERT INTO `transaksi_kriteria` VALUES ('192', '10', '39', '2');
INSERT INTO `transaksi_kriteria` VALUES ('193', '14', '39', '3');
INSERT INTO `transaksi_kriteria` VALUES ('194', '21', '39', '4');
INSERT INTO `transaksi_kriteria` VALUES ('195', '23', '39', '5');
INSERT INTO `transaksi_kriteria` VALUES ('196', '6', '40', '1');
INSERT INTO `transaksi_kriteria` VALUES ('197', '2', '40', '2');
INSERT INTO `transaksi_kriteria` VALUES ('198', '15', '40', '3');
INSERT INTO `transaksi_kriteria` VALUES ('199', '19', '40', '4');
INSERT INTO `transaksi_kriteria` VALUES ('200', '23', '40', '5');
INSERT INTO `transaksi_kriteria` VALUES ('201', '5', '41', '1');
INSERT INTO `transaksi_kriteria` VALUES ('202', '9', '41', '2');
INSERT INTO `transaksi_kriteria` VALUES ('203', '14', '41', '3');
INSERT INTO `transaksi_kriteria` VALUES ('204', '22', '41', '4');
INSERT INTO `transaksi_kriteria` VALUES ('205', '23', '41', '5');
INSERT INTO `transaksi_kriteria` VALUES ('206', '6', '42', '1');
INSERT INTO `transaksi_kriteria` VALUES ('207', '11', '42', '2');
INSERT INTO `transaksi_kriteria` VALUES ('208', '15', '42', '3');
INSERT INTO `transaksi_kriteria` VALUES ('209', '22', '42', '4');
INSERT INTO `transaksi_kriteria` VALUES ('210', '23', '42', '5');
INSERT INTO `transaksi_kriteria` VALUES ('211', '6', '43', '1');
INSERT INTO `transaksi_kriteria` VALUES ('212', '11', '43', '2');
INSERT INTO `transaksi_kriteria` VALUES ('213', '15', '43', '3');
INSERT INTO `transaksi_kriteria` VALUES ('214', '22', '43', '4');
INSERT INTO `transaksi_kriteria` VALUES ('215', '23', '43', '5');
INSERT INTO `transaksi_kriteria` VALUES ('216', '5', '44', '1');
INSERT INTO `transaksi_kriteria` VALUES ('217', '8', '44', '2');
INSERT INTO `transaksi_kriteria` VALUES ('218', '12', '44', '3');
INSERT INTO `transaksi_kriteria` VALUES ('219', '22', '44', '4');
INSERT INTO `transaksi_kriteria` VALUES ('220', '23', '44', '5');
INSERT INTO `transaksi_kriteria` VALUES ('221', '6', '45', '1');
INSERT INTO `transaksi_kriteria` VALUES ('222', '8', '45', '2');
INSERT INTO `transaksi_kriteria` VALUES ('223', '14', '45', '3');
INSERT INTO `transaksi_kriteria` VALUES ('224', '19', '45', '4');
INSERT INTO `transaksi_kriteria` VALUES ('225', '23', '45', '5');

-- ----------------------------
-- Table structure for transaksi_pendaftaran
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_pendaftaran`;
CREATE TABLE `transaksi_pendaftaran` (
  `id_transaksi_pendaftaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_transaksi_beasiswa` int(11) DEFAULT NULL,
  `tgl_daftar_mahasiswa` date DEFAULT NULL,
  `ranking_spk` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT '1' COMMENT '1 = berkas diajukan, 2 berkas terverifikasi,3 berkas kurang lengkap,4 diterima beasiswa,5 tidak diterima',
  `catatan` text,
  PRIMARY KEY (`id_transaksi_pendaftaran`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi_pendaftaran
-- ----------------------------
INSERT INTO `transaksi_pendaftaran` VALUES ('1', '6', '1', '2015-11-13', null, '15', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('2', '7', '1', '2015-11-13', null, '16', '1', 'ditolak\n');
INSERT INTO `transaksi_pendaftaran` VALUES ('3', '8', '1', '2015-11-13', null, '17', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('4', '9', '1', '2015-11-13', null, '18', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('5', '10', '1', '2015-12-01', null, '19', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('6', '11', '1', '2015-12-01', null, '20', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('7', '12', '1', '2015-12-01', null, '21', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('8', '13', '1', '2015-12-01', null, '22', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('9', '14', '1', '2015-12-01', null, '23', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('10', '15', '1', '2015-12-01', null, '24', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('11', '16', '1', '2015-12-01', null, '25', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('12', '17', '1', '2015-12-01', null, '26', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('13', '18', '1', '2016-01-10', null, '27', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('14', '19', '1', '2016-01-10', null, '28', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('15', '20', '1', '2016-01-10', null, '29', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('16', '21', '1', '2016-01-10', null, '30', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('17', '22', '1', '2016-01-10', null, '31', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('18', '23', '1', '2016-01-10', null, '32', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('19', '24', '1', '2016-01-10', null, '33', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('20', '25', '1', '2016-01-10', null, '34', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('21', '26', '1', '2016-01-10', null, '35', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('22', '27', '1', '2016-01-10', null, '36', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('23', '28', '1', '2016-01-10', null, '37', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('24', '29', '1', '2016-01-10', null, '38', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('25', '30', '1', '2016-01-10', null, '39', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('26', '31', '1', '2016-01-10', null, '40', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('27', '32', '1', '2016-01-10', null, '41', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('28', '33', '1', '2016-01-10', null, '42', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('29', '34', '1', '2016-01-10', null, '43', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('30', '35', '1', '2016-01-10', null, '44', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('31', '36', '1', '2016-01-10', null, '45', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('32', '37', '1', '2016-01-10', null, '46', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('33', '38', '1', '2016-01-10', null, '47', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('34', '39', '1', '2016-01-10', null, '48', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('35', '40', '1', '2016-01-10', null, '49', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('36', '41', '1', '2016-01-10', null, '50', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('37', '42', '1', '2016-01-10', null, '51', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('38', '43', '1', '2016-01-10', null, '52', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('39', '44', '1', '2016-01-10', null, '53', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('40', '45', '1', '2016-01-10', null, '54', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('41', '46', '1', '2016-01-10', null, '55', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('42', '47', '1', '2016-01-10', null, '56', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('43', '48', '1', '2016-01-10', null, '57', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('44', '49', '1', '2016-01-10', null, '58', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('45', '50', '1', '2016-01-10', null, '59', '1', null);

-- ----------------------------
-- Table structure for transaksi_syarat_beasiswa
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_syarat_beasiswa`;
CREATE TABLE `transaksi_syarat_beasiswa` (
  `id_transaksi_syarat_beasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi_pendaftaran` int(11) DEFAULT NULL COMMENT 'relasi ke tabel transaksi_pendaftaran',
  `foto_syarat_beasiswa` varchar(255) DEFAULT NULL,
  `verifikasi` enum('T','S') DEFAULT 'T' COMMENT 'S UNTUK SESUAI, T UNTUK TIDAK',
  `id_syarat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_syarat_beasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=344 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi_syarat_beasiswa
-- ----------------------------
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('1', '1', 'Untitled-11.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('2', '1', 'Untitled-7.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('3', '1', 'Untitled-8.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('4', '1', 'Untitled-9.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('5', '1', 'Untitled-10.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('6', '1', 'Untitled-12.jpg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('7', '1', 'Untitled-13.jpg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('8', '1', 'Untitled-14.jpg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('9', '2', 'Untitled-10.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('10', '2', 'Untitled-7.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('11', '2', 'Untitled-8.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('12', '2', 'Untitled-12.jpg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('13', '2', 'Untitled-11.jpg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('14', '2', 'Untitled-14.jpg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('15', '3', 'Untitled-Scanned-18.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('16', '3', 'Untitled-Scanned-13.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('17', '3', 'Untitled-Scanned-14.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('18', '3', 'Untitled-Scanned-15.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('19', '4', 'Untitled-20.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('20', '4', 'Untitled-14.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('21', '4', 'Untitled-15.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('22', '4', 'Untitled-16.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('23', '4', 'Untitled-17.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('24', '4', 'Untitled-18.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('25', '5', 'Untitled-Scanned-06.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('26', '5', 'Untitled-Scanned-04.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('27', '5', 'Untitled-Scanned-01.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('28', '5', 'Untitled-Scanned-02.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('29', '5', 'Untitled-Scanned-03.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('30', '5', 'Untitled-Scanned-05.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('31', '6', 'Untitled-Scanned-48.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('32', '6', 'Untitled-Scanned-44.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('33', '6', 'Untitled-Scanned-45.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('34', '6', 'Untitled-Scanned-46.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('35', '6', 'Untitled-Scanned-47.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('36', '7', 'Untitled-14.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('37', '7', 'Untitled-10.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('38', '7', 'Untitled-11.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('39', '7', 'Untitled-12.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('40', '7', 'Untitled-13.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('41', '8', 'Untitled-Scanned-33.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('42', '8', 'Untitled-Scanned-31.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('43', '8', 'Untitled-Scanned-32.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('44', '8', 'Untitled-Scanned-34.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('45', '9', 'Untitled-Scanned-45.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('46', '9', 'Untitled-Scanned-42.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('47', '9', 'Untitled-Scanned-43.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('48', '9', 'Untitled-Scanned-44.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('49', '9', 'Untitled-Scanned-46.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('50', '10', 'Untitled-Scanned-29.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('51', '10', 'Untitled-Scanned-30.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('52', '10', 'Untitled-Scanned-24.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('53', '10', 'Untitled-Scanned-25.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('54', '10', 'Untitled-Scanned-26.jpg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('55', '10', 'Untitled-Scanned-27.jpg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('56', '10', 'Untitled-Scanned-28.jpg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('57', '11', 'Untitled-Scanned-60.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('58', '11', 'Untitled-Scanned-52.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('59', '11', 'Untitled-Scanned-55.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('60', '11', 'Untitled-Scanned-56.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('61', '11', 'Untitled-Scanned-57.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('62', '11', 'Untitled-Scanned-59.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('63', '12', 'Untitled-5.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('64', '12', 'Untitled-1.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('65', '12', 'Untitled-2.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('66', '12', 'Untitled-3.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('67', '12', 'Untitled-4.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('68', '12', 'Untitled-6.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('69', '13', 'Untitled-Scanned-12.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('70', '13', 'Untitled-Scanned-07.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('71', '13', 'Untitled-Scanned-08.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('72', '13', 'Untitled-Scanned-09.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('73', '13', 'Untitled-Scanned-10.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('74', '13', 'Untitled-Scanned-11.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('75', '14', 'Untitled-Scanned-37.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('76', '14', 'Untitled-Scanned-38.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('77', '14', 'Untitled-Scanned-39.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('78', '14', 'Untitled-Scanned-40.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('79', '14', 'Untitled-Scanned-41.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('80', '14', 'Untitled-Scanned-35.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('81', '14', 'Untitled-Scanned-36.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('82', '15', 'Untitled-13.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('83', '15', 'Untitled-7.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('84', '15', 'Untitled-8.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('85', '15', 'Untitled-9.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('86', '15', 'Untitled-10.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('87', '15', 'Untitled-11.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('88', '15', 'Untitled-12.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('89', '16', 'Untitled-18.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('90', '16', 'Untitled-15.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('91', '16', 'Untitled-16.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('92', '16', 'Untitled-17.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('93', '17', 'Untitled-Scanned-42.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('94', '17', 'Untitled-Scanned-40.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('95', '17', 'Untitled-Scanned-36.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('96', '17', 'Untitled-Scanned-37.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('97', '17', 'Untitled-Scanned-39.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('98', '17', 'Untitled-Scanned-38.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('99', '17', 'Untitled-Scanned-41.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('100', '17', 'Untitled-Scanned-43.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('101', '18', 'Untitled-19.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('102', '18', 'Untitled-15.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('103', '18', 'Untitled-16.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('104', '18', 'Untitled-17.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('105', '18', 'Untitled-18.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('106', '19', 'Untitled-6.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('107', '19', 'Untitled-2.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('108', '19', 'Untitled-3.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('109', '19', 'Untitled-5.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('110', '19', 'Untitled-4.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('111', '19', 'Untitled-7.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('112', '20', 'Untitled-6.jpg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('113', '20', 'Untitled-1.jpg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('114', '20', 'Untitled-2.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('115', '20', 'Untitled-3.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('116', '20', 'Untitled-4.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('117', '20', 'Untitled-5.jpg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('118', '20', 'Untitled-7.jpg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('119', '21', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('120', '21', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('121', '21', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('122', '21', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('123', '21', 'SERTIFIKAT_1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('124', '22', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('125', '22', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('126', '22', 'KHS.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('127', '22', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('128', '23', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('129', '23', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('130', '23', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('131', '23', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('132', '23', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('133', '23', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('134', '23', 'SERIFIKAT4BALIK.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('135', '23', 'SERTIFIKAT2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('136', '23', 'SERTIFIKAT1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('137', '23', 'SERTIFIKAT2BALIK.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('138', '23', 'SERTIFIKAT3.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('139', '23', 'SERTIFIKAT4.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('140', '24', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('141', '24', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('142', '24', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('143', '24', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('144', '24', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('150', '24', 'SKKM.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('151', '24', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('152', '24', 'SERIFIKAT4.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('153', '24', 'SERTIFIKAT1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('154', '24', 'SERTIFIKAT2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('155', '24', 'SERTIFIKAT3.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('156', '24', 'SERTIFIKAT4.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('157', '25', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('158', '25', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('159', '25', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('160', '25', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('161', '25', 'SLIP_GAJI1.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('162', '25', 'SLIP_GAJI2.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('163', '26', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('164', '26', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('165', '26', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('166', '26', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('167', '26', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('168', '26', 'TRANSKRIP4.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('169', '26', 'SKKM.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('170', '27', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('171', '27', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('172', '27', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('173', '27', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('174', '27', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('175', '27', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('176', '27', 'SERTIFIKAT1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('177', '27', 'SERTIFIKAT2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('178', '27', 'SERTIFIKAT3.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('179', '28', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('180', '28', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('181', '28', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('182', '28', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('183', '28', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('184', '28', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('185', '28', 'SERTIFIKAT1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('186', '28', 'SERTIFIKAT1LMBR2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('187', '28', 'SERTIFIKAT2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('188', '28', 'SERTIFIKAT3.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('189', '29', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('190', '29', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('191', '29', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('192', '29', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('193', '29', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('194', '29', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('195', '29', 'SERTIFIKAT1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('196', '29', 'SERTIFIKAT1LMBR2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('197', '29', 'SERTIFIKAT2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('198', '29', 'SERTIFIKAT2LMBR2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('199', '29', 'SERTIFIKAT2LMBR3.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('200', '29', 'SERTIFIKAT3.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('201', '29', 'SERTIFIKAT4.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('202', '29', 'SERTIFIKAT5.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('203', '30', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('204', '30', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('205', '30', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('206', '30', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('207', '30', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('208', '30', 'TRANSKRIP4.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('209', '30', 'SKKM.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('210', '30', 'SKKM2.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('211', '30', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('212', '30', 'SERTIFIKAT1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('213', '30', 'SERTIFIKAT1LMBR2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('214', '30', 'SERTIFIKAT2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('215', '31', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('216', '31', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('217', '31', 'TRANSKRIP.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('218', '31', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('219', '32', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('220', '32', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('221', '32', 'TRANSKRIP.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('222', '32', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('223', '32', 'SERTIFIKAT1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('224', '32', 'SERTIFIKAT3.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('225', '32', 'SERTIFIKAT2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('226', '33', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('227', '33', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('228', '33', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('229', '33', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('230', '33', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('231', '33', 'SLIP_GAJI_1.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('232', '33', 'SLIP_GAJI2.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('233', '33', 'SERTIFIKAT1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('234', '33', 'SERTIFIKAT2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('235', '33', 'SERTIFIKAT3.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('236', '33', 'SERTIFIKAT4.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('237', '33', 'SERTIFIKAT5.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('238', '34', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('239', '34', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('240', '34', 'TRANSKRIP.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('241', '34', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('242', '34', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('243', '35', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('244', '35', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('245', '35', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('246', '35', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('247', '35', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('248', '35', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('249', '35', 'SERTIFIKAT1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('250', '35', 'SERTIFIKAT2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('251', '35', 'SERTIFIKAT2BALIK.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('252', '35', 'SERTIFIKAT3.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('253', '35', 'SERTIFIKAT4.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('254', '35', 'SERTIFIKAT5.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('255', '36', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('256', '36', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('257', '36', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('258', '36', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('259', '36', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('260', '36', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('261', '36', 'SERTIFIKAT1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('262', '36', 'SERTIFIKAT1LMBR2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('263', '36', 'SERTIFIKAT2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('264', '36', 'SERTIFIKAT3.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('265', '36', 'SERTIFIKAT3LMBR2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('266', '36', 'SERTIFIKAT4.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('267', '36', 'SERTIFIKAT5.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('268', '36', 'SERTIFIKAT6.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('269', '36', 'SERTIFIKAT6LMBR2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('270', '36', 'SERTIFIKAT7.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('271', '36', 'SERTIFIKAT8.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('272', '36', 'SERTIFIKAT9.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('273', '36', 'SERTIFIKAT10.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('274', '36', 'SERTIFIKAT10LMBR2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('275', '37', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('276', '37', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('277', '37', 'TRANSKRIP.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('278', '37', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('279', '38', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('280', '38', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('281', '38', 'TRANSKRIP.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('282', '38', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('283', '38', 'SERTIFIKAT1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('284', '38', 'SERTIFIKAT2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('285', '38', 'SERTIFIKAT3.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('286', '39', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('287', '39', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('288', '39', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('289', '39', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('290', '39', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('291', '39', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('292', '40', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('293', '40', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('294', '40', 'TRANSKRIP.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('295', '40', 'SKM.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('296', '40', 'SERTIFIKAT.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('297', '41', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('298', '41', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('299', '41', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('300', '41', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('301', '41', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('302', '41', 'SKTM.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('303', '41', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('304', '41', 'SERTIFIKAT1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('305', '41', 'SERTIFIKAT1LMBR2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('306', '41', 'SERTIFIKAT2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('307', '41', 'SERTIFIKAT2LMBR2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('308', '42', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('309', '42', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('310', '42', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('311', '42', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('312', '42', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('313', '42', 'SKTM.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('314', '42', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('315', '42', 'SERTIFIKAT1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('316', '42', 'SERTIFIKAT1LMBR2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('317', '42', 'SERTIFIKAT2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('318', '42', 'SERTIFIKAT2LMBR2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('319', '43', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('320', '43', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('321', '43', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('322', '43', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('323', '43', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('324', '43', 'TRANSKRIP4.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('325', '43', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('326', '44', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('327', '44', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('328', '44', 'TRANSKRIP1.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('329', '44', 'TRANSKRIP2.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('330', '44', 'TRANSKRIP3.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('331', '44', 'TRANSKRIP4.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('332', '44', 'SKTM.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('333', '44', 'SLIP_GAJI.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('334', '44', 'SLIP_GAJI2.jpeg', 'T', '6');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('335', '44', 'SERTIFIKAT1.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('336', '44', 'SERTIFIKAT2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('337', '44', 'SERTIFIKAT2LMBR2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('338', '44', 'SERTIFIKAT3.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('339', '44', 'SERTIFIKAT3LMBR2.jpeg', 'T', '7');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('340', '45', 'KK.jpeg', 'T', '3');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('341', '45', 'PERMOHONAN_BEASISWA.jpeg', 'T', '4');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('342', '45', 'TRANSKRIP.jpeg', 'T', '5');
INSERT INTO `transaksi_syarat_beasiswa` VALUES ('343', '45', 'SLIP_GAJI.jpeg', 'T', '6');

-- ----------------------------
-- View structure for view_kriteria_pendaftaran
-- ----------------------------
DROP VIEW IF EXISTS `view_kriteria_pendaftaran`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_kriteria_pendaftaran` AS select `tk`.`id_transaksi_kriteria` AS `id_transaksi_kriteria`,`tk`.`id_detail_kriteria` AS `id_detail_kriteria`,`tk`.`id_transaksi_pendaftaran` AS `id_transaksi_pendaftaran`,`tk`.`id_kriteria` AS `id_kriteria`,`mdk`.`bobot_detail_kriteria` AS `bobot_detail_kriteria`,`tp`.`id_status` AS `id_status`,`tp`.`id_transaksi_beasiswa` AS `id_transaksi_beasiswa` from ((`transaksi_kriteria` `tk` join `master_detail_kriteria` `mdk` on((`tk`.`id_detail_kriteria` = `mdk`.`id_detail_kriteria`))) join `transaksi_pendaftaran` `tp` on(((`tk`.`id_transaksi_pendaftaran` = `tp`.`id_transaksi_pendaftaran`) and (`tp`.`id_status` = 2)))) ;

-- ----------------------------
-- View structure for view_mahasiswa
-- ----------------------------
DROP VIEW IF EXISTS `view_mahasiswa`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_mahasiswa` AS select `master_mahasiswa`.`id_mahasiswa` AS `id_mahasiswa`,`master_mahasiswa`.`jenis_kelamin` AS `jenis_kelamin`,`master_mahasiswa`.`nama_mahasiswa` AS `nama_mahasiswa`,`master_mahasiswa`.`alamat_mahasiswa` AS `alamat_mahasiswa`,`master_mahasiswa`.`telpon_mahasiswa` AS `telpon_mahasiswa`,`master_mahasiswa`.`foto_mahasiswa` AS `foto_mahasiswa`,`master_mahasiswa`.`prodi_mahasiswa` AS `prodi_mahasiswa`,`master_mahasiswa`.`jurusan_mahasiswa` AS `jurusan_mahasiswa`,`master_mahasiswa`.`nim_mahasiswa` AS `nim_mahasiswa`,`master_mahasiswa`.`id_user` AS `id_user`,`master_prodi`.`nama_prodi` AS `nama_prodi`,`master_jurusan`.`nama_jurusan` AS `nama_jurusan`,`master_user`.`nama_user` AS `nama_user` from (((`master_mahasiswa` left join `master_prodi` on((`master_mahasiswa`.`prodi_mahasiswa` = `master_prodi`.`id_prodi`))) left join `master_jurusan` on((`master_mahasiswa`.`jurusan_mahasiswa` = `master_jurusan`.`id_jurusan`))) left join `master_user` on((`master_mahasiswa`.`id_user` = `master_user`.`id_user`))) where (`master_mahasiswa`.`aktif_mahasiswa` = 'Y') ;

-- ----------------------------
-- View structure for view_pendaftaran
-- ----------------------------
DROP VIEW IF EXISTS `view_pendaftaran`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_pendaftaran` AS select `tp`.`id_transaksi_pendaftaran` AS `id_transaksi_pendaftaran`,`tp`.`tgl_daftar_mahasiswa` AS `tgl_daftar_mahasiswa`,`tp`.`id_status` AS `id_status`,`tp`.`catatan` AS `catatan`,`tp`.`ranking_spk` AS `ranking_spk`,`tb`.`no_surat_pengesahan` AS `no_surat_pengesahan`,`tb`.`tgl_pengesahan_beasiswa` AS `tgl_pengesahan_beasiswa`,`mm`.`id_mahasiswa` AS `id_mahasiswa`,`mm`.`nama_mahasiswa` AS `nama_mahasiswa`,`mm`.`alamat_mahasiswa` AS `alamat_mahasiswa`,`mm`.`telpon_mahasiswa` AS `telpon_mahasiswa`,`mm`.`foto_mahasiswa` AS `foto_mahasiswa`,`mm`.`prodi_mahasiswa` AS `prodi_mahasiswa`,`mm`.`jurusan_mahasiswa` AS `jurusan_mahasiswa`,`mm`.`nim_mahasiswa` AS `nim_mahasiswa`,`mm`.`id_user` AS `id_user`,`mb`.`nama_beasiswa` AS `nama_beasiswa`,`mj`.`nama_jurusan` AS `nama_jurusan`,`mp`.`nama_prodi` AS `nama_prodi` from (((((`transaksi_pendaftaran` `tp` join `master_mahasiswa` `mm` on((`tp`.`id_mahasiswa` = `mm`.`id_mahasiswa`))) join `transaksi_beasiswa` `tb` on((`tp`.`id_transaksi_beasiswa` = `tb`.`id_transaksi_beasiswa`))) join `master_beasiswa` `mb` on((`tb`.`id_master_beasiswa` = `mb`.`id_beasiswa`))) join `master_jurusan` `mj` on((`mm`.`jurusan_mahasiswa` = `mj`.`id_jurusan`))) join `master_prodi` `mp` on((`mm`.`prodi_mahasiswa` = `mp`.`id_prodi`))) ;

-- ----------------------------
-- View structure for view_ranking
-- ----------------------------
DROP VIEW IF EXISTS `view_ranking`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_ranking` AS select `tb`.`id_transaksi_beasiswa` AS `id_transaksi_beasiswa`,`rk`.`nilai_akhir` AS `nilai_akhir`,`rk`.`id_transaksi_pendaftaran` AS `id_transaksi_pendaftaran`,`mm`.`nim_mahasiswa` AS `nim_mahasiswa`,`mm`.`nama_mahasiswa` AS `nama_mahasiswa`,`tb`.`tgl_akhir_beasiswa` AS `tgl_akhir_beasiswa`,`tb`.`tgl_awal_beasiswa` AS `tgl_awal_beasiswa`,`mb`.`nama_beasiswa` AS `nama_beasiswa` from ((((`ranking` `rk` join `transaksi_pendaftaran` `tp` on((`rk`.`id_transaksi_pendaftaran` = `tp`.`id_transaksi_pendaftaran`))) join `transaksi_beasiswa` `tb` on((`tp`.`id_transaksi_beasiswa` = `tb`.`id_transaksi_beasiswa`))) join `master_mahasiswa` `mm` on((`tp`.`id_mahasiswa` = `mm`.`id_mahasiswa`))) join `master_beasiswa` `mb` on((`mb`.`id_beasiswa` = `tb`.`id_master_beasiswa`))) order by `rk`.`nilai_akhir` desc ;

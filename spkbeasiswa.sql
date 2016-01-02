/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : spkbeasiswa

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2015-12-27 09:56:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `master_beasiswa`
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
-- Table structure for `master_detail_kriteria`
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
-- Table structure for `master_jurusan`
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
-- Table structure for `master_kriteria`
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
-- Table structure for `master_mahasiswa`
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

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

-- ----------------------------
-- Table structure for `master_pengumuman`
-- ----------------------------
DROP TABLE IF EXISTS `master_pengumuman`;
CREATE TABLE `master_pengumuman` (
  `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT,
  `judul_pengumuman` varchar(255) DEFAULT NULL,
  `desc_pengumuman` mediumtext,
  `aktif_pengumuman` enum('','T','Y') DEFAULT 'Y',
  `tgl_pengumuman` date DEFAULT NULL,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_pengumuman
-- ----------------------------
INSERT INTO `master_pengumuman` VALUES ('1', 'ttetete', '<p style=\"text-align: center;\"><img alt=\"\" src=\"/Pictures/220px_Bung_Tomo.jpg\" style=\"height:301px; width:220px\" /></p>\r\n\r\n<p>jhkjk</p>\r\n\r\n<p>kjkjhkj</p>\r\n', 'Y', '2015-12-22');
INSERT INTO `master_pengumuman` VALUES ('2', 'Pengumuman Terbaru Natal', '<p style=\"text-align: center;\"><img alt=\"\" src=\"/spkbeasiswa/Pictures/76cjiw.jpg\" style=\"height:360px; width:480px\" /></p>\r\n\r\n<p style=\"text-align: center;\">deskripsi test</p>\r\n', '', '2015-12-01');
INSERT INTO `master_pengumuman` VALUES ('3', 'Pengumuman Tahun baru', '<p style=\"text-align: center;\"><img alt=\"\" src=\"/spkbeasiswa/Pictures/76cjiw.jpg\" style=\"height:360px; width:480px\" /></p>\r\n\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n\r\n<p>ini pengumuman tahun baru</p>\r\n', 'Y', '2015-12-27');

-- ----------------------------
-- Table structure for `master_prodi`
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
-- Table structure for `master_syarat_beasiswa`
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
-- Table structure for `master_user`
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

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

-- ----------------------------
-- Table structure for `ranking`
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
-- Table structure for `transaksi_beasiswa`
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
INSERT INTO `transaksi_beasiswa` VALUES ('1', '1', '2015-11-01', '2015-12-30', '2015-12-30', '12345/KJL/2012');

-- ----------------------------
-- Table structure for `transaksi_kriteria`
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_kriteria`;
CREATE TABLE `transaksi_kriteria` (
  `id_transaksi_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `id_detail_kriteria` int(11) DEFAULT NULL,
  `id_transaksi_pendaftaran` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

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

-- ----------------------------
-- Table structure for `transaksi_pendaftaran`
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi_pendaftaran
-- ----------------------------
INSERT INTO `transaksi_pendaftaran` VALUES ('1', '6', '1', '2015-11-13', null, '15', '2', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('2', '7', '1', '2015-11-13', null, '16', '2', 'ditolak\n');
INSERT INTO `transaksi_pendaftaran` VALUES ('3', '8', '1', '2015-11-13', null, '17', '2', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('4', '9', '1', '2015-11-13', null, '18', '2', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('5', '10', '1', '2015-12-01', null, '19', '2', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('6', '11', '1', '2015-12-01', null, '20', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('7', '12', '1', '2015-12-01', null, '21', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('8', '13', '1', '2015-12-01', null, '22', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('9', '14', '1', '2015-12-01', null, '23', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('10', '15', '1', '2015-12-01', null, '24', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('11', '16', '1', '2015-12-01', null, '25', '1', null);
INSERT INTO `transaksi_pendaftaran` VALUES ('12', '17', '1', '2015-12-01', null, '26', '1', null);

-- ----------------------------
-- Table structure for `transaksi_syarat_beasiswa`
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_syarat_beasiswa`;
CREATE TABLE `transaksi_syarat_beasiswa` (
  `id_transaksi_syarat_beasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi_pendaftaran` int(11) DEFAULT NULL COMMENT 'relasi ke tabel transaksi_pendaftaran',
  `foto_syarat_beasiswa` varchar(255) DEFAULT NULL,
  `verifikasi` enum('T','S') DEFAULT 'T' COMMENT 'S UNTUK SESUAI, T UNTUK TIDAK',
  `id_syarat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_syarat_beasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

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

-- ----------------------------
-- View structure for `view_kriteria_pendaftaran`
-- ----------------------------
DROP VIEW IF EXISTS `view_kriteria_pendaftaran`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kriteria_pendaftaran` AS select `tk`.`id_transaksi_kriteria` AS `id_transaksi_kriteria`,`tk`.`id_detail_kriteria` AS `id_detail_kriteria`,`tk`.`id_transaksi_pendaftaran` AS `id_transaksi_pendaftaran`,`tk`.`id_kriteria` AS `id_kriteria`,`mdk`.`bobot_detail_kriteria` AS `bobot_detail_kriteria`,`tp`.`id_status` AS `id_status`,`tp`.`id_transaksi_beasiswa` AS `id_transaksi_beasiswa` from ((`transaksi_kriteria` `tk` join `master_detail_kriteria` `mdk` on((`tk`.`id_detail_kriteria` = `mdk`.`id_detail_kriteria`))) join `transaksi_pendaftaran` `tp` on(((`tk`.`id_transaksi_pendaftaran` = `tp`.`id_transaksi_pendaftaran`) and (`tp`.`id_status` = 2))));

-- ----------------------------
-- View structure for `view_mahasiswa`
-- ----------------------------
DROP VIEW IF EXISTS `view_mahasiswa`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_mahasiswa` AS select `master_mahasiswa`.`id_mahasiswa` AS `id_mahasiswa`,`master_mahasiswa`.`jenis_kelamin` AS `jenis_kelamin`,`master_mahasiswa`.`nama_mahasiswa` AS `nama_mahasiswa`,`master_mahasiswa`.`alamat_mahasiswa` AS `alamat_mahasiswa`,`master_mahasiswa`.`telpon_mahasiswa` AS `telpon_mahasiswa`,`master_mahasiswa`.`foto_mahasiswa` AS `foto_mahasiswa`,`master_mahasiswa`.`prodi_mahasiswa` AS `prodi_mahasiswa`,`master_mahasiswa`.`jurusan_mahasiswa` AS `jurusan_mahasiswa`,`master_mahasiswa`.`nim_mahasiswa` AS `nim_mahasiswa`,`master_mahasiswa`.`id_user` AS `id_user`,`master_prodi`.`nama_prodi` AS `nama_prodi`,`master_jurusan`.`nama_jurusan` AS `nama_jurusan`,`master_user`.`nama_user` AS `nama_user` from (((`master_mahasiswa` left join `master_prodi` on((`master_mahasiswa`.`prodi_mahasiswa` = `master_prodi`.`id_prodi`))) left join `master_jurusan` on((`master_mahasiswa`.`jurusan_mahasiswa` = `master_jurusan`.`id_jurusan`))) left join `master_user` on((`master_mahasiswa`.`id_user` = `master_user`.`id_user`))) where (`master_mahasiswa`.`aktif_mahasiswa` = 'Y');

-- ----------------------------
-- View structure for `view_pendaftaran`
-- ----------------------------
DROP VIEW IF EXISTS `view_pendaftaran`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pendaftaran` AS select `tp`.`id_transaksi_pendaftaran` AS `id_transaksi_pendaftaran`,`tp`.`tgl_daftar_mahasiswa` AS `tgl_daftar_mahasiswa`,`tp`.`id_status` AS `id_status`,`tp`.`catatan` AS `catatan`,`tp`.`ranking_spk` AS `ranking_spk`,`tb`.`no_surat_pengesahan` AS `no_surat_pengesahan`,`tb`.`tgl_pengesahan_beasiswa` AS `tgl_pengesahan_beasiswa`,`mm`.`id_mahasiswa` AS `id_mahasiswa`,`mm`.`nama_mahasiswa` AS `nama_mahasiswa`,`mm`.`alamat_mahasiswa` AS `alamat_mahasiswa`,`mm`.`telpon_mahasiswa` AS `telpon_mahasiswa`,`mm`.`foto_mahasiswa` AS `foto_mahasiswa`,`mm`.`prodi_mahasiswa` AS `prodi_mahasiswa`,`mm`.`jurusan_mahasiswa` AS `jurusan_mahasiswa`,`mm`.`nim_mahasiswa` AS `nim_mahasiswa`,`mm`.`id_user` AS `id_user`,`mb`.`nama_beasiswa` AS `nama_beasiswa`,`mj`.`nama_jurusan` AS `nama_jurusan`,`mp`.`nama_prodi` AS `nama_prodi` from (((((`transaksi_pendaftaran` `tp` join `master_mahasiswa` `mm` on((`tp`.`id_mahasiswa` = `mm`.`id_mahasiswa`))) join `transaksi_beasiswa` `tb` on((`tp`.`id_transaksi_beasiswa` = `tb`.`id_transaksi_beasiswa`))) join `master_beasiswa` `mb` on((`tb`.`id_master_beasiswa` = `mb`.`id_beasiswa`))) join `master_jurusan` `mj` on((`mm`.`jurusan_mahasiswa` = `mj`.`id_jurusan`))) join `master_prodi` `mp` on((`mm`.`prodi_mahasiswa` = `mp`.`id_prodi`)));

-- ----------------------------
-- View structure for `view_ranking`
-- ----------------------------
DROP VIEW IF EXISTS `view_ranking`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_ranking` AS select `tb`.`id_transaksi_beasiswa` AS `id_transaksi_beasiswa`,`rk`.`nilai_akhir` AS `nilai_akhir`,`rk`.`id_transaksi_pendaftaran` AS `id_transaksi_pendaftaran`,`mm`.`nim_mahasiswa` AS `nim_mahasiswa`,`mm`.`nama_mahasiswa` AS `nama_mahasiswa`,`tb`.`tgl_akhir_beasiswa` AS `tgl_akhir_beasiswa`,`tb`.`tgl_awal_beasiswa` AS `tgl_awal_beasiswa`,`mb`.`nama_beasiswa` AS `nama_beasiswa` from ((((`ranking` `rk` join `transaksi_pendaftaran` `tp` on((`rk`.`id_transaksi_pendaftaran` = `tp`.`id_transaksi_pendaftaran`))) join `transaksi_beasiswa` `tb` on((`tp`.`id_transaksi_beasiswa` = `tb`.`id_transaksi_beasiswa`))) join `master_mahasiswa` `mm` on((`tp`.`id_mahasiswa` = `mm`.`id_mahasiswa`))) join `master_beasiswa` `mb` on((`mb`.`id_beasiswa` = `tb`.`id_master_beasiswa`))) order by `rk`.`nilai_akhir` desc;

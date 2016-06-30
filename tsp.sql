/*
Navicat MySQL Data Transfer

Source Server         : localhost_uwamp
Source Server Version : 50620
Source Host           : 127.0.0.1:3306
Source Database       : tsp

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-06-30 21:20:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for log_reqit
-- ----------------------------
DROP TABLE IF EXISTS `log_reqit`;
CREATE TABLE `log_reqit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tiket` varchar(30) DEFAULT NULL,
  `tgl_new` datetime DEFAULT NULL,
  `user_req` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `divisi` varchar(20) DEFAULT NULL,
  `perangkat` varchar(100) DEFAULT NULL,
  `problem` text,
  `tgl_prog` datetime DEFAULT NULL,
  `admin_prog` varchar(30) DEFAULT NULL,
  `teknisi_it` varchar(30) DEFAULT NULL,
  `penanganan` text,
  `tgl_closed` datetime DEFAULT NULL,
  `admin_closed` varchar(30) DEFAULT NULL,
  `solusi` text,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_reqit
-- ----------------------------
INSERT INTO `log_reqit` VALUES ('31', 'TSP00001', null, 'logistik', '0899123123', 'Logistik', 'Monitor', 'Layar blank, tidak ada gambar apa-apa', null, null, null, null, null, null, null, 'new');
INSERT INTO `log_reqit` VALUES ('32', 'TSP00002', '2016-06-30 19:07:18', 'logistik', '081321234234', 'Administrasi', 'Monitor', 'Monitor sering mati sendiri', null, null, null, null, null, null, null, 'new');
INSERT INTO `log_reqit` VALUES ('33', 'TSP00003', '2016-06-30 19:23:26', 'adhi', '089567414141', 'Administrasi', 'PC', 'PC blue screen', '2016-06-30 19:38:37', 'itstaff', 'amir', 'dilakukan pengecekan lebih lanjut', '2016-06-30 19:55:37', 'itstaff', 'dilakukan install ulang windows', 'closed');
INSERT INTO `log_reqit` VALUES ('34', 'TSP00004', '2016-06-30 20:03:18', 'adhi', '024123123456', 'Gudang', 'Printer', 'Printer tidak bisa buat nge-print', '2016-06-30 20:06:02', 'itstaff', 'fauzan', 'akan segera dicek', '2016-06-30 20:06:26', 'itstaff', 'catridge habis, dilakukan isi ulang catridge', 'closed');
INSERT INTO `log_reqit` VALUES ('35', 'TSP00005', '2016-06-30 20:34:43', 'adhi', '0897897879', 'Gudang', 'Router', 'Router trouble, karena mati listrik', null, null, null, null, null, null, null, 'new');
INSERT INTO `log_reqit` VALUES ('36', 'TSP00006', '2016-06-30 20:48:30', 'spv', '0899098009', 'Administrasi', 'UPS', 'Mohon disediakan UPS, karena listrik sering mati', '2016-06-30 20:49:35', 'itstaff', 'rudi', 'akan koordinasikan', null, null, null, 'inprogress');
INSERT INTO `log_reqit` VALUES ('37', 'TSP00007', '2016-06-30 20:52:55', 'spv', '08928222828', 'Administrasi', 'PC', 'sering restart sendiri', null, null, null, null, null, null, null, 'new');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(10) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'rahasia', 'Administrator IT', 'IT Staff');
INSERT INTO `user` VALUES ('2', 'user', 'rahasia', 'User Pelapor', 'Supervisor');
INSERT INTO `user` VALUES ('3', 'adhi', 'rahasia', 'Adhi Prakasa', 'Supervisor');
INSERT INTO `user` VALUES ('4', 'manajer', 'rahasia', 'Manajer IT', 'IT Staff');
INSERT INTO `user` VALUES ('5', 'spv', 'rahasia', 'Budi SPV', 'Supervisor');
